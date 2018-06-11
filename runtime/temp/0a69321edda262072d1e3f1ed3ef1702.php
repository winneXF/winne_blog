<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"E:\website\php.travel.com\winne_blog\public/../application/index\view\index\index.html";i:1526608414;s:83:"E:\website\php.travel.com\winne_blog\application\index\view\common\main_header.html";i:1525314103;s:78:"E:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>winne博客~首页</title>
    <meta name="keywords" content="winne博客,winne前端,winne,前端博客,前端,前端资料,前端开发,学习" />
    <meta name="description" content="winne博客是一个前端资料分享博客，HTML资料，CSS资料，JavaScript资料，前端学习资料的记录，前端资料的分享，前端技术交流，个人情感生活及个人资料的分享之站。前端的学习休闲站。" />
    <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/mainCommon.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/index.css">
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
    <div class="main-wrapper clear">
        <div class="info">
            <p>
                您现在所在的位置：winne博客 >> <span>首页</span>
            </p>
            <div id="search">
               <input type="text" placeholder="百度一下，你就知道"/>
               <div class="btn"><a target="_blank" href="https://www.baidu.com" rel="nofollow">百度搜索</a></div>
                <ul>
                </ul>
            </div>
        </div> 
        <div class="main-left clear">
        <!--  精彩推荐 3D旋转 start    -->
            <div class="hot-news clear">
                <div class="hot-news-top">
                    <span>RECOMMEND</span> <span>精彩推荐</span>
                </div>
                <div class="hot-change clear">
                    <div class="side-img">
                        <?php foreach($recommend_article_tag as $item): ?>
                        <a href="<?php echo url('article/index',array('article_id' => $item['aid'])); ?>"><img class="active" data-src="<?php if($item['pic'] != ''): ?>__IMG__<?php echo $item['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" src="__PUBLIC__images/lazy.png" alt="<?php echo $item['title']; ?>" title="<?php echo $item['title']; ?>" /></a>
                        <?php endforeach; ?>
                       
                    </div>
                    <div class="box">
                        <div class="side-img-show">
                            <?php foreach($recommend_article_tag as $item): ?>
                            <a class="img-rote" href="<?php echo url('article/index',array('article_id' => $item['aid'])); ?>">
                                <img data-src="<?php if($item['pic'] != ''): ?>__IMG__<?php echo $item['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" alt="<?php echo $item['title']; ?>" src="__PUBLIC__images/lazy.png" title="<?php echo $item['title']; ?>" />
                            </a>                            
                            <?php endforeach; ?>
                         
                        </div>
                    </div>
                </div>
            </div>
            <!--  精彩推荐 3D旋转 end    -->
            <!--  各类工具推荐 start    -->
            <div id="tool">
                <h3>
                    <i class="iconfont">&#xe68c;</i>工具分享</h3>
                <ul class="tool-nav">
                    <!-- <li class="active"><span>前端代码编辑</span></li> -->
                    <?php foreach($toolTabName as $item): ?>
                    <li class="<?php if($item['id'] == 1): ?>active<?php endif; ?>"><span><?php echo $item['tabname']; ?></span></li>
                    <?php endforeach; ?>
                   
                </ul>
                <div class="tool-content">
                    <?php if(is_array($toolsCon) || $toolsCon instanceof \think\Collection || $toolsCon instanceof \think\Paginator): $i = 0; $__LIST__ = $toolsCon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div <?php if($item['id'] == 1): ?>style="display:block;"<?php endif; ?>>
                        <ul class="tools-software1 clear">
                            <?php foreach($item['children'] as $k2=>$v2): ?>
                            <li>
                                <a href="<?php echo url('ToolsShare/index',array('tool_id' => $v2['id'])); ?>">
                                    <div class="tools_pic" style='background: url("<?php if($v2['bg_url'] != ''): ?>__IMG__<?php echo $v2['bg_url']; endif; ?>") 0 -<?php echo $k2*60; ?>px no-repeat;'>
                                   
                                    </div>
                                    <span><?php echo $v2['name']; ?></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                           
                        </ul>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
            <!--  各类工具推荐 end    -->
            <!--  热门文章 start    -->
            <div id="hot-article">
                <h3>
                    <i class="iconfont">&#xe629;</i>热门文章</h3>
                <ul>
                    <?php if(is_array($hot_articles) || $hot_articles instanceof \think\Collection || $hot_articles instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <li><i class="iconfont" style="color: #f61213;">&#xe622;</i><span>
                    <a data-hover="<?php echo $item['title']; ?>"
                        href="<?php echo url('article/index',array('article_id' => $item['id'])); ?>"><?php echo $item['title']; ?></a></span><span><i class="iconfont">&#xe618;</i><?php echo $item['click']; ?>浏览</span>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
            </div>
            <!--  热门文章 end    -->
            <!--  HTML/CSS书籍推荐 start    -->
            <div id="basic-book">
                <h3>
                    <i class="iconfont">&#xe778;</i>HTML/CSS书籍推荐</h3>
                <p class="change-other">
                    <a href="javascript:;" id="html-css-refresh"><i class="iconfont">&#xe769;</i>换一批</a>
                </p>
                <div class="html-css-list">
                    <?php if(is_array($html_css) || $html_css instanceof \think\Collection || $html_css instanceof \think\Paginator): $i = 0; $__LIST__ = $html_css;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div class="book1">
                        <img data-src="<?php if($item['pic'] != ''): ?>__IMG__<?php echo $item['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" alt="<?php echo $item['bookname']; ?>" src="__PUBLIC__images/lazy.png" title="<?php echo $item['bookname']; ?>" />
                        <p>
                            <a class="bookname" href="<?php echo url('BookShare/index',array('book_id' => $item['id'])); ?>" title="<?php echo $item['bookname']; ?>"><?php echo $item['bookname']; ?> </a><span><?php echo $item['recommend_show_desc']; ?></span>
                        </p>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                
               
            </div>
            <!--  HTML/CSS书籍推荐 end    -->
            <!--  js书籍推荐 start    -->
            <div id="js-book">
                <h3>
                    <i class="iconfont">&#xe602;</i>javascript书籍推荐
                    
                </h3>
                <p class="change-other">
                    <a href="javascript:;" id="js-refresh"><i class="iconfont">&#xe769;</i>换一批</a>
                </p>
                <div class="js-content">
                    <?php if(is_array($javascript) || $javascript instanceof \think\Collection || $javascript instanceof \think\Paginator): $i = 0; $__LIST__ = $javascript;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div>
                        <figure>
                           <div class="light"></div>
                           <img data-src="<?php if($item['pic'] != ''): ?>__IMG__<?php echo $item['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" src="__PUBLIC__images/lazy.png" alt="<?php echo $item['bookname']; ?>" />
                           
                           <figcaption><a href="<?php echo url('BookShare/index',array('book_id' => $item['id'])); ?>"><?php echo $item['bookname']; ?></a></figcaption>
                        </figure>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                   
                </div>
            </div>
           <!--  js书籍推荐 end    --> 
        </div>
        <div class="main-right clear">
        <!--  扫一扫 start    -->
            <div class="friends">
                <p>
                    <i class="iconfont">&#xe64a;</i>扫一扫~~你就知道</p>
                <ul>
                    <li class="active">wechat 微信</li>
                    <li>QQ </li>
                </ul>
                <div class="chat-methods">
                    <img data-src="__PUBLIC__images/WeChat.png" src="__PUBLIC__images/lazy.png" alt="wechat" />
                    <img style="display: none;" data-src="__PUBLIC__images/qq.png" src="__PUBLIC__images/lazy.png" alt="QQ" />
                </div>
            </div>
            <!--  扫一扫 end    -->
            <!--  工具手册 start    -->
            <div id="tool-manual">
                <h3>
                    <i class="iconfont">&#xe698;</i>工具手册</h3>
                <div class="manual-content">
                    <ul>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1TgPD06KAjfT5LR449TipBA" target="_blank">HTML参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1-kc5jS97ugdwMAlxhgqRPA" target="_blank">CSS参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1xFJjJSkEnHoBxleaeGHErA" target="_blank">Json参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1Pm5-ubeeLmGpW1MF76OZZg" target="_blank">JQuery参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1QVpCb_n_lVYBsEm94TOQEQ" target="_blank">JavaScript参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/16B8cC_NSlqrmF4csGOajmA" target="_blank">HTML5参考手册</a></li>
                        <li><i class="iconfont">&#xe63d;</i><a href="https://pan.baidu.com/s/1ulbnZ5p2EqqIhFzrysX12Q" target="_blank">Ajax参考手册</a></li>
                        
                    </ul>
                </div>
            </div>
            <!--  工具手册 end    -->
            <!-- 标签 start -->
            <div id="label">
                <h3>
                    <i class="iconfont">&#xe60e;</i>标签</h3>
                <div class="label-content">
                    <?php if(is_array($tag_keyword) || $tag_keyword instanceof \think\Collection || $tag_keyword instanceof \think\Paginator): $k = 0; $__LIST__ = $tag_keyword;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?>
                    <a href="<?php echo url('search/index',array('keywords' => $item)); ?>" class="a-link-<?php echo $k; ?>"><?php echo $item; ?></a> 
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  
                </div>
            </div>
            <!-- 标签 end -->
            <!--  时钟 start    -->
            <time id="time">
                <p>
                    <i class="iconfont">&#xe681;</i>
                </p>
                <div class="clock">
                    <ul>
                    </ul>
                    <div class="hour">
                        <em></em>
                    </div>
                    <div class="min">
                    </div>
                    <div class="sec">
                    </div>
                    <span></span>

                </div>
              
                <div class="clock-ie"></div>
            </time>
            <!--  时钟 end    -->
            <!--  友链 start    -->
            <div id="friend-link">
                <h3>
                    <i class="iconfont">&#xe601;</i>友情链接</h3>
                <ul class="clear">
                    <?php if(is_array($friend_link) || $friend_link instanceof \think\Collection || $friend_link instanceof \think\Paginator): $i = 0; $__LIST__ = $friend_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <li><i class="iconfont">&#xe607;</i><a target="_blank" href="<?php echo $item['url']; ?>" rel="nofollow"><?php echo $item['link_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
            <!--  友链 end    -->
        </div>
        <!--  电影欣赏 start    -->
        <div id="movie">
            <h3>
                <i class="iconfont">&#xe70e;</i>电影欣赏</h3>
            <div class="movie-show clear">
                <h4><a href="<?php echo url('MovieShare/index',array('movie_id' => $movie_top_show['id'])); ?>"><?php echo $movie_top_show['title']; ?></a></h4>
                <img data-src="<?php if($movie_top_show['pic'] != ''): ?>__IMG__<?php echo $movie_top_show['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" alt="<?php echo $movie_top_show['title']; ?>" src="__PUBLIC__images/lazy.png" title="<?php echo $movie_top_show['title']; ?>" />
                <p>
                <?php echo $movie_top_show['top_desc']; ?>
                </p>
            </div>
            <ul class="movie-list">
                <?php if(is_array($movie_share) || $movie_share instanceof \think\Collection || $movie_share instanceof \think\Paginator): $i = 0; $__LIST__ = $movie_share;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li><i class="iconfont">&#xe680;</i><a href="<?php echo url('MovieShare/index',array('movie_id' => $item['id'])); ?>"><?php echo $item['title']; ?></a><span><?php echo $item['create_time']; ?></span></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
               
            </ul>
            <p class="change-other">
                <a href="javascript:;" id="movie-refresh"><i class="iconfont">&#xe769;</i>换一批</a> 
                
            </p>
        </div>
        <!--  电影欣赏 end    -->
        <!--  休闲书籍 start    -->
        <div id="like-books">      
            <h3>
                <i class="iconfont">&#xe642;</i>休闲书籍</h3>
            <div class="movie-show clear">
                <h4><a href="<?php echo url('BookShare/index',array('book_id' => $book_top_show['id'])); ?>"><?php echo $book_top_show['bookname']; ?></a></h4>
                <img data-src="<?php if($book_top_show['pic'] != ''): ?>__IMG__<?php echo $book_top_show['pic']; else: ?>__PUBLIC__images/error.png<?php endif; ?>" src="__PUBLIC__images/lazy.png" alt="<?php echo $book_top_show['bookname']; ?>" title="<?php echo $book_top_show['bookname']; ?>" />
                <p>
                <?php echo $book_top_show['top_desc']; ?>
                </p>
            </div>
            <ul class="rest-book-list">
                <?php if(is_array($rest_book) || $rest_book instanceof \think\Collection || $rest_book instanceof \think\Paginator): $i = 0; $__LIST__ = $rest_book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li><i class="iconfont">&#xe680;</i><a href="<?php echo url('BookShare/index',array('book_id' => $item['id'])); ?>"><?php echo $item['bookname']; ?></a><span><?php echo $item['book_time']; ?></span></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
               
            </ul>
            <p class="change-other">
                 <a href="javascript:;" id="rest-book-refresh"><i class="iconfont">&#xe769;</i>换一批</a> 
            </p>
        </div> 
        <!--  休闲书籍 end    --> 
        <!--  HTML5游戏 start    -->
        <div id="HTML5-games">
            <ul class="clear">
                <li>
                    <figure>
        <img data-src="__PUBLIC__images/game1.png" alt="HTML5版切水果游戏" />
        <figcaption><a href="<?php echo url('HtmlGames/fruit_cut'); ?>" src="__PUBLIC__images/lazy.png" target="_blank" rel="nofollow">HTML5版切水果游戏</a></figcaption>
        </figure>
                </li>
                <li>
                    <figure>
        <img data-src="__PUBLIC__images/game2.png" src="__PUBLIC__images/lazy.png" alt="HTML5猜杯子小游戏" />
        <figcaption><a href="<?php echo url('HtmlGames/guessing_cup'); ?>" target="_blank" rel="nofollow">HTML5猜杯子小游戏</a></figcaption>
        </figure>
                </li>
                <li>
                    <figure>
        <img data-src="__PUBLIC__images/game3.png" src="__PUBLIC__images/lazy.png" alt="HTML5五子棋游戏" />
        <figcaption><a href="<?php echo url('HtmlGames/gobang'); ?>" target="_blank" rel="nofollow">HTML5五子棋游戏</a></figcaption>
        </figure>
                </li>
                <li>
                    <figure>
        <img data-src="__PUBLIC__images/game4.png" src="__PUBLIC__images/lazy.png" alt="HTML5小人推箱子小游戏" />
        <figcaption><a href="<?php echo url('HtmlGames/snake'); ?>" target="_blank" rel="nofollow">HTML5贪吃蛇小游戏</a></figcaption>
        </figure>
                </li>
                <li>
                    <figure>
        <img data-src="__PUBLIC__images/game5.png" alt="HTML5吃豆人游戏" src="__PUBLIC__images/lazy.png"/>
        <figcaption><a href="<?php echo url('HtmlGames/pcman'); ?>" target="_blank" rel="nofollow">HTML5吃豆人游戏</a></figcaption>
        </figure>
                </li>
                <li>
                    <figure>
        <img data-src="__PUBLIC__images/game6.png" alt="HTML5重力感应游戏" src="__PUBLIC__images/lazy.png"/>
        <figcaption><a href="<?php echo url('HtmlGames/gravity'); ?>" target="_blank" rel="nofollow">HTML5重力感应游戏</a></figcaption>
        </figure>
                </li>
            </ul>
            <span><i class="iconfont">&#xe62b;</i></span>
            <span><i class="iconfont">&#xe7ba;</i></span>
        </div>
        <!--  HTML5游戏 start    -->
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
    <script src="__PUBLIC__js/domove.js"></script>
    <script>
        var imgUrl = "__IMG__";
    </script>
    <script src="__PUBLIC__js/functions.js"></script>

</body>
</html>
