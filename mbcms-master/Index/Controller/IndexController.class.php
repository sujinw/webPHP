<?php
/*
 * 默认控制器
 */
class IndexController extends AuthorController{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo '<h2>欢迎使用myPHP框架 (:!</h2>';
	
		// $this->view(CONTROLLER,ACTION);
		$this->display();
	}
}

?>