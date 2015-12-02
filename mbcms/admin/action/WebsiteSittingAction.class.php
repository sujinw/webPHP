<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once ADMINDIR . "/model/WebSiteSittingModel.class.php";

class WebSiteSitting extends ActionBase {
	
    public function action(){
    	//页面展示
    	$webSiteSitting = new webSiteSittingModel();
    	$result = $webSiteSitting->getResult($this->user_info);
    	if($result['code'] == 1 && $result['error_msg'] == 'error_name'){
            $this->checkLogin();
            exit;
        }

        print_r($result);

        $this->tpl->assign('admin_name',$this->user_info['admin_name']);

        $this->tpl->assign('webresult',$result['data']['list'][0]);
    	$this->tpl->display('WebsiteSetting.tpl');
    }
}