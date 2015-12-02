<?
//数据库配置文件
include("conn.php");

//每页显示信息
$pagesize=20;

//最大加载次数
$maxnum = $_POST["maxnum"]-1;

//从哪里开始
$page=$_POST["page"];
$nextpagestart = $page*$pagesize;



$sql = "select `pic` from `mypic` limit $nextpagestart,$pagesize";
$query =mysql_query($sql);
while($row = mysql_fetch_array($query)){
	//内容
?>
<img src="<?=$row["pic"];?>" alt="" width="200" height="200">
<?
}



//分页
if($page ==$maxnum){
	include('page.class.php');
	$sqlsum = "select `id` from `mypic`";
	$querysum = mysql_query($sqlsum);

	//数据总数
	$total = mysql_num_rows($querysum);
	//参数对应位置：总记录，每页显示的条数，当前页，连接的地址
	$my_page=new PageClass($total,$pagesize,$page,'?page={page}');
	//输出页码
	echo $my_page->myde_write();
	exit;
}
?>