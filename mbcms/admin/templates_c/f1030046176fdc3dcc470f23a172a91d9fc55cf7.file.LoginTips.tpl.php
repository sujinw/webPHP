<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-05 13:56:18
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\LoginTips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3062856127cff551580-46393532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1030046176fdc3dcc470f23a172a91d9fc55cf7' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\LoginTips.tpl',
      1 => 1444053376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3062856127cff551580-46393532',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56127cff5c0834_98619447',
  'variables' => 
  array (
    'tips' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56127cff5c0834_98619447')) {function content_56127cff5c0834_98619447($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录验证跳转中。。。</title>
</head>
<body>
	<div style='border: 1px solid #BEBEBE; height: 45px; width: 90%; border-radius: 8px;'><?php echo $_smarty_tpl->tpl_vars['tips']->value;?>
</div>
	<meta http-equiv="refresh" content="3; url=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />
</body>
</html><?php }} ?>
