<?php /* Smarty version 2.6.26, created on 2016-03-19 18:37:45
         compiled from ../Common/inc/head.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="author" content="slade" />
<link rel="stylesheet" type="text/css" href="<?php echo @__PUBLIC__; ?>
/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo @__PUBLIC__; ?>
/css/hdjs.css" />
<!--[if lt IE 9]>
<script src="<?php echo @__PUBLIC__; ?>
/js/html5.js"></script>
<![endif]-->
 <!-- -->
<script src="<?php echo @__PUBLIC__; ?>
/js/jquery-1.8.2.min.js"></script>
<script src="<?php echo @__PUBLIC__; ?>
/js/uploadPreview.min.js"></script>
<script src="<?php echo @__JS__; ?>
/wangEditor-1.4.0.min.js"></script>
<script src="<?php echo @__JS__; ?>
/plupload.full.min.js"></script>
<script src="<?php echo @__PUBLIC__; ?>
/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo @__JS__; ?>
/hdjs.js"></script>
<script src="<?php echo @__PUBLIC__; ?>
/js/gezi.js"></script>
<script>
	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><img src="<?php echo @__PUBLIC__; ?>
/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="admin_icon">超级管理员</a></li>
  <li><a href="#" class="set_icon">账号设置</a></li>
  <li><a href="login.php" class="quit_icon">安全退出</a></li>
 </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="<?php echo @__APP__; ?>
?m=admin&c=index">起始页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>文章管理</dt>
    	<!--当前链接则添加class:active-->
    	<dd><a href="<?php echo U('Article/articleList',array('p'=>1)); ?>">文章列表</a></dd>
    	<dd><a href="<?php echo U('Article/articleCate'); ?>">文章分类</a></dd>
    	<dd><a href="<?php echo U('Article/addArticle'); ?>">添加文章</a></dd>
    	<dd><a href="<?php echo U('Article/articleReply'); ?>">文章评论管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>原创作者管理</dt>
    	<dd><a href="#">作者信息</a></dd>
    	<dd><a href="#">添加作者</a></dd>
    	<dd><a href="#">审核作者</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
	    <dd><a href="<?php echo U('User/listUser',array('p'=>1)); ?>">会员列表</a></dd>
	    <dd><a href="<?php echo U('Admin/User/addUser') ?>">添加会员</a></dd>
	    <dd><a href="<?php echo U('User/userLever',array('p'=>1)); ?>">会员等级</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>基础设置</dt>
	    <dd><a href="<?php echo U('Config/config'); ?>">站点基础设置</a></dd>
	    <dd><a href="#">SEO设置</a></dd>
	    <dd><a href="<?php echo U('Template/template'); ?>">前台模板管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>管理员权限管理</dt>
	    <dd><a href="<?php echo U('AdminUser/adminList',array('p'=>1)); ?>">管理角色列表</a></dd>
	    <dd><a href="#">配置管理权限</a></dd>
	    <dd><a href="<?php echo U('AdminUser/nodeList'); ?>">权限节点管理</a></dd>
	    <dd><a href="#">超级管理员</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 格子 版权所有</p>
  </li>
 </ul>
</aside>
<section class="rt_wrap content mCustomScrollbar">
 <nav class="gz-admin-nav"><a href="<?php  echo U('Admin/Index/index') ?>">首页</a></nav>
<div class="rt_content">