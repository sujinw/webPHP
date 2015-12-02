<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>发信息给会员</title> 
<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
margin:3px;
	}
a:link,a:visited {text-decoration:none; color:#004299;}
#input {
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;
border:solid 0px #f2eada;
}
.input{width:59%}
textarea {
width:60%;
height:80px;
border-radius:2px;
color:#336699;
border:0px;
}
#b{background:#cbc547;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}

#c {background:#a1a3a6;padding:5px;color:#fff;}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

#img{background:#fff;padding:5px;border-radius:2px;color:#336688}
#submit {background:#abc88b;border-radius:3px;border:0px;width:61%;padding:5px}
</style>
</head><body>
<?php
require_once("panduang.php");
if(@!$_POST['submit']){
?>

<div id="b">沃の<b style="float:right;font-size:13px"><a href="../wdadmin">后台</a></b>
</div>

<div id="c">
<form method="post" action="">
发送内容:<br/><textarea name="text" maxlength="500" placeholder="要发送的内容" id="textarea"/></textarea>
<br/>
<br/>
<input type="submit" name="submit" value="确定发送" id="submit">
</form>
<br/>
重要通知轨道,发信息给注册时的QQ
</div>
</div>
<?php
}else{
?>
<div id="b">状态</div>
<div id="d">
<?php
$content=danger($_POST['text']);
if(strlenutf8($content)<5||strlenutf8($content)>'100'){
echo "内容不能小于5或者大于100";
}else{
@file_get_contents("http://pt.3g.qq.com/s?aid=nLogin3gqqbysid&3gqqsid=$adminqqsid");
@file_get_contents("http://pt.3g.qq.com/s?aid=nLogin3gqqbysid&3gqqsid=$adminqqsid");
$sql="select * from name where id";
$result=mysql_query($sql);
while($q=mysql_fetch_array($result)){
$qq=$q['sj'];
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://q16.3g.qq.com/g/s?sid=$adminqqsid");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,"u=$qq&saveUrl=0&do=send&on=1&aid=发送&msg={$content}");
$rztext=curl_exec($ch);
curl_close($ch);
}
if(strstr($rztext,"成功")){
echo "发送成功";
}else{
echo "失败、检查qqsid";
}
}
}
?>
</body></html>