<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-05 12:59:27
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181305636e53a467b61-84953386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67b380beb22b9c5520655755168686867f5c61f7' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\view.tpl',
      1 => 1446728362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181305636e53a467b61-84953386',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5636e53a691f63_33201885',
  'variables' => 
  array (
    'info' => 0,
    'reply' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5636e53a691f63_33201885')) {function content_5636e53a691f63_33201885($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\main\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="cromb">
	<div class="crombLink">
		<a href="">首页</a>
	</div>
	<div class="crombLink">
		<a href="">栏目</a>
	</div>
</div>
<section>
	<div class="article_view_contents">
		<div class="article_header">
			<h2 class="article_title"><?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
</h2>
			<div class="article_subtitle">
				<div class="left">
					<span>作者：<?php echo $_smarty_tpl->tpl_vars['info']->value['user_name'];?>
</span>
					<span>
						版块：
						<a href="">XXXX</a>
					</span>
				</div>
				<div class="right">
					<span>阅读：<?php echo $_smarty_tpl->tpl_vars['info']->value['link'];?>
</span>
					<span>喜欢: </span>
					<span class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['time'],"%Y-%m-%d");?>
</span>
				</div>
			</div>
		</div>
		<div class="article_content_box">
			<div class="article_content"><?php echo $_smarty_tpl->tpl_vars['info']->value['contents'];?>
</div>
			<div class="article_foot">
				<div class="article_foot_left">
					<span class="heart"></span>
				</div>
				<div class="article_foot_right">
					<span>222</span>
				</div>
			</div>
		</div>
		<div class="article_reply">
			<form action="index.php?action=reply" method="POST">
				<textarea name="reply" placeholder="输入评论内容"  class="replay_textarea"></textarea>
				<input type="hidden" name="articleId" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
">
				<input type="submit" name="submit" class="reply_sub" value="提交评论"></form>
			<div class="reply-box">
				<div class="reply-list-title">评论列表</div>
				<div class="reply-list">
					<ul>
					<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['reply']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
						<li class="reply_item">
							<div class="replay-item-left">
								<img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['user_img'];?>
" class="reply-user-img" alt="username" />
								<p class="reply-user-name"><?php echo $_smarty_tpl->tpl_vars['list']->value['user_nickname'];?>
</p>
							</div>
							<div class="reply-item-right">
								<div class="reply-cont"><?php echo $_smarty_tpl->tpl_vars['list']->value['reply'];?>
</div>
								<div class="reply_time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['time'],"%Y-%m-%d");?>
</div>
							</div>

						</li>
					<?php } ?>	
					</ul>
				</div>
			</div>

		</div>
	</div>
</section>
<?php echo $_smarty_tpl->getSubTemplate ("foot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
