<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes" />
	<title>产品详情</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/Public/M/css/common.css" />
	<link rel='stylesheet' href="/Public/M/css/order.css" />
	<link rel='stylesheet' href="/Public/M/css/access.css" />
	<link rel='stylesheet' href="/Public/M/css/product.css" />
	<script type="text/javascript" src='/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/Public/M/js/common.js'></script>
</head>

<body>
	<div class='main_container'>
		<div class="common_header_wrapper fixed transparent">
			<a class="common_navbtn_item" href="<?php echo U('Index/index');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
		</div>
		<div class='product_detailbanner_wrapper'>
			<img src="/Public/M/images/banner_articlelist_announcement_00000.jpg">
		</div>
		<div class='common_block_wrapper'>
			<div class='product_detailtitle_wrapper'>
				<h2><?php echo ($travel["travel_title"]); ?></h2>
				<p><?php echo ($travel["travel_short_title"]); ?></p>
			</div>
			<div class='product_detailprice_wrapper'>
				<label class='peoples'><span class='iconfont'></span>68人参加过</label>
				<div class='price'>
					<span>￥<?php echo ($travel["travel_price"]); ?></span>
					<label>￥<?php echo ($travel["travel_original_price"]); ?></label>
				</div>
			</div>
			<div class='product_detailredpocket_wrapper'>
				<div class='common_redpacket_item'>
					<span class='redpacketicon'></span>
					<label>使用红包再减10元</label>
				</div>
				<a class='getredpocket' href="javascript:;">没有红包？快戳这里~</a>
			</div>
		</div>
		<div class='common_block_wrapper'>
			<div class='common_producttitle_item'>
				<h2>商品亮点</h2>
			</div>
			<div class='product_detailhighlight_wrapper'>
				<ul>
					<?php if(is_array($travel_highlights)): $i = 0; $__LIST__ = $travel_highlights;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<span></span>
						<label><?php echo ($vo); ?></label>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<div class='common_block_wrapper'>
			<div class='common_producttitle_item'>
				<h2>评论</h2>
			</div>
			<div class='product_detailcomment_wrapper'>
				<div class='statistics'>
					全部评价
					<label>5</label>条 好评率
					<label class='active'>80</label>条
				</div>
			</div>
		</div>
		<?php echo ($travel["travel_introduce"]); ?>
		<div class="common_block_wrapper">
			<div class='common_navgap_item'></div>
			<div>
				<a class='iconfont icon-receiver' href="javascript:;">

				</a>
				<a class="common_blockbtn_item" href="javascript:;">立即支付</a>
			</div>
			
		</div>
	</div>
</body>
<script type="text/javascript">
(function($) {
	$(function() {
		var orderList = {
			align: function() {
				$('.product_detailbanner_wrapper img').align({
					container: '.product_detailbanner_wrapper'
				})
			},
			tab: function() {
				var that = this;
				$('.order_tab_wrapper li').tabSwitch({
					classname: '.order_list_wrapper>ul>li',
					callback: function() {
						that.align()
					}
				})
			},
			main: function() {
				this.align()
				this.tab();
			},
			init: function() {
				this.main();
			}
		}
		orderList.init();
	})
})(jQuery)
</script>

</html>