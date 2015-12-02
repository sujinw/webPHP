<?php
/*沃のQQ790131300*/
require ("../install/panduang.php");
if(@$htmlurl=$_SERVER["PATH_INFO"]){
if(preg_match("/\/(\d+)\.html/si",$htmlurl,$urlid)){
$id=$danger->fangzhuru(intval($urlid[1]));
}}else{
$id=$danger->fangzhuru(@$_GET['id']);
}
$sql="select * from article where `id`={$id}";
$result=mysql_query($sql);
$article=mysql_fetch_assoc($result);
$sqlstr="select * from `lm` where `id`={$article['classify']} and `sh`='yes'";
$result=mysql_query($sqlstr);
$lm=mysql_fetch_assoc($result); 
/*关键词高亮加连接*/
function textkey($content,$gjc,$hosturl){
$pa='%《(.*?)》%si';
$titlelen=@preg_match($pa,$content,$title);
$content=@str_replace($title[0],"<a href=\"$hosturl/search?text=".$title[0]."\">".$title[0]."</a>",$content);
return $content;
$textkey=explode("|",$gjc);
for($i=0;$i<=@count($textkey);$i++){
$content=@str_replace($textkey[$i],"<a href=\"$hosturl/search?text=$textkey[$i]\">$textkey[$i]</a>",$content);
}
}
$关键词="害怕|可怕|不可思议|可怕|平安|老婆|美女|假的|救命||恐怖|电梯|校园|道士|咒语|沃の|爱情|车祸|QQ|鬼姐姐|死亡|坟墓|坟山|亲人|救我|突然|哈哈|去死|奶奶|爷爷|剪刀|笑容|棺材|做梦|晚上|地狱|";
$ip=$_SERVER["REMOTE_ADDR"];
?>
<!DOCTYPE html>
<html manifest="demo.appcache">
<html><head>
<meta http-equiv="Content-Type" content="text/plain; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0"><meta name="apple-mobile-web-app-capable" content="yes">
<title><?php echo $article['title']; ?></title> 
<meta name="keywords" content="<?php echo $article['title']; ?>">
<meta name="description" content="<?php
echo mb_substr($article['content'],0,52,'utf-8');
?>">
<link href="<?php echo $hosturl; ?>/article/style.css" rel="stylesheet" type="text/css">
</head><body>
<header>
<a href="javascript:history.go(-1);"></a><h1>鬼故事-阅读</h1></header>
<?php
if(!$article){
echo "没有此文章";
mysql_free_result($result);
header("location:../");
exit();
}elseif($article['sh']!="yes"){
echo "文章没审核";
mysql_free_result($result);
exit();
}
echo '<nav id="file"><a href="'.$hosturl.'">首页</a><a href="'.$hosturl.'/search">搜索</a><a href="'.$hosturl.'/article/jb.php?id='.$id.'">举报</a><a href="'.$hosturl.'/article/ft.php">发布</a><a href="'.$hosturl.'/article/sezhi.php" id="b">设置</a></nav>';
?>
<div id="bg">
<script src="<?php echo $hosturl; ?>/article/qiehuan.js" language="JavaScript"></script>
<?php
echo "<ul><li><b>".$article['title']."</b><span>阅(".$article['rq'].")</span></li>";
$content=str_replace('。。。。。。','……<br/>',$article['content']);
$content=str_replace('。。','…',$content);
$content=str_replace('。','。<br/>',$content);
$content=str_replace('guijj.com','guigs.cn',$content);
$content=str_replace('鬼故事_http:///','<h3>鬼故事-http://guigs.cn</h3>',$content);
echo "<div id=\"font\">";
echo textkey($content,$关键词,$hosturl);
$rq=1+$article['rq'];
$sqlstr="update article set `rq`=$rq where `id`=$id";
mysql_query($sqlstr);
?>
<p><span>标签:<a href="<?php echo $hosturl."/article/classify.php/".$lm['id']."_1.html\">".$lm['name']."</a>"; ?>.
<a href="<?php echo $hosturl."/article/pl.php?id=".$article['id']."\">"; ?>评论</a></span></p></ul></div>
<script src="<?php echo $hosturl; ?>/style/jquery.min.js" language="JavaScript"></script>
<div id="tishi">赞+1</div>
<div class="as-gf">
<a id='js' class='ding' onclick='k();'>展开鬼故事</a>
<a id='j' class='ding' onclick='g();' style='display:none'>关闭鬼故事</a>
<div class="ding" onclick="finger('<?php
echo $id.",".$ip;
?>');" style='float:right;'><img src="<?php echo $hosturl; ?>/image/good.png" alt="good">
<?php
$zan=$article['z'];
if($zan==""){
$zan=0;
}
echo "<span class='finger".$article['id']."'>".$zan."</span>"; ?>
</div></div>
<div id="jz">加载中...</div>
<div id='gui'  style='display:none;'>
<div id="url"></div>
<div id="title" onclick='start();'>
换一批鬼故事>>
</div></div></div>
<?php
mysql_free_result($result);
require("../moban/foot.php");
?>
</body></html>