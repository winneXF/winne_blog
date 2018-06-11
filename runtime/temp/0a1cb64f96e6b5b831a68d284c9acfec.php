<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:97:"F:\website\php.travel.com\winne_blog\public/../application/index\view\tools_share\toolsShare.html";i:1525399206;s:85:"F:\website\php.travel.com\winne_blog\application\index\view\common\detail_header.html";i:1525316601;s:78:"F:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>winne工具分享</title>
  <meta name="keywords" content="winne博客,winne前端,工具分享" />
  <meta name="description" content="winne博客分享有用工具，提供绿色下载，包括前端、后台、办公等工具" />
  <!-- <link type="text/css" rel="stylesheet" href="./css/article.css"> -->
  <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/iconfont.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/header_footer.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/article.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/info_share.css">
</head>
<body data-spy="scroll" data-target=".navbar-article" style="position: relative;">
<!--手机端导航开始-->
    <div id="top_nav">
        <div class="top_navbtn" id="navHeight">            
            <div class="footerLines" id="navBtn">
                <span></span>
            </div>
        </div>
    </div>
    <!--菜单-->
    <div class="nav_menu" id="navMenu">
        <ul class="menu_lists">
            <li><a href="<?php echo url('index/index'); ?>" target="_self">首页</a><a href="<?php echo url('liveLearn/index',array('nav_id' => 1)); ?>" target="_self">学无止境</a></li>
            <li><a href="<?php echo url('lifeEmotion/index',array('nav_id' => 5)); ?>" target="_self">生活情感</a><a href="<?php echo url('message/index'); ?>" target="_self">给我留言</a></li>
            <li><a hhref="<?php echo url('aboutMe/index'); ?>" target="_self">关于自己</a><a href="javascript:;" target="_self">ajax</a></li>
        </ul>
    </div>
    <!--手机端导航结束-->
    <!-- pc端导航栏 -->
    <ul class="block-menu">
      <li>
        <a href="<?php echo url('index/index'); ?>" target="_self" class="three-d">
          首页
          <span class="three-d-box">
            <span class="front">首页</span>
            <span class="back">首页</span>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo url('liveLearn/index',array('nav_id' => 1)); ?>" target="_self" class="three-d">
          学无止境
          <span class="three-d-box">
            <span class="front">学无止境</span>
            <span class="back">学无止境</span>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo url('lifeEmotion/index',array('nav_id' => 5)); ?>" target="_self" class="three-d">
          生活情感
          <span class="three-d-box">
            <span class="front">生活情感</span>
            <span class="back">生活情感</span>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo url('message/index'); ?>" target="_self" class="three-d">
          给我留言
          <span class="three-d-box">
            <span class="front">给我留言</span>
            <span class="back">给我留言</span>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo url('aboutMe/index'); ?>" target="_self" class="three-d">
          关于自己
          <span class="three-d-box">
            <span class="front">关于自己</span>
            <span class="back">关于自己</span>
          </span>
        </a>
      </li>
      <li class="search-wrap">
        <form id="search-form" autocomplete="off" target="_self" method="get" action="<?php echo url('search/index'); ?>">   
            <a href="javascript:;" target="_blank" class="three-d search">
              <span>
              <input type="text" id="search-input" name="keywords" class="search-text" placeholder="搜索winne...">
              <i class="iconfont search-icon">&#xe634;</i>
              <input type="submit" value="搜索" id="search-submit" class="search-submit">
              <input type="hidden" id="login-user" value="" data-info="<?php echo \think\Request::instance()->session('userid'); ?>">
              </span>
            </a>                     
        </form>   
        
      </li>
    </ul>
    <!--PageBeginHtml Block End-->

    <!--头部done--> 
<div id="home" class="tools-main-wrap">
  
  <div id="main" class="main-content">
    <div id="mainContent" class="left-content">
        <div class="forFlow">
            
            <!-- 工具的主体内容信息 -->
            <div class="tools-detail">
              <article>
                <header class="article-header">
                    <h1 class="tools-name"><?php echo $tool_detail['name']; ?></h1>
                </header>
                <div class="software">
                    <div class="soft-img">
                       <img src="<?php if($tool_detail['pic'] != ''): ?>__IMG__<?php echo $tool_detail['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>">
                    </div>
                    
                      <div class="soft-mes">
                          <p>推荐指数：<i class="font-icon"></i>
                          <span ><?php echo $tool_detail['recommend_num']; ?>分</span></p>
                          <p >更新时间：<?php echo $tool_detail['create_time']; ?></p>
                          <p>软件大小：<?php echo $tool_detail['soft_size']; ?></p>
                          <p>下载次数：<span id="download_num"><?php echo $tool_detail['download_num']; ?></span>次</p>
                          <p>软件版本：<?php echo $tool_detail['version']; ?></p>
                          <div>
                              <a <?php if($tool_detail['download_url'] != ''): ?>target="_blank"<?php else: ?>target="_self"<?php endif; ?> href="<?php echo $tool_detail['download_url']; ?>" id="download-click" data-info="<?php echo $tool_detail['id']; ?>">
                              <?php if($tool_detail['download_url'] != ''): ?>点击下载<?php else: ?>暂无下载链接<?php endif; ?>
                              </a>
                          </div>
                      </div>
                     
                    <div class="recommand"></div>
                </div>
                <div class="content">
                    <span>软件简介</span>
                    <p>
                      <?php echo $tool_detail['soft_content']; ?>
                    </p>
                </div>
                <div class="content">
                    <span>安装说明</span>
                    <p>
                      <?php echo $tool_detail['soft_desc']; ?>
                    </p>
                </div>
                <p class="download-tips">下载说明：winne博客下载资源都是免费，所有资源都经过检测，绿色无毒，请放心下载！</p>
              </article>

            </div><!--end: tools-detail -->

         <!--  </div> -->

            <!-- 留言内容 -->
            <div class="comment-mes" id="comment-mes">
              <!-- <p class="mes-number">评论（<span>0</span>）</p>
              <textarea cols="20" rows="7" class="edit-mes">
                
              </textarea>
              <div class="send-mes">
                <span class="enter">Enter</span><span class="publish">发表评论</span>
              </div> -->
              <div class="comment-show">
                <!--PC和WAP自适应版畅言-->
                <div id="SOHUCS" ></div> 
                <script type="text/javascript"> 
                (function(){ 
                var appid = 'cytyoWIi2'; 
                var conf = 'prod_09532bf8da0a410cb4d433aded759b59'; 
                var width = window.innerWidth || document.documentElement.clientWidth; 
                if (width < 960) { 
                window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
              </div>
            </div>

        </div><!--end: forFlow -->
    </div><!--end: mainContent 主体内容容器-->
    <!-- 右侧文章导航 -->
    <div id="sideBar" class="right-content">
      <div class="other-tools clear">
        <!--  工具手册 start    -->
            <div id="tool-manual" class="right-bar">
                <h3>
                    <i class="iconfont">&#xe68c;</i>其他工具手册</h3>
                <div class="manual-content">
                    <ul>
                        <?php if(is_array($recommend_tools) || $recommend_tools instanceof \think\Collection || $recommend_tools instanceof \think\Paginator): $i = 0; $__LIST__ = $recommend_tools;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li><i class="iconfont">&#xe63d;</i><a href="<?php echo url('toolsShare/index',array('tool_id' => $item['id'])); ?>"><?php echo $item['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1TgPD06KAjfT5LR449TipBA" target="_blank">HTML参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1-kc5jS97ugdwMAlxhgqRPA" target="_blank">CSS参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1xFJjJSkEnHoBxleaeGHErA" target="_blank">Json参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1Pm5-ubeeLmGpW1MF76OZZg" target="_blank">JQuery参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1QVpCb_n_lVYBsEm94TOQEQ" target="_blank">JavaScript参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/16B8cC_NSlqrmF4csGOajmA" target="_blank">HTML5参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1ulbnZ5p2EqqIhFzrysX12Q" target="_blank">Ajax参考手册</a></li>
                         <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1Xif11jullGmtdH2ZYSixhw" target="_blank">Bootstrap3参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1oq8D5Jy8vK1caHh7KgwExQ" target="_blank">AngularJS参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1H7rL8ohW1tju6sPZZp7lwQ" target="_blank">Vue-router参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/16npQGiGx1J5V55bgKKyfGg" target="_blank">Vuex参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/126DctUoiyr_jrde9LHUrtg" target="_blank">SQL参考手册</a></li>
                    </ul>
                </div>
            </div>
            <!--  工具手册 end    -->
      </div>
      
    </div><!--end: main -->
    <div class="clear"></div>
  </div>    
</div><!--end: home 自定义的最大容器 -->
<!--PageEndHtml Block Begin-->
<div id="floor" style="display: none;">
    <!-- <a href="javascript:;"><img src="__PUBLIC__images/top.gif" alt=""></a> -->
</div>
<footer id="footer">
    <span>Design by Winne | <i class="iconfont">&#xe618;</i>粤ICP备17101710号-1</span>
</footer>
<!-- 回顶部效果 -->
<div id="back-to-top" style="display: none;position:fixed; right: 26px; bottom:60px; height: 50px;
    width: 50px;">
    <i class="iconfont" style="font-size: 45px; color: #ef92b0; cursor: pointer;">&#xe85d;</i>
</div> 
<!--  回顶部 start    -->
<!-- <div id="back-to-top" style="display: none; position:fixed; right: 26px; bottom:60px; height: 50px;
        width: 50px;">
        <i class="iconfont" style="font-size: 45px; color: #b99271; cursor: pointer;">&#xe85d;</i>
</div> -->
<!--  回顶部 end    -->
<!--PageEndHtml Block End-->
<script src="__PUBLIC__js/toTop.js"></script>
<script src="__PUBLIC__js/jquery.js"></script>
<script src="__PUBLIC__js/info_share.js"></script>
</body>
</html>