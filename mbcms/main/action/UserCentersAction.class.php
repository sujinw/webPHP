<?php
/**
 * 
 * @authors Black
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once DIR . "/main/model/UserCenterModel.class.php";

class UserCenters extends ActionBase {
	
    public function action(){
    	//页面展示
    	$UserCenter = new UserCenterModel();
    	$result = $UserCenter->getResult();

    	// print_r($result);

    	//print_r(array_slice($result,-1));



        $this->tpl->assign('result',$result['data']);
    	$this->tpl->display('userCenter.tpl');
    }
}