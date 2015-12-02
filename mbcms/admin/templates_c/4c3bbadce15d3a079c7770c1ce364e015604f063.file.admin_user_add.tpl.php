<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-13 03:22:19
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\admin_user_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:558756175be65b65b6-99706554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c3bbadce15d3a079c7770c1ce364e015604f063' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\admin_user_add.tpl',
      1 => 1444706533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '558756175be65b65b6-99706554',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56175be6658f50_29520790',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56175be6658f50_29520790')) {function content_56175be6658f50_29520790($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="content" class="white">
<h1><img src="templates/img/icons/posts.png" alt=""> 添加会员</h1>
	<div class="bloc">
	<div class="title">user inputs<a href="#" class="toggle"></a></div>
	<div class="content">
		<form action="index.php?action=DoAction&type=addUser" id="formOne" method="post" enctype="multipart/form-data" onsubmit="checkUser()">
			<div class="input medium">
            <label for="input1">用户名</label>
            <input type="text" name="user_name" id="input1" onblur="checkUserName()">
            <span class="error-message" id='error1' style="opacity: 0; display: none;"></span>
        </div>
        <div class="input medium">
            <label for="input2">昵称</label>
            <input type="text" name="user_nickname" id="input2" onblur="">
            <span class="error-message" id='error2' style="opacity: 0; display: none;"></span>
        </div>
        <div class="input medium">
            <label for="input3">密码</label>
            <input type="password" name="password" id="input3" onblur="checkPass()">
            <span class="error-message" id='error3' style="opacity: 0; display: none;"></span>
        </div>
        <div class="input medium">
            <label for="input4">确认密码</label>
            <input type="password" name="pwd" id="input4" onblur="checkPwd()">
            <span class="error-message" id='error4' style="opacity: 0; display: none;"></span>
        </div>
        <div class="input medium">
            <label for="input5">用户头像</label>
            <input type="file" name="user_img" id="input5">
            <span class="error-message" id='error5' style="opacity: 0; display: none;"></span>
        </div>
        <div class="submit medium">
            <input type="submit" class="submit" id="input6" value="提交保存">
        </div>
		</form>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	var userName     = $('#input1'),
		userNickName = $('#input2'),
		userPassword = $('#input3'),
		userPwd      = $('#input4');

    var err1 = $('#error1'),
        err2 = $('#error2'),
        err3 = $('#error3'),
        err4 = $('#error4'),
        err4 = $('#error5');

	function checkUserName(){
        var flag = true;
        if (!userName.val()) {
            err1.animate({
                        'opacity' : 1,
                    }).show();
                    err1.text('请输入用户名');
            flag = false;            
        };
		$.ajax({
			url:'index.php?action=adminajax&type=user',
			type:'GET',
			data:{'userName':userName.val()},
			success:function(data){
				if (data == 1) {
                    err1.animate({
                        'opacity' : 1,
                    }).show();
                    err1.text('用户名已经存在');
                    flag = false;
				};
			}
		})
        return flag;
	}
    function checkPass(){
        var flag = true;
        if(!userPassword.val()){
            err4.animate({
                        'opacity' : 1,
                    }).show();
                    err3.text('请输入密码');
            flag = false;
        }

        return flag;
    }
    function checkPwd(){
        var flag = true;
        if(userPassword.val() != userPwd){
            err3.animate({
                        'opacity' : 1,
                    }).show();
                    err4.text('两次输入的密码不一样！');
            flag = false;
        }
    }
    function checkUser(){
        if(checkUserName() && checkPass() && checkPwd()){
            $('#formOne').submit();
        }
    }
<?php echo '</script'; ?>
><?php }} ?>
