var FF = {
    'Suggest': {
        'Show': function($id, $limit, $ajaxurl, $jumpurl) {
            $("#" + $id).autocomplete($ajaxurl, {
				width: 228,
                scrollHeight: 320,
                minChars: 1,
                matchSubset: 1,
                max: $limit,
                cacheLength: 10,
                multiple: true,
                matchContains: true,
                autoFill: false,
                dataType: "json",
                parse: function(obj) {
                    if (obj.status) {
                        var parsed = [];
                        for (var i = 0; i < obj.data.length; i++) {
                            parsed[i] = {
                                data: obj.data[i],
                                value: obj.data[i].vod_name,
                                result: obj.data[i].vod_name
                            };
                        }
                        return parsed;
                    } else {
                        return {
                            data: '',
                            value: '',
                            result: ''
                        };
                    }
                },
                formatItem: function(row, i, max) {
                    return row.vod_name;
                },
                formatResult: function(row, i, max) {
                    return row.vod_name;
                }
            }).result(function(event, data, formatted) {
//                location.href = $jumpurl + encodeURIComponent(data.vod_name);
				  location.href = data.vod_url;
				  location.href = info;
            });
        }
    },
    'Cookie': {
        'Set': function(name, value, days) {
            var exp = new Date();
            exp.setTime(exp.getTime() + days * 24 * 60 * 60 * 1000);
            var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
            document.cookie = name + "=" + escape(value) + ";path=/;expires=" + exp.toUTCString();
        },
        'Get': function(name) {
            var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
            if (arr != null) {
                return unescape(arr[2]);
                return null;
            }
        },
        'Del': function(name) {
            var exp = new Date();
            exp.setTime(exp.getTime() - 1);
            var cval = this.Get(name);
            if (cval != null) {
                document.cookie = name + "=" + escape(cval) + ";path=/;expires=" + exp.toUTCString();
            }
        }
    },
	'Comment': {
		'Default': function($ajaxurl) {
			if($("#Comment").length>0){
				FF.Comment.Show($ajaxurl);
			}
		},
		'Show': function($ajaxurl) {
			$.ajax({
				type: 'get',
				url: $ajaxurl,
				timeout: 5000,
				error: function(){
					$("#Comment").html('评论加载失败...');
				},
				success:function($html){	
					$("#Comment").html($html);
				}
			});
		},
		'Post':function CommentPost(){
			if($("#comment_content").val() == '请在这里发表您的个人看法，最多200个字。'){
				$('#comment_tips').html('请发表您的评论观点！');
				return false;
			}
			var $data = "cm_sid="+Sid+"&cm_cid="+Id+"&cm_content="+$("#comment_content").val();
			$.ajax({
				type: 'post',
				url: Root+'index.php?s=Cm-insert',
				data: $data,
				dataType:'json',
				success:function($string){
					if($string.status == 1){
						FF.Comment.Show(Root+"index.php?s=Cm-Show-sid-"+Sid+"-id-"+Id+"-p-1");
					}
					alert($string.info);
				}
			});
		}
	}
}
$(document).ready(function() {
	FF.Comment.Default(Root+"index.php?s=Cm-Show-sid-"+Sid+"-id-"+Id+"-p-1");

});
