<?php
/**
* 前台登录控制
*/
class LoginController extends AuthorController{
	
	public function login(){

		if(IS_POST){
			$data = $_POST;

			if($info = K('User')->validate($data['username'],$data['password'])){
				$_SESSION['gz_username'] = $info['username'];
				$_SESSION['gz_userid']   = $info['id'];
				$login = M('userLogin');
				if($login->where("uid='".$info['id']."'")->one()){
					$login->where("uid='".$info['id']."'")->update(array('login_time'=>time(),'login_ip'=>ipton(ip_get_client())));
				}else{
					$login->add(array('uid'=>$info['id'],'login_time'=>time(),'login_ip'=>ipton(ip_get_client())));
				}
				
				$this->success('登录成功，正在跳转至首页...',U('Index/index/index'));
				if($data['remanber']){
					cookie('gezi_username',$info['username']);
					cookie('gezi_userid',$info['id']);
				}
			}else{
				$this->error('登录失败，请检查用户名和密码',U('Index/Login/login'));
			}

			return;
		}

		$this->v();
	}
}
?>