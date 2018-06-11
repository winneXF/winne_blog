<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"E:\website\php.travel.com\winne_blog\public/../application/index\view\message\message.html";i:1526279737;s:83:"E:\website\php.travel.com\winne_blog\application\index\view\common\main_header.html";i:1525314103;s:78:"E:\website\php.travel.com\winne_blog\application\index\view\common\footer.html";i:1523860798;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>winne~~博客-留言</title>
    <meta name="keywords" content="winne博客,winne前端，留言，留言板，抢沙发" />
    <meta name="description" content="给我留言吧。你，生命中最重要的过客，之所以是过客，因为你未曾为我停留。" /> 
    <link href="__PUBLIC__ico/ico.ico" rel="Shortcut Icon" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/mainCommon.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__css/message.css">
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
    <p class="tips">你，生命中最重要的过客，之所以是过客，因为你未曾为我停留。</p>
    <div class="body-content-wrapper clear">
    <!-- 评论区内容 -->
    <div class="body-left">
                    <div class="body-left-top">
                        评论专区</div>
                    <div id="body-left-comment">
                        <div id="comments-wrap" style="min-height: 490px;">
                        
                            <?php if($commentNum != 0): if(is_array($comments) || $comments instanceof \think\Collection || $comments instanceof \think\Paginator): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                <div class="comment-wrapper" data-info='{"id":<?php echo $item['id']; ?>,"uid":<?php echo $item['user_id']; ?>}'>
                                    <div class="head-img">                                    
                                        <?php if($item['pic'] != ''): ?>
                                        <img src="__IMG__<?php echo $item['pic']; ?>" height="80">
                                        <?php else: ?>
                                        <img src="__PUBLIC__images/head_img.png" alt="headImage" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="comment-box">
                                        <span style="color:Red;"><?php echo $item['username']; ?>：</span>
                                        <div class="mes-wrap">
                                            <p class="mes0"> 
                                            <?php echo $item['content']; ?>
                                            </p>
                                            <?php if(is_array($replays) || $replays instanceof \think\Collection || $replays instanceof \think\Paginator): $i = 0; $__LIST__ = $replays;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($item['id'] == $vo['comment_id']): if($item['user_id'] == $vo['to_uid']): ?>
                                                <div class='replay-man' data-info='<?php echo $vo['from_uid']; ?>'>
                                                     <span class="re-man" style='color:red;'><?php echo $vo['from_name']; ?>：</span>
                                                     <p style='display: inline-block;'> <?php echo $vo['replay_content']; ?></p>
                                                     <p class='repaly-time'><?php echo $vo['replay_time']; ?> <span class='son-replay'><i class='iconfont'>&#xe7ac;</i>回复</span></p>
                                                     <div class='replay-con'>
                                                        <textarea></textarea>
                                                        <div class='sure clear son-replay-sure'><a href='javascript:;'>确定回复</a></div>
                                                    </div>
                                                </div>
                                                <?php else: ?>
                                                <div class='replay-man' data-info='<?php echo $vo['from_uid']; ?>'>
                                                     <span class="re-man" style='color:red;'><?php echo $vo['from_name']; ?></span>&nbsp;&nbsp;回复&nbsp;&nbsp;<span style='color:red;'><?php echo $vo['to_name']; ?></span>：
                                                     <p style='display: inline-block;'> <?php echo $vo['replay_content']; ?></p>
                                                     <p class='repaly-time'><?php echo $vo['replay_time']; ?> <span class='son-replay'><i class='iconfont'>&#xe7ac;</i>回复</span></p>
                                                     <div class='replay-con'>
                                                        <textarea></textarea>
                                                        <div class='sure clear son-replay-sure'><a href='javascript:;'>确定回复</a></div>
                                                    </div>
                                                 </div>
                                                <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                                            

                                        </div>
                                        
                                        <div class="comment-bottom">
                                        <i class="send-time"><?php echo $item['create_time']; ?></i>
                                        <span class="up"><i class="iconfont">&#xe64a;</i>顶(<span class="up-num"><?php echo $item['up_num']; ?></span>)</span>
                                        <span class="reply-mes"><i class="iconfont">&#xe7ac;</i>回复</span>
                                        </div>
                                        <div class="replay-content">
                                            <textarea></textarea>
                                            <div class="sure clear replay-sure"><a href="javascript:;">确定回复</a></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <div id="no-comment" >暂无评论,快来抢沙发啦~~~</div>
                            <?php endif; ?>
                            
                        </div>
                        
                        <div id="page" class="page-wrap clear">
                            <div class="pages">
                                <?php echo $comments->render(); ?>
                            </div>
                          
                        </div>
                    </div>
                    <!--    <hr />  -->
                    <div class="wrapper-footer-comment">
                        <div id="footer-comment">
                            <div id="img-box">
                                <img src="__PUBLIC__images/head_img.png" alt="headImage" />
                            </div>
                            <div id="text-box">
                                <textarea rows="6" cols="20"></textarea>
                                <div id="publish">
                                    发布</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-right">                
                    <p>
                        网名：<span style="color: Green">winne</span>&nbsp;|&nbsp; 昵称不可为空<br />
                        <br />
                        姓名：雪~F<br />
                        <br />
                        爱好：学习、旅游、娱乐...<br />
                        <br />
                        喜欢的书：《一路上有你》<br />
                        <br />
                        喜欢的音乐：《just one last dance》
                    </p>
                    <span class="pic-person"></span>
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
    
    <script src="__PUBLIC__js/toTop.js"></script>
    <script src="__PUBLIC__js/jquery.js"></script>
    <script>
        var imgUrl = "__PUBLIC__";
    </script>
    <script src="__PUBLIC__js/message.js"></script>
</body>
</html>
