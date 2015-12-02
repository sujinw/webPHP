<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>举报不良文章</title>
<style type="text/css">
body {
font-size: 16px;
background: #eee;
margin:3px;
}
a:link,a:visited {
text-decoration:none; color:#004299;
}
#input {
padding:3px;
line-height:23px;
border-radius:2px;
color:#336699;
border:solid 0px #f2eada;
}
.input{width:59%}
textarea {
width:60%;
height:80px;
border-radius:2px;
color:#336699;
border:0px;
}
#b{
background:#cbc547;
padding:8px;color:#fff;
border-radius:4px 4px 0px 0px;
font-size:17px
}
#c {
background:#a1a3a6;
padding:5px;color:#fff;
}
#d{
background:#c99979;
padding:5px;color:#fff;
border-radius:0px 0px 2px 2px;
}
#img{
background:#fff;
padding:5px;
color:#336699;width:61%;
height:29px;border:0px;}
#submit {
background:#abc88b;
border-radius:3px;
border:0px;width:42%;padding:5px
}
</style>
</head><body>
<?php
$id=@$_GET['id'];
require_once("../install/panduang.php");
$sqlStr="select * from article where id={$id}";
$article=mysql_fetch_assoc(mysql_query($sqlStr));
if(!$article){
header("location:../");
}
if(@!$_POST['id']){
?>
<div id="b">举报文章<b style="float:right;font-size:13px"><a href="guigushi.php?id=<?php echo "$id"; ?>">返回</a></b>
</div>
<div id="c">
<form method="post" action="">
<input type="hidden" name="id" value="<?php echo $id; ?>">
标题:<br/><input type="text" name="title" maxlength="15" placeholder="<?php echo $article['title']; ?>" id="input" class="input"/>

<br/>
原因:<br/><textarea name="text" maxlength="5000" placeholder="举报原因" id="textarea"/></textarea><br/>
<input type="text" name="code" size="7"  placeholder="验证码" id="input">
<b id="img"><?php
$rand=rand(1000,9999);
$_SESSION['randcode']=$rand;
$randcode=$_SESSION['randcode'];
echo $rand;
?>
</b>
 <a href="">看不清!</a>
<br/>
<input type="submit" name="submit" value="确定举报" id="submit">
<b id="img"><a href="../">首页</a>
</b><br/>
</form>
</div>
<?php
}else{
echo '<div id="d">';
$text=$danger->fangzhuru(@$_POST['text']);
$id=$danger->fangzhuru(@$_POST['id']);
$code=@$_POST['code'];
if($text==""){
echo "原因不能为空<script>alert('原因不能为空');</script>";
}elseif($code!=$_SESSION["randcode"]){
echo "验证码错误<script>alert('举报失败,验证码错误');</script>";
}elseif(@$_SESSION['jb']==$id){
echo "举报过了";
}else{
$sqlstr = 'insert into jb(id,name,title,content,uid,sh) values (Null,"'.$uid.'","'.$article['title'].'","'.$text.'","'.$id.'","1")';
$pdpd=mysql_query($sqlstr);
if($pdpd){
@$_SESSION['jb']=$id;
echo "举报成功<script>alert('举报成功');</script>";
}else{
echo "举报失败！<script>alert('举报失败');</script>";
}
}
}
$sql="select * from jb where uid={$id}";
$res=@mysql_query($sql);
$nums=@mysql_num_rows($res);
if($nums >=
$adminjb){
if($adminjbms==0){
$exec="delete from article where id=$id";
$result=mysql_query($exec);
if((mysql_affected_rows()==0)||(mysql_affected_rows()==-1)){
echo "未知错误！";
}else{
echo "文章已被删除！";
}
}else{
$sql="update article set sh='1' where id=$id";
$pdpd=mysql_query($sql);
if($pdpd){
echo "已经隐藏";
}else{
echo "错误QQ790431300";
}
}
$exec="delete from jb where uid=$id";
$result=mysql_query($exec);
}
mysql_free_result($res);
close();
?>
</div>
</body></html>