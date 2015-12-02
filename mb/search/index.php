<?php
/*判断加引文件*/
require("../install/panduang.php");
$wjt="0";//伪静态设置
$id=$danger->fangzhuru(@$_GET['id']);
$classify=$danger->fangzhuru(@$_GET['classify']);
$text=$danger->fangzhuru(@$_GET['text']);
$page=$danger->fangzhuru(@$_GET['page']);
if($id==""){
$id="1";
}
if($classify!="bbs"){
$classify="article";//空搜分类
}
if($page==""){
$page="1";
}
$sql="select * from `$classify` where (title like '%$text%' or content like '%$text%') and sh='yes'";
$res=mysql_query($sql);
$nums=mysql_num_rows($res);
$pagesize=12;
$pages=ceil($nums/$pagesize);
$page<=0?$page="1":"";
$page>$pages?$page=$pages:"";
?>
﻿<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"><meta name="baidu-site-verification" content="8rWXMm0C6u" /><meta name="baidu-site-verification" content="uez0mVdrmC"><meta name="baidu-site-verification" content="uez0mVdrmC">
<title>鬼故事,搜索本站全部鬼故事</title>
<meta name="keywords" content="鬼故事,鬼故事小说,农村鬼故事,短篇鬼故事,恐怖鬼故事,沃の鬼故事,真实鬼故事">
<meta name="description" content="网站有:真实鬼故事,恐怖鬼故事,沃の鬼故事,短篇鬼故事,民间鬼故事,鬼故事,校园鬼故事,恐怖灵异图片,小说">
<link href="<?php $hosturl; ?>/search/css.css" rel="stylesheet" type="text/css">
</head><body>
<div id="logo"><img src="<?php echo $hosturl; ?>/image/logo.png" alt="校园鬼故事"><a href="<?php echo $hosturl; ?>/sezhi.php"><img src="<?php echo $hosturl; ?>/image/sezhi.png" style="float:right" alt="沃の"></a></div><p id="e"><a href="<?php echo $hosturl; ?>">首页</a><a href="<?php echo $hosturl; ?>/article/classify.php">故事</a><a href="<?php echo $hosturl; ?>/bbs/classify.php">论坛</a><a href="<?php echo $hosturl; ?>/search/index.php" class="c">搜索</a><a href="<?php echo $hosturl; ?>/link">导航</a></p>
<div class="form" id="file">
<form action="" method="get">
<input id="input" type="text" name="text" placeholder="输入要搜索的内容">
<div class="select">
<select name="classify">
<?php
if($classify=="article"){
echo '<option value="article">鬼故事</option><option value="bbs">论坛</option>';
}else{
echo '<option value="bbs">论坛</option><option value="article">鬼故事</option>
';
}
?>
</select>
</div>
<input class="submit" type="submit" value="搜 索">
</form>
</div>
<div id="pl">
<ul>
<?php
$pagex=($page-1)*$pagesize;
$pagex<=0?$pagex="0":"";
$sql="select * from `$classify` where (content like '%$text%' or title like '%$text%') and sh='yes' order by `id` desc limit $pagex,$pagesize";
$result=mysql_query($sql);
while($article=mysql_fetch_assoc($result)){
if($wjt=="0"){
$url=$hosturl."/".$classify."/guigushi.php/".$article['id'].".html";
}else{
$url=$hosturl."/".$classify."/guigushi.php?id=".$article['id'];
}
echo "<a href=\"$url\"><li><b>".str_replace($text,"<o>{$text}</o>",$article['title'])."</b><i>阅:{$article['rq']}</i><br/><br/>
<span>";
$content=str_replace($text,"<o>{$text}</o>",$article['content']);
$pos=@mb_strpos($content,$text,"0",'utf-8');
if($pos){
$posj=$pos-5;
echo mb_substr($content,$posj,112,'utf-8');
}else{
echo mb_substr($content,0,112,'utf-8');
}
echo "</span></li></a>";
}
mysql_free_result($result);
?>
</ul>
</div>
<?php
echo "<nav id=\"navpage\">";
$num=8;//显示页码个数
$total=$pages;//总页数
$start=1;//开始页码
$end=$pages;//末尾页码
$total<$num?$num=$total:"";
if($page>$total)
{
$page=$total;
}
$nums1=intval($num/2);
$nums2=$num%2==0?$nums1-1:$nums1;
if($page<=$num-$nums2)
{
$start=1;
$end=$num;
}else{	
$start=$page-$nums1;
$end=$page+$nums2;	
}
/*当计算出来的末尾项大于总页数*/
if($end>$total)
{
$start=($total-$num)+1;//开始项等于总页数减去要显示的数量然后再自身加1
$end=$total;	
}
for($i=$start;$i<=$end;$i++)
{
if($page==$i)
{
echo "<a id='nav'>".$i."</a>";
}else{
$pageurl="?id=$id&classify=$classify&text=$text&page=$i";
echo "<a href='$pageurl'>".$i."</a>";
}
}
if($nums=="0"){
echo "<a style=\"width:100%;\">没有搜索到该文章</a>";
}
echo "</nav>";
?>
<?php
mysql_free_result($res);
require_once("../moban/foot.php");
?>
</body></html>