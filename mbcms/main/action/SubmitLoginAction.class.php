<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-02 22:36:56
 */

require_once 'ActionBase.class.php';
require_once DIR . "/main/model/SubmitLoginModel.class.php";
require_once DIR . "/main/lib/User.class.php";
class SubmitLogin extends ActionBase {
	
    public function action(){
    	//页面展示
    	$model = new SubmitLoginModel();
    	$result = $model->getResult();
       
    	$result['params']['safe']['action'] = 'login';
    	if($result['code'] == 1){
    		$tplVar = array(
    			$result['error_msg'] => 1,
    			'params'=>$result['params'],
    			);
    		
    		$this->tpl->assign($tplVar);
            $this->tpl->assign('tips', '登录不成功请检查您的用户名或密码！');
            $this->tpl->assign('action', 'login');

    	}else{
            //登录状态的维持
            $userInfo['user_id'] = $result['data']['user_id'];
            $userInfo['user_nickname'] = $result['data']['user_nickname'];
            User::_setUserInfo($userInfo);

            $this->tpl->assign('tips', '登录成功，正在为您跳转至首页。。。');
            $this->tpl->assign('action', 'login');

        }
        $this->tpl->display('tips.tpl');

    }
}