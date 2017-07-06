<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/travel/Public/Admin/H-ui.admin_v3.0/favicon.ico" >
<link rel="Shortcut Icon" href="/travel/Public/Admin/H-ui.admin_v3.0/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/travel/Public/Admin/H-ui.admin_v3.0/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/css/style.css" />
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
<!-- /头部 -->

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 特色产品 <span class="c-gray en">&gt;</span> <?php echo ($tese_name); ?> <span class="c-gray en">&gt;</span> <?php echo ($tese_name); ?>列表 <a id="reload" class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:void(0);" onclick="location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onClick="tese_edit('新增<?php echo ($tese_name); ?>','<?php echo U('tese/tese_edit',array('category'=>$tese_category));?>','1600','850')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 新增<?php echo ($mall_name); ?></a>
            </span>
            <span class="r">共有数据：<strong id="dataTableCount"><?php echo count($tese_list);?></strong> 条</span>
        </div>
        <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th width="40">缩略图</th>
                    <th width="300"><?php echo ($tese_name); ?></th>
                    <th width="40">原价</th>
                    <th width="40">售卖价</th>
                    <th width="40">状态</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
            	<?php if(is_array($tese_list)): $k = 0; $__LIST__ = $tese_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="text-c">
                    <td><?php echo ($k); ?></td>
                    <td><?php if($vo['smallImg'] != ''): ?><img src="<?php echo ($vo['smallImg']); ?>" style="width:60px;"><?php endif; ?></td>
                    <td><?php echo ($vo["mall_title"]); ?></td>
                    <td><?php echo ($vo["mall_original_price"]); ?></td>
                    <td><?php echo ($vo["tmall_price"]); ?></td>               
                    <td class="td-status">
                    	<?php if($vo['tese_status'] == 1): ?><span class="label label-success radius">已上架</span>
                        <?php else: ?>
                        	<span class="label label-defaunt radius">已下架</span><?php endif; ?>
                    </td>
                    <td class="td-manage">
                    	<?php if($vo['tese_status'] == 1): ?><a style="text-decoration:none" onClick="tese_stop(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe631;</i></a> 
                        <?php else: ?>
                        	<a style="text-decoration:none" onClick="tese_start(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="上架"><i class="Hui-iconfont">&#xe6e1;</i></a><?php endif; ?>
                        <a title="编辑" href="javascript:;" onClick="tese_edit('线路更新','<?php echo U('tese/tese_edit',array('id'=>$vo['id']));?>','1600','850')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        <a title="删除" href="javascript:;" onClick="tese_del(this,'<?php echo ($vo["id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </div>
    </div>

<!-- 底部 -->
<footer class="footer mt-20">
	<div class="container">
		<p>Auth:LavaJin</p>
	</div>
</footer>
<!-- /底部 -->
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/js/H-ui.admin.js"></script> 

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  //{"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
});
/*用户-添加*/
function tese_edit(title,url,w,h){
	layer_show(title,url,w,h);
}

/*用户-下架*/
function tese_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("tese/tese_status");?>',
			data:'status=stop&id='+id,
			dataType: 'json',
			success: function(data){
				if(data.status==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="tese_start(this,'+id+')" href="javascript:;" title="上架"><i class="Hui-iconfont">&#xe6e1;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
					$(obj).remove();
					layer.msg('已下架!',{icon: 6,time:1500});
				}else{
					layer.msg(data.info,{icon: 5,time:1500});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-上架*/
function tese_start(obj,id){
	layer.confirm('确认要上架吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("tese/tese_status");?>',
			data:'status=start&id='+id,
			dataType: 'json',
			success: function(data){
				if(data.status==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="tese_stop(this,'+id+')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已上架</span>');
					$(obj).remove();
					layer.msg('已上架!',{icon: 6,time:1500});
				}else{
					layer.msg(data.info,{icon: 5,time:1500});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*用户-删除*/
function tese_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("tese/tese_delete");?>',
			data:'id='+id,
			dataType: 'json',
			success: function(data){
				if(data.status==1){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1500});
				}else{
					layer.msg(data.info,{icon: 5,time:1500});
				}
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

</script> 

</body>
</html>