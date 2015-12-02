<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-13 03:20:30
         compiled from "E:\WEBPROJECT\demo\demo\PHP\mbcms\admin\templates\admin_fenlei_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3740561c6985be34a5-11315057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'debdec165c8a16347ae96fe803924153aa6cf0af' => 
    array (
      0 => 'E:\\WEBPROJECT\\demo\\demo\\PHP\\mbcms\\admin\\templates\\admin_fenlei_add.tpl',
      1 => 1444706419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3740561c6985be34a5-11315057',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_561c6985c60958_04628923',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561c6985c60958_04628923')) {function content_561c6985c60958_04628923($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="content" class="white">
	<h1><img src="templates/img/icons/posts.png" alt=""> 添加分类</h1>
	<div class="bloc">
		<div class="title">user inputs<a href="#" class="toggle"></a></div>
	<div class="content">
		<form action="index.php?action=DoAction&type=addfenlei" id="formOne" method="post" enctype="multipart/form-data" onsubmit="checkFenlei()">
			<div class="input medium">
            <label for="input1">分类名称</label>
            <input type="text" name="name" id="input1" onblur="checkFenleiName()">
            <span class="error-message" id='error1' style="opacity: 0; display: none;"></span>
        </div>
        <div class="input medium">
            <label for="input5">分类封面图片</label>
            <input type="file" name="fenlei_img" id="input5">
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
	var name = $('#input1'),
		error1 = $('#error1');
function checkFenleiName(){
	var flag = true;
	error1.hide();

	if(!$('#input1').val()){
		error1.animate({
                'opacity' : 1,
            }).show();
            error1.text('请填写分类名称');
            flag = false;
	}else{

	$.ajax({
		url: 'index.php?action=AdminAjax&type=fenlei',
		type: 'GET',
		data: {'fenleiName':$('#input1').val()},
		success:function(data){
			if (data == 1) {
                error1.animate({
                    'opacity' : 1,
                }).show();
                error1.text('分类名称已经存在');
                flag = false;
			};
		}
	})
}
}
function checkFenlei(){
	if(checkName()){
		$('#formOne').submit();
	}
}
<?php echo '</script'; ?>
><?php }} ?>
