/*延迟加载列表图片——文档加载完成后，按顺序加载图片文件*/
$(document).ready(function() {

    var productId = getUrlParam("id");
    var url = '/products/' + productId + '/section-';
    var sets;
    var currentSetId;
    var currentDate;
    var prices = new Object();
    var endState = 0;
    var offset = 0;
    var count = 20;

   

    $('#buyBtn').on('click', function() {

        if (!document.getElementById('mask')) {
            $('body').append('<div id="mask"></div>');
        }
        $('#mask').on('click', function() {
            $('#model').remove();
            $('#mask').remove();
            currentDate = null;
            $('html,body').removeClass('ovfHiden'); //使网页恢复可滚动
        });
        if (!document.getElementById('model')) {
            $('body').append('<div id="model"></div>');
        }

        $('html,body').addClass('ovfHiden'); //使网页不可滚动

        var html = '<div class="model-content">';
        if (sets.length > 1) {
            html += '<h4>请选择您要的套餐</h4><div class="model-body"><ul class="goods-list">';
            $.each(sets, function(index, item) {
                if (currentSetId) {
                    if (currentSetId == item.id) {
                        html += '<li class="active" data-goodsid="' + item.id + '"><i></i>' + item.name + '</li>';
                    } else {
                        html += '<li data-goodsid="' + item.id + '"><i></i>' + item.name + '</li>';
                    }
                } else {
                    if (index == 0) {
                        html += '<li class="active" data-goodsid="' + item.id + '"><i></i>' + item.name + '</li>';
                        currentSetId = item.id;
                    } else {
                        html += '<li data-goodsid="' + item.id + '"><i></i>' + item.name + '</li>';
                    }
                }
            });
            html += '</ul></div></div><div class="model-btn" goodsid="1" date="" price="">下一步</div>';
            $('#model').append(html);
        } else {
            currentSetId = sets[0].id;
            html += '</div><div class="model-btn" goodsid="1" date="" price="">确定</div>';
            $('#model').append(html);
            uploadCalender($('#model .model-content'));
        }


        /*选择套餐*/
        $('.goods-list li').on('click', function() {
            $('.goods-list li').removeClass('active');
            $(this).addClass('active');
            var goodsid = $(this).data('goodsid');
            currentSetId = goodsid;
            // console.info(goodsid);
            $('#model .next').attr('goodsid', goodsid);
        });

        $('#model .model-btn').on('click', function() {
            var text = $(this).text();
            if (text == '下一步') {
                /*下一步——日期选择*/
                $('#model .model-content').empty();
                $('#model .model-btn').text('确定');

                /*加载日历组件*/
                uploadCalender($('#model .model-content'));
            } else {
                /*确认*/
                if (currentDate) {
                    window.location.href = "http://s.xixingke.cn/order-input.html?id=" + currentSetId + "&date=" + currentDate;
                } else {
                    alert("请选择日期");
                }

            }
        });
    });
});

function loadData() {
    loadProductDetail();
    loadProductSets();
    loadProductSatisfied();
}

function loadProductDetail() {
    var url = "http://s.xixingke.cn/api/?c=Wx_mall&a=get_product_details";
    var data = {
        "productid": productId
    };

    $.post(url, data, function(response) {
        var errorCode = response.errorCode;
        var errorMsg = response.errorMsg;
        var data = response.data;

        $(".banner img").attr("src", data.banner.split("?")[0] + "/medium");
        $("#productName").text(data.name);
        $("#productDesc").text(data.desc);
        $("#buyNum").html("<i></i>" + data.buynum + " 人参加过");
        if (parseInt(data.couponval) > 0) {
            $("#coupon").removeClass('hide');
            $("#couponVal").html(priceCount(data.couponval));
        }

        var showprice = priceCount(data.showprice);
        var originalprice = priceCount(data.originalprice);
        $("#originalPrice").html('<span id="showPrice">￥' + originalprice + '</span>￥' + showprice);

        document.title = data.name + '-商品详情-竹马旅行';

    }, "json");
}

function loadProductSatisfied() {
    var url = "http://s.xixingke.cn/api/?c=Mall_comment&a=get_satisfied";
    var data = {
        "productid": productId
    };

    $.post(url, data, function(response) {
        var errorCode = response.errorCode;
        var errorMsg = response.errorMsg;
        var data = response.data;

        if (errorCode == 0) {
            var satisfied = data.satisfied;
            var not_satisfied = data.not_satisfied;
            var total = parseInt(satisfied) + parseInt(not_satisfied);
            var rate = total == 0 ? 0 : parseInt(satisfied) * 100 / total;

            $("#commentNum").html(total);
            $("#satisfiedRate").html(parseInt(rate));
        } else {
            alert("获取商品满意度失败");
        }

    }, "json");
}

function loadProductSets() {
    var url = "http://s.xixingke.cn/api/?c=Wx_mall&a=get_product_sets";
    var data = {
        "productid": productId
    };

    $.post(url, data, function(response) {
        var errorCode = response.errorCode;
        var errorMsg = response.errorMsg;
        sets = response.data;

        $.each(sets, function(index, item) {
            // console.info(item.id + ":" + item.name);
            loadProductSetPrices(item.id);
        });


    }, "json");
}

function loadProductSetPrices(setId) {
    var url = "http://s.xixingke.cn/api/?c=Wx_mall&a=get_set_price";
    var now = new Date();
    now = new Date(now.setHours(0));
    now = new Date(now.setMinutes(0));
    now = new Date(now.setSeconds(0));
    var startTime = Math.floor(now.getTime() / 1000);

    now = new Date(now.setDate(1));
    var endDate = new Date(now.setMonth(now.getMonth() + 6));
    endDate = new Date(endDate.setDate(endDate.getDate() - 1));
    var endTime = Math.floor(endDate.getTime() / 1000);
    var data = {
        "setid": setId,
        "starttime": startTime,
        "endtime": endTime
    };

    $.post(url, data, function(response) {
        var errorCode = response.errorCode;
        var errorMsg = response.errorMsg;
        var data = response.data;
        prices["" + setId] = data;

        $.each(data, function(index, item) {
            // console.info(item.date + ":" + item.price);
        });

        imgLazyLoad($('#content').find('img'));
    }, "json");
}

function loadComments() {
    var url = "http://s.xixingke.cn/api/?c=Mall_comment&a=get_list";
    var data = {
        "productid": productId,
        "offset": offset,
        "count": count
    };

    $.post(url, data, function(response) {
        var errorCode = response.errorCode;
        var errorMsg = response.errorMsg;
        var data = response.data;

        if (errorCode == 0) {
            endState = data.endState;
            offset = parseInt(data.offset) + 1;
            var list = data.list;

            $.each(list, function(index, item) {
                var html = '<li class="com-con">';
                html += '<p class="clearfix">';
                html += '<span class="name">' + item.username + '</span><span class="date">' + formatDate(item.createtime) + '</span></p>';
                html += '<pre>' + item.content + '</pre>';
                if (item.satisfied == "1") {
                    html += '<p class="clearfix"><span class="stand ok">满意</span></p>';
                } else {
                    html += '<p class="clearfix"><span class="stand no">不满意</span></p>';
                }
                html += '</li>';

                $('#comment ul').append(html);
            });
        } else {
            alert(errorMsg);
        }
    }, "json");


}

function uploadCalender(obj) {
    var html = '<div class="calender" id="calender">' + '<ul class="calender-week clearfix">' + '<li>日</li><li>一</li><li>二</li><li>三</li><li>四</li><li>五</li><li>六</li></ul>' + '<div class="calender-title"><i class="prev"></i><span class="year-month"></span><i class="next"></i></div>' + '<div class="calender-body clearfix"></div></div>';
    obj.append(html);

    /*本月*/
    var t = new Date();
    var ty = t.getFullYear();
    var tm = t.getMonth() + 1;
    $('#calender .year-month').text(ty + '年' + tm + '月');
    $('#calender').attr('year', ty);
    $('#calender').attr('month', tm);
    uploadDate(t);
    /*上个月*/
    $('#calender i.prev').on('click', function() {
        var pm = parseInt($('#calender').attr('month')) - 1;
        var py = parseInt($('#calender').attr('year'));
        if (pm < 1) {
            py = py - 1;
            pm = 12;
        }
        $('#calender .year-month').text(py + '年' + pm + '月');
        $('#calender').attr('year', py);
        $('#calender').attr('month', pm);
        var yp = new Date(t.setFullYear(py));
        var p = new Date(yp.setMonth(pm - 1));
        uploadDate(p);
    });
    /*下个月*/
    $('#calender i.next').on('click', function() {
        var nm = parseInt($('#calender').attr('month')) + 1;
        var ny = parseInt($('#calender').attr('year'));
        if (nm > 12) {
            ny = ny + 1;
            nm = 1;
        }
        $('#calender .year-month').text(ny + '年' + nm + '月');
        $('#calender').attr('year', ny);
        $('#calender').attr('month', nm);
        var yn = new Date(t.setFullYear(ny));
        var n = new Date(yn.setMonth(nm - 1));
        uploadDate(n)
    });

}

function uploadDate(d) {
    $('#calender .calender-body').empty();
    var date = '';

    var n = new Date();
    var ny = n.getFullYear();
    var nm = n.getMonth();
    var nd = n.getDate();
    var dy = d.getFullYear();
    var dm = d.getMonth();
    var dd = d.getDate();

    if (dd !== 1) {
        var t = new Date(d.setDate(1));
        d = t;
        dd = t.getDate();
    }

    var dw = d.getDay();
    for (var i = 0; i < dw; i++) {
        date += '<a></a>'
    }

    for (var j = 0; j < 31; j++) {
        var next = new Date(d.setDate(dd + j));
        var nextd = next.getDate();
        if (j != 0 && nextd == 1) {
            break;
        }
        if (ny == dy) {
            if (nm == dm) {
                if (nextd < nd) {
                    date += '<a class="date" data-day="' + nextd + '">' + nextd + '</a>';
                } else if (nextd == nd) {
                    date += '<a class="date next today" data-day="' + nextd + '">' + nextd + '</a>';
                } else if (nextd > nd) {
                    date += '<a class="date next" data-day="' + nextd + '">' + nextd + '</a>';
                }
            } else if (nm > dm) {
                date += '<a class="date" data-day="' + nextd + '">' + nextd + '</a>';
            } else if (nm < dm) {
                date += '<a class="date next" data-day="' + nextd + '">' + nextd + '</a>';
            }
        } else if (ny > dy) {
            date += '<a class="date" data-day="' + nextd + '">' + nextd + '</a>';
        } else if (ny < dy) {
            date += '<a class="date next" data-day="' + nextd + '">' + nextd + '</a>';
        }
    }

    $('#calender .calender-body').append(date);

    var startTime = new Date();
    startTime.setFullYear(dy);
    startTime.setMonth(dm);
    startTime.setDate(1);
    startTime.setHours(0, 0, 0, 0);

    var endTime = new Date();
    endTime.setFullYear(dy);
    endTime.setMonth(dm + 1);
    endTime.setDate(0);
    endTime.setHours(0, 0, 0, 0);

    for (var i = 0; i < prices[currentSetId].length; i++) {
        var data = prices[currentSetId][i];
        var priceDate = new Date(parseInt(data.date) * 1000);
        var day = priceDate.getDate();

        var price = priceCount(data.price);

        if (priceDate >= startTime && priceDate <= endTime) {
            $(".date").eq(day - 1).addClass("hasprice");
            $(".date").eq(day - 1).html(day + "<span>" + price + "</span>");
        }
        if (priceDate > endTime) {
            break;
        }

    }

    /*绑定今天之后的点击事件*/
    $('#calender .calender-body a.next.hasprice').on('click', function() {
        $('#calender .calender-body a').removeClass('active');
        $(this).addClass('active');
        var y = $('#calender').attr('year');
        var m = $('#calender').attr('month');
        var d = $(this).data('day');
        var date = new Date();
        date.setFullYear(y);
        date.setMonth(m - 1);
        date.setDate(d);
        date.setHours(0, 0, 0, 0);
        currentDate = Math.floor(date.getTime() / 1000);
        var price = $(this).children().text();
        $('#model .model-btn').attr('date', d);
        $('#model .model-btn').attr('price', price);
    });

    /*$('#calender).find('a.next') 为今天之后的日期*/
}
