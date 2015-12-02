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
#d{background:#c99979;padding:5px;color:#fff;border-radius:2px 2px 2px 2px;}
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
require("pd.php");
$getqq=$danger->fangzhuru(@$_POST['qq']);
$验证码=$danger->fangzhuru(@$_POST['code']);
$sql="select * from name where sj='$getqq'";
$query=mysql_query($sql);
$ro=mysql_num_rows($query);
if($ro>0){
echo "注册过了";
}else{
$sqlcq="select * from `code` where qq=$getqq";
$query=mysql_query($sqlcq);
$rows=mysql_fetch_assoc($query);
$randcode=$rows['code'];
if($验证码!=$randcode){
echo "验证码错误";
}else{
$密码密=md5($getqq.$getqq);
$sqlstr = 'insert into name(id,mm,sj,name,qm,vip,money,zan) values (Null,"'.$密码密.'","'.$getqq.'","'.$getqq.'","'.$getqq.'","0","0","1")';
$pdpd=mysql_query($sqlstr);
if($pdpd){
$sqlStr="select * from name where sj=$getqq";
$result=mysql_query($sqlStr);
$row=mysql_fetch_assoc($result);
echo "<div id='b'>注册成功<br/>
帐号:".$row['id']."
<br/>密码:{$getqq}<br/><a href=\"login.php?zh=".$getqq."&mm=".$getqq."\">登录!</a></div>";
mysql_free_result($result);
}else{
echo "<div id='b'>注册失败</div>";
}
}}
mysql_free_result($query);
?>
</div></body></html>