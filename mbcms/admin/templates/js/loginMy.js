
//获取input的所有id
var user = document.getElementById("user");
var pwd = document.getElementById("pwd");
var surePwd = document.getElementById("surePwd");


//获取span的所有id
var user_pass = document.getElementById("user_pass");
var pwd_pass = document.getElementById("pwd_pass");
var surePwd_pass = document.getElementById("surePwd_pass");
function checkUser(){
    //如果昵称未输入，则提示输入昵称
    if(!user.value){
        user_pass.style.fontSize = "13px";
        user_pass.style.width="31%";
        user_pass.style.height="2em";
        user_pass.style.textAlign="center";
        user_pass.style.lineHeight="2em";
        user_pass.style.marginTop='0.05%'
        user_pass.innerHTML = '你还没有填写用户名哦。';
        user_pass.style.display="block";
    }
    else if(user.value){
        //user_pass.style.display="none";
        checkUser3();
    }
}

//输入密码提示
function checkUser1(){
    //如果未输入密码，则提示请输入密码
    if(!pwd.value){
        pwd_pass.style.fontSize = "13px";
        pwd_pass.style.width="31%";
        pwd_pass.style.height="2em";
        pwd_pass.style.textAlign="center";
        pwd_pass.style.lineHeight="2em";
        pwd_pass.innerHTML = '你还没有填写密码哦。';
        pwd_pass.style.display="block";
    }
    else{
        pwd_pass.innerHTML ='';
        pwd_pass.style.backgroundColor= "#fff";
        pwd_pass.style.border="none";
        pwd_pass.style.display="none";

    }

}

//确认密码提示
function checkUser2(){
    //再次确认密码
    if(!surePwd.value){
        surePwd_pass.style.fontSize = "13px";
        surePwd_pass.style.width="31%";
        surePwd_pass.style.height="2em";
        surePwd_pass.style.textAlign="center";
        surePwd_pass.style.lineHeight="2em";
        surePwd_pass.innerHTML = '你还没有填入验证码呢!';
        surePwd_pass.style.display="block";
    }

    else{
        chickUser4();
        //surePwd_pass.innerHTML ='';
        //surePwd_pass.style.backgroundColor= "#fff";
        //surePwd_pass.style.border="none";
        //surePwd_pass.style.display="none";
    }
}
//根据后台数据确认用户名
function  checkUser3(){
   AjaxUtil.request({ method : "get", // 默认提交的方法,get post
        url : "action/ActionForAjax.php", // 请求的路径 required
        params : {'type':'adminUser','adminName':user.value}, // 请求的参数
        type : 'text', // 返回的内容的类型,text,xml,json
        callback : chickUserAjax
    });
}
function  chickUserAjax(nun){
    if(nun == 0){
        user_pass.style.fontSize = "13px";
        user_pass.style.width="31%";
        user_pass.style.height="2em";
        user_pass.style.textAlign="center";
        user_pass.style.lineHeight="2em";
        user_pass.style.marginTop='0.05%'
        user_pass.innerHTML = '管理账号不存在哦';
        user_pass.style.display="block";
    }else{
        user_pass.style.display="none";
    }
}
function chickUser4(){
    AjaxUtil.request({ 
        method : "get", // 默认提交的方法,get post
        url : "action/ActionForAjax.php", // 请求的路径 required
        params : {'type':'adminCode','code':surePwd.value}, // 请求的参数
        type : 'text', // 返回的内容的类型,text,xml,json
        callback : chickuser4Ajax
    });
}
function  chickuser4Ajax(nun){
    if(nun == 0){
        surePwd_pass.style.fontSize = "13px";
        surePwd_pass.style.width="31%";
        surePwd_pass.style.height="2em";
        surePwd_pass.style.textAlign="center";
        surePwd_pass.style.lineHeight="2em";
        surePwd_pass.innerHTML = '验证码出错呢';
        surePwd_pass.style.display="block";
    }
}
function  submitB(){

    if(!user.value){
        user_pass.style.fontSize = "13px";
        user_pass.style.width="31%";
        user_pass.style.height="2em";
        user_pass.style.textAlign="center";
        user_pass.style.lineHeight="2em";
        user_pass.innerHTML = '请填写您的用户名。';
        user.focus();
        return false;
    }
    if(!pwd.value){
        pwd_pass.style.fontSize = "13px";
        pwd_pass.style.width="31%";
        pwd_pass.style.height="2em";
        pwd_pass.style.textAlign="center";
        pwd_pass.style.lineHeight="2em";
        pwd_pass.innerHTML = '请填写您的用户密码。';
        pwd.focus();
        return false;
    }

    if(!surePwd.value){
        surePwd_pass.style.fontSize = "13px";
        surePwd_pass.style.width="31%";
        surePwd_pass.style.height="2em";
        surePwd_pass.style.textAlign="center";
        surePwd_pass.style.lineHeight="2em";
        surePwd_pass.innerHTML = '请填写您的登录验证。';
        surePwd_pass.focus();
        return false;
    }else{
        document.getElementById('formOne').submit();
    }


}

