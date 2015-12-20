<?php /* Smarty version 2.6.26, created on 2015-11-29 11:40:20
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/node.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>RBAC权限控制管理</li>
    <li class="active">节点列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline">
        <div class="panel panel-default">
            <div class="panel-heading">节点列表</div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="30%">节点名称</th>
                        <th width="20%">节点描述</th>
                        <th width="10%">节点状态</th>
                        <th width="30%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_tpl_vars['node']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['app']['id']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['app']['name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['app']['title']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['app']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                        <td>
                            <a href="<?php echo @__APP__; ?>
?c=Rbac&a=AddNode&pid=<?php echo $this->_tpl_vars['app']['id']; ?>
&level=2" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> 添加控制器</a>
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                        </td>
                    </tr>
                    <?php $_from = $this->_tpl_vars['app']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['action']['id']; ?>
</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─<?php echo $this->_tpl_vars['action']['name']; ?>
</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─<?php echo $this->_tpl_vars['action']['title']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['action']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                        <td>
                            <a href="<?php echo @__APP__; ?>
?c=Rbac&a=AddNode&pid=<?php echo $this->_tpl_vars['action']['id']; ?>
&level=3" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span> 添加动作方法</a>
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                        </td>
                    </tr>
                    <?php $_from = $this->_tpl_vars['action']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['method']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['method']['id']; ?>
</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─<?php echo $this->_tpl_vars['method']['name']; ?>
</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─<?php echo $this->_tpl_vars['method']['title']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['method']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> 编辑</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                   </tbody>
                </table>
               
            </div>
        </div>
    </form>
</div>
</body>
</html>