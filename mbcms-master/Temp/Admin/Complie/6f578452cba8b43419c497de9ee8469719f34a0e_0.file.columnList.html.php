<?php /* Smarty version 3.1.27, created on 2015-12-15 21:31:35
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Column\columnList.html" */ ?>
<?php
/*%%SmartyHeaderCode:2048567016376e69a2_67966267%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f578452cba8b43419c497de9ee8469719f34a0e' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Column\\columnList.html',
      1 => 1449402936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2048567016376e69a2_67966267',
  'variables' => 
  array (
    'column' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56701637ac2f07_96420322',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56701637ac2f07_96420322')) {
function content_56701637ac2f07_96420322 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\WEBPROJECT\\PHP\\myPHP\\MyPHP\\Extends\\Org\\Smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '2048567016376e69a2_67966267';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li class="active">栏目列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline">
        <div class="panel panel-default">
            <div class="panel-heading">栏目列表</div>
            <div class="panel-body">
                <a href="<?php echo @constant('__APP__');?>
?c=Column&a=add" class="btn btn-info">添加栏目</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">栏目名称</th>
                            <th width="10%">栏目类型</th>
                            <th width="10%">创建时间</th>
                            <th width="10%">状态</th>
                            <th width="30%">操作</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['_name'];?>
</td>                            
                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['tname'];?>
</td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['creat_time'],'%Y-%m-%d');?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['display'] == 1) {?>显示<?php } else { ?>隐藏<?php }?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    编辑
                                </a>
                                <a href="#" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    删除
                                </a>
                            </td>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    </tbody>
                </table>
            </div>
        </form>

    </div>
</body>
</html><?php }
}
?>