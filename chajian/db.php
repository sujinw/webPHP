<?php
/**
 * 数据库连接
 */
$host = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'test';

$conn = mysql_connect($host,$user,$password);
if(!$conn){
	echo "数据库连接失败";
	exit(mysql_errno);
}
$select = mysql_select_db($db,$conn);
mysql_query("set names 'utf8'");//编码转化
// $value = array();
// $query_num = 200; //插入数量
// for($i=1;$i<=$query_num;$i++){
//     $value[] = "这是第".$i."条数据0_0";
// }
// print_r($value);
  
// foreach( $value as $key => $val ) { 
//   $Sql = "insert into page( `cont`) values('" . $val . "')" ;
  
//     mysql_query( $Sql ) or print( mysql_error() . '<br />');
//  }  


?>