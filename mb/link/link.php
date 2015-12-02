<?php
require("../install/panduang.php");
$time=date('Y-m-d H:i');
$l=$danger->fangzhuru(@$_GET['l']);
$q=$danger->fangzhuru(@$_GET['q']);
$sql="select * from link where id='$l' or id='$q'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
mysql_free_result($query);
$title=$row['title'];
$title1=$row['title1'];
$url=$row['url'];
$content=$row['content'];
$sqll=$row['l'];
$sqlq=$row['q'];
$ls=$row['ls'];
$qs=$row['qs'];
$sl=$row['time'];
$z=$row['z'];
$urlp=$url;
if($l!=""){
$url="http://guigs.cn";
if(@$_GET['a']=="1"){
header("location:$url");
}
$lurl=@$_SERVER['HTTP_REFERER'];
$lurl=parse_url($lurl);
$llurl=parse_url($urlp);
if(@$lurl['host']==@$llurl['host']){
$j=$sqll+1;
$sqlstr="update link set l='$j',ls='$time' where id=$l";
mysql_query($sqlstr);
echo mysql_error();
}
}
if($q!=""){
$j=$sqlq+1;
$sqlstr="update link set qs='$time' where id=$q";
mysql_query($sqlstr);
if(@$_GET['a']==1){
$sqlstr="update link set q='$j' where id=$q";
mysql_query($sqlstr);
header("location:$url");
}
}
if(@$_GET['z']=="z"){
if(!@$_SESSION['z']){
@$_SESSION['z']=@$_GET['z'];
$j=$z+1;
$sqlstr="update link set z='$j' where id=$q";
mysql_query($sqlstr);}
}
if(($l=="" and $q=="") or $row==""){
exit();
}
?>
﻿<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache">
<title>沃の鬼故事网址导航,guigs.cn...</title>
<meta name="keywords" content="鬼故事网站,恐怖鬼故事,校园鬼故事,短篇鬼故事等鬼故事">
<meta name="description" content="鬼故事网站,恐怖鬼故事,校园鬼故事,短篇鬼故事等鬼故事">
<meta name="author" content="沃の">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<style type="text/css">
body{
background:#336699;
background:url(123.png);
background-size:100%;
}
a:link,a:visited {
text-decoration:none;
}
.top{
******:block;
margin:2px auto;
height:68px;
padding:68px 0;
border-bottom:1px solid #FFF;
}

.top_content{
height:68px;
}
.top_head{
background:url(202.png) no-repeat;
background-size:58px;
height:68px;
width:68px;
border:2px solid #FFF;
border-radius:36px;
background-position:50%;
margin:0 0 0 8%;
******:inline-block;
float:left;
}
.top_name{
height:50px;
width:auto;
margin:0 8%;
******:inline-block;
padding:9px 8px;
font-size:22px;
line-height:28px;
text-shadow:0px 0px 3px #FFF;
}
.top_name span{
font-size:14px;
color:#fff;
text-shadow:1px 1px 1px #000;
}
.up{
background:url(up.png) no-repeat rgb(140,140,140);
background-size:auto 24px;
background-position:5px;
width:auto;
height:24px;
border-radius:9px;
font-size:1em;
line-height:1.5em;
text-align:center;
color:#FFF;
padding:2px 7px 0px 22px;
float:right;
position:relative;
top:26px;
right:18px;
box-shadow:1px 1px 2px #666;
}
.text{
margin:10px auto;
float:center;
padding:9px;
font-size:1em;
border:1px solid #FFF;
background:rgba(222,222,222,0.6);
box-shadow:2px 2px 4px #000;
}
.foot{
text-align:center;
color:#CCC;
}
b{float:right;}
</style>
<link><link>
</head>
<body>

<div class="up">
<a href="?q=<?php
echo $q."&z=z\">".$z;
?></a></div>
<div class="top">
<div class="top_content">
<div class="top_head"></div>
<div class="top_name"><?php echo $title1; ?><br>
<span><?php echo $title; ?></span>
</div>
</div>
</div>

<div class="text">链入时间<b><?php echo $ls; ?></b></div>
<div class="text">链出时间<b><?php echo $qs; ?></b></div>
<div class="text">链入(<?php echo $sqll; ?>)<b>链出(<?php echo $sqlq; ?>)</b></div>
<div class="text"><h3>网站介绍</h3><?php echo $content; ?></div>
<div class="text">
<?php
if($l==""){
echo "<a href=\"?q={$q}&a=1\">";
}else{
echo "<a href=\"?l={$l}&a=1\">";
}
?>
点击进入>></a><b><a href="./">首页<a></b></div>
</body></html>