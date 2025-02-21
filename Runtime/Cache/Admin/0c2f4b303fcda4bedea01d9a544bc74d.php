<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='/Public/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/js/admin.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/editor/kindeditor-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/editor/zh_CN.js"></script>
<script language="javascript">
var resizediv = function() { 
	$leftwidth = $(window).width()/2-150;
	$('.jqmWindow').css({ left: $leftwidth});
}
$(document).ready(function(){
	$feifeicms.show.table();
	$(window).resize(resizediv);
	resizediv();
});
function changeurl(cid,continu,player,stars,status){
	self.location.href='?s=Admin-Down-Show-cid-'+cid+'-stars-'+stars+'-status-'+status+'-type-<?php echo ($type); ?>-order-<?php echo ($order); ?>';
}
$(document).ready(function(){
	$feifeicms.show.table();
	$('#selectcid').change(function(){
		changeurl($(this).val(),'','','','');
	});
	$('#selectstars').change(function(){
		changeurl('','','',$(this).val(),'');
	});		
});
function createhtml(id){
	var ogxlset = $("#html_"+id).ogxlset();
	var left = (ogxlset.left/2)+50;
	var top = ogxlset.top+15;
	var html = $.ajax({
		url: '?s=Admin-Create-downid-id-'+id,
		async: false
	}).responseText;
	$("#htmltags").html(html);
	$("#htmltags").css({left:left,top:top,display:""});	
	window.setTimeout(function(){
		$("#htmltags").hide();
	},1000);
}
</script>
</head>
<body class="body">
<!--生成静态预览框-->
<div id="htmltags" style="position:absolute;display:none;" class="htmltags"></div>
<!--背景灰色变暗-->
<div id="showbg" style="position:absolute;left:0px;top:0px;filter:Alpha(Opacity=0);opacity:0.0;background-color:#gxlf;z-index:8;"></div>
<form action="?s=Admin-Down-Show" method="post" name="myform" id="myform">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead><tr><th class="r"><span style="float:left">软件管理</span><span class="right"><a href="?s=Admin-Down-Add" style="float:right">添加文章资讯</a></span></th></tr></thead>
  <tr>
    <td class="tr ct" style="height:40px"><input type="button" value="所有" class="submit" onClick="changeurl('','','','','',2);"> <input type="button" value="未审核" class="submit" onClick="changeurl('','','','',2);"> <input type="button" value="已审核" class="submit" onClick="changeurl('','','','',1);"> <select name="selectcid" id="selectcid">
<option value="">按分类查看</option><?php if(is_array($list_down)): $i = 0; $__LIST__ = $list_down;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxldown): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gxldown["list_id"]); ?>" <?php if(($gxldown["list_id"]) == $cid): ?>selected<?php endif; ?>><?php echo ($gxldown["list_name"]); ?></option><?php if(is_array($gxldown['son'])): $i = 0; $__LIST__ = $gxldown['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxldown): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gxldown["list_id"]); ?>" <?php if(($gxldown["list_id"]) == $cid): ?>selected<?php endif; ?>>├ <?php echo ($gxldown["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?></select> <select name="selectstars" id="selectstars"><option value="0">按星级查看</option><option value="5" <?php if(($stars) == "5"): ?>selected<?php endif; ?>>五星</option><option value="4" <?php if(($stars) == "4"): ?>selected<?php endif; ?>>四星</option><option value="3" <?php if(($stars) == "3"): ?>selected<?php endif; ?>>三星</option><option value="2" <?php if(($stars) == "2"): ?>selected<?php endif; ?>>二星</option><option value="1" <?php if(($stars) == "1"): ?>selected<?php endif; ?>>一星</option></select> <input type="text" name="wd" id="wd" maxlength="20" value="<?php echo (urldecode((isset($wd) && ($wd !== ""))?($wd):'输入关键字搜索影片')); ?>" onClick="this.select();" style="color:#666666"> <input type="button" value="搜索" class="submit" onClick="post('?s=Admin-Down-Show');"></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table">
  <thead>
    <tr class="ct">
      <th class="r" width="20">ID</th>
      <th class="l" ><span style="float:left; padding-top:7px"><?php if(($orders) == "down_id desc"): ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-id-order-asc"><img src="/Public/images/admin/up.gif" border="0" alt="点击按ID升序排列"></a><?php else: ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-id-order-desc"><img src="/Public/images/admin/down.gif" border="0" alt="点击按ID降序排列"></a><?php endif; ?></span>新闻标题</th>
      <th class="l" width="70">分类</th>
      <th class="l" width="60">人气<?php if(($orders) == "down_hits desc"): ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-hits-order-asc"><img src="/Public/images/admin/up.gif" border="0" alt="点击按人气升序排列"></a><?php else: ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-hits-order-desc"><img src="/Public/images/admin/down.gif" border="0" alt="点击按人气降序排列"></a><?php endif; ?></th>
      <th class="l" width="60">日人气<?php if(($orders) == "down_hits_day desc"): ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-hits_day-order-asc"><img src="/Public/images/admin/up.gif" border="0" alt="点击按人气升序排列"></a><?php else: ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-hits_day-order-desc"><img src="/Public/images/admin/down.gif" border="0" alt="点击按人气降序排列"></a><?php endif; ?></th>
      <th class="l" width="60">评分<?php if(($orders) == "down_gold desc"): ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-gold-order-asc"><img src="/Public/images/admin/up.gif" border="0" alt="点击按评分升序排列"></a><?php else: ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-gold-order-desc"><img src="/Public/images/admin/down.gif" border="0" alt="点击按评分降序排列"></a><?php endif; ?></th>
    
      <th class="l" width="80">文章权重<?php if(($orders) == "down_stars desc"): ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-stars-order-asc"><img src="/Public/images/admin/up.gif" border="0" alt="点击按星级升序排列"></a><?php else: ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-stars-order-desc"><img src="/Public/images/admin/down.gif" border="0" alt="点击按星级降序排列"></a><?php endif; ?></th>
      <th class="l" width="80">更新时间<?php if(($orders) == "down_addtime desc"): ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-addtime-order-asc"><img src="/Public/images/admin/up.gif" border="0" alt="点击按时间升序排列"></a><?php else: ?><a href="?s=Admin-Down-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-addtime-order-desc"><img src="/Public/images/admin/down.gif" border="0" alt="点击按时间降序排列"></a><?php endif; ?></th>
      <th class="r" width="100">相关操作</th>
    </tr>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxldown): $mod = ($i % 2 );++$i;?><tbody>
  <tr>
    <td class="r ct"><input name='ids[]' type='checkbox' value='<?php echo ($gxldown["down_id"]); ?>' class="noborder" checked></td>
    <td class="l pd">
    <span style="float:left"><span style="color:#666666"><?php echo ($gxldown["down_id"]); ?>、</span><?php if(C('url_html') > 0): ?><a href="javascript:createhtml('<?php echo ($gxldown["down_id"]); ?>');" id="html_<?php echo ($gxldown["down_id"]); ?>"><font color="green">生成</font></a><?php endif; ?> 
	
	<a href="<?php echo ($gxldown["down_url"]); ?>" target="_blank"><?php echo (msubstr($gxldown["down_name"],0,40,'utf-8',true)); if(($gxldown['down_pic']) != ""): ?><font color="green">图</font><?php endif; ?></a>


	<span id="ct_<?php echo ($gxldown["down_id"]); ?>"><?php if(($gxldown['down_continu']) != "0"): ?><sup onClick="setcontinu(<?php echo ($gxldown["down_id"]); ?>,'<?php echo ($gxldown["down_continu"]); ?>');" class="navpoint"><?php echo ($gxldown["down_continu"]); ?></sup><?php else: ?><img src="/Public/images/admin/ct.gif" style="margin-top:10px" class="navpoint" onClick="setcontinu(<?php echo ($gxldown["down_id"]); ?>,'<?php echo ($gxldown["down_continu"]); ?>');"><?php endif; ?></span></span>
    </td>
    <td class="l ct"><a href="<?php echo ($gxldown["list_url"]); ?>"><?php echo (getlistname($gxldown["down_cid"])); ?></a></td>
    <td class="l ct"><?php echo ($gxldown["down_hits"]); ?></td>
     <td class="l ct"><?php echo ($gxldown["down_hits_day"]); ?></td>
    <td class="l ct"><?php echo ($gxldown["down_gold"]); ?></td>
     
    <td class="l ct"><?php if(is_array($gxldown['down_starsarr'])): $i = 0; $__LIST__ = $gxldown['down_starsarr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ajaxstar): $mod = ($i % 2 );++$i;?><img src="/Public/images/admin/star<?php echo ($ajaxstar); ?>.gif" onClick="setstars('Down',<?php echo ($gxldown["down_id"]); ?>,<?php echo ($i); ?>);" id="star_<?php echo ($gxldown["down_id"]); ?>_<?php echo ($i); ?>" class="navpoint"><?php endforeach; endif; else: echo "" ;endif; ?></td>
    <td class="l ct"><?php echo (date('Y-m-d',$gxldown["down_addtime"])); ?></td>
    <td class="r ct"><a href="?s=Admin-Down-Add-id-<?php echo ($gxldown["down_id"]); ?>" title="点击修改影片">编辑</a> <a href="?s=Admin-Down-Del-id-<?php echo ($gxldown["down_id"]); ?>" onClick="return confirm('确定删除该文章吗?')" title="点击删除影片">删除</a> <?php if(($gxldown["down_status"]) == "1"): ?><a href="?s=Admin-Down-Status-id-<?php echo ($gxldown["down_id"]); ?>-value-0" title="点击隐藏文章">隐藏</a><?php else: ?><a href="?s=Admin-Down-Status-id-<?php echo ($gxldown["down_id"]); ?>-value-1" title="点击显示文章"><font color="red">显示</font></a><?php endif; ?></td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
      <td colspan="9" class="r pages"><?php echo ($pages); ?></td>
    </tr>   
  <tfoot>
    <tr>
      <td colspan="9" class="r"><input type="button" value="全选" class="submit" onClick="checkall('all');"> <input name="" type="button" value="反选" class="submit" onClick="checkall();"> <?php if((C("url_html")) == "1"): ?><input type="button" value="生成静态" name="createhtml" id="createhtml" class="submit" onClick="post('?s=Admin-Down-Create');"/><?php endif; ?> <input type="button" value="批量删除" class="submit" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){post('?s=Admin-Down-Delall');}else{return false;}"> <input type="button" value="批量移动" class="submit" onClick="$('#psetcid').show();"> <span style="display:none" id="psetcid"><select name="pestcid"><option value="">选择目标分类</option><?php if(is_array($list_down)): $i = 0; $__LIST__ = $list_down;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxldown): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gxldown["list_id"]); ?>" <?php if(($gxldown["list_id"]) == $cid): ?>selected<?php endif; ?>><?php echo ($gxldown["list_name"]); ?></option><?php if(is_array($gxldown['son'])): $i = 0; $__LIST__ = $gxldown['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gxldown): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gxldown["list_id"]); ?>" <?php if(($gxldown["list_id"]) == $cid): ?>selected<?php endif; ?>>├ <?php echo ($gxldown["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?></select> <input type="button" class="submit" value="确定转移" onClick="post('?s=Admin-Down-Pestcid');"/></span></td>
    </tr>  
  </tfoot>
</table>
</form>
<script type="text/javascript">
var editor;
	KindEditor.ready(function(K) {
	editor = K.create('#content',{
	resizeType : 1,
	allowPreviewEmoticons : true,
	allowImageUpload : true,
	extraFileUploadParams: {
    PHPSESSID : '<?php echo session_id() ?>',
	sid : '<?php echo strtolower(CONTROLLER_NAME) ?>'
    },
	items : ['source','fontname', 'fontsize', '|','cut','copy','paste','plainpaste','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist','insertunorderedlist','indent','outdent', 'clearhtml','selectall','|','fullscreen','|', 'emoticons', 'image', 'link', 'unlink','quickformat']
				});
			});
//KE.show({ id : 'content'});
var $content = $('#content').val();
	document.getElementById("myform").onreset = function(){
	editor.html($content);
}
</script>
<script type="text/javascript">
var editor;
	KindEditor.ready(function(K) {
	editor = K.create('#contentpic',{
	resizeType : 1,
	allowPreviewEmoticons : true,
	allowImageUpload : true,
	extraFileUploadParams: {
    PHPSESSID : '<?php echo session_id() ?>',
	sid : '<?php echo strtolower(CONTROLLER_NAME) ?>'
    },
	items : [ 'source','image']
				});
			});
//KE.show({ id : 'content'});
var contentpic = $('#contentpic').val();
	document.getElementById("myform").onreset = function(){
	editor.html(contentpic);
}
</script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/jquery/jquery.jqmodal.js"></script>
<link rel='stylesheet' type='text/css' href='/Public/jquery/jquery.jqmodal.css' />
<style>#dia_title{height:25px;line-height:25px}.jqmWindow{height:200px;}#dia_content{height:100%}</style>
<div class="jqmWindow" id="dialog">
<div id="dia_title"><span class="jqmTitle"></span><a href="javascript:void(0)" class="jqmClose" title="关闭窗口"></a></div>
<div id="dia_content"></div>
</div>
<script language="JavaScript" type="text/javascript">
//弹出浮动层 $('#dialog').jqm({modal: true, trigger: 'a.showDialog'});
$('#dialog').jqm({modal: true, trigger: '#window',zIndex: 500});
</script>
<style>
#dia_title{height:25px;line-height:25px}
.jqmWindow{height:500px;width:800px;top:10px;left:310px;overflow:hidden}
</style>
<br /><center>Version：<font color="#gxl0000"><?php echo (L("gxlnews_version")); ?></font></center>
</body>
</html>