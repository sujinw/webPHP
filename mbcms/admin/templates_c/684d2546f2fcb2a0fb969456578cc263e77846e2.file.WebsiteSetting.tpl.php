<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-04 03:16:48
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\WebsiteSetting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11126560fd11d776a02-00099912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '684d2546f2fcb2a0fb969456578cc263e77846e2' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\WebsiteSetting.tpl',
      1 => 1443928604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11126560fd11d776a02-00099912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560fd11d844805_91246323',
  'variables' => 
  array (
    'webresult' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560fd11d844805_91246323')) {function content_560fd11d844805_91246323($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- content -->
 <div id="content" class="white">
            <h1><img src="templates/img/icons/posts.png" alt="" /> 网站全局设置</h1>

<div class="bloc">
    <div class="content">
        <form name="websitesitting" action="index.php?action=DoAction&type=websitesitting" method="post">
        	<div class="input long">
            <label for="input1">网站标题</label>
            <input type="text" name="webtitle" id="input1" placeholder="<?php echo $_smarty_tpl->tpl_vars['webresult']->value['webtitle'];?>
" />
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过80个字符
        </div>
        <div class="input long">
            <label for="input1">网站logo</label>
            <input type="text" name="weblogo" id="input2"  placeholder="<?php echo $_smarty_tpl->tpl_vars['webresult']->value['weblogo'];?>
"/>
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过80个字符
        </div>
        <div class="input long">
            <label for="input1">SEO关键字</label>
            <input type="text" name="webseo" id="input3"  placeholder="<?php echo $_smarty_tpl->tpl_vars['webresult']->value['webseo'];?>
"/>
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过100个字符，关键词用英文逗号隔开
        </div>
        <div class="input long">
            <label for="input1">SEO描述</label>
            <input type="text" name="webdes" id="input4"  placeholder="<?php echo $_smarty_tpl->tpl_vars['webresult']->value['webdes'];?>
"/>
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过200个字符
        </div>
        <div class="input long">
            <label for="input1">版权信息</label>
            <textarea name="webcopyright" id="textarea1" rows="7" cols="4" placeholder="<?php echo $_smarty_tpl->tpl_vars['webresult']->value['webcopyright'];?>
"></textarea>
        </div>
        <div class="submit long" style="height:35px">
        	<input type="submit" value="提交保存" style="height: 100%">
        </div>
        
        </form>
    </div><?php }} ?>
