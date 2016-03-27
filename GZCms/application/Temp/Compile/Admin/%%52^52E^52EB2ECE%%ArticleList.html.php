<?php /* Smarty version 2.6.26, created on 2016-03-19 18:39:37
         compiled from E:/WEBPROJECT/PHP/GZCms/application/Admin/Tpl/Article/ArticleList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'E:/WEBPROJECT/PHP/GZCms/application/Admin/Tpl/Article/ArticleList.html', 28, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../Common/inc/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<section>
		<div class="page_title">
			<h2 class="fl">文章列表</h2>
			<a href="<?php echo U('Article/addArticle'); ?>" class="fr top_rt_btn">添加文章</a>
		</div>
		<table class="table">
			<tr>
				<th style="width:5%">id</th>
				<th style="width:10%">缩略图</th>
				<th style="width:30%">标题</th>
				<th style="width:10%">作者</th>
				<th style="width:10%">所属分类</th>
				<th style="width:5%">是否推荐</th>
				<th style="width:5%">点击次数</th>
				<th style="width:10%">发表时间</th>
				<th style="width:15%">操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['v']['aid']; ?>
</td>
				<td><img style="height:80px;width:80px" src="<?php echo $this->_tpl_vars['v']['thumb']; ?>
" /></td>
				<td><?php echo $this->_tpl_vars['v']['title']; ?>
</td>
				<td><?php echo $this->_tpl_vars['v']['author']; ?>
</td>
				<td><?php echo $this->_tpl_vars['v']['cname']; ?>
</td>
				<td><?php if ($this->_tpl_vars['v']['recommend'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
				<td><?php echo $this->_tpl_vars['v']['hits']; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</td>
				<td>
					<a href="<?php echo @__APP__; ?>
?m=admin&c=article&a=edit&aid=<?php echo $this->_tpl_vars['v']['aid']; ?>
" class="inner_btn">编辑</a>
					<a href="javascript:;" onClick="del(<?php echo $this->_tpl_vars['v']['aid']; ?>
)" class="inner_btn">删除</a>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>		
		</table>
		<aside class="paging">
			<?php echo $this->_tpl_vars['page']; ?>

		</aside>
	</section>