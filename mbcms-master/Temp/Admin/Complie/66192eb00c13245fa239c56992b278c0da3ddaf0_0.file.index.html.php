<?php /* Smarty version 3.1.27, created on 2015-12-16 11:20:19
         compiled from "E:\WEBPROJECT\PHP\myPHP\Admin\Tpl\Index\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:23455670d873837473_71731661%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66192eb00c13245fa239c56992b278c0da3ddaf0' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\Admin\\Tpl\\Index\\index.html',
      1 => 1450191245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23455670d873837473_71731661',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5670d8739ae4c0_98183101',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5670d8739ae4c0_98183101')) {
function content_5670d8739ae4c0_98183101 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '23455670d873837473_71731661';
echo $_smarty_tpl->getSubTemplate ('../Common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台首页</title>

    <!-- Bootstrap -->
    <link href="<?php echo @constant('__PUBLIC__');?>
/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo @constant('__PUBLIC__');?>
/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/hardphp.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="myheading">
        <nav class="navbar navbar-inner">
            <div class="container-fluid">

                <div class="navbar-header">
                    <!--nav troggle-->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hard-navbar">
                        <span class="sr-only">导航切换</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--nav troggle-->
                    <!--brand-->
                    <a class="navbar-brand" href="#">mbCMS后台管理系统</a>
                    <!--brand-->
                </div>

                <!--nav links-->
                <div class="collapse navbar-collapse" id="hard-navbar">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo @constant('__APP__');?>
?c=Index&a=welcome" class="atip" target="appiframe" data-toggle="tooltip" data-placement="bottom" data-title="首页"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>mbCMS
                            </a>

                            <ul class="dropdown-menu dropdown-menu-arrow-right" role="menu">
                                <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 修改资料</a></li>
                                <li><a href="<?php echo @constant('__APP__');?>
?c=Login&a=login_out"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出登录</a></li>
                            </ul>
                        </li>
                    </ul>


                </div>
                <!--nav links-->
            </div>
        </nav>
    </div>

    <!--main-->
    <div class="container-fluid mybody">
        <div class="main-wapper">
            <!--菜单-->
            <div id="siderbar" class="siderbar-wapper">

                <div class="panel-group menu" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <span class="glyphicon glyphicon-list-alt"></span> 文章管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Article&a=listArticle&p=1" target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 文章列表</a>
                                <a href="<?php echo @constant('__APP__');?>
?c=Article&a=categroy" target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 文章分类</a>
                                <a href="<?php echo @constant('__APP__');?>
?c=Article&a=add" target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加文章</a>
                                <a href="<?php echo @constant('__APP__');?>
?c=Article&a=deleteBox" target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 回收站</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    <span class="glyphicon glyphicon-th-large"></span> 栏目管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Column&a=columnList"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 栏目列表</a>
                                <a href="<?php echo @constant('__APP__');?>
?c=Column&a=columnType"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 栏目分类</a>
                                <a href="<?php echo @constant('__APP__');?>
?c=Column&a=add"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加栏目</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="glyphicon glyphicon-th"></span> 分类管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group list-group-self">
                                <a href="categroy.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 分类列表</a>
                                <a href="add_category.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加分类</a>
                            </div>
                        </div>
                    </div>

                     <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="glyphicon glyphicon-list-alt"></span> 论坛管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group list-group-self">
                                <a href="categroy.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 论坛设置</a>
                                <a href="categroy.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 话题管理</a>
                                <a href="<?php echo @constant('__APP__');?>
?c=Forum&a=forum"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 版块管理</a>
                                <a href="add_category.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 论坛权限及用户组</a>
                            </div>
                        </div>
                    </div>    

                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="glyphicon glyphicon-user"></span> 用户管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="list-group list-group-self">
                                <a href="user.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 用户列表</a>
                                <a href="add_user.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加用户</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span class="glyphicon glyphicon-send"></span> 网址导航
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="list-group list-group-self">
                                <a href="nav.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 导航分类</a>
                                <a href="add_nav.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加分类</a>
                                <a href="url.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 导航列表</a>
                                <a href="add_url.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加导航</a>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <span class="glyphicon glyphicon-comment"></span> 评论管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="list-group list-group-self">
                                <a href="comment.html"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 评论列表</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <span class="glyphicon glyphicon-cog"></span> 系统设置
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Config&a=index"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 系统设置</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-inner">
                        <div class="panel-heading panel-heading-self" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    <span class="glyphicon glyphicon-road"></span> RBAC权限控制管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpane1" aria-labelledby="headingEight">
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=user&p=1"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 用户列表</a>
                            </div>
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=AddUser"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加用户</a>
                            </div>
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=node&p=1"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 节点列表</a>
                            </div>
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=AddNode"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加节点</a>
                            </div><div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=role"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 角色列表</a>
                            </div>
                            <div class="list-group list-group-self">
                                <a href="<?php echo @constant('__APP__');?>
?c=Rbac&a=AddRole"  target="appiframe" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> 添加角色</a>
                            </div>
                        </div>
                    </div>
               </div>

            </div>
            <!--菜单-->
            <!--内容-->
            <div id="content" class="main-content">

                <iframe src="<?php echo @constant('__APP__');?>
?a=welcome" style="width:100%;height: 100%;" id="appiframe" name="appiframe" frameborder="0"></iframe>

            </div>
            <!--内容-->
        </div>

    </div>

    <!--main-->

    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            var options={
                animation:true,
                trigger:'hover' //触发tooltip的事件
            }
            $('.atip').tooltip(options);

        });



    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>