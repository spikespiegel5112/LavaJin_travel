<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
	<title>租车详情</title>
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
		<div class="common_header_wrapper fixed transparent">
			<a class="common_navbtn_item" href="<?php echo U('Carrent/index');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
		</div>
		<div class='carrent_introduce_wrapper'>
			<div class='thumbnail'>
				<img src="<?php echo ($carrental["carrental_mainimg"]); ?>">
			</div>
			<div class='main'>
				<h2 class='title'><?php echo ($carrental["carrental_title"]); ?></h2>
				<ul class='property'>
					<li>
						<label>所属品牌：</label>
						<span><?php echo ($carrental["carrental_brand"]); ?></span>
					</li>
					<li>
						<label>车辆级别：</label>
						<span><?php echo ($carrental["carrental_level"]); ?></span>
					</li>
					<li>
						<label>可乘人数/座位数：</label>
						<span><?php echo ($carrental["carrental_seatnumber"]); ?></span>
					</li>
				</ul>
			</div>
			<div class='introduce'>
				<p>
					<?php echo ($carrental["carrental_briefing"]); ?>
				</p>
			</div>
		</div>
		<div class='carrent_pricelist_wrapper'>
			<table>
				<colgroup>
					<col style="width: 30% ">
					<col style="width: 10%; ">
					<col style="width: 10%; ">
					<col style="width: 10%; ">
					<col style="width: 10%; ">
				</colgroup>
				<thead>
					<tr>
						<td>价格类型</td>
						<td>门市价</td>
						<td>优惠价</td>
						<td>单位</td>
						<td>预订</td>
					</tr>
				</thead>
				<tbody>
                	<?php if(is_array($carrental_category)): $i = 0; $__LIST__ = $carrental_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($vo["travel_carrental_category_title"]); ?></td>
						<td>¥<?php echo ($vo["travel_carrental_category_original_price"]); ?></td>
						<td class='preferentialprice'>¥<?php echo ($vo["travel_carrental_category_price"]); ?></td>
						<td><?php echo ($vo["travel_carrental_category_unit"]); ?></td>
						<!-- <td><a href="javascript:;">预订</a></td> -->
						<td><button type="button" class="btn btn-primary">预定</button></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<div class='carrent_detail_wrapper'>
			<div class='title'>
				<ul>
					<li class='active'>
						<a href="javascript:;">车型介绍</a>
					</li>
				</ul>
			</div>
			<div class='content'>
				<ul>
					<li class='introduce'>
						<?php echo ($carrental["carrental_introduce"]); ?>
					</li>
				</ul>
			</div>
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
					<a href='#'>
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

</html>