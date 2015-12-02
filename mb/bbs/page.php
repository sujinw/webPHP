<?php
/*沃のQQ790131300*/
require ("../install/panduang.php");
$wjt="1";
if(@$htmlurl=$_SERVER["PATH_INFO"]){
if(preg_match("/\/(\d+)_(\d+)\.html/si",$htmlurl,$urlid)){
$id=$danger->fangzhuru(intval($urlid[1]));
$page=$danger->fangzhuru(intval($urlid[2]));
}}else{
$id=$danger->fangzhuru(@$_GET['id']);
$page=$danger->fangzhuru(@$_GET['page']);
}
$lsql="select * from `lm`";
$result=mysql_query($lsql);
$title=mysql_fetch_assoc($result);
if(!$title){
header("location:../");
mysql_free_result($result);
exit();
}
@$id==""?$id=intval($title['id']):"";
@$page==""?$page="0":"";
$sql="select * from `bbs` where classify={$id} and sh='yes'";
$result=@mysql_query($sql);
$nums=@mysql_num_rows($result);
$pagesize=9;//每页条数
$pages=ceil($nums/$pagesize);
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>沃の鬼故事超多分页页面</title> 
<meta name="keywords" content="鬼故事,鬼故事全集,短篇鬼故事,真实恐怖鬼故事,沃の">
<meta name="description" content="鬼故事,鬼故事分类,惊悚鬼故事,鬼故事大全,短篇鬼故事,校园鬼故事,鬼故事小说,鬼故事网站_guigs.cn">
<link href="<?php echo $hosturl; ?>/style/bbsclassify.css" rel="stylesheet" type="text/css"></head><body>
<header>
<a href="javascript:history.go(-1);"></a>
<h1>灵异论坛</h1></header>
<?php
echo "<nav id=\"navpage\">";
if($page>="1"){
echo "<a href=\"$hosturl/bbs/page.php?page=";
echo $page-1;
echo "\" style=\"color:red\">上百页</a>";
}
$num=100;//显示页码个数
$total=$pages;//总页数
$start=0;//开始页码
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
if($wjt=="0"){
$pageurl="$hosturl/bbs/classify.php/".$id."_".$i.".html";
}else{
$pageurl="$hosturl/bbs/classify.php?id=$id&page=$i";
}
echo "<a href='$pageurl'>".$i."页</a>";
}
if($pages>$page+1*100){
echo "<a href=\"$hosturl/article/page.php?id=$id&page=";
echo $page+1;
echo "\" style=\"color:red\">下百页</a>";
}
echo "</nav>";
?>
<?php
mysql_free_result($result);
require_once("../moban/foot.php");
?>
</body></html>