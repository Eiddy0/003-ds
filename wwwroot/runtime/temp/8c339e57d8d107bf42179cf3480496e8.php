<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\aboutus\lst.htm";i:1587180076;s:71:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\public\top.htm";i:1587180085;s:72:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\public\left.htm";i:1587180085;}*/ ?>
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
                                        <li class="active">文章管理</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<!-- <button type="button" tooltip="添加栏目" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('add'); ?>'"> <i class="fa fa-plus"></i> Add
</button> -->
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <form action="" method="post">
                        <table class="table table-bordered table-hover">
                        
                            <thead class="">
                                <tr>
                                    <th class="text-center" width="10%">ID</th>
                                    <th class="text-center">标题</th>
                                    <!-- <th class="text-center">缩略图</th>
                                    <th class="text-center">作者</th> -->
                                    <th class="text-center">发布时间</th>
                                    <th class="text-center">文章类型</th>
                                    <th class="text-center" width="20%">操作</th>
                                </tr>
                            </thead>
                        <?php if(is_array($article) || $article instanceof \think\Collection): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                            <tbody>
                                    
                                    <tr>
                                        <td align="center"><?php echo $art['id']; ?></td>
                                        <td><?php echo $art['title']; ?></td>
                                        <!-- <td align="center">
                                            
                                            <img src="" height="20">
                                            
                                        </td>
                                        <td align="center"></td> -->
                                        <td align="center"><?php echo $art['time']; ?></td>
                                        <?php if(($art['type'] == 1)): ?><td align="center">联赛介绍</td>
                                        <?php elseif(($art['type'] == 2)): ?><td align="center">组织框架</td>
                                        <?php elseif(($art['type'] == 3)): ?><td align="center">联系方式</td>
                                        <?php endif; ?>
                                        <td align="center">
                                            <a href="<?php echo url('edit',array('id' => $art['id'])); ?>" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <!-- <a href="#" onClick="warning('确实要删除吗', '<?php echo url('delete',array('id'=>$art['id'])); ?>')" class="btn btn-danger btn-sm shiny">
                                                <i class="fa fa-trash-o"></i> 删除
                                            </a> -->
                                        </td>
                                    </tr>           
                            </tbody>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </form>
                </div>
                <div style="padding-top:10px;">
                    
                </div>
                <div>
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
    


</body></html>