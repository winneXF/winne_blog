<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"F:\website\php.travel.com\winne_blog\public/../application/index\view\live_learn\liveLearn.html";i:1525398947;s:83:"F:\website\php.travel.com\winne_blog\application\index\view\common\main_header.html";i:1525314103;s:78:"F:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>winne~~博客-学无止境</title>
    <meta name="keywords" content="winne博客,winne前端，前端资料,学无止境，HTML，JavaScript，css，css3，jQuery,webpack" />
    <meta name="description" content="学无静止篇是学习资料的记录，前端资料的分享，一刻不成停止的前端之路学习。" />
    <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/reset.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/liveLearn.css">
</head>
<body>
  
    <div class="body-top-wrapper">
    <div id="body-top">
        <div id="title">
        <h1>winne博客</h1>
        </div>
        <nav id="nav">
            <ul class="nav-menu clear">
                <li><i class="iconfont">&#xe600;</i><a class="nav-text" href="<?php echo url('index/index'); ?>">首页</a><span></span></li>
                <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                <li>
                  
                    <?php if($cate['id'] == 1): ?>
                    <a class="nav-text" href="<?php echo url('liveLearn/index',array('nav_id' => $cate['id'])); ?>"><?php echo $cate['nav_name']; ?></a>
                    <span></span>
                    <div class="nav-detail">
                        <?php foreach($cate['children'] as $k2=>$v2): ?>
                        <a href="<?php echo url('liveLearn/index',array('nav_id' => $v2['id'])); ?>"><?php echo $v2['nav_name']; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php elseif($cate['id'] == 5): ?>
                    <a class="nav-text" href="<?php echo url('lifeEmotion/index',array('nav_id' => $cate['id'])); ?>"><?php echo $cate['nav_name']; ?></a>
                    <span></span>
                    <div class="nav-detail">
                        <?php foreach($cate['children'] as $k2=>$v2): ?>
                        <a href="<?php echo url('lifeEmotion/index',array('nav_id' => $v2['id'])); ?>"><?php echo $v2['nav_name']; ?></a>
                        <?php endforeach; ?>
                    </div>                    
                    <?php endif; ?>

                    
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- <li>
                    <a class="nav-text" href="lifeEmotion.html">生活情感</a>
                    <span></span>
                    <div class="nav-detail">
                        <a href="">大学生活</a>
                        <a href="">个人情感</a>
                    </div>
                </li> -->

                <li><a class="nav-text" href="<?php echo url('message/index'); ?>">给我留言</a><span></span></li>
                <li><a class="nav-text" href="<?php echo url('aboutMe/index'); ?>">关于自己</a><span></span></li>
            </ul>
        </nav>
        
        <?php if(\think\Request::instance()->session('username') == ''): ?>
        <div class="message">
        <a href="<?php echo url('register/index'); ?>" target="_blank"><span><i class="iconfont">&#xe604;</i>注册</span></a>
        <a href="<?php echo url('login/index'); ?>" target="_blank"><span><i class="iconfont">&#xe65c;</i>登录</span></a>
        </div>
       <?php endif; if(\think\Request::instance()->session('username') != ''): ?>
       <div class="user-login">
           <div class="user" href="javascript:;">欢迎：<span id="login-user" data-info="<?php echo \think\Request::instance()->session('userid'); ?>" data-state="<?php echo \think\Request::instance()->session('state'); ?>"><?php echo \think\Request::instance()->session('username'); ?></span>
           <ul class="more-me">
               <li class="favorite"><a href="<?php echo url('favorite/index'); ?>">我的收藏夹</a></li>
           </ul>
           </div> 
           <a class="logout" id="logout" >退出登录</a> 
       </div>            
       <?php endif; ?>
        
    </div>
</div> 
    <div class="body-content-wrapper clear">
    <!-- 中间主题文章 -->
        <div id="main-left" class="clear">
            <?php if(is_array($learnArticles) || $learnArticles instanceof \think\Collection || $learnArticles instanceof \think\Paginator): $i = 0; $__LIST__ = $learnArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articleItem): $mod = ($i % 2 );++$i;?>
            <article class="article">
                <div class="article-top">
                    <?php if($articleItem['keywords'] != ''): ?>
                    <span><i class="triangle"></i><?php echo $articleItem['keywords']; ?></span>
                    <?php endif; ?>
                    <h2><a href="<?php echo url('article/index',array('article_id' => $articleItem['id'])); ?>"><?php echo $articleItem['title']; ?></a>
                    </h2>
                </div>
                <div class="article-content">
                    <a href=""><img src="<?php if($articleItem['pic'] != ''): ?>__IMG__<?php echo $articleItem['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" alt="<?php echo $articleItem['title']; ?>" /></a>
                    <p>
                    <?php echo $articleItem['descript']; ?>
                    </p>
                </div>
                <div class="article-bottom">
                <span><i class="iconfont">&#xe665;</i><?php echo $articleItem['article_time']; ?></span>
                <span><i class="iconfont">&#xe695;</i><?php echo $articleItem['click']; ?>浏览</span>
                </div>
            </article>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          
            <div class="pages">
                <?php echo $learnArticles->render(); ?>
            </div>
            </div>
            
        <div id="main-right">
            <div>
                <span></span>
                <p>
                    微笑拥抱每一天，做像向日葵般温暖的孩子。
                </p>
                <p>
                    美丽属于自信者，从容属于有备者，奇迹属于执着者，成功属于顽强者。
                </p>
            </div>
            <div class="artical_rec">
                <h3>
                    <i class="iconfont">&#xe610;</i>特别推荐</h3>
                <ul>
                    <?php if(is_array($recommend_articles) || $recommend_articles instanceof \think\Collection || $recommend_articles instanceof \think\Paginator): $i = 0; $__LIST__ = $recommend_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <li><i class="iconfont">&#xe606;</i><a href="<?php echo url('article/index',array('article_id' => $item['id'])); ?>"><?php echo $item['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                   
                </ul>
            </div>
        </div>
    </div>
    <footer id="footer">
    <span>Design by Winne | <i class="iconfont">&#xe618;</i>粤ICP备17101710号-1</span>
</footer>
<!-- 回顶部效果 -->
<div id="back-to-top" style="display: none;position:fixed; right: 26px; bottom:60px; height: 50px;
    width: 50px;">
    <i class="iconfont" style="font-size: 45px; color: #ef92b0; cursor: pointer;">&#xe85d;</i>
</div> 
    <script src="__PUBLIC__js/jquery.js"></script>
    <script src="__PUBLIC__js/toTop.js"></script>
    <script src="__PUBLIC__js/liveLearn.js"></script>
</body>
</html>
