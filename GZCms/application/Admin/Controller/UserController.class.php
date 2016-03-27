<?php
/**
* 用户管理控制器
*/
class UserController extends AdminController{
	
	//用户列表
	public function listUser(){
		$total = (int)file_get_contents(APP_CACHE_PATH .'/DataBase_id/gz_user.txt');
		$params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'', #(必须)
            'parameter' =>'index.php?p=?',  #(必须)
            'now_page'  =>$_GET['p'],  #(必须)
            'list_rows' =>5, #(可选) 默认为15
		);
		$page = new Page($params);
		$now = ((int)$_GET['p']-1) * (int)$params['list_rows'];
		$end = $params['list_rows'];
		$user = K('User')->getUserLimit($now.','.$end);

		$this->assign('page',$page->show(1));
		$this->assign('user',$user);
		$this->display();
	}

	//添加用户操作
	public function addUser(){
		if(IS_POST){
			//上传头像的路径
			$path = 'Upload/UserImages/'.date("Y/m/d");
			

			$data = $_POST;
			$data['password'] = md5($data['password']);
			$data['create_time'] = time();
			$user = K('User');
			if(!$user->valid($data['username'])){
				if(isset($_FILES['user_img'])){
					$upload = new Upload($path);
					$files = $upload->upload();
				}
				$data['user_img'] = $files[0]['path'];
				if($user->addUser($data)){
					$this->success('用户添加成功！',U('listUser',array('p'=>1)));
				}else{
					$this->error('用户添加失败了，请检查填写信息!',U('addUser'));
				}
			}else{
				$this->error('用户添加失败，请检查填写信息!',U('addUser'));
			}
			
		}

		$this->display();
	}

	//ajax验证用户名
	public function ajaxUser(){
		if(IS_AJAX){
			$username = $_POST['username'];
			// p($username);die;
			$user = K('User')->valid($username);
			if(!$user){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$this->error("你访问的页面不存在",U('listUser'));
		}
	}

	//用户等级管理
	public function userLever(){
		$total = (int)file_get_contents(APP_CACHE_PATH .'/DataBase_id/gz_userlever.txt');
		$params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'', #(必须)
            'parameter' =>'index.php?p=?',  #(必须)
            'now_page'  =>$_GET['p'],  #(必须)
            'list_rows' =>5, #(可选) 默认为15
		);
		$page = new Page($params);
		$now = ((int)$_GET['p']-1) * (int)$params['list_rows'];
		$end = $params['list_rows'];
		$lever = K('UserLever')->getUserLever($now.','.$end);
		$this->assign('page',$page->show(1));
		$this->assign('lever',$lever);
		$this->display();
	}

	//添加用户等级
	public function addUserLever(){
		if(IS_AJAX){
			$name = $_POST['lever_name'];
			if(K('UserLever')->validate($name)){
				echo 1;
			}else{
				echo 0;
			}
			return;
		}elseif(IS_POST){
			$data = $_POST;
			if(K('UserLever')->addLever($data)){
				$this->success('等级添加成功',U('userLever',array('p'=>1)));
			}else{
				$this->error('等级添加失败',U('addUserLever'));

			}
			return;
		}


		$this->display();
	}
	
}
?>