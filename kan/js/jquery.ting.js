$("#loginform #loginbt").click(function(e) {
	userlogin();
	setTimeout("location.reload()",500);
});
function userlogin() {
	if ($("#username").val() == '') {
		$.showfloatdiv({
			txt: '请输入用户名'
		});
		$("#username").focus();
		$.hidediv({});
	} else if ($("#password").val() == '') {
		$.showfloatdiv({
			txt: '请输入密码'
		});
		$("#password").focus();
		$.hidediv({});
	} else {
		$("#loginform").qiresub({
			curobj: $("#loginbt"),
			txt: '数据提交中,请稍后...',
			onsucc: function(result) {
				$.hidediv(result);
				if (parseInt(result['rcode']) > 0) {
					qr.gu({
						ubox: 'unm',
						rbox: 'innermsg',
						h3: 'h3',
						logo: 'userlogo'
					});
					try {
						PlayHistoryObj.viewPlayHistory('playhistory');
					} catch(e) {}
					$("#cboxClose").trigger('click');
				}else if(parseInt(result['rcode'])==-3){
				 
				}
			}
		}).post({
			url: Root + 'index.php?s=User-Center-login'
		});
		return false;
	}
}
$(".logoutbt").click(function(e) {
			$.showfloatdiv({
				txt: '正在退出...',
				cssname: 'loading',
				isajax: 1,
				succdo: function(r) {
					setTimeout("$.refresh('index.php?s=User-Center-login')",500);
				}
			});
			return false;
		});	
$(document).ready(function(){		   
	// cmt-input-tip
	$("#cmt-input-tip .ui-input").focus(function(){
		$("#cmt-input-tip").hide();
		$("#cmt-input-bd").show();
		$("#cmt-input-bd .ui-textarea").focus();
	});
	
	// Baby Time Step A Tips
	$(".play-mode-list").each(function(j,div){
		$(div).find('a').each(function(i,e){
			var $title = $(this).attr("title");
			
			$(this).hover(function(){								
				var left = $(this).offset().left + 3;
				var top = $(this).offset().top - 28;
				var $appendbox = $(this).parent().parent(".play-mode-list");
				$('<div></div>').addClass('play-mode-tip').css({'left':left+'px','top':top+'px'})
				.html($title).appendTo($appendbox);	

				this.myTitle=this.title;
				this.title="";
								
			},function(){
				this.title=this.myTitle;	
				$('.play-mode-tip').remove();
			});
		});
	});
	//打赏
	
	$(".user-bt").each(function(){	
		var $btn = $(this).find(".sect-ds");
		var $cancel = $(this).find(".cancel");
		var $div =$(this).find(".sect-show");
		
		
		$btn.click(function(){	
			if(!checkcookie()) {
				login_form();
				return false;
		    }
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			var curobj=$(this);
			$.get($btn.attr('data'),
				  function(r){
					$.hidediv(r);
					
			},'json');
		});
		
		
		$cancel.click(function(){	
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			$.get($cancel.attr('data'),function(r){
				$.hidediv(r);
				if(parseInt(r.rcode)>0){
					$btn.show();
					$div.hide();
				}
			},'json');
		});
	});
	
	
	
	//打赏
	
	$(".user-bt").each(function(){	
		var $btn = $(this).find(".btn-follow");
		var $cancel = $(this).find(".cancel");
		var $div =$(this).find(".sect-show");
		
		
		$btn.click(function(){	
			if(!checkcookie()) {
				login_form();
				return false;
		    }
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			var curobj=$(this);
			$.get($btn.attr('data'),
				  function(r){
					$.hidediv(r);
					
			},'json');
		});
		
		
		$cancel.click(function(){	
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			$.get($cancel.attr('data'),function(r){
				$.hidediv(r);
				if(parseInt(r.rcode)>0){
					$btn.show();
					$div.hide();
				}
			},'json');
		});
	});
	// interest-sect
	$(".user-bt").each(function(){	
		var $btn = $(this).find(".sect-btn");
		var $cancel = $(this).find(".cancel");
		var $div =$(this).find(".sect-show");
		
		
		$btn.click(function(){	
			if(!checkcookie()) {
				login_form();
				return false;
		    }
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			var curobj=$(this);
			$.get($btn.attr('data'),
				  function(r){
					$.hidediv(r);
					if(parseInt(r.rcode)>0){
						curobj.hide();
						$div.show();
						$cancel.show();
					}else{
						if(parseInt(r['yjdy'])>0){
							if(parseInt(r['yjdy'])==1){
								curobj.hide(r);
								$div.show();			
								$cancel.show();
							}
						}
					}
			},'json');
		});
		
		
		$cancel.click(function(){	
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			$.get($cancel.attr('data'),function(r){
				$.hidediv(r);
				if(parseInt(r.rcode)>0){
					$btn.show();
					$div.hide();
				}
			},'json');
		});
	});
	
	// interest-sect
	$(".ui-form-item").each(function(){	
		var $btn = $(this).find(".ui-button");
		var $cancel = $(this).find(".cancel");
		var $div =$(this).find(".sect-show");
		
		$("#loginbt2").click(function(){	
			if(!checkcookie()) {
				login_form();
				return false;
		    }
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			var curobj=$(this);
			$.get($btn.attr('data'),
				  function(r){
					$.hidediv(r);
					if(parseInt(r.rcode)>0){
						curobj.hide();
						$div.show();
						$cancel.show();
					}else{
						if(parseInt(r['yjdy'])>0){
							if(parseInt(r['yjdy'])==1){
								curobj.hide(r);
								$div.show();			
								$cancel.show();
							}
						}
					}
			},'json');
		});
		
		
		$cancel.click(function(){	
			$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
			$.get($cancel.attr('data'),function(r){
				$.hidediv(r);
				if(parseInt(r.rcode)>0){
					$btn.show();
					$div.hide();
				}
			},'json');
		});
	});
	
	// Rating Star Jquery
	$("ul.rating li").each(function(i){
		var $title = $(this).attr("title");
		var $lis = $("ul.rating li");
		var num = $(this).index();
		var n = num+1;
		$(this).click(function(){
			if(hadpingfen>0){
				$.showfloatdiv({txt:'已经评分,请务重复评分'});
				$.hidediv({});
			}else{
				$.showfloatdiv({txt:'数据提交中...',cssname:'loading'});
				$lis.removeClass("active");												  
				$("ul.rating li:lt("+n+")").addClass("active");	 
				$("#ratewords").html($title);
				$.post(Root + 'index.php?s=User-Comm-mark',
					{'val':$(this).attr('val'),'id':$("#_void_id").val()},
					function(r){
						if(parseInt(r.rcode)>0){
							$.hidediv(r);
							loadstat();
							hadpingfen=1;
						}else{
							if(parseInt(r.rcode)==-2){
								hadpingfen=1;
								$.showfloatdiv({txt:'已经评分,请务重复评分'});
								$.hidediv({});
							}else{
								$.closefloatdiv();
								$("#innermsg").trigger('click');	
							}
						}
				},'json');
			}
		}).hover(function(){
			this.myTitle=this.title;
			this.title="";
			//$("ul.rating li:lt("+n+")").addClass("hover");
			$(this).nextAll().removeClass("active");
			$(this).prevAll().addClass("active");
			$(this).addClass("active");
			$("#ratewords").html($title);
		},function(){
			this.title=this.myTitle;	
			$("ul.rating li:lt("+n+")").removeClass("hover");
		});	
	});
	
	// rating-panle
	$(".rating-panle").hover(function(){
		$(this).find(".rating-show").show();
	},function(){
		$(this).find(".rating-show").hide();
	});
	
	
});

