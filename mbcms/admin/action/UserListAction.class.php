<?php
/**
 * 
 * @authors Black
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once ADMINDIR . "/model/UserListModel.class.php";

class UserList extends ActionBase {
	
    public function action(){

    	//页面展示
    	$UserList = new UserListModel();
    	$result = $UserList->getResult($this->user_info);
        
        if($result['code'] == 1 && $result['error_msg'] == 'error_name'){
            $this->checkLogin();
            exit;
        }
        $result['page'] ? $result['page'] : 1;
        $this->tpl->assign('admin_name',$this->user_info['admin_name']);


        $this->tpl->assign('data',$result['data']['list']);
        $this->tpl->assign('count',$result['count']);
        $this->tpl->assign('page',$result['page']);
    	$this->tpl->display('admin_user.tpl');
    }
}