<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>论坛交流发帖 鬼故事,灵异事件-真实经历</title> 
<meta name="keywords" content="发布灵异鬼故事,真实鬼经历,鬼故事,记录灵异瞬间">
<meta name="description" content="沃の鬼故事,恐怖鬼故事_鬼故事,真实鬼故事,短篇鬼故事- |灵异图片">
<style type="text/css">
body{
background:#eee;
font-size: 14px;font-family: 'Microsoft YaHei',Hei,arial,sans-serif;color:#454518}
body,header,h1,div,form,h5,input{
margin:0;padding: 0;}
a:link,a:visited {text-decoration:none; color:#369;}
header{position: relative;text-align:center;background-color:#454518;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);}
header a{position: absolute;width: 45px;height: 45px;top: 0;left: 0;float: left;}
header a:after{content: '';position: absolute;top: 50%;left: 20px;width: 10px;height: 10px;margin-top: -5px;border: #999 solid;border-width: 2px 2px 0 0;-webkit-transform: rotate(225deg);}
h1{height:45px;color:#999;line-height: 45px;font-size: 18px;font-weight:600;}
#main{padding:14px 17px;}
.cont{width:100%;font-size:15px;border: none;box-sizing: border-box;-webkit-box-sizing: border-box;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);padding: 5px;border-radius:4px;background:#fff}
textarea{line-height: 22px;}
h5{color: #333;font-size: 15px;font-weight: normal;margin: 10px 0 5px 0;}
.contact input{height:35px;}
select{height:30px}
.btn{margin-top: 10px;text-align: center;}
#sub_but{font-weight:700;display:inline-block;padding:9px 27px;border:1px solid #C7C7C7;border-radius: 3px;font-size: 115%;width:100%;background:-webkit-gradient(linear,left top,left bottom,from(#34aa0d),to(#37aa0d));}
#tishi {text-align:center;height:auto;position: fixed;top:50%;background-color:rgba(0,0,0,0.3);}
nav{padding:16px;}
.nav {height:38px;}
.nav a{display:block;box-sizing:border-box;height:38px;line-height:38px;text-align:center;font-size:16px;background:#424528;float:left;border-bottom:0px dashed #eee;color:#999;width:25%}
center{background:#4a3667;padding:9px;color:#999;font-size:15px;border:0;border-radius:1px;}
</style>
</head><body>
<header>
<a href="javascript:history.go(-1);"></a>
<h1>谈谈灵异事</h1></header>
<?php
require("../install/panduang.php");
$帐号=$name['name'];
$uid=$name['id'];
/*论坛发帖*/
function tjbbs($name,$classify,$title,$content,$time,$sh,$rq,$uid,$url,$text){
$标长=strlen("$title");
$内长=strlen("$content");
if($标长>55 or $标长<1){
echo "<br/>标题错误,标题不能大于25：小于1<br/>";
}elseif($内长>"9000" or $内长<"60"){
echo "<br/>内容错误,内容不能大于20:内容不能大于9000<br/>";
}else{
$sqlstr = 'insert into bbs(id,name,classify,title,content,time,sh,rq,uid,url,filetext) values (Null,"'.$name.'","'.$classify.'","'.mysql_real_escape_string($title).'","'.mysql_real_escape_string($content).'","'.$time.'","'.$sh.'","'.$rq.'","'.$uid.'","'.$url.'","'.$text.'")';
$query=mysql_query($sqlstr);
echo @$query=="ture"?"<br/>发表帖子成功":"<br/>发表帖子失败";
}
}
function filename($file_name){ 
$extend =explode("." , $file_name); 
return end($extend); 
}
$type=array("jpg","png","jpeg","gif");
$time=date('Y-m-d H:i:s');
$id=@$_GET['id'];
$img=@$_GET['img'];
if(!isset($_POST["submit"])){
if(($img=="img") and ($id=="" or is_numeric($id)!="false" or $id>="13" or $id<"0")){
echo "<div class=\"nav\" style=\"height:114px\">";
for($i=1;$i<=12;$i++){
echo "<a href=\"?id=$i\">{$i}张</a>";
}
echo '</div><p>上传说明：<br/>最少0个--最多12个文件,每个不能大于2m、您只能上传以下类型文件: jpg,png,jpeg,gif<br/>如果上传其他类型不储存、</p>';
}else{
echo '<nav><form method="post" action="" enctype="multipart/form-data">
分类:<br/><div class="code"><select name="classify" class="cont" id="contact"></div>';
$sql="select * from lm where classify='bbs' and sh='yes'";
$res=mysql_query($sql);
while($lm=mysql_fetch_array($res)){
echo "<option value=".$lm['id'].">".$lm['name']."</option>";
}
mysql_free_result($res);
echo '
</select>
<br/><br/>
标题:<div class="contact">
<input class="cont" type="text" name="title" id="contact">
</div><br/>内容<br/><textarea name="content" clos="20" rows="5" class="cont" id="content"></textarea><br/>';
if($img != "img" and $id
!= ""){
for($i=1;$i<=$id;$i++){
echo "<input class=\"cont\" type='file' name='file{$i}'><br/><br/>";
}}else{
echo '<br/><a href="?img=img">添加图片</a><br/>';
}
echo '<input id="sub_but" value="提交  发布" type="submit" name="submit" onclick="tishi"></div>
</form>';
}
}else{
echo "<nav>";
if($帐号=="8"){
echo "游客不能发帖、哈哈/<a href='../zc/login.php'>登录</a>";
}else{
if($img != "img" and $id
!= ""){
$url=array();
for($i=1;$i<=$id;$i++){
$name=strtolower($_FILES["file{$i}"]["name"]);
$size=round($_FILES["file{$i}"]["size"]/1024);
$tmp_name=$_FILES["file{$i}"]["tmp_name"];
$error=$_FILES["file{$i}"]["error"];
$filename=md5($i.$time);
$name=".".filename($name);
$fileurl="bbsimg/{$filename}{$name}";
if($error> 0){
switch($error){
case 1:
echo "上传失败<br/>";
break;
case 2:
echo "上传失败<br/>";
break;
case 3:
echo "上传失败<br/>";
break;
case 4:
echo "{$i}上传失败,没选择文件<br/>";
break;
case 5:
echo "上传失败<br/>";
break;
case 6:
echo "文件写入到临时文件夹出错！<br/>";
break;
}
}elseif(!in_array(filename($name),$type)){
$text=implode(",",$type);
echo "<div ='text'>{$i}上传失败,类型错了</div>";
}elseif($size>2000){
echo "<div ='text'>上传文件不能大于2m<br/>您上传的文件有{$size}KB</div>";
}else{
if(file_exists("$fileurl")){
echo "文件已存在";
}else{
$url[]=@$fileurl;
if(move_uploaded_file($tmp_name,"$fileurl")){
echo ("{$i}上传成功<br/>");
}else{
echo "<br>上传失败";
} 
} } }
$url=@implode("|",$url);
$text=@implode("|",$_POST['text']);
}
if(@$url==""){$url='';$text='';}
$classify=$danger->fangzhuru($_POST['classify']);
$标题=$danger->fangzhuru($_POST['title']);$内容=$danger->fangzhuru($_POST['content']);
$sql="select * from bbs where content='$内容'";
$query=mysql_query($sql);
$articletext=mysql_num_rows($query);
mysql_free_result($query);
if($articletext > 0){
echo "发布帖子失败,文章已存在";
}else{
tjbbs("$帐号","$classify","$标题","$内容","$time","yes","0","$uid","$url","$text");
}
}
}
?><br/>
不要发布色情，广告违反国家法律等内容
</nav>
<div class="nav">
<a href="../">首页</a>
<a href="../xiaohua">笑话</a>
<a href="../article/">故事</a>
<a href="../bbs/">论坛</a>
</div><center>沃の版权所有-guigs.cn</center>
</body></html>