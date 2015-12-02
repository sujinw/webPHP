<?php
/**
* 参数说明。
* 备注：。
*
* @method 变量名
* @param {String *} 参数
* @return {Object} 返回
*/


/**
* 用于应对页面的ajax请求动作
*/

require_once "../../main/dao/DaoUser.class.php";
$action = $_GET['action'];
$user_name = $_POST['user_name'];
$data = array('user_name' => $user_name);  
class ajaxAction {
	public $arr;
	public function checkUserName($data){
    	$DaoUser = new DaoUser();
		if($DaoUser->getUserInfoByUsername($data['user_name']) == '0'){
			echo "0";
		}else{
			echo "1";
		}
	}
}

if($action == "checkUserName"){
	$act = new ajaxAction();
	$act->checkUserName($data);
}