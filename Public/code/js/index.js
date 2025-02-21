//banner
jQuery(".banner").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true});
$(window).resize(function(){history.go(0)});
 
//Min1,Min3 tab
$(' .Min_hd span').hover(function () {
  $(this).addClass('on').siblings().removeClass('on'); 
  $(this).parents('.Min_hd').next('.Min_bd').find('.item').hide().eq($(this).index()).show();
}) 
//品牌系统 Tab
$('.Tab_hd span').hover(function () {
  $(this).addClass('on').siblings().removeClass('on'); 
  $(this).parents('.Tab_hd').next('.Tab_bd').find('ul').hide().eq($(this).index()).show();
})
$('.M3_M .Tab_bd ul li').hover(function () {
  $(this).addClass('on').siblings().removeClass('on'); 
})
//系统教程 手机下载
$('.Qz_title .Tab_hd p').hover(function() {
  $(this).addClass('on').siblings().removeClass('on'); 
  $(this).parents('.Qz_title').next('.Tab_bd').find('.item').hide().eq($(this).index()).show();
  $(this).parents('.Qz_title').find('.more').hide().eq($(this).index()).show();
})

