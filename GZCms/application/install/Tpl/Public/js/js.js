//点击下一步时检测
function check_dir() {
    if ($(".dir_error").length > 0) {
        alert("您的系统环境不可以安装HDCMS");
        return false;
    }
    return true;
}
//表单验证
function validation_input() {
    $("span").removeClass("error").hide();
    var _input = $("input[type='text']");
    _input.each(function (i) {
        var required = $(this).attr('mast_required') == 1;
        var error = $(this).attr('error');
        var value = $.trim($(this).val());
        var span = $(this).next("span");
        if (required && !value) {
            span.addClass("error").html(error).show();
        }
    })
    //验证邮箱
    var email = $.trim($("[name='EMAIL']").val());
    if (!/^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i.test(email)) {
        $("[name='EMAIL']").next("span").addClass("error").show().html("邮箱格式错误");
        return false;
    }
    //验证密码
    var password = $.trim($("[name='PASSWORD']").val());
    var c_password = $.trim($("[name='C_PASSWORD']").val());

    if (password != c_password) {
        $("[name='C_PASSWORD']").next("span").addClass("error").show().html("两次密码不一致");
        return false;
    }
    if ($("span.error").length > 0) {
        return false;
    }
    return true;
}
//设置数据库
$(function () {
    $("input").blur(function () {
        validation_input();
    })
    $("a#check_config").click(function () {
        if (validation_input()) {
            $.ajax({
                url: "?step=check_connect",
                data: $("input").serialize(),
                type: "post",
                timeout: 3000,
                success: function (stat) {
                    if (stat == 1) {
                        location.href = "?step=6";
                    } else if (stat == 2) {
                        if (confirm("数据库已存在，继续安装将删除所有数据，是否继续!")) {
                            $.ajax({
                                url: "?step=create_database",
                                data: $("input").serialize(),
                                type: "post",
                                success: function (stat) {
                                    if (stat == 1) {
                                        location.href = "?step=6";
                                    } else {
                                        alert("数据库创建失败，请检查MYSQL权限");
                                    }
                                }
                            })
                        }
                    } else if (stat == 3) {
                        alert("替换配置文件../data/config/db.inc.php失败");
                    } else {
                        alert("数据库服务器或登录密码无效，无法连接数据库，请重新设定");
                    }
                },
                error: function () {
                    alert("数据库服务器或登录密码无效，无法连接数据库，请重新设定");
                }
            })
        }
    })
})