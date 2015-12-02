<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no">
<title>QQ号注册</title>
<link><link>
<style type="text/css">
body {
font-size: 16px;
background: #fedcbd;
margin:3px;
}
a:link,a:visited {text-decoration:none; color:#004299;}
HR{border:1px solid #6699cc;}
#input {
width:%87;
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;
border:solid 0px #f2eada;
}
#b{background:#cbc547;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}
#c {background:#a1a3a6;padding:5px;color:#fff;}
#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}
#img{background:#abc88d;padding:5px;border-radius:2px;color:#fff;border:0px;margin-left:0px}
#submit {background:#abc88b;border-radius:3px;border:0px;width:68%;padding:5px}
ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:5px;margin-top:1px}
</style>
</head>
<body>
<div id="b">QQ注册</div>
<div id="c">
<?php
require("../install/panduang.php");
$danger=new danger();
$getqq=$danger->fangzhuru(@$_GET['qq']);
if($getqq==""){
?>
<form action="" method="get">
<input name="qq" type="text" placeholder="输入QQ号" size="10" id="input">
<input type="submit" name="submit" value="获取验证码" id="img">
</form>
<?php
}else{
$partern = "/^\d{5,10}$/";
$pqq = preg_match($partern,$getqq);
if($pqq!=1){
echo "QQ号错误!";
exit();
}
?>
<form action="qqgo.php" method="post">
<input name="qq" type="hidden" value="<?php echo @$_GET['qq']; ?>">
<input name="code" type="text" placeholder="验证码" id="input">
<input type="submit" name="submit" value="点击确定注册" id="submit">
</form>
<?php
$sql="select * from `name` where `sj`='$getqq'";
$query=mysql_query($sql);
$rows=mysql_fetch_assoc($query);
if($rows){
echo "QQ已经注册";
}else{
$code=rand(1000,9999);
$sqlcq="select * from code where qq='$getqq'";
$query=mysql_query($sqlcq);
$rows=mysql_fetch_assoc($query);
if($rows){
$sql="update code set code='$code' where qq=$getqq";
$pdpd=mysql_query($sql);
}else{
$sqlstr = 'insert into code(id,qq,code) values (Null,"'.$getqq.'","'.$code.'")';
$pdpd=mysql_query($sqlstr);
}
@file_get_contents("http://pt.3g.qq.com/s?aid=nLogin3gqqbysid&3gqqsid=$adminqqsid");
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://q16.3g.qq.com/g/s?sid=$adminqqsid");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,"u=$getqq&saveUrl=0&do=send&on=1&aid=发送&msg=您正在注册沃帐号，验证码是$code");
$rztext=curl_exec($ch);
curl_close($ch);
if(strstr($rztext,"成功")){
echo "验证码已经发至你QQ，请查收";
mysql_free_result($query);
}else{
echo "网络繁忙，请稍候再试";
}}
mysql_free_result($query);
}
?>
<br/>
注册说明，输入你的QQ号<br/>
点击获取验证码、
<br/>
打开QQ软件获取QQ790131300<br/>
发来的信息、如果没收到加为好友<br/>
帐号和密码是你的QQ号
</div>
<div id="d">沃の©版权所有
<b style="float:right;"><a href="login.php">登录</a></b></div>
</body></html>