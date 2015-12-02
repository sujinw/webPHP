<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-09 06:20:51
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\succ.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31143560fbcd27f41b2-67663088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cadb2b9428b7c7183b7a2292e45e1ddc89b9b621' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\succ.tpl',
      1 => 1444365897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31143560fbcd27f41b2-67663088',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560fbcd286ed66_16616567',
  'variables' => 
  array (
    'succ' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560fbcd286ed66_16616567')) {function content_560fbcd286ed66_16616567($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="" id="content" class="white">
	<div class="notif success bloc">
		<div class="content">
			<div class="tips"><?php echo $_smarty_tpl->tpl_vars['succ']->value;?>
</div>
			<meta http-equiv="refresh" content="30000; url=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />			
		</div>
	</div>
</div><?php }} ?>
