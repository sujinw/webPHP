<?php /* Smarty version 3.1.27, created on 2015-12-16 13:45:04
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Forum\addForum.html" */ ?>
<?php
/*%%SmartyHeaderCode:171995670fa60e72f95_56069724%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fd17e7922fe8363ea95e2a2a0a7f404e940b86e' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Forum\\addForum.html',
      1 => 1450244694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171995670fa60e72f95_56069724',
  'variables' => 
  array (
    'count' => 0,
    'forum' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5670fa610616d7_80057146',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5670fa610616d7_80057146')) {
function content_5670fa610616d7_80057146 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '171995670fa60e72f95_56069724';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
	<li>首页</li>
	<li>论坛管理</li>
	<li class="active">添加版块</li>
</ol>
<!--路径导航-->

<div class="page-content">
	<div class="panel panel-default">
		<div class="panel-heading">添加版块</div>
		<div class="panel-body">
			<form action="" enctype="multipart/form-data" method="post">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-9">
							<?php if ($_smarty_tpl->tpl_vars['count']->value == 0) {
} else { ?>
							<div class="form-group clearfix">
								<label>上级版块</label>
								<select class="form-control pull-left" name="father_fid">
									<option value="0">顶级版块</option>
									<?php
$_from = $_smarty_tpl->tpl_vars['forum']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['fid'];?>
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
								<label for="cate_name">版块名称</label>
								<input type="text" class="form-control" id="cate_name" name="fname" placeholder=""></div>
							<div class="form-group">
								<label for="fcolor">标题颜色<a class="btn btn-info" id="open-ke-color">打开取色器</a></label>
								<input type="text" class="form-control" id="title-color" name="fcolor" placeholder="">
								</div>

							<div class="form-group">
								<label>版块描述</label>
								<textarea class="form-control" rows="3" name="instruc"></textarea>
							</div>

						</div>
						<div class="col-md-3">

							<div class="form-group">
								<label >版块状态</label>
								<div class="radio">
									<label>
										<input type="radio" name="display" id="hidden1" value="1" checked>显示</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="display" id="hidden2" value="0">隐藏</label>
								</div>
							</div>
							<div id="kecolor" style="display: none; position: absolute; left: 10px; top: 106px; z-index: 19811214;" class="ke-colorpicker" unselectable="on">
								<table class="ke-colorpicker-table" cellpadding="0" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td colspan="6" class="ke-colorpicker-cell-top" title="" unselectable="on">无颜色</td>
										</tr>
										<tr>
											<td class="ke-colorpicker-cell" title="#E53333" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(229, 51, 51);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#E56600" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(229, 102, 0);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#FF9900" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(255, 153, 0);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#64451D" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(100, 69, 29);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#DFC5A4" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(223, 197, 164);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#FFE500" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(255, 229, 0);"></div>
											</td>
										</tr>
										<tr>
											<td class="ke-colorpicker-cell" title="#009900" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(0, 153, 0);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#006600" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(0, 102, 0);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#99BB00" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(153, 187, 0);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#B8D100" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(184, 209, 0);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#60D978" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(96, 217, 120);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#00D5FF" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(0, 213, 255);"></div>
											</td>
										</tr>
										<tr>
											<td class="ke-colorpicker-cell" title="#337FE5" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(51, 127, 229);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#003399" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(0, 51, 153);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#4C33E5" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(76, 51, 229);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#9933E5" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(153, 51, 229);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#CC33E5" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(204, 51, 229);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#EE33EE" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(238, 51, 238);"></div>
											</td>
										</tr>
										<tr>
											<td class="ke-colorpicker-cell" title="#FFFFFF" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(255, 255, 255);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#CCCCCC" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(204, 204, 204);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#999999" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(153, 153, 153);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#666666" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(102, 102, 102);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#333333" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(51, 51, 51);"></div>
											</td>
											<td class="ke-colorpicker-cell" title="#000000" unselectable="on">
												<div class="ke-colorpicker-cell-color" unselectable="on" style="background-color: rgb(0, 0, 0);"></div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>

					<button type="submit" class="btn btn-primary">提交保存</button>

				</div>

			</form>
		</div>

	</div>

</div>
<?php echo '<script'; ?>
 type="text/javascript">
(function(){
	$('#open-ke-color').click(function(){
		if($('#kecolor').css('display') == 'none'){
			$('#kecolor').show();
		}else{
			$('#kecolor').hide();
		}
	});
	$('#kecolor td').click(function(){
		$('#title-color').val($(this).attr('title'));
		$('#kecolor').hide();
	})
})()
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
?>