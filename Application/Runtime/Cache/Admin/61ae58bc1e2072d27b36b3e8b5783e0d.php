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

	<div class="page-container">
        <form action="<?php echo U('carrental_update');?>" method="post" class="form form-horizontal" id="form-travel-add">
        	<input type="hidden" name="id" value="<?php echo ($carrental['id']); ?>" />
            <input type="hidden" name="tmpFolder" value="<?php echo ($tmpFolder); ?>" />
            <input type="hidden" name="carrental_mainimg" value="<?php echo ($carrental['carrental_mainimg']); ?>" />
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>租赁汽车标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($carrental['carrental_title']); ?>" placeholder="" id="" name="carrental_title">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">汽车品牌：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($carrental['carrental_brand']); ?>" placeholder="" id="" name="carrental_brand">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">汽车级别：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($carrental['carrental_level']); ?>" placeholder="" id="" name="carrental_level">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">可乘人数/座位数：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($carrental['carrental_seatnumber']); ?>" placeholder="" id="" name="carrental_seatnumber">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">汽车库存量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($carrental['carrental_number']); ?>" placeholder="填写可以租赁的总量数" id="" name="carrental_number" style="width:20%;"> 辆
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">车辆简介：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <TEXTAREA name="carrental_briefing"  class="input-text" style="height:80px;"><?php echo ($carrental['carrental_briefing']); ?></TEXTAREA>
                </div>
            </div>            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">排序值：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($carrental['carrental_sort']); ?>" placeholder="数字越大越靠前" id="" name="carrental_sort" style="width:20%;">
                </div>
            </div>           
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">上架：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox-1" value="1" name="carrental_status" <?php if($carrental['carrental_status'] == 1): ?>checked<?php endif; ?>>
                        <label for="checkbox-1">&nbsp;</label>
                    </div>
                </div>
            </div>	
            <div id="carrentalCategory" class="row cl">
                <label class="form-label col-xs-4 col-sm-2">线路类别：</label>
                <div class="formControls col-xs-8 col-sm-9">
                   <ul>
                   		<li class="col-xs-3 col-sm-3">价格类型</li>
                   		<li class="col-xs-2 col-sm-2">市场价格</li>
                   		<li class="col-xs-2 col-sm-2">价格</li>
                   		<li class="col-xs-2 col-sm-2">单位</li>
                   		<li class="col-xs-2 col-sm-2">排序</li>
                   		<li class="col-xs-1 col-sm-1">操作<a class="f-r" style="text-decoration:none;" onclick="addCategory()" href="javascript:;" title="添加"><i class="Hui-iconfont">&#xe600;</i></a></li>
                   </ul>                 
                </div>
                <?php if(is_array($carrental_category)): $i = 0; $__LIST__ = $carrental_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="formControls col-xs-8 col-sm-9 col-xs-8 col-xs-offset-4 col-sm-offset-2">
                   <span class="col-xs-3 col-sm-3"><input type="hidden" name="travel_carrental_category_id[]" value="<?php echo ($vo['id']); ?>"><input type="text" class="input-text" value="<?php echo ($vo['travel_carrental_category_title']); ?>" placeholder="价格类型" id="" name="travel_carrental_category_title[]"></span>
                   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="<?php echo ($vo['travel_carrental_category_original_price']); ?>" placeholder="市场价格" id="" name="travel_carrental_category_original_price[]"></span>
                   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="<?php echo ($vo['travel_carrental_category_price']); ?>" placeholder="价格" id="" name="travel_carrental_category_price[]"></span>
                   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="<?php echo ($vo['travel_carrental_category_unit']); ?>" placeholder="单位" id="" name="travel_carrental_category_unit[]"></span>
                   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="<?php echo ($vo['travel_carrental_category_sort']); ?>" placeholder="排序" id="" name="travel_carrental_category_sort[]"></span> 
                   <span class="col-xs-1 col-sm-1"><a style="text-decoration:none" onclick="delCategory(this)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe609;</i></a></span>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            
            
                   
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">车辆图片：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div class="uploader-thum-container">
                        <div id="filePicker">选择图片</div>
                        <button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                    </div>
                </div>
            </div>
            <div class="row cl">
				<ul id="fileList" class="portfolio-area col-xs-8 col-sm-10 col-xs-offset-4 col-sm-offset-2">
					<?php if(is_array($imageList)): $i = 0; $__LIST__ = $imageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item">
						<div class="portfoliobox">
                        	<div class="f-l mainImg hide">
                            	<strong>主图</strong>
                            </div>
                        	<div class="f-r">
                                <i class="icon Hui-iconfont" title="设为主图" onclick="setMain(this)">&#xe725;</i>
                                <i class="icon Hui-iconfont" title="删除图片" onclick="delImg(this)">&#xe609;</i>
                            </div>                      	
							<div class="picbox">                            	
                            	<img src="<?php echo ($vo); ?>">
                            </div>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div> 
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">车型介绍：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
                    <script id="editor" type="text/plain" style="width:100%;height:400px;"><?php echo ($carrental['carrental_introduce']); ?></script> 
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                    <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>

<!-- 底部 -->
<footer class="footer mt-20">
	<div class="container">
		<p>Auth:LavaJin</p>
	</div>
</footer>
<!-- /底部 -->
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/js/H-ui.admin.js"></script> 

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/Public/Admin/H-ui.admin_v3.0/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
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
		swf: '/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: '<?php echo U("travel/uploader",array("id"=>$travel["id"],"tmpFolder"=>$tmpFolder));?>',
	
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
						'<i class="icon Hui-iconfont" title="设为主图" onclick="setMain(this)">&#xe725;</i>'+
						'<i class="icon Hui-iconfont" title="删除图片" onclick="delImg(this)">&#xe609;</i>'+
					'</div>'+
					'<div class="picbox"><a href="'+response.img+'" data-lightbox="gallery"><img src="'+response.img+'"></a></div>'+
				'</div>'+
			'</li>'
			);
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

    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();
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

//设置主图
function setMain(obj){
	var portfoliobox = $(obj).parent().parent();
	var img = portfoliobox.find('.picbox img').attr('src');
	$('input[name="travel_mainimg"]').val(img);
	mainshow();
}
//主图两个字显示
function mainshow(){
	var travel_mainimg = $('input[name="travel_mainimg"]').val();
	if(travel_mainimg==''){
		$('.portfoliobox:eq(0)').find('.mainImg').removeClass("hide");
	}else{
		$('.portfoliobox').each(function(){
			if($(this).find('.picbox img').attr('src')==travel_mainimg){
				$(this).find('.mainImg').removeClass("hide");
			}else{
				if(!$(this).find('.mainImg').hasClass("hide")) $(this).find('.mainImg').addClass("hide");
			}
		});
	}
}
//添加线路类别
function addCategory(){
	var htm = '<div class="formControls col-xs-8 col-sm-9 col-xs-8 col-xs-offset-4 col-sm-offset-2">';
        htm += '   <span class="col-xs-3 col-sm-3"><input type="hidden" name="travel_carrental_category_id[]"><input type="text" class="input-text" value="" placeholder="价格类型" id="" name="travel_carrental_category_title[]"></span>';
        htm += '   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="" placeholder="市场价格" id="" name="travel_carrental_category_original_price[]"></span>';
        htm += '   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="" placeholder="价格" id="" name="travel_carrental_category_price[]"></span>';
        htm += '   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="" placeholder="单位" id="" name="travel_carrental_category_unit[]"></span>';
        htm += '   <span class="col-xs-2 col-sm-2"><input type="text" class="input-text" value="" placeholder="排序" id="" name="travel_carrental_category_sort[]"></span>'; 
        htm += '   <span class="col-xs-1 col-sm-1"><a style="text-decoration:none" onclick="delCategory(this)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe609;</i></a></span>';
        htm += '</div>';
	$('#carrentalCategory').append(htm);
}
//删除线路类别
function delCategory(obj){
	$(obj).parent().parent().remove();
}


$(function(){
	var ue = UE.getEditor('editor',{textarea:'carrental_introduce'});
	
	$("#form-travel-add").validate({
		rules:{
			travel_title:{
				required:true,
				minlength:2,
				maxlength:200
			},
			travel_column:{
				required:true,
			},
			travel_original_price:{
				required:true,
				digits:true
			},
			travel_price:{
				required:true,
				digits:true
			}		
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",		
	});
	
	mainshow();
	
	<?php if(empty($carrental_category)): ?>addCategory();<?php endif; ?>
});
</script>

</body>
</html>