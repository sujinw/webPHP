/* 登录注册验证
 * mbcms
 * slade
 */

 function submitReg(){
 	//验证用户名
 	checkUserNameBeforeSubmit();

 	//检测密码是否合格
 	checkUserPwd();

 	//检测验证码
 	checkUserCode();

 	console.log(checkUserName())
 	console.log(checkUserPwd())
 	console.log(checkUserCode())

 	if (checkUserName() && checkUserPwd()) {
 		$('submitRegBtn').setAttribute('disabled','false')
 		$('register-form').submit();
 	}else{
 		$('submitRegBtn').setAttribute('disabled','disabled')
 	};
 	
 }

function checkUserName(code){
	var nameDom = $('user_name');
	var nameErrorTips = $('user_name_error');
	var userName = false;

	nameErrorTips.style.display = 'none';

	if(code == 1){
		 nameErrorTips.innerHTML = "用户名已经存在！";
		 nameErrorTips.style.display = 'block';
		 return userName;
	}else if(code == 0){
		nameErrorTips.innerHTML = '还没有人使用呢！';
		nameErrorTips.style.display = 'block';
		userName = true;
		return userName;
	}else if(code == 2){
		nameErrorTips.innerHTML = "用户名不能为空！";
		nameErrorTips.style.display = 'block';
		return userName;
	}else if(code == 3){
		nameErrorTips.innerHTML = "用户名不符合规则！";
		nameErrorTips.style.display = 'block';
		return userName;
	}else{
		userName = true;
		return userName;
	}
}

function checkUserPwd(){
	var password = $('user_password');
	var passwordError = $('user_password_error');
	var pwd = $('user_pwd');
	var pwdErrod = $('user_pwd_error');
	var passWord = false;

	if(password.value == ''){
		passwordError.style.display = 'block';
		passwordError.innerHTML = '密码不能为空！';
		return passWord;
	}else if(password.value.length < 4){
		passwordError.style.display = 'block';
		passwordError.innerHTML = '密码不能小于4位！';
		return passWord;
	}else{
		passWord = true;
		return passWord;
	}
}

function checkUserCode(){
	var codeDome = $('_phoneiconcode');

	AjaxUtil.request({
		method:"POST",
        url:"../mbcms/main/func/checkYZM.php?action=code",
        params:{code:codeDome.value},
        type:'text',
        callback:process
	});
}

function process(data){
	var codeError = $('code_error');
	var code = false;

	codeError.style.display = 'none';
	if(data != '1'){
		codeError.style.display = 'block';
		codeError.innerHTML = "验证码输入错误！";
		return code;
	}else{
		code = true;
		return code;
	}

}
function changeImage(){
	var img = $('_phoneicon');

	img.setAttribute('src','../mbcms/main/func/funcYZMImage.php?' + Math.random());
}

function checkUserNameBeforeSubmit(){
	var reg = new RegExp("^[a-zA-Z_0-9]+$"); //定义检测正则
	var nameDome = $('user_name');
	if(nameDome.value == ''){
		checkUserName(2);
	}else if(!nameDome.value.match(reg)){
		checkUserName(3);
	}else{
		AjaxUtil.request({
			method:"POST",
        	url:"../mbcms/main/action/doActionForAjax.php?action=checkUserName",
        	params:{user_name:nameDome.value},
       		type:'text',
        	callback:checkUserName
		});
	}
}
