<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"E:\website\php.travel.com\winne_blog\public/../application/admin\view\article\article_edit.html";i:1526632161;s:75:"E:\website\php.travel.com\winne_blog\application\admin\view\common\top.html";i:1524193502;s:76:"E:\website\php.travel.com\winne_blog\application\admin\view\common\left.html";i:1526632909;}*/ ?>
<!DOCTYPE html>
<html><head>
        <meta charset="utf-8">
    <title>修改文章</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__PUBLIC__style/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__style/font-awesome.css" rel="stylesheet">
    <link href="__PUBLIC__style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="__PUBLIC__style/beyond.css" rel="stylesheet" type="text/css">
    <!-- <link href="__PUBLIC__style/demo.css" rel="stylesheet">
    <link href="__PUBLIC__style/typicons.css" rel="stylesheet"> -->
    <link href="__PUBLIC__style/animate.css" rel="stylesheet">
    
</head>
<body>
    <!-- 头部 -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="__PUBLIC__images/logo.png" alt="">
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings -->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="">
                                        <img src="__PUBLIC__images/admin.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span><?php echo \think\Request::instance()->session('adminname'); ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>David Stevenson</a></li>
                                    <li class="dropdown-footer">
                                        <a href="<?php echo url('admin/logout'); ?>">
                                            退出登录
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="<?php echo url('admin/admin_edit',array('id'=>\think\Request::instance()->session('uid'))); ?>">
                                            修改密码
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                                no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>

    <!-- /头部 -->
    
    <div class="main-container container-fluid">
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa  fa-heart"></i>
                    <div class="searchhelper"></div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu" id="left-sidebar">
                    <!--Dashboard-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">管理员</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('admin/admin_list'); ?>">
                                    <span class="menu-text">
                                        管理列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-user-md"></i>
                            <span class="menu-text">用户</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('user/user_list'); ?>">
                                    <span class="menu-text">
                                        用户列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-indent"></i>
                            <span class="menu-text">导航栏目</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('nav/nav_list'); ?>">
                                    <span class="menu-text">
                                        栏目列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file-text"></i>
                            <span class="menu-text">文章</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('article/article_list'); ?>">
                                    <span class="menu-text">
                                        文章列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-anchor"></i>
                            <span class="menu-text">文章锚点</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('article_anchor/article_anchor_list'); ?>">
                                    <span class="menu-text">
                                        文章锚点列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>  
                  

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-book"></i>
                            <span class="menu-text">书籍推荐</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('book_recommend/book_recommend_list'); ?>">
                                    <span class="menu-text">
                                        推荐书籍列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-youtube-play"></i>
                            <span class="menu-text">电影推荐</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('movie/movie_list'); ?>">
                                    <span class="menu-text">
                                        电影推荐列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>

                     <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-archive"></i>
                            <span class="menu-text">工具Tab名称</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('tools_name/tools_name_list'); ?>">
                                    <span class="menu-text">
                                        工具Tab名称列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-archive"></i>
                            <span class="menu-text">工具Tab内容</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('tools_content/tools_content_list'); ?>">
                                    <span class="menu-text">
                                        工具Tab内容列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-link"></i>
                            <span class="menu-text">友情链接</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('friend_link/friend_link_list'); ?>">
                                    <span class="menu-text">
                                        链接列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-comment"></i>
                            <span class="menu-text">留言</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('comments/comments_list'); ?>">
                                    <span class="menu-text">
                                        留言列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-comment"></i>
                            <span class="menu-text">回复</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('replay/replay_list'); ?>">
                                    <span class="menu-text">
                                        回复列表                                    
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>                      

                                          
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">文章</a>
                        </li>
                        <li>
                            <a href="<?php echo url('article/article_list'); ?>">文章管理</a>
                        </li>
                        <li class="active">修改文章</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">修改文章</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $articles['id']; ?>">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">文章标题</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="title" placeholder="" name="title"  type="text" value="<?php echo $articles['title']; ?>" required="">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="title_anchor_id" class="col-sm-2 control-label no-padding-right">文章标题锚点id</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="title_anchor_id" placeholder="" name="title_anchor_id"  type="text" value="<?php echo $articles['title_anchor_id']; ?>" required="">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">文章作者</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="author" placeholder="" name="author"  type="text" value="<?php echo $articles['author']; ?>">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">关键字</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="keywords" placeholder="" name="keywords"  type="text" value="<?php echo $articles['keywords']; ?>">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">文章描述</label>
                            <div class="col-sm-6">
                                <textarea name="descript" class="form-control"><?php echo $articles['descript']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right" style="line-height: 60px;">缩略图</label>
                            <div class="col-sm-6">
                                <input id="pic" placeholder="" name="pic" style="display:inline;"  type="file">
                                <?php if($articles['pic'] != ''): ?>
                                    <img id="img-view" src="__IMG__<?php echo $articles['pic']; ?>" height="80">
                                <?php else: ?>
                                    <img id="img-view" src="" height="80">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">所属导航栏目</label>
                            <div class="col-sm-6">
                                <select required="" name="belong_nav" id="first-nav">
                                    <option value="">请选择一级导航栏目</option>
                                    <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option <?php if($vo['id'] == $articles['belong_nav']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['nav_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <select required="" name="navid" id="second-nav">
                                    <option value="">请选择二级导航栏目</option>
                                </select>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">是否推荐</label>
                            <div class="col-sm-6">
                                 <label>
                                    <input <?php if($articles['article_state'] == 1): ?>checked="checked"<?php endif; ?> class="checkbox-slider colored-darkorange" name="article_state" type="checkbox">
                                    <span class="text" style="margin-top: 6px;"></span>
                                 </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">文章内容</label>
                            <div class="col-sm-6">
                                 <label>
                                    <textarea name="content"  id="content"><?php echo $articles['content']; ?></textarea>
                                 </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">保存信息</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>  
    </div>

        <!--Basic Scripts-->
    <script src="__PUBLIC__js/jquery.js"></script>
    <script src="__PUBLIC__js/bootstrap.js"></script>
    <script>
        var weburl = "__WEBURL__";
    </script>
    <script src="__PUBLIC__js/data.js"></script>
    <!--Beyond Scripts-->
    <script src="__PUBLIC__js/beyond.js"></script>
    <!-- 百度编辑器引入代码 -->
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.min.js"></script>
    <!-- <script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script> -->
    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:700,initialFrameHeight:400,});
    </script>

</body></html>