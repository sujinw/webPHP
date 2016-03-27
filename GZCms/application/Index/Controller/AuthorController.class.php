<?php
/**
* 前台默认验证控制器
*/
class AuthorController extends Controller{

	public function __init(){
		define('__TPUBLIC__',		__ROOT__.'/Template/Public/'.MODULE);
		define('__ZPUBLIC__',		__ROOT__.'/Template/Public/');
		define('SYS_TIME', time());
		$this->setTag();
	}
	
	
	//更改前台模板位置
	public function getTemplate(){
		$t = K('Template')->getTemp();
		$template = !empty($t) ? $t['tsign'].'/' : "default";

		$tdir = ROOT_PATH.'/Template/'.$template.CONTROLLER.'/'.ACTION . '.html';

		return $tdir;
	}

	//改变display
	public function v(){
		return $this->display($this->getTemplate());
	}

	//设置标签
	public function setTag(){
		//注册文章标签
		$this->registerPlu("arclist","arclist");
		//栏目标签
		$this->registerPlu("chanal","chanal");
		$this->registerPlu("pagenext","pagenext");

	}
}
?>