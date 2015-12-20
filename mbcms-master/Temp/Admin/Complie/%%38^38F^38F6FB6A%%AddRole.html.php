<?php /* Smarty version 2.6.26, created on 2015-11-28 20:24:36
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/AddRole.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>Rabc权限控制管理</li>
    <li class="active">添加角色</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">添加角色</div>
        <div class="panel-body">
            <form action="<?php echo @__APP__; ?>
?c=Rbac&a=AddRoleHander" method="POST">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">角色名称</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">角色描述</label>
                                <input type="text" class="form-control" id="email" name="remark" placeholder="">
                            </div>


                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label >角色状态</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="disable1" value="0" checked>
                                        正常
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="disable2" value="1">
                                        禁用
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">提交保存</button>

                </div>


            </form>
        </div>
    </div>
</div>
</body>
</html>