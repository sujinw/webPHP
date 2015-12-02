<?php
/**
 * 
 * @authors rukic
 * @date    2015-10-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once ADMINDIR . "/model/AdminLoginModel.class.php";

class adminLogin extends ActionBase {
	
    public function action(){
    	//页面展示
    	$IndexModel = new AdminLoginModel();
    	$result = $IndexModel->getResult();
		$tplVar = array(    			
    			'params'=>$result['params'],
    	);
    	$this->tpl->assign($tplVar);
    	$this->tpl->display('admin_login.tpl');
    }
}