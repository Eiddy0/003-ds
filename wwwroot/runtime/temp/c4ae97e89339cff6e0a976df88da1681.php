<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\news\add.htm";i:1589627549;s:71:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\public\top.htm";i:1587180085;s:72:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\public\left.htm";i:1587180085;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>ThinkPHP5.0</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__ADMIN__/style/bootstrap.css" rel="stylesheet">
    <link href="__ADMIN__/style/font-awesome.css" rel="stylesheet">
    <link href="__ADMIN__/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="__ADMIN__/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__ADMIN__/style/demo.css" rel="stylesheet">
    <link href="__ADMIN__/style/typicons.css" rel="stylesheet">
    <link href="__ADMIN__/style/animate.css" rel="stylesheet">
    <script src="__ADMIN__/ueditor/ueditor.config.js"></script>
    <script src="__ADMIN__/ueditor/ueditor.all.min.js"></script>
    <script src="__ADMIN__/ueditor/lang/zh-cn/zh-cn.js"></script>
    
</head>
<body>
	<!-- 头部 -->
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small >
                     <img src="__ADMIN__/images/logo.png" alt="">
                        <?php if($acc['group_id']!=1): ?><?php echo $sc['school']; endif; ?>
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->

            <div class="sidebar-collapse" id="sidebar-collapse">
             
            </div>
            
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">

                                <section>
                                    <h2><span class="profile"><span><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo \think\Request::instance()->session('name'); ?></span>
                                    </h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a><?php echo \think\Request::instance()->session('name'); ?></a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/edit',array('id'=>\think\Request::instance()->session('id'))); ?>">
                                        修改信息
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/logout'); ?>">
                                        退出登录
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
    
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->

    <ul class="nav sidebar-menu">
        <!--Dashboard-->
         <li>
            <a href="<?php echo url('admin/index/index'); ?>" class="menu-dropdown">
         <i class="menu-icon fa fa-home"></i> 
                <span class="menu-text">首页</span>
                <i class="menu-expand"></i>
            </a>
        </li>
        <?php if($acc['group_id']==1): ?>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">栏目处理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('cate/lst'); ?>">
                        <span class="menu-text">栏目处理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">文章处理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('news/lst'); ?>">
                        <span class="menu-text">文章处理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">关于我们</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('aboutus/lst'); ?>">
                                    <span class="menu-text">
                                        文章列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">系统</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Conf/conf'); ?>">
                                    <span class="menu-text">
                                        配置项                               </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
               <!--  <li>
                    <a href="<?php echo url('Conf/lst'); ?>">
                                    <span class="menu-text">
                                        配置列表                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li> -->
            </ul>
        </li>

        <?php endif; ?>


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
                        <a href="#">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('lst'); ?>">文章管理</a>
                    </li>
                                        <li class="active">添加文章</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增文章</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                            <div class="col-sm-6">
                                <input class="form-control"  placeholder="" name="title"  required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                            <div class="col-sm-6">
                                <input class="form-control"  placeholder="" name="author"  type="text" value="<?php echo \think\Request::instance()->session('name'); ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">时间</label>
                            <div class="col-sm-6">
                                <input class="form-control"  placeholder="" name="thumb"  type="text" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                            <div class="col-sm-6">
                                <input class="form-control"  placeholder="" name="desc"  type="text" value="">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                         <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">类型</label>
                            <div class="col-sm-6">
                                <label style="margin-right:15px;">
                                    <input name="click" value="0" type="radio">
                                    <span class="text">通知</span>
                                </label>
                                <label style="margin-right:15px;">
                                    <input checked="checked" class="inverted" name="click" value="1" type="radio">
                                    <span class="text">新闻</span>
                                </label>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">是否推荐</label>
                            <div class="col-sm-6">
                                <label style="margin-right:15px;">
                                    <input name="rec" value="1" type="radio">
                                    <span class="text">是</span>
                                </label>
                                <label style="margin-right:15px;">
                                    <input checked="checked" class="inverted" name="rec" value="0" type="radio">
                                    <span class="text">否</span>
                                </label>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                            <div class="col-sm-6">
                                <select name="cateid">
                                    <?php if(is_array($cateres) || $cateres instanceof \think\Collection): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $cate['id']; ?>"><?php if($cate['level'] != 0): ?>|<?php endif; ?><?php echo str_repeat('-', $cate['level']*4)?><?php echo $cate['catename']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username"  required="" class="col-sm-2 control-label no-padding-right">内容</label>
                            <div class="col-sm-6">
                                <textarea id="content" name="content"></textarea>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-10" style="text-align: center;">
                                <button type="submit" class="btn btn-default" style="margin:0;">保存信息</button>
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
    <script src="__ADMIN__/style/jquery_002.js"></script>
    <script src="__ADMIN__/style/bootstrap.js"></script>
    <script src="__ADMIN__/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__ADMIN__/style/beyond.js"></script>
    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});
    </script>


</body></html>