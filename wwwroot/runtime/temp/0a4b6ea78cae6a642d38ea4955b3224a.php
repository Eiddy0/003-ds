<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\index\index.htm";i:1587180084;s:71:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\public\top.htm";i:1587180085;s:72:"D:\wwwroot\zjce\wwwroot\public/../application/admin\view\public\left.htm";i:1587180085;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>网站管理系统</title>

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
                    <li class="active"><i class="fa fa-home"></i> / 首页</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->


            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">

                                    <div class="portlet-title">
                                         <div class="caption font-green bold" style="font-size: 15px; color: #2dc3e8;">
                                             <b><i class="fa fa-bell-o"></i>&nbsp;&nbsp;&nbsp;通知公告</b>
                                         </div>
                                         <div class="tpl-portlet-input tpl-fz-ml">
                                              <div class="portlet-input input-small input-inline">
                                              </div>
                                         </div>
                                    </div>
                                    <div class="jz-tz">
                                         <ul  style="list-style-type: none;padding: 0px;margin: 25px;    color: #82949a;">
                                         <?php if(is_array($news) || $news instanceof \think\Collection): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?>
                                              <li style="padding-left: 14px;margin-bottom: 10px;">
                                                <div>
                                                     <div class="" style="float: right;">
                                                           <?php echo $n['time']; ?>             
                                                     </div>
                                                     <div class="" style="">
                                                          <span class="">
                                                              <i class="fa fa-bell-o"></i>
                                                          </span>
                                                          <span> &nbsp;&nbsp;<?php echo $n['title']; ?><p style="margin-top:10px;margin-left: 25px; "><?php echo $n['article']; ?></p></span>
                                                     </div>
                                                  </div>
                                               </li>
                                               <?php endforeach; endif; else: echo "" ;endif; ?>
                                               <!-- <li style="padding-left: 14px;margin-bottom: 10px;">
                                                    <div>
                                                     <div class="" style="float: right;">
                                                           5天前发布             
                                                     </div>
                                                     <div class="" style="">
                                                          <span class="">
                                                              <i class="fa fa-bell-o"></i>
                                                          </span>
                                                          <span> &nbsp;&nbsp;admin：<p style="margin-top:10px;margin-left: 25px;" >asdasda s</p></span>
                                                     </div>
                                                  </div>

                                               </li>
                                               <li style="padding-left: 14px;margin-bottom: 10px;">
                                                     <div>
                                                     <div class="" style="float: right;">
                                                           5天前发布             
                                                     </div>
                                                     <div class="" style="">
                                                          <span class="">
                                                              <i class="fa fa-bell-o"></i>
                                                          </span>
                                                          <span> &nbsp;&nbsp;admin：<p style="margin-top:10px;margin-left: 25px;" >asdasda s</p></span>
                                                     </div>
                                                  </div>

                                                </li> -->
                                         </ul>
                                    </div>
                                </div>


                               
                            </div>
                             <!-- <div class="jz-sh" style="    color: #82949a;">
                                          <div class="jz-row1" style="width:49%;float: left;margin-top: 20px;padding: 12px; background-color: #fbfbfb; box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);">
                                                <span style="color:#e7505a;font-size: 15px;"><b><i class="fa fa-bullhorn"></i> &nbsp;&nbsp;&nbsp;团队审核</b></span><br>
                                                <div>
                                                <?php if($tnum==0): ?>
                                                    <div style="float: left;"><p style="margin: 20px;"><?php if($mes['reply']=="0"||$acc['group_id']==1): ?> 您的审核都已完成<?php else: ?><?php echo $mes['reply']; endif; ?></p>
                                                    </div>
                                                  <?php if($acc['group_id']==1): ?>
                                                    <div style="float: right;margin-top: 16px;"><a href="<?php echo url('approval/taudit'); ?>" class="btn btn-success btn-sm shiny" ><i class="fa fa-check"></i>前去查看</a>
                                                  <?php else: ?>
                                                    <div style="float: right;margin-top: 16px;"><a href="<?php echo url('approval/send'); ?>" class="btn btn-primary btn-sm shiny" ><i class="fa fa-star"></i> 发送消息给组委会 </a>
                                                  <?php endif; ?>
                                                    </div>
                                                    <?php else: ?>
                                                     <div style="float: left;"><p style="margin: 20px;">还有<?php echo $tnum; ?>个团队信息未审核</p>
                                                    </div>
                                                    <div style="float: right;margin-top: 16px;"><a href="<?php echo url('approval/taudit'); ?>" class="btn btn-primary btn-sm shiny" ><i class="fa fa-edit"></i>前去审核</a>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                          </div>
                                          <?php if($acc['group_id']==1): ?> -->
                                          <!-- <div class="jz-row2" style="width:49%; float: right;margin-top: 20px;padding: 12px; background-color: #fbfbfb;box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);">
                                                <span style="color:#e7505a;font-size: 15px;"><b><i class="fa fa-bullhorn"></i> &nbsp;&nbsp;&nbsp;材料审核</b></span><br>
                                                <div>
                                                <?php if($mnum==0): ?>
                                                     <div style="float: left;"><p style="margin: 20px;">
                                                     您的审核都已完成</p>
                                                     </div>
                                                     <div style="float: right;margin-top: 16px;"><a href="<?php echo url('approval/maudit'); ?>" class="btn btn-success btn-sm shiny" ><i class="fa fa-check"></i>前去查看</a>
                                                     </div>
                                                     <?php else: ?>
                                                       <div style="float: left;"><p style="margin: 20px;">
                                                     
                                                     还有<?php echo $mnum; ?>个团队材料未审核</p>
                                                     </div>
                                                     <div style="float: right;margin-top: 16px;"><a href="<?php echo url('approval/maudit'); ?>" class="btn btn-primary btn-sm shiny"><i class="fa fa-edit"></i>前去审核</a>
                                                     </div>
                                                     <?php endif; ?>
                                                </div>
                                          </div>
                                          <?php endif; ?> -->
                             <!-- </div> -->
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


</body>
</html>