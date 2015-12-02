<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>沃の网址导航_鬼故事导航网</title>
<meta name="keywords" content="鬼故事网址导航,移动网站网址大全,手机网站网址大全,沃の导航">
<meta name="description" content="沃の网址导航,破解网站,WAP手机网站,个人网站,分类网址,软件,游戏,综合,图片,guigs.cn">
<link href="link.css" rel="stylesheet" type="text/css">
</head><body>
<nav>沃移动网址导航</nav>
<div class="form">
<form action="http://baidu.com/baidu" target="_blank"><input name="tn" type="hidden" value="baidu"><input type="text" name="word" id="input"value="沃鬼故事"><input type="submit" id="submit" value="百度一下"></form></div>
<p id="e"><a href="../xiaohua">笑话</a><a href="../article/classify.php">故事</a><a href="../bbs/classify.php">论坛</a><a href="../">首页</a></p>
<div class="nav">
<?php
require("../install/panduang.php");
$sqlStr="select * from `link` where `sh`='yes' order by `z` desc limit 0,16";
$result=mysql_query($sqlStr);
while($row=mysql_fetch_assoc($result)){
echo "<a href='link.php?q=".$row['id']."'>".$row['title1']."</a>";
}
mysql_free_result($result);
?>
</div>
<a href="tjlink.php"><center>加入本站»</center></a>
<div class="tc">*<?php
$ip=$_SERVER["REMOTE_ADDR"];
$url="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=$ip";
$str=@file_get_contents("$url");
$info=json_decode($str, true);
echo $info['city'];
?>朋友在看<b>»</b></div>
<div id="gui">
<?php
$sql="select * from `article` where `classify`='yes' ORDER BY RAND() LIMIT 5";
$res=mysql_query($sql);
while($article=mysql_fetch_array($res)){
echo '<a href="../article/guigushi.php/'.$article['id'].'.html"><li>'.$article['title'].'</li></a>';
}
echo '<a href="../"><center>查看更多故事»</center></a></div>';
mysql_free_result($res);
?>
<div class="tc">网址分类大全*</div>
<div class="url">
<ul>
<?php
function linksql($id){
$sqlStr="select * from `link` where sh='yes' and classify='$id' order by z desc limit 0,4";
$result=mysql_query($sqlStr);
while($ro=mysql_fetch_assoc($result)){
echo "<a href='link.php?q=".$ro['id']."'>".$ro['title1']."</a>";
}
}
$sqlStr="select * from lm where classify='link'";
$result=mysql_query($sqlStr);
while($row=mysql_fetch_assoc($result)){
echo "<li><a href='text.php?id={$row['id']}' id='a'>".$row['name']."</a>";
linksql($row['id']);
echo "</li>";
}
mysql_free_result($result);
?>
</ul></div>
<div class="tc">在线工具<b>»</b></div>
<div class="gj"><li><a href="../gj/jm.php">
<img src="../image/gjjm.png" alt="">解梦</a></li><li><a href="../gj/fy.php">
<img src="../image/gjfy.png" alt="">翻译</a></li><li><a href="../gj/chenggu.php"><img src="../image/gjsm.png" alt="">称骨</a></li><li><a href=""><img src="../image/gjtq.png" alt="">查天气</a></li>
<li><a href=""><img src="../image/gjdc.png" alt="">打车</a></li></div>
<?php
require_once("../moban/foot.php");
?>
</body></html>