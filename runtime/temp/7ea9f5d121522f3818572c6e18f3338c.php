<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"E:\website\php.travel.com\winne_blog\public/../application/index\view\html_games\chess.html";i:1386128404;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>HTML5实现中国象棋游戏 - 站长素材</title>
<link href="css/zzsc.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="box" id="box">
	<div class="chess_left">
		<canvas id="chess">对不起，您的浏览器不支持HTML5，请升级浏览器至IE9、firefox或者谷歌浏览器！</canvas>
		<audio src="audio/click.wav" id="clickAudio" preload="auto"></audio>
		<!--<audio src="audio/check.wav" id="checkAudio" preload="auto"></audio>-->
		<audio src="audio/select.wav" id="selectAudio" preload="auto"></audio>
		<div>
			<div class="bn_box" id="bnBox">
				<input type="button" name="offensivePlay" id="tyroPlay" value="新手水平" />
				<input type="button" name="offensivePlay" id="superPlay" value="中级水平" />
                <input type="button" name="button" id="" value="大师水平" disabled />
				<!--
			<input type="button" name="offensivePlay" id="offensivePlay" value="先手开始" />
			<input type="button" name="defensivePlay" id="defensivePlay" value="后手开始" />
			-->
				<input type="button" name="regret" id="regretBn" value="悔棋" />
				<input type="button" name="billBn" id="billBn" value="棋谱" class="bn_box" />
				<input type="button" name="stypeBn" id="stypeBn" value="换肤" />
			</div>
		</div>
	</div>
	<div class="chess_right" id="chessRight">
		<select name="billList" id="billList">
		</select>
		<ol id="billBox" class="bill_box">
		</ol>
	</div>
	<div id="moveInfo" class="move_info"> </div>
</div>
<script src="js/common.js"></script> 
<script src="js/play.js"></script> 
<script src="js/AI.js"></script> 
<script src="js/bill.js"></script> 
<script src="js/gambit.js"></script>
<div style="text-align:center;clear:both">
<p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p>
<p>来源：<a href="http://sc.chinaz.com/" target="_blank">站长素材</a></p>
</div>
</body>
</html>