<?php /* Smarty version 3.1.27, created on 2015-12-20 12:35:18
         compiled from "E:\WEBPROJECT\PHP\myPHP\Index\Tpl\Index\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:521956763006523585_22586998%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f79943e2340bac735e81f3dc2d3fcbfc4440d655' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Index\\Tpl\\Index\\index.html',
      1 => 1450586115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '521956763006523585_22586998',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_567630065fe1b6_06333143',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_567630065fe1b6_06333143')) {
function content_567630065fe1b6_06333143 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '521956763006523585_22586998';
$_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('cid'=>5,'row'=>'3','image'=>1,'titlelen'=>1,'infolen'=>2,'order'=>'new')); $_block_repeat=true; echo arclist(array('cid'=>5,'row'=>'3','image'=>1,'titlelen'=>1,'infolen'=>2,'order'=>'new'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

   <li>[$field.title]</li>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo arclist(array('cid'=>5,'row'=>'3','image'=>1,'titlelen'=>1,'infolen'=>2,'order'=>'new'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!-- <?php echo config(array('c'=>'web_status'),$_smarty_tpl);?>
 -->
<?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('row'=>3,'name'=>'o')); $_block_repeat=true; echo arclist(array('row'=>3,'name'=>'o'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

[$o.title]
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo arclist(array('row'=>3,'name'=>'o'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('chanal', array('type'=>'top')); $_block_repeat=true; echo chanal(array('type'=>'top'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

[$field.name]
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo chanal(array('type'=>'top'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);

}
}
?>