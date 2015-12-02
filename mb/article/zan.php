<?php
require("../install/panduang.php");
if(!empty($_POST['id'])){
$id=$danger->fangzhuru($_POST['id']);
$id=explode(",",$id);
$ip=$id['1'];
$sql="select * from `article` where `id`=$id[0]";
$result=mysql_query($sql);
$article=mysql_fetch_assoc($result);
$zan=$article['z']+1;
$ipp=$article['ip']."|".$ip;
$sql = "update `article` set `z`=$zan,ip='$ipp' where `id`=$id[0]";
if(strstr($article['ip'],$ip)){
echo "zan";
}elseif(mysql_query($sql)){
echo "ok";
}else{
echo "failed";
}
}
mysql_free_result($result);
?>