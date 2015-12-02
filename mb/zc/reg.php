<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>注册鬼故事交流帐号</title> 
<meta name="keywords" content="免费注册鬼故事交流帐号">
<meta name="description" content="注册帐号、看鬼故事更方便、好恐怖的鬼故事">
<style type="text/css">
body {
font-size: 16px;
background: #eee;
margin:3px;
}
a:link,a:visited {text-decoration:none; color:#004299;}
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
#submit {background:#abc88b;border-radius:3px;border:0px;width:50%;padding:5px}
</style>
</head><body>
<?php
require_once("../install/panduang.php");
require("pd.php");
if(@!$_POST['submit']){
?>
<div id="b">注册沃帐号<b style="float:right;font-size:13px"><a href="../">首页</a></b>
</div>
<div id="c">
<form method="post" action="">
<input type="text" name="sj" maxlength="10" placeholder="QQ号" id="input"/>
<input type="text" name="nc" maxlength="7" placeholder="昵称" id="input"/>
<input type="text" name="m" maxlength="16" placeholder="请输入密码" id="input"/>
<input type="text" name="mm" maxlength="16"placeholder="确定密码" id="input"/>
<br/>
<input type="text" name="code" size="7"  placeholder="验证码" id="input">
<b id="img"><?php
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
echo $rand;
?>
</b><a href="">看不清!</a><br/>
<input type="submit" name="submit" value="确定注册" id="submit">
<b id="img"><a href="login.php">登录</a>
</b>
</form>
</div>
<div id="d">
通道2:  QQ注册- <a href="qqreg.php">点击进入</a><br/>
收集世界各地的鬼故事,希望大家投稿发帖<br/>多多支持，沃鬼故事guigs.cn
</div>
<?php
}else{
?>
<div id="b">注册状态</div>
<div id="d">
<?php
$randcode=$_SESSION['randcode'];
$手机=$danger->fangzhuru(trim($_POST['sj']));
$昵称=$danger->fangzhuru(trim($_POST['nc']));
$密=$danger->fangzhuru(trim($_POST['m']));
$密码=$danger->fangzhuru(trim($_POST['mm']));
$验证码=$danger->fangzhuru(trim($_POST['code']));
$partern = "/^\d{5,10}$/";
$pqq = preg_match($partern,$手机);
$sql="select * from name where sj='$手机'";
$query=mysql_query($sql);
$rows=mysql_num_rows($query);

if($pqq!=1){
echo "QQ号错误</div>";
}elseif(strlenutf8($昵称)<1 || strlenutf8($昵称)>9){
echo "昵称长度不能小于1大于9";
}elseif(strlenutf8($密)<6){
echo "密码长度不能小于6位";
}elseif(strlen($密)>16){
echo "密码长度不能大于16位";
}elseif($密!=$密码){
echo "两次密码不同";
}elseif($验证码!=$randcode){
echo "验证码错误";
}elseif($rows > 0){
echo "QQ已注册
<script type='text/javascript'>
alert('QQ已存在');
<script>";
}else{
$密码密=md5($密码.$手机);
$sqlstr = 'insert into name(id,mm,sj,name,qm,vip,money,zan) values (Null,"'.$密码密.'","'.$手机.'","'.$昵称.'","'.$昵称.'","0","0","0")';
$result=mysql_query($sqlstr);
if($result){
echo "注册帐号成功<br/>请牢记信息!<br/>";
$sqlStr="select * from `name` where `sj`=$手机";
$result=mysql_query($sqlStr);
$row=mysql_fetch_assoc($result);
echo "沃帐号:";
echo $row['id'];
echo "<br/>密码:";
echo $_POST['mm'];
echo "<br/><a href=\"login.php?zh=".$row['id']."&mm=".$_POST['mm']."\">登录!</a>";
mysql_free_result($result);
mysql_free_result($query);
}else{
echo "注册失败";
}
}
echo "
>>>><a href=\"\">返回</a>
</div>
";
}
close();
?>
</body></html>