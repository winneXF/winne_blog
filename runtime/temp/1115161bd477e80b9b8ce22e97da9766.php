<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"E:\website\php.travel.com\winne_blog\public/../application/index\view\html_games\guessing_cup.html";i:1524548798;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="robots" content="index,follow">
<meta name="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0;user-scalable=no;">
<meta name="keywords" content="html5游戏、游戏源码、html5游戏开发" />
<meta name="description" content="winne博客,winne,前端博客,个人前端知识分享。/>
<link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
<!-- <link rel="apple-touch-icon" sizes="114x114" href="http://www.monkeyblog.cn/wp-content/themes/begin/img/favicon.png"> -->
<title>html5猜杯子最强眼力小游戏</title>
<link href="__PUBLIC__css/cup.css" media="screen" rel="stylesheet" type="text/css">
<script>
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
    	WeixinJSBridge.call('showOptionMenu');
    });
	var moreGamesLocation = '';
	function play68_init() {		updateShare(0);}
	function updateShare(bestScore) {
		imgUrl = '__PUBLIC__images/cups.png';
		
		lineLink = 'index.htm'
		descContent = "考考你的眼力！你的眼睛跟得上吗？";
		updateShareScore(bestScore);appid = '';
	}	
	function updateShareScore(bestScore) {
		if(bestScore > 0) {shareTitle = "我玩《最强眼力》过了" + bestScore + "关，眼都花了！";}
		else{shareTitle = "不玩《最强眼力》怎么知道自己的眼力原来那么好？";}
	}
</script>
</head>
<body class="os-windows osv-6_1 osmv-6" onorientationchange="orentationChanged()">
<DIV class="main">
  <div id="frame">
    <div id="logo" style="display: none; opacity: 0;"></div>
    <div id="playButton" style="display: none; opacity: 1;"></div>
    <div id="level" style="display: none;"> <span id="levelLabel">关卡：</span> <span id="levelNum">1</span> </div>
    <div id="lives" style="display: none;">
      <div id="hearts">
        <div class="heart">&nbsp;</div>
        <div class="heart">&nbsp;</div>
        <div class="heart">&nbsp;</div>
      </div>
      <div id="livesLabel">命：</div>
    </div>
    <div id="b" style="display: block;">
      <div style="display: block;" id="b1"></div>
      <div style="display: block;" id="b2"></div>
      <div style="display: block;" id="b3"></div>
    </div>
    <canvas height="240" width="320" id="canvas" style="display: block;"></canvas>
    <div id="msg" style="position:relative;display: block; opacity: 1;bottom:50px;"></div>
  </div>
  <div  style="position:relative; display: block; margin: 0px auto;bottom:120px;z-index:20000"> 变态考反应游戏《密室逃脱》能通关你就能闪子弹了！</div>
  <script>
    var imgUrl = "__PUBLIC__";
  </script>
  <script type="text/javascript" src="__PUBLIC__js/cup.js"></script> 
</DIV>
</body>
</html>