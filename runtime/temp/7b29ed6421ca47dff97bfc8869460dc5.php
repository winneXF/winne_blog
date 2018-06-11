<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"F:\website\php.travel.com\winne_blog\public/../application/index\view\article\article.html";i:1525328853;s:85:"F:\website\php.travel.com\winne_blog\application\index\view\common\detail_header.html";i:1525316601;s:78:"F:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>winne博客~文章</title>
  <meta name="keywords" content="winne博客,winne前端,博客,前端,前端资料,winne,前端开发,学习" />
  <meta name="description" content="winne博客是一个前端资料分享博客，前端学习资料的记录，前端资料的分享，前端技术交流，个人情感生活及个人资料的分享之站。前端的学习休闲站。" />
  <!-- <link type="text/css" rel="stylesheet" href="./css/article.css"> -->
  <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/atelier-plateau-light.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/iconfont.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/header_footer.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/article.css">
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
<div id="home" class="article-main-wrap">
  
  <div id="main" class="main-content">
    <div id="mainContent" class="left-content">
        <div class="forFlow">
            <h1 class="article-title"><a id="<?php echo $article_detail['title_anchor_id']; ?>"><?php echo $article_detail['title']; ?></a></h1>
            <p class="article-tips">
              <i class="iconfont">&#xe64e;</i><span style="margin-right: 20px;">发表于：<?php echo $article_detail['article_time']; ?></span>              
              <i class="iconfont">&#xe61d;</i><span>浏览：<?php echo $article_detail['click']; ?></span> 
              <span class='favorite <?php if(($favorite['favoriteN'] == 1) AND (\think\Request::instance()->session('userid') == $favorite['uid'])): ?>active<?php endif; ?>' id="favorite" data-info="<?php echo $article_detail['id']; ?>"><i data-info="<?php echo \think\Request::instance()->session('userid'); ?>" data-uid="<?php echo $favorite['uid']; ?>" class="iconfont">&#xe618;</i>收藏</span>            
            </p>
            <!-- 文章的主体内容信息 -->
            <div class="article-detail">
              
              <?php echo $article_detail['content']; ?>
            </div>
            <!--end: article-detail -->

         <!--  </div> -->
            


            <!-- 留言内容 -->
            <div class="comment-mes" id="comment-mes">
             
              <div class="comment-show">
                <!--PC和WAP自适应版-->
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
      <div class="article-target navbar-article">
        <span class="line-hr"></span>
        <span style="color:#965c2b;"><i class="iconfont">&#xe640;</i>文章导航：</span>
        <ul class="article-index nav nav-tabs">
          <li><a href="#<?php echo $article_detail['title_anchor_id']; ?>" title="<?php echo $article_detail['title']; ?>"><?php echo $article_detail['title']; ?></a></li>
          <?php foreach($anchor as $item): ?>
          <li><a href="#<?php echo $item['id']; ?>" title="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></a></li>
          <?php endforeach; ?>
          <!-- <li><a href="#web3" title="平台的差异导致的问题">平台的差异导致的问题</a></li>
          <li><a href="#web4" title="导致的问题">导致的问题</a></li> -->
        </ul>
      </div>
      
    </div><!--end: main -->
    <div class="clear"></div>
  </div>    
</div><!--end: home 自定义的最大容器 -->
<!--PageEndHtml Block Begin-->
<div id="floor" style="display: none;">
    <!-- <a href="javascript:;"><img src="./images/top.gif" alt=""></a> -->
</div>
<footer id="footer">
    <span>Design by Winne | <i class="iconfont">&#xe618;</i>粤ICP备17101710号-1</span>
</footer>
<!-- 回顶部效果 -->
<div id="back-to-top" style="display: none;position:fixed; right: 26px; bottom:60px; height: 50px;
    width: 50px;">
    <i class="iconfont" style="font-size: 45px; color: #ef92b0; cursor: pointer;">&#xe85d;</i>
</div> 

<!--PageEndHtml Block End-->
<!-- <script src="./js/article.js"></script> -->
<script src="__PUBLIC__js/jquery.js"></script>
<script src="__PUBLIC__js/toTop.js"></script>
<script src="__PUBLIC__js/bootstrap.js"></script>
<script src="__PUBLIC__js/article.js"></script>
<script src="__PUBLIC__js/info_share.js"></script>
<script src="__PUBLIC__js/highlight.pack.js"></script>
<script>
  hljs.initHighlightingOnLoad();
</script>
</body>
</html>