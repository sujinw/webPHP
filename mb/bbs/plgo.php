<?php
header("Content-type:text/html;charset=utf-8");
require("bq.php");
include("../install/panduang.php");
if($nameuser==""){
$nameuser="游客";
}
$time=date('Y-m-d H:i:s');
$namee=$danger->fangzhuru(@$_POST['name']);
@$content=$danger->fangzhuru($_POST['content']);
$content=bq($content);
@$sql="select * from `pl` where `classify`='bbs' and `uid`='$namee' and content='$content'";
$query=mysql_query($sql);
@$articletext=mysql_num_rows($query);
if($articletext>0 or $content==""){
$content="重复";
}else{
$sql="insert into `pl` (uid,name,classify,title,content) values ('{$namee}','$nameuser','bbs','{$time}','{$content}');";
$res = mysql_query($sql);
}
echo '{"name": "'.$namee.'","content": "'.$content.'","nameuser": "'.$nameuser.'","time": "'.$time.'","status": "1"}';
mysql_free_result($query);
?>