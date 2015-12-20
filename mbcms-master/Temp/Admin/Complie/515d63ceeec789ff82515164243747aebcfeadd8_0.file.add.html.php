<?php /* Smarty version 3.1.27, created on 2015-12-15 21:31:40
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Column\add.html" */ ?>
<?php
/*%%SmartyHeaderCode:37815670163c8a1db3_35051899%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '515d63ceeec789ff82515164243747aebcfeadd8' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Column\\add.html',
      1 => 1449402965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37815670163c8a1db3_35051899',
  'variables' => 
  array (
    'column' => 0,
    'v' => 0,
    'type' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5670163ca34391_83584880',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5670163ca34391_83584880')) {
function content_5670163ca34391_83584880 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '37815670163c8a1db3_35051899';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
	<li>首页</li>
	<li>文章管理</li>
	<li class="active">添加栏目</li>
</ol>
<!--路径导航-->
<div class="page-content">
	<div class="panel panel-default">
		<div class="panel-heading">添加栏目</div>
		<div class="panel-body">
			<form>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-9">
							<?php if ($_smarty_tpl->tpl_vars['column']->value == 0) {?>没有栏目哦，请先添加！<?php } else { ?>
							<div class="form-group clearfix">
								<label>上级栏目</label>
								<select class="form-control pull-left" name="parent_id">
									<?php
$_from = $_smarty_tpl->tpl_vars['column']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['_name'];?>
</option>
									<?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
								</select>
							</div>
							<?php }?>
							<div class="form-group">
								<label for="col_name">栏目名称</label>
								<input type="text" class="form-control" id="col_name" name="col_name" placeholder=""></div>
							<div class="form-group">
								<label for="seo_title">SEO标题</label>
								<input type="text" class="form-control" id="seo_title" name="seo_title" placeholder=""></div>

							<div class="form-group">
								<label for="seo_keyword">SEO关键词</label>
								<input type="text" class="form-control" id="seo_keyword" name="seo_keyword" placeholder=""></div>
							<div class="form-group">
								<label>SEO描述</label>
								<textarea class="form-control" rows="3" name="seo_descript"></textarea>
							</div>

							<div class="form-group">
								<label>栏目详情</label>
								<textarea class="form-control" rows="5" name="col_descript"></textarea>
							</div>

						</div>
						<div class="col-md-3">

							<div class="form-group">
								<label for="col_link">栏目链接</label>
								<input type="text" class="form-control" id="col_link" name="url"></div>
							<div class="form-group">
								<label >栏目类型</label>
								<?php
$_from = $_smarty_tpl->tpl_vars['type']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['t']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
$foreach_t_Sav = $_smarty_tpl->tpl_vars['t'];
?>
								<div class="radio">
									<label>
										<input type="radio" name="col_type" value="<?php echo $_smarty_tpl->tpl_vars['t']->value['tid'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['tname'];?>
</label>
								</div>
								<?php
$_smarty_tpl->tpl_vars['t'] = $foreach_t_Sav;
}
?>
							</div>
							<div class="form-group">
								<label >栏目状态</label>
								<div class="radio">
									<label>
										<input type="radio" name="hidden" id="hidden1" value="0" checked>显示</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="hidden" id="hidden2" value="1">隐藏</label>
								</div>
							</div>
						</div>

					</div>

					<button type="submit" class="btn btn-primary">Submit</button>

				</div>

			</form>
		</div>

	</div>

</div>

</body>
</html><?php }
}
?>