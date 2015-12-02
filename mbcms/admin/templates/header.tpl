<!DOCTYPE html>
<html>
<head>
    <title>Your Admin Panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


    <!-- Compressed Version
        <link type="text/css" rel="stylesheet" href="min/b=CoreAdmin&f=css/reset.css,css/style.css,css/jqueryui/jqueryui.css,js/jwysiwyg/jquery.wysiwyg.old-school.css,js/zoombox/zoombox.css" />
    <script type="text/javascript" src="min/b=CoreAdmin/js&f=cookie/jquery.cookie.js,jwysiwyg/jquery.wysiwyg.js,tooltipsy.min.js,iphone-style-checkboxes.js,excanvas.js,zoombox/zoombox.js,visualize.jQuery.js,jquery.uniform.min.js,main.js"></script>
    -->
    <link rel="stylesheet" href="templates/css/min.css" />
    <!-- jQuery AND jQueryUI -->
    <script type="text/javascript" src="templates/js/libs/jquery/1.6/jquery.min.js"></script>
    <script type="text/javascript" src="templates/js/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
    <script type="text/javascript" src="templates/js/min.js"></script>

</head>
<body>

    <script type="text/javascript" src="templates/content/settings/main.js"></script>
    <link rel="stylesheet" href="templates/content/settings/style.css" />

    <div class="settings" id="settings">
        <div class="wrapper">
            <div class="grid3">
                <div class="titre">Backgrounds</div>
                <a href="url(templates/css/img/bg.html" class="backgroundChanger active" title="White"></a>
                <a href="url(templates/css/img/dark-bg.html" class="backgroundChanger dark" title="Dark"></a>
                <a href="url(templates/css/img/wood.html" class="backgroundChanger dark" title="Wood"></a>
                <a href="url(templates/css/img/altbg/smoothwall.html" class="backgroundChanger" title="Smoothwall"></a>
                <a href="url(templates/css/img/altbg/black_denim.html" class="backgroundChanger dark" title="black_denim"></a>
                <a href="url(templates/css/img/altbg/carbon.html" class="backgroundChanger dark" title="Carbon"></a>
                <a href="url(templates/css/img/altbg/double_lined.html" class="backgroundChanger" title="Double lined"></a>
                <div class="clear"></div>
            </div>
            <div class="grid3">
                <div class="titre">Bloc style</div>
                <a href="black.html" class="blocChanger" title="Black" style="background:url(css/img/bloctitle.png);"></a>
                <a href="white.html" class="blocChanger active" title="White" style="background:url(css/img/white-title.png);"></a>
                <a href="wood.html" class="blocChanger" title="Wood" style="background:url(css/img/wood-title.jpg);"></a>
                <div class="clear"></div>
            </div>
            <div class="grid3">
                <div class="titre">Sidebar style</div>
                <a href="grey.html" class="sidebarChanger active" title="Grey" style="background:#494949"></a>
                <a href="black.html" class="sidebarChanger" title="Black" style="background:#262626"></a>
                <a href="white.html" class="sidebarChanger" title="White" style="background:#EEEEEE"></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <a class="settingbutton" href="#"></a>
    </div>
    <!--              
                HEAD
                        -->
    <div id="head">
        <div class="left">
            <a href="#" class="button profile">
                <img src="templates/img/icons/top/huser.png" alt="" />
            </a>
            Hi,
            <a href="#">{{$admin_name}}</a>
            |
            <a href="#">Logout</a>
        </div>
        <div class="right">
            <form action="#" id="search" class="search placeholder">
                <label>Looking for something ?</label>
                <input type="text" value="" name="q" class="text"/>
                <input type="submit" value="rechercher" class="submit"/>
            </form>
        </div>
    </div>

    <!--            
                SIDEBAR
                         -->
    <div id="sidebar">
        <ul>
            <li>
                <a href="index.php?action=WebsiteSitting">
                    <img src="templates/img/icons/menu/inbox.png" alt="" />
                    全局配置
                </a>
            </li>
            <li class="">
                <a href="#">
                    <img src="templates/img/icons/menu/layout.png" alt="" />
                    会员管理
                </a>
                <ul>
                    <li class="">
                        <a href="index.php?action=UserList">会员列表</a>
                    </li>
                    <li>
                        <a href="forms.html?p=forms">会员权限管理</a>
                    </li>
                    <li>
                        <a href="index.php?action=AddUser">添加会员</a>
                    </li>
                    <li>
                        <a href="tabs.html?p=tabs">编辑会员资料</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img src="templates/img/icons/menu/brush.png" alt="" />
                    文章管理
                </a>
                <ul>
                    <li>
                        <a href="index.php?action=ArticleList">文章列表</a>
                    </li>
                    <li>
                        <a href="index.php?action=addArticle">添加文章</a>
                    </li>
                    <li>
                        <a href="#">修改文章</a>
                    </li>
                    <li>
                        <a href="#">删除文章</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img src="templates/img/icons/menu/brush.png" alt="" />
                    分类管理
                </a>
                <ul>
                    <li>
                        <a href="index.php?action=fenleiList">分类列表</a>
                    </li>
                    <li>
                        <a href="index.php?action=AddFenlei">添加分类</a>
                    </li>
                    <li>
                        <a href="#">编辑分类</a>
                    </li>
                </ul>
            </li>
            <li class="nosubmenu">
                <a href="#">
                    <img src="templates/img/icons/menu/lab.png" alt="" />
                    This button is useless
                </a>
            </li>
            <li class="nosubmenu">
                <a href="modal.html" class="zoombox w450 h700">
                    <img src="templates/img/icons/menu/comment.png" alt="" />
                    Modal box
                </a>
            </li>
        </ul>

    </div>

