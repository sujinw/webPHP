<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"><title>反馈_留言</title><style type="text/css">
body,header,h1,div,form,h5,input{
		margin: 0;
		padding: 0;
	}
	html{
		height: 100%;
		background-color: #EEE;
	}
	body{
		font-size: 14px;
		font-family: 'Microsoft YaHei',Hei,arial,sans-serif;
		height: 100%;
	}
	#f-container{
		height: 100%;
	}
	header{
		position: relative;
		text-align: center;
		border-bottom: 1px solid #DFDFDF;
		background-color: #F6F6F6;
        background:-webkit-linear-gradient(top, #ffffff, #f4f4f4);
        background:linear-gradient(top, #ffffff, #f4f4f4);
		-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);
		box-shadow: 0 1px 1px 0px rgba(50,50,50,.2);
	}
	header a{
		position: absolute;
		width: 45px;
		height: 45px;
		top: 0;
		left: 0;
		float: left;
	}
	header a:after{
		content: '';
		position: absolute;
		top: 50%;
		left: 20px;
		width: 10px;
		height: 10px;
		margin-top: -5px;
		border: #999 solid;
		border-width: 2px 2px 0 0;
		-webkit-transform: rotate(225deg);
	}
	h1{
		height: 45px;
		line-height: 45px;
		font-size: 18px;
		font-weight: 600;
	}
	#main{
		padding: 14px 8px;
	}
	.cont{
		width: 100%;
		font-size: 15px;
		border: none;
		box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-webkit-box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);
		box-shadow: 0 1px 1px 0px rgba(50,50,50,.1);
		padding: 5px;
		
	}
	textarea{
		line-height: 22px;
	}
	h5{
		color: #333;
		font-size: 15px;
		font-weight: normal;
		margin: 10px 0 5px 0;
	}

	.contact input{
		height: 35px;
	}
	.btn{
		margin-top: 10px;
		text-align: center;
	}
	#sub_but{
		font-weight: 700;
		display: inline-block;
		padding: 9px 27px;
		border: 1px solid #C7C7C7;
		border-radius: 3px;
		font-size: 115%;width:100%;
		background:-webkit-gradient(linear,left top,left bottom,from(#E3E3E3),to(#ECECEC));
	}
	#sub_but:active{
		background:-webkit-gradient(linear,left top,left bottom,from(#F2F2F2),to(#E8E8E8));
	}
	#sub_but:disabled{
		color: #ADADAD;
		background:-webkit-gradient(linear,left top,left bottom,from(#F1F1F1),to(#EAEAEA));
	}
	.vali_code input{
		width: 30%;
		vertical-align: top;
	}
    </style><link></head><body>
<div id="f-container">
<header>
<a id="gobak" href="../"></a>
<h1>鬼故事意见反馈</h1></header>
<?php
require("../install/panduang.php");
if(@!$_POST['submit']){
?>
<div id="main">
<div id="feed_tips" class="tips"></div>
<form method="POST">
<textarea class="cont" id="content" rows="6" name="text" placeholder="输入您的问题或建议，我们会为您改进！"></textarea>
<div class="contact"><h5>您的联系方式，便于我们给您回复（可选）</h5><input class="cont" type="text" name="title" id="contact" placeholder="QQ/邮箱/电话任选其一">
</div>
<div class="btn">
<input id="sub_but" value="提交" type="submit" name="submit"></div></div></div>
</body></html>
<?php
exit();
}else{
?>
<div id="main">
<div id="feed_tips" class="tips"></div>
<?php
$name=$danger->fangzhuru(@$_POST['title']);
$content=$danger->fangzhuru($_POST['text']);
$ip=$_SERVER["REMOTE_ADDR"];
$time=date('Y-m-d H:i:s');
if(strlenutf8($content)<15||strlenutf8($content)>500){
echo "内容不能小于15或者大于500";
}else{
$sqlstr = 'insert into ly(id,name,ip,time,content,sh) values (Null,"'.$name.'","'.$ip.'","'.$time.'","'.$content.'","1")';
$pdpd=mysql_query($sqlstr);
if($pdpd){
echo "提交成功、感谢您^ω^";
}
}
}
close();
?>
<br/>
>>>><a href="">返回</a>
</div>
</body></html>