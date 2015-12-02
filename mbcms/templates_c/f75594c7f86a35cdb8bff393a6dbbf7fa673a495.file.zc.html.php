<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-17 02:56:58
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\zc.html" */ ?>
<?php /*%%SmartyHeaderCode:1061555fa2bfa7aa835-28849323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f75594c7f86a35cdb8bff393a6dbbf7fa673a495' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\zc.html',
      1 => 1442457136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1061555fa2bfa7aa835-28849323',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55fa2bfa9ed6f7_36725094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55fa2bfa9ed6f7_36725094')) {function content_55fa2bfa9ed6f7_36725094($_smarty_tpl) {?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<!-- ../mbcms/templates/ -->

	<title>mbcms注册页</title>
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- load 逻辑script -->

<body>
	<div class="wrap">
		<div class="zc-title">账号注册（Login）</div>
		<form id="register-form" name="register-form" action="/v3/" method="post">
			<ul class="form-con reg-ul">
				<li class="vercode">
					<input class="v_inp logint" type="text" placeholder="请输入图片验证码" id="_phoneiconcode" onfocus="inputFocus('_phoneiconcode')" onblur="checkIconCode('_phoneiconcode')"/>
					<div class="errorMessage"></div> <b class="correct"></b>
					<span class="code-box">
						<img  title="不区分大小写。看不清楚可以换一个" id="_phoneicon" src='../mbcms/main/func/funcYZMImage.php' alt="" onclick="changeIconForPhoneReg()" />
					</span>
					<a class="change-code" onclick="changeIconForPhoneReg()">换一张</a>
				</li>

				<li>
					<input id="user_name" class="logint" placeholder="请输入用户名(字母数字下划线)" name="user_name" type="text">
					<div class="errorMessage" id="user_name_error"></div> <b class="correct"></b>
				</li>
				<li>
					<input id="user_password" class="logint" autocomplete="off" placeholder="请输入密码(大于4位)" name="user_password" type="password">
					<div class="errorMessage" id='user_password_error'></div>
					<b class="correct"></b>
				</li>
				<li>
					<input id="user_pwd" class="logint" autocomplete="off" placeholder="请再输入一次密码" name="pwd"
						 type="password">
					<div class="errorMessage" id="user_pwd_error"></div>
					<b class="correct"></b>
				</li>
			</ul>
			<div class="form-btn">
				<button type="button" class="btn" name="register" onclick="submitReg();">立即注册</button>
			</div>
		</form>

		<center>
			<div style="font-size:10px">
				Copyright&copy;
				<a href="" target="_blank">mbcms</a>
				
			</center>

			<div class="login_sns">
				<p>其他方式登录</p>
				<a id="qqlogin" class="qq" href="/v3/web/login/qqLogin?redirect_uri=http://m.vivo.com.cn/auth.php?referer=http%3A%2F%2Fm.vivo.com.cn%2F%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598&client_id=5">
					<b></b>
					QQ帐号
				</a>

				<a id="sinalogin" class="weibo" href="/v3/web/login/sinaLogin?redirect_uri=http://m.vivo.com.cn/auth.php?referer=http%3A%2F%2Fm.vivo.com.cn%2F%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598&client_id=5">
					<b></b>
					新浪微博
				</a>
				<a id="renrenlogin" class="renren" href="/v3/web/login/renrenLogin?redirect_uri=http://m.vivo.com.cn/auth.php?referer=http%3A%2F%2Fm.vivo.com.cn%2F%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598&client_id=5">
					<b></b>
					人人帐号
				</a>
			</div>

		</div>
<?php echo '<script'; ?>
 type="text/javascript" src="javascript/base.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="javascript/loginReg.js"><?php echo '</script'; ?>
>

</body>
	</html><?php }} ?>
