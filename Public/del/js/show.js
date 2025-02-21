var cid = '';
$('.zan a').click(function() {	
    var thisclass = $(this).attr('class');
    if (thisclass == 'a3') {
        $('#body').val('[quote]' + $(this).parent().attr('id') + '[/quote]');
        $('#body').focus();
        return;
    };
    var flag = $(this).parent().attr('class');
    if (flag == 'zan') {		
        if (cid == $(this).parent().attr('id')){			
			return;		
		};        
        cid = $(this).parent().attr('id');
        ao = $(this).attr('class');
        $(this).text(Number($(this).text()) + 1);
    } else if (flag == undefined || flag == 'other' || flag == 'doup') {		
        if (cid == $(this).parent().parent().attr('id')) return;
        cid = $(this).parent().parent().attr('id');
        ao = $(this).attr('class');
        $(this).find('em:eq(1)').text(Number($(this).find('em:eq(1)').text()) + 1);
        var agree = Number($('.a-gree1').find('em:eq(1)').text());
        var Oppose = Number($('.a-gree2').find('em:eq(1)').text());
        perAgree = Math.round(agree / (agree + Oppose) * 10000) / 100.00 + "%";
        perOppose = Math.round(Oppose / (agree + Oppose) * 10000) / 100.00 + "%";
        $('.a-gree1').find('i').css("width", perAgree);
        $('.a-gree2').find('i').css("width", perOppose);
        $('.a-gree1').find('em:eq(0)').text(perAgree);
        $('.a-gree2').find('em:eq(0)').text(perOppose);
    } else if (flag == 'zc' || flag == 'zc zc1') {
        if (cid == $(this).parent().parent().attr('id')) return;
        cid = $(this).parent().parent().attr('id');
        ao = $(this).parent().attr('id');
        $(this).find('em:eq(1)').text(Number($(this).find('em:eq(1)').text()) + 1);
        var agree = Number($('#a-gree1').find('em:eq(1)').text());
        var Oppose = Number($('#a-gree2').find('em:eq(1)').text());
        perAgree = Math.round(agree / (agree + Oppose) * 10000) / 100.00 + "%";
        perOppose = Math.round(Oppose / (agree + Oppose) * 10000) / 100.00 + "%";
        $('#a-gree1').find('i').css("width", perAgree);
        $('#a-gree2').find('i').css("width", perOppose);
        $('#a-gree1').find('em:eq(0)').text(perAgree);
        $('#a-gree2').find('em:eq(0)').text(perOppose);
    } else {	
        if (cid == $(this).parent().parent().attr('id')) return;
        cid = $(this).parent().parent().attr('id');
        ao = flag;
        if (cid.indexOf('cms') < 0) $(this).find('dd').text(Number($(this).find('dd').text()) + 1);
        else {
            var num = Number($(this).find('span').text().replace('人', '')) + 1;
            $(this).find('span').text(num + '人');
        }
    }
    var Url = "action=29&cid=" + cid + "&type=" + ao;
    var ref = function() {
        if (http_request.readyState == 4) {
            if (http_request.status == 200) {} else {}
        }
    }
    send_request("/ajax.asp", Url, ref, true);
    isSubmit = true;
});



$(function(){
    if($("#ctext").html()){
        if($("#ctext").height() < 350){
            $("#showmore").hide();
        }else{
            $("#ctext").css({"height":"350px","overflow":"hidden"});
        }
        $("#showmore").toggle(function(){
            $("#showmore a").html("收起部分");
            $("#ctext").css({"height":"auto","overflow":"visible"});
        },function(){
            $("#showmore a").html("查看全部");
            $("#ctext").css({"height":"350px","overflow":"hidden"});
        });
    }

    if($("#soft-content-con").html()){
        if($("#soft-content-con").height() < 350){
            $("#showmore").hide();
        }else{
            $("#soft-content-con").css({"height":"350px","overflow":"hidden"});
        }
        $("#showmore").toggle(function(){
            $("#showmore a").html("收起部分");
            $("#soft-content-con").css({"height":"auto","overflow":"visible"});
        },function(){
            $("#showmore a").html("查看全部");
            $("#soft-content-con").css({"height":"350px","overflow":"hidden"});
        });
    }

});


!function(a){function b(a){a&&a.stopPropagation?a.stopPropagation():window.event&&(window.event.cancelBubble=!0)}function c(a){return a&&a.preventDefault?a.preventDefault():window.event.returnValue=!1,!1}a.fn.slider=function(d,e){"function"==typeof d?(e=d,d={}):(d=d||{},e=e||function(){});var f={contentCls:"content",navCls:"nav",prevBtnCls:"prev",nextBtnCls:"next",activeTriggerCls:"active",disableBtnCls:"disable",hoverCls:"hover",step:1,view:0,direction:"x",inEndEffect:"switch",hasTriggers:!0,triggerCondition:"*",triggerType:"mouse",activeIndex:0,pointerType:"click",auto:!1,animate:!0,delay:3e3,duration:500,easing:"easeIn",keyboardAble:!1,touchable:!0,sensitivity:.4,scrollable:!1,beforeEvent:function(){},afterEvent:function(){}},g=a.extend({},f,d),h=a(window);return this.each(function(){function d(a,b){if(x>y){var c=0!=a?b||g.duration:0,d={};switch(g.inEndEffect){case"switch":w%=v,r.removeClass(g.activeTriggerCls).eq(w).addClass(g.activeTriggerCls),d="left"==E?{left:-w*u}:{top:-w*u},n.stop().animate(d,{easing:g.easing,duration:c,complete:function(){var a={index:w,count:v};g.afterEvent(a)}});break;case"cycle":r.removeClass(g.activeTriggerCls).eq(w%v).addClass(g.activeTriggerCls),d="left"==E?{left:-w*u}:{top:-w*u},n.stop().animate(d,{easing:g.easing,duration:c,complete:function(){var a={index:w%v,count:v};g.afterEvent(a)}}),d="left"==E?{left:(v-w)*u}:{top:(v-w)*u},I.stop().animate(d,{easing:g.easing,duration:c,complete:function(){w>=v&&(w%=v,n.css(E,(v-w)*u+"px"),n=[I,I=n][0])}});break;default:w=Math.min(w,v-z),r.removeClass(g.activeTriggerCls).eq(w).addClass(g.activeTriggerCls),p.toggleClass(g.disableBtnCls,0==w),q.toggleClass(g.disableBtnCls,w==v-z),d="left"==E?{left:-w*u}:{top:-w*u},n.stop().animate(d,{easing:g.easing,duration:c,complete:function(){var a={index:w,count:v};g.afterEvent(a)}})}}}function f(a){if(a=a||window.event,b(a),c(a),!n.is(":animated")){var d=-a.wheelDelta/120||a.detail/3;d>0?t.next(a):t.prev(a)}}function i(a){C=new Date,b(a),t.stop(),A={pageX:a.changedTouches[0].pageX,pageY:a.changedTouches[0].pageY},B[0]=n.position(),"cycle"==g.inEndEffect&&(B[1]=I.position())}function j(a){b(a);var d={pageX:a.changedTouches[0].pageX,pageY:a.changedTouches[0].pageY},e="x"==g.direction?d.pageX-A.pageX:d.pageY-A.pageY,f=Math.ceil(Math.abs(e/u));("x"==g.direction&&Math.abs(d.pageY-A.pageY)<Math.abs(e)||"y"==g.direction)&&(c(a),"cycle"==g.inEndEffect?(e>0?0>w-f&&(B[1][E]=-(w+v)*u,I.css(E,B[1][E]+"px"),n=[I,I=n][0],B[0][E]=[B[1][E],B[1][E]=B[0][E]][0],w+=v):w+f>v&&(B[0][E]=(2*v-w)*u,n.css(E,B[0][E]+"px"),n=[I,I=n][0],B[0][E]=[B[1][E],B[1][E]=B[0][E]][0],w-=v),n.css(E,B[0][E]+e),I.css(E,B[1][E]+e)):((0===w&&e>0||w===v-z&&0>e)&&(e*=.25),n.css(E,B[0][E]+e)))}function k(a){var b=new Date;g.auto&&t.start();var c={pageX:a.changedTouches[0].pageX,pageY:a.changedTouches[0].pageY},e="x"==g.direction?c.pageX-A.pageX:c.pageY-A.pageY,f=Math.abs(e/u),h=f-Math.floor(f)>g.sensitivity?Math.ceil(f):Math.floor(f);if(h)if("cycle"==g.inEndEffect)e>0?w-=h:w+=h;else if(e>0)w&&(w-=Math.min(h,w));else{var i=v-w-z;i&&(w+=Math.min(h,i))}else if(250>b-C&&Math.abs(e)>10)if(e>0)w&&(w-=Math.min(1,w));else{var i=v-w-z;i&&(w+=Math.min(1,i))}d(!0,300)}function l(a){switch(a.which){case 37:t.prev(a);break;case 39:t.next(a)}}var m=a(this),n=m.find("."+g.contentCls),o=n.children(),p=m.find("."+g.prevBtnCls),q=m.find("."+g.nextBtnCls),r=a(),s=this,t={},u="x"==g.direction?o.outerWidth(!0):o.outerHeight(!0),v=o.length,w=g.activeIndex<0?v+g.activeIndex:g.activeIndex,x=v*u,y="x"==g.direction?m.width():m.height(),z=g.view||parseInt(y/u)||1,A={},B=[],C=0,D=null,E="x"==g.direction?"left":"top",F=n.css("position","absolute").parent();if("static"==F.css("position")&&F.css("position","relative"),"left"==E&&n.css("width",x),g.hasTriggers){if(!m.find("."+g.navCls).length){for(var G="",H=1;v>=H;H++)G+="<li>"+H+"</li>";m.append("<ul class='"+g.navCls+"'>"+G+"</ul>")}g.triggerType+="mouse"===g.triggerType?"enter":"",r=m.find("."+g.navCls+" > "+g.triggerCondition).bind(g.triggerType,function(a){var b=r.index(this),c={index:w,count:v,destination:b,event:a};g.beforeEvent(c)!==!1&&(w="cycle"===g.inEndEffect?b:Math.min(v-z,b),d(g.animate))})}if("cycle"===g.inEndEffect)var I=n.clone().insertAfter(n);var J=m.find("."+g.contentCls);t.prev=function(a){var b={index:w,count:v,destination:"prev",event:a};if(g.beforeEvent(b)!==!1){switch(g.inEndEffect){case"switch":w?w-=Math.min(g.step,w):w=v-z;break;case"cycle":if(J.is(":animated"))return!1;w-g.step<0?(I.css(E,-(v+w)*u+"px"),n=[I,I=n][0],w+=v-g.step):w-=g.step;break;default:w&&(w-=Math.min(g.step,w))}d(g.animate)}},t.next=function(a){var b={index:w,count:v,destination:"next",event:a};if(g.beforeEvent(b)!==!1){switch(g.inEndEffect){case"switch":var c=v-w-z;c?w+=Math.min(g.step,c):w=0;break;case"cycle":if(J.is(":animated"))return!1;w+=g.step;break;default:var c=v-w-z;c&&(w+=Math.min(g.step,c))}d(g.animate)}},t.start=function(){t.stop(),D=setInterval(t.next,g.delay)},t.stop=function(){D&&clearInterval(D)},t.setIndex=function(a,b){w=a%v,d(b)},t.setStep=function(a){g.step=a},t.setView=function(a){z=g.view=a},t.setDelay=function(a){g.delay=a},t.setDuration=function(a){g.duration=a},t.getIndex=function(){return w},t.resize=function(){u="x"==g.direction?o.outerWidth(!0):o.outerHeight(!0),x=v*u,y="x"==g.direction?m.width():m.height(),z=g.view||parseInt(y/u)||1,"left"==E&&J.css("width",x),d(!1)},d(!1),g.auto&&(t.start(),m.hover(t.stop,t.start)),m.hover(function(){m.addClass(g.hoverCls)},function(){m.removeClass(g.hoverCls)}),"click"===g.pointerType?(p.bind("click",t.prev).hover(function(){p.toggleClass(g.hoverCls)}),q.bind("click",t.next).hover(function(){q.toggleClass(g.hoverCls)})):(p.on({mouseenter:function(){w=0,d()},mouseleave:function(){w=Math.floor(-n.position().left/u),d(!0,g.duration/2)}}),q.on({mouseenter:function(){w=v-z,d()},mouseleave:function(){w=Math.ceil(-n.position().left/u),d(!0,g.duration/2)}})),s.addEventListener&&g.touchable&&(s.addEventListener("touchstart",i),s.addEventListener("touchmove",j),s.addEventListener("touchend",k)),h.resize(t.resize),g.keyboardAble&&h.keydown(l),g.scrollable&&(document.addEventListener&&s.addEventListener("DOMMouseScroll",f,!1),s.onmousewheel=f),e(t)})},a.extend(a.easing,{def:"easeIn",swing:function(b,c,d,e,f){return a.easing[a.easing.def](b,c,d,e,f)},easeIn:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOut:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},expoin:function(a,b,c,d,e){return 0==b?c:d*Math.pow(2,10*(b/e-1))+c},expoout:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},expoinout:function(a,b,c,d,e){return 0==b?c:b==e?c+d:(b/=e/2)<1?d/2*Math.pow(2,10*(b-1))+c:d/2*(-Math.pow(2,-10*--b)+2)+c},elasin:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(1==(b/=e))return c+d;if(g||(g=.3*e),h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},elasout:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(1==(b/=e))return c+d;if(g||(g=.3*e),h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},elasinout:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(0==b)return c;if(2==(b/=e/2))return c+d;if(g||(g=e*.3*1.5),h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return 1>b?-.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c:.5*h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+d+c},backin:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),d*(b/=e)*b*((f+1)*b-f)+c},backout:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},backinout:function(a,b,c,d,e,f){return void 0==f&&(f=1.70158),(b/=e/2)<1?d/2*b*b*(((f*=1.525)+1)*b-f)+c:d/2*((b-=2)*b*(((f*=1.525)+1)*b+f)+2)+c},bouncein:function(b,c,d,e,f){return e-a.easing.bounceout(b,f-c,0,e,f)+d},bounceout:function(a,b,c,d,e){return(b/=e)<1/2.75?d*7.5625*b*b+c:2/2.75>b?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:2.5/2.75>b?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},bounceinout:function(b,c,d,e,f){return f/2>c?.5*a.easing.bouncein(b,2*c,0,e,f)+d:.5*a.easing.bounceout(b,2*c-f,0,e,f)+.5*e+d}})}(jQuery);



var $window = $(window);
var $document = $(document);
var u = navigator.appVersion;
var isIE6 = u.indexOf("MSIE 6") > -1;
var $showcase = $(".showcase");
if ($showcase.length > 0) {
    var _showcase_top = $showcase.offset().top;
} (function() {
    var $scrollbar = $showcase.find(".scrollbar");
    var $slider = $showcase.find(".slider");
    var _scrollbar_api;
    var _slider_api;
    function imageDownload($obj, callback) {
        var len = $obj.length;
        var num = 0;
        var list = [];
        $obj.each(function() {
            if (this.complete && this.width) {
                doSomething();
            } else {
                this.onload = doSomething;
            }
            function doSomething() {
                num++;
                list.push(this);
                if (num == len) {
                    callback(list);
                }
            }
        });
    }
    imageDownload($scrollbar.find("li img"),
        function() {
            $scrollbar.scrollbar({
                    contentCls: "s-content",
                    direction: "x",
                    inEndEffect: true
                },
                function(api) {
                    _scrollbar_api = api;
                });
        });
    $scrollbar.find(".s-content li").each(function(i) {
        var $this = $(this);
        $this.click(function() {
            $scrollbar.hide();
            $slider.fadeIn("fast");
            if (_slider_api) {
                _slider_api.setIndex(i, false);
            }
        }).mouseenter(function() {
            $this.addClass('active').siblings().removeClass('active');
        }).mouseleave(function() {
            if ($this.hasClass('video')) {
                $this.removeClass('active');
                $(".picture").eq(0).addClass('active');
            }
        });
    });
    $slider.slider({
            contentCls: "s-content",
            navCls: "s-nav",
            triggerCondition: "span",
            /*triggerCondition: "span span",*/
            triggerType: "click",
            duration: 300,
            keyboardAble: true,
            beforeEvent: function() {}
        },
        function(api) {
            _slider_api = api;
        });
    $slider.find(".s-content li").click(function() {
        _slider_api.next();
    });
    $slider.find(".trigger").click(function() {
        $scrollbar.fadeIn("fast");
        $slider.hide();
        if (_scrollbar_api) {
            _scrollbar_api.resize();
        }
    });
    imageDownload($slider.find("li img"),
        function(list) {
            var $box = $slider.find(".s-box");
            var $list = $box.find(".s-content li");
            reset();
            $window.on('resize', reset);
            function reset() {
                var box_height = 0;
                var box_width = $box.width();
                $list.children().each(function(i) {
                    var width = this.width;
                    var height = this.height;
                    if (width > box_width) {
                        height *= box_width / width;
                    }
                    if (height > box_height) {
                        box_height = height;
                    }
                });
                if (box_height > 230) {
                    box_height = 230;
                }
                if (box_height < 230) {
                    box_height = 230;
                }
                /* $slider.find(".s-box").css({
                 'height': box_height + 'px'
                 });
                 */
                $slider.find(".prev,.next").css({
                    'height': 54 + 'px'
                });
                $list.css({
                    'height': box_height + 'px'
                }).children().removeAttr('style').each(function() {
                    var $this = $(this);
                    var width = this.width;
                    var height = this.height;
                    if (height > width) {
                        if (height > box_height) {
                            $this.css({
                                'height': box_height + 'px'
                            });
                        } else {
                            $this.css({
                                'margin-top': (box_height - height) / 2 + 'px'
                            });
                        }
                    } else {
                        if (width > box_width) {
                            $this.css({
                                'width': box_width + 'px',
                                'margin-top': (box_height - box_width / width * height) / 2 + 'px'
                            });
                        } else {
                            $this.css({
                                'margin-top': (box_height - height) / 2 + 'px'
                            });
                        }
                    }
                });

            }
        });
})();

//下载推荐应用
var comment_app = {
    config: {
        cache: {},
        down_url: {
            //android: 'download_data.js',
            //ios: 'download_data_iphone.js'
        }
    },
    init: function() {
        var self = this;
        var box = $('.overlay-box');
        //修复IE6下背景层问题
        if (!-[1, ] && !window.XMLHttpRequest) {
            box.css({
                'width': $(document).width(),
                'height': $(document).height()
            });
        }
        box.show();
        box.click(function() {
            self.close();
        });
    },
    load: function(type, name,typeid) {
        var pop=$(".pop-box").html();
        if(pop){
            $('.overlay-box').show();
            $(".pop-box").show();
            return;
        }
        var self = this;
        if(type=='android'){
            //安卓
        }else{
            //苹果

        }
        if (!this.config.cache[type]) {
        } else {
        }
    },
    fixIE: function() {
        //修复ie6下不居中问题
        if (!-[1, ] && !window.XMLHttpRequest) {
            var top = $(document).scrollTop() + ($(window).height() / 2);
            var box = $('.pop-box');
            var boxheight = box.height() / 2;
            if (top < boxheight) {
                top = boxheight;
            }
            box.css('top', top + 'px');
        }
    },
    close: function() {
        $('.overlay-box,.pop-box').hide();
    }
};

$(window).scroll(function () {
    if ($(window).scrollTop() > 200) {
        if(!document.getElementById('gotoBox'))
        {
            $(".backtop").fadeIn(400);
        }
    } else {
        if(!document.getElementById('gotoBox'))
        {
            $(".backtop").fadeOut(200);
        }
    }
});
$(".backtop").click(function () {
    $('html,body').animate({
        scrollTop : '0px'
    }, 200);
    $('.backtop span').hover(
        function(){$(this).addClass('hover');},
        function(){$(this).removeClass('hover');}
    );
});

var btns=$('#sszt .c-tab li');

for (var i = 0; i < btns.length; i++){
	(function(i){
		btns[i].onclick = function(){
			$('#sszt .c-tab li').removeClass('hover');
			$('#sszt .c-tab li').eq(i).addClass('hover');

			$('#sszt .ss-ztbox').css({display:'none'});
			$('#sszt .ss-ztbox').eq(i).css({display:'block'});
		}
	})(i)
}

/*
function digg(id,field,modelid){
    if(field==1){
        a="up";
    }else if(field==2){
        a="common";
    }else if(field==3){
        a="down";
    }else{
        a="up";
    }

    //vote(modelid,id,a);
}
*/
function digg(cid,ao){
	
	var saveid = GetCookie('voteid');
	
    if (saveid == cid) {
        alert("您已经评价过");
		return false;
    }
	var up = parseInt($(".num1").html());	

	var down = parseInt($(".num2").html());		
	if(ao == "a-gree1"){
		up = up+1;
	}else if(ao == "a-gree2"){
		down = down+1;
	}else{
		up = up+1;
	}
	
	var zong = up + down;	
	var up_1 = parseInt(up / zong *100);
	//up_1 = up_1.toFixed(2);

	var down_1 =  parseInt(down / zong *100);
	//down_1 = down_1.toFixed(2);
	
	$('.level1 .color').css("width",up_1+"%");
	$('.level2 .color').css("width",down_1+"%");
	
	$('.level1 .percent em').html(up_1+"%");
	$('.level2 .percent em').html(down_1+"%");
	
	$(".num1").html(up);
	$(".num2").html(down);
	
   var Url = "action=29&id=" + cid + "&type=" + ao;
    var ref = function() {
        if (http_request.readyState == 4) {
            if (http_request.status == 200) {} else {}
        }
    }
	
    send_request("/index.php?s=updown-down", Url, ref, true);
	
	SetCookie('id',cid,1);

    //vote(modelid,id,a);
}


function vote(modelid,id,field){

    var cid=modelid+'_'+id;
    var saveid = GetCookie('voteid');
    if (saveid == cid) {
        alert("您已经评价过");
    } else{
        $.get("http://www.kuhou.com/index.php?m=content&c=index&a=vote",{ modelid:modelid,id:id,field:field},function(resp){
            if(resp.code=='1'&&resp.data)
            {
                var up_1 = parseInt(resp.data.up);
                var common_1 =parseInt(resp.data.common);
                var down_1 = parseInt(resp.data.down);
                var zong = parseInt(up_1+ common_1 + down_1);
                var up =parseInt(up_1 / zong *100);
                up = up.toFixed(2);
                var common =parseInt(common_1 / zong *100);
                common =  common.toFixed(2);
                var down =parseInt(down_1 / zong *100);
                down =  down.toFixed(2);
                $('.up .color').css("width",up+"%");
                $('.up .percent em').html(up+"%");
                $('.common .color').css("width",common+"%");
                $('.common .percent em').html(common+"%");
                $('.down .color').css("width",down+"%");
                $('.down .percent em').html(down+"%");
                $('.up .num1').html(up_1);
                $('.common .num1').html(common_1);
                $('.down .num1').html(down_1);
                SetCookie('voteid',cid,1);
            }
            else if(resp.msg)
            {
                alert(resp.msg);
            }
            else
            {
                alert('操作失败');
            }
        },'jsonp');
    }
}




function SetCookie(c_name,value,expiredays)
{
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie = c_name + "=" +escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString()); 
}
function GetCookie(c_name)
{
    if (document.cookie.length > 0)
    {
        c_start = document.cookie.indexOf(c_name + "=")
        if (c_start != -1)
        {
            c_start = c_start + c_name.length + 1;
            c_end   = document.cookie.indexOf(";",c_start);
            if (c_end == -1)
            {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return null
}




$.fn.select = function(){
    var self = this;hideUl();
    return this.each(function(){
        var ul = $(this).find('ul'), li = ul.find('li');
        $(this).click(function(e){if( ul.is(':visible') ){ul.hide();}else{$('[role="select"]').find('ul').hide();ul.show();}e.stopPropagation();})
        li.hover(function(e){$(this).toggleClass('on');e.stopPropagation();})
        li.click(function(e){var val = $(this).text();var dataVal = $(this).attr("value");$(this).parents('[role="select"]').find('input').val(val);$('[role="select"] ul').hide();e.stopPropagation();})})
    function hideUl(){$('body').click(function(){self.find('ul').hide();})}
}

var textarea_val = $(".box-conn textarea").attr("placeholder");
var input_val = $(".inp-in1").attr("placeholder");
$(".box-conn textarea").focus(function(){$(this).attr("placeholder","");});
$(".box-conn textarea").blur(function(){if($(this).val().length<=0){$(this).attr("placeholder",textarea_val);}});
$('.textsize').keyup(function() {n=$('#body').val().length;if (n <= 140){$('#ping-num').text(140-n);}else{var str = $('#body').val();$('#body').val(str.substring(0, 140));}});
jQuery.extend({unselectContents:function(){if(window.getSelection)window.getSelection().removeAllRanges();else if(document.selection)document.selection.empty()}});
jQuery.fn.extend({selectContents:function(){$(this).each(function(i){var node=this;var selection,range,doc,win;if((doc=node.ownerDocument)&&(win=doc.defaultView)&&typeof win.getSelection!='undefined'&&typeof doc.createRange!='undefined'&&(selection=window.getSelection())&&typeof selection.removeAllRanges!='undefined'){range=doc.createRange();range.selectNode(node);if(i==0){selection.removeAllRanges()}selection.addRange(range)}else if(document.body&&typeof document.body.createTextRange!='undefined'&&(range=document.body.createTextRange())){range.moveToElementText(node);range.select()}})},setCaret:function(){var initSetCaret=function(){var textObj=$(this).get(0);textObj.caretPos=document.selection.createRange().duplicate()};$(this).click(initSetCaret).select(initSetCaret).keyup(initSetCaret)},insertAtCaret:function(textFeildValue){var textObj=$(this).get(0);if(document.all&&textObj.createTextRange&&textObj.caretPos){var caretPos=textObj.caretPos;caretPos.text=caretPos.text.charAt(caretPos.text.length-1)==''?textFeildValue+'':textFeildValue}else if(textObj.setSelectionRange){var rangeStart=textObj.selectionStart;var rangeEnd=textObj.selectionEnd;var tempStr1=textObj.value.substring(0,rangeStart);var tempStr2=textObj.value.substring(rangeEnd);textObj.value=tempStr1+textFeildValue+tempStr2;textObj.focus();var len=textFeildValue.length;textObj.setSelectionRange(rangeStart+len,rangeStart+len);textObj.blur()}else{textObj.value+=textFeildValue}}});
$(function(){$('#btn-face').qqFace({id : 'facebox', assign:'body', path:'/face/'});});
(function($){$.fn.qqFace=function(options){var defaults={id:'facebox',path:'face/',assign:'content',tip:'f:'};var option=$.extend(defaults,options);var assign=$('#'+option.assign);var id=option.id;var path=option.path;var tip=option.tip;if(assign.length<=0){return false};$(this).click(function(e){var strFace,labFace;if($('#'+id).length<=0){strFace='<div id="'+id+'" style="position:absolute;display:none;z-index:1000;" class="qqFace"><table border="0" cellspacing="0" cellpadding="0"><tr>';for(var i=1;i<=75;i++){labFace='{'+tip+i+'}';strFace+='<td><img src="'+path+i+'.gif" onclick="$(\'#'+option.assign+'\').setCaret();$(\'#'+option.assign+'\').insertAtCaret(\''+labFace+'\');" /></td>';if(i%15==0)strFace+='</tr><tr>'}strFace+='</tr></table></div>'}$(this).parent().append(strFace);var offset=$(this).position();var top=offset.top+$(this).outerHeight();$('#'+id).css('top',top);$('#'+id).css('left',offset.left);$('#'+id).show();e.stopPropagation()});$(document).click(function(){$('#'+id).hide();$('#'+id).remove()})}})(jQuery);
$(function(){$('#btn-face').qqFace({id : 'facebox', assign:'body', path:'/face/'});});
var isSubmit=false;
function countSubstr(str,substr,isIgnore){var count;var reg="";if(isIgnore==true){reg="/\\"+substr+"/gi"}else{reg="/\\"+substr+"/g"};reg=eval(reg);if(str.match(reg)==null){count=0}else{count=str.match(reg).length}return count}



(function($) {
    $.fn.extend({
        leanModal: function(options) {var defaults = {overlay: 0.5, closeButton: '.x-btn'};
            var overlay = $("<div id='lean_overlay'></div>");
            $("body").append(overlay);
            options = $.extend(defaults, options);
            return this.each(function() {
                var o = options;
                $(this).click(function(e) {
                    var modal_id = $(this).data("target");
                    $("#lean_overlay").click(function() {close_modal(modal_id)});
                    $(o.closeButton).click(function() {close_modal(modal_id)});
                    var modal_height = $(modal_id).outerHeight();
                    var modal_width = $(modal_id).outerWidth();
                    $("#lean_overlay").css({"display": "block", opacity: 0});
                    $("#lean_overlay").fadeTo(200, o.overlay);
                    $(modal_id).css({"display": "block", "position": "fixed", "opacity": 0, "z-index": 11000, "left": 50 + "%", "top": 44 + "%", "margin-left": -(modal_width / 2) + "px", "margin-top": -(modal_height / 2) + "px",});$(modal_id).fadeTo(200, 1);e.preventDefault()})});
            function close_modal(modal_id) {$("#lean_overlay").fadeOut(200);$(modal_id).css({"display": "none"})}
        }
    })
})(jQuery);
$(document).ready(function($) {$("[data-target]").leanModal();});


$('#err_tj').click(function(){
    if (isSubmit) {return false;}
    var softID = $("input[name='rjid']").val();
    var Content = $.trim($('.err_text').val());
    if (Content.length < 5 || Content.lenght > 140){alert('反馈的内容不能小于5 大于 140 个字符！');$('.err_text').focus();return false;}
    var re = /\{.+?\}/g;
    var tmp = $.trim(ReplaceAll(Content,re,''));tmp = ReplaceAll(tmp,"<","|");tmp = ReplaceAll(tmp,"'","");tmp = ReplaceAll(tmp,">","|");tmp = ReplaceAll(tmp,/\r/g,"#");tmp = ReplaceAll(tmp,/\n/g,"#");var commentType = $('#commentType').val();
    if (commentType == undefined){commentType = 0;}
    var Url="rjid="+softID+"&miaoshu="+tmp;
    var ref=function(){if (h_req.readyState == 4) {if (h_req.status == 200) {var requestText = h_req.responseText;$('.err_text').val('');$('.err_text').focus();$("#lean_overlay").fadeOut(200);$("#showbox").css({"display": "none"});alert(requestText);} else {alert("写数据出错了！！");}}}
    send_req("/senderr2016.asp",Url,ref,true);isSubmit = true;
});
function ReplaceAll(str,sptr,sptr1){while(str.indexOf(sptr)>=0){str=str.replace(sptr,sptr1)}return str}
function send_req(url,Temp,ref,tb){h_req=false;if(window.XMLHttpRequest){h_req=new XMLHttpRequest();if(h_req.overrideMimeType){h_req.overrideMimeType('text/xml')}}else if(window.ActiveXObject){try{h_req=new ActiveXObject("Msxml2.XMLHTTP")}catch(e){try{h_req=new ActiveXObject("Microsoft.XMLHTTP")}catch(e){}}}if(!h_req){window.alert("不能创建XMLHttpRequest对象实例.");return false}h_req.onreadystatechange=ref;h_req.open("Post",url,tb);h_req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");h_req.setRequestHeader("Content-Type","text/html;charset=UTF-8");h_req.send(Temp)}


function send_request(url, Temp, ref, tb) {
    http_request = false;
    if (window.XMLHttpRequest) {
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/xml')
        }
    } else if (window.ActiveXObject) {
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP")
        } catch(e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP")
            } catch(e) {}
        }
    }
    if (!http_request) {
        window.alert("不能创建XMLHttpRequest对象实例.");
        return false
    }
    http_request.onreadystatechange = ref;
    http_request.open("Post", url, tb);
    http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    http_request.send(Temp)
}



var btns=$('.ul-menu7 li');

for (var i = 0; i < btns.length; i++){
	(function(i){
		btns[i].onclick = function(){
			$('.ul-menu7 li').removeClass('on');
			$('.ul-menu7 li').eq(i).addClass('on');

			$('.download-address').css({display:'none'});
			$('.download-address').eq(i).css({display:'block'});
		}
	})(i)
}




function godownload(softid,type)
{		    
	var id=softid+'_'+type;
	var saveid = GetCookie('xzqid');	
    if (saveid == id) {
        console.log("以统计");		
    }else{		
		var txt= {
				id:softid,			
				type:type
			}
		$.ajax({type: "POST", url: "/index.php?s=updown-down", data: txt, success: function(msg){			
		console.log(msg);						
		}});
		SetCookie('xzqid',id,1);
	}
	
}




