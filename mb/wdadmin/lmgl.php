<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>栏目管理</title>
<style type="text/css">
body {
font-size: 16px;
background: #eee;
margin:0px;
color:#fff;
}
a:link,a:visited {text-decoration:none; color:#004299;}
#d{background:#c99979;padding:1px;color:#fff;border-radius:0px 0px 2px 2px;}
ul{padding:0px;margin:0px}
li{background:#fff;list-style-type:none;padding:8px;margin-top:1px}
nav{ height: 38px;background-color: #b7ba6b;}
nav a{ display: block;  box-sizing: border-box; width: 20%; height: 38px; line-height: 38px;}
#nav{background-color: #c1d0e8; float: left;border-right: 1px solid #dbe3f0;text-align:center}
#nava{float: left;border-right: 1px solid #dbe3f0;text-align:center;
}
.nav{ height: 38px;  background-color: #fafcff;}
.nav a{ display: block; float: left; box-sizing: border-box; width: 25%; height: 38px; line-height: 38px; text-align: center; font-size: 16px}
.nav .b{background-color: #c1d0e8;}
.nav .a{ border-right: 1px solid #dbe3f0;}
#file {position: relative;top: 0;width: 100%; box-shadow: 2px 2px 2px rgba(0,0,0,0.2); z-index: 30;}
.width{width:50%;}
.widtha{width:25%;}
.widthb{width:65%;}
#yb{float:right;font-size:14px;margin:4px;color:#f15a22}
#input {
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;
width:73%;
border:solid 0px #f2eada;
}
#submit {background:#abc88b;border-radius:1px;border:0px;width:25%;padding:5px}
</style>
</head><body>
删除栏目,文章不删除也不隐藏
<?php
require ("panduang.php");
$scid=@$_GET['scid'];
$postid=@$_POST['scid'];
echo '<div class="nav" id="file"><a href="index.php" class="a">后台首页</a><a href="hy.php" class="a">会员管理</a><a href="article.php" class="b">栏目管理</a><a href="ly.php" class="a">留言管理</a></div>';
if($scid){
echo '<div id="d">
<form action="" method="post">
<input name="scid" type="text" value="'.$scid.'" id="input"><input type="submit" name="submit" value="确定" id="submit">
</form>
</div>
';
}
if($postid){
$exec="delete from lm where id=$postid";
$resul=mysql_query($exec);
if((mysql_affected_rows()==0)||(mysql_affected_rows()==-1)){
echo "删除失败！";
}else{
echo "删除成功！";
}
}
echo '<ul>';
$sql="select * from lm";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)){
echo '<a href="../'.$row['classify'].'/classify.php?id='.$row['id'].'"><li id="li">'.$row['name'].'<a href="?scid='.$row['id'].'" id="yb">删除</a> <a href="xglm.php?id='.$row['id'].'" id="yb">修改</a></li></a>';
}
echo '</ul>';
mysql_free_result($res);
?>
</nav>
</body></html>