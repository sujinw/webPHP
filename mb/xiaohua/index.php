<?php
/*判断加引文件*/
require("../install/panduang.php");
$ip=$_SERVER["REMOTE_ADDR"];
$classify=$danger->fangzhuru(@$_GET['classify']);
function pl($id){
$sql="select * from `pl` where classify='xiaohua' and uid='$id'";
$result=@mysql_query($sql);
$nums=@mysql_num_rows($result);
echo $nums;
}
?>
﻿<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"><meta name="baidu-site-verification" content="8rWXMm0C6u" /><meta name="baidu-site-verification" content="uez0mVdrmC"><meta name="baidu-site-verification" content="uez0mVdrmC">
<title>笑话,幽默笑话,冷笑话,笑话大全,搞笑图片</title>
<meta name="keywords" content="笑话,幽默笑话,笑话大全,冷笑话,笑话网站,搞笑图片">
<meta name="description" content="笑话网站有:冷笑话,笑话大全,笑死你,恐怖笑话,鬼故事-笑话天地,逗比爱笑话,搞笑图片">
<link href="../style/xiaohua.css" rel="stylesheet" type="text/css"></script>
</head><body>
<div id="logo"><img src="../image/xiaohualogo.png" alt="幽默笑话"><a href="faxiaohua.php"><img src="../image/xiaohuaft.png" style="float:right" alt="冷笑话"></a></div>
<p id="e"><a href="../" id="c">首页</a><a href="../article/classify.php">故事</a><a href="../bbs/classify.php">论坛</a><a href="../search/index.php">搜索</a><a href="../link">导航</a></p>
<div id="file">
<nav>
<?php
if($classify!="img"){
echo '<a id="sezhi" href="?classify=img">搞笑图</a>';
}else{
echo '<a id="sezhi" href="?classify=">纯文字</a>';
}
?>
<a href="../article/sezhi.php" id="sezhi">设置页面</a></nav>
</div>
<script src="<?php echo $hosturl; ?>/style/jquery.min.js" language="JavaScript"></script><script src="<?php echo $hosturl; ?>/style/xiaohua.js" language="JavaScript"></script><div id="tishi" style='display:none;'>+1</div>
<?php
$page=@$danger->fangzhuru($_GET['page']);
@$page==""?$page="0":"";
$sql="select * from `xiaohua` where classify='$classify' and sh='yes'";
$result=@mysql_query($sql);
$nums=@mysql_num_rows($result);
$pagesize=6;//每页条数
$pages=ceil($nums/$pagesize);
$page<=0?$page="1":"";
$page>$pages?$page=$pages:"";
$pagex=($page-1)*$pagesize;
$pagex<=0?$pagex="0":"";
$sql = "select * from `xiaohua` where classify='$classify' and sh='yes' order by `id` desc limit $pagex,$pagesize";
$result=mysql_query($sql);
while($article=mysql_fetch_assoc($result)){
$id=$article['id'];
$zan=$article['zan'];
$nozan=$article['nozan'];
$content=$article['content'];
if(strstr($content,"{img}")){
$content=$danger->yueduimg($article['content']);
}
echo "<ul><li>".$article['title']."</li>";
echo "<div id=\"font\">$content</div><div id=\"zan\"><a onclick=\"finger('".$id.",".$ip.",zan')\"><img src=\"../image/zan.png\"><span class='finger".$article['id']."'>".$zan."</span></a><a class=\"zan\" onclick=\"tjpl(".$article['id'].")\"><img src=\"../image/pl.png\">";
pl($article['id']);
echo "</a><a class=\"zan\" onclick=\"ren('".$id.",".$ip.",nozan')\"><img src=\"../image/nozan.png\"><span class='ren".$article['id']."'>".$nozan."</span></a></div></ul>";
}
mysql_free_result($result);
echo "<nav>";
$num=9;//显示页码个数
$total=$pages;//总页数
$start=$page;//开始页码
$end=$pages;//末尾页码
$total<$num?$num=$total:"";
if($page>$total)
{
$page=$total;
}
$nums1=intval($num/2);
$nums2=$num%2==0?$nums1-1:$nums1;
if($page<=$num-$nums2){
$start=1;
$end=$num;
}else{	
$start=$page-$nums1;
$end=$page+$nums2;	
}
/*当计算出来的末尾项大于总页数*/
if($end>$total){
$start=($total-$num)+1;//开始项等于总页数减去要显示的数量然后再自身加1
$end=$total;	
}
for($i=$start;$i<=$end;$i++){
if($page==$i){
echo "<a id='nav'>".$i."</a>";
}else{
$pageurl="?page=$i&classify=$classify";
echo "<a href='$pageurl'>".$i."</a>";
}
}
echo "<a href=\"page.php?classify=$classify\" style=\"color:red\">更多</a></nav>";
?>
<?php
require("../moban/foot.php");
?>