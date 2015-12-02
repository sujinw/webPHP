<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
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
require("panduang.php");
if(@$_GET['lm']!=1){
?>
<div id="b">添加栏目<b style="float:right;font-size:13px"><a href="../">首页</a></b>
</div>

<div id="c">
<form method="post" action="?lm=1">
栏目名称:<br/>
<input type="text" name="name" maxlength="15" id="input" class="input"/>
<br/>分类<br/>
<select name="classify" id="img">
<option value="article">文章</option>
<option value="link">友链</option>
<option value="bbs">论坛</option>
</select>
<br/>title标题:<br/>
<input type="text" name="title" maxlength="80" id="input" class="input"/>
<br/>SEO关键词:<br/>
<input type="text" name="key" maxlength="80" id="input" class="input"/>
<br/>SEO描述:<br/>
<input type="text" name="des" maxlength="150" id="input" class="input"/>
<br/>审核:<br/>
<select name="sh" id="img">
<option value="yes">是</option>
<option value="no">否</option>
</select>
<br/><br/>
<input type="submit" name="submit" value="确定添加" id="submit">
<b id="img"><a href="/wdadmin">后台</a>
</b><br/><br/>
</form>
</div>
<?php }else{ ?>
<div id="d">
<?php
$name=$danger->fangzhuru(@$_POST['name']);
$classify=$danger->fangzhuru(@$_POST['classify']);
$title=$danger->fangzhuru(@$_POST['title']);
$key=$danger->fangzhuru(@$_POST['key']);
$des=$danger->fangzhuru(@$_POST['des']);
$sh=$danger->fangzhuru(@$_POST['sh']);
if($name==""){
echo "不能为空<script>alert('不能为空');</script>";
}else{
$sqlstr = 'insert into lm(id,name,classify,seotitle,seokey,seodes,sh) values (Null,"'.$name.'","'.$classify.'","'.$title.'","'.$key.'","'.$des.'","'.$sh.'")';
$pdpd=mysql_query($sqlstr);
if($pdpd){
echo "恭喜！添加成功<script>alert('添加成功');</script><a href='?lm=0' style='float:right'>返回</a>";
}else{
echo "添加失败！<script>alert('添加失败');</script>";
}
}
echo "</div>";
}
close();
?>
</body></html>