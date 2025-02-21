//跟随
function HomeScroll(a, b) { function g() { var g = $(window).scrollLeft(), h = $(window).scrollTop(), i = $(document).height(), j = $(window).height(), k = c.height(), l = d.height(), m = k > l ? f : e, n = k > l ? d : c, o = k > l ? c.offset().left + c.outerWidth(!0) - g : d.offset().left - c.outerWidth(!0) - g, p = k > l ? l : k, q = k > l ? k : l, r = parseInt(q - j) - parseInt(p - j); $(a + "," + b).removeAttr("style"), j > i || p > q || m > h || p - j + m >= h ? n.removeAttr("style") : j > p && h - m >= r || p > j && h - m >= q - j ? n.attr("style", "margin-top:" + r + "px;") : n.attr("style", "_margin-top:" + (h - m) + "px;position:fixed;left:" + o + "px;" + (j > p ? "top" : "top") + ":0;") } if ($(a).length > 0 && $(b).length > 0) { var c = $(a), d = $(b), e = c.offset().top, f = d.offset().top; $(window).resize(g).scroll(g).trigger("resize") } }
HomeScroll(".con_L", ".con_R");
//文字提示弹窗 自动关闭
window.tipsmsg = function (txt) {
    if ($('.tips_wind').size() <= 0) {
        $('body').append('<div class="tips_wind"><span>' + txt + '</span></div>')
        $('.tips_wind').fadeIn()
        setTimeout(function () {
            $('.tips_wind').fadeOut(function () {
                $('.tips_wind').remove()
            });
        }, 1000)
    }
}
//tab 
function fc_hover(hd) {
    hd.hover(function () {
        $(this).addClass('on').siblings().removeClass('on');
    })
}
//R 下载排行 
fc_hover($('.Rtab_bd ul li'));
$('.Rtab_hd p').hover(function () {
    $(this).addClass('on').siblings().removeClass('on');
    $(this).parents('.Qz_title').next('.Rtab_bd').find('ul').hide().eq($(this).index()).show();
})
//排行样式
$('.Rtab_bd ul').each(function () {
    for (var i = 0; i < $(this).find('li').length; i++) {
        $(this).find('li').eq(i).find('i').addClass('icon' + i)
    }
})
//win7/10 展开复导航
$('.nav li').mouseenter(function () {
    if($(this).hasClass('oth')){
        $('.soft_nav').stop().slideUp().eq($(this).index('.oth')).stop().slideDown()
    }else{
        $('.soft_nav').stop().slideUp('fast')
    }
})
$('.soft_nav').mouseleave(function () {
    $('.soft_nav').stop().slideUp('fast')
})
//详情页 
$('.problem a').each(function () {
    $(this).addClass('cl_' + Math.floor(Math.random() * 9));
})
//定位
function get_pos(){
    if ($('.conthd').length==1) {
        var bd_topar = [];
        function getpos(){
            $('.conthd ul li').each(function () {
                var h_top = $('#' + $(this).attr('data-wrap')).offset().top;
                bd_topar.push(h_top)
            })
        }
        getpos();
        window.onscroll = function(){
            var sc_h = $(document).scrollTop();
            if (sc_h > $('.conthd').offset().top) {
                $('.conthd ul').addClass('on');
            } else {
                $('.conthd ul').removeClass('on');
            }
            for (var i = 0; i < bd_topar.length; i++) {
                if (sc_h + 80 > bd_topar[i]) {
                    $('.conthd ul li').eq(i).addClass('on').siblings().removeClass('on');
                }
            }
        }
        //下载跳转
        $('.details_info .btn').click(function () {
            $('html, body').animate({ scrollTop: bd_topar[1] - 80 }, 400);
        })
        $('.conthd ul li').click(function () {
            getpos();
            $(this).addClass('on').siblings().removeClass('on');
            var h_top = $('#' + $(this).attr('data-wrap')).offset().top
            $('html, body').animate({ scrollTop: h_top - 60 }, 400);
        })
    }
}
//hover
$('.Ritem_downl ul li a').mouseenter(function(){
    $(this).siblings('span').addClass('on')
}).mouseleave(function () {
    $('.Ritem_downl ul li span').removeClass('on')
})
//点赞帮助 
function praise(e,i,t,cla) {
    // t = 1 有 , t = 0 无
    var n = e.find('.n'),
        r = sessionStorage.getItem('clickstate'),
        h = r ?  r.split(",") : [],
        u = location.pathname.match('[^/]+(?!.*/)')[0];
    if( !r || !h.includes(u)){
        //code 提交
        $.ajax({
            url:'/hits.html',
            data:{id:i,type:t,cla:cla},
            type:"GET",
            dataType:"json",
            success:function(data){
                //当前+1
                n.text(Number(n.html()) + 1);
                tipsmsg('您的数据已保存!');
            }
        });
        //记录 
        h.push(u);
        window.sessionStorage.setItem('clickstate',h.join(','));
    }else{
        tipsmsg('您的数据已保存，请勿重复提交');
    }
}
// 2019/8/26 
$('.foot_tips .moretips').click(function () {
    $('.foot_tips').toggleClass('on');
    $(this).html($(this).html()=='展开全部'?'收起全部':'展开全部')
})
//
 $(function(){
       setTimeout(function(){
            get_pos();
            if($('#snapShotWrap').size()>=1){
                imgshow();
            }
       },300)
   })