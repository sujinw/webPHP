<?php
/**
* 后台管理员管理控制器
*/
class AdminUserController extends CommonController{
	
	public function index(){
		// p(__ACTION__);exit;
		$db = M('admin');
		$total = $db->count(); 
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
		$data = $db->limit($now.','.$end)->all();
		// p($data);exit;
		$this->assign('data',$data);
		$this->assign('page',$page->show(1));
		$this->display();
	}
	public function add(){
		$this->display();
	}
}
?>