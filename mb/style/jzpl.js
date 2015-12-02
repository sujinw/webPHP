$(function(){
$("#sub").click(function(){
$.post("plgo.php",{name : $("#name").val(), content : $("#content").val()}, function(data){document.getElementById("sub").value="回复中…";
if(data.content==""){
alert("不能为空");
}else if(data.content=="重复"){
alert("不能重复回复");
}else{
if(data.status){
var str = "<li><b>"+data.nameuser+"</b><i style='float:right'>"+data.time+"</i><br/><br/><span>"+data.content+"</span></li>";
$("#show").prepend(str); //在前面追加
document.getElementById("sub").value="回复";
document.getElementById("content").value="";
}else{
alert("评论失败");
}
}
}, 'json');
});				 
});
/*评论分页*/
function finger(page,id){
var finger = parseInt($(".finger"+page).html())+1;$(".finger"+page).html(finger);
$.post("plpage.php", {"page":finger,"id":id},
function(data){
document.getElementById("jz").innerHTML="<img src='../image/jz.gif'>  加载中 稍等…";if(data!="ok"){
$("#show").append(data); //追加
document.getElementById("jz").innerHTML="加载更多评论";
}else{
document.getElementById("jz").innerHTML="全部加载完毕";
}
}, "text");
}
