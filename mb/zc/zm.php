<!DOCTYPE html><html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<title>找回密码</title>
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
#img{background:#abc88d;padding:5px;border-radius:2px;color:#fff;}
#submit {background:#abc88b;border-radius:3px;border:0px;width:65%;padding:5px}
ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:5px;margin-top:1px;color:#e33669}
</style>
</head>
<body>
<div id="b">找回密码</div>
<?php
require_once("../install/panduang.php");
require("pd.php");
$nameqq=@$_GET['qq'];
if($nameqq==""){
?>
<div id="c">
<form action="" method="get">
<input name="qq" type="text" placeholder="请输入注册QQ" id="input">
<input name="yzm" type="hidden" value="yzm" size="10" id="input">
<br/>
<input type="submit" name="submit" value="下一步" id="submit">
</form>
</div>
<?php
}else{
if(@!$_POST['submit']){
$sqlStr="select * from name where sj='$nameqq' and z=1";
$result=mysql_query($sqlStr);
$row=mysql_fetch_assoc($result);
$uid=$row['id'];
$sid=$row['mm'];
if(!$row){
echo '<div id="d">此Q没注册，或者没认证>>><a href="reg.php">点击注册</a></div>';
mysql_free_result($result);
exit();
}else{
?><ul><li>
找回QQ是:<?php echo $nameqq; ?>
</li></ul>
<?php } ?>
<div id="c">
<form action="" method="post">
<input name="code" type="text" placeholder="验证码" size="10" id="input"><b id="img"><a href="<?php
echo "zm.php?qq=$nameqq&yzm=yzm";
?>">再获验证码</a></b>
<br/>
		<input type="submit" name="submit" value="点击找回" id="submit">
</form><br/>
<?php
if(@$_GET['yzm']=="yzm"){
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
file_get_contents("http://pt.3g.qq.com/s?aid=nLogin3gqqbysid&3gqqsid=$adminqqsid");$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://q16.3g.qq.com/g/s?sid=$adminqqsid");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,"u=$nameqq&saveUrl=0&do=send&on=1&aid=发送&msg=您正在找回沃帐号，验证码是$randcode");
$rztext=curl_exec($ch);
curl_close($ch);
if(strstr($rztext,"成功")){
echo "验证码已经发至你QQ，请查收";
}else{
echo "网络繁忙，请稍候再试";
}
}else{
echo "步骤：登录QQ接收验证码、和你注册时一样";
}
?>
</div>
<?php
}else{
$验证码=$danger->fangzhuru(trim($_POST['code']));if($验证码==""){
echo "<b id='img'>不能为空----<a href=''>返回<a></b>";
exit();
}
$randcode=$_SESSION['randcode'];
if($验证码==$randcode){
$sqlStr="select * from name where sj='$nameqq' and z=1";
$result=mysql_query($sqlStr);
$row=mysql_fetch_assoc($result);
$uid=$row['id'];
$sid=$row['mm'];
$_SESSION['sid']=$sid;
$_SESSION['uid']=$uid;
echo "<div id='c'>验证成功>>><a href='../aq/index.php?sid=$sid&uid=$uid'>修改密码</a></div>";
}else{
echo "验证码错误";
exit();
}
}
mysql_free_result($result);
}
?>

<div id="d">沃の©版权所有
<b style="float:right;"><a href="login.php">登录</a></b></div>
</body></html>