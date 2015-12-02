<?php
require("../install/panduang.php");
namelogin($nameuser);
?>
﻿<!DOCTYPE html><html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<title>安全中心</title>
<link><link>

<style type="text/css">
body {
		font-size: 16px;
		background: #fedcbd;
margin:3px;color:#c99979;
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

#c {float:right;}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

#img{background:#fff;padding:5px;border-radius:2px;color:#336688}
ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:5px;margin-top:1px}
</style>
</head>
<body>

<div id="b">安全中心</div>

<ul>
<?php
echo "<li>QQ:{$nameuser}</li><li>";
echo "<a href='mm.php?sid=$sid&uid=$uid'>修改帐号密码</a></li>";
?>

</ul>
<div id="d">沃の©QQ:790431300
<b style="float:right;"><a href="../name/index.php?sid=<?php echo $sid; echo "&uid=$uid"; ?>">用户中心</a></b></div>
</body></html>