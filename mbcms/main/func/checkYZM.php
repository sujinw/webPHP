<?php
session_start();

$action = $_GET['action'];
$code = trim($_POST['code']);
if($action=='code'){ //检验数字验证码
	if($code==$_SESSION["code"]){
       echo '1';
    }
    else{
    	echo "0";
    }
}