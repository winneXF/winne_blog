<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"E:\website\php.travel.com\winne_blog\public/../application/index\view\register\register.html";i:1526439059;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>winne欢迎你~</title>
  <link href="ico/ico.ico" rel="Shortcut Icon" />
  <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/resetIconfont.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/register.css">
</head>
<body>
	<div class="wrapper">
 
		<div class="header-info">
			<p>欢迎注册为winne博客用户~~</p>
		</div>
        <div id="reg-detail">
        	<form>
              <div>
                <label for="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:</label><input autofocus id="username" type="text"><b style="color:red;">*</b>
                <p><i class="iconfont icon-tishi"></i>用户名可以由中文、字母、数字、_和.组成 </p>
              </div>
        	      <span>0个字符</span>                
                <div>
                  <label for="psw">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label><input type="password"  id="psw"><b style="color:red;">*</b>
                  <p><i class="iconfont icon-tishi"></i>6-20位字符。由字母、数字和_组成。</p>
                </div>                
                <div class="intensity">
                    <em class="active">弱</em><em>中</em><em>强</em>
                </div>
                <div>
                  <label for="re-psw">确认密码:</label><input type="password"  id="re-psw" disabled=""><b style="color:red;">*</b>
                  <p style="display: none"><i class="iconfont icon-tishi"></i></i>请再次输入密码</p> 
                </div>
                
                
                <div>
                  <label for="email">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:</label><input type="text"  id="email">
                  <p><i class="iconfont icon-tishi"></i>请正确输入邮箱</p>
                </div>
                
                
                <div>
                  <label for="phone">手机号:</label><input type="text"  id="phone">
                  <p><i class="iconfont icon-tishi"></i>请正确输入手机号</p>
                </div>                
                
                <div class="register-textbox clear">
                    
                    <img class="register-code" id="register-code" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" />
                    <input class="register-text" placeholder="验证码" name="code"  type="text" id="code" ><b style="margin-left: 6px;line-height: 32px;color: red;">*</b>
                </div>
                <input type="button" id="register" value="立即注册">

        	</form>


        </div>

	</div>
 <script src="__PUBLIC__js/jquery.js"></script>
 <script src="__PUBLIC__js/register.js"></script>
</body>
</html>