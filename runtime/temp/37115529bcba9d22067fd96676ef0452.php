<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"E:\website\php.travel.com\winne_blog\public/../application/index\view\html_games\pcman.html";i:1524549882;}*/ ?>
﻿<html>
<head>
<meta charset="utf8">
<title>html5 canvas吃豆人游戏</title>
<link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
<style>
	body{background-color: #292929}
	*{padding:0;margin:0;}
	.wrapper{
		width: 960px;
		margin:0 auto;
		line-height:36px;
		text-align:center;
		color:#999;
	}
	canvas{display:block;background: #000;}
	.mod-botton{
		height: 32px;
		padding: 15px 0;
		text-align: center;
	}
</style>

</head>
<body>

<div class="wrapper">
	<canvas id="canvas" width="960" height="640">不支持画布</canvas>
	<p>按［空格］暂停或继续</p>		
</div>

<script src="__PUBLIC__js/pcman2.js"></script>
<script src="__PUBLIC__js/pcman1.js"></script>

</body>
</html>

