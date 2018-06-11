<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"F:\website\php.travel.com\winne_blog\public/../application/admin\view\login\login.html";i:1524810919;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>登录页面</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__PUBLIC__/style/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="__PUBLIC__/style/beyond.css" rel="stylesheet">
    <link href="__PUBLIC__/style/demo.css" rel="stylesheet">
    <link href="__PUBLIC__/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <!-- <form action="" method="post"> -->
            <div class="loginbox bg-white">
                <div class="loginbox-title">管理员登录</div>
                <div class="loginbox-textbox">
                    <input value="" id="admin-name" class="form-control" placeholder="请输入管理员账号" name="adminname" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" id="admin-password" placeholder="请输入管理员密码" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="验证码" name="code" style="margin-bottom:14px;width:80px;float:left;" type="text" id="code" >
                    <img id="login-code"  style="float:left; cursor:pointer;" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" />
                </div>
                <div class="loginbox-submit">
                    <!-- <input class="btn btn-primary btn-block" value="Login" type="submit"> -->
                    <input class="btn btn-primary btn-block" value="Login" type="button" id="login">
                </div>
            </div>
              
        <!-- </form> -->
    </div>
    <!--Basic Scripts-->
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/bootstrap.js"></script>
    <!-- <script src="__PUBLIC__/js/jquery_002.js"></script> -->
    <!--Beyond Scripts-->
    <script src="__PUBLIC__/js/beyond.js"></script>
    <script>
        var url = "__WEBURL__";
    </script>
    <script src="__PUBLIC__/js/data.js"></script>




</body><!--Body Ends--></html>