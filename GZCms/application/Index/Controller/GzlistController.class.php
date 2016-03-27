<?php 
/**
* 内容列表
*/
class GzlistController extends AuthorController{

	public function cate(){
		$this->assign('cid',$_GET['cid']);
		$this->v();
	}
}
?>