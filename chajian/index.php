<?php
/**
 * 插件测试入口文件
 */
/*==============================================================*/
/**
 * 引入测试插件文件
 */
include 'db.php';
include 'page.class.php';

/*==============================================================*/
/*
 *分页插件测试
 */
// $total_row = mysql_query("SELECT * from page");
// $total_rows = mysql_num_rows($total_row);
// var_dump($total_rows);
$params = array(
            'total_rows'=>200, #(必须)
            'method'    =>'', #(必须)
            'parameter' =>'index.php?p=?',  #(必须)
            'now_page'  =>$_GET['p'],  #(必须)
            'list_rows' =>10, #(可选) 默认为15
);
$page = new Page($params);
$now = ((int)$_GET['p']-1) * (int)$params['list_rows'];
$end = $params['list_rows'];
// var_dump($now);
// var_dump($end);

$sql = "SELECT * FROM page LIMIT ".$now.",".$end;
echo $sql . '<br/>';

echo  $page->show(1);
$data = mysql_query($sql);
echo "<table border='1' width='100%'>
<tr>
<th>id</th>
<th>cont</th>
</tr>";

// 使用while语句循环mysql_fetch_array()函数返回的数组
while($result=mysql_fetch_array($data)){

echo "<tr>
<td>";
echo $result['id']."</td><td>";
echo $result['cont']."</td></tr>";
} // 结束while循环
echo "
</table>

<p>共有";echo $page->show(1)."条记录</p>";

/*==============================================================*/
?>