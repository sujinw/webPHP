<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>发表鬼故事,鬼故事在线投稿</title> 
<meta name="keywords" content="发表鬼故事,分享鬼故事给大家看,在线投稿,我要发帖,鬼故事帖子">
<meta name="description" content="发表鬼故事,发布鬼故事帖子,发表鬼故事文章,在线投稿,游客投稿鬼故事">
<style type="text/css">
body,header,h1,div,form,h5,input{
margin: 0;padding: 0;}
html{background-color:red;}
body{
font-size: 14px;font-family: 'Microsoft YaHei',Hei,arial,sans-serif;color:#fff}
header{position: relative;text-align:center;background-color:#454518;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);}
header a{position: absolute;width: 45px;height: 45px;top: 0;left: 0;float: left;}
header a:after{content: '';position: absolute;top: 50%;left: 20px;width: 10px;height: 10px;margin-top: -5px;border: #999 solid;border-width: 2px 2px 0 0;-webkit-transform: rotate(225deg);}
h1{height: 45px;
line-height: 45px;font-size: 18px;font-weight: 600;}
#main{padding: 14px 8px;}
.cont{width: 100%;font-size: 15px;border: none;box-sizing: border-box;-webkit-box-sizing: border-box;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);padding: 5px;}
textarea{line-height: 22px;}
h5{color: #333;font-size: 15px;font-weight: normal;margin: 10px 0 5px 0;}
.contact input{height: 35px;}
.btn{margin-top: 10px;text-align: center;}
#sub_but{font-weight:700;display:inline-block;padding:9px 27px;border:1px solid #C7C7C7;border-radius: 3px;font-size: 115%;width:100%;background:-webkit-gradient(linear,left top,left bottom,from(#fff),to(#ddd));}
#sub_but:active{background:-webkit-gradient(linear,left top,left bottom,from(#F2F2F2),to(#E8E8E8));}
#sub_but:disabled{
color: #ADADAD;background:-webkit-gradient(linear,left top,left bottom,from(#F1F1F1),to(#EAEAEA));
}
.vali_code input{width:32%;vertical-align:top;}
.vali_code a{margin-left:10px;vertical-align: bottom;line-height:35px;display:inline-block;}
a:link,a:visited {text-decoration:none; color:#369;}
b{margin:2px;padding:6px;}
.footer {padding:10px;background:#fff;text-align:center;clear:both;float:none; }
.footer .banben {height: 30px;}
.footer .banben a {color:#f4f4f4;display:inline-block; font-size:15px;margin-left:12px;line-height:40px;}
.footer .banben a.a{background-color:rgba(0,0,0,.2);
border-radius:2px;color:white;height:30px;line-height:30px;width: 67px; }
.footer p{color:rgba(255,255,255,.77);font-size: 12px;height:22px;line-height:22px;padding:0 12px;}
.footer p a{color:#FFFFFF;}
#top {bottom: 5%;position:fixed;right:5%;z-index:100;display:none;}
</style>
</head><body>
<div id="f-container">
<header>
<a href="javascript:history.go(-1);"></a>
<h1>鬼故事投稿</h1></header>
<?php
require("../install/panduang.php");
$title=@$danger->fangzhuru(@$_POST['title']);
$content=@$danger->fangzhuru(@$_POST['text']);
$classify=$danger->fangzhuru(@$_POST['classify']);
if(@$_POST['yulan']!=""){
@$_SESSION['title']=$title;
@$_SESSION['content']=$content;
@$_SESSION['classify']=$classify;
$content=str_replace('\r',' ',$content);
$content=str_replace('\n','',$content);
echo "<div id=\"main\"><h3>".$title."</h3>".$content."<form method=\"post\" action=\"\">";
?><input type="text" name="code" size="7"  placeholder="验证码" id="input">
<b id="img"><?php
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
echo $rand;
echo"</b><input type=\"submit\" name=\"submit\" value=\"发表\" id=\"submit\">
</form></div>";
}elseif(@!$_POST['submit']){
?>
<form method="post" action="">
<br/>
<b>选择故事分类:</b><br/><br/>
<nav style="margin:1px">
<?php
$sql="select * from lm where classify='article' and sh='yes'";
$res=mysql_query($sql);
while($lm=mysql_fetch_array($res)){
echo "<b><input type=\"radio\" value=\"".$lm['id']."\" name=\"classify\">".$lm['name']."</b>";
}
if($lm['id']==5){
echo "<br/>";
}
mysql_free_result($res);
?>
</nav>

<div id="main">
<form method="POST">
<div class="contact"><h5>鬼故事标题,投稿注意!不要发广告和其他内容,否则封掉IP</h5>
<input class="cont" type="text" name="title" id="contact" placeholder="故事标题">
</div>
<br/>
<textarea class="cont" id="content" rows="6" name="text" placeholder="故事内容！支持原创,最多9000字"></textarea>
<br/><span class="vali_code">
<input type="text" name="code" size="7"  placeholder="验证码" class="cont"><a>
<?php
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
echo $rand;
?></a></span>
<br/>
<div class="btn">
<input id="sub_but" value="提交" type="submit" name="submit"></div>
<div class="btn">
<input id="sub_but" value="预览" type="submit" name="yulan"></form>
</div>
</div><br/>
<div class="cont" style="background:#454528">提示：<br/>
请使用{br}换行<br/>
</div>
</div>
<?php
require("../moban/foot.php");
}else{
?>
<meta http-equiv="refresh" content="52; url=">
<div id="main">
<?php
$code=@$_POST['code'];
if($title=="" and $content==""){
$title=@$_SESSION['title'];
$content=@$_SESSION['content'];
$classify=@$_SESSION['classify'];
}
$ip=$_SERVER["REMOTE_ADDR"];
$time=date('Y-m-d H:i:s');
$sql="select * from article where content='$content'";
$query=mysql_query($sql);
while($article=mysql_fetch_assoc($query)){
$percent=similar_text(@$article[content],$content);
$strlen=strlen($content)/1.5;
if($percent>=$strlen){
echo "文章貌似重复";
mysql_free_result($query);
exit();
}
}
if($code!=$_SESSION["randcode"]){
echo "<script>alert('验证码错误');</script>";
echo "验证码错误<br/>";
mysql_free_result($query);
}elseif(strlenutf8($title)>15||strlenutf8($title)<1){
echo "<script>alert('标题长度错误！');</script>标题不能大于15字或小于1字";
mysql_free_result($query);
}elseif(strlenutf8($content)<20||strlenutf8($content)>9000){
echo "<script>alert('内容长度错误');</script>内容最低20字最高9000字";
mysql_free_result($query);
}elseif($classify==""){
echo "分类不可以为空";
mysql_free_result($query);
}else{
$name=$name['name'];
if($uid==""){
$uid="10000";
}
$sqlstr = 'insert into article(id,name,classify,title,content,time,sh,rq,uid,z) values (Null,"'.$name.'","'.$classify.'","'.$title.'","'.$content.'","'.$time.'","yes","1","'.$uid.'","1")';
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
</body></html>