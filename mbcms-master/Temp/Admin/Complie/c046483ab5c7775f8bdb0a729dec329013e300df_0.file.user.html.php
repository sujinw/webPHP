<?php /* Smarty version 3.1.27, created on 2015-12-14 17:15:59
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Rbac\user.html" */ ?>
<?php
/*%%SmartyHeaderCode:630566e88cf26ff20_35187417%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c046483ab5c7775f8bdb0a729dec329013e300df' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Rbac\\user.html',
      1 => 1450084556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '630566e88cf26ff20_35187417',
  'variables' => 
  array (
    'user' => 0,
    'r' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566e88cf3b42e5_45362292',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566e88cf3b42e5_45362292')) {
function content_566e88cf3b42e5_45362292 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\WEBPROJECT\\PHP\\myPHP\\MyPHP\\Extends\\Org\\Smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '630566e88cf26ff20_35187417';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>RBAC权限控制管理</li>
    <li class="active">用户列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline">
        <div class="panel panel-default">
            <div class="panel-heading">管理员用户列表</div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="10%">用户名</th>
                        <th width="10%">状态</th>
                        <th width="15%">创建时间</th>
                        <th width="15%">最后登陆时间</th>
                        <th width="15%">最后登录IP</th>
                        <th width="15%">操作</th>                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['user']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['r']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
$foreach_r_Sav = $_smarty_tpl->tpl_vars['r'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['r']->value['admin_username'];?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['r']->value['admin_islock'] == 0) {?>正常<?php } else { ?>锁定<?php }?></td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['admin_creattime'],'%Y-%m-%d');?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['admin_logintime'],'%Y-%m-%d');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['r']->value['admin_loginip'];?>
</td>
                        <td>
                            <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=userEdit&uid=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                        </td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['r'] = $foreach_r_Sav;
}
?>
                   </tbody>
                </table>
                <div class="admin-page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
            </div>
        </div>
    </form>
</div>
    <style>
.admin-page{
    text-align: right;
    padding: 10px 15px;
    height: auto;
    overflow: hidden;
    font-family: "Helvetica Neue", STHeiti, "Microsoft YaHei", Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #036CB4;
}
.admin-page a {
    padding: 5px 12px;
    text-align: center;
    margin: 3px 0px;    
    border: solid 1px #E6E6E6;
    color: #999;
}
.admin-page a:hover {
    color: #2a6496;
    background: #EEEEEE;
}
.admin-page .now_page{
    border: solid 1px #499EF3;
    background: #499EF3;
    color: #fff;
}
    </style>

</body>
</html><?php }
}
?>