<?php /* Smarty version 3.1.27, created on 2015-12-12 12:51:28
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Index\welcome.html" */ ?>
<?php
/*%%SmartyHeaderCode:26503566ba7d08bd0d7_99233179%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c80818e21915ad41827854bc447481eef9175d8' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Index\\welcome.html',
      1 => 1448458028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26503566ba7d08bd0d7_99233179',
  'variables' => 
  array (
    'w' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566ba7d0ba7301_50963327',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566ba7d0ba7301_50963327')) {
function content_566ba7d0ba7301_50963327 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\WEBPROJECT\\PHP\\myPHP\\MyPHP\\Extends\\Org\\Smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '26503566ba7d08bd0d7_99233179';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <!--路径导航-->
    <ol class="breadcrumb breadcrumb_nav">
        <li class="active">首页</li>
    </ol>
    <!--路径导航-->
    
    <div class="page-content">
    <!-- 欢迎信息 -->    
        <div class="panel-body">
        <button type="submit" class="btn btn-info"><span class=' glyphicon glyphicon-user'></span><?php echo $_smarty_tpl->tpl_vars['w']->value['admin_user'];?>
 欢迎使用mbcms后台管理系统</button>
        </div>
        <p class="alert alert-warning" role="alert">您上次登录的时间是：<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['w']->value['login_time'],'%Y-%m-%d %H:%M');?>
</span></p>
        <p class="alert alert-info" role="alert">您上次登录的IP地址是:<span><?php echo $_smarty_tpl->tpl_vars['w']->value['login_ip'];?>
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
            <a href="#" class="list-group-item list-group-item-success">当前操作系统：<?php echo $_smarty_tpl->tpl_vars['w']->value['OS'];?>
</a>
            <a href="#" class="list-group-item list-group-item-info">当前浏览器:<?php echo $_smarty_tpl->tpl_vars['w']->value['browser'];?>
</a>
            <a href="#" class="list-group-item list-group-item-warning">当前PHP版本：<?php echo $_smarty_tpl->tpl_vars['w']->value['PHPV'];?>
</a>
            <a href="#" class="list-group-item list-group-item-danger">当前框架：MYPHP<?php echo $_smarty_tpl->tpl_vars['w']->value['MYPHPV'];?>
</a>
        </div>
   </div>



</body>
</html><?php }
}
?>