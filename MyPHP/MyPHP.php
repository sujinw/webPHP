<?php
/**
 * 框架核心类
 */
final class Appcation {
	/**
	 * 
	 * 核心类运行函数
	 * @AuthorHTL
	 * @DateTime  2015-11-06T11:24:37+0800
	 * @return    [type]                   [description]
	 */
	public static function run(){
		self::_set_const();
		defined("DEBUG") || define("DEBUG",false);
		if(DEBUG){
			self::_create_dir();
			self::_import_file();
		}else{
			error_reporting(0);
			require MYPHP_TEMP_PATH . '/~boot.php';
		}
		Application::run();

	}

	/**
	 * [_set_const 设置常用常量集合的函数]
	 * @AuthorHTL
	 * @DateTime  2015-11-06T11:35:41+0800
	 */
	private static function _set_const(){
		//===========================================取得目前的路径
		$path = str_replace('\\', '/', __FILE__);
		//===========================================设置框架常量
		define("MYPHP_PATH",dirname($path)); 							//myPHP框架目录
		define("MYPHP_CONFIG_PATH", MYPHP_PATH.'/Config');				//框架配置目录	
		define("MYPHP_DATA_PATH", MYPHP_PATH.'/Data');					//框架公用资源目录
		define("MYPHP_LIBS_PATH", MYPHP_PATH.'/Libs');					//框架核心库目录
		define("MYPHP_EXTENDS_PATH", MYPHP_PATH .'/Extends');			//框架扩展目录

		define("MYPHP_CORE_PATH", MYPHP_LIBS_PATH .'/Core');			//框架核心类目录
		define("MYPHP_FUNCTION_PATH", MYPHP_LIBS_PATH .'/Functions'); 	// 框架公用函数目录

		define("MYPHP_TPL_PATH", MYPHP_DATA_PATH .'/Tpl');				//框架默认模板

		define("MYPHP_TOOL_PATH", MYPHP_EXTENDS_PATH . '/Tool');		//框架扩展工具目录
		define("MYPHP_ORG_PATH", MYPHP_EXTENDS_PATH . '/Org');			//框架扩展外部包目录



		//============================================设置应用项目常量
		define("ROOT_PATH",dirname(MYPHP_PATH));						//项目根路径
		define("APP_PATH",ROOT_PATH .'/'. APP_NAME);					//应用路径
		define("APP_CONFIG_PATH", APP_PATH . '/Config');				//应用配置目录
		define("APP_CONTROLLER_PATH", APP_PATH . '/Controller');		//应用控制器目录
		define("APP_TPL_PATH", APP_PATH . '/Tpl');						//应用模板目录
		define("APP_PUBLIC_PATH", APP_TPL_PATH .'/Public');				//应用公用目录

		define("MYPHP_TEMP_PATH", ROOT_PATH . '/Temp');					//临时目录
		define("MYPHP_LOG_PATH", MYPHP_TEMP_PATH . '/log');				//错误日志文件目录
		define("APP_COMPILE_PATH", MYPHP_TEMP_PATH . '/'. APP_NAME .'/Complie' );//模板编译文件目录
		define("APP_CACHE_PATH", MYPHP_TEMP_PATH . '/' . APP_NAME .'/Cache');


		define("MYPHP_COMMON_PATH", ROOT_PATH . '/Common');
		define("MYPHP_COMMON_CONKIG_PATH", MYPHP_COMMON_PATH . '/Config');
		define("MYPHP_COMMON_LIB_PATH", MYPHP_COMMON_PATH . '/Lib');
		define("MYPHP_COMMON_MODEL_PATH", MYPHP_COMMON_PATH . '/Model');
		define("MYPHP_COMMON_PUBLIC_PATH", MYPHP_COMMON_PATH . 'Public');

		//=============================================设置网络应用常量
		$_SERVER['REQUEST_METHOD'] == "POST" ? define("IS_POST", true) : define("IS_POST", false);
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
			define("IS_AJAX", true);
		}else{
			define("IS_AJAX", false);
		}

		define('MYPHP_VERSION','1.0.0');
	}

	/**
	 * [_create_dir 创建文件夹]
	 * @AuthorHTL
	 * @DateTime  2015-11-06T13:38:01+0800
	 * @return    [type]                   [description]
	 */
	private static function _create_dir(){
		$Arr = array(
			APP_PATH,
			APP_CONFIG_PATH,
			APP_CONTROLLER_PATH,
			APP_TPL_PATH,
			APP_PUBLIC_PATH,
			MYPHP_TEMP_PATH,
			MYPHP_LOG_PATH,
			MYPHP_COMMON_PATH,
			MYPHP_COMMON_CONKIG_PATH,
			MYPHP_COMMON_LIB_PATH,
			MYPHP_COMMON_MODEL_PATH,
			APP_CACHE_PATH,
			APP_COMPILE_PATH
		);

		foreach ($Arr as $v) {
			is_dir($v) || mkdir($v, 0777, true);
		}

		//把框架默认模板载入到应用下
		is_file(APP_TPL_PATH . '/success.html') || copy(MYPHP_TPL_PATH . '/success.html', APP_TPL_PATH . '/success.html');
		is_file(APP_TPL_PATH . '/error.html')   || copy(MYPHP_TPL_PATH . '/error.html', APP_TPL_PATH   . '/error.html');
	}

	/**
	 * [_import_file 载入框架所需文件]
	 * @AuthorHTL
	 * @DateTime  2015-11-06T13:57:01+0800
	 * @return    [type]                   [description]
	 */
	private static function _import_file(){
		$fileArr = array(
			MYPHP_CORE_PATH . '/log.class.php',
			MYPHP_FUNCTION_PATH . '/function.php',
			MYPHP_ORG_PATH . '/Smarty/Smarty.class.php',
			MYPHP_CORE_PATH . '/SmartyView.class.php',
			MYPHP_CORE_PATH . '/Appcation.class.php',
			MYPHP_CORE_PATH . '/Controller.class.php',
			// MYPHP_CORE_PATH . '/Route.class.php'
		);

		$str = "";

		foreach ($fileArr as $v) {
			$str .= trim(substr(file_get_contents($v), 5, -2));
			require_once $v;
		}

		$str = "<?php\r\n" . $str;
		file_put_contents(MYPHP_TEMP_PATH . '/~boot.php', $str) || die('access not allow');
	}

}

$app = new Appcation();
$app::run();