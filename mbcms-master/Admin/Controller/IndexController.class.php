<?php
/*
 * 默认控制器
 */
class IndexController extends CommonController{
	public function index(){
		$this->display();
	}
	/**
	 * [welcome 后台欢迎界面]
	 * @Author   Rukic
	 * @DateTime 2015-11-25T20:57:53+0800
	 * @return   [type]                   [description]
	 */
	public function welcome(){
		$data = K('AdminUser')->get_admin($_SESSION['uid']);	
		$welcome = array(
			'OS'		=> get_os(),
			'browser' 	=> browser_info(),
			'PHPV' 		=> phpversion(),
			'MYPHPV' 	=> MYPHP_VERSION,
			'admin_user'=> $_SESSION['uname'],
			'id'		=> $_SESSION['uid'],
			'login_time'=> $data['admin_logintime'],
			'login_ip'  => ntoip($data['admin_loginip'])
			);
		$this->assign('w',$welcome);
		$this->display();
	}
}

?>