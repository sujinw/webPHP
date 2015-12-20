<?php /* Smarty version 2.6.26, created on 2015-12-10 21:09:18
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Article/listArticle.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Article/listArticle.html', 74, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
	<li>首页</li>
	<li>文章管理</li>
	<li class="active">文章列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
	<form class="form-inline">
		<div class="panel panel-default">
			<div class="panel-heading">文章列表</div>
			<div class="panel-body">
				<div class="pull-left">
					<div class="form-group">
						<label class="sr-only" ></label>
						<select class="form-control">
							<option>设为推荐</option>
							<option>取消推荐</option>
							<option>转回收站</option>
						</select>
					</div>
					<button type="submit" class="btn btn-info">应用</button>
				</div>

				<div class="pull-right">

					<div class="form-group">
						<label class="sr-only" ></label>
						<select class="form-control">
							<option>所有栏目</option>
							<option>网站开发</option>
							<option>互联资讯</option>
						</select>
					</div>

					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail3">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email"></div>
					<button type="submit" class="btn btn-default">筛选</button>
				</div>

			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th width="3%">
								<input class="check_all" type="checkbox"></th>
							<th width="5%">ID</th>
							<th width="25%">标题</th>
							<th width="5%">浏览</th>
							<th width="10%">栏目</th>
							<th width="10%">分类</th>
							<th width="5%">评论</th>
							<th width="10%">创建日期</th>
							<th width="5%">是否推荐</th>
							<th width="5%">是否显示</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
					<?php $_from = $this->_tpl_vars['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<tr>
							<td>
								<input class="check_all" type="checkbox" name="ids[]" value="<?php echo $this->_tpl_vars['v']['aid']; ?>
"></td>
							<td><?php echo $this->_tpl_vars['v']['aid']; ?>
</td>
							<td><?php echo $this->_tpl_vars['v']['title']; ?>
</td>
							<td><?php echo $this->_tpl_vars['v']['hits']; ?>
</td>
							<td><?php echo $this->_tpl_vars['v']['name']; ?>
</td>
							<td><?php echo $this->_tpl_vars['v']['cname']; ?>
</td>
							<td>评论</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</td>
							<td><?php if ($this->_tpl_vars['v']['recommend'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['v']['display'] == 1): ?>显示正常<?php else: ?>隐藏<?php endif; ?></td>
							<td>
								<a href="#" class="btn btn-info btn-xs">
									<span class="glyphicon glyphicon-edit"></span>
									编辑
								</a>
								<a href="#" class="btn btn-success btn-xs">
									<span class="glyphicon glyphicon-eye-open"></span>
									查看
								</a>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>

				<div class="panel-footer clearfix">
					<div class="pull-left">
						<div class="form-group">
							<label class="sr-only" ></label>
							<select class="form-control">
								<option>设为推荐</option>
								<option>取消推荐</option>
								<option>转回收站</option>
							</select>
						</div>
						<button type="submit" class="btn btn-info">应用</button>
					</div>
					<nav class="pull-right">
						<div class="admin-page"><?php echo $this->_tpl_vars['page']; ?>
</div>
					</nav>
				</div>

			</div>
		</div>
	</form>
</div>
</body>
</html>