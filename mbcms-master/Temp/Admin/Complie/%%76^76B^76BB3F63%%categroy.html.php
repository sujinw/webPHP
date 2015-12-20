<?php /* Smarty version 2.6.26, created on 2015-12-09 14:42:06
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Article/categroy.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>文章管理</li>
    <li class="active">分类列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form>
        <div class="panel panel-default">
            <div class="panel-heading">分类列表</div>
            <div class="panel-body">
                <a href="<?php echo @__APP__; ?>
?c=Article&a=addCategory" class="btn btn-info">添加文章分类</a>
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
                    <?php $_from = $this->_tpl_vars['cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['v']['cid']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['v']['cname']; ?>
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