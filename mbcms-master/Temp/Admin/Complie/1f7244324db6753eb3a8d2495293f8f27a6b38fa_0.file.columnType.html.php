<?php /* Smarty version 3.1.27, created on 2015-12-15 21:31:39
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Column\columnType.html" */ ?>
<?php
/*%%SmartyHeaderCode:239935670163b4b1ee7_04373461%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f7244324db6753eb3a8d2495293f8f27a6b38fa' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Column\\columnType.html',
      1 => 1449402996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239935670163b4b1ee7_04373461',
  'variables' => 
  array (
    'type' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5670163b68e852_60184279',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5670163b68e852_60184279')) {
function content_5670163b68e852_60184279 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '239935670163b4b1ee7_04373461';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>栏目管理</li>
    <li class="active">栏目类型</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline">
        <div class="panel panel-default">
            <div class="panel-heading">栏目类型</div>
                <div class="panel-body">
                    <a class="btn btn-info" href="<?php echo @constant('__APP__');?>
?c=Column&a=addColumnType">添加分类</a>
                </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="30%">分类名称</th>
                        <th width="10%">状态</th>
                        <th width="30%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['type']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['tid'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['tname'];?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['v']->value['display'] == 1) {?>显示<?php } else { ?>隐藏<?php }?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                        </td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
</body>
</html><?php }
}
?>