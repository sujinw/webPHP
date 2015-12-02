<?php
require("../install/panduang.php");
namelogin($nameuser);
?>
﻿<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="Cache-Control" content="no-cache">
<title>我的地盘</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<style type="text/css">
body{font-size:15px;background: #fedcbd;color:#c98979;width:100%;margin:0px;}
#pl p,ul,li{background:#fff -webkit-gradient(linear,0 0,0 100%,from(#ffffda),to(#ffffee));margin:0;padding:0;list-style:none;}
i,s,u,em{font-style:normal;text-decoration:none;}a{text-decoration:none;color:#004499;}#pl li,#pl p,a{-webkit-box-flex:1;box-flex:1;display:-webkit-box;}
#pl{padding:0px 10px 0;}#pl li{padding:10px 2px 0;border-top:0px dotted #CCC;}
#pl li.e{text-align:center;padding:10px;}#pl li#is{border:0;padding:0;color:#F00;margin:0}#pl i{margin:0 5px 0 0;}
#pl img{width:40px;height:40px;border:1px solid #CCC;padding:1px;border-radius:36px;}#pl p img{height:68px;width:68px;border:2px solid #FFF;}
#pl p{line-height:20px;color:#999;position:relative;}
#pl s{color:green;display:inline-block;margin:0 3px 0 0;}
#pl u{color:#666;padding:5px 0 0;display:inline-block;}
#pl u.r{color:#F60;}
#pl em{font-size:12px;position:absolute;right:0;}
#pl li.e a{display:block;border:1px solid #CCC;padding:0 10px;margin:0 auto;}
/*连接*/
#d{background:#c99979;padding:8px;color:#fff;border-radius:2px 2px 0px 0px;margin:12px 5px 0px 5px}#c{background:#a1a3a6;padding:5px;}
#ul{margin:0px 5px 0px 5px}#li{padding:8px;background:url(../img/right.png) no-repeat 97% center #fff;-webkit-background-size: 5px auto;overflow:hidden;white-space:nowrap;border-top:1px solid #f4f3f2;}
.nav a{display:block;box-sizing:border-box;height:38px;line-height:38px;text-align:center;font-size:16px;background:#424528;float:left;border-bottom:0px dashed #eee;color:#999;width:25%}
</style></head><body>
<?php
echo '<ul id="pl" n="7"><li id="is"></li><li><i><img src="img/202.png" alt="头像"></i><p class="y"><em>'.$nametime.'</em><s>'.$nameuser.'</s><br/><u>ID('.$uid.')</u></p></li></ul>';
?>
<div id="d">我的资料</div>
<ul id="ul">
<li id="li"><?php echo "金币:{$namemoney}"; ?></li>
<li id="li"><a href="../aq">修改资料</a></li>
<li id="li"><a href="tuichu.php">退出登录</a></li>
<?php
if($uid=="10000"){
echo '<li id="li"><a href="../wdadmin">进入后台</a></li>';
}
?>
</ul>
<div id="d">我的文章</div>
<ul id="ul">
<li id="li"><a href="../article/ft.php">发布文章</a></li>
<li id="li"><a href="article.php">我发布过的文章</a></li>
</ul>
</div>

<div id="d">我的帖子</div>
<ul id="ul">
<li id="li"><a href="../bbs/fatie.php">发表帖子</a></li>
<li id="li"><a href="bbs.php">我发过帖子</a></li>
</ul>

<div id="d">我的笑话</div>
<ul id="ul">
<li id="li"><a href="../xiaohua/faxiaohua.php">发表笑话</a></li>
<li id="li"><a href="xiaohua.php">我发过帖子</a></li>
</ul>

<br/>
<div class="nav">
<a href="../">首页</a>
<a href="../xiaohua">笑话</a>
<a href="../article/">故事</a>
<a href="../bbs/">论坛</a>
</div>
</body></html>