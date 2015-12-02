<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>用户管理后台</title>
<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
margin:0px;
color:#c99979;
	}
a:link,a:visited {text-decoration:none; color:#004299;}

#b{background:#cbc547;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:8px;margin-top:1px}

.nav{ height: 38px;  background-color: #fafcff;}
.nav a{ display: block; float: left; box-sizing: border-box; width: 25%; height: 38px; line-height: 38px; text-align: center; font-size: 16px}
.nav a.a{background-color: #c1d0e8;}
.nav a.b{ border-right: 1px solid #dbe3f0;}
#file {position: relative;top: 0;width: 100%; box-shadow: 2px 2px 2px rgba(0,0,0,0.2); z-index: 30;}
.width{width:50%;}
.widtha{width:25%;}
.widthb{width:75%;}
#yb{float:right;font-size:14px;color:#33669}
#input {
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;width:63%;
border:solid 0px #f2eada;
}
#submit {background:#abc88b;border-radius:3px;border:0px;width:65%;padding:5px}
</style>
</head><body>
<?php
require ("panduang.php");
$hyid=@$_GET['hyid'];
echo '<div class="nav" id="file"><a href="index.php" class="b">后台首页</a><a href="hy.php" class="a">会员管理</a><a href="article.php" class="b">文章管理</a><a href="ly.php" class="b">留言管理</a></div>';
if(@!$hyid){
?>
<div id="d">
<form action="" method="get">
用户ID<br/><input name="hyid" type="text" value="" id="input"><br/>
<input type="submit" name="submit" value="进入修改" id="submit">
</form>
</div>
<?php
}else{
$sql="select * from name where id=$hyid";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$name=$row['name'];
$money=$row['money'];
$vip=$row['vip'];
$sj=$row['sj'];
if(!$row){
echo ("<div id='d'>没有此会员<a href='hy.php' id='yb'>返回</a></div>");
mysql_free_result($result);
exit();
}
if(@!$_POST['submit']){
?>
<div id="d">
<form action="" method="post">
用户昵称<br/><input name="nc" type="text" value="<?php echo $name; ?>" id="input"><br/>
修改密码<br/>
<input  name="mm" type="text" value="" id="input">
<br/>修改金币:<br/>
<input  name="money" type="text" value="<?php echo $money; ?>" id="input">
<br/>设置VIP<br/>
<input  name="vip" type="text" value="<?php echo $vip; ?>" id="input">
<br/>
请确保每一项都正确！<br/>
留空不修改
<br/>
		<input type="submit" name="submit" value="确定修改" id="submit">
</form>
</div>
<?php
}else{
$nc=trim($_POST['nc']);
$mm=trim($_POST['mm']);
$mo=trim($_POST['money']);
$vip=trim($_POST['vip']);
if($mm==""){
$密码密=$row['mm'];
}else{
$密码密=md5($mm.$sj);
}
$sql="update name set mm='$密码密',name='$nc',money='$mo',vip='$vip' where id=$hyid";
$pdpd=mysql_query($sql);
if($pdpd){
echo "<div id='b'>修改成功</div>";
}else{
echo "<div id='b'>修改失败</div>";
mysql_free_result($pdpd);
}
}
}
?>
</body></html>