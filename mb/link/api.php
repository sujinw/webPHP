<?php
require_once("../install/config.php");
$sid=@$_GET['sid'];
if($sid==$linkadmin){
$sql="select * from link where id order by id desc";
$res=mysql_query($sql);
$linkid=mysql_fetch_array($res);
$link='{"linktitle":"'.$linktitle.'","linktitle1":"'.$linktitle1.'","linkcontent":"'.$linkcontent.'","url":"'.$adminurl.'/link/link.php?l='.$linkid['id'].'","link":"'.$类型.'"}';
echo $link;
mysql_free_result($res);
}else{
echo "密码错误";
}
?>