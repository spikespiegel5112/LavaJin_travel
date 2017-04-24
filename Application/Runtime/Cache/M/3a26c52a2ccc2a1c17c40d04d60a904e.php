<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf-8">
	<title>西藏旅游</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/Public/M/css/common.css" />
	<link rel='stylesheet' href="/Public/M/css/user.css" />
	<link rel='stylesheet' href="/Public/M/css/access.css" />
	<script type="text/javascript" src='/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/Public/M/js/common.js'></script>
	<script type="text/javascript" src='/Public/M/js/index.js'></script>
</head>

<body>
	<div class='main_container'>
		<div class='user_header_wrapper'>
			<a href='javascript:;' class='avatar'>
				<img src="/Public/M/images/icon/TB1yRopLpXXXXaXXVXXwQxuJFXX-1025-1024.png">
				<label>LavaJin</label>
			</a>
		</div>
		<div class='user_mainlist_wrapper'>
			<ul>
				<li>
					<a href="<?php echo U('Order/index');?>">我的订单</a>
				</li>
				<li>
					<a href="javascript:;">我的红包</a>
				</li>
				<li>
					<a href="javascript:;">常见旅客信息</a>
				</li>
				<li>
					<a href="javascript:;">联系客服</a>
				</li>
				<li>
					<a href="javascript:;">反馈建议</a>
				<!-- </li>
					<li>
					<a href="javascript:;">我要推广</a>
				</li> -->
			</ul>
		</div>
		<div class='common_navgap_item'></div>
		<div class='common_nav_wrapper'>
			<ul>
				<li>
					<a href='<?php echo U('Index/index');?>'>
						<span class='iconfont icon-house'></span>
						<label>首页</label>
					</a>
				</li>
				<li>
					<a href='javascript:;'>
						<span class='iconfont icon-user2'></span>
						<label>旅游攻略</label>
					</a>
				</li>
				<li>
					<a href='<?php echo U('User/index');?>'>
						<span class='iconfont icon-house'></span>
						<label>会员中心</label>
					</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>