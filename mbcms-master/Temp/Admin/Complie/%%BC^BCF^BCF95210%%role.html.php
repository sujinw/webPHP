<?php /* Smarty version 2.6.26, created on 2015-11-29 21:59:55
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/role.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>Rbac权限控制</li>
    <li class="active">角色列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline">
        <div class="panel panel-default">
            <div class="panel-heading">角色列表</div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">角色名称</th>
                        <th width="20%">角色描述</th>
                        <th width="10%">角色状态</th>
                        <th width="20%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_tpl_vars['role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['v']['name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['v']['remark']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['v']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                        <td>
                            <a href="<?php echo @__APP__; ?>
?c=Rbac&a=access&rid=<?php echo $this->_tpl_vars['v']['id']; ?>
" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 配置权限</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </form>



</div>



</body>
</html>