<!DOCTYPE html">
<html>
<head>
<meta charset="utf-8" />
<title>mbcms后台登陆界面</title>

<link rel="stylesheet" href="templates/css/font-awesome.min.css"/>
<link rel="stylesheet" href="templates/css/loginMy.css"/>

<style>
html,body{width:100%;}
</style>

</head>
<body>

<div class="main">

	<div class="center">
		<h2 style="margin-left: 8em;">mbcms后台管理系统</h2>
		<form action="index.php?action=SubmitAdminLogin" id="formOne" method="post" onsubmit="return submitB()" >
			<i class="fa fa-user Cone">  | </i>
			<input type="text" name="admin_name" id="user" placeholder="用户名" onblur="checkUser()"/>
			<span id="user_pass"></span>
			<br/>
			<i class="fa fa-key Cone">  | </i>
			<input type="password" name="admin_password" id="pwd" placeholder="密码" onblur="checkUser1()"/>
			<span id="pwd_pass"></span>
			<br/>
			<i class="fa fa-folder-open Cone">  | </i>
			<input type="text" name="surePwd" id="surePwd" placeholder="验证码" onblur="checkUser2()"/><img src="../main/func/adminCode.php" alt="" style="" />
			<span id="surePwd_pass" ></span>
			<input type="submit" value="登录后台" id="submit" name="submit">
			<br/>
		</form>
	</div>
	
</div>

<script type="text/javascript" charset="utf-8" src="../templates/javascript/base.js"></script>
<script type="text/javascript" charset="utf-8" src="templates/js/loginMy.js"></script>

</body>
</html>