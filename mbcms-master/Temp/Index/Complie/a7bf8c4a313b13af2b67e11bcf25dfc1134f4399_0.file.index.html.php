<?php /* Smarty version 3.1.27, created on 2015-12-20 14:28:07
         compiled from "E:\WEBPROJECT\PHP\myPHP\Index\Tpl\View\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:2943856764a77635711_43480608%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7bf8c4a313b13af2b67e11bcf25dfc1134f4399' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Index\\Tpl\\View\\index.html',
      1 => 1450592884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2943856764a77635711_43480608',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56764a776dd6b2_42785969',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56764a776dd6b2_42785969')) {
function content_56764a776dd6b2_42785969 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2943856764a77635711_43480608';
$_smarty_tpl->smarty->_tag_stack[] = array('pagenext', array('pre'=>'上一篇','next'=>'下一篇')); $_block_repeat=true; echo pagenext(array('pre'=>'上一篇','next'=>'下一篇'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

[$pagepre][$pagenext]
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo pagenext(array('pre'=>'上一篇','next'=>'下一篇'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);

}
}
?>