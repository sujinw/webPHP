<?php /* Smarty version 2.6.26, created on 2015-12-06 17:57:35
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Column/addColumnType.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>栏目管理</li>
    <li class="active">添加栏目分类</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">添加栏目分类</div>
        <div class="panel-body">
            <form action="<?php echo @__APP__; ?>
?c=Column&a=addColumnTypeHander" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="cate_name">分类名称</label>
                                <input type="text" class="form-control" id="cate_name" name="name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label >分类状态</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="display" id="hidden1" value="1" checked>
                                        显示
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="display" id="hidden2" value="0">
                                        隐藏
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