<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-31 15:49:37
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29891560e6783bb1211-35105742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08c98e6d7366b66004a2cc64d031d9ce5c515311' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\index.tpl',
      1 => 1444721604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29891560e6783bb1211-35105742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560e6783e126e0_39331941',
  'variables' => 
  array (
    'new_list' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e6783e126e0_39331941')) {function content_560e6783e126e0_39331941($_smarty_tpl) {?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="Keywords" content="">
	<meta name="Description" content="">

	<!-- 移动设备支持 -->
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
	<meta content="no-cache" http-equiv="pragma">
	<meta content="0" http-equiv="expires">
	<meta content="telephone=no, address=no" name="format-detection">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<link href="./templates/css/reset.css" rel="stylesheet" type="text/css">
	<!--手机端重置样式-->
	<link href="./templates/css/mod47.css" rel="stylesheet" type="text/css">
	<!--微网站样式-->
	<link rel="stylesheet" type="text/css" href="../mbcms/templates/css/mobile.css">

	<?php echo '<script'; ?>
 type="text/javascript" src="./templates/javascript/jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
$(function(){
	var winheight=$(window).height();
	//$('#wrap').css('min-height',winheight-30+'px');//footer居底
	$('.blankwhite').css('height','0px');
	var winwidth=$(window).width();
	//$('.contentimgcl').css('height',winwidth*0.2+'px');
});
<?php echo '</script'; ?>
>
<style>
.box_swipe{
    overflow:hidden;
    position:relative;
}
.box_swipe ul{
    -webkit-padding-start: 0px;
}

.box_swipe>ol{
    height:20px;
    position: relative;
    z-index:10;
    margin-top:-25px;
    text-align:right;
    padding-right:15px;
}/* background-color:rgba(0,0,0,0.3); */
.box_swipe>ol>li{
    display:inline-block;
    margin:5px 0;
    width:8px;
    height:8px;
    background-color:#757575;
    border-radius: 8px;
}
.box_swipe>ol>li.on{
    background-color:#ffffff;
}
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
	<div id="wrap" class="clr">
	<div class="banner">		
		<div style="width:100%;align:center;margin:0 auto;" id="imageswzi" >
			<?php echo '<script'; ?>
 src="./templates/javascript/swipe2.js" type="text/javascript"><?php echo '</script'; ?>
>
			<div id="displayswipe" style="-webkit-transform:translate3d(0,0,0);" style="display:none;">
				<div style="visibility: visible;" id="banner_box" class="box_swipe">
					<ul style="list-style: none outside none; width: 4480px; transition-duration: 500ms; transform: translate3d(-1920px, 0px, 0px);">
						<li style="width: 640px; display: table-cell; vertical-align: top;">
							<img src="1.jpg"   id="bannerimg13203" style="width:100%;"></li>
						<li style="width: 640px; display: table-cell; vertical-align: top;">
							<img src="http://pic.dodoca.com/org/3/ce/745/42b2/c2c4fc5d976c61c1213424.jpg"   id="bannerimg13202" style="width:100%;"></li>
						<li style="width: 640px; display: table-cell; vertical-align: top;">
							<img src="http://pic.dodoca.com/org/0/3c/245/bff6/c9555a6879e03d1d16152b.jpg"   id="bannerimg16063" style="width:100%;"></li>
					</ul>
					<ol>
						<li class=""></li>
						&nbsp;
						<li class=""></li>
						&nbsp;
						<li class=""></li>
						&nbsp;
					</ol>
				</div>
			</div>

			<div id="displayone" style="display:none;">
				<img src="http://pic.dodoca.com/org/8/59/ebe/c57b/1bf60273c821ef78d72d10.jpg" alt=" "  id="onebannerimg" style="width:100%;"></div>
			<?php echo '<script'; ?>
>
$(function(){
	$("#displayswipe").show();
	$("#displayone").hide();
	
   	if(3==1){
      	$("#displayswipe").hide();
   		$("#displayone").show();
   		
    }
 	
	new Swipe(document.getElementById('banner_box'), {
		speed: 500,
		auto: 3000,
		callback: function(){
			var lis = $(this.element).next("ol").children();
			lis.removeClass("on").eq(this.index).addClass("on");
		}
	});
});
<?php echo '</script'; ?>
>

			<!-- End SlidesJS Required -->
		</div>
	</div>
	<ul class="telnav clr">
		<a href="index.php?action=lists&type=article&fenleiId=1" class="nav1">
			<li>
				<div class="icon_w">
					<div class="icon">
						<i class='contentimgcl mu-font'>模</i>
					</div>
				</div>
				<span>整站模板</span>
				<p>网站主要页面模板展示</p>
			</li>
		</a>
		<a href="http://www.lanrenmb.com" onclick="tongji(113906,0);" class="nav2">

			<li>
				<div class="icon_w">
					<div class="icon">
						<!-- 			     		<img src="http://static.dodoca.com/images/mod/mod47/icon01.png">
						--> <i class="contentimgcl mu-font">特</i>
					</div>
				</div>
				<span>网页特效</span>
				<p>网页主要部分的精美特效展示</p>
			</li>
		</a>
		<a href="http://www.lanrenym.com" onclick="tongji(113907,0);" class="nav3">

			<li>
				<div class="icon_w">
					<div class="icon">
						<!-- 			     		<img src="http://static.dodoca.com/images/mod/mod47/icon01.png">
						-->
						<i class="contentimgcl mu-font">JS</i>
					</div>
				</div>
				<span>JS特效</span>
				<p>JS实现的特效展示</p>
			</li>
		</a>
		<a href="http://www.lanrenmb.com/weiguanwang/" onclick="tongji(113908,0);" class="nav4">

			<li>
				<div class="icon_w">
					<div class="icon">
						<!-- 			     		<img src="http://static.dodoca.com/images/mod/mod47/icon01.png">
						-->
						<i class="contentimgcl mu-font">H5</i>
					</div>
				</div>
				<span>HTML5特效应用</span>
				<p>HTML5实现的特效展示</p>
			</li>
		</a>

	</ul>
	<!-- 	<div class="new_article">
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['new_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
	<li class="new_article_item">
		<a href="index.php?action=list&type=acticle&id=<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['i']->value['uid'];?>
">
			<p class="new_article_title"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</p>
		</a>
	</li>
	<?php } ?>
</div>
-->
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</body>
</html><?php }} ?>
