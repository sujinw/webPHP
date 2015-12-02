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
@$id==""?$id=1:"";
$lmsql="select * from `lm` where `classify`='article' and `sh`='yes' and id={$id}";
$result=mysql_query($lmsql);
$title=mysql_fetch_assoc($result);
if(!$title){
echo "无此栏目";
header("location:../");
mysql_free_result($result);
exit();
}
@$page==""?$page="0":"";
$articlesql="select * from `article` where `classify`={$id} and `sh`='yes'";
$result=@mysql_query($articlesql);
$nums=@mysql_num_rows($result);
$pagesize=20;//每页条数
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
<link href="<?php echo $hosturl; ?>/article/style.css" rel="stylesheet" type="text/css">
</head><body>
<script language="JavaScript">
function k(){document.getElementById('form').style.display='block';document.getElementById('js').style.display='none';document.getElementById('j').style.display='block';setTimeout("start()","50");}function g(){document.getElementById('form').style.display='none';document.getElementById('js').style.display='block';document.getElementById('j').style.display='none';}
</script>
<header>
<a href="javascript:history.go(-1);"></a>
<h1>鬼故事-大全</h1></header>
<nav id="file">
<?php
$sqll="select id,name from `lm` where `classify`='article' and sh='yes' order by `id` asc";
$result=mysql_query($sqll);
while($lm=mysql_fetch_assoc($result)){
if($wjt=="yes"){
$url=$hosturl."/article/classify.php/".$lm['id']."_1.html";
}else{
$url=$hosturl."/article/classify.php?id=".$lm['id'];
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
<div class="nav"><a href="<?php echo $hosturl; ?>">首页</a><a><?php echo $title['name']; ?></a><a href="<?php echo $hosturl; ?>/article/ft.php">发布</a><a id='js' onclick='k();'>展开搜索</a><a id='j' onclick='g();' style="display:none;">关闭搜索</a></div>
<div id="form" style="display:none;"><form action="<?php echo $hosturl; ?>/search/index.php" method="GET"><input name="text" type="text" value="鬼故事" id="input"><input type="submit" name="submit" value="确定搜索" id="submit">
</form>
</div>
<div id="url">
<ul>
<?php
$pagex=($page-1)*$pagesize;
$pagex<=0?$pagex="0":"";
$sql = "select `id`,`title`,`rq` from `article` where classify={$id} and sh='yes' order by `id` desc limit $pagex,$pagesize";
$result=mysql_query($sql);
while($article=mysql_fetch_assoc($result)){
if($wjt=="yes"){
$url=$hosturl."/article/guigushi.php/".$article['id'].".html";
}else{
$url=$hosturl."/article/guigushi.php?id=".$article['id'];
}
echo "<a href=\"$url\"><li>".$article['title']."</li></a>";
}
mysql_free_result($result);
?>
</ul></div>
<?php
echo "<div id=\"page\">";
$num=9;//显示页码个数
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
if($wjt=="0"){
$pageurl="$hosturl/article/classify.php/".$id."_".$i.".html";
}else{
$pageurl="$hosturl/article/classify.php?id=$id&page=$i";
}
echo "<a href='$pageurl'>".$i."</a>";
}
}
echo "<a href=\"$hosturl/article/page.php?id=$id\" style=\"color:red\">更多</a></div>";
?>
<?php
require_once("../moban/foot.php");
?>
</body></html>