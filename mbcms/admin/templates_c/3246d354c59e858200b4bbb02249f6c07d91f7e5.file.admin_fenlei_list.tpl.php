<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-07 04:16:10
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\admin_fenlei_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6356149757aaca05-70377747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3246d354c59e858200b4bbb02249f6c07d91f7e5' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\admin_fenlei_list.tpl',
      1 => 1444191368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6356149757aaca05-70377747',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56149757d3c4c1_87439764',
  'variables' => 
  array (
    'data' => 0,
    'i' => 0,
    'count' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56149757d3c4c1_87439764')) {function content_56149757d3c4c1_87439764($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\main\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="content" class="white">
<h1>
	<img src="templates/img/icons/posts.png" alt="" />
	分类列表
</h1>
<div class="bloc">
	<div class="title"></div>
	<div class="content">
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" class="checkall"/>
					</th>
					<th>分类ID</th>
					<th>名称</th>
					<th>分类图标</th>
					<th>创建时间</th>
					<th><img src="templates/img/th-comment.png" alt="" />Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
				<tr>
					<td>
						<input type="checkbox" />
					</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>

					</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>

					</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['i']->value['fenlei_img'];?>

					</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['i']->value['time'],"%Y-%m-%d");?>
</td>
					<td class="actions">
						<a href="#" title="Edit this content">
							<img src="templates/img/icons/actions/edit.png" alt="" />
						</a>
						<a href="#" title="Delete this content">
							<img src="templates/img/icons/actions/delete.png" alt="" />
						</a>
					</td>
				</tr>
				<?php } ?>
				
			</tbody>
		</table>
		<div class="left input">
			<select name="action" id="tableaction">
				<option value="">Action</option>
				<option value="delete">Delete</option>
			</select>
		</div>
		<div class="pagination">
			<a href="#" class="prev">«</a>
			<a id="page1" href="" class=""></a>
			<a id="page2" href="" ></a>
			...
			<a id="pageLast1" href=""></a>
			<a id="pageLast2" href=""></a>
			<a href="#" class="next">»</a>
		</div>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
// index.php?action=UserList&page=1
$(window).ready(function(){
    var count = <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
;
    var page = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

	var pageBtn = $('.pagination>a');

	if((page+1) >= (count-1)){
		page = page-1;
	}
 
    //console.log(pageBtn)
    $('#page1').attr('href','index.php?action=fenleiList&page='+ parseInt(page)).text(parseInt(page));
    $('#page2').attr('href','index.php?action=fenleiList&page='+ parseInt(page+1)).text(parseInt(page)+1);
    if(count > 4){
    	$('#pageLast1').attr('href','index.php?action=fenleiList&page='+ parseInt(count-1)).text(parseInt(count)-1);
   		$('#pageLast2').attr('href','index.php?action=fenleiList&page=' + parseInt(count)).text(parseInt(count));
    }else{
    	$('#pageLast1').remove();
    	$('#pageLast2').remove();
    }

    if (page==1) {
    	$("#page1").addClass('current')
    }else{
    	$("#page2").addClass('current')
    };

    console.log($(pageBtn[page]))
})
     


<?php echo '</script'; ?>
><?php }} ?>
