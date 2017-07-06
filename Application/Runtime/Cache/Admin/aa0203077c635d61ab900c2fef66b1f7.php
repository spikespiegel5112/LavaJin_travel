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

	<link href="/travel/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
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
        <form action="<?php echo U('tese_update');?>" method="post" class="form form-horizontal" id="form-tese-add">
        	<input type="hidden" name="id" value="<?php echo ($tese['id']); ?>" />
        	<input type="hidden" name="tese_category" value="<?php echo ($tese_category); ?>" />
            <input type="hidden" name="tmpFolder" value="<?php echo ($tmpFolder); ?>" />
            <input type="hidden" name="tese_mainimg" value="<?php echo ($tese['tese_mainimg']); ?>" />
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($tese['tese_title']); ?>" placeholder="" id="" name="tese_title">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">简略标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($tese['tese_short_title']); ?>" placeholder="" id="" name="tese_short_title">
                </div>
            </div>          
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">排序值：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($tese['tese_sort']); ?>" placeholder="数字越大越靠前" id="" name="tese_sort" style="width:20%;">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">允许评论：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox-1" value="1" name="tese_allow_comment" <?php if($tese['tese_allow_comment'] == 1): ?>checked<?php endif; ?>>
                        <label for="checkbox-1">&nbsp;</label>
                    </div>
                </div>
            </div>            
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">原价：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" name="tese_original_price" id="" placeholder="" value="<?php echo ($tese['tese_original_price']); ?>" class="input-text" style="width:20%">
                    元</div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">*售卖价：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" name="tese_price" id="" placeholder="" value="<?php echo ($tese['tese_price']); ?>" class="input-text" style="width:20%">
                    元</div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">上架：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox-1" value="1" name="tese_status" <?php if($tese['tese_status'] == 1): ?>checked<?php endif; ?>>
                        <label for="checkbox-1">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">商品亮点：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="tese_highlights" cols="" rows="" class="textarea"  placeholder="多个亮点用英文|隔开" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,400)"><?php echo ($tese['tese_highlights']); ?></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/400</p>
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
                <label class="form-label col-xs-4 col-sm-2">详细内容：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
                    <script id="editor" type="text/plain" style="width:100%;height:400px;"><?php echo ($tese['tese_introduce']); ?></script> 
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
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/static/h-ui.admin/js/H-ui.admin.js"></script> 

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/travel/Public/Admin/H-ui.admin_v3.0/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
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
		swf: '/travel/Public/Admin/H-ui.admin_v3.0/lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: '<?php echo U("public/uploader",array("id"=>$tese["id"],"tmpFolder"=>$tmpFolder,"savePath"=>"tese"));?>',
	
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
		   url: "<?php echo U('tese/delImg');?>",
		   cache: false,
		   dataType: 'json',
		   data: 'img='+img,
		   error: function(){},
		   success: function(json){
			   if(json.status==1){
				   $(obj).parent().parent().parent().remove();
				   if($('input[name="tese_mainimg"]').val()==img){
						$('input[name="tese_mainimg"]').val("");
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
	$('input[name="tese_mainimg"]').val(img);
	mainshow();
}
//主图两个字显示
function mainshow(){
	var tese_mainimg = $('input[name="tese_mainimg"]').val();
	if(tese_mainimg==''){
		$('.portfoliobox:eq(0)').find('.mainImg').removeClass("hide");
	}else{
		$('.portfoliobox').each(function(){
			if($(this).find('.picbox img').attr('src')==tese_mainimg){
				$(this).find('.mainImg').removeClass("hide");
			}else{
				if(!$(this).find('.mainImg').hasClass("hide")) $(this).find('.mainImg').addClass("hide");
			}
		});
	}
}



$(function(){
	var ue = UE.getEditor('editor',{textarea:'tese_introduce'});
	
	$("#form-tese-add").validate({
		rules:{
			tese_title:{
				required:true,
				minlength:2,
				maxlength:200
			},
			tese_original_price:{
				required:true,
				digits:true
			},
			tese_price:{
				required:true,
				digits:true
			}		
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",		
	});
	
	mainshow();
});
</script>

</body>
</html>