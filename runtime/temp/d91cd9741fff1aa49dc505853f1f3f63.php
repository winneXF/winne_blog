<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"E:\website\php.travel.com\winne_blog\public/../application/index\view\html_games\snake.html";i:1524551198;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML贪吃蛇小游戏</title>
	<link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
	<style type="text/css">
		* {
			margin: 0;
			border: 0;
			padding: 0;
		}

		body {
			display: flex;
			flex-flow: row;
			align-items: center;
			justify-content: center;
			width: 100vw;
			height: 100vh;
			background-color: #333;
		}
		#canvas {
			background-color: #000;
		}
	</style>
</head>
<body>
	<canvas id="canvas"></canvas>
	<script type="text/javascript" src="__PUBLIC__js/RetroSnaker.min.js"></script>
	<script type="text/javascript">
		Game.addons("Game-init", function(obj) {
			
		});
		Game.init("canvas", 1000, 600, "normal");
	</script>
	<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>
