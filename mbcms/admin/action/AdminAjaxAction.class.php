<?php

require_once 'ActionBase.class.php';
require_once '/../main/dao/DaoUser.class.php';
require_once ADMINDIR.'/dao/DaoFenlei.class.php';
require_once ADMINDIR.'/model/AdminAjaxModel.class.php';


class AdminAjax extends ActionBase {
	
    public function action(){
    	//页面展示
    	$AdminAjaxModel = new AdminAjaxModel();
    	$result = $AdminAjaxModel->getResult();
    	$type = $result['params']['safe']['type'];
    	if($type == 'user'){
			$DaoUser = new DaoUser();
			$result = $DaoUser -> getUserInfoByUsername($result['params']['safe']['userName']);
			if($result){
				echo '1';
			}else{
				echo '0';
			}
		}
		else if($type == 'fenlei' ){
			$DaoFenlei = new DaoFenlei();
			$result = $DaoFenlei->getFenleiInfoByName($result['params']['safe']['fenleiName']);
			if($result){
				echo '1';
			}else{
				echo '0';
			}
		}


    }

}

// $type = !empty($_GET['type']) ? $_GET['type'] : '';
// $userName = !empty($_POST['userName']) ? $_POST['userName'] : '';
// $fenleiName = !empty($_POST['fenleiName']) ? $_POST['fenleiName'] : '';

// if($type == 'user'){
// 	$DaoUser = new DaoUser();
// 	$result = $DaoUser -> getUserInfoByUsername($userName);
// 	if($result){
// 		echo '1';
// 	}else{
// 		echo '0';
// 	}
// }
// else if($type == 'fenlei' ){
// 	$DaoFenlei = new DaoFenlei();
// 	$result = $DaoFenlei->getFenleiInfoByName($fenleiName);
// 	if($result){
// 		echo '1';
// 	}else{
// 		echo '0';
// 	}
// }
