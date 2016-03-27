<?php
/**
* 后台登录模块
*/
class LoginController extends Controller{
	
	public function index(){
		if(IS_POST){
			//处理后台登录
			$gzdata = array(
				'username'=>$_POST['username'],
				'password'=>md5($_POST['password'])
			);
			// p($gzdata);die;
			$code = K('User')->adminCheck($gzdata);
			switch ($code) {
				case 1:
					$msg = "管理员账户不存在，请检查填写是否正确!";
					$url = __APP__.'?m=admin&c=login';
					$this->error($msg,$url);
					break;
				case 2:
					Rbac::login($gzdata['username'], $gzdata['password']);
					// p($_SESSION);die;
					$msg = "验证成功，即将进入后台！!";
					$url = __APP__.'?m=admin&c=index';
					$this->success($msg,$url);
					break;
				case 3:
					$msg = "密码错误，请重新检验你的管理账户密码！!";
					$url = __APP__.'?m=admin&c=login';
					$this->error($msg,$url);
					break;
			}
		}

		$this->display();
	}

	public function checkUser(){
		if(IS_AJAX){

		}else{
			return $this->error('页面不存在！',__APP__.'?m=admin&c=index');
		}
	}
}
?>