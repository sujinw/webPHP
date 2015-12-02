<?php

$type = isset($_GET['type']) ? $_GET['type'] : 'none';
$adminName = !empty($_GET['adminName']) ? $_GET['adminName'] : '';
$code = !empty($_GET['code']) ? $_GET['code'] : '';


require_once '../Dao/DaoAdminUser.class.php';
session_start();
if($type == 'none'){
	echo "这是一个空白页面！";
}
elseif($type == 'adminUser'){
	$DaoAdminUser = new DaoAdminUser();
	$result = $DaoAdminUser ->getAdminUserByName($adminName);

	echo $result;
}
elseif ($type == 'adminCode') {
	if($_SESSION['admincode'] == $code){
		echo '1';
	}else{
		echo '0';
	}
}