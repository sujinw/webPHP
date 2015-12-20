<?php /* Smarty version 3.1.27, created on 2015-12-12 16:32:58
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Config\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:5664566bdbbaf3bb53_39412737%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '805bd3fed7b736b2bbd3eca4a4d152692937bfc6' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Config\\index.html',
      1 => 1449909176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5664566bdbbaf3bb53_39412737',
  'variables' => 
  array (
    'config' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_566bdbbb0f3793_49084446',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_566bdbbb0f3793_49084446')) {
function content_566bdbbb0f3793_49084446 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5664566bdbbaf3bb53_39412737';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>文章管理</li>
    <li class="active">系统设置</li>
</ol>
<!--路径导航-->
<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">系统设置</div>
        <div class="panel-body">
            <form action="<?php echo @constant('__APP__');?>
?c=config&a=set_config" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <?php
$_from = $_smarty_tpl->tpl_vars['config']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                            <div class="form-group">
                                <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</label>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['html'];?>

                            </div>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">提交保存</button>

                </div>


            </form>
        </div>

    </div>

</div>



</body>
</html><?php }
}
?>