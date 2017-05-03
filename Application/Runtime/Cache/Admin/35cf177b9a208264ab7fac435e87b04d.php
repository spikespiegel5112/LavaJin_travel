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

<title>西藏旅游v1.0</title>
<meta name="keywords" content="西藏旅游v1.0">
<meta name="description" content="西藏旅游v1.0">
</head>
<body>
<!-- /头部 -->

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 线路管理 <span class="c-gray en">&gt;</span> 线路类别 <a id="reload" class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:void(0);" onclick="location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onClick="category_edit('类别编辑','<?php echo U('travel/travel_category_edit');?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加类别</a>
            </span>
            <span class="r">共有数据：<strong id="dataTableCount"><?php echo count($category_list);?></strong> 条</span>
        </div>
        <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
                <tr class="text-c">
                    <th width="40">ID</th>
                    <th width="150">类别编码</th>
                    <th width="150">线路类别</th>
                    <th width="40">排序</th>
                    <th width="40">状态</th>
       				<th width="200">备注</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
            	<?php if(is_array($category_list)): $k = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="text-c">
                    <td><?php echo ($k); ?></td>
                    <td><?php echo ($vo["category_code"]); ?></td>
                    <td><?php echo ($vo["category"]); ?></td>
                    <td><?php echo ($vo["sort"]); ?></td>                    
                    <td class="td-status">
                    	<?php if($vo['enable'] == 1): ?><span class="label label-success radius">已启用</span>
                        <?php else: ?>
                        	<span class="label label-defaunt radius">已停用</span><?php endif; ?>
                    </td>
                    <td><?php echo ($vo["remark"]); ?></td>
                    <td class="td-manage">
                    	<?php if($vo['enable'] == 1): ?><a style="text-decoration:none" onClick="category_stop(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
                        <?php else: ?>
                        	<a style="text-decoration:none" onClick="category_start(this,'<?php echo ($vo["id"]); ?>')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a><?php endif; ?>
                        <a title="编辑" href="javascript:;" onClick="category_edit('编辑','<?php echo U('travel/travel_category_edit',array('id'=>$vo['id']));?>','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        <a title="删除" href="javascript:;" onClick="category_del(this,'<?php echo ($vo["id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </div>
    </div>

<!-- 底部 -->
<footer class="footer mt-20">
	<div class="container">
		<p>版权所有：中国航天科技集团公司七三八疗养院<br>
			地址：无锡市大浮西渚头1号　邮编：214081</p>
	</div>
</footer>
<!-- /底部 -->
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/js/H-ui.admin.js"></script> 

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/laypage/1.2/laypage.js"></script>
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
function category_edit(title,url,w,h){
	layer_show(title,url,w,h);
}

/*用户-停用*/
function category_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("travel/travel_category_enable");?>',
			data:'enable=stop&id='+id,
			dataType: 'json',
			success: function(data){
				if(data.status==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="category_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 6,time:1500});
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

/*用户-启用*/
function category_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("travel/travel_category_enable");?>',
			data:'enable=start&id='+id,
			dataType: 'json',
			success: function(data){
				if(data.status==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="category_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
					$(obj).remove();
					layer.msg('已启用!',{icon: 6,time:1500});
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
function category_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("travel/travel_category_delete");?>',
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