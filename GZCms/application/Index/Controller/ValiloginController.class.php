<?php
/**
* 验证登录状态
*/
class ValiloginController extends AuthorController{
	
	public function __auto(){
		if(!isset($_SESSION['username']) || !isset($_SESSION['userid'])){
			$this->error("您还没有登录，请先登录",U('Index/Login/login'));
		}
	}
}
?>