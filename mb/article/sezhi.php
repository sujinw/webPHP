<?php
require("../install/panduang.php");
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>鬼故事,恐怖真实鬼故事,短篇鬼故事,鬼故事大全</title> 
<meta name="keywords" content="鬼故事,鬼故事全集,真实短篇鬼故事,恐怖鬼故事,沃の">
<meta name="description" content="鬼故事,鬼故事分类,惊悚鬼故事,鬼故事大全,恐怖小说,鬼故事小说,鬼故事网站_guigs.cn">
<style>
body{background:#eee;color:#c16879;width:100%;margin:0px;border:0px;padding:0px;font-family:,"Adobe黑体","黑体","宋体",Arial;}
a:link,a:visited {text-decoration:none; color:#369;}
/*标题*/
.top{width:100%;padding:0px;margin:0 auto; background:#1c5207 -webkit-gradient(linear,0 0,0 100%,from(#1c5206),to(#2e7414)); height:44px;line-height:44px !important; text-align:center;clear:both; overflow:hidden;}
.top .right{float:right;background-color:rgba(0,0,0,.2);line-height:44px !important;border-radius:2px;color:white;width:55px}
.top .title{ font-size:20px; color:#ffffee;font-weight:bold;  line-height:44px !important;}
.top .left{ float:left;line-height:44px !important;}
.top a{color:#fff;width:55px;height:44px;display:inline-block;}
.top img {height:15px;}
/*连接*/
nav{height:38px;}
nav a{display:block;float:left;box-sizing:border-box;height:38px;line-height:38px;text-align:center; font-size:16px;border-right:1px solid #dbe3f0;border-bottom:1px solid #dbe3f0;width:20%}
#file{position: relative;top: 0;width: 100%; box-shadow: 2px 2px 2px rgba(0,0,0,0.2); z-index: 30;margin:0}
.form,input{margin:0;padding:0;}
#input{vertical-align:middle;position:relative;left:0px;top:0;width:75%;height:33px;line-height:33px;font-size:14px;color:#008000;border:none;border-top:1px solid #dbe3f0;background:#f9f9f9}
#submit{display:inline-block;width:25%;height:33px;vertical-align:middle;overflow:hidden;clip:rect(0px,0px,22px,0px);border:solid 0px #5c97b8;background:#f4f4f4;color:#5c97b8;border:1px 0 0 1px solid #dbe3f0;}

.footer { padding: 10px; background: #fff; text-align: center; clear: both; float: none; }
.footer .banben { height: 30px; }
.footer .banben a {color:#f4f4f4;display: inline-block; font-size: 15px; margin-left: 12px; line-height: 40px; }
.footer .banben a.a { background-color:rgba(0,0,0,.2); border-radius: 2px; color: white; height: 30px; line-height: 30px; width: 67px; }
.footer p { color: rgba(255,255,255,.77); font-size: 12px; height: 22px; line-height: 22px; padding: 0 12px; }
.footer p a { color: #FFFFFF; }
#top { bottom: 5%; position: fixed; right: 5%; z-index: 100; display: none;
}
</style>
</head><body>
<script>
function fontsize(size) {
localStorage.fontsize=size;
document.getElementById('font').style.fontSize=size+'px';
}
function font(){
var fontsize=localStorage.fontsize;
document.getElementById('font').style.fontSize=fontsize+'px';
}
setTimeout("font()","0");
function bodycolor(color){
if(color!="1"){
localStorage.bodycolor=document.getElementById('bodycolor').style.background = color;
}else{
var color = new Array('aqua','black','blue','fuchsia','gray','green','lime','maroon','navy','olive','purple','red','silver','teal','white','yellow');
localStorage.bodycolor=document.getElementById('bodycolor').style.backgroundColor = color[Math.round(Math.random()*10)%6];
}}
function bodyco(){
var bodycolor=localStorage.bodycolor;
document.getElementById('bodycolor').style.backgroundColor=bodycolor;
}
setTimeout("bodyco()","0");
function fontcolor(color){
if(color!="1"){
localStorage.fontcolor=document.body.style.color = color;
}else{
var color = new Array('aqua','black','blue','fuchsia','gray','green','lime','maroon','navy','olive','purple','red','silver','teal','white','yellow');
localStorage.fontcolor=document.body.style.color = color[Math.round(Math.random()*10)%6];
}}
function fontco(){
var bodycolor=localStorage.fontcolor;
document.body.style.color=bodycolor;
var fontcolor=localStorage.fontcolor;
document.body.style.color=fontcolor;
}
setTimeout("fontco()","0");
function margin(margin){
localStorage.margin=margin;
document.getElementById('margin').style.margin=margin+'px';
}
function margincs(){
var margin=localStorage.margin;
document.getElementById('margin').style.margin=margin+'px';
}
setTimeout("margincs()","0");

function bgcolor(color){
if(color!="1"){
localStorage.bgcolor=document.getElementById('bgcolor').style.background = color;
}else{
var color = new Array('aqua','black','blue','fuchsia','gray','green','lime','maroon','navy','olive','purple','red','silver','teal','white','yellow');
localStorage.bgcolor=document.getElementById('bgcolor').style.backgroundColor = color[Math.round(Math.random()*10)%6];
}}
function bgco(){
var bgcolor=localStorage.bgcolor;
document.getElementById('bgcolor').style.backgroundColor=bgcolor;
document.getElementById('margin').style.backgroundColor=bgcolor;
}
setTimeout("bgco()","0");
</script>
<div class="top">
<span class="left"><a href="javascript:history.go(-1);"><img src="<?php echo $hosturl; ?>/image/fanhui.png" alt="鬼故事"></a></span><span class="title">鬼故事</span><span class="right"><a href="<?php echo $hosturl; ?>">首页</a></span></div>

<div id="margin" style="box-shadow:0 1px 3px #B9B9B9;display:block;box-sizing: border-box;height:auto;line-height:auto;font-size:16px;padding:8px;background:#f4f4f4"><div id="bgc">这是边距.设置好后返回刷新页面、如页面不好看联系QQ:790431300</div></div>

<nav><a id="font">字体:</a><a href="javascript:fontsize(22)">超大</a><a href="javascript:fontsize(18)">大</a><a href="javascript:fontsize(14)">中</a><a href="javascript:fontsize(12)">小</a><a id="bodycolor">背景:</a><a onclick="bodycolor('#ff0000');">红色</a><a onclick="bodycolor('#fff');">白色</a><a onclick="bodycolor('#000');">黑色</a><a onclick="bodycolor('1');">随机</a><a id="fontcolor">字色:</a><a onclick="fontcolor('#ff0000');">红色</a><a onclick="fontcolor('#fff');">白色</a><a onclick="fontcolor('#000');">黑色</a><a onclick="fontcolor('1');">随机</a><a id="bgcolor">内色:</a><a onclick="bgcolor('#ff0000');">红色</a><a onclick="bgcolor('#fff');">白色</a><a onclick="bgcolor('#000');">黑色</a><a onclick="bgcolor('1');">随机</a><a>边距:</a><a onclick="margin('0');">0px</a><a onclick="margin('5');">5px</a><a onclick="margin('12');">12px</a><a onclick="margin('15');">15px</a>
</nav>
<?php
require("../moban/foot.php");
?>
</body></html>