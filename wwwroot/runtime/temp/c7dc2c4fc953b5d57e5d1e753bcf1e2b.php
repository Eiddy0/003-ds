<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\search\search.html";i:1588135837;s:73:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\public\head.html";i:1588135180;s:73:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\public\left.html";i:1588134558;s:73:"D:\wwwroot\zjce\wwwroot\public/../application/index\view\public\foot.html";i:1588134736;}*/ ?>
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

	

</head>

<body>

	<div id="wrapper">
		<!-- start header -->
			<header>
			<div class="top">
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
			</div>

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
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- end header -->
		
		<section id="content">
			<div class="container">
				<div class="row">

										<div class="col-lg-4">
						<aside class="left-sidebar">
							
							<div class="widget">
								<h5 class="widgetheading">目录</h5>
								<ul class="cat">
									<li><i class="fa fa-angle-right"></i><a href="__MYWEB__/index.html">首页</a></li>
									<?php if(is_array($cateres) || $cateres instanceof \think\Collection): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;if($cate['children'] == 0): ?>
									<li><i class="fa fa-angle-right"></i><a href="__MYWEB__/<?php if($cate['type'] == 1): ?>artlist<?php elseif($cate['type'] == 2): ?>page<?php elseif($cate['type'] == 4): ?>data<?php endif; ?>/index/cateid/<?php echo $cate['id']; ?>"><?php echo $cate['catename']; ?></a></li>
									<?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<div class="widget">
								<h5 class="widgetheading">联系方式</h5>
								<ul class="recent">
									<li>
										<h6><a href="#">电话</a></h6>
										<p>
											0571-63741234
										</p>
									</li>
									<li>
										<h6><a href="#">邮箱</a></h6>
										<p>
											Mazim alienum
										</p>
									</li>
								</ul>
							</div>
							
						</aside>
					</div>

					<div class="col-lg-8 post">
						<?php if(is_array($search) || $search instanceof \think\Collection): $i = 0; $__LIST__ = $search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="<?php echo url('article/index',array('artid'=>$new['id'])); ?>"><?php echo $new['title']; ?></a></h3>
								</div>
								<!-- <img src="__WEBSITE__/img/dummies/blog/img1.jpg" alt="" class="img-responsive" /> -->
							</div>
							<p>
								<?php echo $new['desc']; ?>
							</p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="fa fa-calendar"></i><?php echo $new['time']; ?></li>
								</ul>
								<a href="<?php echo url('article/index',array('artid'=>$new['id'])); ?>" class="readmore pull-right">继续阅读<i class="fa fa-angle-right"></i></a>
							</div>
						</article>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<div id="pagination">
							<?php echo $searchlist; ?>
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
								<h4>承办单位</h4>
								<ul class="link-list">
									<li><a href="#">浙江农林大学</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-lg-3">
							<div class="widget">
								<h4>主办单位</h4>
								<ul class="link-list">
									<li><a href="#">浙江省教育厅</a></li>
									<li><a href="#">浙江省土壤肥料学会</a></li>
									<li><a href="#">浙江省生态学会</a></li>
								</ul>
							</div>

						</div>
						<div class="col-sm-3 col-lg-3">
							<div class="widget">
								<h4>友情链接</h4>
								<ul class="link-list">
									<li><a href=" https://et.zafu.edu.cn/" target="_blank">浙江农林大学环境与资源学院</a></li>
									<li><a href="https://www.paperask.com/" target="_blank">PaperAsk</a></li>
									<li><a href="https://www.paperfree.cn/" target="_blank">PaperFree</a></li>
									<li><a href="https://www.paperdd.com/" target="_blank">Paperkdd</a></li>
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
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- javascript
    ================================================== -->
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

</body>

</html>
