<?php
require('../install/panduang.php');
require("pd.php");
$ip=$_SERVER["REMOTE_ADDR"];
$time=date('Y-m-d H:i:s');
$url=@$_SERVER["HTTP_REFERER"];
?>
﻿<!DOCTYPE html>
<html><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,user-scalable=no">
<title>登录到沃の手机鬼故事</title>
<meta name="Keywords" content="登录,登录到鬼故事用户中心,沃の鬼故事"><meta name="description" content="登录到我的空间,鬼故事交流中心,手机看鬼故事_guigs.cn">
<style type="text/css">
body {font-size: 16px;background: #eee;
margin:3px;color:#454549}a:link,a:visited {text-decoration:none;color:#004299;}#input {width:%87;padding:3px;line-height:23px;border-radius:2px;color:#336699;border:solid 0px #f2eada;}#b{background:#cbc547;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}#c{background:#a1a3a6;padding:5px;}#d{background:#c99979;padding:5px;color:red;border-radius:0px 0px 2px 2px;}#img{background:#fff;padding:5px;border-radius:2px;color:#336688}#submit{background:#abc88b;border-radius:3px;border:0px;width:50%;padding:5px;color:#fff}ul{padding:0px;margin:0px}li{padding:8px;background:url(../img/right.png) no-repeat 97% center #fff;-webkit-background-size: 5px auto;overflow:hidden;white-space:nowrap;border-top:1px solid #f4f3f2;}</style></head><body>
<div id="b"><b>登录</b>(触屏版)</div>
<?php
if($url != "http://127.0.0.1:8080/zc/login.php"){
$_SESSION['url']=$url;
}
if(@!$_POST['submit']){
?>
<div id="c">
<form action="" method="post">帐号：<br/><input name="zh" autocomplete="off" type="text" placeholder="请输入帐号" id="input" value="<?php echo @$_GET[zh]; ?>"><br/>密码：<br/><input  name="mm" autocorrect="off" type="password" placeholder="请输入密码" id="input" value="<?php echo @$_GET['mm']; ?>"><br/><a href="zm.php" class="zindex zweb">忘记密码?</a><br/><input type="submit" name="submit" value="登录" id="submit"><b id="img"><a href="reg.php">注册</a></b></form></div><div id="d"><a href="../">首页</a><b style="float:right;font-size:13px">版权©沃の</b></div>
<?php
}else{
echo '<div id="d">';
$帐号=$danger->fangzhuru(trim($_POST['zh']));
$密码=$danger->fangzhuru(trim($_POST['mm']));
$sqlStr="select * from `name` where `id`='$帐号' or `sj`='$帐号'";
$resul=mysql_query($sqlStr);
$sj=@mysql_fetch_assoc($resul);
$手机=$sj['sj'];
$密码密=md5($密码.$手机);
$sqltr="select * from `name` where (id='$帐号' and mm='$密码密') or (mm='$密码密' and sj='$帐号')";
$resul=mysql_query($sqltr);
$row=@mysql_fetch_assoc($resul);
$uid=$row['id'];
if($帐号==""){
echo "帐号不能为空
<a href='' style='float:right'>返回</a>";
}elseif($row){
$_SESSION['sid']=$密码密;
$_SESSION['uid']=$uid;
echo "<ul><li>你好!{$sj['name']}</li><li>上次登录{$sj['time']}</li><li>共登录{$sj['ci']}次</li><a href='../name/index.php?sid=$密码密&uid=$uid'><li>进入地盘</li></a><a href='{$_SESSION['url']}'><li>回来源地址</li></a><a href='../'><li>回到首页</li></a></ul></div>";
$money=$sj['ci']+1;
$sqlstr="update `name` set `ci`=$money where `id`=$uid";
$pdpd=mysql_query($sqlstr);
$sql="update `name` set `ip`='$ip',time='$time' where id=$uid";
$pdpd=mysql_query($sql);
}else{
echo '登录失败  <a href="" style="float:right">返回</a></div>';
}
mysql_free_result($resul);
}
close();
?>
</body></html>