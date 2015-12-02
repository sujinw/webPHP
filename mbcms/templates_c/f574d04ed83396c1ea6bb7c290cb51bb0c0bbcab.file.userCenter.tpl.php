<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-03 03:55:20
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\userCenter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10350560f4d97c71cb0-20847835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f574d04ed83396c1ea6bb7c290cb51bb0c0bbcab' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\userCenter.tpl',
      1 => 1443844518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10350560f4d97c71cb0-20847835',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560f4d97cf1cb9_36549842',
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560f4d97cf1cb9_36549842')) {function content_560f4d97cf1cb9_36549842($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="id_box user_bg">
            <div class="log-on">
                <a href="javascript:;" onclick="logout()">注销</a>
            </div>
            <img src="http://passport.mydrivers.com/comments/getusertouxiang.aspx?uid=1137582&size=medium" width="120" height="120"/>
            <span class="name"><?php echo $_smarty_tpl->tpl_vars['result']->value[0]['user_nickname'];?>
</span>

            <div class="name_edit" id="div_about">
                <span class="name_sm"></span>
                <span class="dji">用户等级：<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['user_level'];?>
</span>
            </div>

            <div class="name_edit1" id="div_aboutedit" style="display:none;">
                <span class="name_sm1">
                    <input name="" type="text" value="" id="txtAbout" class="edit_qm" />
                </span>
                <span id="span_info" class="editqm"><?php echo $_smarty_tpl->tpl_vars['result']->value[0]['user_qm'];?>
</span>
                <span class="really">
                    <input type="submit" id="btneditabout" value="确定" class="button_style3" />
                </span>
            </div>

        </div>

        <div class="id_jf">
            <li>
                积分
                <span>10</span>
            </li>
            <li>
                鲜花
                <span>0</span>
            </li>
            <li>
                鸡蛋
                <span>0</span>
            </li>
        </div>
        <div class="userlist">
            <li class="user_bg">
                <a href="myarticle.aspx" class="t1">我的文章</a>
            </li>
            <li class="user_bg" id="mycomments">
                <a href="mycomments.aspx" class="t2">我的评论</a>
            </li>
            <li class="user_bg">
                <a href="myfav.aspx" class="t3">我的收藏</a>
            </li>
            <li class="user_bg">
                <a href="#" class="t4">我的订阅</a>
            </li>
        </div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body>
</html><?php }} ?>
