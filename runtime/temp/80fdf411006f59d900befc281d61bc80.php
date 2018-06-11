<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"E:\website\php.travel.com\winne_blog\public/../application/index\view\book_share\bookShare.html";i:1526279644;s:85:"E:\website\php.travel.com\winne_blog\application\index\view\common\detail_header.html";i:1525316601;s:78:"E:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>书籍分享</title>
  <meta name="keywords" content="winne博客,winne前端,推荐书籍" />
  <meta name="description" content="winne博客的书籍分享，分享精品书籍，收益书籍" />
  <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
  <link rel="stylesheet" type="text/css" href="__PUBLIC__css/mainCommon.css">
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
                    <h1 class="tools-name"><?php echo $book_detail['bookname']; ?></h1>
                </header>
                <div class="software">
                    <div class="soft-img">
                       <img src="<?php if($book_detail['pic'] != ''): ?>__IMG__<?php echo $book_detail['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" alt="">
                    </div>
                    
                      <div class="soft-mes">
                          <p>推荐指数：<i class="font-icon"></i>
                          <span ><?php echo $book_detail['recommend_num']; ?>分</span></p>
                          <p >推荐时间：<?php echo $book_detail['book_time']; ?></p>
                          <p>出版年月：<?php echo $book_detail['publish_time']; ?></p>
                          <p>推荐栏目：
                         
                          <?php if($book_detail['book_type'] == 1): ?>
                          HTML/CSS书籍推荐
                          <?php elseif($book_detail['book_type'] == 2): ?>
                          javascript书籍推荐
                          <?php elseif($book_detail['book_type'] == 3): ?>
                          休闲书籍
                          <?php endif; ?>

                          </p>
                          <p>作者：<?php echo $book_detail['author']; ?></p>
                          <p>页数：<?php echo $book_detail['page_num']; ?></p>
                          <!-- <div>
                              <a href="#">点击下载</a>
                          </div> -->
                      </div>
                     
                    <div class="recommand"></div>
                </div>
                <div class="content">
                    <span>内容简介</span>
                    <p>
                      <?php echo $book_detail['content']; ?>
                    </p>
                </div>
                <div class="content">
                    <span>推荐说明</span>
                    <p>
                       <?php echo $book_detail['recommend_desc']; ?>
                    </p>
                    <!-- <p>软件已经是破解版，安装即可使用。</p> -->
                </div>
              </article>

            </div><!--end: tools-detail -->

         <!--  </div> -->

            <!-- 留言内容 -->
            <div class="comment-mes" id="comment-mes">
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
                    <i class="iconfont">&#xe642;</i>其他书籍推荐</h3>
                <div class="manual-content">
                    <ul>
                       <?php if(is_array($recommend_books) || $recommend_books instanceof \think\Collection || $recommend_books instanceof \think\Paginator): $i = 0; $__LIST__ = $recommend_books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li><i class="iconfont">&#xe63d;</i><a href="<?php echo url('bookShare/index',array('book_id' => $item['id'])); ?>" title="<?php echo $item['bookname']; ?>"><?php echo $item['bookname']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
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

<!--PageEndHtml Block End-->
<script src="__PUBLIC__js/toTop.js"></script>
<script src="__PUBLIC__js/jquery.js"></script>
<script src="__PUBLIC__js/info_share.js"></script>
</body>
</html>