<?php
/**
* 文章数据操作
*/
class ArticleModel extends Model{
	//文章表名
	public $table = 'article';
	//文章分类表
	public $catetable = 'article_category';
	//栏目表名
	public $ctable = 'column';
	//通过文章表的column_id字段获取栏目
	public function getColumnBycolId($column_id){
		$sql = "SELECT `cid`,`cname` FROM " .C('DB_PREFIX').$this->catetable." WHERE column_id=".$column_id;
		return $this->query($sql);
	}
	public function addArticle($data){
		$res = $this->add($data);
		// p($res);die;
		$dbDir = MYPHP_TEMP_PATH.'/Dbid/Article/Article';
		chmod($dbDir,0777);
		is_dir($dbDir) || mkdir($dbDir,0777,true);
		file_put_contents($dbDir.'/dbid.txt',$res);
		// die;
		return $res;
	}
	/**
	 * [list 根据页码查询并处理文章数据]
	 * @Author   Rukic
	 * @DateTime 2015-12-10T12:02:16+0800
	 * @return   [type]                   [description]
	 */
	public function listData($now,$end){
		$sql = "SELECT * FROM ".$this->table." AS a,".C('DB_PREFIX').$this->catetable." AS cate,". C("DB_PREFIX").$this->ctable." AS col WHERE a.display=1 AND a.category_id=cate.cid AND a.column_id=col.id ORDER BY a.create_time desc LIMIT ".$now.",".$end;
		// echo $sql;die;
		$article = $this->query($sql);
		// p($article);die;
		return article_data_ready($article);
	}
}
?>