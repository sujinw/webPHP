<?php /* Smarty version 2.6.26, created on 2016-03-19 18:37:48
         compiled from E:/WEBPROJECT/PHP/GZCms/application/Admin/Tpl/Article/ArticleCate.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../Common/inc/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<section>
		<div class="page_title">
			<h2 class="fl">文章分类</h2>
			<a href="<?php echo U('addCate') ?>" class="fr top_rt_btn">添加文章分类</a>
		</div>
		<table class="table">
			<tr>
				<th>id</th>
				<th>分类名称</th>
				<th>分类描述</th>
				<th>是否锁定</th>
				<th>操作</th>
			</tr>
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['v']['cid']; ?>
</td>
				<td><?php echo $this->_tpl_vars['v']['_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['v']['cremark']; ?>
</td>
				<td><?php if ($this->_tpl_vars['v']['is_lock'] == 0): ?>否<?php else: ?>是<?php endif; ?></td>
				<td>
					<a href="<?php echo @__APP__; ?>
?m=admin&c=article&a=editCate&cid=<?php echo $this->_tpl_vars['v']['cid']; ?>
" class="inner_btn">编辑</a>
					<a href="javascript:;" onclick="delCate(<?php echo $this->_tpl_vars['v']['cid']; ?>
)" class="inner_btn">删除</a>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</section>