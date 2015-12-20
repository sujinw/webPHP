<?php /* Smarty version 2.6.26, created on 2015-11-29 13:11:09
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/user.html', 34, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
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
                    <?php $_from = $this->_tpl_vars['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['r']['id']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['r']['admin_username']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['r']['admin_islock'] == 0): ?>正常<?php else: ?>锁定<?php endif; ?></td>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['r']['admin_creattime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</td>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['r']['admin_logintime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</td>
                        <td><?php echo $this->_tpl_vars['r']['admin_loginip']; ?>
</td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                   </tbody>
                </table>
                <div class="admin-page"><?php echo $this->_tpl_vars['page']; ?>
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
</html>