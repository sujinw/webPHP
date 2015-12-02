<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>留言</title> 
<meta name="keywords" content="留言">
<meta name="description" content="留言QQ790431300">

<style type="text/css">
body {
font-size: 16px;
		background: #fedcbd;
margin:3px;color:#c99979;
	}
a:link,a:visited {text-decoration:none; color:#004299;}

#b{background:#c88879;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}

#c {background:#fff;padding:5px;color:#a1a3a6;}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

#li{background:#fff;list-style-type:none;padding:6px;margin-top:1px}

</style>
</head><body>

<div id='b'>查看留言 <b style='float:right'><a href='../'>首页</a></b></div>
<?php
/*沃のQQ790131300*/
$classify=trim(@$_GET['classid']);
$page=trim(@$_GET['page']);
if(!$classify){
header("location:index.php");
}
require ("../install/config.php");
$sqlStr="select * from ly where id=$classify";
$result=mysql_query($sqlStr);
$row=mysql_fetch_assoc($result);
echo '<div id="li">';
echo $row['name'];
echo '</div>';
echo '<div id="li">时间:';
echo $row['time'];
echo '</div><div id="li">IP:';
echo $row['ip'];
echo '</div>';
echo  '<div id="li">';
echo "内容:";
echo $row['content'];
echo '</div>';
mysql_free_result($result);
echo "<div id='d'>客户QQ:790431300</div>";
?>