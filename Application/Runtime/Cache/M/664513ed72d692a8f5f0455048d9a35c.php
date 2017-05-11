<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
	<title>租车列表</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/Public/M/css/common.css" />
	<link rel='stylesheet' href="/Public/M/css/user.css" />
	<link rel='stylesheet' href="/Public/M/css/access.css" />
	<link rel='stylesheet' href="/Public/M/css/carrent.css" />
	<script type="text/javascript" src='/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/Public/M/js/common.js'></script>
	
</head>

<body>
	<div class='main_container'>
		<div class='common_list_wrapper'>
			<ul>
            	<?php if(is_array($carrental_list)): $i = 0; $__LIST__ = $carrental_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a class='thumbnail' href="<?php echo U('Carrent/detail',array('id'=>$vo['id']));?>">
						<img src="<?php echo ($vo["carrental_mainimg"]); ?>">
					</a>
					<div class='detail'>
						 <a href="<?php echo U('Carrent/detail',array('id'=>$vo['id']));?>">
						<h2 class='title'><?php echo ($vo["carrental_title"]); ?></h2>
					</a>
					   <div class="introduce">
						<p><?php echo ($vo["carrental_briefing"]); ?></p>
						</div>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>				
			</ul>
		</div>
		<div class='common_navgap_item'></div>
		<div class='common_nav_wrapper'>
			<ul>
				<li>
					<a href='<<?php echo U('Index/index');?>>'>
						<span class='iconfont icon-house'></span>
						<label>首页</label>
					</a>
				</li>
				<li>
					<a href='#'>
						<span class='iconfont icon-order'></span>
						<label>攻略分享</label>
					</a>
				</li>
				<li>
					<a href='<<?php echo U('User/index');?>>'>
						<span class='iconfont icon-user2'></span>
						<label>我的</label>
					</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>