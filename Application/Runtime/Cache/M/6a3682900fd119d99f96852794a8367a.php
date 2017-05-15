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

		<div class="common_header_wrapper">
			<a class="left_btn back_btn" href="<?php echo U('Index/index');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
			<p>推荐线路</p>
		</div>
		<div class='index_categorylist_wrapper'>
			
			<ul>
				<?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Product/index',array('category_code'=>$vo['category_code']));?>">
						<img src='<?php echo ($vo["category_mainimg"]); ?>' />
					</a>
					<label><?php echo ($vo["category"]); ?></label>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		
		</div>
</body>
</html>