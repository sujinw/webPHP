<?php 
/**
=========================DEMO++++++++++++++++++++++++
include_once 'model.class.php';

$model = new Model(array(),'c');//第一个参数数据库配置文件，第二个传操作表的表名
//print_r($mode);
	//insert
	//$inserId = $model->add(array('id'=>1,'user'=>'test'));//add添加一条传数组，添多条用addAll,传二维数组
 //print_r($inserId);
	//$model->all();     //all和findAll都是查找全部的数据
	
	//$model->where(array('id'=>1))->one();//查询一条
	//$model->field(array('id','user'))->where(array('user'=>'test')); // field[]填写需要查询的字段    where[]填写查询条件
	
	//$model->where(array())->delete()//删除记录。必须有where，为防止误操作
	
	//$model->where(array())->update(array())//更新记录，必须有where，防止误操作
	
	//$model->exe($sql)//执行一条除了查询的sql语句
	//$model->query($sql)//执行一条查询sql语句
	
	
	//$model->field()->group()->order()->where()->limit();//完整的链式调用filed，where，都是传一个array，其他的都是传string，比如order就是传ORDER BY后面的字符串

*/
$mode = new Model(array(),'c');
$mode->where(array('id'=>1))->one();
$mode->where(array('id'=>1))->find();

$mode->addAll(array(
	array(
		'id'=>1,
		"user"=>"2"
	),
	array(
		'id'=>3,
		"user"=>'22',
	),
	array(
		'uid'=>'44',
		'user'=>333
	),
));
echo $mode->debug();//输出最后一条执行的sql

$config = array();//可以把配置写到配置文件

//数据库操作函数
function M($table=null){
	if(is_null($table))exit("没有表名");
	return new Model($config,$table);
}
//仿think的    M('表名')->all();
/**
 * 数据库模型类
 * author salde
 * updateTime 2016/09/19
 */
class Model{
	//保存链接信息
	public static $link;
	//保存表名
	public $table = NULL;
	//初始化表信息
	private $opt;
	//数据表前缀
	private $dbPrefix = "";
	//记录发送的sql
	public static $sqls = array();
	
	public static $dbConfig = array();
	/**
	 * [__construct 自动组合表名并连接数据库初始化sql]
	 * @param [type] $table [description]
	 */
	public function __construct($config=array(),$table=NULL){
		$this->table = is_null($table) ? $this->dbPrefix . $this->table : $this->dbPrefix . $table;
		//初始化数据库信息
		$dbdefault = array(
			'DB_HOST'		=>		'127.0.0.1',//数据库地址
			'DB_USER'		=>		'root',		//数据库用户名
			'DB_PASSWORD'	=>		'root',		//数据库密码
			'DB_PORT'		=>		'3306',		//数据库端口
			'DB_DATABASE'	=>		'test',		//需要操作的数据库
			'DB_CHARSET'	=>		'utf8'
		);
		self::$dbConfig = array_merge($dbdefault,$config);
		//连接数据库
		$this->_connect();
		//初始化sql信息
		$this->_opt();
	}
	/**
	 * [_connect 链接数据库]
	 * @return [type] [description]
	 */
	private function _connect(){
		if(is_null(self::$link)){
			if(empty(self::$dbConfig['DB_DATABASE'])) exit("请先配置数据库！");
			$link = new Mysqli(self::$dbConfig['DB_HOST'],self::$dbConfig['DB_USER'],self::$dbConfig['DB_PASSWORD'],self::$dbConfig['DB_DATABASE'],self::$dbConfig['DB_PORT']);
			if($link->connect_error)exit("数据库连接出错，请检查数据库配置");
			$link->set_charset(self::$dbConfig["DB_CHARSET"]);
			self::$link = $link;
		}
	}
	/**
	 * [_opt 初始化sql信息]
	 * @return [type] [description]
	 */
	private function _opt(){
		$this->opt = array(
			'field' => '*',
			'where' => '',
			'group' => '',
			'having'=> '',
			'order' => '',
			'limit' => ''
			);
	}
	/**
	 * 查询数据表的条数
	 */
	public function count(){
		$sql = "SELECT count(*) FROM ".$this->table;
		$result = $this->query($sql);
		$res = current($result);
		return $res['count(*)'];
	}
	/**
	 * [query sql查询方法]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function query($sql){
		self::$sqls[] = $sql;
		$link = self::$link;
		$result = $link->query($sql);
		if($link->errno)exit("mysql错误：".$link->error.'<br />SQL:'.$sql);//有错误则输出错误
		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		$result->free();//释放结果集
		$this->_opt();//初始化sql
		return $rows;
	}
	/**
	 * [all 查询所有记录]
	 * @return [type] [description]
	 */
	public function all(){
		$sql = "SELECT " . $this->opt['field'] . " FROM " . $this->table . $this->opt['where'] . $this->opt['having']  . $this->opt['group']  . $this->opt['order']. $this->opt['limit'];
		return $this->query($sql);
	}
	/**
	 * [findAll all的别名]
	 * @return [type] [description]
	 */
	public function findAll(){
		return $this->all(); 
	}
	/**
	 * [find 查找一条记录]
	 * @return [type] [description]
	 */
	public function find(){
		$data = $this->limit(1)->all();
		$data = current($data);
		return $data;
	}
	/**
	 * [one find()的别名]
	 * @return [type] [description]
	 */
	public function one(){
		return $this->find();
	}
	/**
	 * [field 根据filed的条件查询]
	 * @param  [type] $filed [description]
	 * @return [type]        [description]
	 */
	public function field($field){
		$fields = '';
		if(is_array($field)){
			foreach ($field as $key => $value) {
				$fields .= '`'. $value .'`,';
			}
			$fields = trim($fields,',');
			$this->opt['field'] = $fields;
		}else{
			$this->opt['field'] = $field;
		}
		
		return $this;
	}
	/**
	 * [where 根据where条件查询]
	 * @param  [array] $where [description]
	 * @return [type]        [description]
	 */
	public function where($where = array()){
		if(count($where) == 0){
			exit("请输入正确的where array");
		}
		$whStr = "";
		foreach($where as $k=>$v){
			$whStr .= "'".$k."'=".$v.",";
		}
		$str = trim($whStr,",");
		$this->opt['where'] = " WHERE ".$str;
		return $this;
	}
	/**
	 * [group 根据group条件查询]
	 * @param  [type] $group [description]
	 * @return [type]        [description]
	 */
	public function group($group){
		$this->opt['group'] = " GROUP ". $group;
		return $this;
	}
	/**
	 * [order 根据order条件查询]
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function order($order){
		$this->opt['order'] = " ORDER BY " . $order;
		return $this;
	}
	/**
	 * [limit 根据limit条件查询]
	 * @param  [type] $limit [1,2]
	 * @return [type]        [description]
	 */
	public function limit($limit){
		$this->opt['limit'] = " LIMIT " . $limit;
		return $this;
	}
	/**
	 * [exe 实现除了查询之外的mysql操作]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function exe($sql){
		self::$sqls[] = $sql;
		$link = self::$link;
		$bool = $link->query($sql);
		$this->_opt();
		if (is_object($bool)) {
			exit("请用query()方法来实现查询！");
		}
		if($bool){
			return $link->insert_id ? $link->insert_id : $link->affected_rows;
		}else{
			exit("mysql错误：".$link->error."<br />SQL:".$sql);
		}
	}
	/**
	 * [delete 删除数据库数据]
	 * @return [type] [description]
	 */
	public function delete(){
		if(empty($this->opt['where']))exit("删除语句必须要where条件");
		$sql = "DELETE FROM " .$this->table . $this->opt['where'];
		return $this->exe($sql);
	}
	/**
	 * [_safe_str sql字符串安全转义]
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	private function _safe_str($str){
		if(get_magic_quotes_gpc()){
			$str = stripslashes($str);
		}
		return self::$link->real_escape_string($str);
	}
	/**
	 * [add 添加数据库记录]
	 * @param [type] $data [description]
	 */
	public function add($data=NULL){
		if(is_null($data)) $data = $_POST;
		$fields = '';
		$values = '';
		foreach ($data as $k => $v) {
			$fields .= '`' . $this->_safe_str($k) . '`,';
			$values .= "'" . $this->_safe_str($v) . "',";
		}
		$fields = trim($fields, ',');
		$values = trim($values, ',');
		$sql = "INSERT INTO " . $this->table . " (". $fields .") VALUES (". $values .")";
		return $this->exe($sql);
	}
	//多条数据用多维数组，递归插入
	public function addAll($data = NULL){
		if(is_null($data)) $this->add();
		if(arrayLevel($data) > 1){
			$sqls = "";
			foreach ($data as $v) {
				if(arrayLevel($v) == 1){					
					//$result = $this->add($v);这等于轮询数据库，占用内存太多，优化如下
					
					$fields = '';
					$values = '';
					foreach($v as $k=>$e){
						$fields .= '`' . $this->_safe_str($k) . '`,';
						$values .= "'" . $this->_safe_str($v) . "',";
					}
					$fields = trim($fields, ',');
					$values = trim($values, ',');
					$sqls .= "INSERT INTO " . $this->table . " (". $fields .") VALUES (". $values .");";
				}else{
					#$result = $this->addAll($v);
				}
			}
			echo $sqls;die;
		}else{
			$result = $this->add($data);
		}
		return $result;
	}
	/**
	 * [update 更新数据库记录操作]
	 * @param  [array] $data [description]
	 * @return [type]       [description]
	 */
	public function update($data = NULL){
		if(empty($this->opt['where']))exit('更新语句必须含有where条件');
		if(is_null($data)) $data = $_POST;
		$fields = '';
		foreach ($data as $k => $v) {
			$fields .= "`" . $this->_safe_str($k) . "`='" . $this->_safe_str($v) ."',";
		}
		$fields = trim($fields, ',');
		$sql = "UPDATE " . $this->table . " SET " . $fields . $this->opt['where'];
		return $this->exe($sql);
	}
	/**
	 * [debug 输出最后一条执行的sql]
	 * @param  [array] $data [description]
	 * @return [type]       [description]
	 */
	public function debug(){
		//print_r(self::$sqls);
		return self::$sqls[count(self::$sqls)-1];
	}
}
?>