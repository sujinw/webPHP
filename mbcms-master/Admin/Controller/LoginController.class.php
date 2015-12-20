<?php
/**
* 登录控制器
*/
class LoginController extends Controller{
	
	public function index(){
		$this->display();
	}
	public function code(){
		$code = new Code();
		$code->show();
	}
	public function login(){
		if(IS_POST){
			$admin = K('AdminUser');
			$userInfo = $admin->validate($_POST['admin_username'],$_POST['admin_pwd']);
			if($userInfo){
				$_SESSION['uid'] = $userInfo['id'];
				$_SESSION['uname'] = $userInfo['admin_username'];
				$data = array(
					'admin_logintime' => time(),
					'admin_loginip'   => ipton(ip_get_client())
					);
				// p($userInfo);
				$admin->update_admin('id='.$userInfo['id'], $data);
				Rbac::login($userInfo['admin_username'], $userInfo['admin_pwd']);
				// p($_SESSION);die;
				$this->success('登录成功',__APP__.'?c=Index');
			}else{

				$this->error('登录失败,请检查您的用户名和密码');
			}
		}
	}
	/**
	 * [check_code ajax验证验证码]
	 * @Author   Rukic
	 * @DateTime 2015-11-25T15:56:48+0800
	 * @return   [type]                   [description]
	 */
	public function check_code(){
		if(!IS_AJAX)$this->error('您访问的页面不存在');
		$code = strtoupper($_POST['verfy']);
		if($code == $_SESSION['code']){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function login_out(){
		session_unset();
		session_destroy();
		$this->success('退出成功',__APP__ . '?c=Login&a=index');
	}
}