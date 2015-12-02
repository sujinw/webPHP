<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-03 20:59:26
 */
header("Content-type:text/html, charset:utf-8");
require_once 'ActionBase.class.php';
require_once DIR . "../main/model/SubmitRegisteredModel.class.php";

class SubmitRegistered extends ActionBase {
    
    public function action(){
    	//页面展示
    	$model = new SubmitRegisteredModel();
    	$result = $model->getResult();
    	print_r($result['params']);
    	if($result['code'] == '1'){
    		$this->tpl->assign("tips","用户名已经存在");
    		$this->tpl->assign("action", "Registered");
    	}else{
    		if($result['code'] == 0){
    		$this->tpl->assign("tips","注册成功，3s后跳转首页。。。");
    		$this->tpl->assign("action", "index");
    		}
    	}
    	$this->tpl->display('tips.tpl');
    }
}