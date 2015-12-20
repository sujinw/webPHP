<?php
/**
* 论坛管理控制器
*/
class ForumController extends CommonController{
	
	public function forum(){
		$this->display();
	}
	// 添加新的版块
	public function addForum(){
		$db=M('forum');
		if(IS_POST){//处理表单提交
			$data = $_POST;
			$data['create_time'] = time();
			if($dbid = $db->add($data)){
				$path = MYPHP_TEMP_PATH .'/Dbid/Forum';
				is_dir($path) || mkdir($path, 0777, true);
				chmod($path,0777);
				if(file_put_contents($path.'/forumId.txt',$dbid)){

					$this->success('保存版块成功',__APP__."?c=Forum&a=forum");
				}
			}else{
				$this->error('添加失败，请重新添加');
			}
		}

		$forum = $db->where('is_delete=0')->all();
		$count = count($forum);
		$forum = alread_column(Data::tree($forum,'fname','fid','father_fid'));
		// p($forum);die;
		$this->assign('count',$count);
		$this->assign('forum',$forum);
		$this->display();
	}
}
?>