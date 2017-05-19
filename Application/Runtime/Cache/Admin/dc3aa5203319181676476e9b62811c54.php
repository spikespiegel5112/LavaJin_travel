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

	<link href="/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
	<style>
		.portfolio-area li{height:184px;}
		.portfolio-area li .portfoliobox{height:174px;} 
		.portfoliobox .icon{cursor:pointer;}
    </style>

<title>西藏旅游后台管理</title>
<meta name="keywords" content="西藏旅游v1.0">
<!-- <meta name="description" content="西藏旅游v1.0"> -->
</head>
<body>
<!-- /头部 -->

	<article class="page-container">
        <form action="<?php echo U('travel/travel_category_update');?>" method="post" class="form form-horizontal" id="form-category-add">
        	<input type="hidden" name="id" value="<?php echo ($category["id"]); ?>" />
            <input type="hidden" name="tmpFolder" value="<?php echo ($tmpFolder); ?>" />
            <input type="hidden" name="category_mainimg" value="<?php echo ($category['category_mainimg']); ?>" />        	
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
                <label class="form-label col-xs-4 col-sm-2">线路图片：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div class="uploader-thum-container">
                        <div id="filePicker">选择图片</div>
                        <button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                    </div>
                </div>
            </div>
            <div class="row cl">
				<ul id="fileList" class="portfolio-area col-xs-8 col-sm-10 col-xs-offset-4 col-sm-offset-2">
					<?php if(!empty($category['category_mainimg'])): ?><li class="item">
						<div class="portfoliobox">                    
                        	<div class="f-r">
                                <i class="icon Hui-iconfont" title="删除图片" onclick="delImg(this)">&#xe609;</i>
                            </div>                      	
							<div class="picbox">                            	
                            	<img src="<?php echo ($category['category_mainimg']); ?>">
                            </div>
						</div>
					</li><?php endif; ?>
				</ul>
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
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	
	$list = $("#fileList"),
	$btn = $("#btn-star"),
	state = "pending",
	uploader;

	var uploader = WebUploader.create({
		auto: true,
		multiple: false,  // false  单选 
		swf: '/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: '<?php echo U("travel/category_uploader",array("id"=>$category["id"],"tmpFolder"=>$tmpFolder));?>&category_mainimg='+$('input[name="category_mainimg"]').val(),
	
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick: '#filePicker',
	
		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		resize: false,
		// 只允许选择图片文件。
		accept: {
			title: 'Images',
			extensions: 'gif,jpg,jpeg,bmp,png',
			mimeTypes: 'image/jpg,image/jpeg,image/png'
		}
	});
	
	
	// 文件上传成功，给item添加成功class, 用样式标记上传成功。
	uploader.on( 'uploadSuccess', function( file , response ) {
		if(response.status){
			var $li = $(
			'<li class="item">'+
				'<div class="portfoliobox">'+
					'<div class="f-l  mainImg hide">'+
                        '<strong>主图</strong>'+
					'</div>'+
					'<div class="f-r">'+
						'<i class="icon Hui-iconfont" title="删除图片" onclick="delImg(this)">&#xe609;</i>'+
					'</div>'+
					'<div class="picbox"><a href="'+response.img+'" data-lightbox="gallery"><img src="'+response.img+'"></a></div>'+
				'</div>'+
			'</li>'
			);
			$('input[name="category_mainimg"]').val(response.img);
			$list.append( $li );			
		}else{
			alert(response.error)	
		}
	});
	
	uploader.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn.text('暂停上传');
        } else {
            $btn.text('开始上传');
        }
    });
	
	uploader.on('error', function(handler) {
	    if (handler == "Q_EXCEED_NUM_LIMIT") {
	        alert("只能上传一张图片");
	    }
	});

    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();
        }
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
//删除图片
function delImg(obj){
	var msg = "您真的确定要删除吗？\n\n请确认！"; 
	if (confirm(msg)==true){
		var portfoliobox = $(obj).parent().parent();
		var img = portfoliobox.find('.picbox img').attr('src');
		$.ajax({
		   type: "POST",
		   url: "<?php echo U('travel/delImg');?>",
		   cache: false,
		   dataType: 'json',
		   data: 'img='+img,
		   error: function(){},
		   success: function(json){
			   if(json.status==1){
				   $(obj).parent().parent().parent().remove();
				   if($('input[name="travel_mainimg"]').val()==img){
						$('input[name="travel_mainimg"]').val("");
						mainshow();
				   }				   
				   layer.msg(json.info,{icon: 6,time:3000});
			   }else{
				   layer.msg(json.info,{icon: 5,time:3000});
			   }
		   }
		});	
	}
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>