<?php
/**
 * 
 * @authors Rukic
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once ADMINDIR . "/model/IndexModel.class.php";
require_once '/../main/lib/User.class.php';

class index extends ActionBase {
	
    public function action(){
    	//页面展示
    	$IndexModel = new AdminIndexModel();
    	$result = $IndexModel->getResult($this->user_info);

    	if($result['code'] == 1 && $result['error_msg'] == 'error_name'){
            $this->checkLogin();
            exit;
        }
  
        $this->tpl->assign('admin_name',$this->user_info['admin_name']);

        $this->tpl->assign($result);
    	$this->tpl->display('index.html');

    }

}