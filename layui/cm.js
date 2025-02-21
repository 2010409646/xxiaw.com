
 $(document).ready(function() {
	$("#cmt-input-tip .ui-input").focus(function() {
		$("#cmt-input-tip").hide(), $("#cmt-input-bd").show(), $("#cmt-input-bd .ui-textarea").focus()
	}), $(".play-mode-list").each(function(a, b) {
		$(b).find("a").each(function() {
			var c = $(this).attr("title");
			$(this).hover(function() {
				var a = $(this).offset().left + 3,
					b = $(this).offset().top - 28,
					d = $(this).parent().parent(".play-mode-list");
				$("<div></div>").addClass("play-mode-tip").css({
					left: a + "px",
					top: b + "px"
				}).html(c).appendTo(d), this.myTitle = this.title, this.title = ""
			}, function() {
				this.title = this.myTitle, $(".play-mode-tip").remove()
			})
		})
	}), $(".user-bt").each(function() {
		var a = $(this).find(".sect-btn"),
			b = $(this).find(".cancel"),
			c = $(this).find(".sect-show");
		a.click(function() {
			if (!checkcookie()) return login_form(), !1;
			$.showfloatdiv({
				txt: "数据提交中...",
				cssname: "loading"
			});
			var d = $(this);
			$.get(a.attr("data"), function(a) {
				$.hidediv(a), parseInt(a.rcode) > 0 ? (d.hide(), c.show(), b.show()) : parseInt(a["yjdy"]) > 0 && 1 == parseInt(a["yjdy"]) && (d.hide(a), c.show(), b.show())
			}, "json")
		}), b.click(function() {
			$.showfloatdiv({
				txt: "数据提交中...",
				cssname: "loading"
			}), $.get(b.attr("data"), function(b) {
				$.hidediv(b), parseInt(b.rcode) > 0 && (a.show(), c.hide())
			}, "json")
		})
	}), $(".ui-form-item").each(function() {
		var a = $(this).find(".ui-button"),
			b = $(this).find(".cancel"),
			c = $(this).find(".sect-show");
		$("#loginbt2").click(function() {
			if (!checkcookie()) return login_form(), !1;
			$.showfloatdiv({
				txt: "数据提交中...",
				cssname: "loading"
			});
			var d = $(this);
			$.get(a.attr("data"), function(a) {
				$.hidediv(a), parseInt(a.rcode) > 0 ? (d.hide(), c.show(), b.show()) : parseInt(a["yjdy"]) > 0 && 1 == parseInt(a["yjdy"]) && (d.hide(a), c.show(), b.show())
			}, "json")
		}), b.click(function() {
			$.showfloatdiv({
				txt: "数据提交中...",
				cssname: "loading"
			}), $.get(b.attr("data"), function(b) {
				$.hidediv(b), parseInt(b.rcode) > 0 && (a.show(), c.hide())
			}, "json")
		})
	}), $("ul.rating li").each(function() {
		var b = $(this).attr("title"),
			c = $("ul.rating li"),
			d = $(this).index(),
			e = d + 1;
		$(this).click(function() {
			hadpingfen > 0 ? ($.showfloatdiv({
				txt: "已经评分,请务重复评分"
			}), $.hidediv({})) : ($.showfloatdiv({
				txt: "数据提交中...",
				cssname: "loading"
			}), c.removeClass("active"), $("ul.rating li:lt(" + e + ")").addClass("active"), $("#ratewords").html(b), $.post(Root + "index.php?s=User-Comm-mark", {
				val: $(this).attr("val"),
				id: $("#_void_id").val()
			}, function(a) {
				parseInt(a.rcode) > 0 ? ($.hidediv(a), loadstat(), hadpingfen = 1) : -2 == parseInt(a.rcode) ? (hadpingfen = 1, $.showfloatdiv({
					txt: "已经评分,请务重复评分"
				}), $.hidediv({})) : ($.closefloatdiv(), $("#innermsg").trigger("click"))
			}, "json"))
		}).hover(function() {
			this.myTitle = this.title, this.title = "", $(this).nextAll().removeClass("active"), $(this).prevAll().addClass("active"), $(this).addClass("active"), $("#ratewords").html(b)
		}, function() {
			this.title = this.myTitle, $("ul.rating li:lt(" + e + ")").removeClass("hover")
		})
	}), $(".rating-panle").hover(function() {
		$(this).find(".rating-show").show()
	}, function() {
		$(this).find(".rating-show").hide()
	})
})