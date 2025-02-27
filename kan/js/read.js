var hv = $(".info dl:eq(7)");
if (hv.find('span').html() == '1900') {
	hv.find('span').html('2000年前');
};
var hadpingfen = 0;
function stars(r) {
	var curstars = parseInt(r.mystars);
	$("#pa").html(r['curpingfen'].a + "人");
	$("#pb").html(r['curpingfen'].b + "人");
	$("#pc").html(r['curpingfen'].c + "人");
	$("#pd").html(r['curpingfen'].d + "人");
	$("#pe").html(r['curpingfen'].e + "人");
	
	$("#commnum").html(r['curpingfen'].num);
	$("#commnums").html(r['curpingfen'].num);
	var totalnum = parseInt(r['curpingfen'].a) + parseInt(r['curpingfen'].b)
			+ parseInt(r['curpingfen'].c) + parseInt(r['curpingfen'].d)
			+ parseInt(r['curpingfen'].e);
	if (totalnum > 0) {
		$("#pam").css("width",((parseInt(r['curpingfen'].a) / totalnum) * 100) + "%");
		$("#pbm").css("width",((parseInt(r['curpingfen'].b) / totalnum) * 100) + "%");
		$("#pcm").css("width",((parseInt(r['curpingfen'].c) / totalnum) * 100) + "%");
		$("#pdm").css("width",((parseInt(r['curpingfen'].d) / totalnum) * 100) + "%");
		$("#pem").css("width",((parseInt(r['curpingfen'].e) / totalnum) * 100) + "%")
	};
	
	
	if (r['hadpingfen'] != undefined && r['hadpingfen'] != null) {hadpingfen = 1;}
	var PFbai = r['curpingfen'].pinfen*10;
	if (PFbai > 0) {
		$("#rating-main").show();
		$("#rating-kong").hide();
		//		$("#fenshu").css('width', parseInt(PFbai) + "%");
		//		$("#total").css('width', parseInt(PFbai) + "%");
		$("#fenshu").animate({'width': parseInt(PFbai) + "%"});
		$("#total").animate({'width': parseInt(PFbai) + "%"});
		$("#pingfen").html(r['curpingfen'].pinfen);
		$("#pingfen2").html(r['curpingfen'].pinfen);
		
	} else {
		$("#rating-main").hide();
		$("#rating-kong").show();
		$(".loadingg").addClass('nopingfen').html('暂时没有人评分，赶快从右边打分吧！');
	};
	if (r['loveid'] != null) {
		$(".interest-sect .sect-btn").hide();
		$(".interest-sect .sect-show").show();
		$(".loveidbox .sect-btn").hide();
		$(".loveidbox .sect-show").show();
	} else {
		$(".interest-sect .sect-btn").show();
		$(".interest-sect .cancel").hide();
		$(".loveidbox .sect-btn").show();
		$(".loveidbox .cancel").hide();
	}
	if (r['remindid'] != null) {
		$(".interest-rss .rss-btn").hide();
		$(".interest-rss .rss-show").show();
		$(".remind .rss-btn").hide();
		$(".remind .rss-show").show();
	} else {
		$(".interest-rss .rss-btn").show();
		$(".interest-rss .del").hide();
		$(".remind .rss-btn").show();
		$(".remind .del").hide();
	}
	
	if(r['guanzhuid'] != null) {
		$(".interest-guanzhu .guanzhu-btn").hide();
		$(".interest-guanzhu .guanzhu-show").show();
		$(".guanzhu .sect-btn").hide();
		$(".guanzhu .sect-show").show();
	} else {
		$(".interest-guanzhu .guanzhu-btn").show();
		$(".interest-guanzhu .del").hide();
		$(".guanzhu .guanzhu-btn").show();
		$(".guanzhu .del").hide();
	}
	if (curstars > 0) {
		var curnum = curstars - 1;
		$("ul.rating li:lt(" + curnum + ")").addClass("current");
		$("ul.rating li:eq(" + curnum + ")").addClass("current");
		$("ul.rating li:gt(" + curnum + ")").removeClass("current");
		var arr = new Array('很差', '较差', '还行', '推荐', '力荐');
		$("#ratewords").html(arr[curnum]);
	}
};
function login_form() {
    $.colorbox({
        inline: true,
        href: "#login-dialog",
        width: '570px'

    });

};

function down_form() {
    $.colorbox({
        inline: true,
        href: "#down-dialog",
        width: '570px'

    });
};
function link_form() {
	
    $.colorbox({
        inline: true,
        href: "#link-dialog",
        width: '570px'

    });

  
  };
function down_records(id) {
	
	var url =$(id).data("url");

	$.ajax({
        type: "get", //数据发送的方式（post 或者 get）
        url: url, //要发送的后台地址
       // data: { val1: "1", val2: "2" }, //要发送的数据（参数）格式为{'val1':"1","val2":"2"}
        dataType: "json", //后台处理后返回的数据格式
        success: function(data) {//ajax请求成功后触发的方法
           
			if(data.rcode==1){
				
				 $('#kk').html('<div id="tbmovbox" class="tbmovbox png-img" style="z-index:10000"><iframe frameborder="0" class="ui-iframe"></iframe><table class="ui-dialog-box"><tr><td><div class="ui-dialog"><div class="ui-dialog-cnt" id="ui-dialog-cnt"><div class="ui-dialog-tip alert" id="ui-cnt"><span id="xtip">' + data.msg + '</span></div></div><div class="ui-dialog-close"><span class="close" onclick="removeElement()"  >关闭</span></div></div></td></tr></table></div>');
				 
				 setTimeout("window.location.reload()",1000);
		
				
			}else{
				
				 $('#kk').html('<div id="tbmovbox" class="tbmovbox png-img" style="z-index:10000"><iframe frameborder="0" class="ui-iframe"></iframe><table class="ui-dialog-box"><tr><td><div class="ui-dialog"><div class="ui-dialog-cnt" id="ui-dialog-cnt"><div class="ui-dialog-tip alert" id="ui-cnt"><span id="xtip">' + data.msg + '</span></div></div><div class="ui-dialog-close"><span class="close" onclick="removeElement()"  >关闭</span></div></div></td></tr></table></div>');
		
			}
        },
        error: function(msg) {//ajax请求失败后触发的方法
            alert(msg); //弹出错误信息
        }
    });
       
	
}
function removeElement(id)
{
document.getElementById('tbmovbox').style.display="none";

document.getElementById('goumai').style.display="block";
}

$("#comm_txt").focus(function(e) {	
	if (!checkcookie()) {
		login_form();
		return false;
	}
});
$("#loginbarx").click(function(e) {
	if (!checkcookie()) {
		login_form();
		return false;
	}
});																	   
$("#loginbt").click(function(e) {
	userlogin();
});

$("#linkspay").click(function(e) {
	if (!checkcookie()) {
		login_form();
		return false;
	}else{
		down_form() 
		
	}
});	
$("#linkslink").click(function(e) {

	if (!checkcookie()) {
		login_form();
		return false;
	}else{
		tet_form()
		 
	}
});	
$("#linksorder").click(function(e) {
	console.log(111)
	var id=Id;
	
	pagegoo(Root + "index.php?s=user-center-order_pay-id-"+id+"-type-links") ;
});		
$("#subcomm").click(function(e) {
	$("#commform").qiresub({
		curobj : $("#subcomm"),
		txt : '数据提交中,请稍后...',
		onsucc : function(result) {
			$.hidediv(result);
			if (parseInt(result['rcode']) > 0) {
				pagegoo(Root + "index.php?s=User-Comm-getcomm-id-"+Id) ;
			}
		}
	}).post({
		url : Root + 'index.php?s=User-Comm-addcomm'
	});
	return false;
});
$("#indexlogin").click(function() {
	$("#indexlogin").attr('src', Root + "index.php?s=User-Checkcode-index-" + Math.random());
});
$("#register").click(function(e) {
	userreg();
});
$("#qqlogin").click(function(e) {
setTimeout(function(){
window.location.reload();
},7000)					 

});
$("ul.rating li").click(function(e) {
	$("#rating").qiresub({
		curobj : $("ul.rating li"),
		onsucc : function(result) {
			$.hidediv(result);
			pagegoo(Root + "index.php?s=User-Comm-getcomm-id-"+Id) ;
		}
	}).post({
		url : Root + "index.php?s=User-Comm-getcomm-id-" + Id
	});
	return false;
});
if (Id != undefined && Id != null && Id != '') {
    
    pagegoo(Root +"index.php?s=User-Comm-getcomm-id-" + Id + '')
};

function pagegoo(url) {
	$.ajax({
		url : url,
		success : function(data) {
			if(data.ajaxtxt != '') {
				if ($('#commbox li').length > 3)
					$("html,body").animate({
						scrollTop : $("#commbox").offset().top - 130
					}, 1000);
				
					$("#commbox").empty().html(data.ajaxtxt);
					
					$(".digg a").click(function(e) {
						opp($(this).attr('data'), $(this));
						return false ;
					});
					
					
					$(".reply").click(function(e) {
						var curid = $(this).attr('data');
						if (!checkcookie()) {
							login_form();
							return false;
						}else{
							if ($("#rep" + curid).html() != '') {
								$("#rep" + curid).html('');
							} else {
								$(".comms").html('');
								$("#rep" + curid).html($("#hidcommform").html());
								$("#rep"+ curid+ " #comm_id").val(curid); //回贴ID
								$("#rep" + curid + " .sub").unbind();
								$("#rep" + curid + " .sub").click(function(e) {
									$("#rep"+ curid+ " #mcommform").qiresub({
										curobj : $("#rep"+ curid+ " .sub"),
										txt : '数据提交中,请稍后...',
										onsucc : function(result) {
											$.hidediv(result);
											if (parseInt(result['rcode']) > 0) {
												pagegoo(Root + "index.php?s=User-Comm-getcomm-id-"+Id) ;
											}
										}
									}).post({
										url : Root + 'index.php?s=User-Comm-getrecomm'
									});
								});
							}
						}
					});
					
$(".replyt").click(function(e) {
   var curid = $(this).attr('data');
	 if (!checkcookie()) {
		login_form();
		return false;
		}else{
		  if ($("#reps" + curid).html() != '') {
			$("#reps" + curid).html('');
		} else {
		$(".commss").html('');
		$("#reps" + curid).html($("#hidcommformt").html());
		$("#reps"+ curid+ " #comm_id").val(curid); //回贴ID
		$("#reps" + curid + " .sub").unbind();
		$("#reps" + curid + " .sub").click(function(e) {
		$("#reps"+ curid+ " #mcommformt").qiresub({
		curobj : $("#reps"+ curid+ " .sub"),
		txt : '数据提交中,请稍后...',
		onsucc : function(result) {
		$.hidediv(result);
		if (parseInt(result['rcode']) > 0) {
		pagegoo(Root + "index.php?s=User-Home-Comm-uid-"+$("#user_id").val()) ;
		}
		}
		}).post({
		url : Root + 'index.php?s=User-Home-getrecomm'
		});
		});
		}
	}
});
			} else {
				$("#commbox").html('<li class="kong">当前没有评论，赶紧抢个沙发！</li>');
			};
			$("#pagebox").html(data.pages);
			$("#pageboxx").html(data.pagesx);
	
			if (data.star != undefined && data.star != null) {
				stars(data.star);
			};	
			$(".commpage a").click(function(e) {
				var pagegourl = $(this).attr('href');
				pagegoo(pagegourl);
				return false;
			});
			
		},dataType : 'json'
	});
	return false;
};



function opp(url, thisobj) {
	$.showfloatdiv({
		txt : '数据提交中...',
		cssname : 'loading'
	});
	$.get(url, function(r) {
		$.hidediv(r);
		if (parseInt(r.rcode) > 0) {
			thisobj.children('strong').html(parseInt(thisobj.children('strong').html()) + 1)
		}
	}, 'json');
};

$(".view-filter a").click(function(e) {
	$(this).prevAll().removeClass('current');
	$(this).nextAll().removeClass('current');
	$(this).addClass('current');
	pagegoo($(this).attr('data') + "-id-" + Id);
	return false;
});
function delcomm(url) {
	$.showfloatdiv({
		txt : '数据提交中...',
		cssname : 'loading'
	});
	$.get(url, function(r) {
		$.hidediv(r);
		if (parseInt(r.rcode) > 0) {
			$("#li" + r.id).remove()
		}
	}, 'json')
}
islogin=0;
function checkcookie(){
	if(document.cookie.indexOf('auth=')>=0){
		islogin=1;
		return true;
	}
	return false;
}
checkcookie();


$(document).ready(function(){


	$("#loginbarx").hover(function(){	   
		$(this).find(".drop-box").show();
	},function(){
		$(this).find(".drop-box").hide();
	});	
	$("#login2").click(function(){								
		$.colorbox({
        inline: true,
        href: "#login-dialog",
        width: '570px',
		height: '415px'

    });});	
});