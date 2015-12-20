<?php 
/*
 * 应用内配置文件
 */
$commonConfig = array(
	/*===========================================================
	数据库连接相关配置*/
	'DB_CHARSET'	=>	'utf8',
	'DB_HOST'		=>	'127.0.0.1',
	'DB_PORT'		=>  3306,
	'DB_USER'		=> 'root',
	'DB_PASSWORD'	=> 'root',
	'DB_DATABASE'	=> 'mbcms',
	'DB_PREFIX'		=> 'mb_',
	//加载文件
	"AUTO_LOAD_FILE"=>array('Function.php',"SmartyPluTag.php")
);
return array_merge($commonConfig,require_once 'config.inc.php');