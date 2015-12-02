<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>沃艹鬼故事友粘</title> 
<meta name="keywords" content="鬼故事">
<meta name="description" content="鬼故事,友连">

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

#img{background:#fff;padding:5px;border-radius:2px;color:#336688;border:0px}
#submit {background:#abc88b;border-radius:3px;border:0px;width:50%;padding:5px}
</style>
</head><body>
<?php
require("../install/panduang.php");
$Str="select `id`,`title` from link order by id desc";
$result=mysql_query($Str);
$link=mysql_fetch_assoc($result);
mysql_free_result($result);
?>
<?php
if(@!$_POST['submit']){
?>
<div id="b">添加友链<b style="float:right;font-size:13px"><a href="../">首页</a></b>
</div>
<div id="c">
<form method="post" action="" enctype="multipart/form-data">
<?php
echo "预计回链:<br/>http://guigs.cn/link/link.php?l=";
echo $link['id']+1;
?>

<br/>
<br/>分类:<select name="classify" id="img">
<?php
$sql="select * from lm where classify='link'";
$res=mysql_query($sql);
while($lm=mysql_fetch_array($res)){
echo "<option value=".$lm['id'].">".$lm['name']."</option>";
}
mysql_free_result($res);
?>
</select>

<br/>
网站名称:4字内<br/>
<input type="text" name="title" maxlength="4" placeholder="" id="input"/>
<br/>网站简称:(限制2个字)
<br/>
<input type="text" name="title1" maxlength="2" placeholder="" id="input"/>

<br/>贵站网址:(http://)<br/>
<input type="text" name="url" maxlength="100" id="input" value="http://"/>
<br/>说明(不能大于100字)<br/>
<input type="text" name="content" maxlength="100" id="input"/>
<br/>
<input type="text" name="code" size="7"  placeholder="验证码" id="input">
<b id="img">
<?php
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
echo $rand;
?>
</b>
 <a href="">看不清!</a>
<br/>
<input type="submit" name="submit" value="确定添加" id="submit">
<b id="img"><a href="index.php">友链</a>
</b>
</form>
</div>
<div id="d">
免审核，客户QQ:790431300<br/>
请正确添加友链。谢谢。
<br/>名称:沃鬼故事<br/>简称:沃鬼
<br/>介绍:沃の鬼故事,短篇真实鬼故事大全,胆小不要进,真实鬼故事,恐怖鬼故事,医院鬼故事,短篇鬼故事,民间鬼故事,乡村鬼故事,校园鬼故事小说等guigs.cn……!
</div>
<?php
exit();
}else{
?>
<div id="b">提交状态</div>
<div id="d">
<?php
$randcode=$_SESSION['randcode'];
$classify=$_POST['classify'];
$title=$danger->fangzhuru(trim($_POST['title']));
$titlea=$danger->fangzhuru(trim($_POST['title1']));
$content=$danger->fangzhuru(trim($_POST['content']));
$url=$danger->fangzhuru(trim($_POST['url']));
$验证码=$danger->fangzhuru(trim($_POST['code']));
if(strlenutf8($title)>5 || strlenutf8($titlea)!=2 || strlenutf8($title)<2){
echo "错误";
exit();
}elseif(@!ereg("^http://[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*$", $url)){
echo "网址错误!";
exit();
}elseif($验证码!=$randcode){
echo "验证码错误";
exit();
}elseif(strlenutf8($content)>100){
echo "内容不能大于100";
exit();
}
$sql="select * from link where url='$url'";
$query=mysql_query($sql);
$rows=mysql_num_rows($query);
if($rows > 0){
echo "网址已经存在
<script type='text/javascript'>
alert('网址已存在');
<script>";
}else{

$sqlstr = 'insert into link(id,classify,title,title1,url,content,l,q,sh,z) values (Null,"'.$classify.'","'.$title.'","'.$titlea.'","'.$url.'","'.$content.'","0","0","yes",0)';
$result=mysql_query($sqlstr);


if($result){
$sql="select * from link where url='$url'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
echo "申请成功,回连是<br/>
http://guigs.cn/link/link.php?l=";
echo $row['id'];
echo "<br/>";
}else{
echo "失败！失败！";
}
}
mysql_free_result($query);
}
close();
?>
<br/><br/><a href="">返回</a>
</div>
</body></html>