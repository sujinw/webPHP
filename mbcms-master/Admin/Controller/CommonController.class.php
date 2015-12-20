<?php
/**
* 自动验证类
*/
class CommonController extends Controller{
	
	public function __init(){
		// p(!Rbac::checkAccess());
		// p(!isset($_SESSION['uid']));
		// p(!isset($_SESSION['uname']));
		// p(!Rbac::isLogin());die;
		if(!isset($_SESSION['uid']) || !isset($_SESSION['uname']) || !Rbac::isLogin() ){
			go(__APP__ . '?c=Login');
		}
		if(!Rbac::checkAccess()){
			$this->error('对不起没有操作权限，请联系管理员获取0_0');
		}
	}
}
?>