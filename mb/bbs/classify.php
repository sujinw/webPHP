<?php
/*沃のQQ790131300*/
require ("../install/panduang.php");
if(@$htmlurl=$_SERVER["PATH_INFO"]){
if(preg_match("/\/(\d+)_(\d+)\.html/si",$htmlurl,$urlid)){
$id=$danger->fangzhuru(intval($urlid[1]));
$page=$danger->fangzhuru(intval($urlid[2]));
}}else{
$id=$danger->fangzhuru(@$_GET['id']);
$page=$danger->fangzhuru(@$_GET['page']);
}
@$id==""?$id=12:"";
$lmsql="select * from `lm` where `classify`='bbs' and `sh`='yes' and id={$id}";
$result=mysql_query($lmsql);
$title=mysql_fetch_assoc($result);
if(!$title){
echo "无此栏目";
header("location:../");
mysql_free_result($result);
exit();
}
@$page==""?$page="0":"";
$articlesql="select * from `bbs` where `classify`={$id} and `sh`='yes'";
$result=@mysql_query($articlesql);
$nums=@mysql_num_rows($result);
$pagesize=9;//每页条数
$pages=ceil($nums/$pagesize);//总页
$page<=0?$page="1":"";
$page>$pages?$page=$pages:"";
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php echo $title['seotitle']; ?></title> <meta name="keywords" content="<?php echo $title['seokey']; ?>">
<meta name="description" content="<?php echo $title['seodes']; ?>">
<link href="<?php echo $hosturl; ?>/style/bbsclassify.css" rel="stylesheet" type="text/css">
<script src="<?php $hosturl; ?>/style/img.js" language="JavaScript"></script>
</head>
<body>
<header>
<a href="javascript:history.go(-1);"></a>
<h1>灵异论坛</h1></header>
<nav id="file"><a href="<?php echo $hosturl; ?>">首页</a><?php
$sqll="select id,name from `lm` where `classify`='bbs' and sh='yes' order by `id` asc";
$result=mysql_query($sqll);
while($lm=mysql_fetch_assoc($result)){
if($wjt=="yes"){
$url=$hosturl."/bbs/classify.php/".$lm['id']."_1.html";
}else{
$url=$hosturl."/bbs/classify.php?id=".$lm['id'];
}
echo "<a href=\"$url\"";
if($lm['id']==$id){
echo "class=\"file\"";
}
echo '>'.$lm['name'].'</a>';
}
mysql_free_result($result);
?>
</nav>
<div id="slideBox" class="slideBox"><div class="bd"><ul>
<?php
/*灵异鬼故事*/
$sql="SELECT id,title,url FROM `bbs` where classify='$id' and sh='yes' ORDER BY RAND() LIMIT 4";
$res=mysql_query($sql);
while($bbs=mysql_fetch_array($res)){
$imgurl=$bbs['url'];
if($imgurl==""){
$imgurl=$hosturl."/image/ico.png";
}else{
$imgurl=explode("|",$imgurl);
$imgurl=$hosturl."/bbs/".$imgurl['0'];
}
echo '<li><a class="pic" href="'.$hosturl.'/bbs/guigushi.php?id='.$bbs['id'].'"><img src="'.$imgurl.'" alt="真实-灵异图片"></a><a class="tit">'.$bbs['title'].'</a></li>';
}
mysql_free_result($res);
?>
</ul></div><div class="hd"><span class="prev"><img src="<?php $hosturl; ?>/image/imgy.png" alt="鬼故事"/></span><span class="next"><img src="<?php $hosturl; ?>/image/imgz.png" alt="灵异事件"/></span></div></div>
<script type="text/javascript">TouchSlide({ slideCell:"#slideBox", mainCell:".bd ul", effect:"leftLoop" });</script>
<?php
echo '<ul id="pl" n="7">';
$pagex=($page-1)*$pagesize;
$pagex<=0?$pagex="0":"";
$id=intval($id);
$sql = "select `id`,`title`,`content`,`url`,`rq` from `bbs` where classify='$id' and sh='yes' order by `id` desc limit $pagex,$pagesize";
$result=mysql_query($sql);
$result==""?header("location../"):"";
while($article=mysql_fetch_assoc($result)){
if($wjt=="0"){
$url=$hosturl."/bbs/guigushi.php/".$article['id'].".html";
}else{
$url=$hosturl."/bbs/guigushi.php?id=".$article['id'];
}
$imgurl=$article['url'];
if($imgurl==""){
$imgurl=$hosturl."/image/ico.png";
}else{
$imgurl=explode("|",$imgurl);
$imgurl=$hosturl."/bbs/".$imgurl['0'];
}
echo '<a href="'.$url.'"><li><i><img src="'.$imgurl.'" alt="灵异图片"></i><span class=\"y\"><s>'.$article['title'].'</s><br><u>';
$content=mb_substr($article['content'],0,50,'utf-8');
$content=str_replace('\r',' ',$content);
$content=str_replace('\n','',$content);
echo "$content</u></span></li></a>";
}
mysql_free_result($result);
?>
</ul>
<?php
if($pages>1){
echo "<center><a href=\"$hosturl/bbs/page.php?id=$id\" id=\"jz\">更多文章↓
</a></center>";
}
require_once("../moban/foot.php");
?>
</body></html>