<?php /* Smarty version 2.6.26, created on 2015-12-01 18:04:06
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/AddUser.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
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
            <form action="<?php echo @__APP__; ?>
?c=Rbac&a=addUserHander" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="form-group clearfix">
                                <label>操作权限</label>

                                <select class="form-control pull-left" name="role_id">
                                    <?php $_from = $this->_tpl_vars['role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                    <option value="<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['name']; ?>
(<?php echo $this->_tpl_vars['v']['remark']; ?>
)</option>
                                    <?php endforeach; endif; unset($_from); ?>
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
                                        <input type="radio" name="lock" id="disable2" value="1">
                                        禁用
                                    </label>
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
</html>