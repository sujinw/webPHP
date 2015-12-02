<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>友粘</title>
<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
margin:0px;
color:#fff;
	}
a:link,a:visited {text-decoration:none; color:#004299;}

#d{background:#c99979;padding:1px;color:#fff;border-radius:0px 0px 2px 2px;}

ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:8px;margin-top:1px}
nav{ height: 38px;background-color: #b7ba6b;}
nav a{ display: block;  box-sizing: border-box; width: 20%; height: 38px; line-height: 38px;}
#nav{background-color: #c1d0e8; border-bottom: 1px solid #dbe3f0;float: left;border-right: 1px solid #dbe3f0;text-align:center}
#nava{float: left;border-right: 1px solid #dbe3f0;border-bottom: 1px solid #dbe3f0;text-align:center;
}

.nav{ height: 38px;  background-color: #fafcff;}
.nav a{ display: block; float: left; box-sizing: border-box; width: 25%; height: 38px; line-height: 38px; text-align: center; font-size: 16px}
.nav .b{background-color: #c1d0e8;word-wrap:break-word; }
.nav .a{ border-right: 1px solid #dbe3f0;word-wrap:break-word; }
#file {position: relative;top: 0;width: 100%; box-shadow: 2px 2px 2px rgba(0,0,0,0.2); z-index: 30;}
.width{width:75%;}
.widtha{width:25%;}
.widthb{width:65%;}
#yb{float:right;font-size:14px;color:#f15a22}

#input {
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;
width:73%;
border:solid 0px #f2eada;
}

#submit {background:#abc88b;border-radius:1px;border:0px;width:25%;padding:5px}
</style>
</head><body>

<?php
require ("panduang.php");

$page=trim(@$_GET['page']);
$sql="select * from link";
$res=mysql_query($sql);
$nums=mysql_num_rows($res);
$pagesize=10;
$pages=ceil($nums/$pagesize);

if($page<1){
$page=0;
}

echo '<nav><a id="nava" class="width">友链名称</a><a id="nava" class="widtha">操作</a></nav>';
$kaishi=($page)*$pagesize;
$sql="select * from link where id limit $kaishi,$pagesize";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)){
$title=$row['title'];
$id=$row['id'];
echo "
<nav><a id='nav' class='width'>$title</a><a id='nav' class='widtha' href='linkdo.php?id=$id'>修改</a>";
}
if($pages<$page){
header("location:../");
}
mysql_free_result($res);
?>
<nav>
<?php
$pagej=$page+1;
$pagesy=$page-1;

for($i=$page-1;$i<=$page+3;$i++){
if($page<4 or $page>=$pages-4){
if($page<$pages-1){
echo "<a href='?page=$pagej' id='nav' class='width'>下页</a>";
}else{
echo "<a id='nav' class='width'>没下页了</a>";
}
if($page>0){
echo "<a href='?page=$pagesy' id='nav' class='widtha'>上页</a>";
}else{
echo "<a id='nav' class='widtha'>没上页了</a>";
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

</body></html>