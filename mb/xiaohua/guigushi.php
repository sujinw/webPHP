<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>评论笑话</title> 
<meta name="keywords" content="幽默笑话,搞笑图片,笑话大王">
<meta name="description" content="笑话全集,幽默冷笑话大全">
<style type="text/css">
body{background:#f4f4f4;font-size: 14px;font-family: 'Microsoft YaHei',Hei,arial,sans-serif;color:#454518}
body,header,h1,div,form,h5,input{
margin:0;padding: 0;}a:link,a:visited{text-decoration:none; color:#369;}ul,li{padding:0;margin:0;list-style-type:none;}
header{position: relative;text-align:center;background-color:#454518;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);}
header a{position: absolute;width: 45px;height: 45px;top: 0;left: 0;float: left;}
header a:after{content: '';position: absolute;top: 50%;left: 20px;width: 10px;height: 10px;margin-top: -5px;border: #999 solid;border-width: 2px 2px 0 0;-webkit-transform: rotate(225deg);}
h1{height:45px;color:#999;line-height: 45px;font-size: 18px;font-weight:600;}
#main{padding:14px 17px;}
/*表单*/
form,input{margin:0;padding:0;}
form{background:#eee;padding:6px;height:32px;}.input{font-size:15px;border: none;box-sizing: border-box;-webkit-box-sizing: border-box;-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);border-radius:4px;background:#fff}#content{vertical-align:middle;position:relative;width:75%;height:100%;font-size:14px;color:#008000;border:none;}#sub{display:inline-block;width:23%;height:100%;vertical-align:middle;overflow:hidden;clip:rect(0px,0px,22px,0px);border:solid 0px #5c97b8;background:#454599;color:#f4f4f4;}
/*提示*/
#tishi {text-align:center;height:auto;position: fixed;top:50%;background-color:rgba(0,0,0,0.3);}
.finger0{display:none;}
#page{padding:6px;margin:0;color:#454513;text-align:center;background:#eee;}
#jz{padding:7px;background:#f4f5e4;margin:9px;color:#454513;border-radius: 3px;box-shadow: 0px 1px 3px #999;text-align:center;}
/*评论*/
#pl{background:#ffffff;margin:8px;word-break:break-all;box-shadow: 0px 1px 3px #999;}#p{background:#f9f9f9;}
#pl li{border-bottom:1px solid #f4f4f4;margin:0;padding:7px;}
#pl b{font-size:12px;color:#f4f4f4;border-radius:5px;background:#454519;padding:3px;}
#pl i{float:right}
#pl span{font-size:16px;color:#464634;}
#pl img{height:100px;width:100px;}
#sm{padding:9px;margin:8px;border-radius: 3px;box-shadow: 0px 1px 3px #999;}
/*导航*/
.nav a{display:block;box-sizing:border-box;height:38px;line-height:38px;text-align:center;font-size:16px;background:#424528;float:left;border-bottom:0px dashed #eee;color:#999;width:25%}
/*底部*/
.footer { padding: 10px; background: #fff; text-align: center; clear: both; float: none; }
.footer .banben { height: 30px; }
.footer .banben a {color:#f4f4f4;display: inline-block; font-size: 15px; margin-left: 12px; line-height: 40px; }
.footer .banben a.a { background-color:rgba(0,0,0,.2); border-radius: 2px; color: white; height: 30px; line-height: 30px; width: 67px; }
.footer p { color: rgba(255,255,255,.77); font-size: 12px; height: 22px; line-height: 22px; padding: 0 12px; }
.footer p a { color: #FFFFFF; }
#top { bottom: 5%; position: fixed; right: 5%; z-index: 100; display: none;}
</style>
</head><body>
<header>
<a href="javascript:history.go(-1);"></a>
<h1>冷笑话</h1></header>
<?php
require("../install/panduang.php");
$id=$danger->fangzhuru($_GET['id']);
$sql="select * from `xiaohua` where `id`={$id}";
$result=mysql_query($sql);
$article=mysql_fetch_assoc($result);
!$article?header("location:../"):"";
?>
<div id="page"><?php echo $article['title']; ?></div><div class="input" id="sm">
<?php echo $article['content']; ?></div>
<script type="text/javascript" src="<?php echo $hosturl; ?>/style/jquery.min.js"></script><script type="text/javascript" src="<?php echo $hosturl; ?>/style/jzpl.js"></script>
<script type="text/javascript">
setTimeout("finger('0','<?php echo $id; ?>')","0");
</script>
<div id="pl">
<ul>
<div id="show">
</div>
</ul>
</div>

<div id="jz" onclick="finger('0','<?php echo $id; ?>')">加载更多…</div><span class='finger0'>0</span>

<form method="get" action="plgo.php" id="form">
<input type="hidden" id="name" name="name" value="<?php echo $id; ?>"/>
<input type="text" name="content" placeholder="吐槽评论！" class="input" id="content">
<input id="sub" value="吐槽" type="button" name="sub" onclick="tishi" class="input"></form>
<div class="nav">
<a href="../">首页</a>
<a href="../xiaohua">笑话</a>
<a href="../article/">故事</a>
<a href="../bbs/">论坛</a>
</div>
<?php require("../moban/foot.php");
mysql_free_result($result);
?>
</body></html>