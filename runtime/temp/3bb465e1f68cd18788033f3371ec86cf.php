<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"E:\website\php.travel.com\winne_blog\public/../application/admin\view\movie\movie_add.html";i:1524122208;s:75:"E:\website\php.travel.com\winne_blog\application\admin\view\common\top.html";i:1524193502;s:76:"E:\website\php.travel.com\winne_blog\application\admin\view\common\left.html";i:1524194556;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>add</title>

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
    <link href="__PUBLIC__style/demo.css" rel="stylesheet">
    <link href="__PUBLIC__style/typicons.css" rel="stylesheet">
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
                <ul class="nav sidebar-menu">
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
                             <a href="#">电影推荐</a>
                        </li>
                        <li>
                             <a href="<?php echo url('movie/movie_list'); ?>">电影推荐管理</a>
                        </li>
                        <li class="active">添加电影推荐</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增电影推荐</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">电影名称</label>
                            <div class="col-sm-6">
                                <input class="form-control" required="" id="title" placeholder="" name="title"  type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="movie_time" class="col-sm-2 control-label no-padding-right">片长</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="movie_time" placeholder="" name="movie_time"  type="text">
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <label for="language" class="col-sm-2 control-label no-padding-right">语言</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="language" placeholder="" name="language"  type="text">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="recommend_num" class="col-sm-2 control-label no-padding-right">推荐指数</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="recommend_num" placeholder="" name="recommend_num"  type="text">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="movie_type" class="col-sm-2 control-label no-padding-right">电影类型</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="movie_type" placeholder="" name="movie_type"  type="text">
                            </div>
                        </div> 
                         <div class="form-group">
                            <label for="download_url" class="col-sm-2 control-label no-padding-right">下载地址</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="download_url" placeholder="" name="download_url"  type="text">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="download_desc" class="col-sm-2 control-label no-padding-right">推荐下载说明</label>
                            <div class="col-sm-6">
                                <textarea name="download_desc" class="form-control"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="top_desc" class="col-sm-2 control-label no-padding-right">首页电影的简介</label>
                            <div class="col-sm-6">
                                <textarea name="top_desc" class="form-control"></textarea>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填（非首页电影推荐不填）</p>
                        </div>
                        <div class="form-group">
                            <label for="pic" class="col-sm-2 control-label no-padding-right">缩略图</label>
                            <div class="col-sm-6">
                                <input id="pic" placeholder="" name="pic"  type="file">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="state" class="col-sm-2 control-label no-padding-right">是否推荐</label>
                            <div class="col-sm-6">
                                 <label>
                                    <input class="checkbox-slider colored-darkorange" name="state" type="checkbox">
                                    <span class="text"></span>
                                 </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="movie_content" class="col-sm-2 control-label no-padding-right">电影内容</label>
                            <div class="col-sm-6">
                                 <label>
                                    <textarea name="movie_content"  id="movie_content"></textarea>
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
    <script src="__PUBLIC__js/jquery_002.js"></script>
    <script src="__PUBLIC__js/bootstrap.js"></script>
    <script src="__PUBLIC__js/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__PUBLIC__js/beyond.js"></script>
    <!-- 百度编辑器引入代码 -->
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('movie_content',{initialFrameWidth:700,initialFrameHeight:400,});
    </script>


</body></html>