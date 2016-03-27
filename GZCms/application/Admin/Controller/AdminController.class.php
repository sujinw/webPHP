<?php
/**
* 后台必须验证总类
*/
class AdminController extends Controller{
	
	public function __init(){
		// p(!isset($_SESSION['uid']));
		// p(!isset($_SESSION['uname']));
		// p(!Rbac::isLogin());
		// p(!Rbac::checkAccess());
		// die;
		if(!isset($_SESSION['uid']) || !isset($_SESSION['uname']) || !Rbac::isLogin() ){
			go(__APP__ . '?m=admin&c=Login');
		}
		if(!Rbac::checkAccess()){
			$this->error('对不起没有操作权限，请联系管理员获取0_0',U('index/index/index'));
		}
	}
}
?>