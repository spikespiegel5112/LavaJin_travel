<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0 user-scalable=no" />
	<title>线路列表</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/travel/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/travel/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/common.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/user.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/access.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/carrent.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/product.css" />
	<script type="text/javascript" src='/travel/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/travel/Public/M/js/common.js'></script>
</head>

<body>
	<div class='main_container'>
		<div class="common_header_wrapper">
			<a class="left_btn back_btn" href="<?php echo U('Product/category');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
			<p>线路列表</p>
		</div>
		<div class='common_list_wrapper'>
			<ul>
				<?php if(is_array($travel_list)): $i = 0; $__LIST__ = $travel_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a class='thumbnail' href="<?php echo U('Product/detail',array('id'=>$vo['id']));?>">
						<img src="<?php echo ($vo["travel_mainimg"]); ?>">
					</a>
					<div class='detail'>
						<a href="<?php echo U('Product/detail',array('id'=>$vo['id']));?>">
						<h2 class='title'><span class='productid'>A<?php echo ($vo["id"]); ?></span><?php echo ($vo["travel_title"]); ?></h2>
						</a>
						<ul class='product_list_wrapper'>							
							<li>
								<label>简述：</label>
								<p class='introduce'>
									<?php echo ($vo["travel_short_title"]); ?><a href="javascript:;">详情</a>
								</p>
							</li>
							<li>
								<label>价格：</label>
								<p class='desc'>
									<span class='price'>¥<?php echo ($vo["travel_price"]); ?></span> 元/人
								</p>
							</li>
						</ul>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>			
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