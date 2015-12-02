{{include file='head.tpl'}}
	<div class="wrap">
		<div class="zc-title">账号注册（Login）</div>
		<form id="register-form" name="register-form" action="index.php?action=SubmitRegistered" method="post">
			<ul class="form-con reg-ul">
				<li class="vercode">
					<input class="v_inp logint" type="text" placeholder="请输入图片验证码" id="_phoneiconcode" onblur="checkUserCode();" />
					<div class="errorMessage" id="code_error"></div> <b class="correct"></b>
					<span class="code-box">
						<img  title="不区分大小写。看不清楚可以换一个" id="_phoneicon" src='../mbcms/main/func/funcYZMImage.php' alt="" onclick="changeImage()" />
					</span>
					<a class="change-code" onclick="changeImage()">换一张</a>
				</li>

				<li>
					<input id="user_name" class="logint" placeholder="请输入用户名(字母数字下划线)" name="user_name" onblur="checkUserNameBeforeSubmit();" type="text">
					<div class="errorMessage" id="user_name_error"></div> <b class="correct"></b>
				</li>
				<li>
					<input id="user_nickname" class="logint" placeholder="请输入昵称" name="user_nickname" type="text">
					<div class="errorMessage" id="user_nickname"></div> <b class="correct"></b>
				</li>
				<li>
					<input id="user_password" class="logint" autocomplete="off" placeholder="请输入密码(大于4位)" name="user_password" type="password">
					<div class="errorMessage" id='user_password_error'></div>
					<b class="correct"></b>
				</li>
				<li>
					<input id="user_pwd" class="logint" autocomplete="off" placeholder="请再输入一次密码" name="pwd"
						 type="password">
					<div class="errorMessage" id="user_pwd_error"></div>
					<b class="correct"></b>
				</li>
			</ul>
			<div class="form-btn">
				<button type="button" id="submitRegBtn" class="btn" name="register" onclick="submitReg();">立即注册</button>
			</div>
		</form>

		<center>
			<div style="font-size:10px">
				Copyright&copy;
				<a href="" target="_blank">mbcms</a>
				
			</center>

			<div class="login_sns">
				<p>其他方式登录</p>
				<a id="qqlogin" class="qq" href="/v3/web/login/qqLogin?redirect_uri=http://m.vivo.com.cn/auth.php?referer=http%3A%2F%2Fm.vivo.com.cn%2F%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598&client_id=5">
					<b></b>
					QQ帐号
				</a>

				<a id="sinalogin" class="weibo" href="/v3/web/login/sinaLogin?redirect_uri=http://m.vivo.com.cn/auth.php?referer=http%3A%2F%2Fm.vivo.com.cn%2F%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598&client_id=5">
					<b></b>
					新浪微博
				</a>
				<a id="renrenlogin" class="renren" href="/v3/web/login/renrenLogin?redirect_uri=http://m.vivo.com.cn/auth.php?referer=http%3A%2F%2Fm.vivo.com.cn%2F%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598%3Futm_source%3Dbaidu%26utm_medium%3DWXbrandzone%26utm_campaign%3DWXBrandzone_%25E6%25A0%2587%25E9%25A2%2598&client_id=5">
					<b></b>
					人人帐号
				</a>
			</div>

		</div>
{{include file='foot.tpl'}}
<script type="text/javascript" src="../mbcms/templates/javascript/base.js"></script>
<script type="text/javascript" src="../mbcms/templates/javascript/loginReg.js"></script>

</body>
	</html>