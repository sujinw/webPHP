<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-20 02:07:41
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:299355f9772c604996-63503383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bd0e38c2ddbd7e3d65f2cc6ee322716b445b256' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\templates\\login.tpl',
      1 => 1442714850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299355f9772c604996-63503383',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55f9772c8ec5b7_32411855',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f9772c8ec5b7_32411855')) {function content_55f9772c8ec5b7_32411855($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
		<div class="wrap">
			<div class="zc-title">登录（login）</div>
			        
				<form id="login_form" name="form" onsubmit="return sub(1);" action="index.php?action=SubmitLogin" method="post">
					<ul class="form-con reg-ul">
						<li class="success">
							<input class="logint" placeholder="用户名" name="user_name" id="_account"
						onfocus="inputFocus('_account')" onblur="checkusername();" type="text" value="">				
							<div class="errorMessage"></div> <b class="correct"></b>
						</li>
						<li>
							<input class="logint" placeholder="密码" id="_pwd" name="user_password" 
						onfocus="inputFocus('_pwd')" onblur="checkpassword();" type="password">		
							<div class="errorMessage"></div> <b class="error"></b>
						</li>
					</ul>
					<div class="form-btn">
						<button type="submit" class="btn" name="login" value="yes">立即登录</button>
					</div>
				</form>
				<a  onclick="sub(3);">忘记密码?</a>
			</div>
			<div class="form-btn">
				<a class="btn bg_white" onclick="sub(2);">注册vivo帐号</a>
			</div>

			<div class="login_sns">
				<p>其他方式登录</p>
				<a id="qqlogin" class="qq" href=""><b></b>QQ帐号</a>
				
				<a id="sinalogin" class="weibo" href=""><b></b>新浪微博</a>
				<a id="renrenlogin" class="renren" href=""><b></b>人人帐号</a>
			</div>
		</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
</body>
</html><?php }} ?>
