<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/Public/Admin/H-ui.admin_v3.0/favicon.ico" >
<link rel="Shortcut Icon" href="/Public/Admin/H-ui.admin_v3.0/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Admin/H-ui.admin_v3.0/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/H-ui.admin_v3.0/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<!-- /样式 -->

<title>西藏旅游后台管理</title>
<meta name="keywords" content="西藏旅游v1.0">
<!-- <meta name="description" content="西藏旅游v1.0"> -->
</head>
<body>
<!-- 头部 -->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo U('index');?>">西藏旅游</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="<?php echo U('index');?>">西藏旅游</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs"></span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="product_add('添加线路','<?php echo U('travel/travel_edit');?>')"><i class="Hui-iconfont">&#xe613;</i> 线路</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<!-- <li><?php echo ($menber['realname']); ?></li> -->
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo ($menber['username']); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
                        	<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>							
							<li><a href="<?php echo U('Admin/login/logout');?>">退出</a></li>
						</ul>
					</li>
					<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">0</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<!-- 左侧菜单 -->
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Member/index');?>" data-title="会员列表" href="javascript:;">会员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-order">
		<dt><i class="Hui-iconfont">&#xe687;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a data-href="<?php echo U('Order/index');?>" data-title="订单列表" href="javascript:;">订单列表</a></li>
			</ul>
		</dd>
			<dl id="menu-hotel">
			<dt><i class="Hui-iconfont">&#xe67f;</i> 酒店管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Hotel/index');?>" data-title="酒店列表" href="javascript:;">酒店列表</a></li>
				</ul>
			</dd>
		</dl>
	
		<dl id="menu-jipiao">
			<dt><i class="Hui-iconfont">&#xe67f;</i> 机票管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('JiPiao/index');?>" data-title="机票列表" href="javascript:;">机票列表</a></li>
				</ul>
			</dd>
		</dl>


		<dl id="menu-travel">
			<dt><i class="Hui-iconfont">&#xe6c5;</i> 旅游线路<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('travel/travel_edit');?>" data-title="新增线路" href="javascript:void(0)">新增线路</a></li>
					<li><a data-href="<?php echo U('travel/travel_list');?>" data-title="线路列表" href="javascript:void(0)">线路列表</a></li>
					<li><a data-href="<?php echo U('travel/travel_category');?>" data-title="线路分类" href="javascript:void(0)">线路分类</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-carrental">
			<dt><i class="Hui-iconfont">&#xe6c5;</i> 汽车租赁<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('carrental/carrental_edit');?>" data-title="新增车辆" href="javascript:void(0)">新增车辆</a></li>
					<li><a data-href="<?php echo U('carrental/carrental_list');?>" data-title="车辆列表" href="javascript:void(0)">车辆列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('User/index');?>" data-title="管理员列表" href="javascipt:;">管理员列表</a> </li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!-- /头部 -->

    <section class="Hui-article-box">
        <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
            <div class="Hui-tabNav-wp">
                <ul id="min_title_list" class="acrossTab cl">
                    <li class="active">
                        <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                        <em></em></li>
            </ul>
        </div>
            <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
        <div id="iframe_box" class="Hui-article">
            <div class="show_iframe">
                <div style="display:none" class="loading"></div>
                <iframe scrolling="yes" frameborder="0" src="<?php echo U('welcome');?>"></iframe>
        </div>
    </div>
    </section>
    
    <div class="contextMenu" id="Huiadminmenu">
        <ul>
            <li id="closethis">关闭当前 </li>
            <li id="closeall">关闭全部 </li>
        </ul>
    </div>

<!-- 底部 -->
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!-- /底部 -->


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
	/*个人信息*/
	function myselfinfo(){
		layer.open({
			type: 1,
			area: ['300px','200px'],
			fix: false, //不固定
			maxmin: true,
			shade:0.4,
			title: '查看信息',
			content: '<div>管理员信息</div>'
		});
	}
	
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


</body>
</html>