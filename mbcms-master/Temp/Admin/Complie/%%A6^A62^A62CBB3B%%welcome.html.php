<?php /* Smarty version 2.6.26, created on 2015-11-25 21:27:36
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Index/welcome.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Index/welcome.html', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!--路径导航-->
    <ol class="breadcrumb breadcrumb_nav">
        <li class="active">首页</li>
    </ol>
    <!--路径导航-->
    
    <div class="page-content">
    <!-- 欢迎信息 -->    
        <div class="panel-body">
        <button type="submit" class="btn btn-info"><span class=' glyphicon glyphicon-user'></span><?php echo $this->_tpl_vars['w']['admin_user']; ?>
 欢迎使用mbcms后台管理系统</button>
        </div>
        <p class="alert alert-warning" role="alert">您上次登录的时间是：<span><?php echo ((is_array($_tmp=$this->_tpl_vars['w']['login_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
</span></p>
        <p class="alert alert-info" role="alert">您上次登录的IP地址是:<span><?php echo $this->_tpl_vars['w']['login_ip']; ?>
</span></p>
        <div class="panel panel-default">
            <div class="panel-heading">信息统计</div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><span class="glyphicon glyphicon-list-alt"></span> 文章</th>
                            <th><span class="glyphicon glyphicon-th-large"></span> 栏目</th>
                            <th><span class="glyphicon glyphicon-th"></span> 分类</th>
                            <th><span class="glyphicon glyphicon-comment"></span> 评论</th>
                            <th><span class="glyphicon glyphicon-user"></span> 用户</th>
                            <th><span class="glyphicon glyphicon-eye-open"></span> 访问</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>38</td>
                            <td>34</td>
                            <td>34</td>
                            <td>34</td>
                            <td>4</td>
                            <td>343</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-success">当前操作系统：<?php echo $this->_tpl_vars['w']['OS']; ?>
</a>
            <a href="#" class="list-group-item list-group-item-info">当前浏览器:<?php echo $this->_tpl_vars['w']['browser']; ?>
</a>
            <a href="#" class="list-group-item list-group-item-warning">当前PHP版本：<?php echo $this->_tpl_vars['w']['PHPV']; ?>
</a>
            <a href="#" class="list-group-item list-group-item-danger">当前框架：MYPHP<?php echo $this->_tpl_vars['w']['MYPHPV']; ?>
</a>
        </div>
   </div>



</body>
</html>