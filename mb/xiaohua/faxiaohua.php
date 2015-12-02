<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>发布笑话_分享笑话</title> 
<meta name="keywords" content="发布笑话,分享冷笑话">
<meta name="description" content="分页发布您的冷笑话,让大家笑起来">
<style type="text/css">
body{
background:#eee;
font-size: 14px;font-family: 'Microsoft YaHei',Hei,arial,sans-serif;color:#454518}
body,header,h1,div,form,h5,input{
margin:0;padding: 0;}
header{position: relative;text-align:center;background-color:#454518;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);}
header a{position: absolute;width: 45px;height: 45px;top: 0;left: 0;float: left;}
header a:after{content: '';position: absolute;top: 50%;left: 20px;width: 10px;height: 10px;margin-top: -5px;border: #999 solid;border-width: 2px 2px 0 0;-webkit-transform: rotate(225deg);}
h1{height:45px;color:#999;line-height: 45px;font-size: 18px;font-weight:600;}
#main{padding:14px 17px;}
.cont{width:100%;font-size:15px;border: none;box-sizing: border-box;-webkit-box-sizing: border-box;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);padding: 5px;border-radius:4px;background:#fff}
textarea{line-height: 22px;}
h5{color: #333;font-size: 15px;font-weight: normal;margin: 10px 0 5px 0;}
.contact input{height:35px;}
.btn{margin-top: 10px;text-align: center;}
#sub_but{font-weight:700;display:inline-block;padding:9px 27px;border:1px solid #C7C7C7;border-radius: 3px;font-size: 115%;width:100%;background:-webkit-gradient(linear,left top,left bottom,from(#34aa0d),to(#37aa0d));}.vali_code input{width:32%;vertical-align:top;}
.vali_code a{margin-left:10px;vertical-align: bottom;line-height:35px;display:inline-block;color:#454599}
a:link,a:visited {text-decoration:none; color:#369;}
table{width:100%;margin:0}
b{margin:2px;padding:6px;}
img{width:60%;height:250px;}
#tishi {text-align:center;height:auto;position: fixed;top:50%;background-color:rgba(0,0,0,0.3);
}
.nav a{display:block;box-sizing:border-box;height:38px;line-height:38px;text-align:center;font-size:16px;background:#424528;float:left;border-bottom:0px dashed #eee;color:#999;width:25%}
</style>
</head><body>
<script language="JavaScript">
function tjfile(){
var eNewRow = tblData.insertRow();
for (var i=0;i<1;i++){
var eNewCell = eNewRow.insertCell();
eNewCell.innerHTML = "<p><input class='cont' type='file' name='file[]' id='contact'></p>";
}}
function tishi(){
setTimeout("tishi()","0");
}
</script>
<div id="f-container">
<header>
<a href="javascript:history.go(-1);"></a>
<h1>分享笑话</h1></header>
<?php
require("../install/panduang.php");
if(@!$_POST['submit']){
?>
<form method="post" action="" enctype="multipart/form-data">
<div id="main">
<form method="POST">
<div class="contact">
<input class="cont" type="text" name="title" id="contact" placeholder="标题">
</div>
<h5>分享笑话,文明投稿!请使用{br}换行</h5>
<textarea class="cont" id="content" rows="6" name="text" placeholder="内容！最多500字"></textarea>
<?php
$classify=@$_GET['classify'];
if(@$classify=="img"){
echo "<input type='hidden' name='classify' value='$classify'>";
echo '
<table id="tblData"></table><br/><div class="cont" onclick="tjfile()">添加上传文件列表
</div>
<br/>
<a href="?classify="><div class="cont">发布纯文字笑话！</div></a><br/>
';
}else{
echo '<a href="?classify=img"><div class="cont">发布趣图！</div></a><br/>
';
}
?>
<div class="vali_code">
<input type="text" name="code" size="7"  placeholder="验证码" class="cont">
<a>
<?php
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
echo $rand;
?></a>
</div>
<div class="btn">
<input id="sub_but" value="提交  发布" type="submit" name="submit" onclick="tishi"></div>
</form>
<div id='tishi'  style='display:none;'>上传发布中…</div>
</div>
</div>
</div>
<?php
}else{
?>
<meta http-equiv="refresh" content="52; url=">
<div id="main">
<?php
$title=@$danger->fangzhuru(@$_POST['title']);
$content=@$danger->fangzhuru(@$_POST['text']);
$classify=@$danger->fangzhuru(@$_POST['classify']);
$time=date('Y-m-d H:i:s');
$code=@$_POST['code'];
$ip=$_SERVER["REMOTE_ADDR"];
$sql="select * from xiaohua where content='$content'";
$query=mysql_query($sql);
$article=mysql_fetch_assoc($query);
$percent=similar_text(@$article[content],$content);
$strlen=strlen($content)/5;
if($percent>=$strlen){
echo "文章貌似重复";
mysql_free_result($query);
}elseif($code!=$_SESSION["randcode"]){
echo "<script>alert('验证码错误');</script>";
echo "验证码错误<br/>";
mysql_free_result($query);
}elseif(strlenutf8($title)>15||strlenutf8($title)<1){
echo "<script>alert('标题长度错误！');</script>标题不能大于15字或小于1字";
mysql_free_result($query);
}elseif(strlenutf8($content)<20||strlenutf8($content)>900){
echo "<script>alert('内容长度错误');</script>内容最低20字最高900字";
mysql_free_result($query);
}else{
if($classify=="img"){
require("fileimage.php");
$content=$url;
}
$name=$name['name'];
$sqlstr = 'insert into xiaohua(id,name,classify,title,content,time,sh,rq,uid,zan,nozan) values (Null,"'.$name.'","'.$classify.'","'.$title.'","'.$content.'","'.$time.'","yes","1","'.$uid.'","1","1")';
$pdpd=mysql_query($sqlstr);
if($pdpd){
echo "发表成功<br/>";
$code=$namemoney+5;
$sql="update name set money='$code' where id=$uid";
$pdpd=@mysql_query($sql);
if($pdpd){
echo "已获得鬼币<br/>";
}else{
echo "没获得鬼币,请登录";
}
mysql_free_result($query);
echo "
>>>><a href=''>返回</a>";
}
}
}
close();
?>
</div>
<div class="nav">
<a href="../">首页</a>
<a href="index.php">笑话</a>
<a href="../article/">故事</a>
<a href="../bbs/">论坛</a>
</div>
</body></html>