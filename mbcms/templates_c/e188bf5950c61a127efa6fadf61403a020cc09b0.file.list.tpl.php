<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-01 09:32:51
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17497561cb401b4f4e5-73546153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e188bf5950c61a127efa6fadf61403a020cc09b0' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\list.tpl',
      1 => 1446370369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17497561cb401b4f4e5-73546153',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_561cb401bc9fa1_38980621',
  'variables' => 
  array (
    'listData' => 0,
    'list' => 0,
    'nextPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561cb401bc9fa1_38980621')) {function content_561cb401bc9fa1_38980621($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   
  <?php if (count($_smarty_tpl->tpl_vars['listData']->value)==0) {?><div class="txtimg overflow clearfix area mg-auto">     
	<a href="news-show.html">
	<img src="templates/images/danshinimeiyou.jpg" title="">
	<span class="txtimg-title">哎呀！没有文章呢！</span>
	</a>
	</div> 
  <?php }?>
   <div class="title2 clearfix area mg-auto">
      <h2>文章列表</h2>
   </div>
   <div class="img-list-wrap clearfix area overflow mg-auto">
        <ul class="clearfix">
        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
            <li>
                <a href="index.php?action=view&type=article&articleid=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['fm_img'];?>
" alt="" />
                    <div class="imglist-title clearfix">
                        <span class="imglist-title-inner"><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</span>
                    </div>
                </a>
            </li>
        <?php } ?>
        </ul>
    </div>
   <div id="addMore"><a href="<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a></div>
    <!--底部-->
  <div style="margin-top:15px;display: block;border-bottom: solid 1px #FFF;border-top: solid 1px #cacaca;text-indent: -9999px;height: 0px;">line</div>
  <?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 <?php echo '<script'; ?>
 type="text/javascript">

 <?php echo '</script'; ?>
>

</body> 
</html><?php }} ?>
