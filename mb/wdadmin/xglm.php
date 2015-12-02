<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>排版</title>
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
$id=@$_GET['id'];
$sql="select * from lm where id='$id'";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
if(@$_GET['lm']!=1){
?>
<div id="b">修改栏目<b style="float:right;font-size:13px"><a href="index.php">首页</a></b>
</div>
<div id="c">
<form method="post" action="?lm=1">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
排序:<br/>
<input type="text" name="lmid" maxlength="15" id="input" class="input" value="<?php echo $row['id']; ?>"/>
<br/>
栏目名称:<br/>
<input type="text" name="name" maxlength="15" id="input" class="input" value="<?php echo $row['name']; ?>"/>
<br/>分类<br/>
<select name="classify" id="img">
<option value="article">文章</option>
<option value="link">友链</option>
<option value="bbs">论坛</option>
</select>
<br/>title标题:<br/>
<input type="text" name="title" maxlength="30" id="input" class="input" value="<?php echo $row['seotitle']; ?>"/>
<br/>SEO关键词:<br/>
<input type="text" name="key" maxlength="80" id="input" class="input" value="<?php echo $row['seokey']; ?>"/>
<br/>SEO描述:<br/>
<input type="text" name="des" maxlength="80" id="input" class="input" value="<?php echo $row['seodes']; ?>"/>
<br/>审核:<br/>
<select name="sh" id="img">
<option value="yes">是</option>
<option value="no">否</option>
</select>
<br/><br/>
<input type="submit" name="submit" value="确定修改" id="submit">
<b id="img"><a href="/wdadmin">后台</a>
</b><br/><br/>
</form>
</div>


<?php }else{ ?>
<div id="d">
<?php
$id=$danger->fangzhuru(@$_POST['id']);
$lmid=$danger->fangzhuru(@$_POST['lmid']);
$name=$danger->fangzhuru(@$_POST['name']);
$classify=$danger->fangzhuru(@$_POST['classify']);
$title=$danger->fangzhuru(@$_POST['title']);
$key=$danger->fangzhuru(@$_POST['key']);
$des=$danger->fangzhuru(@$_POST['des']);
$sh=$danger->fangzhuru(@$_POST['sh']);
$sql="update lm set id='$lmid',name='$name',classify='$classify',seotitle='$title',seokey='$key',seodes='$des',sh='$sh' where id='$id'";
$pdpd=mysql_query($sql);
if($pdpd){
echo "修改成功_<a href='lmgl.php'>查看</a>";
}else{
echo "修改失败";
}
}
mysql_free_result($res);
?>
</body></html>