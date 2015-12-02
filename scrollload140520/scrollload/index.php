<?
//数据库配置文件
include("conn.php");
//默认搜索
$page = $_GET["page"] ? $_GET["page"] : 1;
$pagesize = 20;
$pageval = ($page-1)*20;

$sql="select `pic` from `mypic` limit $pageval,$pagesize";
$query = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://files.cnblogs.com/tinyphp/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="page.css">
<title>延迟加载</title>
</head>
<style type="text/css">
	.showbox{ width:1000px; margin:0 auto;}
	.showbox img{ padding:5px; background:#CCCCFF;}
	.add-more{ width: 1000px; background: yellow;height: 100px; line-height: 30px; text-align: center; margin: 0 auto; display: none;}
</style>
<body>
<div class="showbox">
<?
	while($row=mysql_fetch_array($query)){
?>
<img src="<?=$row["pic"];?>" alt="" width="200" height="200">
<?
	}
?>
</div>
<!--数据加载提示，默认隐藏-->
<div class="add-more">数据正在加载...</div>
<!--js部分-->
<script type="text/javascript">

	$(function(){
		var downrange	= 100;				//下边界-参考正在加载提示层/px
		var num = <?=$page;?>;				//初始页码
		var maxnum = num+5;					//设置加载次数
		var $main = $(".showbox");			//主体
		var $loaddiv = $(".add-more")		//加载提示层
		var totalheight = 0;			
		//判断是否需要异步
		function ifLoad(){
			//滚动条距离顶部距离
			var scrolltotop=parseFloat($(window).scrollTop());
			//窗口高度
			var winheight = parseFloat($(window).height());
			//内容总高度
			var conheight = parseFloat($(document).height())-downrange; 
			//总高度
			totalheight = scrolltotop + winheight;

			//判断是否加载，当操作高度比内容大，空间充裕->加载
			if(totalheight >= conheight && num!=maxnum){
				ajaxLoad(num);
				num++;
			}

		}



		//ajax-fun
		function ajaxLoad(page){
			$.ajax({
				url:"ajax.php",
				type:"post",
				data:{page:page,maxnum:maxnum},
				success:function(result){
						//追加数据
						$main.append(result);
				}
			})
		}

		//加载中隐藏显示
		$loaddiv.ajaxStart(function(){
			 $(this).show();
			}).ajaxStop(function(){
				$(this).hide();
			})



		//scroll-fun
		$(window).scroll(ifLoad);

	})
</script>

</body>
</html>
