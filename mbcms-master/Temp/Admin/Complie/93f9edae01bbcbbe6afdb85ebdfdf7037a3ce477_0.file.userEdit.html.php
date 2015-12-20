<?php /* Smarty version 3.1.27, created on 2015-12-14 17:42:12
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Rbac\userEdit.html" */ ?>
<?php
/*%%SmartyHeaderCode:20624566e8ef4cd64f0_19536296%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93f9edae01bbcbbe6afdb85ebdfdf7037a3ce477' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Rbac\\userEdit.html',
      1 => 1450086114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20624566e8ef4cd64f0_19536296',
  'variables' => 
  array (
    'role' => 0,
    'v' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566e8ef4dd8236_42342877',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566e8ef4dd8236_42342877')) {
function content_566e8ef4dd8236_42342877 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20624566e8ef4cd64f0_19536296';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>管理员管理</li>
    <li class="active">添加管理员</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">添加管理员</div>
        <div class="panel-body">
            <form action="<?php echo @constant('__APP__');?>
?c=Rbac&a=editUserHander" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="form-group clearfix">
                                <label>操作权限</label>

                                <select class="form-control pull-left" name="role_id">
                                    <?php
$_from = $_smarty_tpl->tpl_vars['role']->value;
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
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
(<?php echo $_smarty_tpl->tpl_vars['v']->value['remark'];?>
)</option>
                                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                </select>

                            </div>


                            <div class="form-group">
                                <label for="name">用户名</label>
                                <input type="text" class="form-control" id="name" name="admin_username" placeholder="用户名" required>
                            </div>
                            <div class="form-group">
                                <label for="email">用户密码</label>
                                <input type="password" class="form-control" id="email" name="admin_pwd" placeholder="用户密码" required>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label >用户状态</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="admin_islock" id="disable1" value="0" checked>
                                        正常
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="admin_islock" id="disable2" value="1">
                                        禁用
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name='uid' value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" />
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