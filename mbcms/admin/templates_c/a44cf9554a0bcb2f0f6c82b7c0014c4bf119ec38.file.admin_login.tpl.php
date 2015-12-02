<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-05 13:34:51
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\admin_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2831556112fc10c20b8-50863145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a44cf9554a0bcb2f0f6c82b7c0014c4bf119ec38' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\admin_login.tpl',
      1 => 1444052086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2831556112fc10c20b8-50863145',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56112fc11ca5c1_92244008',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56112fc11ca5c1_92244008')) {function content_56112fc11ca5c1_92244008($_smarty_tpl) {?><!DOCTYPE html">
<html>
<head>
<meta charset="utf-8" />
<title>mbcms后台登陆界面</title>

<link rel="stylesheet" href="templates/css/font-awesome.min.css"/>
<link rel="stylesheet" href="templates/css/loginMy.css"/>

<style>
html,body{width:100%;}
</style>

</head>
<body>

<div class="main">

	<div class="center">
		<h2 style="margin-left: 8em;">mbcms后台管理系统</h2>
		<form action="index.php?action=SubmitAdminLogin" id="formOne" method="post" onsubmit="return submitB()" >
			<i class="fa fa-user Cone">  | </i>
			<input type="text" name="admin_name" id="user" placeholder="用户名" onblur="checkUser()"/>
			<span id="user_pass"></span>
			<br/>
			<i class="fa fa-key Cone">  | </i>
			<input type="password" name="admin_password" id="pwd" placeholder="密码" onblur="checkUser1()"/>
			<span id="pwd_pass"></span>
			<br/>
			<i class="fa fa-folder-open Cone">  | </i>
			<input type="text" name="surePwd" id="surePwd" placeholder="验证码" onblur="checkUser2()"/><img src="../main/func/adminCode.php" alt="" style="" />
			<span id="surePwd_pass" ></span>
			<input type="submit" value="登录后台" id="submit" name="submit">
			<br/>
		</form>
	</div>
	
</div>

<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../templates/javascript/base.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="templates/js/loginMy.js"><?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
