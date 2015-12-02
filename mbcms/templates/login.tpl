{{include file='head.tpl'}}
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
{{include file='foot.tpl'}}
		
</body>
</html>