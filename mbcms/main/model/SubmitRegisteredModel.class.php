<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-03 20:56:59
 */
require_once 'ModelBase.class.php';
require_once DIR . "../main/dao/DaoUser.class.php";
class SubmitRegisteredModel extends ModelBase {

    //执行逻辑
    public  function preform(){
    	$DaoUser = new DaoUser();
        //检测用户是否存在
        $data['user_name'] = $this->params['safe']['user_name'];
        $data['user_password'] =  md5($this->params['safe']['user_password']);
        $data['user_nickname'] = $this->params['safe']['user_nickname'];
        $data['user_qm'] = "这家伙很懒还没有签名！";
        $data['user_inTime'] = time();
        if($DaoUser->getUserInfoByUsername($data['user_name']) == '0'){
            $ret = $DaoUser->addUser($data);
            $this->result['code'] = $ret == 0 ?  1 : 0;
        }else{
            $this->result['code'] = 1;
        }
        
    }


	//检测参数
    public function checkparams(){
        if(empty($this->params['safe']['user_name'])){
            throw new Exception("error_name", 1);
        }
     }
}