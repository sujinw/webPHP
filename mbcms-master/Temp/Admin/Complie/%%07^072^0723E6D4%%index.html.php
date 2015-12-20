<?php /* Smarty version 2.6.26, created on 2015-11-25 23:16:21
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Login/index.html */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>mbcms后台管理系统-登录</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo @__PUBLIC__; ?>
/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo @__PUBLIC__; ?>
/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo @__PUBLIC__; ?>
/js/jquery.min.js"></script>
  </head>

  <body class=" bg-primary">

    <div class="container">
      <h1 class="text-center"><span class="glyphicon glyphicon-send"></span>mbcms后台管理系统</h1>
      <form class="form-signin" action="<?php echo @__APP__; ?>
?c=login&a=login" method="POST" name="login">
        <h2 class="form-signin-heading text-center">mbcms后台登录</h2>
        <div class="form-group">
          <label for="inputEmail" class="sr-only">管理员</label>
          <input type="text" id="inputEmail" class="form-control" name="admin_username" placeholder="用户名" required autofocus>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="sr-only">密码</label>
          <input type="password" id="inputPassword" name="admin_pwd" class="form-control" placeholder="密码" required>
        </div>
        <div class="form-group">
          <img src="<?php echo @__APP__; ?>
?c=Login&a=code" alt="验证码" />
          <span id="verfyError" style="display:none">您输入的验证码错误哦-_-</span>
        </div>
        <div id="verfyGroup" class="form-group">
          <label for="inputverfy" class="sr-only">验证码</label>
          <input type="text" id="inputverfy" name="verfy" class="form-control" placeholder="验证码" required aria-describedby="inputError2Status">
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="inputError2Status" class="sr-only">(error)</span>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">记住密码
          </label>
        </div>
        <button class="btn btn-lg btn-info btn-block" type="submit">登 录</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo @__PUBLIC__; ?>
/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    (function(){
        var verfy = $('#inputverfy');
        verfy.blur(function(){
          $.post('?c=Login&a=check_code',{verfy:$(this).val()},function(state){
            console.log(state);
            if(state == 1){
                $('#verfyError').hide();
                $('#verfyGroup').removeClass('has-error has-feedback');
                $('form[name=login]').submit(true);
            }else{
                $('#verfyError').show();
                $('#verfyGroup').addClass('has-error has-feedback');
                $('form[name=login]').submit(false);
            }
          });
        })
    })();
    </script>
  </body>
</html>