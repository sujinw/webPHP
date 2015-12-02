/*更多*/
host=window.location.host;
var xmlHttp;
function createXMLHttpRequest(){
if(window.ActiveXObject){
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
}else if(window.XMLHttpRequest){
xmlHttp = new XMLHttpRequest();
}}
function start(){
createXMLHttpRequest();
var url="http://"+host+"/article/qiehuan.php";xmlHttp.open("GET",url,true);
xmlHttp.onreadystatechange = callback;
xmlHttp.send(null);
}
function callback(){
if(xmlHttp.readyState < 3){
document.getElementById('jz').style.display='block';}
if(xmlHttp.readyState == 4){
if(xmlHttp.status == 200){
document.getElementById("url").innerHTML = xmlHttp.responseText;
document.getElementById('jz').style.display='none';
}}}
/*展开关闭*/
function k(){document.getElementById('gui').style.display='block';document.getElementById('js').style.display='none';document.getElementById('j').style.display='block';setTimeout("start()","50");}function g(){document.getElementById('gui').style.display='none';document.getElementById('js').style.display='block';document.getElementById('j').style.display='none';}function tishi(){document.getElementById('tishi').style.display='block';}function quxiao(){document.getElementById('tishi').style.display='none';}
/*设置*/
var bodycolor=localStorage.bodycolor;
var fontcolor=localStorage.fontcolor;
var fontsize=localStorage.fontsize;
var margin=localStorage.margin;
var bgcolor=localStorage.bgcolor;
document.body.style.backgroundColor=bodycolor;
document.getElementById('bg').style.backgroundColor=bgcolor;
document.body.style.color=fontcolor;
document.getElementById('bg').style.fontSize=fontsize+'px';
document.getElementById('bg').style.margin=margin+'px';

//攒 js
function finger(topic_id,ip){
$.post("http://"+host+"/article/zan.php", {"id":topic_id,"ip":ip},
function(data){
if(data=="ok"){
setTimeout("tishi()","0");
setTimeout("quxiao()","4000");
var finger = parseInt($(".finger"+topic_id).html())+1;
$(".finger"+topic_id).html(finger);
}
if(data=="zan"){
alert("已赞过了");
}}, "text");
}