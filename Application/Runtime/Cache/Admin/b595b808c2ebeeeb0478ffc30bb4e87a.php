<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>2.3
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/travel/Public/Admin/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/travel/Public/Admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/travel/Public/Admin/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/travel/Public/Admin/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="/travel/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台管理系统</title>
<meta name="keywords" content="网站后台">
<meta name="description" content="后台管理系统">
</head>
<body>
<header class="Hui-header cl"> <a class="Hui-logo l" title="admin" href="/">后台管理系统</a> <a class="Hui-logo-m l" href="/" title="admin">admin</a>
	<nav class="mainnav cl" id="Hui-nav">
		<ul>
			<li class="dropDown dropDown_click"><a href="javascript:;" aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
				<ul class="dropDown-menu radius box-shadow">
					<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
					<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
					<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
					<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<ul class="Hui-userbar">
		<li>超级管理员</li>
		<li class="dropDown dropDown_hover"><a href="#" class="dropDown_A">admin<i class="Hui-iconfont">&#xe6d5;</i></a>
			<ul class="dropDown-menu radius box-shadow">
				<li><a href="#">个人信息</a></li>
				<li><a href="#">切换账户</a></li>
				<li><a href="<?php echo U('Index/logout');?>">退出</a></li>
			</ul>
		</li>
		<!--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a>-->
		<!--</li>-->
		<li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
			<ul class="dropDown-menu radius box-shadow">
				<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
				<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
				<!--<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>-->
				<!--<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>-->
				<!--<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>-->
				<!--<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>-->
			</ul>
		</li>
	</ul>
	<a href="javascript:;" class="Hui-nav-toggle Hui-iconfont" aria-hidden="false">&#xe667;</a> </header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<!--<dl id="menu-order">
			<dt><i class="Hui-iconfont">&#xe63a;</i> 财务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="order-list.html" href="javascript:void(0)">订单列表</a></li>
					<li><a _href="recharge-list.html" href="javascript:void(0)">充值管理</a></li>
					<li><a _href="invoice-list.html" href="javascript:void(0)">发票管理</a></li>
				</ul>
			</dd>
		</dl>-->
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Member/index');?>" data-title="会员列表" href="javascript:;">会员列表</a></li>
				</ul>
			</dd>
		</dl>

		<dl id="menu-member">
		<dt><i class="Hui-iconfont">&#xe687;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a _href="<?php echo U('Order/index');?>" data-title="订单列表" href="javascript:;">订单列表</a></li>
			</ul>
		</dd>


		<!--<dl id="menu-admin">-->
			<!--<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
			<!--<dd>-->
				<!--<ul>-->
					<!--<li><a _href="admin-role.html" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>-->
					<!--<li><a _href="admin-permission.html" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>-->
					<!--<li><a _href="admin-list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>-->
				<!--</ul>-->
			<!--</dd>-->
		<!--</dl>-->
		<!--<dl id="menu-tongji">-->
			<!--<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
			<!--<dd>    -->
				<!--<ul>  -->
				<!--&lt;!&ndash;-->
					<!--<li><a _href="charts-1.html" data-title="折线图" href="javascript:void(0)">折线图</a></li>-->
					<!--<li><a _href="charts-2.html" data-title="时间轴折线图" href="javascript:void(0)">时间轴折线图</a></li>-->
					<!--<li><a _href="charts-3.html" data-title="区域图" href="javascript:void(0)">区域图</a></li>-->
					<!--<li><a _href="charts-4.html" data-title="柱状图" href="javascript:void(0)">柱状图</a></li>-->
					<!--<li><a _href="charts-5.html" data-title="饼状图" href="javascript:void(0)">饼状图</a></li>-->
					<!--<li><a _href="charts-6.html" data-title="3D柱状图" href="javascript:void(0)">3D柱状图</a></li>-->
					<!--<li><a _href="charts-7.html" data-title="3D饼状图" href="javascript:void(0)">3D饼状图</a></li>-->
					  <!--&ndash;&gt;-->
				<!--</ul>-->
			<!--</dd>-->
		<!--</dl>-->
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('User/index');?>" data-title="管理员列表" href="javascipt:;">管理员列表</a> </li>
					<li><a _href="<?php echo U('User/add');?>" data-title="添加管理员" href="javascipt:;">添加管理员</a> </li>
					<!--<li><a _href="system-base.html" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>-->
					<!--<li><a _href="system-category.html" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>-->
					<!--<li><a _href="system-data.html" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>-->
					<!--<li><a _href="system-shielding.html" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>-->
					<!--<li><a _href="system-log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>-->
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="{:U('Index/Welcome')}">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('Index/welcome');?>"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="/travel/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script> 
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s)})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>