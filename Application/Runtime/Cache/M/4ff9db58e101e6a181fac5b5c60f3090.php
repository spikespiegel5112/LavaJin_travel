<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
	<title>机票预定</title>
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_icgfcixm8qn9izfr.css" />
	<link rel="stylesheet" href="/travel/Public/M/assets/css/font-awesome.css" />
	<link rel="stylesheet" href="/travel/Public/M/assets/css/swiper.min.css" />
	<link rel="stylesheet" href="/travel/Public/M/css/amazeui.datetimepicker.css" />
	<link rel="stylesheet" href="/travel/Public/M/css/reset.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/common.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/user.css" />
	<link rel='stylesheet' href="/travel/Public/M/css/access.css" />
	<script type="text/javascript" src='/travel/Public/M/assets/js/jquery.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/swiper.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/bootstrap-datetimepicker.min.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/locales/bootstrap-datetimepicker.zh-CN.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/jquery-validation/jquery.validate.js'></script>
	<script type="text/javascript" src='/travel/Public/M/assets/js/jquery-validation/locales/messages_zh.js'></script>
	<script type="text/javascript" src='/travel/Public/M/js/base.js'></script>
	<script type="text/javascript" src='/travel/Public/M/js/common.js'></script>
</head>

<body>
	<div class='main_container'>
		<div class="common_header_wrapper">
			<a class="left_btn back_btn" href="<?php echo U('Index/index');?>">
				<span class="iconfont icon-backward2"></span>
			</a>
			<p>机票预定</p>
		</div>
		<div class='order_message_wrapper'>
			<div class='common_error_wrapper'></div>
			<form class="common_form_wrapper common_block_wrapper">
				<div class="common_form_item">
					<label class='title'>出行日期</label>
					<div class='common_input_item'>
						<input class='departuredate' type='text' readonly data-date-format="yyyy-mm-dd" name='departuredate'>
					</div>
				</div>
				<div class='common_form_item'>
					<label class='title'>出发城市</label>
					<div class="common_input_item">
						<input type="text" name='departurecity'>
					</div>
				</div>
				<div class='common_form_item'>
					<label class='title'>到达城市</label>
					<div class="common_input_item">
						<input type="text" name='arrivalcity'>
					</div>
				</div>
				<div class='common_form_item'>
					<label class='title'>乘客姓名</label>
					<div class="common_input_item">
						<input type="text" name='name'>
					</div>
				</div>
				<div class='common_form_item'>
					<label class='title'>身份证</label>
					<div class="common_input_item">
						<input type="text" name='idcard'>
					</div>
				</div>
				<div class='common_form_item'>
					<label class='title'>联系电话</label>
					<div class="common_input_item">
						<input type="text" name='phonenumber'>
					</div>
				</div>
				<div class="common_form_item">
					<label class='title'>座舱规格</label>
					<div class='common_input_item'>
						<div class="common_radio_item">
							<label for="economy">经济舱</label>
							<input type="radio" id="economy" name='cabinspecification'>
						</div>
						<div class="common_radio_item">
							<label for="firstclass">头等舱</label>
							<input type="radio" id="firstclass" name='cabinspecification'>
						</div>
					</div>
				</div>
				<div class="common_form_item">
					<label class='title'>是否买过保险</label>
					<div class='common_input_item'>
						<div class="common_radio_item">
							<label for="yes">是</label>
							<input type="radio" id="yes" name='hassecurity'>
						</div>
						<div class="common_radio_item">
							<label for="no">否</label>
							<input type="radio" id="no" name='hassecurity'>
						</div>
					</div>
				</div>
				<div class='common_form_item'>
					<label class='title'>留言</label>
					<div class="common_input_item">
						<textarea name='message'></textarea>
					</div>
				</div>
				<input type='submit' class="common_blockbtn_item product_subscribe_item" value='立即预定' />
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
(function($) {
	$(function() {
		var messageHotal = {
			calender: function() {
				$('.departuredate').datetimepicker({
					format: 'yyyy-mm-dd',
					minView: 2,
					weekStart: 1,
					autoclose: true,
					language: 'zh-CN'
				})
			},
			validate: function() {
				$('.common_form_wrapper').validate({
					debug: true,
					submitHandler: function(form) {
						alert("提交事件!");
						form.submit();
					},
					errorElement: 'span',
					errorLabelContainer: $('.common_error_wrapper'),
					rules: {
						departuredate: {
							required: true
						},
						departurecity: {
							required: true
						},
						arrivalcity: {
							required: true
						},
						name: {
							required: true
						},
						phonenumber: {
							required: true,
							number: true,
							minlength: 11,
							maxlength: 11
						},
						idcard: {
							required: true,
							minlength: 18,
							maxlength: 18
						},
						cabinspecification:{
							required: true
						},
						hassecuritydd:{
							required: true
						},
						message: {
							required: true
						}

					}
				})
			},
			main: function() {
				this.calender();
				this.validate();
			},
			init: function() {
				this.main();
			}
		}
		messageHotal.init();
	})
})(jQuery)

</script>

</html>