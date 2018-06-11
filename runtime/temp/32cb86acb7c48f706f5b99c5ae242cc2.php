<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"E:\website\php.travel.com\winne_blog\public/../application/index\view\favorite\favorite.html";i:1526279710;s:85:"E:\website\php.travel.com\winne_blog\application\index\view\common\detail_header.html";i:1525316601;s:78:"E:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>搜索页面</title>
  <meta name="keywords" content="winne博客,winne前端,收藏夹" />
  <meta name="description" content="winne博客的收藏夹" />
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
         
            <!-- 搜索主体内容信息 -->
          <p class="search-keywords" style="color:#AA7A53;font-weight: bold;">您的收藏夹：</p>
          <div class="search-content">
          <?php if($favoriteC != 0): foreach($favoriteres as $item): ?>
            <article class="article clear">
                <div class="article-top">
                    <h2><a href="<?php echo url('article/index',array('article_id' => $item['aid'])); ?>"><?php echo $item['title']; ?></a>
                    </h2>
                </div>
                <div class="article-content clear">
                    <a href=""><img src="<?php if($item['pic'] != ''): ?>__IMG__<?php echo $item['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" alt="<?php echo $item['title']; ?>" /></a>
                    <p>
                    <?php echo $item['descript']; ?>
                    </p>
                </div>
                <div class="article-bottom">
                  <ul class="mes clear">
                    <li><i class="iconfont">&#xe665;</i><?php echo $item['article_time']; ?></li>
                    <li><i class="iconfont">&#xe695;</i><?php echo $item['click']; ?>浏览</li>
                  </ul>
                  <!-- <span></span>
                  <span></span>
                  <span></span> -->
                </div>
            </article>
              <?php endforeach; ?>
            <div class="pages">
              <?php echo $favoriteres->render(); ?>
            </div>
          <?php else: ?>          
            <div class="none-article">收藏夹暂无内容，赶紧去收藏吧~</div>
       
           <?php endif; ?>
          </div>
          


        </div><!--end: forFlow -->
    </div><!--end: mainContent 主体内容容器-->
    <!-- 右侧文章导航 -->
    <div id="sideBar" class="right-content">
      <div id="tool-manual" class="right-bar">
          <h3>
              <i class="iconfont">&#xe629;</i>热门推荐</h3>
          <div class="manual-content">
              <ul>
                  <?php if(is_array($recommend_articles) || $recommend_articles instanceof \think\Collection || $recommend_articles instanceof \think\Paginator): $i = 0; $__LIST__ = $recommend_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                  <li><i class="iconfont">&#xe63d;</i><a href="<?php echo url('article/index',array('article_id' => $item['id'])); ?>"><?php echo $item['title']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                  
              </ul>
          </div>
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
<script src="__PUBLIC__js/toTop.js"></script>
<script src="__PUBLIC__js/jquery.js"></script>
<script src="__PUBLIC__js/info_share.js"></script>
</body>
</html>