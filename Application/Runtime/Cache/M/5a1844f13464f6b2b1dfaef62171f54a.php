<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title>酒店预定</title>
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
            <p>酒店留言</p>
        </div>
        <div class='order_message_wrapper'>
            <div class='common_error_wrapper'></div>
            <form class="common_form_wrapper common_block_wrapper">
                <div class="common_form_item">
                    <label class='title'>入住日期</label>
                    <div class='common_input_item'>
                        <input class='checkindate' type='text' readonly data-date-format="yyyy-mm-dd" name='checkindate'>
                    </div>
                </div>
                <div class="common_form_item">
                    <label class='title'>房间规格</label>
                    <div class='common_input_item' name='roomstandardinputgroup'>
                        <div class="common_radio_item">
                            <label for="danjian">单间</label>
                            <input type="radio" id="danjian" name='roomstandard'>
                        </div>
                        <div class="common_radio_item">
                            <label for="biaojian">标间</label>
                            <input type="radio" id="biaojian" name='roomstandard'>
                        </div>
                        <div class="common_radio_item">
                            <label for="haohua">豪华</label>
                            <input type="radio" id="haohua" name='roomstandard'>
                        </div>
                    </div>
                </div>
                <div class="common_form_item">
                    <label class='title'>房间类型</label>
                    <div class='common_input_item'>
                        <div class="common_radio_item">
                            <label for="tesekezhan">特色客栈</label>
                            <input type="radio" id="tesekezhan" name='roomtype'>
                        </div>
                        <div class="common_radio_item">
                            <label for="jignjixing">经济型</label>
                            <input type="radio" id="jignjixing" name='roomtype'>
                        </div>
                        <div class="common_radio_item">
                            <label for="sanxing">三星</label>
                            <input type="radio" id="sanxing" name='roomtype'>
                        </div>
                        <div class="common_radio_item">
                            <label for="sixing">四星</label>
                            <input type="radio" id="sixing" name='roomtype'>
                        </div>
                        <div class="common_radio_item">
                            <label for="wuxinghaohua">五星豪华</label>
                            <input type="radio" id="wuxinghaohua" name='roomtype'>
                        </div>
                    </div>
                </div>
                <div class='common_form_item'>
                    <label class='title'>姓名</label>
                    <div class="common_input_item">
                        <input type="text" name='name'>
                    </div>
                </div>
                <div class='common_form_item'>
                    <label class='title'>联系电话</label>
                    <div class="common_input_item">
                        <input type="text" name='phonenumber'>
                    </div>
                </div>
                <div class='common_form_item'>
                    <label class='title'>身份证</label>
                    <div class="common_input_item">
                        <input type="text" name='idcard'>
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
                $('.checkindate').datetimepicker({
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
                        checkindate: {
                            required: true
                        },
                        roomstandard: {
                            required: true
                        },
                        roomtype: {
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