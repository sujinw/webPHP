<?php
/*判断加引文件*/
require("../install/panduang.php");
?>
﻿<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"><meta name="baidu-site-verification" content="8rWXMm0C6u" /><meta name="baidu-site-verification" content="uez0mVdrmC"><meta name="baidu-site-verification" content="uez0mVdrmC">
<title>鬼故事,聊天灌水,灵异事件,未解之谜,UFO,奇闻异事</title>
<meta name="keywords" content="奇闻异事,UFO,灵异事件,灵异知识,未解之谜,鬼故事分享">
<meta name="description" content="奇闻趣事,未解之谜,灵异事件,大揭秘,占卜工具,鬼故事交流,寻求刺激,还有笑话……">
<style>
body{background: #eee;color:#c16879;width:100%;margin:0px;border:0px;padding:0px;font-family:,"Adobe黑体","黑体","宋体",Arial;}
a{
text-decoration:none;
color:#353575;
}
ul,li{list-style-type:none;}
#b{margin:0;padding-top:5px;color:#454528}
nav{position:relative;overflow:hidden}
nav b{font-size:16px;}
#p{bottom:0%;font-size:11px;text-align:left;padding:3px;}
nav li{width:25%;float:right;text-align:center;margin:12px;background:#FFF;box-shadow:0 1px 3px #B9B9B9;border:0;border-radius:1.9px;top:1px;}
nav li a{display:block;overflow:hidden;height:6rem;border-left:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}
nav li:nth-child(5n+1) a{border-left:0 none}
nav img{display:block;margin:1.125rem auto 0.41667rem;width:3rem;height:2rem}
</style>
</head><body>
<nav>
<?php
$sqll="select id,name from `lm` where `classify`='bbs' and sh='yes' order by `id` asc";
$result=mysql_query($sqll);
while($lm=mysql_fetch_assoc($result)){
if($wjt=="yes"){
$url=$hosturl."/bbs/classify.php/".$lm['id']."_1.html";
}else{
$url=$hosturl."/bbs/classify.php?id=".$lm['id'];
}
echo "<li><a href=\"{$url}\"><img src=\"../image/gjsm.png\" alt=\"鬼故事\">{$lm['name']}</a></li>";
}
mysql_free_result($result);
?>
<li><a href="../">
<img src="../image/gjsm.png" alt="">网站首页</a></li>
<li><a href="../gj"><img src="../image/gjsm.png" alt="">占卜工具</a></li>
</nav>
</body></html>