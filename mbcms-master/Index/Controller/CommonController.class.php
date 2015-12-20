<?php
/**
* 必须验证的动作
*/
class CommonController extends Controller{

	protected $template;
	protected static $t=NULL;

	function __auto(){
		if(is_null(self::$t)){
			self::$t = K('Template');
			$this->template = self::$t->getTemplate();
		}

		define('APP_TEMPLATE',ROOT_PATH.'/template/'.$this->template);   //模板目录
		define('APP_LIST',APP_TEMPLATE.'/list');						//列表模板
		define('APP_INDEX',APP_TEMPLATE.'/index');						//首页模板
		define('APP_VIEW',APP_TEMPLATE.'/view');						//内容模板
		define('APP_UCENTER',APP_TEMPLATE.'/ucenter');					//会员中心模板
		define('__TEMPPUBLIC__',__ROOT__.'/template/'.$this->template.'/public');					//公共资源
	
	}

	public function view($c,$a){
		return $this->display(APP_TEMPLATE.'/'.$c.'/'.$a.'.html');
	}
}
?>