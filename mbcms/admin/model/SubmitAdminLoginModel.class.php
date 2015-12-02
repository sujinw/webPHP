<?php
/**
 * 
 * @authors Rulic (you@example.org)
 * @date    2015-04-02 22:40:31
 */
require_once '/../main/model/ModelBase.class.php';
require_once "/Dao/DaoAdminUser.class.php";
class SubmitAdminLoginModel extends ModelBase {
    
    //执行逻辑
    public  function preform(){
    	$DaoUser = new DaoAdminUser();
    	$ret = $DaoUser->getAdminUserInfoByUsernameAndPassWord($this->params['safe']['admin_name'],$this->params['safe']['admin_password']);
        print_r($ret);
        if(empty($ret)){
    		throw new Exception('error_login',1);
    	}
        $this->result['data'] = $ret[0];
    }


	//检测参数
    public function checkparams(){
    	if(empty($this->params['safe']['admin_name'])){
    		throw new Exception("error_name", 1);
    	}

    }
}