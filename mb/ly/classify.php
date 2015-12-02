<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>查看留言</title> 
<meta name="keywords" content="查看留言">
<meta name="description" content="留言QQ790431300">

<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
margin:0px;
	}
a:link,a:visited {text-decoration:none; color:#004299;}

#b{background:#cbc547;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}

#c {background:#a1a3a6;padding:5px;color:#fff;}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:8px;margin-top:1px}
nav{ height: 40px;background-color: #b7ba6b;}
nav a{ display: block;  box-sizing: border-box; width: 50%; height: 40px; line-height: 40px;}
#nav{background-color: #c1d0e8; float: left;border-right: 1px solid #dbe3f0;text-align:center}
#nava{float: left;border-right: 1px solid #dbe3f0;text-align:center}
</style>
</head><body>
<?php
require ("../install/panduang.php");
$sqlStr="select * from name where mm='$sid'";
$result=mysql_query($sqlStr);
$name=mysql_fetch_assoc($result);
$page=trim(@$_GET['page']);
$sql="select * from ly";
$res=@mysql_query($sql);
$nums=@mysql_num_rows($res);
$pagesize=10;
$pages=ceil($nums/$pagesize);
echo "<div id='b'>查看留言 <b style='float:right'><a href='../'>首页</a></b></div>";
if($page<1){
$page=0;
}

echo '<ul>';
$kaishi=($page)*$pagesize;
$sql="select * from ly where sh=1 limit $kaishi,$pagesize";
$res=mysql_query($sql);

while($row=mysql_fetch_array($res)){
echo '<a href="content.php?classid=';
echo $row['id'];
echo '"><li>';
echo $row['name'];
echo "</li></a>";
}
if($pages<$page){
header("location:../");
}
echo '</ul><div class="d">';
mysql_free_result($res);
?>
<nav>
<?php
$pagej=$page+1;
$pagesy=$page-1;
for($i=$page-1;$i<=$page+3;$i++){
if($page<4 or $page>=$pages-4){
if($page<$pages-1){
echo "<a href='?page=$pagej' id='nava' class='width'>下页</a>";
}else{
echo "<a id='nava' class='width'>没下页了</a>";
}
if($page>0){
echo "<a href='?page=$pagesy' id='nav' class='width'>上页</a>";
}else{
echo "<a id='nava' class='width'>没上页了</a>";
}
break;
}else{
if($page+1==$i){
echo "<a id='nav'>第";
echo $page+1;
echo "页</a>";
}else{
echo "<a href='?page=$pagej' id='nava'>第{$i}页</a>";
}
}
}
?>
</nav>

<link href="../js/style.css" rel="stylesheet" type="text/css">
<div class="footer" style="background:#335877;">
<footer><div class="banben">
<?php
mysql_free_result($result);
if($name){
echo '<a href="/name">地盘</a> <a href="/ly" class="a">反馈</a> <a href="/article/ft.php">发布</a>';
}else{
?>
<a href="/zc/login.php">登录</a> <a href="/ly" class="a">反馈</a> <a href="/zc/reg.php">注册</a>
<?php } ?> </div>
        <p class="red">2014做中国手机鬼故事交流网站</p>
<p>沃の版权所有©http://guigs.cn</p>
</footer>
</div>
<div id="top" onclick="scrollTo(0,0)" style="display: block; "> <img src="../img/top.png" alt="返回顶部"> </div>
</body></html>