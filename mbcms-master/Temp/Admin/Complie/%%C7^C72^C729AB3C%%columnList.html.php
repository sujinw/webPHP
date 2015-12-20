<?php /* Smarty version 2.6.26, created on 2015-12-06 19:55:40
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Column/columnList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Column/columnList.html', 34, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
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
                <a href="<?php echo @__APP__; ?>
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
                        <?php $_from = $this->_tpl_vars['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['v']['_name']; ?>
</td>                            
                            <td><?php echo $this->_tpl_vars['v']['tname']; ?>
</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['creat_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</td>
                            <td><?php if ($this->_tpl_vars['v']['display'] == 1): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
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
                        <?php endforeach; endif; unset($_from); ?>
                    </tbody>
                </table>
            </div>
        </form>

    </div>
</body>
</html>