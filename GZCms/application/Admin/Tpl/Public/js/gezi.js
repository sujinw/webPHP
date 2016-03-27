/*//用户名验证
function validateUser() {
	var userInput = $('input[name="username"]');
	var userError = userInput.next();
	var exp = /^\w{3,16}$/; //定义3-16个字符的正则

	ajaxUser();
	if(!exp.test(userInput.val())){
		userError.html('用户名以3~16个字符的英文数字下划线！').show();
		userInput.focus();
		return false;
	}else{
		return true;
	}
}
function ajaxUser(){
	var userInput = $('input[name="username"]');
	var userError = userInput.next();
	var sta = true;
	$.post('index.php?m=admin&c=user&a=ajaxUser',{username:userInput.val()},function(status){
		if(status == 0){
			userError.html('用户名已经存在！').show();
			userInput.focus();
		}
	});
}

//验证密码
function validatePwd(){
	var pwdInput = $('input[name="password"]');
	var pwdError = pwdInput.next();
	var exp = /^\w{4,16}$/;//定义6-32个字符

	if(!exp.test(pwdInput.val())){
		pwdError.html('用户密码以6~16个字符的英文数字下划线！').show();
		return false;
	}else{
		return true;
	}
}

//提交
function submitUser(){
	if(validateUser() && validatePwd()){
		$('form[name="adduser"]').submit();
	}
	ajaxUser();
}

*/


//文章页面前端验证
function articleValidate(){
	var title = $('input[name="title"]');
	var titleError = title.next();

	if(!title.val()){
		titleError.html("标题不能为空");
		titleError.show();
		title.focus();

		return false;
	}
}

function node_access(){
	var input = $('.inputbox');
	var submit = $('.link_btn');
	console.log(input.eq(0))
	if(input.eq(0).css('display') != 'none'){
		input.hide();
		submit.hide();
	}else{
		input.show();
		submit.show();
		
	}
}
function del(aidd){
	hd_ajax("index.php?m=admin&c=article&a=ajaxDel",{'aid':aidd},'index.php?m=admin&c=article&a=articleList&p=1');
}
function delCate(cidd){
	console.log(cidd)
	hd_ajax("index.php?m=admin&c=article&a=ajaxDelCate",{'cid':cidd},'index.php?m=admin&c=article&a=articleCate&p=1');
}