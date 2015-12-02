<?php
/*判断加引文件*/
require("install/panduang.php");
?>
﻿<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"><meta name="baidu-site-verification" content="8rWXMm0C6u" /><meta name="baidu-site-verification" content="uez0mVdrmC"><meta name="baidu-site-verification" content="uez0mVdrmC">
<title>沃の文章程序</title>
<meta name="keywords" content="沃の文章程序">
<meta name="description" content="沃の文章程序">
<link href="style/index.css" rel="stylesheet" type="text/css"><script src="style/img.js" language="JavaScript"></script></head><body>
<div id="logo"><img src="image/logo.png"><a href="sezhi.php"><img src="image/sezhi.png" style="float:right"></a></div><p id="e"><a href="/xiaohua" id="c">笑话</a><a href="article/classify.php">故事</a><a href="bbs/classify.php">论坛</a><a href="search/index.php">搜索</a><a href="link">导航</a></p>

<div id="slideBox" class="slideBox"><div class="bd"><ul>
<?php
$sql="SELECT * FROM bbs ORDER BY RAND() LIMIT 4";
$res=mysql_query($sql);
while($bbs=mysql_fetch_array($res)){
$imgurl=$bbs['url'];
if($imgurl==""){
$imgurl=$hosturl."/image/ico.png";
}else{
$imgurl=explode("|",$imgurl);
$imgurl=$hosturl."/bbs/".$imgurl['0'];
}
echo '<li><a class="pic" href="bbs/guigushi.php?id='.$bbs['id'].'"><img src="'.$imgurl.'"></a><a class="tit">'.$bbs['title'].'</a></li>';
}
mysql_free_result($res);
?>
</ul></div><div class="hd"><span class="prev"><img src="image/imgy.png"></span><span class="next"><img src="image/imgz.png"></span></div></div>
<script type="text/javascript">TouchSlide({ slideCell:"#slideBox", mainCell:".bd ul", effect:"leftLoop" });</script>

<div id="tabBox2" class="tabBox"><div class="hd"><h3><a href="#">沃文章</a><span>Guigs</span></h3><ul><li><a href="javascript:void(0)">随机</a></li><li><a href="javascript:void(0)">最新</a></li><li><a href="javascript:void(0)">热门</a></li></ul></div><div class="bd">
<?php
ubb("{article=0_0_7_15_0}");
ubb("{article=0_1_7_15_0}");
ubb("{article=0_2_7_15_0}");
?>
</div>
</div>
<script type="text/javascript">TouchSlide( { slideCell:"#tabBox2" } );</script>
<div id="tabBox3" class="tabBox"><div class="hd"><h3><a href="#">沃论坛</a><span>Guigs</span></h3><ul><li><a href="javascript:void(0)">随机</a></li><li><a href="javascript:void(0)">最新</a></li><li><a href="javascript:void(0)">热门</a></li></ul></div><div class="bd">
<?php
ubb("{bbs=0_0_7_15_0}");
ubb("{bbs=0_1_7_15_0}");
ubb("{bbs=0_2_7_15_0}");
?>
</div>
</div>
<script type="text/javascript">TouchSlide( { slideCell:"#tabBox3" } );</script>

<div class="title"><b>幽默笑话</b><a href="xiaohua">更多</a></div>
<?php
ubb("{xiaohua=0_0_7_15_0}");
require("moban/foot.php");
?>
</body></html>