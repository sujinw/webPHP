<?php
/*沃のQQ790131300*/
require ("../install/panduang.php");
$id=$danger->fangzhuru(@$_GET['id']);
@$id==""?header("location:../"):"";
$sql="select * from bbs where id='$id' and sh='yes'";
$result=mysql_query($sql);
$bbs=mysql_fetch_assoc($result); 
if(!$bbs){
header("location:../");
exit();
}
$sqlstr="select * from lm where id='$id'";
$result=mysql_query($sqlstr);
$lm=mysql_fetch_assoc($result); 
function content($content){
$content=str_replace('\r',' ',$content);
$content=str_replace('\n','<br/>',$content);
return $content;
}
?>
<!DOCTYPE html>
<html manifest="demo.appcache">
<head><meta http-equiv="Content-Type" content="text/plain; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0"><meta name="apple-mobile-web-app-capable" content="yes">
<title><?php echo $bbs['title']; ?></title> 
<meta name="keywords" content="<?php echo $bbs['title']; ?>">
<meta name="description" content="<?php
echo mb_substr($bbs['content'],0,50,'utf-8');?>">
<link href="<?php echo $hosturl; ?>/style/bbs.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="top">
<span class="left"><a href="javascript:history.go(-1);"></a></span><span class="title">灵异论坛</span><span class="right"><a href="<?php echo $hosturl; ?>">首页</a></span></div>
<?php
$jrq=$bbs['rq'];
$rq=1+$jrq;
$sqlstr="update bbs set `rq`='$rq' where `id`='$id'";
echo "<ul id=\"bg\"><li id=\"b\">{$bbs['title']}<o style=\"float:right;\">阅(".$bbs['rq'].")</o></li><li id=\"text\">".content($bbs['content'])."</li></ul><div id=\"img\">";
$imgur=$bbs['url'];
if($imgur!=""){
$imgurl=explode("|",$imgur);
foreach ($imgurl as $value) {
echo "<img src='{$hosturl}/bbs/{$value}' alt='图片'>";
}
}
mysql_query($sqlstr);
mysql_free_result($result);
echo "</div>";
?>
<script type="text/javascript" src="<?php echo $hosturl; ?>/style/jquery.min.js"></script><script type="text/javascript" src="<?php echo $hosturl; ?>/style/jzpl.js"></script>

<div id="pl"><ul>
<div id="show"></div>
</ul></div>

<div id="jz" onclick="finger('0','<?php echo $id; ?>')">点击加载评论</div><span class='finger0'>0</span>

<div id='title'>评论<i style="float:right;font-size:13px">文明回复、重在参与</i></div>
<form method="get" action="plgo.php" id="form">
<input type="hidden" id="name" name="name" value="<?php echo $id; ?>"/>
<input type="text" name="content" placeholder="评论！" class="input" id="content">
<input id="sub" value="回复" type="button" name="sub" onclick="tishi" class="input"></form>
<?php
require("../moban/foot.php");
?>
</body></html>