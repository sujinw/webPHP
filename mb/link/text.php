<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>沃の移动网址导航</title> 
<meta name="keywords" content="鬼故事网址导航,移动网站网址大全,手机网站网址大全,沃の导航">
<meta name="description" content="沃の网址导航,破解网站,WAP手机网站,个人网站,分类网址,软件,游戏,综合,图片,guigs.cn">
<link href="link.css" rel="stylesheet" type="text/css">
</head><body>
<nav>沃移动网址导航</nav>
<div class="form">
<form action="http://baidu.com/baidu" target="_blank"><input name="tn" type="hidden" value="baidu"><input type="text" name="word" id="input"value="沃鬼故事"><input type="submit" id="submit" value="百度一下"></form></div>
<p id="e"><a href="../xiaohua">笑话</a><a href="../article/classify.php">故事</a><a href="../bbs/classify.php">论坛</a><a href="javascript:history.go(-1);">返回</a>
</p>
<div class="nav">
<?php
error_reporting(0);
require_once("../install/panduang.php");
$id=$danger->fangzhuru($_GET['id']);
$sqlStr="select * from link where classify='$id' and sh='yes'";
$result=mysql_query($sqlStr);
echo "<li>";
while($row=mysql_fetch_assoc($result)){
echo "<a href='link.php?q=".$row['id']."'>".$row['title1']."</a>";
}
echo "</li></div>";
?>
<?php
require("../moban/foot.php");
mysql_free_result($result);
?>
</body></html>