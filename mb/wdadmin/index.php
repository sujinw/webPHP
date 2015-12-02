<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>后台</title>
<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
margin:0px;
color:#c99979;
	}
a:link,a:visited {text-decoration:none; color:#004299;}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

ul{padding:0px;margin:0px;color:#c99979}
li{background:#fff;list-style-type:none;padding:8px;margin-top:1px}

.nav{ height: 38px;  background-color: #fafcff;}
.nav a{ display: block; float: left; box-sizing: border-box; width: 25%; height: 38px; line-height: 38px; text-align: center; font-size: 16px}
.nav a.a{background-color: #c1d0e8;}
.nav a.b{ border-right: 1px solid #dbe3f0;}
#file {position: relative;top: 0;width: 100%; box-shadow: 2px 2px 2px rgba(0,0,0,0.2); z-index: 30;}
.width{width:50%;}
.widtha{width:25%;}
.widthb{width:75%;}
#yb{float:right;font-size:14px;color:#f15a22}
</style>
</head><body>

<?php
require ("panduang.php");
echo "";
echo '<div class="nav" id="file"><a class="a">后台首页</a><a href="hy.php" class="b ">会员管理</a><a href="article.php" class="b">文章管理</a><a href="ly.php" class="b">留言管理</a></div>';
?>
<div id="d">
<ul>
<li>版本1.0----更新到,http://guigs.cn、精细后台加用户中心30元*^_^*<br/>沃の唯一QQ:790431300(沃の版权所有)</li><li>
欢迎您！管理员</li>
<a href="../"><li>网站首页</li>
</a>
<a href="../name"><li>用户中心</li>
</a>

<a href="tjlm.php"><li>
添加栏目</li>
</a>
<a href="lmgl.php"><li>
栏目管理</li>
</a>
<a href="link.php"><li>
友情连接</li>
</a>

<a href="jbarticle.php"><li>
被举报文章管理</li>
</a>
<a href="name.php"><li>
会员统计管理</li>
</a>
<a href="yjqq.php"><li>
信息通知会员</li>
</a>
</ul>
</div>

</body></html>