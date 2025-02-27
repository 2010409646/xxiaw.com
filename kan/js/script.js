/*默认的小说id*/
/* var tingid='102';
var  novel_id =275; */
$(function(){
     /*广告*/
    var shapeAudio=document.getElementById("advert_1");
    // shapeAudio.src='img/music.mp3';
    var shapeAudio_end=document.getElementById("advert_2");
    // shapeAudio_end.src='img/music.mp3';
    var audio=document.getElementById("xs");
    // audio.src='img/wKgJXVlAmODwjEGXAFwlO8_5Y0U961.m4a';
    var duration =0; //总时间
    var currenttime=0  //剩余时间
    audio.volume=0.5;  /*音量*/

    var all_nub =0;
    
     // 判断小说是否播放过了
    var playing =false;
   /* 判断第一次加载*/
   var frist_load = true;

   /*上次加载*/
   var up_load=false;
// http://ting.ms17.cn/?s=api-ting-id-102-page-2
    ajax(novel_id);
    function ajax(novel_j){
        var page = Math.ceil(novel_j/10)
        $.ajax({
                url:Siteurl+"/?s=api-ting-id-"+tingid+"-page-"+page,
                type:"get",
                dataType:'json',
                async: false,
                success: function(msg){
                    console.log(msg);
                    if (up_load) {
                         UpsetList(msg);
                         up_load= false;
                    }else{
                        setList(msg);
                    }
                },
                error:function(msg){
                    console.log(msg);
                }
        });
     }
    function setList(msg){
        var list = msg.data;
        for (var i = 0; i < list.length; i++) {
            var strHtml='<li class="clearfix section-item" id="item'+list[i].sid+'" data-path="'+list[i].playpath+'">'+
                            '<div class="column1">'+
                                '<div class="column1-l">'+
                                    '<span class="section-number" style="">'+list[i].sid+'</span>'+
                                    '<i class="playing"></i>'+
                                ' </div>'+
                                '<span class="set">'+list[i].playname+'</span>'+
                            '</div>'+
                                '<div class="column2">'+msg.ting_zb+
                            '</div>'+
                        ' </li>';
                        $('.section-body').append(strHtml);
                       
        }
        /*第一次加载的时候赋值*/
        if (frist_load) {
             /*左侧信息*/
            $('.novel-box .img-box img').attr('src',msg.ting_pic);
            $('.novel-box .novel-type').text(msg.ting_cid);
            $('.novel-box .novel-z').text(msg.limit);
            $('.novel-content').text(msg.ting_content);
            $('.ting-zb').text(msg.ting_zb);
            $('.ting_name').text(msg.ting_name);
            $('.ting_zbpic').attr('src',msg.ting_zbpic);
            all_nub= msg.limit;
              /*判断是不是ios*/
            var u = navigator.userAgent;
            var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
            if(!isiOS){
                shapeAudio.src =msg.playurl1;
                shapeAudio_end.src=msg.playurl2;
            }
             /*默认开始的小说*/
             defaultStart(novel_id);
              frist_load= false;
       }
       
    }
     function UpsetList(msg){
         var list = msg.data;
        for (var i =list.length-1; i >=0; i--) {
            var strHtml='<li class="clearfix section-item" id="item'+list[i].sid+'" data-path="'+list[i].playpath+'">'+
                            '<div class="column1">'+
                                '<div class="column1-l">'+
                                    '<span class="section-number" style="">'+list[i].sid+'</span>'+
                                    '<i class="playing"></i>'+
                                ' </div>'+
                                '<span class="set">'+list[i].playname+'</span>'+
                            '</div>'+
                                '<div class="column2">'+msg.ting_zb+
                            '</div>'+
                        ' </li>';
                        $('.section-body').prepend(strHtml);
                       
        }
       

     }
    //当前正在播放的在的li jquery对象
    var click_li;
    function defaultStart(id){
            if (id<=all_nub) {
                click_li= $('#item'+id);
                var path = click_li.data('path');
                audio.src=path;
                click_li.siblings().removeClass('section-pause');
                click_li.addClass('section-active').siblings().removeClass('section-active');
                /*广告关闭*/
                shapeAudio.pause();
                playing =false;
                play();
            }
    
    }
        // 判断是不是整数
        function isInteger(obj) {
         return obj%10 === 0
        }
       $('.section-body ').on('click','li',function(){
            var path = $(this).data('path');
                audio.src=path;
                click_li=$(this);
                $(this).siblings().removeClass('section-pause');
                $(this).addClass('section-active').siblings().removeClass('section-active');
                /*广告关闭*/
                shapeAudio.pause();
                playing =false;
                play();
               /*判断隐藏的是否加载出来*/
              var nub= parseInt($(this).find('.section-number').text());
               if (Math.ceil(nub/11)<=Math.ceil(all_nub/11)&&isInteger(nub)) {
                    ajax(nub+1);
              }



        })   

        /*下集*/   
        $('.player-next').click(function(){
            if (parseInt(click_li.find('.section-number').text())<all_nub) {
                 click_li= click_li.next();
                if (click_li.length !=1) {
                   click_li = click_li =$('.section-body li').eq($('.section-body li').length-1);
                    /*判断隐藏的是否加载出来*/
                    var nub= parseInt(click_li.find('.section-number').text());
                    if (Math.ceil(nub/11)<=Math.ceil(all_nub/11)&&isInteger(nub)) {
                            ajax(nub+1);
                    }
                    click_li= click_li.next();
                }
                
                var path = click_li.data('path');
                audio.src=path;
                click_li.siblings().removeClass('section-pause');
                click_li.addClass('section-active').siblings().removeClass('section-active');
                /*广告关闭*/
                shapeAudio.pause();
                playing =false;
                play();
            }
        })
         /*上集*/   
        $('.player-prev').click(function(){
            if (parseInt(click_li.find('.section-number').text())>1) {
                 click_li= click_li.prev();
                if (click_li.length != 1) {
                    click_li =$('.section-body li').eq(0);
                    if ($('.section-body li').eq(0).find('.section-number').text()==click_li.find('.section-number').text()&&click_li.find('.section-number').text()>=11) {
                         var nub= parseInt(click_li.find('.section-number').text());
                         up_load=true;
                         ajax(nub-10);
                    }
                    click_li= click_li.prev();
                }

               
                console.log('-------------------------------------');
                console.log(click_li);
                var path = click_li.data('path');
                audio.src=path;
                click_li.siblings().removeClass('section-pause');
                click_li.addClass('section-active').siblings().removeClass('section-active');
                /*广告关闭*/
                shapeAudio.pause();
                playing =false;
                play();
            }
            

        })

               
                audio.addEventListener("canplay", function(){
                /*获得音频的时间*/
                duration = parseInt(audio.duration);
                /*总共多少分秒*/
                $('.player-duration-time').text(conversionTime(duration));
               /* 点击选择进度*/

               /*获得进度条的宽度*/
               var p_height=$('.player-progress').width();
                $('.player-progress').click(function(e){
                    if (playing) {
                        console.log(audio.volume);
                        var actLage =e.clientX-$(this).offset().left ;
                        var progressBP =progressBarPercentage(p_height,actLage);

                        $('.player-progress-control').css('left',progressBP+'%');
                        $('.player-progress-position').css('width',progressBP+'%');

                        var SongProgress = progressBP * duration/100;
                        songProgressAdjust(SongProgress);
                    }
                  
               })
                 /* 点击时间进度*/

                 var s_width = $('.player-volume-progress').width()
                $('.player-volume-progress').click(function(e){
                    var actLage =e.clientX-$(this).offset().left ;
                    var progressBP =progressBarPercentage(s_width,actLage);
                    $('.player-volume-position').css('width',progressBP+'%');
                    audio.volume = progressBP/100;
               })
               
            });
            //播放
           
            $('.player-play').click(function(){
               click_li.removeClass('section-pause')
               play();
            });
             //暂停
            $('.player-pause').click(function(){
                if (playing) {
                    click_li.addClass('section-pause').siblings().removeClass('section-pause');
                    toPlay("pause");
                     $(this).hide();
                    $('.player-play').show();
                }else{
                    layer.msg('广告中！请耐心等待，不让暂停偶！');
                }
               

            })
            function play(){
                console.log(playing);
                /* 判断是否有广告*/
                $('.top-set').text(click_li.find('.set').text());
                 if ($(shapeAudio).attr('src')) {
                    if (!playing) {
                        shapeAudio.play();
                        shapeAudio.onended = function() {
                              toPlay("play");
                               playing=true;
                        };
                    }else{

                        toPlay("play");
                        playing=true;
                    }
                }else{
                    toPlay("play");
                    playing=true;
                }
               
                $('.player-play').hide();
                $('.player-pause').show();
            }
            /* 后面广告的播放*/
            audio.onended=function(){
                playing=false;
                shapeAudio_end.play();
            }

            // 自动播放下一集
            shapeAudio_end.onended=function(){
                playing=false;
                if (parseInt(click_li.find('.section-number').text())<all_nub) {
                 click_li= click_li.next();
                if (click_li.length !=1) {
                   click_li = click_li =$('.section-body li').eq($('.section-body li').length-1);
                    /*判断隐藏的是否加载出来*/
                    var nub= parseInt(click_li.find('.section-number').text());
                    if (Math.ceil(nub/11)<=Math.ceil(all_nub/11)&&isInteger(nub)) {
                            ajax(nub+1);
                    }
                    click_li= click_li.next();
                }
                
                var path = click_li.data('path');
                audio.src=path;
                click_li.siblings().removeClass('section-pause');
                click_li.addClass('section-active').siblings().removeClass('section-active');
                /*广告关闭*/
                shapeAudio.pause();
                playing =false;
                play();
            }
            }
            /*时间*/
            $('.player-wolume-w').hover(function(){
                if (playing) {
                    $('.player-volume-progress').show();
                }
            },function(){
                $('.player-volume-progress').hide();
            })
            //---------------------------------------------------【功能：播放&暂停】
            function toPlay(toPlay){
                //如果媒体文件被暂停，则返回true
                if(toPlay === "play"){
                    audio.play();
                    playbackProgress("play");
                }
                if(toPlay === "pause"){
                    audio.pause();
                    playbackProgress("pause");
                }
            };

         //---------------------------------------------------【功能：播放进度，播放时间】
        function playbackProgress(playSwitch){
            if(playSwitch === "play"){
                timer = setInterval(function(){
                    //获取歌曲总时间
                    timeall = duration;
                    //获取歌曲当前播放时间
                    currenttime =audio.currentTime;
                    //计算歌曲播放时间
                    songPlaybackTime(timeall,currenttime);
                    //计算进度条宽度并赋值
                    $('.player-progress-control').css('left',currenttime/timeall*100+'%');
                    $('.player-progress-position').css('width',currenttime/timeall*100+'%');
                    //当歌曲播放完毕后
                    if(audio.ended){
                        //清除定时器，进度条归零，播放下一首
                        clearInterval(timer);
                    }
                },1000);
            }
            if(playSwitch === "pause"){
                clearInterval(timer);
            }
        };
        //---------------------------------------------------【计算歌曲播放时间】
        function songPlaybackTime(timeall,currenttime){
            if(currenttime < timeall){
                leftTime = parseInt(currenttime);
                //输出时间
                $('.player-current-time').text(conversionTime(leftTime));
            }
        }
           //---------------------------------------------------【功能：歌曲进度调节】
            function songProgressAdjust(time){
                    audio.currentTime = time;
            };

            //---------------------------------------------------【计算进度条的百分比】
            function progressBarPercentage(totalLength,actLage){
                //传入总长度totalLength和当前点击的坐标actLage
                var Result = (parseInt(actLage) / parseInt(totalLength)) * 100;
                return Math.ceil(Result);
            }           
        /*秒转换成分秒*/
        function conversionTime(time){
            var surplusMinite,
                surplusSecond,
                cTime;
            //将剩余秒数转化为分钟
            surplusMinite = Math.floor((time / 60) % 60);
            if(surplusMinite<10){
                surplusMinite= "0"+surplusMinite;
            }
            //将剩余秒数转化为秒钟
            surplusSecond = Math.floor(time % 60);
            if(surplusSecond < 10){
                surplusSecond = "0" + surplusSecond;
            }
            cTime = surplusMinite + ":" + surplusSecond;
            return cTime;
        }
    });