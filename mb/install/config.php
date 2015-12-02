<?php
/*沃のQQ790131300*/
require('sjk.php');
require('admin.php');
$link = mysql_connect($db_host, $db_user, $db_password);
if (!$link) {
die ('数据库连接失败');
}
mysql_select_db($db_name, $link) or die ("没有找到数据库");
mysql_query("set names utf8;");
date_default_timezone_set('PRC');
function close() {
if(@$link){
mysql_close($link);
unset($link);
}
}
?>