<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>修改友连</title> 


<style type="text/css">
body {
		font-size: 16px;
		background: #eee;
margin:3px;
	}
a:link,a:visited {text-decoration:none; color:#004299;}
#input {
width:%87;
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;
border:solid 0px #f2eada;
}
#b{background:#cbc547;padding:8px;color:#fff;border-radius:4px 4px 0px 0px;font-size:17px}

#c {background:#a1a3a6;padding:5px;color:#fff;}

#d{background:#c99979;padding:5px;color:#fff;border-radius:0px 0px 2px 2px;}

#img{background:#fff;padding:5px;border-radius:2px;color:#336688}
#submit {background:#abc88b;border-radius:3px;border:0px;width:50%;padding:5px}
</style>
</head><body>
<?php
$id=@$_GET['id'];
require ("panduang.php");
$sql="select * from link where id='$id'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
$title=$row['title'];
$titlea=$row['title1'];
$url=$row['url'];
$content=$row['content'];
mysql_free_result($query);
if(@!$_POST['submit']){
?>

<div id="b">修改友链<b style="float:right;font-size:13px"><a href="../">首页</a></b>
</div>

<div id="c">
<form method="post" action="">
网站名称:4字内<br/>
<input type="text" name="title" maxlength="4" placeholder="" id="input" value="<?php echo $title; ?>"/>
<br/>网站简称:(限制2个字)
<br/>
<input type="text" name="title1" maxlength="2" placeholder="" id="input" value="<?php echo $titlea; ?>"/>

<br/>贵站网址:<br/>
<input type="text" name="url" maxlength="16" id="input" value="<?php echo $url; ?>"/>
<br/>说明(不能大于100字)<br/>
<input type="text" name="content" maxlength="16" id="input" value="<?php echo $content; ?>"/>
<br/>
<select name="sh" id="img">
<option value="yes">审核</option>
<option value="no">不审核</option>
</select>
</b>
<br/>
<input type="submit" name="submit" value="确定修改" id="submit">
<b id="img"><a href="index.php">后台</a>
</b>
</form>
</div>
<div id="d">
经典后台QQ:790431300<br/>
低价*^_^*
</div>
<?php
exit();
}else{
?>
<div id="b">提交状态</div>
<div id="d">
<?php
$title=trim($_POST['title']);
$titlea=trim($_POST['title1']);
$content=trim($_POST['content']);
$url=trim($_POST['url']);
$sh=trim($_POST['sh']);
if(strlenutf8($title)>5 || strlenutf8($titlea)!=2 || strlenutf8($title)<2){
echo "错误";
exit();
}elseif(!@ereg("^http://[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*$", $url)){
echo "网址错误!";
exit();
}
if(strlenutf8($content)>100){
echo "内容不能大于100";
exit();
}else{
$sql="update link set title='$title',title1='$titlea',url='$url',content='$content',sh='$sh' where id=$id";
$query=mysql_query($sql);
if($query){
echo "<div id='c'>修改成功</div>";
}else{
echo "<div id='c'>修改失败</div>";
}

}
}
close();
?>
<br/><br/><a href="">返回</a>
</div>
</body></html>