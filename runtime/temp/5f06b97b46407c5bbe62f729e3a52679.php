<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"F:\website\php.travel.com\winne_blog\public/../application/index\view\login\login.html";i:1525399236;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>winne欢迎你~</title>
  <link href="ico/ico.ico" rel="Shortcut Icon" />
  <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/iconfont.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/register.css">
</head>
<body>
	<div class="wrapper">
		<div class="header-info">
			<p>winne~~邀您登录</p>
		</div>
        <div id="reg-detail">
        	<form>
              <div>
                <label for="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:</label><input id="username" type="text"><b style="color:red;">*</b>
                <p><i class="iconfont icon-tishi"></i>用户名由中文、字母、数字、_和.组成 </p>
              </div>
                <div>
                  <label for="psw">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label><input type="password"  id="psw"><b style="color:red;">*</b>
                  <p><i class="iconfont icon-tishi"></i>6-20位字符。由字母、数字和_组成。</p>
                </div> 
                <!-- <div>
                  <label for="re-psw">确认密码:</label><input type="password"  id="re-psw" ><b style="color:red;">*</b>
                  <p><i class="iconfont icon-tishi"></i>请再次输入密码</p> 
                </div> -->
                
                <div class="login-textbox clear">                    
                    <img class="login-code" id="login-code"  src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" />
                    <input class="login-text" placeholder="验证码" name="code"  type="text" id="code" ><b style="margin-left: 6px;line-height: 32px;color: red;">*</b>
                </div>
                <input type="button" id="login" value="立即登录">

        	</form>


        </div>

	</div>
 <script src="__PUBLIC__js/jquery.js"></script>
 <script>
    var indexUrl = "__WEBURL__";
</script>
 <script src="__PUBLIC__js/login.js"></script>
</body>
</html>