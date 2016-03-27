<?php
/**
* 前台模板管理控制器
*/
class TemplateController extends AdminController{
	
	public function template(){
		$this->assign('template',K('Template')->template());
		$this->display();
	}
	public function addTemplate(){
		if(IS_POST){
			$data = $_POST;
			$data['create_time'] = time();
			$path = 'Upload/TemplateImages/';
			if(isset($_FILES['thumb'])){
				$upload = new Upload($path);
				$files = $upload->upload();
			}
			$data['thumb'] = $files[0]['path'];

			if(K('Template')->addTemplate($data)){
				$this->success('模板风格添加成功添加成功！',U('template'));
			}else{
				$this->error('模板风格添加失败了，请检查填写信息!',U('addTemplate'));
			}
			// p($data);die;
		}

		$this->display();
	}

	//ajax处理名称
	public function ajaxtemplate(){
		$name = isset($_POST['tname']) ? $_POST['tname'] : 0;
		$sign = isset($_POST['tsign']) ? $_POST['tsign'] : 0;
		// p($name);

		if($name){
			if(K('Template')->ajaxvali("tname='".$name."'")){
				echo 1;
			}else{
				echo 0;
			}
		}elseif($sign){
			if(K('Template')->ajaxvali("tsign='".$sign."'")){
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	//处理选择模板
	public function selectTemplate(){
		$tid = isset($_GET['tid']) ? $_GET['tid'] : 1;
		$t = K('Template');
		if($t->selectTemp("selected=1",array('selected'=>0))&&$t->selectTemp("tid='".$tid."'",array('selected'=>1))){
			$this->success('选择模板成功',U('template'));
		}else{
			$this->error('选择失败',U('template'));
		}
	}

}
?>