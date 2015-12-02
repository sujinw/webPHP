<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-18 06:29:17
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\tips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1042755fa4e7906bee2-95820453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9b372ccc03e75c10cddbb27c8ab77d14c378b9e' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\tips.tpl',
      1 => 1442557667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1042755fa4e7906bee2-95820453',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55fa4e791c77e5_09414274',
  'variables' => 
  array (
    'action' => 0,
    'tips' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55fa4e791c77e5_09414274')) {function content_55fa4e791c77e5_09414274($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<meta http-equiv="Refresh" content="1000; url=index.php?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"/>
<div class="tips"><?php echo $_smarty_tpl->tpl_vars['tips']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
