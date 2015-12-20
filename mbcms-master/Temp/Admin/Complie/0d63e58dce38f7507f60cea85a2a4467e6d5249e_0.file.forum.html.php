<?php /* Smarty version 3.1.27, created on 2015-12-15 22:56:25
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Forum\forum.html" */ ?>
<?php
/*%%SmartyHeaderCode:1764856702a19bcd7d4_66633600%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d63e58dce38f7507f60cea85a2a4467e6d5249e' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Forum\\forum.html',
      1 => 1450191324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1764856702a19bcd7d4_66633600',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56702a19c90d08_48397333',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56702a19c90d08_48397333')) {
function content_56702a19c90d08_48397333 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1764856702a19bcd7d4_66633600';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>论坛管理</li>
    <li class="active">版块管理</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline">
        <div class="panel panel-default">
            <div class="panel-heading">论坛版块列表</div>
            <div class="panel-body">
                <button type="submit" class="btn btn-info">排序</button>
                <a href="<?php echo @constant('__APP__');?>
?c=Forum&a=addForum" class="btn btn-info">添加新的版块</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="10%">排序</th>
                            <th width="10%">ID</th>
                            <th width="30%">分类名称</th>
                            <th width="10%">状态</th>
                            <th width="30%">操作</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <input class="input-lenght form-control input-sm " type="text" name="listorders[3]" value="0"></td>
                            <td>8</td>
                            <td>网站开发</td>
                            <td>显示</td>
                            <td>
                                <a href="#" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    添加子分类
                                </a>
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
                        <tr>
                            <td>
                                <input class="input-lenght form-control input-sm " type="text" name="listorders[3]" value="0"></td>
                            <td>8</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─网站开发</td>
                            <td>显示</td>
                            <td>
                                <a href="#" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    添加子分类
                                </a>
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

                    </tbody>
                </table>

                <div class="panel-footer clearfix">
                    <button type="submit" class="btn btn-info">排序</button>
                </div>

            </div>
        </div>
    </form>
</div>
</body>
</html><?php }
}
?>