<?php include KF_ROOT_PATH.'install/step/header.tpl.php';
$config = include_once KF_ROOT_PATH.'application/common/config/config.php';?>
<div id="body" style="padding: 16px;">

	<!--- 表单数据 -->
	<style type="text/css">
dd {text-indent: 8px;}
div.error {height: auto;}
input.info {width:175px;}
</style>

	<form id="install" name="myform" action="install.php" method="post">
		<input type="hidden" name="step" value="5"/>

		<div style="width: 700px; margin: auto;">
			<h1>4. 数据库信息</h1>
			<div class="div">
				<div class="header">数据库信息:</div>
				<div class="body">
					<dl>
						<dt>主机:</dt>
						<dd>
							<input class="info" type="text" size="24" name="DB_HOST" id="dbhost" value="<?php if(!empty($config['DB_HOST'])){echo $config['DB_HOST'];}?>" /></dd>
						<dt>端口:</dt>
						<dd>
							<input class="info" type="text" size="24" name="DB_PORT" id="dbport" value="<?php if(!empty($config['DB_PORT'])){echo $config['DB_PORT'];}?>" /></dd>
						<dt>用户名:</dt>
						<dd>
							<input class="info" type="text" size="24" name="DB_USER" id="dbuser" value="<?php if(!empty($config['DB_USER'])){echo $config['DB_USER'];}?>" /></dd>
						<dt>密码:</dt>
						<dd>
							<input class="info" type="password" size="24" name="DB_PASSWORD" id="dbpass" value="" /></dd>
						<dt>数据库:</dt>
						<dd>
							<input class="info" type="text" size="24" name="DB_DATABASE" id="dbname" value="<?php if(!empty($config['DB_DATABASE'])){echo $config['DB_DATABASE'];}?>" /></dd>
						<dt>表前缀:</dt>
						<dd>
							<input class="info" type="text" size="24" name="DB_PREFIX" id="pre" value="<?php if(!empty($config['DB_PREFIX'])){echo $config['DB_PREFIX'];}?>" /></dd>
						<dt>字符集:</dt>
						<dd>
							<input name="DB_CHARSET" type="radio" id="dbcharset" value="utf-8" <?php if(strtolower($config['DB_CHARSET'])=='') echo ' checked="checked" '?>
							/>默认
							<input name="DB_CHARSET" type="radio" id="dbcharset" value="utf-8" <?php if(strtolower($config['DB_CHARSET'])=='utf-8' || strtolower($config['DB_CHARSET'])=='utf8') echo '  checked="checked" '?>
							<?php if(strtolower($config['DB_CHARSET'])=='gbk') echo 'disabled'?>
							/>utf-8
							<input name="DB_CHARSET" type="radio" id="dbcharset" value="gbk" <?php if(strtolower($config['DB_CHARSET'])=='gbk') echo '  checked="checked" '?>
							<?php if(strtolower($config['DB_CHARSET'])=='utf-8') echo 'disabled'?>
							/>GBK
							<input name="DB_CHARSET" type="radio" id="dbcharset" value="latin1" <?php if(strtolower($config['DB_CHARSET'])=='latin1') echo ' checked '?>/>latin1</dd>
					</dl>
				</div>
			</div>

			<h1>5. 填写帐号信息</h1>
			<div class="div">
				<div class="header">管理员密码:</div>
				<div class="body">
					<dl>
						<dt>超级管理员帐号:</dt>
						<dd>
							<input class="info" type="text" size="24" name="username" id="username" value="<?php echo $config['RBAC_SUPER_ADMIN']?>" maxlength="16" />超级管理员帐号不能修改，修改需要同时修改</dd>
						<dt>管理员密码:</dt>
						<dd>
							<input class="info" type="password" size="24" name="password" id="password" maxlength="16" />
						</dd>
						<dt>确认密码:</dt>
						<dd>
							<input class="info" type="password" size="24" name="pwdconfirm" id="pwdconfirm" maxlength="16" />
						</dd>
						<dt>管理员E-mail:</dt>
						<dd>
							<input class="info" type="text" size="24" name="email" id="email" value="admin@admin.com"/>
						</dd>
						<dt>测试数据:</dt>
						<dd>
							<input type="checkbox" name="testdata" value="1" checked>默认测试数据 （用于新手和调试用户）</dd>
					</dl>
				</div>
			</div>
		</div>
	</form>

	<p style="text-align: center;">
		<input type="button" value=" 上一步" onClick="history.back();"/>
		<input type="button" id="finish" value=" 下一步" onClick="checkdb();return false;"/>
	</p>

</div>
<div id="footer">Powered by GZcms (c) 2016</div>

<script language="JavaScript">
<!--
var errmsg = new Array();
errmsg[0] = '您已经安装过GzCMS，系统会自动删除老数据！是否继续？';
errmsg[2] = '无法连接数据库服务器，请检查配置！';
errmsg[3] = '成功连接数据库，但是指定的数据库不存在并且无法自动创建，请先通过其他方式建立数据库！';
errmsg[6] = '数据库版本低于Mysql 4.0，无法安装GZCMS，请升级数据库版本！';

$(document).ready(function(){
	$("input[class='info']").click(function(){
		var inid = $(this).attr('id')+'_err';
		if ($("#"+inid)){
			$("#"+inid).remove();
		}
	});
});

function checkdb() 
{
	var d = 0;
	$("span[data-err='1']").remove();
	$("input[class='info']").each(function(){
		if ($(this).val() == ''){
			$(this).after('<span id="'+$(this).attr('id')+'_err" data-err="1" style="padding-left:5px; color:#F00">此项不能留空。</span>');
			if (d == 0) $(this).focus();
			d = 1;
		}
	});
	if ($("#password").val() != $("#pwdconfirm").val() && d == 0){
		$("#pwdconfirm").after('<span id="'+$(this).attr('id')+'_err" data-err="1" style="padding-left:5px; color:#F00">两次密码输入不相同。</span>');
		$("#pwdconfirm").focus();
		d = 1;
	}
	if ($("#password").val().length < 6 && d == 0){
		$("#password").after('<span id="password_err" data-err="1" style="padding-left:5px; color:#F00">密码不能小于6位数。</span>');
		$("#password").focus();
		d = 1;
	}
	if (d == 1) return false;
	
	$('#finish').val('正在提交');
	var url = 'install.php?step=dbtest&dbhost='+$('#dbhost').val()+'&dbuser='+$('#dbuser').val()+'&dbpass='+$('#dbpass').val()+'&dbname='+$('#dbname').val()+'&pre='+$('#pre').val()+'&t='+Math.random()*5;
    $.get(url, function(data){
		if(data > 1) {
			alert(errmsg[data]);
			$('#finish').val(' 下一步');
			return false;
		}
		else if(data == 1 || (data == 0 && confirm(errmsg[0]))) {
			$('#install').submit();
		}
		$('#finish').val(' 下一步');
	});
    return false;
}
//-->
</script>

</body>
</html>