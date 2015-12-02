<?php
session_start();
require("config.php");
require("danger.php");
$danger=new danger();
@$sid=$danger->fangzhuru($_SESSION['sid']);
@$uid=$danger->fangzhuru($_SESSION['uid']);
isset($sid)?session_id():$sid=session_id();
@setcookie('sid', $sid, time()+3156000);
isset($uid)?session_id():$uid=session_id();
@setcookie('uid', $uid, time()+3156000);
$sql="select * from `name` where `id`='$uid' and `mm`='$sid'";
$resname=mysql_query($sql);
$name=mysql_fetch_assoc($resname);
if(isset($name)){
$nameid=$name['id'];//id
$nameuser=$name['name'];//用户名
$nameqq=$name['sj'];//qq
$namemoney=$name['money'];//用户金币
$namevip=$name['vip'];//yes为是
$nametime=$name['time'];//上次登录时间
}
mysql_free_result($resname);
/*判断登录*/
function namelogin($nameuser){
if($nameuser==""){
header("location:../zc");
exit();
}
}
$wjt="yes";//伪静态
?>