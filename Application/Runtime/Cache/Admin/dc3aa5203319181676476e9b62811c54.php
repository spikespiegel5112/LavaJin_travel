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

	<article class="page-container">
        <form action="<?php echo U('travel/travel_category_update');?>" method="post" class="form form-horizontal" id="form-category-add">
        	<input type="hidden" name="id" value="<?php echo ($category["id"]); ?>" />
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>线路类别：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" value="<?php echo ($category["category"]); ?>" placeholder="类别名称必须唯一" id="category" name="category">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>类别编码：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" value="<?php echo ($category["category_code"]); ?>" placeholder="类别编码必须唯一" id="category_code" name="category_code">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>排序：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" value="<?php echo ($category["sort"]); ?>" placeholder="数字越大越靠前" id="sort" name="sort">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>是否启用：</label>
                <div class="formControls col-xs-9 col-sm-10 skin-minimal">
                    <div class="radio-box">
                        <input name="enable" type="radio" value="1" id="enable-1" <?php if(($category['enable'] == 1) OR ($category['id'] == 0)): ?>checked<?php endif; ?>>
                        <label for="enable-1">是</label>
                    </div>
                    <div class="radio-box">
                        <input name="enable" type="radio" value="0" id="enable-2" <?php if(($category['enable'] == 0) AND ($category['id'] != 0)): ?>checked<?php endif; ?>>
                        <label for="enable-2">否</label>
                    </div>
                </div>
            </div>            
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2">备注：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么..." onKeyUp="$.Huitextarealength(this,100)"><?php echo ($category["remark"]); ?></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>

<!-- 底部 -->
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!-- /底部 -->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-category-add").validate({
		rules:{
			category:{
				required:true,
				minlength:2,
				maxlength:20
			},
			category_code:{
				required:true,
				minlength:2,
				maxlength:20
			},
			sort:{
				required:true,
				digits:true
			},
			enable:{
				required:true,
			},		
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$.ajax({
			   type: "POST",
			   url: $('#form-category-add').attr('action'),
			   cache: false,
			   dataType: 'json',
			   data: $('#form-category-add').serialize(),
			   error: function(){},
			   success: function(json){
				   if(json.status==1){
					   layer.msg(json.info,{icon: 6,time:3000});
					   $('#reload',window.parent.document).trigger("click")
					   var index = parent.layer.getFrameIndex(window.name);
					   parent.layer.close(index);
				   }else{
					   layer.msg(json.info,{icon: 5,time:3000});
				   }
			   }
			});	
			//var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			//parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>