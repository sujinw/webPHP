<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-07 11:05:23
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\admin_article_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62505614b901530b33-79178292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d9efa4437d43714d55864368340556d8bdc3de1' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\admin_article_add.tpl',
      1 => 1444214656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62505614b901530b33-79178292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5614b901710e98_39971351',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5614b901710e98_39971351')) {function content_5614b901710e98_39971351($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="content">
	<h1>
		<img src="templates/img/icons/posts.png" alt="" />
		添加文章
	</h1>
	<div class="bloc">
		<div class="title">添加文章</div>
		<div class="content">
			<form action="index.php?action=DoAction&type=addArticle" id="formOne" method="post" enctype="multipart/form-data">
				<div class="input medium">
					<label for="input1">标题</label>
					<input type="text" name="title" id="input1"/>
				</div>
				<div class="input">
					<label for="input4">选择发布分类</label>
					<select name="fenlei_id">
						<option value="1">ss</option>
						<option value="2">ww</option>
						<option value="3">tt</option>
					</select>
					<div class="input">
						<label for="input3">封面图片</label>
						<input type="file" name="fm_img" id="input3"/>
					</div>
					<div class="input textarea">
						<label for="textarea2">文章内容</label>
						<textarea name="contents" id="textarea2" rows="7" class="wysiwyg" cols="4"></textarea>
					</div>
					<div class="submit long" style="height:35px;">
        				<input type="submit" value="提交保存" style="height: 100%">
        			</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
