<?php /* Smarty version 2.6.26, created on 2015-12-01 18:06:11
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/AddNode.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>Rabc权限控制管理</li>
    <li class="active">添加节点</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">添加<?php echo $this->_tpl_vars['type']; ?>
</div>
        <div class="panel-body">
            <form action="<?php echo @__APP__; ?>
?c=Rbac&a=AddNodeHander" method="POST">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name"><?php echo $this->_tpl_vars['type']; ?>
名称</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo $this->_tpl_vars['type']; ?>
描述</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="sort">排序</label>
                                <input type="text" class="form-control" id="sort" name="sort" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="remark">详细描述</label>
                                <input type="text" class="form-control" id="remark" name="remark" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label ><?php echo $this->_tpl_vars['type']; ?>
状态</label>
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
                    <input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
" />
                    <input type="hidden" name="level" value="<?php echo $this->_tpl_vars['level']; ?>
" />
                    <button type="submit" class="btn btn-primary">提交保存</button>

                </div>


            </form>
        </div>
    </div>
</div>
</body>
</html>