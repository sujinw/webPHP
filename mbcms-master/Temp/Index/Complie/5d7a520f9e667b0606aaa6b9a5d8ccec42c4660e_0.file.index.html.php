<?php /* Smarty version 3.1.27, created on 2015-12-20 14:26:55
         compiled from "E:\WEBPROJECT\PHP\myPHP\Index\Tpl\view\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:2699956764a2fb26ad4_65011473%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d7a520f9e667b0606aaa6b9a5d8ccec42c4660e' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Index\\Tpl\\view\\index.html',
      1 => 1450592813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2699956764a2fb26ad4_65011473',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56764a2fbcea77_40839430',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56764a2fbcea77_40839430')) {
function content_56764a2fbcea77_40839430 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2699956764a2fb26ad4_65011473';
$_smarty_tpl->smarty->_tag_stack[] = array('pagenext', array('pre'=>'上一篇','next'=>'下一篇')); $_block_repeat=true; echo pagenext(array('pre'=>'上一篇','next'=>'下一篇'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

[$pagepre][$pagenext]
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo pagenext(array('pre'=>'上一篇','next'=>'下一篇'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);

}
}
?>