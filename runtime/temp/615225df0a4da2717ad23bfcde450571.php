<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:109:"E:\website\php.travel.com\winne_blog\public/../application/admin\view\article_anchor\article_anchor_edit.html";i:1525856254;s:75:"E:\website\php.travel.com\winne_blog\application\admin\view\common\top.html";i:1524193502;s:76:"E:\website\php.travel.com\winne_blog\application\admin\view\common\left.html";i:1526270319;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>修改文章锚点</title>

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
                            <i class="menu-icon fa fa-file-text"></i>
                            <span class="menu-text">精彩推荐</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('wonder_recommend/wonder_recommend_list'); ?>">
                                    <span class="menu-text">
                                        精彩推荐列表                                    
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
                             <a href="#">文章锚点</a>
                        </li>
                        <li>
                             <a href="<?php echo url('article_anchor/article_anchor_list'); ?>">文章锚点管理</a>
                        </li>
                        <li class="active">修改文章锚点</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">修改文章锚点</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" autocomplete="off" action="" method="post">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">文章锚点所属的文章</label>
                            <div class="col-sm-6">
                                <select required="" class="form-control" name="article_id" id="first-nav">
                                    <option value="">请选择</option>
                                    <?php if(is_array($articleres) || $articleres instanceof \think\Collection || $articleres instanceof \think\Paginator): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option <?php if($vo['id'] == $article_anchors['article_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <p class="help-block col-sm-4 red">* 必选</p>
                        </div>

                        <div class="form-group">
                            <label for="id_name" class="col-sm-2 control-label no-padding-right">文章锚点id名(集合)</label>
                            <div class="col-sm-6">
                                <input required="" class="form-control" id="id_name" placeholder="" name="id_name" type="text" value="<?php echo $article_anchors['id_name']; ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="anchor_name" class="col-sm-2 control-label no-padding-right">文章锚点标题(集合)</label>
                            <div class="col-sm-6">
                                <textarea required="" class="form-control" name="anchor_name"><?php echo $article_anchors['anchor_name']; ?></textarea>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
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
    


</body></html>