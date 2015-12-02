<?php
require("../install/panduang.php");
$id=$danger->fangzhuru(@$_POST['id']);
$page=$danger->fangzhuru($_POST['page']);
$sql="select * from `pl` where `uid`='$id' and classify='article'";
$result=@mysql_query($sql);
$nums=@mysql_num_rows($result);
$pagesize=10;//每页条数
$pages=ceil($nums/$pagesize);//总页
$pagex=($page-1)*$pagesize;
if($pages<$page and  $page>1){
echo "ok";
mysql_free_result($result);
}else{
$sql="select * from `pl` where `uid`='$id' and classify='article' order by `id` desc limit $pagex,$pagesize";
$result = mysql_query($sql,$link);
while($row=mysql_fetch_array($result)){
echo "<li><b>{$row['name']}</b><i>{$row['title']}</i><br/><br/><span>{$row['content']}</span></li>";
}
mysql_free_result($result);
echo "<p id=\"page\">共{$nums}条-第{$pages}/{$page}页↑<p>";
}
?>