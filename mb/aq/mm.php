<?php
require("../install/panduang.php");

?>
﻿<!DOCTYPE html><html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<title>修改帐号密码</title>
<link><link>

<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
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

#img{background:#fff;padding:5px;border-radius:2px;color:#336688}
#submit {background:#abc88b;border-radius:3px;border:0px;width:65%;padding:5px}
</style>
</head>
<body>
<?php
if(@!$_POST['submit']){
?>
<div id="b">修改密码</div>

<div id="c">
<form action="" method="post">
<input type="text" name="nc" maxlength="7" placeholder="昵称" id="input"/>

<input type="text" name="m" maxlength="16" placeholder="请输入密码" id="input"/>

<input type="text" name="mm" maxlength="16"placeholder="确定密码" id="input"/>
<br/>
<input type="submit" name="submit" value="确定修改" id="submit">
</form>
</div>
<?php
}else{
$昵称=$danger->fangzhuru($_POST['nc']);
$密=$danger->fangzhuru($_POST['m']);
$密码=$danger->fangzhuru($_POST['mm']);
if($昵称==""){
$昵称=$name;
}
if(strlenutf8($昵称)<1 || strlenutf8($昵称)>7){echo "昵称长度不能小于1大于7";
}elseif(strlenutf8($密)<6){
echo "密码长度不能小于6位";
}elseif(strlen($密)>16){
echo "密码长度不能大于16位";
}elseif($密!=$密码){
echo "两次密码不同";
}else{
$密码密=md5($密码.$nameqq);
$sql="update name set mm='$密码密',name='$昵称' where id='$nameid'";
$pdpd=mysql_query($sql);
if($pdpd){
echo "<div id='b'>修改成功</div>";
}else{
echo "<div id='b'>修改失败</div>";
}
}}
?>
<div id="d">沃の©QQ:790431300
<b style="float:right;"><a href="index.php?sid=<?php echo $sid; echo "&uid=$uid"; ?>">安全中心</a></b></div>
</body></html>