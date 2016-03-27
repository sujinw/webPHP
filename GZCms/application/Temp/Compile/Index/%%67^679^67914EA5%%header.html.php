<?php /* Smarty version 2.6.26, created on 2016-03-19 18:24:57
         compiled from ../../../../Template/default/Common/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'arclist', '../../../../Template/default/Common/header.html', 25, false),array('block', 'chanal', '../../../../Template/default/Common/header.html', 86, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>格子原创平台-用心写自己的故事</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- loading stylesheet -->
	<link href="<?php echo @__TPUBLIC__; ?>

	/Css/normalize.css" rel="stylesheet">
	<link href="<?php echo @__TPUBLIC__; ?>
/Css/gezicms.css?ver=1" rel="stylesheet">
	<link href="<?php echo @__TPUBLIC__; ?>
/Css/font-awesome.min.css?ver=6" rel="stylesheet">
	<script src="<?php echo @__TPUBLIC__; ?>
/js/jquery.min.js"></script>
	<script src="<?php echo @__TPUBLIC__; ?>
/js/gezi.js"></script>
	<script>
		$().ready(function(){

		});
	</script>
	<style>

</style>
</head>
<body>
	<!-- <?php $this->_tag_stack[] = array('arclist', array('aid' => 1,'row' => 1)); $_block_repeat=true;arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	[$field.link]
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		-->
		<!-- 网站顶部 -->
		<header class="header">
			<div class="header-logo">
				<h3 class="logo">格子原创平台</h3>
				<span class="bat">用心写自己的故事</span>
			</div>
			<div class="header-left">
			<?php if (isset ( $_SESSION['gz_username'] )): ?>

				<div class="yp-header-message">
					<a class="bell" href="<?php echo @__APP__; ?>
?m=index&c=ucenter&a=mailbox&uid=<?php echo $_SESSION['gz_userid']; ?>
"> <i class="ico"></i> <em class="count"></em>
					</a>
				</div>
				<div class="yp-header-user-box">
					<div class="yp-header-user">
						<div class="user-main">
							<div class="avatar">
								<img width="36" height="36" src="<?php echo @__TPUBLIC__; ?>
/image/noLogin.jpg" alt=""></div>
							<span class="nickname">用户</span>
							<span class="arrow"></span>
						</div>
						<div class="user-link">
							<ul>
								<li class="l3">
									<a href="<?php echo @__APP__; ?>
?m=index&c=ucenter&a=index&uid=<?php if (isset ( $_SESSION['gz_userid'] )): ?><?php echo $_SESSION['gz_userid']; ?>
<?php else: ?>0<?php endif; ?>">
										<i></i>
										个人中心
									</a>
								</li>
								<li class="l4">
									<a href="#">
										<i></i>
										退出
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="login-box">
					<div class="login">
						<a href="index.php?m=index&c=login&a=login">登录</a>
					</div>
					<div class="register">
						<a href="index.php?m=index&c=login&a=register">注册</a>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</header>
		<!-- 导航条 -->
		<nav class="links">
			<ul>
				<li class="links-item <?php if (! isset ( $_GET['cid'] )): ?>select<?php endif; ?>">
					<a href="index.php?m=index">首页</a>
				</li>
				<?php $this->_tag_stack[] = array('chanal', array('row' => 3,'type' => 'top')); $_block_repeat=true;chanal($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
					<li class="links-item chanal" cid=[$field.cid] gcid=<?php if (isset ( $_GET['cid'] )): ?><?php echo $_GET['cid']; ?>
<?php endif; ?>>[$field.link]</li>
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo chanal($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></ul>
					<div class="nav-search">
						<div class="nav-search-input">
							<input type="text" />
						</div>
						<span class="nav-search-btn fui-search"></span>
					</div>
				</nav>
				<!-- 公告 -->
				<div class="gznotice">
					<p class="notice">
						<span class="fui-volume"></span>
						请在Chrome、FireFox等现代浏览器中浏览本站内容，另外
						<a href="#">格子原创平台</a>
						正在开发中。。
					</p>
				</div>
				<!-- 主体内容区域 -->
				<div class="container mt10">
					<section class="left-container">