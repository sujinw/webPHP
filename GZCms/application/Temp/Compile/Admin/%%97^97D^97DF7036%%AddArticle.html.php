<?php /* Smarty version 2.6.26, created on 2016-03-19 18:38:42
         compiled from E:/WEBPROJECT/PHP/GZCms/application/Admin/Tpl/Article/AddArticle.html */ ?>
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
<script src="<?php echo @__JS__; ?>
/jquery-1.10.2.min.js"></script>
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
    	<dd><a href="#">添加文章</a></dd>
    	<dd><a href="#">文章评论管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>作者管理</dt>
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
	    <dd><a href="#">站点基础设置</a></dd>
	    <dd><a href="#">SEO设置</a></dd>
	    <dd><a href="#">前台模板管理</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>管理员权限管理</dt>
	    <dd><a href="#">管理员列表</a></dd>
	    <dd><a href="#">添加管理员</a></dd>
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
	<link rel="stylesheet" type="text/css" href="<?php echo @__CSS__; ?>

	/wangEditor-1.4.0.css">
	<section>
		<h2> <strong style="color:grey;">添加文章</strong>
		</h2>
		<form id="addarticle" action="<?php echo U('addArticle') ?>" method="post" onSubmit="!articleValidate() ? return false; : return true" enctype='multipart/form-data'>
		<ul class="ulColumn2">
			<li>
				<span class="item_name" style="width:120px;">文章标题：</span>
				<input type="text" name="title" class="textbox textbox_295" placeholder="文章标题" onblur="articleValidate()" />
        		<span class="errorTips">错误提示信息...</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">文章来源：</span>
				<input type="text" name="source" class="textbox textbox_295" placeholder="文章来源"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">文章标签：</span>
				<input type="text" name="tags" class="textbox textbox_295" placeholder="文章标签请用,来分割,否则不能正常显示"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">文章分类：</span>
				<select class="select" name="cid">
					<?php $_from = $this->_tpl_vars['cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<option value="<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['_name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</li>
			<li>
				<span class="item_name" style="width:120px;">是否置顶：</span>
				<label class="single_selection">
					<input type="radio" value="1"  name="digest"/>
					是
				</label>
				<label class="single_selection">
					<input type="radio" value="0" checked name="digest"/>
					否
				</label>
			</li>
			<li>
				<span class="item_name" style="width:120px;">是否显示：</span>
				<label class="single_selection">
					<input type="radio" value="1" checked name="display"/>
					是
				</label>
				<label class="single_selection">
					<input type="radio" value="0" name="display"/>
					否
				</label>
			</li>
			<li>
				<span class="item_name" style="width:120px;">摘要：</span>
				<textarea placeholder="摘要信息" name="excerpt" class="textarea" style="width:500px;height:100px;"></textarea>
			</li>
			<li>
				<span class="item_name" style="width:120px;">缩略图：</span>
				<label class="uploadImg">
					<input type="file" id="thumb" name="thumb" />
					<span>上传图片</span>
					<div id="imgdiv"><img id="imgShow" width="100" height="100" /></div>
				</label>
			</li>
			<li>
				<span class="item_name" style="width:120px;">文章内容：</span>
				<textarea id="article" name="details" placeholder="文章内容" class="textarea" style="height:300px; display:none">
					<p>请输入文章内容</p>
				</textarea>
			</li>
			<li>
				<span class="item_name" style="width:120px;"></span>
				<input type="submit" class="link_btn"/>
			</li>
		</ul>
	</section>
	<div id="uploadContainer">
        <input type="button" value="选择文件" id="btnBrowse" style="background-color:red;"/>
	    <input type="button" value="上传文件" id="btnUpload">
	    <ul id="fileList"></ul>
    </div>
	<script type="text/javascript">
	    $(function () {

	        //获取dom节点
	        var $uploadContainer = $('#uploadContainer'),
                $fileList = $('#fileList'),
				$btnUpload = $('#btnUpload');

	        var editor = $('#article').wangEditor({
	            'uploadImgComponent': $uploadContainer
	        });

	        //实例化一个上传对象
	        var uploader = new plupload.Uploader({
	            browse_button: 'btnBrowse',
	            url: 'index.php?m=admin&c=article&a=ajaxArticlePic',
	            filters: {
	                mime_types: [
                      //只允许上传图片文件
                      { title: "图片文件", extensions: "jpg,gif,png,bmp" }
	                ]
	            }
	        });

	        //存储多个图片的url地址
	        var urls = [];

            //存储触犯上传事件的事件对象
	        var event;

	        //初始化
	        uploader.init();

	        //绑定文件添加到队列的事件
	        uploader.bind('FilesAdded', function (uploader, files) {
	            $.each(files, function (key, value) {
	                var fileName = value.name,
						html = '<li id="file-' + value.id + '">' +
								'	<p class="file-name">' + fileName + '</p>' +
								'	<p class="progress"></p>' +
								'</li>';

	                $fileList.append(html);
	            });
	        });

	        //绑定上传进度
	        uploader.bind('UploadProgress', function (uploader, file) {
	            $fileList.find('.progress').text(file.percent + '%');
	        });

	        //单个文件上传之后
	        uploader.bind('FileUploaded', function (uploader, file, responseObject) {
	            //从服务器返回图片url地址
	            var url = responseObject.response;
	            //先将url地址存储来，待所有图片都上传完了，再
	            urls.push(url);
	        });

	        //全部文件上传时候
	        uploader.bind('UploadComplete', function (uploader, files) {
                
	            $.each(urls, function (key, value) {
	                //把每一个图片的url，都插入到编辑器中
	                editor.command(event, 'insertHTML', '<img src="' + value + '"/>');
	            });

	            //清空url数组
	            urls = [];

                //清空显示列表
	            $fileList.html('');
	        });

	        //上传事件
	        $btnUpload.click(function (e) {
	            event = e;
	            uploader.start();
	        });

	        new uploadPreview({ UpBtn: "thumb", DivShow: "imgdiv", ImgShow: "imgShow" });

	    });
</script>