<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\index\index.html";i:1589628196;s:73:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\public\head.html";i:1589201748;s:74:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\public\right.html";i:1589373474;s:73:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\public\foot.html";i:1589201748;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>浙江省大学生环境生态科技创新大赛</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Bootstrap 3 template for corporate business" />
	<!-- css -->
	<link href="__WEBSITE__/css/bootstrap.min.css" rel="stylesheet" />
	<link href="__WEBSITE__/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
	<link href="__WEBSITE__/css/cubeportfolio.min.css" rel="stylesheet" />
	<link href="__WEBSITE__/css/style.css" rel="stylesheet" />
	<link href="__WEBSITE__/css/mycss.css" rel="stylesheet" />

	<!-- Theme skin -->
	<link id="t-colors" href="__WEBSITE__/skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="__WEBSITE__/bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>



	<div id="wrapper">
		<!-- start header -->
				<header>
<!-- 			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="topleft-info">
								<li><i class="fa fa-phone"></i> 0571-63741234</li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="sb-search" class="sb-search">
								<form action="<?php echo url('search/index'); ?>" method="get">
									<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="keywords" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search" title="Click to start searching"></span>
								</form>
							</div>


						</div>
					</div>
				</div>
			</div> -->

			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="__MYWEB__/index.html">
							浙江省大学生环境生态科技创新大赛
						</a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li class="active"><a href="__MYWEB__/index.html">首页</a></li>
							<?php if(is_array($cateres) || $cateres instanceof \think\Collection): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;if($cate['children'] != 0): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><?php echo $cate['catename']; ?> <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<?php foreach($cate['children'] as $k2 => $v2):?>
									<li><a href="__MYWEB__/<?php if($v2['type'] == 3): ?>aboutus<?php elseif($v2['type'] == 4): ?>data<?php endif; ?>/index/cateid/<?php echo $v2['id']; ?>"><?php echo $v2['catename'];?></a></li>
									<?php endforeach;?>
								</ul>
							</li>
							<?php else: ?>
							<li class="dropdown"><a href="__MYWEB__/<?php if($cate['type'] == 1): ?>artlist<?php elseif($cate['type'] == 2): ?>page<?php elseif($cate['type'] == 4): ?>data<?php endif; ?>/index/cateid/<?php echo $cate['id']; ?>"><?php echo $cate['catename']; ?></a></li>
							<?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<li><a href="http://cxds.utbeta.com/public/index.php/index/login/index.html"  target="_blank">登录系统</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- end header -->
		<section id="featured" class="bg">
			<!-- start slider -->


			<!-- start slider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- Slider -->
						<div id="main-slider" class="main-slider flexslider">
							<ul class="slides">
								<li>
									<img src="__WEBSITE__/img/slides/flexslider/1.jpg" alt="" />
									<div class="flex-caption">
										<h2 style="color: white;">浙江省大学生环境生态科技创新大赛</h2>
										<!-- <p>科技实验作品应围绕环境、生态领域的相关科学问题，开展自主性设计实验或者野外调查工作，获得实验或调查结果，形成作品或撰写论文</p> -->
										<a href="http://cxds.utbeta.com/public/index.php/index/login/index.html" class="btn btn-theme" style="font-size: 18px;">在线报名</a>
									</div>
								</li>
								<li>
									<img src="__WEBSITE__/img/slides/flexslider/2.jpg" alt="" />
									<div class="flex-caption">
										<h3>大赛详情</h3>
										<p style="font-size: 18px;">浙江省大学生环境生态科技创新大赛由浙江省教育厅、浙江省土壤肥料学会和浙江省生态学会主办,浙江农林大学主办,大赛作品分为科技实验类作品，科技理念类作品和科技实物类作品。</p>
										<!-- <a href="#" class="btn btn-theme">了解更多</a> -->
									</div>
								</li>
								<li>
									<img src="__WEBSITE__/img/slides/flexslider/3.jpg" alt="" />
									<div class="flex-caption">
										<h3>大赛流程</h3>
										<p style="font-size: 17px;line-height: 26px;">1.报名阶段：2020年5月1日——2020年7月31日，参赛队须在竞赛
网站上进行注册和参赛报名。<br/>
											2.实施阶段：从报名之日起至2020年9月30日，各参赛队按要求在竞
赛网站上传研究综述、竞赛设计和论文(报告)等。<br/>
											3.专家网评阶段：2020年10月16日——2020年10月31日，专家分组进行网络匿名评审。<br/>
											4.现场答辩阶段：2020年11月21日——2020年11月22日，在浙江师范大学举行决赛。<br/>
										</p>

										<!-- <a href="#" class="btn btn-theme">了解更多</a> -->
									</div>
								</li>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>
			<!-- <div id="lqdbe" style="position: absolute; visibility: visible; z-index: 1; display: none;">
    <a href='#goTop'>
    	<i class="fa fa-chevron-up fa-1x"></i>
    </a>
</div>
<div class="suspension">
    <ul>
        <li>
            <div id="online_advice" class="suspenbox" color="white" title="加入QQ群">
                <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=3323bd88eaf02f325e8cc91961cf31a95dd2d76c58716aab2c5729c39859651d"title="省环境生态大赛交流群">
                <i class="fa fa-qq fa-2x"></i>
                </a>
            </div>
        </li>
        <li>
            <div id="online_ewm" class="suspenbox" color="white" title="扫描二维码">
                <i class="fa fa-qrcode fa-2x"></i>
                <div class="bigewm">
                        <img src="__WEBSITE__/img/ewm.png" alt="大二维码">
                </div>
            </div>
        </li>
        <li>
            <div id="gototop" class="suspenbox" title="返回顶部">
                <i class="fa fa-chevron-up fa-2x" color="white"></i>
            </div>
        </li>
    </ul>
</div> -->
<div class="scrollsidebar" id="scrollsidebar">
  <div class="side_content">
    <div class="side_list">
      <div class="side_title"><a title="隐藏" class="close_btn"><span>关闭</span></a></div>
      <div class="side_center">
        <div class="custom_service">
          <p> <a title="点击加入交流群" href="//shang.qq.com/wpa/qunwpa?idkey=3323bd88eaf02f325e8cc91961cf31a95dd2d76c58716aab2c5729c39859651d" target="_blank"><img src="//pub.idqqimg.com/wpa/images/group.png"></a> </p>
        </div>
        <div class="other">
          <p><img src="__WEBSITE__/img/images/qrcode.jpg" width="120"/></p>
          <p>省环境生态大赛交流群:<br/>825344007</p>
        </div>
        <!-- <div class="msgserver">
          <p><a href="javascript:"></a></p>
        </div> -->
      </div>
      <div class="side_bottom"></div>
    </div>
  </div>
  <div class="show_btn">
    <span>大赛交流QQ群</span>
  </div>
</div>



		</section>
<!-- 		<section class="callaction">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="cta-text">
							<h2>浙江省<span>第三届</span>大学生环境生态科技创新大赛报名在线报名</h2>
							<p>浙江省第三届大学生环境生态科技创新大赛由浙江省教育厅、浙江省土壤肥料学会和浙江省生态学会主办,浙江农林大学承办。大赛作品分为科技实验作品、科技理念作品和科技实物作品三类。每支参赛队3-5名队员。
							大赛起止时间：2020年4月15日到2020年10月27日</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="cta-btn">
							<a href="http://cxds.utbeta.com/public/index.php/index/login/index.html" target="_blank" class="btn btn-theme btn-lg">在线报名 <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<section id="content">
			<div class="container">
				
				<div class="row">
					<div class="col-lg-12">
						<div class="row">

							<div class="col-sm-6 col-md-6">
								<div class="newsTitle">
									<div class="ti">大赛新闻</div>
								</div>
								<?php if(is_array($news) || $news instanceof \think\Collection): $i = 0;$__LIST__ = is_array($news) ? array_slice($news,0,2, true) : $news->slice(0,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?>
								<div class="news">
									<div class="newtop">
										<a href="<?php echo url('article/index',array('artid'=>$news['id'])); ?>"><h5 class="newtitle">
										<h5 class="newtitle"><?php echo $news['title']; ?></h5></a></a>
										<div class="newtime"><?php echo $news['thumb']; ?></div>
									</div>
									<div  class="newcontent">
										<?php echo $news['desc']; ?>
									</div>
									<div class="solidline"></div>
								</div>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>

							<div class="col-sm-6 col-md-6">
								<div class="newsTitle">
									<div class="ti">大赛公告</div>
								</div>
								<?php if(is_array($notices) || $notices instanceof \think\Collection): $i = 0;$__LIST__ = is_array($notices) ? array_slice($notices,0,2, true) : $notices->slice(0,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notices): $mod = ($i % 2 );++$i;?>
								<div class="news">
									<div class="newtop">
										<a href="<?php echo url('article/index',array('artid'=>$notices['id'])); ?>"><h5 class="newtitle">
										<h5 class="newtitle"><?php echo $notices['title']; ?></h5></a>
										<div class="newtime"><?php echo $notices['thumb']; ?></div>
									</div>
									<div  class="newcontent">
										<?php echo $notices['desc']; ?>
									</div>
									<div class="solidline"></div>
								</div>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

			<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-sm-3 col-lg-3">
							<div class="widget">
								<h4>主办单位</h4>
								<ul class="link-list">
									<li><a href="http://jyt.zj.gov.cn/" target="_blank">浙江省教育厅</a></li>
									<li><a href="#">浙江省土壤肥料学会</a></li>
									<li><a href="#">浙江省生态学会</a></li>
									<li><a href="https://www.zafu.edu.cn/" target="_blank">浙江农林大学</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-lg-3">
							<div class="widget">
								<h4>秘书处单位</h4>
								<ul class="link-list">
									<li><a href="https://www.zafu.edu.cn/" target="_blank">浙江农林大学</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-lg-3">
							<div class="widget">
								<h4>友情链接</h4>
								<ul class="link-list">
									<li><a href="http://www.zjcontest.net/#/home" target="_blank">浙江省科技竞赛网</a></li>
									<li><a href="https://www.zafu.edu.cn/" target="_blank">浙江农林大学</a></li>
									<li><a href="https://et.zafu.edu.cn/" target="_blank">浙江农林大学环境与资源学院</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-lg-3">
							<div class="footerwm">
								<img src="__WEBSITE__/img/ewm.png">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="copyright">
							<div class="credits">
								Copyright@2020.AlI Right Reserved.信息版权所有
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="__WEBSITE__/js/jquery.min.js"></script>
	<script src="__WEBSITE__/js/modernizr.custom.js"></script>
	<script src="__WEBSITE__/js/jquery.easing.1.3.js"></script>
	<script src="__WEBSITE__/js/bootstrap.min.js"></script>
	<script src="__WEBSITE__/plugins/flexslider/jquery.flexslider-min.js"></script>
	<script src="__WEBSITE__/plugins/flexslider/flexslider.config.js"></script>
	<script src="__WEBSITE__/js/jquery.appear.js"></script>
	<script src="__WEBSITE__/js/stellar.js"></script>
	<script src="__WEBSITE__/js/classie.js"></script>
	<script src="__WEBSITE__/js/uisearch.js"></script>
	<script src="__WEBSITE__/js/jquery.cubeportfolio.min.js"></script>
	<script src="__WEBSITE__/js/google-code-prettify/prettify.js"></script>
	<script src="__WEBSITE__/js/animate.js"></script>
	<script src="__WEBSITE__/js/custom.js"></script>
	<script src="__WEBSITE__/js/myjs.js"></script>

</body>

</html>
