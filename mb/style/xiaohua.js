host=window.location.host;
function tishi(){document.getElementById('tishi').style.display='block';}function quxiao(){document.getElementById('tishi').style.display='none';}
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
function finger(topic_id,ip,zan){
$.post("http://"+host+"/xiaohua/zan.php", {"id":topic_id,"ip":ip,"zan":zan},
function(data){
if(data=="ok"){
setTimeout("tishi()","0");
setTimeout("quxiao()","4000");
var finger = parseInt($(".finger"+topic_id).html())+1;
$(".finger"+topic_id).html(finger);
}else{
alert("已赞过了");
}}, "text");
}
//仍 js
function ren(topic_id,ip,zan){
$.post("http://"+host+"/xiaohua/zan.php", {"id":topic_id,"ip":ip,"zan":zan},
function(data){
if(data=="ok"){
setTimeout("tishi()","0");
setTimeout("quxiao()","4000");
var ren = parseInt($(".ren"+topic_id).html())+1;
$(".ren"+topic_id).html(ren);
}else{
alert("已仍过了");
}}, "text");
}
/*评论*/
function tjpl(id){
window.location.href="guigushi.php?id="+id;
}