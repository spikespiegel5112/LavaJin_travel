<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0 user-scalable=no" />
	<title>线路列表</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/Public/M/css/common.css" />
	<link rel='stylesheet' href="/Public/M/css/user.css" />
	<link rel='stylesheet' href="/Public/M/css/access.css" />
	<link rel='stylesheet' href="/Public/M/css/carrent.css" />
	<link rel='stylesheet' href="/Public/M/css/product.css" />
	<script type="text/javascript" src='/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/Public/M/js/common.js'></script>
</head>

<body>
	<div class='main_container'>
		<div class="common_header_wrapper">
			<a class="left_btn back_btn" href="<?php echo U('Index/index');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
			<p>线路列表</p>
		</div>
		<div class='common_list_wrapper'>
			<ul>
				<li>
					<a class='thumbnail' href="<?php echo U('Product/details');?>">
						<img src="/Public/M/images/static/10i58PICmeX.jpg">
					</a>
					<div class='detail'>
						<a href="<?php echo U('Product/details');?>">
						<h2 class='title'><span class='productid'>A938</span>拉萨之旅</h2>
					</a>
						<ul class='product_list_wrapper'>
							<li>
								<label>出发地：</label>
								<p class='desc'>
									拉萨市
								</p>
							</li>
							<li>
								<label>行程天数:</label>
								<p class='desc'>
									8天
								</p>
							</li>
							<li>
								<label>简述：</label>
								<p class='introduce'>
									领略世界屋脊之美，看珠峰旗云，游藏域高地，最美珠峰，最美圣湖，尽在咫尺。<a href="javascript:;">详情</a>
								</p>
							</li>
							<li>
								<label>价格：</label>
								<p class='desc'>
									<span class='price'>¥2960</span> 元/人
								</p>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a class='thumbnail' href="<?php echo U('Product/details');?>">
						<img src="/Public/M/images/static/10i58PICmeX.jpg">
					</a>
					<div class='detail'>
						<a href="<?php echo U('Product/details');?>">
						<h2 class='title'><span class='productid'>A937</span>拉萨之旅</h2>
					</a>
						<ul class='product_list_wrapper'>
							<li>
								<label>出发地：</label>
								<p class='desc'>
									拉萨市
								</p>
							</li>
							<li>
								<label>行程天数:</label>
								<p class='desc'>
									8天
								</p>
							</li>
							<li>
								<label>简述：</label>
								<p class='introduce'>
									领略世界屋脊之美，看珠峰旗云，游藏域高地，最美珠峰，最美圣湖，尽在咫尺。<a href="javascript:;">详情</a>
								</p>
							</li>
							<li>
								<label>价格：</label>
								<p class='desc'>
									<span class='price'>¥2960</span> 元/人
								</p>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a class='thumbnail' href="javascript:;">
						<img src="/Public/M/images/static/10i58PICmeX.jpg">
					</a>
					<div class='detail'>
						<h2 class='title'><span class='productid'>A937</span>拉萨之旅</h2>
						<ul class='product_list_wrapper'>
							<li>
								<label>出发地：</label>
								<p class='desc'>
									拉萨市
								</p>
							</li>
							<li>
								<label>行程天数:</label>
								<p class='desc'>
									8天
								</p>
							</li>
							<li>
								<label>简述：</label>
								<p class='introduce'>
									领略世界屋脊之美，看珠峰旗云，游藏域高地，最美珠峰，最美圣湖，尽在咫尺。<a href="javascript:;">详情</a>
								</p>
							</li>
							<li>
								<label>价格：</label>
								<p class='desc'>
									<span class='price'>¥2960</span> 元/人
								</p>
							</li>
						</ul>
					</div>
				</li>
			
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
					<a href='orderlist.html'>
						<span class='iconfont icon-order'></span>
						<label>攻略分享</label>
					</a>
				</li>
				<li>
					<a href='<?php echo U('User/index');?>'>
						<span class='iconfont icon-user2'></span>
						<label>我的</label>
					</a>
				</li>
				
			</ul>
		</div>
	</div>
</body>
<script>
(function(){
	$(function() {
		var productList = {
			align: function() {
				setTimeout(function() {
					$('.common_list_wrapper .thumbnail img').align({
						container: '.common_list_wrapper .thumbnail'
					})
				}, 500)
			},
			main: function() {
				this.align();
			},
			init: function() {
				this.main();
			}
		}
		productList.init();
	})
})
(jQuery)
</script>

</html>