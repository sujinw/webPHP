<?php /* Smarty version 2.6.26, created on 2015-11-27 18:00:39
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/AdminUser/add.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>文章管理</li>
    <li class="active">添加用户</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">添加用户</div>
        <div class="panel-body">
            <form>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">

                            <div class="form-group clearfix">
                                <label>所属角色</label>

                                <select class="form-control pull-left" name="group_id">
                                    <option value="1">网站开发</option>
                                    <option value="2">--|HTML5</option>
                                    <option value="3">--|CSS3</option>
                                    <option value="4">--|PHP</option>

                                </select>

                            </div>


                            <div class="form-group">
                                <label for="name">用户昵称</label>
                                <input type="text" class="form-control" id="name" name="cname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">用户邮箱</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>


                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label >用户状态</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="disable" id="disable1" value="0" checked>
                                        正常
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="disable" id="disable2" value="1">
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