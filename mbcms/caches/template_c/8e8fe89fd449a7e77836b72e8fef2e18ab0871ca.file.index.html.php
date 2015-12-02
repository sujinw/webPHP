<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-28 12:58:17
         compiled from "templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2506754c8a363258478-43416965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e8fe89fd449a7e77836b72e8fef2e18ab0871ca' => 
    array (
      0 => 'templates\\index.html',
      1 => 1422449891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2506754c8a363258478-43416965',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c8a3632dd191_88484325',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c8a3632dd191_88484325')) {function content_54c8a3632dd191_88484325($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
</head>

<body>
<form action="?m=add" method="post">
昵称<input name="name" value="" /><br />
标题<input name="title" value="" /><br />
内容<textarea name="con"></textarea><br />
<input type="submit" value="发表"/>
</form>
</body>
</html>
<?php }} ?>
