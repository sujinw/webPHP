<?php
/**
 *  框架核心类
 */
final class Application{
	public static function run(){
		self::_init();
		//解析路由
        // Route::parseUrl();											//设置外部路径

		set_error_handler(array(__CLASS__, 'error'));					//接受php普通错误
		register_shutdown_function(array(__CLASS__, 'fatal_error'));    //接受致命错误
		self::_user_import();											//加载用户自定义扩展
		spl_autoload_register(array(__CLASS__, '_autoload')); 			//设置自动载入
		self::_app_run();												//让应用默认跑起来
		// self::_set_url();		
		self::_create_demo();											//创建一个demo
	}
	public static function fatal_error(){
		if($e = error_get_last()){
			self::error($e['type'],$e['message'],$e['file'],$e['line']);
		}
	}
	public static function error($errno,$error,$file,$line){
		switch ($errno) {
			case E_ERROR:
			case E_PARSE:
			case E_CORE_ERROR:
			case E_COMPILE_ERROR:
			case E_USER_ERROR:
				$msg = $error . $file . "{第{$line}行}";
				halt($msg);
				break;
			case E_USER_NOTICE:
			case E_USER_WARNING:
			case E_STRICT:
			default:
				if(DEBUG){
					include MYPHP_DATA_PATH . '/Tpl/notice.html';
				}
				break;
		}
	}
	/**
	 * [_init 初始化框架]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T17:25:08+0800
	 * @return   [type]                   [description]
	 */
	private static function _init(){
		//加载框架配置项
		C(include MYPHP_CONFIG_PATH . '/config.php');

		//加载用户应用内的配置
		$m = explode(',',MODEL_LIST);
		foreach ($m as $v) {
			$userConfigPath =ROOT_PATH.APP_PATH.'/'.$v .APP_CONFIG_PATH . '/config.php';
			$commonConfigPath = APP_COMMON_CONKIG_PATH .'/Config.php';
			$userConfig =<<<str
<?php 
/*
 * 应用内配置文件
 */
return array(
	'配置项' => "配置值"
);
str;
			is_file($userConfigPath) || file_put_contents($userConfigPath, $userConfig);
			is_file($commonConfigPath) || file_put_contents($commonConfigPath, $userConfig);
		}
		//加载公共配置项
		C(include $commonConfigPath);

		//加载用户配置项
		C(include $userConfigPath);


		//设置默认时区
		date_default_timezone_set(C('DEFAULT_TIMES_ZONE'));

		//设置SESSION
		C("SESSION_AUTO_START") && session_start();
	}
	/**
	 * [_autoload 框架类自动加载]
	 * @Author   Rukic
	 * @DateTime 2015-11-25T23:30:05+0800
	 * @param    [type]                   $classname [description]
	 * @return   [type]                              [description]
	 */
	private static function _autoload($classname){
		switch (true) {
			case strlen($classname) > 10 && substr($classname, -10) == "Controller":
				$path = MODULE_PATH.'/Controller/'. ucfirst($classname) .'.class.php';
				// echo $path;die;
				if(!is_file($path)){
					$emptyPath = MODULE_PATH.'/Controller/' .'/EmptyController.class.php';
					if(is_file($emptyPath)){
						include $emptyPath;
						return;
					}else{
						halt($path.'控制器未找到');
					}
				}
				include $path;
				break;
			case strlen($classname) > 5 && substr($classname, -5) == "Model":
				$commonPath = APP_COMMON_MODEL_PATH . '/' .$classname .'.class.php';
				$modulePath = MODULE_MODEL_PATH.'/'.$classname .'.class.php';
				if(is_file($modulePath) && is_file($commonPath)) halt("Model的类同Common/Model类名相同！");
				if(!is_file($modulePath) && !is_file($commonPath)) halt("Model和Common/Model未找到操作模型！");
				// echo $modulePath;
				$path = is_file($modulePath) ? $modulePath : $commonPath;
				// echo $path;
				include $path;
				break;
			default:
				$path = MYPHP_TOOL_PATH .'/'. $classname .'.class.php';
				if(!is_file($path)) halt($path.'类未找到');
				include $path;
				break;
		}
	}

	/**
	 * [_create_demo 创建一个demo]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T18:55:38+0800
	 * @return   [type]                   [description]
	 */
	private static function _create_demo(){
		$m = explode(',',MODEL_LIST);
		foreach ($m as $v) {
			$path = ROOT_PATH.APP_PATH.'/'.$v.'/'.APP_CONTROLLER_PATH .'/IndexController.class.php';

			$demoStr =<<<str
<?php
/*
 * 默认控制器
 */
class IndexController extends Controller{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo '<h2>欢迎使用myPHP框架 (:!</h2>';
	}
}

?>
str;
			is_file($path) || file_put_contents($path, $demoStr);
		}
	}

	/**
	 * [_app_run 默认让应用跑起来]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T19:20:17+0800
	 * @return   [type]                   [description]
	 */
	private static function _app_run(){
		$c = isset($_GET[C('VAR_CONTROLLER')]) ?  $_GET[C('VAR_CONTROLLER')] : 'Index';
		$a = isset($_GET[C('VAR_ACTION')]) 	   ?  $_GET[C('VAR_ACTION')]     : 'index';
		$m = isset($_GET[C('VAR_MODULE')])     ?  $_GET[C('VAR_MODULE')]     : 'Index';

		//定义模块内的常量		
		define('MODULE'		, ucfirst($m));
		define('CONTROLLER' , ucfirst($c));
		define('ACTION'		, ucfirst($a));

		define('MODULE_PATH', ROOT_PATH.APP_PATH.'/'.MODULE);
		
		define('MODULE_CONTROLLER_PATH'	,  		MODULE_PATH.'/Controller');
		define('MODULE_MODEL_PATH'		, 		MODULE_PATH.'/Model');
		define('MODULE_CONFIG_PATH'		,  		MODULE_PATH.'/Config');
		define('MODULE_TPL_PATH'		,  		MODULE_PATH.'/Tpl');
		define('MODULE_PUBLIC_PATH'		,  		MODULE_TPL_PATH.'/Public');

		//设置路径
		self::_set_url();
		$c .= 'Controller';
		if(class_exists($c)){
			$obj= new $c();
			if(!method_exists($obj, $a)){
				if(method_exists($obj,'__empty')){
					$obj->__empty();
				}else{
					halt($c .'控制器中的'.$a.'方法未找到呢~~~');
				}
			}else{
				$obj->$a();
			}
		}else{
			$obj=new EmptyController();
			$obj->index();
		}
	}

	/**
	 * [_user_import 自动加载用户自定义扩展]
	 * @Author   Rukic
	 * @DateTime 2015-11-13T14:15:54+0800
	 * @return   [type]                   [description]
	 */
	private static function _user_import(){
		$fileArr =  C("AUTO_LOAD_FILE");
		foreach ($fileArr as $v) {
			require_once APP_COMMON_LIB_PATH  . '/' . $v;  
		}
	}
	
	/**
	 * [_set_url 设置外部路径]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T18:42:06+0800
	 */
	private static function _set_url(){

		$path = 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
		$path = str_replace('\\', '/', $path);
		define('__APP__',$path);															//项目入口路径
		define('__WEB__',$path);															//项目入口路径
		define('__ROOT__', dirname($path));													//项目个路径
		define('__TPL__',__ROOT__ .APP_PATH.'/'. MODULE .'/Tpl'); 				//应用模板路径
		define('__PUBLIC__',__TPL__ .'/Public');											//应用公共资源路径
		define('__CSS__',__PUBLIC__ .'/Css');											//应用公共资源路径
		define('__JS__',__PUBLIC__ .'/Js');											//应用公共资源路径
		define('__COMMON_PUBLIC__',__ROOT__.APP_PATH.'/Common/Public');								//公共配置里的Public路径
        //来源URL
        define("__HISTORY__",isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:null);
	}
}
?>