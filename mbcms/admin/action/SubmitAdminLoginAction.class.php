<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-02 22:36:56
 */

require_once 'ActionBase.class.php';
require_once "/model/SubmitAdminLoginModel.class.php";
require_once "/../main/lib/User.class.php";
class SubmitAdminLogin extends ActionBase {
	
    public function action(){
    	//页面展示
    	$model = new SubmitAdminLoginModel();
    	$result = $model->getResult();
       
    	$result['params']['safe']['action'] = 'adminLogin';
    	if($result['code'] == 1){
    		$tplVar = array(
    			$result['error_msg'] => 1,
    			'params'=>$result['params'],
    			);
    		
    		$this->tpl->assign($tplVar);
            $this->tpl->assign('tips', '登录不成功请检查您的用户名或密码！');
            $this->tpl->assign('url', 'index.php?action=AdminLogin');

    	}else{
            //登录状态的维持
            $adminUserInfo['admin_id'] = $result['data']['admin_id'];
            $adminUserInfo['admin_name'] = $result['data']['admin_name'];
            User::_setAdminUserInfo($adminUserInfo);

            $this->tpl->assign('tips', '登录成功，正在为您跳转至首页。。。');
            $this->tpl->assign('url', 'index.php?action=index&admin_name='.$result['data']['admin_name']);

        }
        $this->tpl->display('LoginTips.tpl');

    }
}