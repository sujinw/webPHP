<?php
/**
 * 数据库配置
 */
$server = "localhost";
$user = "root";
$password = "123456";
$dbname = "guestbook";
$charset = "utf8";

$link = mysql_connect ( $server, $user, $password ) or die ( "数据库链接失败" );
mysql_query ( "set names $charset", $link );
mysql_select_db ( $dbname, $link ) or die("未知数据库");
