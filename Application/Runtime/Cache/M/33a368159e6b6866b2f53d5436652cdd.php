<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes" />
    <title>西藏旅游支付</title>
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
    <link rel="stylesheet" href="/travel/Public/M/assets/css/swiper.min.css" />
    <link rel="stylesheet" href="/travel/Public/M/css/reset.css" />
    <link rel='stylesheet' href="/travel/Public/M/css/common.css" />
    <link rel='stylesheet' href="/travel/Public/M/css/order.css" />
    <link rel='stylesheet' href="/travel/Public/M/css/access.css" />
    <script type="text/javascript" src='/travel/Public/M/assets/js/jquery.min.js'></script>
    <script type="text/javascript" src='/travel/Public/M/assets/js/swiper.min.js'></script>
    <script type="text/javascript" src='/travel/Public/M/js/base.js'></script>
    <script type="text/javascript" src='/travel/Public/M/js/common.js'></script>
</head>

<body>
    <div class='main_container'>
        <div class="common_header_wrapper">
            <a class="left_btn back_btn" href="<?php echo U('Order/index');?>">
                <span class="iconfont icon-backward2"></span>
            </a>
            <p>支付订单</p>
        </div>
        <div class="common_block_wrapper">
			<ul class="order_detail_wrapper">
				<li>
					<label>订单号</label>
					<p>
						170417948651
					</p>
				</li>
				<li>
					<label>商品名</label>
					<p>
						文成公主实景剧门票
					</p>
				</li>
				<li>
					<label>套餐名</label>
					<p>
						看台一区285元
					</p>
				</li>
				<li>
					<label>联系人</label>
					<p>
						按时打算
					</p>
				</li>
				<li>
					<label>联系电话</label>
					<p>
						18250045855
					</p>
				</li>

				<li>
					<label>出行时间</label>
					<p>
						2017-04-20
					</p>
				</li>
				<li>
					<label>出行人数</label>
					<p>
						¥285/成人×1
					</p>
				</li>
				<li>
					<label>总价</label>
					<p>
						¥285
					</p>
				</li>
				<li>
					<label>红包抵现</label>
					<p>
						-¥0
					</p>
				</li>
				<li>
					<label>实付</label>
					<p class='price'>
						¥285
					</p>
				</li>
			</ul>
			<div class='common_navgap_item'></div>
			<a class="common_blockbtn_item" href="javascript:;">立即支付</a>
		</div>
       
    </div>
</body>
<script type="text/javascript">
(function($) {
    $(function() {
        var orderList = {
            align: function() {
                $('.order_list_wrapper .thumbnail img').align({
                    container: '.order_list_wrapper .thumbnail'
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