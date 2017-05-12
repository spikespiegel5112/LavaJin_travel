<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
	<title>推荐旅游</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/travel/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/travel/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/common.css" />
	<link rel="stylesheet" href="/travel/Public/M/css/index.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/access.css" />
	<script type="text/javascript" src='/travel/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/travel/Public/M/js/common.js'></script>
</head>

<body>
	<div class='main_container'>
		<!-- <div class='index_carousel_wrapper swiper-container'>
			<ul class='swiper-wrapper'>
				<li class='swiper-slide'>
					<a href='javascript:;'>
						<img src='/travel/Public/M/images/banner_articlelist_announcement_00000.jpg' />
					</a>
				</li>
				<li class='swiper-slide'>
					<a href='javascript:;'>
						<img src='/travel/Public/M/images/banner_articlelist_news_00000.jpg' />
					</a>
				</li>
			</ul>
			<div class='swiper-pagination'></div>
		</div> -->

		<div class="common_header_wrapper">
			<a class="left_btn back_btn" href="<?php echo U('Index/index');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
			<p>推荐线路</p>
		</div>
		<div class='index_categorylist_wrapper'>
			
			<ul>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Product/index');?>">
						<img src='/travel/Public/M/images/static/02w58PICuYi_1024.jpg' />
					</a>
					<label><?php echo ($vo["category"]); ?></label>
				</li>
			<!-- 	<li>
					<a href="<?php echo U('Carrent/index');?>">
						<img src='/travel/Public/M/images/static/10i58PICmeX.jpg' />
					</a>
					<label>多日游</label>
				</li>
				<li>
					<a href="<?php echo U('Hotel/index');?>">
						<img src='/travel/Public/M/images/static/73t58PICjpT_1024.jpg' />
					</a>
					<label>深度游</label>
				</li>
				<li>
					<a href="<?php echo U('JiPiao/index');?>">
						<img src='/travel/Public/M/images/static/240418-14112P9345826.jpg' />
					</a>
					<label>当下必玩</label>
				</li>
				<li>
					<a href="http://imf.zqggz.com">
						<img src='/travel/Public/M/images/static/9448607_153955535000_2.jpg' />
					</a>
					<label>测试1</label>
				</li>
				<li>
					<a href="javascript:;">
						<img src='/travel/Public/M/images/static/44n58PICAT2.jpg' />
					</a>
					<label>测试2</label>
				</li> --><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		
		</div>
</body>
</html>