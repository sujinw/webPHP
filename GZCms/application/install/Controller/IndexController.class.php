<?php
//测试控制器类
class IndexController extends Controller{
	public function __init(){
		if(is_file('lock.php')){
			$this->error('请删除lock.php文件后安装',dirname(__ROOT__));
		}
	}
	//欢迎界面
	public function index(){
		echo 1;
    	$this->display();
	}

	//版权
	public function copyright(){
		$this->display();
	}
	//环境监测
	public function environment(){
		$this->assign("safe",(ini_get('safe_mode') ? '<span class="hd-validate-error">Off</span>' : '<span class="hd-validate-success">On</span>'));
        $this->assign("gd",extension_loaded('GD') ? '<span class="hd-validate-success">On</span>' : '<span class="hd-validate-error">Off</span>');
        $this->assign("curl",extension_loaded('CURL') ? '<span class="hd-validate-success">On</span>' : '<span class="hd-validate-error">Off</span>');
        $this->assign("mysqli", function_exists("mysqli_connect") ? '<span class="hd-validate-success">On</span>' : '<span class="hd-validate-error">Off</span>');
        $this->assign("mb_substr",function_exists("mb_substr") ? '<span class="hd-validate-success">On</span>' : '<span class="hd-validate-error">Off</span>');
        //检测目录
        $this->assign("dirctory",array(
            './', //网站根目录
            ROOT_PATH.APP_PATH,
            ROOT_PATH.APP_PATH."/Temp",
            ROOT_PATH."/Upload",
            APP_COMMON_PATH . "/Config", //配置目录
            APP_COMMON_PATH . "/Config/config.inc.php", //数据库配置文件
            APP_COMMON_PATH . "/Config/db.inc.php", //数据库配置文件
            ROOT_PATH.APP_PATH . '/Install', //安装目录
        ));
			$this->display();
		}
		//数据库监测
    	public function database(){
    		if (IS_POST) {
	            if (empty($_POST['ADMIN']) || !preg_match('/^\w+$/i', $_POST['ADMIN'])) {
	                $this->error('管理员帐号错误');
	            }
	            if (empty($_POST['PASSWORD'])) {
	                $this->error('管理员密码不能为空');
	            }
	            if ($_POST['PASSWORD'] !== $_POST['C_PASSWORD']) {
	                $this->error('两次密码不一致');
	            }
	            if (empty($_POST['WEBNAME'])) {
	                $this->error('网站名称不能为空');
	            }
	            if (empty($_POST['EMAIL'])) {
	                $this->error('站长邮箱不能为空');
	            }
	            //================================= 连接服务器 =================================
	            if (!@mysql_connect($_POST['DB_HOST'], $_POST['DB_USER'], $_POST['DB_PASSWORD'])) {
	                $this->error('数据库连接失败');
	            }
	            //数据库不存在时创建数据库
	            if (!@mysql_query("CREATE DATABASE IF NOT EXISTS " . $_POST['DB_DATABASE'] . " CHARSET UTF8")) {
	                $this->error('创建数据库失败');
	            }
	            //================================= 设置配置文件 =================================
	            $config = <<<str
<?php if (!defined('MYPHP_PATH'))exit;
return array (
    'DB_DRIVER' => 'mysqli',
    'DB_HOST' => '{$_POST['DB_HOST']}',
    'DB_PORT' => 3306,
    'DB_USER' => '{$_POST['DB_USER']}',
    'DB_PASSWORD' => '{$_POST['DB_PASSWORD']}',
    'DB_DATABASE' => '{$_POST['DB_DATABASE']}',
    'DB_PREFIX' => '{$_POST['DB_PREFIX']}',
    'WEB_MASTER' => '{$_POST['ADMIN']}',
);
?>
str;
	            if (!file_put_contents(APP_COMMON_PATH . '/Config/db.inc.php', $config)) {
	                $this->error('创建配置文件失败');
	            }
	            //================================= 导入数据 =================================
	            //加载数据库配置
	            C(require APP_COMMON_PATH . '/Config/db.inc.php', $config);
	            //导入数据
	            $db_prefix = $_POST['DB_PREFIX'];
	            $gzcms = MODULE_PATH."/Data/gzcms.sql";
	            $_sql = file_get_contents($gzcms);
	            $_arr = explode(';', $_sql);
	            $_mysqli=new mysqli($_POST['DB_HOST'], $_POST['DB_USER'], $_POST['DB_PASSWORD']);
	            foreach ($_arr as $_value) {
    				$_mysqli->query($_value.';');
				}
	            // p($_arr);die;
	            //================================= 更新基本数据如网站名称===============================
	            $db = M("config");
	            $db->where(array('name' => array('EQ', 'WEBNAME')))->update(array('value' => $_POST['WEBNAME']));
	            $db->where(array('name' => array('EQ', 'EMAIL')))->update(array('value' => $_POST['EMAIL']));
	            //站长信息
	            $db = M('user');
	            $code = substr(md5(mt_rand() . time()), 0, 10);
	            $data = array(
	                'id' => 1,
	                'rid' => 1,
	                'username' => $_POST['ADMIN'],
	                'nickname' => $_POST['ADMIN'],
	                // 'email' => $_POST['EMAIL'],
	                'create_time' => time(),
	                // 'code' => $code,
	                'password' => md5($_POST['PASSWORD'])
	            );
	            if ($db->update($data)) {
	                $this->success('创建数据表成功');
	            }
	        } else {
	        	$const = array(
	        		'server' => $_SERVER,
	        		'const'  => get_defined_constants(true),
	        		'config' => C()
	        	);
	        	$this->assign('const',$const);
	        	// p($const);die;
	            $this->display();
	        }
    	}
    	/**
    	 * CMS系统的目录、函数、扩展库检测
    	 * @return [type] [description]
    	 */
    	public function check(){
    		//需要检测的目录
    		$dir=array(
    			'../backup',
    			'../Data',
    			'../Data/cache',
    			'../Data/config',
    			'../upload'
    		);
    		//函数检测
    		$functions=array(
    			'mb_substr',
    			'mysql_connect',
    			'imagecreatetruecolor'
    		);
    		$this->dir= $dir;
    		$this->functions=$functions;
    		$this->display();
    	}
    	//设置数据库连接
    	public function set_db(){
    		if(IS_POST){
    			if(!@mysql_connect($_POST['DB_HOST'],$_POST['DB_USER'],
    				$_POST['DB_PASSWORD'])){
    				$this->error('数据库帐号或密码错误');
    			}
    			//创建数据库
    			mysql_query("CREATE DATABASE IF NOT EXISTS ".$_POST['DB_DATABASE'].' CHARSET UTF8');
    			//数据库连接正常
    			C($_POST);
    			$db_prefix=$_POST['DB_PREFIX'];
    			$db = M();
    			//导入数据
    			$files = Dir::tree('db');
    			foreach($files as $f){
    				require $f['path'];
    			}
    			//修改配置文件
    			$config = array(
    'DB_HOST'  		=>$_POST['DB_HOST'], //数据库连接主机  如127.0.0.1
    'DB_PORT'  		=> $_POST['DB_PORT'],        //数据库连接端口
    'DB_USER'       => $_POST['DB_USER'],      //数据库用户名
    'DB_PASSWORD'   => $_POST['DB_PASSWORD'],          //数据库密码
    'DB_DATABASE'                   => $_POST['DB_DATABASE'],          //数据库名称
    'DB_PREFIX'                  => $_POST['DB_PREFIX'],          //表前缀
    );
    			$data="<?php
if(!defined('HDPHP_PATH'))exit;\nreturn ".var_export($config,true).";\n?>";
    			file_put_contents('../data/config/db.inc.php', $data);
    			//更新管理员信息
    			$db->table('admin')->save(array(
    				'aid'=>1,
    				'username'=>$_POST['username'],
    				'password'=>md5($_POST['password'])));
    			touch('lock.php');
    			$this->root=dirname(__ROOT__);
    			$this->display('success');
    		}else{
    			$this->display();
    		}
    	}
}
?>