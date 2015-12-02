<?php
/**
* 
*/
class SmartyView {
	private static $smarty = NULL;//保存smarty对象
	public function __construct()
	{
		//smarty配置
		if(!is_null(self::$smarty)) return;
			$smarty = new Smarty();

			$smarty->template_dir = APP_TPL_PATH . '/' . CONTROLLER .'/';		//模板目录
			$smarty->compile_dir  = APP_COMPILE_PATH;							//模板编译目录
			$smarty->cache_dir = APP_CACHE_PATH;								//模板缓存目录
			$smarty->left_delimiter = C('LEFT_DELIMITER');						//左边界符号
			$smarty->right_delimiter = C('RIGHT_DELIMITER');					//右边界符
			$smarty->caching = C('CACHE_ON');									//缓存开启
			$smarty->cache_lifetime = C('CACHE_TIME');							//缓存时间
			self::$smarty = $smarty;
	}
	protected function display($tpl){
		return self::$smarty->display($tpl,$_SERVER['REQUEST_URI']);
	}
	protected function assign($var,$value){
		self::$smarty->assign($var,$value);
	}

	protected function is_cached($tpl=NULL){
		if(!C('SMARTY_ON')) halt('请先开启smarty!');
		$tpl = $this->get_tpl($tpl);
		return self::$smarty->is_cached($tpl,$_SERVER['REQUEST_URI']);

	}
}
?>