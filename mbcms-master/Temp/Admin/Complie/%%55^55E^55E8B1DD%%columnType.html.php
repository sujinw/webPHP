<?php /* Smarty version 2.6.26, created on 2015-12-06 19:56:42
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Column/columnType.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
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
                    <a class="btn btn-info" href="<?php echo @__APP__; ?>
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
                    <?php $_from = $this->_tpl_vars['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['v']['tid']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['v']['tname']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['v']['display'] == 1): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
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