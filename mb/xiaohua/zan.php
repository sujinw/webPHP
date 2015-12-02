<?php
require("../install/panduang.php");
if(!empty($_POST['id'])){
$id=$danger->fangzhuru($_POST['id']);
$id=explode(",",$id);
$ip=$id['1'];
$zanyes=$id['2'];
$sql="select * from xiaohua where id=$id[0]";
$result=mysql_query($sql);
$article=mysql_fetch_assoc($result);
$zan=$article['zan']+1;
$nozan=$article['nozan']+1;
$ipp=$article['ip']."|".$ip;
if($zanyes=="zan"){
$sql = "update xiaohua set zan='$zan',ip='$ipp' where id=$id[0]";
if(strstr($article['ip'],$ip)){
echo "zan";
}else{
mysql_query($sql);
echo "ok";
}
}elseif($zanyes=="nozan"){
$sql = "update xiaohua set nozan='$nozan',ip='$ipp' where id=$id[0]";
if(strstr($article['ip'],$ip)){
echo "zan";
}else{
mysql_query($sql);
echo "ok";
}
}
}
mysql_free_result($result);
?>