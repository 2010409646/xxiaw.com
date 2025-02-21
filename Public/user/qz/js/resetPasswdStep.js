webpackJsonp([32], {
    0 : function(e, t, n) {
        "use strict";
        n(86),
        n(87),
        n(1),
        n(3),
        n(88),
        n(18),
        n(17),
        n(30),
        n(5),
        n(11),
        n(6),
        n(89)
    },
    1 : function(e, t) {},
    3 : function(e, t) {},
    5 : function(module, exports) {
        "use strict";
        var _typeof = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        }; (function(g) {
            function tryget(e, t, n) {
                var r = t.split("."),
                i,
                s = r.length;
                for (var o = e,
                u = 0; u < s; ++u) {
                    i = r[u];
                    if (! (i in o)) return n;
                    o = o[r[u]]
                }
                return o
            }
            function normalizeDateTime(e) {
                if (!e) return null;
                var t;
                return e = e.toString(),
                e.match(/^\d{10}$/) ? t = new Date(parseInt(e, 10) * 1e3) : e.match(/^\d{10,}$/) ? t = new Date(parseInt(e, 10)) : e.indexOf("-") > 0 && (t = new Date(Date.parse(e.replace(/-/g, "/")))),
                t
            }
            function chsdate(e, t) {
                var n = normalizeDateTime(e),
                r;
                return n ? (r = format("{month}月{date}日 {hour}:{minute,2,0}", {
                    month: n.getMonth() + 1,
                    date: n.getDate(),
                    hour: n.getHours(),
                    minute: n.getMinutes()
                }), t ? n.getFullYear() + "年" + r: r) : null
            }
            function jsonToStr(e, t, n) {
                t = t || "&",
                n = n || "=";
                var r = [],
                i,
                s;
                for (i in e) {
                    s = e[i];
                    if (s == null) continue;
                    e.hasOwnProperty(i) && (s instanceof Array ? r.push(encodeURIComponent(i) + "[]" + n + encodeURIComponent(s)) : r.push(encodeURIComponent(i) + n + encodeURIComponent(s)))
                }
                return r.join(t)
            }
            function belowthefold(e, t) {
                var n, r = $(window);
                return n = (window.innerHeight ? window.innerHeight: r.height()) + r.scrollTop(),
                n <= $(e).offset().top - t.threshold
            }
            function rightoffold(e, t) {
                var n, r = $(window);
                return n = r.width() + r.scrollLeft(),
                n <= $(e).offset().left - t.threshold
            }
            function abovethetop(e, t) {
                var n, r = $(window);
                return n = r.scrollTop(),
                n >= $(e).offset().top + t.threshold + $(e).height()
            }
            function leftofbegin(e, t) {
                var n, r = $(window);
                return n = r.scrollLeft(),
                n >= $(e).offset().left + t.threshold + $(e).width()
            }
            function inviewport(e, t) {
                return ! rightoffold(e, t) && !leftofbegin(e, t) && !belowthefold(e, t) && !abovethetop(e, t)
            }
            function recut(e, t, n) {
                var r = e;
                if (r && t) {
                    var i = e.match(/^(http:\/\/.+?)(\/.+)*(\/.+)$/);
                    i.length > 0 && (r = [i[1], "/", n, "/", t, i[3]].join(""))
                }
                return r
            }
            function imgsplit(e) {
                var t = e.split("|"),
                n = [];
                return t.forEach(function(e) {
                    n.push(recut(e, "200_113_", "dmfd"))
                }),
                n
            }
            var utils = g.$utils || {},
            isPlainObject = $.isPlainObject;
            utils.tryget = tryget;
            var format = function() {
                function e(e, t) {
                    var n = parseInt(t.align),
                    r = Math.abs(t.align),
                    i,
                    s;
                    if (e == null) s = "";
                    else {
                        if (typeof e != "number") throw new Error("Invalid argument type!");
                        s = "" + e
                    }
                    return r === 0 ? e: (r < s.length ? i = n > 0 ? s.slice(0, r) : s.slice( - r) : (i = Array(r - s.length + 1).join(t.pad || format.DefaultPaddingChar), i = n > 0 ? i + s: s + i), i)
                }
                function t(e) {
                    var t = {},
                    n, r, i = format.DefaultFieldSeperator;
                    return n = e.indexOf(i),
                    n < 0 ? t.index = e: (t.index = e.substr(0, n), r = e.indexOf(i, n + 1), r < 0 ? t.align = e.substring(n + 1, e.length) : (t.align = e.substring(n + 1, r), t.pad = e.substring(r + 1, e.length))),
                    t
                }
                return function(n, r) {
                    var i = arguments.length;
                    if (i > 2) r = Array.prototype.slice.call(arguments, 1);
                    else if (i === 2 && !isPlainObject(r)) r = [r];
                    else if (i === 1) return n;
                    return n.replace(format.InterpolationPattern,
                    function(n, i) {
                        var s = t(i),
                        o = tryget(r, s.index);
                        return o == null && (o = s.index),
                        s.align == null && s.pad == null ? o: e(o, s) || o
                    })
                }
            } ();
            format.DefaultPaddingChar = " ",
            format.DefaultFieldSeperator = ",",
            format.InterpolationPattern = /\{(.*?)\}/g,
            utils.format = format,
            utils.formatDate = function(e, t) {
                t = t || {};
                var n = String(e),
                r,
                i = n.match(/000$/) ? 1 : 1e3;
                return n.match(/^[\d]+$/) ? r = new Date(parseInt(e * i, 10)) : r = new Date(Date.parse(n.replace(/-/g, "/"))),
                format(t.format || utils.formatDate.DateFormatShort, {
                    year: r.getFullYear(),
                    month: r.getMonth() + 1,
                    date: r.getDate(),
                    hour: r.getHours(),
                    min: r.getMinutes()
                })
            },
            utils.formatDate.DateFormatShort = "{month,2,0}-{date,2,0} {hour,2,0}:{min,2,0}";
            var a = document.createElement("a"),
            ratio = window.devicePixelRatio || 1;
            utils.dmfd = function(e, t, n, r) {
                return utils.optimizeQhimg(e, {
                    type: "dmfd",
                    width: t,
                    height: n,
                    useRatio: !!r
                })
            },
            utils.dmt = function(e, t, n, r) {
                return utils.optimizeQhimg(e, {
                    type: "dmt",
                    width: t,
                    height: n,
                    useRatio: !!r
                })
            },
            utils.optimizeQhimg = function(e, t) {
                if (!~e.indexOf("qhimg.com")) return e;
                var n = "dc dr sdr bdr edr edrh dm dmt dmb dml dmr bdm bdmt bdmb bdml bdmr sdmt dmfd dmtfd dmsmty",
                r = {
                    width: 200,
                    height: 100,
                    quality: 70,
                    type: "dmfd",
                    useRatio: !1
                },
                i = {},
                s = n.replace(/[^, ]+/g,
                function(e) {
                    return ["\\/", e, "\\/"].join("")
                });
                if ((new RegExp("(" + s.split(" ").join("|") + ")")).test(e)) {
                    if (!t) return e;
                    i.type = RegExp.$1.slice(1, -1),
                    e = e.replace(new RegExp(i.type + "\\/(\\d*_\\d*_\\d*)\\/"),
                    function(e, t) {
                        var n = t.split("_");
                        return i.width = n[0],
                        i.height = n[1],
                        i.quality = n[2],
                        ""
                    })
                } (t && t.type && n.indexOf(t.type) === -1 || t && !t.type) && delete t.type,
                t = $.extend({},
                r, i, t),
                window.$netType == 0 && t.useRatio && (t.useRatio = !1);
                if (t.useRatio) {
                    var o = window.devicePixelRatio;
                    o >= 2 ? o = 2 : o = 1,
                    t.width && (t.width *= o),
                    t.height && (t.height *= o)
                }
                var u = utils.getParam("zoom_out", e) || 70;
                u && (t.width && (t.width *= u / 100), t.height && (t.height *= u / 100)),
                t.width = t.width ? Math.round(t.width) : t.width,
                t.height = t.height ? Math.round(t.height) : t.height;
                var a = [t.type, [t.width, t.height, t.quality].join("_")].join("/");
                return e.replace(/((?:http:\/\/|https:\/\?)?[A-Za-z0-9\.]+)\/(.*)/,
                function(e, t, n) {
                    return [t, a, n].join("/")
                })
            },
            utils.chsdate = chsdate,
            utils.elapse = function(e) {
                var t = normalizeDateTime(e);
                if (!t) return null;
                var n = new Date,
                r = Math.floor((n - t) / 1e3);
                if (r <= 60) return "刚刚";
                if (r > 60 && r < 3600) return Math.floor(r / 60) + "分钟前";
                if (r >= 3600 && r < 86400) return Math.floor(r / 3600) + "小时前";
                if (r >= 86400 && r < 259200) return Math.floor(r / 86400) + "天前";
                if (r >= 259200) {
                    var n = new Date,
                    i = "{month,2,0}月{date,2,0}日";
                    return n.getFullYear() !== t.getFullYear() && (i = "{year}年{month,2,0}月{date,2,0}日"),
                    format(i, {
                        year: t.getFullYear(),
                        month: t.getMonth() + 1,
                        date: t.getDate()
                    })
                }
            },
            utils.resizeAmap = function(e, t, n) {
                return e.replace(/size=(\d+)\*(\d+)/,
                function(e, r, i) {
                    return "size=" + t + "*" + n
                })
            },
            utils.unescape = function(e) {
                return e.replace(/&nbsp;/g, " ").replace(/&amp;/g, "&").replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&quot;/g, '"').replace(/&#039;/g, "'").replace(/&#39;/g, "'")
            },
            utils.escape = function(e) {
                return e ? e.replace(/&/g, "&amp").replace(/</g, "&lt").replace(/>/g, "&gt").replace(/\"/g, "&quot").replace(/'/g, "&#039").replace(/'/g, "&#39") : e
            },
            utils.uuid = function() {
                return "xxxxxxxx.xxxx.4xxx.yxxx.xxxxxxxxxxxx".replace(/[xy]/g,
                function(e) {
                    var t = Math.random() * 16 | 0,
                    n = e == "x" ? t: t & 3 | 8;
                    return n.toString(16)
                })
            },
            utils.toKw = function(e) {
                return e < 1e3 ? e: e < 1e4 && e >= 1e3 ? (e / 1e3).toFixed(0) + "K": (e / 1e4).toFixed(0) + "W"
            },
            utils.fromKw = function(e) {
                var t = {
                    k: 1e3,
                    w: 1e4
                },
                n = e.toLowerCase().replace(/([\d.]+)(k|w)$/,
                function(e, n, r) {
                    return parseInt(n, 10) * (t[r] || 1)
                });
                return parseInt(n, 10)
            },
            utils.extractVideoUrl = function(e) {
                a.href = e;
                var t = a.search.toString();
                return ! t || t.indexOf("?url=") < 0 ? e: (t = a.search.split("="), t.length < 2 ? e: decodeURIComponent(t[1]))
            };
            var stripTagDiv = document.createElement("div");
            utils.stripTags = function(e) {
                return stripTagDiv.innerHTML = e,
                stripTagDiv.textContent || stripTagDiv.innerText
            },
            utils.trunc = function(e, t, n, r) {
                if (!e) return e;
                r && (e = utils.stripTags(e));
                var i = 0,
                s = e.length,
                o, u = "",
                a = 0;
                if (s < t / 2) return e;
                for (; i < s && a < t; ++i) o = e.charAt(i),
                u += o,
                a += o.match(/[ 。 ；  ， ： “ ”（ ） 、 ？ 《 》\u4E00-\u9FA5]/) ? 2 : 1;
                return u + (n || "")
            },
            utils.getParam = function(e, t) {
                var n = t ? t: window.location.search,
                r = n.match(new RegExp("[?&]{1}" + e + "=([^&]*)"));
                return r === null ? null: decodeURIComponent(r[1])
            },
            utils.getQueryJson = function(e) {
                var e = e ? e: location.href,
                t = e.match(/(\?[^#]*)#?/),
                n = t && t[1],
                r = {};
                return n ? (n.substr(1).replace(/(\w+)=(\w+)/ig,
                function(e, t, n) {
                    r[t] = unescape(n)
                }), r) : {}
            };
            var cookie = {
                get: function(t) {
                    if (typeof t != "string" || !t || !document.cookie) return;
                    t = t.replace(/([.*+?^=!:${}()|[\]\/\\])/g, "\\$1");
                    var n = new RegExp("(?:^|;)\\s?" + t + "=(.*?)(?:;|$)", "i"),
                    r = document.cookie.match(n);
                    return r && decodeURIComponent(r[1])
                },
                set: function(t, n, r) {
                    if (typeof t != "string" || !t) return;
                    r = r || {};
                    var i = r.expires,
                    s = t + "=" + n;
                    return typeof i == "number" && (i = new Date, i.setTime(i.getTime() + r.expires)),
                    i instanceof Date && (s += "; expires=" + i.toUTCString()),
                    r.domain && (s += "; domain=" + r.domain),
                    r.path && (s += "; path=" + r.path),
                    r.secure && (s += "; secure"),
                    document.cookie = s,
                    s
                }
            };
            utils.cookie = cookie,
            utils.getCookie = function(e) {
                if (typeof e != "string" || !e || !document.cookie) return;
                e = e.replace(/([.*+?^=!:${}()|[\]\/\\])/g, "\\$1");
                var t = new RegExp("(?:^|;)\\s?" + e + "=(.*?)(?:;|$)", "i"),
                n = document.cookie.match(t);
                return n && decodeURIComponent(n[1])
            },
            utils.setCookie = function(e, t, n) {
                if (typeof e != "string" || !e) return;
                n = n || {};
                var r = n.expires,
                i = e + "=" + t;
                return typeof r == "number" && (r = new Date, r.setTime(r.getTime() + n.expires)),
                r instanceof Date && (i += "; expires=" + r.toUTCString()),
                n.domain && (i += "; domain=" + n.domain),
                n.path && (i += "; path=" + n.path),
                n.secure && (i += "; secure"),
                document.cookie = i,
                i
            },
            utils.jsonToStr = jsonToStr,
            utils.countNum = function(e, t) {
                var n = 0,
                r = /[\u4e00-\u9fa5]/,
                i = parseInt("FF61", 16),
                s = parseInt("FF9F", 16),
                o = parseInt("FFE8", 16),
                u = parseInt("FFEE", 16);
                for (var a = 0,
                f = e.length; a < f; a++) if (r.test(e[a])) n += 1;
                else {
                    var l = parseInt(e.charCodeAt(a));
                    l < 256 ? n += .5 : i <= l && l <= s ? n += .5 : o <= l && l <= u ? n += .5 : n += 1
                }
                return n >= t ? e.substr(0, t - 2) + "...": e
            },
            utils.isEmptyObj = function(e) {
                for (var t in e) return ! 1;
                return ! 0
            },
            utils.inviewport = inviewport,
            utils.setWeblogMonitorMap = function(e) {
                if (! ((typeof e == "undefined" ? "undefined": _typeof(e)) === "object" && e instanceof Array)) return;
                var t = window.weblogMap ? window.weblogMap: {};
                for (var n = 0,
                r = e.length; n < r; n++) {
                    var i = e[n];
                    if (!t[i.gid || i.ad_id]) {
                        var s, o, u = {},
                        a = "";
                        i.is_ad && i.data && i.data.ads && (i = i.data.ads[0]),
                        i.ad_id ? (s = i.ad_id, o = 1) : (s = i.gid, o = 0);
                        try {
                            i.s_log || (i.s_log = ""),
                            i.s_log.length && (u = i.s_log, a = JSON.parse(u).channel_position ? "-" + JSON.parse(u).channel_position[1] : ""),
                            t[s + a] = {},
                            t[s + a].slog = i.s_log.length ? i.s_log: "{}",
                            t[s + a].adtrack = o
                        } catch(f) {}
                    }
                }
                window.weblogMap = t
            },
            utils.ExtendJson = function() {
                window.JSON || (window.JSON = {
                    parse: function parse(sJSON) {
                        return eval("(" + sJSON + ")")
                    },
                    stringify: function() {
                        var e = Object.prototype.toString,
                        t = Array.isArray ||
                        function(t) {
                            return e.call(t) === "[object Array]"
                        },
                        n = {
                            '"': '\\"',
                            "\\": "\\\\",
                            "\b": "\\b",
                            "\f": "\\f",
                            "\n": "\\n",
                            "\r": "\\r",
                            "	": "\\t"
                        },
                        r = function(t) {
                            return n[t] || "\\u" + (t.charCodeAt(0) + 65536).toString(16).substr(1)
                        },
                        i = /[\\"\u0000-\u001F\u2028\u2029]/g;
                        return function s(n) {
                            if (n == null) return "null";
                            if (typeof n == "number") return isFinite(n) ? n.toString() : "null";
                            if (typeof n == "boolean") return n.toString();
                            if ((typeof n == "undefined" ? "undefined": _typeof(n)) === "object") {
                                if (typeof n.toJSON == "function") return s(n.toJSON());
                                if (t(n)) {
                                    var o = "[";
                                    for (var u = 0; u < n.length; u++) o += (u ? ", ": "") + s(n[u]);
                                    return o + "]"
                                }
                                if (e.call(n) === "[object Object]") {
                                    var a = [];
                                    for (var f in n) n.hasOwnProperty(f) && a.push(s(f) + ": " + s(n[f]));
                                    return "{" + a.join(", ") + "}"
                                }
                            }
                            return '"' + n.toString().replace(i, r) + '"'
                        }
                    } ()
                })
            } (),
            utils.decryptVideo = function(e) {
                var t = e.substr(3);
                nlen = t.length,
                temp = "";
                for (var n = 0; n < nlen; n += 11) temp += t.substr(n + 1, 10);
                return t = temp,
                window.Base64.decode(t).reverse().map(function(e) {
                    return String.fromCharCode(e)
                }).join("")
            },
            utils.getObjByKey = function(e, t, n) {
                if (!e) return;
                var r;
                if (e[t]) r = e;
                else for (var i in e) _typeof(e[i]) === "object" && utils.getObjByKey(e[i], t, n);
                return r && n.push(r),
                n
            },
            utils.artRender = function(e, t, n) {
                $(e).html(template.compile($(t).html())(n))
            },
            $.ajaxSetup({
                success: function(t, n, r) {
                    if (t) {
                        var i = utils.getObjByKey(t, "s_log", []);
                        utils.setWeblogMonitorMap(i)
                    }
                }
            }),
            utils.imgsplit = imgsplit,
            g.$utils || (g.$utils = utils)
        })(window),
        function(e, t) {
            var n = e.jQuery || e.Cowboy || (e.Cowboy = {}),
            r;
            n.throttle = r = function(r, i, s, o) {
                function f() {
                    function l() {
                        a = +(new Date),
                        s.apply(e, f)
                    }
                    function c() {
                        u = t
                    }
                    var e = this,
                    n = +(new Date) - a,
                    f = arguments;
                    o && !u && l(),
                    u && clearTimeout(u),
                    o === t && n > r ? l() : i !== !0 && (u = setTimeout(o ? c: l, o === t ? r - n: r))
                }
                var u, a = 0;
                return typeof i != "boolean" && (o = s, s = i, i = t),
                n.guid && (f.guid = s.guid = s.guid || n.guid++),
                f
            },
            n.debounce = function(e, n, i) {
                return i === t ? r(e, n, !1) : r(e, i, n !== !1)
            }
        } (window)
    },
    6 : function(e, t, n) {
        "use strict";
        n(7),
        n(8),
        n(9),
        n(10)
    },
    7 : function(e, t) {
        "use strict";
        var n = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        }; (function() {
            if (typeof window.QIHOO_MONITOR != "undefined") return;
            var e = "v1.5.0 (2016.01.25)",
            t = ["360.cn", "so.com", "leidian.com", "btime.com"],
            r = function(i, s) {
                var o; (function() {
                    o = !0;
                    try {
                        var e = location.protocol.toLowerCase();
                        if (e == "http:" || e == "https:") o = !1
                    } catch(t) {}
                })();
                var u = document,
                a = navigator,
                f = i.screen,
                l = o ? "": document.domain.toLowerCase(),
                c = a.userAgent.toLowerCase(),
                h = {
                    trim: function(t) {
                        return t.replace(/^[\s\xa0\u3000]+|[\u3000\xa0\s]+$/g, "")
                    }
                },
                p = {
                    on: function(t, n, r) {
                        t.addEventListener ? t && t.addEventListener(n, r, !1) : t && t.attachEvent("on" + n, r)
                    },
                    parentNode: function(t, n, r) {
                        r = r || 5,
                        n = n.toUpperCase();
                        while (t && r-->0) {
                            if (t.tagName === n) return t;
                            t = t.parentNode
                        }
                        return null
                    }
                },
                d = {
                    fix: function(t) {
                        if (! ("target" in t)) {
                            var n = t.srcElement || t.target;
                            n && n.nodeType == 3 && (n = n.parentNode),
                            t.target = n
                        }
                        return t
                    }
                },
                v = function() {
                    function e(e) {
                        return e != null && e.constructor != null ? Object.prototype.toString.call(e).slice(8, -1) : ""
                    }
                    return {
                        isArray: function(n) {
                            return e(n) == "Array"
                        },
                        isObject: function(t) {
                            return t !== null && (typeof t === "undefined" ? "undefined": n(t)) == "object"
                        },
                        mix: function(t, n, r) {
                            for (var i in n) if (r || !(t[i] || i in t)) t[i] = n[i];
                            return t
                        },
                        encodeURIJson: function(t) {
                            var n = [];
                            for (var r in t) {
                                if (t[r] == null) continue;
                                n.push(encodeURIComponent(r) + "=" + encodeURIComponent(t[r]))
                            }
                            return n.join("&")
                        }
                    }
                } (),
                m = {
                    get: function(t) {
                        try {
                            var n, r = new RegExp("(^| )" + t + "=([^;]*)(;|$)");
                            return (n = u.cookie.match(r)) ? unescape(n[2]) : ""
                        } catch(i) {
                            return ""
                        }
                    },
                    set: function(t, n, r) {
                        r = r || {};
                        var i = r.expires;
                        typeof i == "number" && (i = new Date, i.setTime(i.getTime() + r.expires));
                        try {
                            u.cookie = t + "=" + escape(n) + (i ? ";expires=" + i.toGMTString() : "") + (r.path ? ";path=" + r.path: "") + (r.domain ? "; domain=" + r.domain: "")
                        } catch(s) {}
                    }
                },
                g = {
                    getColorDepth: function() {
                        return f.colorDepth + "-bit"
                    },
                    getLanguage: function() {
                        return (a.language || a.browserLanguage).toLowerCase()
                    },
                    getScreenSize: function() {
                        return f.width + "x" + f.height
                    },
                    getProject: function() {
                        return ""
                    },
                    getReferrer: function() {
                        var t = u.referrer || "";
                        return t.indexOf("pass") > -1 || t.indexOf("pwd") > -1 ? "403": t
                    },
                    getBrowser: function() {
                        var t = {
                            "360se-ua": "360se",
                            TT: "tencenttraveler",
                            Maxthon: "maxthon",
                            GreenBrowser: "greenbrowser",
                            Sogou: "se 1.x / se 2.x",
                            TheWorld: "theworld"
                        };
                        for (var n in t) if (c.indexOf(t[n]) > -1) return n;
                        var r = !1;
                        try { + external.twGetVersion(external.twGetSecurityID(i)).replace(/\./g, "") > 1013 && (r = !0)
                        } catch(s) {}
                        if (r) return "360se-noua";
                        var o = c.match(/(msie|chrome|safari|firefox|opera|trident)/);
                        return o = o ? o[0] : "",
                        o == "msie" ? o = c.match(/msie[^;]+/) + "": o == "trident" && c.replace(/trident\/[0-9].*rv[ :]([0-9.]+)/ig,
                        function(e, t) {
                            o = "msie " + t
                        }),
                        o
                    },
                    getLocation: function() {
                        var t = "";
                        try {
                            t = location.href
                        } catch(n) {
                            t = u.createElement("a"),
                            t.href = "",
                            t = t.href
                        }
                        return t = /\.(s?htm|php)/.test(t) ? t: t.replace(/\/$/, "") + "/",
                        t
                    },
                    hash: function(t) {
                        var n = 0,
                        r = 0,
                        i = t.length - 1;
                        for (i; i >= 0; i--) {
                            var s = parseInt(t.charCodeAt(i), 10);
                            n = (n << 6 & 268435455) + s + (s << 14),
                            (r = n & 266338304) != 0 && (n ^= r >> 21)
                        }
                        return n
                    },
                    guid: function() {
                        var t = [a.appName, a.version, a.language || a.browserLanguage, a.platform, a.userAgent, f.width, "x", f.height, f.colorDepth, u.referrer].join(""),
                        n = t.length,
                        r = i.history.length;
                        while (r) t += r--^n++;
                        return (Math.round(Math.random() * 2147483647) ^ g.hash(t)) * 2147483647
                    },
                    getSid: function() {
                        var t = "__sid",
                        n = m.get(t);
                        n || (n = [g.hash(o ? "": u.domain), g.guid(), +(new Date) + Math.random()].join("."));
                        var r = {
                            expires: (g._activeTime || 30) * 60 * 1e3,
                            path: "/"
                        };
                        return m.set(t, n, r),
                        n
                    },
                    getMid: function() {
                        try {
                            return external.GetMID(external.GetSID(i))
                        } catch(t) {
                            return ""
                        }
                    },
                    getGid: function() {
                        var n = "__gid",
                        r = m.get(n);
                        r ? (r = r.split("."), r[3] = (new Date).getTime(), r[4] = (parseInt(r[4]) || 1) + 1, r = r.join(".")) : r = [g.hash(o ? "": u.domain), Math.floor(Math.random() * 1e9), (new Date).getTime(), (new Date).getTime(), 1].join(".");
                        var i = {
                            expires: 63072e6,
                            path: "/"
                        };
                        if (t.length) for (var s = 0; s < t.length; s++) {
                            var a = t[s],
                            f = "." + a;
                            if (l.indexOf(f) > 0 && l.lastIndexOf(f) == l.length - f.length || l == a) {
                                i.domain = f;
                                break
                            }
                        }
                        return m.set(n, r, i),
                        r
                    },
                    getGuid: function() {
                        var n = "__guid",
                        r = m.get(n);
                        if (!r) {
                            r = [g.hash(o ? "": u.domain), g.guid(), +(new Date) + Math.random() + Math.random()].join(".");
                            var i = {
                                expires: 2592e7,
                                path: "/"
                            };
                            if (t.length) for (var s = 0; s < t.length; s++) {
                                var a = t[s],
                                f = "." + a;
                                if (l.indexOf(f) > 0 && l.lastIndexOf(f) == l.length - f.length || l == a) {
                                    i.domain = f;
                                    break
                                }
                            }
                            m.set(n, r, i)
                        }
                        return r
                    },
                    getCount: function() {
                        var e = "monitor_count",
                        t = m.get(e);
                        return t = (parseInt(t) || 0) + 1,
                        m.set(e, t, {
                            expires: 864e5,
                            path: "/"
                        }),
                        function() {
                            return t
                        }
                    } (),
                    getFlashVer: function() {
                        var t = -1;
                        if (a.plugins && a.mimeTypes.length) {
                            var n = a.plugins["Shockwave Flash"];
                            n && n.description && (t = n.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s)+r/, ".") + ".0")
                        } else if (i.ActiveXObject && !i.opera) try {
                            var r = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
                            if (r) {
                                var s = r.GetVariable("$version");
                                t = s.replace(/WIN/g, "").replace(/,/g, ".")
                            }
                        } catch(o) {}
                        return t = parseInt(t, 10),
                        t
                    },
                    getContainerId: function(t) {
                        var n, r, i = 100;
                        b.areaIds && (n = new RegExp("^(" + b.areaIds.join("|") + ")$", "ig"));
                        while (t) {
                            if (t.attributes && ("bk" in t.attributes || "data-bk" in t.attributes)) {
                                r = t.getAttribute("bk") || t.getAttribute("data-bk");
                                if (r) return r = "bk:" + r,
                                r.substr(0, i);
                                if (t.id) return r = t.getAttribute("data-desc") || t.id,
                                r.substr(0, i)
                            } else if (n && t.id && n.test(t.id)) return r = t.getAttribute("data-desc") || t.id,
                            r.substr(0, i);
                            t = t.parentNode
                        }
                        return ""
                    },
                    getText: function(t) {
                        var n = "";
                        return t.tagName.toLowerCase() == "input" ? n = t.getAttribute("text") || t.getAttribute("data-text") || t.value || t.title || "": n = t.getAttribute("text") || t.getAttribute("data-text") || t.innerText || t.textContent || t.title || "",
                        h.trim(n).substr(0, 100)
                    },
                    getHref: function(t) {
                        try {
                            return t.getAttribute("data-href") || t.href || ""
                        } catch(n) {
                            return ""
                        }
                    }
                },
                y = {
                    getBase: function() {
                        return {
                            p: g.getProject(),
                            u: g.getLocation(),
                            guid: g.getGuid(),
                            gid: g.getGid(),
                            sid: g.getSid(),
                            title: document.title,
                            mid: g.getMid()
                        }
                    },
                    getTrack: function(t) {
                        var n = g.getSid() === g.getSid() ? 1 : 0,
                        r = {
                            b: g.getBrowser(),
                            c: g.getCount(),
                            r: g.getReferrer(),
                            fl: g.getFlashVer(),
                            sd: g.getColorDepth(),
                            sr: g.getScreenSize(),
                            ul: g.getLanguage(),
                            ce: n
                        };
                        if (t) {
                            t = t.split(",");
                            var i = [];
                            for (var s = 0,
                            o = t.length; s < o; s++) {
                                var u = m.get(t[s]);
                                i.push(t[s] + "=" + encodeURIComponent(u))
                            }
                            r.uc = encodeURIComponent(i.join("&"))
                        }
                        return r
                    },
                    getClick: function(t) {
                        t = d.fix(t || event);
                        var n = t.target,
                        r = n.tagName,
                        i = g.getContainerId(n);
                        if (!n.type || n.type != "submit" && n.type != "button") {
                            if (r == "AREA") return {
                                f: g.getHref(n),
                                c: "area:" + n.parentNode.name,
                                cId: i
                            };
                            var s, o;
                            return r == "IMG" && (s = n),
                            n = p.parentNode(n, "A"),
                            n ? (o = g.getText(n), {
                                f: g.getHref(n),
                                c: o ? o: s ? s.src.match(/[^\/]+$/) : "",
                                cId: i
                            }) : !1
                        }
                        var u = p.parentNode(n, "FORM"),
                        a = {};
                        if (u) {
                            var f = u.id || "",
                            l = n.id;
                            a = {
                                f: u.action,
                                c: "form:" + (u.name || f),
                                cId: i
                            };
                            if ((f == "search-form" || f == "searchForm") && (l == "searchBtn" || l == "search-btn")) {
                                var c = w("kw") || w("search-kw") || w("kw1");
                                a.w = c ? c.value: ""
                            }
                        } else a = {
                            f: g.getHref(n),
                            c: g.getText(n),
                            cId: i
                        };
                        return a
                    },
                    getKeydown: function(t) {
                        t = d.fix(t || event);
                        if (t.keyCode != 13) return ! 1;
                        var n = t.target,
                        r = n.tagName,
                        i = g.getContainerId(n);
                        if (r == "INPUT") {
                            var s = p.parentNode(n, "FORM");
                            if (s) {
                                var o = s.id || "",
                                u = n.id,
                                a = {
                                    f: s.action,
                                    c: "form:" + (s.name || o),
                                    cId: i
                                };
                                if (u == "kw" || u == "search-kw" || u == "kw1") a.w = n.value;
                                return a
                            }
                        }
                        return ! 1
                    }
                },
                b = {
                    trackUrl: null,
                    clickUrl: null,
                    areaIds: null
                },
                w = function(t) {
                    return document.getElementById(t)
                };
                return {
                    version: e,
                    util: g,
                    data: y,
                    config: b,
                    sendLog: function() {
                        return i.__qihoo_monitor_imgs = {},
                        function(e) {
                            var t = "log_" + +(new Date),
                            n = i.__qihoo_monitor_imgs[t] = new Image;
                            n.onload = n.onerror = function() {
                                i.__qihoo_monitor_imgs && i.__qihoo_monitor_imgs[t] && (i.__qihoo_monitor_imgs[t] = null, delete i.__qihoo_monitor_imgs[t])
                            },
                            n.src = e
                        }
                    } (),
                    buildLog: function() {
                        var e = "";
                        return function(t, n) {
                            if (t === !1) return;
                            t = t || {};
                            var r = y.getBase();
                            t = v.mix(r, t, !0);
                            var i = n + v.encodeURIJson(t);
                            if (i == e) return;
                            e = i,
                            setTimeout(function() {
                                e = ""
                            },
                            100);
                            var s = v.encodeURIJson(t);
                            s += "&t=" + +(new Date),
                            n = n.indexOf("?") > -1 ? n + "&" + s: n + "?" + s,
                            this.sendLog(n)
                        }
                    } (),
                    log: function(t, n) {
                        n = n || "click";
                        var r = b[n + "Url"];
                        r || alert("Error : the " + n + "url does not exist!"),
                        this.buildLog(t, r)
                    },
                    setConf: function(t, n) {
                        var r = {};
                        return v.isObject(t) ? r = t: r[t] = n,
                        this.config = v.mix(this.config, r, !0),
                        this
                    },
                    setUrl: function(t) {
                        return t && (this.util.getLocation = function() {
                            return t
                        }),
                        this
                    },
                    setProject: function(t) {
                        return t && (this.util.getProject = function() {
                            return t
                        }),
                        this
                    },
                    setId: function() {
                        var t = [],
                        n = 0,
                        r;
                        while (r = arguments[n++]) v.isArray(r) ? t = t.concat(r) : t.push(r);
                        return this.setConf("areaIds", t),
                        this
                    },
                    getTrack: function(t) {
                        var n = this.data.getTrack(t);
                        return this.log(n, "track"),
                        this
                    },
                    getClickHeatmap: function(t, n) {
                        if (this.heatmapTimer) return;
                        this.heatmapTimer = !0;
                        var r = this,
                        i = [];
                        t = t || 10,
                        n = n || 5;
                        var s = 0,
                        o = function a(e) {
                            clearTimeout(s);
                            if (e || i.length > t) {
                                if (!i.length) return;
                                r.log({
                                    pos: i.join(","),
                                    sr: g.getScreenSize()
                                },
                                "clickHeatMap"),
                                i = [];
                                return
                            }
                            s = setTimeout(function() {
                                a(!0)
                            },
                            n * 60 * 1e3)
                        };
                        return p.on(u, "mousedown",
                        function(e) {
                            var t = e.pageX + "." + e.pageY;
                            i.push(t),
                            o()
                        }),
                        this
                    },
                    getClickAndKeydown: function() {
                        var t = this;
                        return p.on(u, "mousedown",
                        function(e) {
                            var n = t.data.getClick(e);
                            t.log(n, "click")
                        }),
                        p.on(u, "keydown",
                        function(e) {
                            var n = t.data.getKeydown(e);
                            t.log(n, "click")
                        }),
                        r.getClickAndKeydown = function() {
                            return t
                        },
                        this
                    },
                    setActiveTime: function(t) {
                        return g._activeTime = t,
                        this
                    }
                }
            } (window);
            r.setConf({
                trackUrl: "//s.360.cn/qdas/s.htm",
                clickUrl: "//s.360.cn/qdas/c.htm",
                clickHeatMapUrl: "//s.360.cn/qdas/c.htm",
                wpoUrl: "//s.360.cn/qdas/p.htm"
            }),
            window.QIHOO_MONITOR = r,
            typeof window.monitor == "undefined" && (window.monitor = r)
        })()
    },
    8 : function(e, t) {
        "use strict";
        var n = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        }; (function() {
            if (typeof window.QIHOO_MONITOR_COMMON != "undefined") return;
            var e = "v1.4.0 (2016.01.04)",
            t = ["360.cn", "so.com", "leidian.com", "btime.com"],
            r = function(i, s) {
                var o; (function() {
                    o = !0;
                    try {
                        var e = location.protocol.toLowerCase();
                        if (e == "http:" || e == "https:") o = !1
                    } catch(t) {}
                })();
                var u = document,
                a = navigator,
                f = i.screen,
                l = o ? "": document.domain.toLowerCase(),
                c = a.userAgent.toLowerCase(),
                h = {
                    trim: function(t) {
                        return t.replace(/^[\s\xa0\u3000]+|[\u3000\xa0\s]+$/g, "")
                    }
                },
                p = {
                    on: function(t, n, r) {
                        t.addEventListener ? t && t.addEventListener(n, r, !1) : t && t.attachEvent("on" + n, r)
                    },
                    parentNode: function(t, n, r) {
                        r = r || 5,
                        n = n.toUpperCase();
                        while (t && r-->0) {
                            if (t.tagName === n) return t;
                            t = t.parentNode
                        }
                        return null
                    }
                },
                d = {
                    fix: function(t) {
                        if (! ("target" in t)) {
                            var n = t.srcElement || t.target;
                            n && n.nodeType == 3 && (n = n.parentNode),
                            t.target = n
                        }
                        return t
                    }
                },
                v = function() {
                    function e(e) {
                        return e != null && e.constructor != null ? Object.prototype.toString.call(e).slice(8, -1) : ""
                    }
                    return {
                        isArray: function(n) {
                            return e(n) == "Array"
                        },
                        isObject: function(t) {
                            return t !== null && (typeof t === "undefined" ? "undefined": n(t)) == "object"
                        },
                        mix: function(t, n, r) {
                            for (var i in n) if (r || !(t[i] || i in t)) t[i] = n[i];
                            return t
                        },
                        encodeURIJson: function(t) {
                            var n = [];
                            for (var r in t) {
                                if (t[r] == null) continue;
                                n.push(encodeURIComponent(r) + "=" + encodeURIComponent(t[r]))
                            }
                            return n.join("&")
                        }
                    }
                } (),
                m = {
                    get: function(t) {
                        try {
                            var n, r = new RegExp("(^| )" + t + "=([^;]*)(;|$)");
                            return (n = u.cookie.match(r)) ? unescape(n[2]) : ""
                        } catch(i) {
                            return ""
                        }
                    },
                    set: function(t, n, r) {
                        r = r || {};
                        var i = r.expires;
                        typeof i == "number" && (i = new Date, i.setTime(i.getTime() + r.expires));
                        try {
                            u.cookie = t + "=" + escape(n) + (i ? ";expires=" + i.toGMTString() : "") + (r.path ? ";path=" + r.path: "") + (r.domain ? "; domain=" + r.domain: "")
                        } catch(s) {}
                    }
                },
                g = {
                    getColorDepth: function() {
                        return f.colorDepth + "-bit"
                    },
                    getLanguage: function() {
                        return (a.language || a.browserLanguage).toLowerCase()
                    },
                    getScreenSize: function() {
                        return f.width + "x" + f.height
                    },
                    getProject: function() {
                        return ""
                    },
                    getReferrer: function() {
                        var t = u.referrer || "";
                        return t.indexOf("pass") > -1 || t.indexOf("pwd") > -1 ? "403": t
                    },
                    getBrowser: function() {
                        var t = {
                            "360se-ua": "360se",
                            TT: "tencenttraveler",
                            Maxthon: "maxthon",
                            GreenBrowser: "greenbrowser",
                            Sogou: "se 1.x / se 2.x",
                            TheWorld: "theworld"
                        };
                        for (var n in t) if (c.indexOf(t[n]) > -1) return n;
                        var r = !1;
                        try { + external.twGetVersion(external.twGetSecurityID(i)).replace(/\./g, "") > 1013 && (r = !0)
                        } catch(s) {}
                        if (r) return "360se-noua";
                        var o = c.match(/(msie|chrome|safari|firefox|opera|trident)/);
                        return o = o ? o[0] : "",
                        o == "msie" ? o = c.match(/msie[^;]+/) + "": o == "trident" && c.replace(/trident\/[0-9].*rv[ :]([0-9.]+)/ig,
                        function(e, t) {
                            o = "msie " + t
                        }),
                        o
                    },
                    getLocation: function() {
                        var t = "";
                        try {
                            t = location.href
                        } catch(n) {
                            t = u.createElement("a"),
                            t.href = "",
                            t = t.href
                        }
                        return t = t.replace(/[?#].*$/, ""),
                        t = /\.(s?htm|php)/.test(t) ? t: t.replace(/\/$/, "") + "/",
                        t
                    },
                    getGuid: function() {
                        function e(e) {
                            var t = 0,
                            n = 0,
                            r = e.length - 1;
                            for (r; r >= 0; r--) {
                                var i = parseInt(e.charCodeAt(r), 10);
                                t = (t << 6 & 268435455) + i + (i << 14),
                                (n = t & 266338304) != 0 && (t ^= n >> 21)
                            }
                            return t
                        }
                        function n() {
                            var t = [a.appName, a.version, a.language || a.browserLanguage, a.platform, a.userAgent, f.width, "x", f.height, f.colorDepth, u.referrer].join(""),
                            n = t.length,
                            r = i.history.length;
                            while (r) t += r--^n++;
                            return (Math.round(Math.random() * 2147483647) ^ e(t)) * 2147483647
                        }
                        var r = "__guid",
                        s = m.get(r);
                        if (!s) {
                            s = [e(o ? "": u.domain), n(), +(new Date) + Math.random() + Math.random()].join(".");
                            var c = {
                                expires: 2592e7,
                                path: "/"
                            };
                            if (t.length) for (var h = 0; h < t.length; h++) {
                                var p = t[h],
                                d = "." + p;
                                if (l.indexOf(d) > 0 && l.lastIndexOf(d) == l.length - d.length || l == p) {
                                    c.domain = d;
                                    break
                                }
                            }
                            m.set(r, s, c)
                        }
                        return function() {
                            return s
                        }
                    } (),
                    getCount: function() {
                        var e = "monitor_count",
                        t = m.get(e);
                        return t = (parseInt(t) || 0) + 1,
                        m.set(e, t, {
                            expires: 864e5,
                            path: "/"
                        }),
                        function() {
                            return t
                        }
                    } (),
                    getFlashVer: function() {
                        var t = -1;
                        if (a.plugins && a.mimeTypes.length) {
                            var n = a.plugins["Shockwave Flash"];
                            n && n.description && (t = n.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s)+r/, ".") + ".0")
                        } else if (i.ActiveXObject && !i.opera) try {
                            var r = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
                            if (r) {
                                var s = r.GetVariable("$version");
                                t = s.replace(/WIN/g, "").replace(/,/g, ".")
                            }
                        } catch(o) {}
                        return t = parseInt(t, 10),
                        t
                    },
                    getContainerId: function(t) {
                        var n, r, i = 100;
                        b.areaIds && (n = new RegExp("^(" + b.areaIds.join("|") + ")$", "ig"));
                        while (t) {
                            if (t.attributes && ("bk" in t.attributes || "data-bk" in t.attributes)) {
                                r = t.getAttribute("bk") || t.getAttribute("data-bk");
                                if (r) return r = "bk:" + r,
                                r.substr(0, i);
                                if (t.id) return r = t.getAttribute("data-desc") || t.id,
                                r.substr(0, i)
                            } else if (n && t.id && n.test(t.id)) return r = t.getAttribute("data-desc") || t.id,
                            r.substr(0, i);
                            t = t.parentNode
                        }
                        return ""
                    },
                    getText: function(t) {
                        var n = "";
                        return t.tagName.toLowerCase() == "input" ? n = t.getAttribute("text") || t.getAttribute("data-text") || t.value || t.title || "": n = t.getAttribute("text") || t.getAttribute("data-text") || t.innerText || t.textContent || t.title || "",
                        h.trim(n).substr(0, 100)
                    },
                    getHref: function(t) {
                        try {
                            return t.getAttribute("data-href") || t.href || ""
                        } catch(n) {
                            return ""
                        }
                    }
                },
                y = {
                    getBase: function() {
                        return {
                            p: g.getProject(),
                            u: g.getLocation(),
                            id: g.getGuid(),
                            guid: g.getGuid()
                        }
                    },
                    getTrack: function(t) {
                        var n = {
                            b: g.getBrowser(),
                            c: g.getCount(),
                            r: g.getReferrer(),
                            fl: g.getFlashVer(),
                            sd: g.getColorDepth(),
                            sr: g.getScreenSize(),
                            ul: g.getLanguage()
                        };
                        if (t) {
                            t = t.split(",");
                            var r = [];
                            for (var i = 0,
                            s = t.length; i < s; i++) {
                                var o = m.get(t[i]);
                                r.push(t[i] + "=" + encodeURIComponent(o))
                            }
                            n.uc = encodeURIComponent(r.join("&"))
                        }
                        return n
                    },
                    getClick: function(t) {
                        t = d.fix(t || event);
                        var n = t.target,
                        r = n.tagName,
                        i = g.getContainerId(n);
                        if (!n.type || n.type != "submit" && n.type != "button") {
                            if (r == "AREA") return {
                                f: g.getHref(n),
                                c: "area:" + n.parentNode.name,
                                cId: i
                            };
                            var l, c;
                            return r == "IMG" && (l = n),
                            n = p.parentNode(n, "A"),
                            n ? (c = g.getText(n), {
                                f: g.getHref(n),
                                c: c ? c: l ? l.src.match(/[^\/]+$/) : "",
                                cId: i
                            }) : !1
                        }
                        var s = p.parentNode(n, "FORM"),
                        o = {};
                        if (s) {
                            var u = s.id || "",
                            a = n.id;
                            o = {
                                f: s.action,
                                c: "form:" + (s.name || u),
                                cId: i
                            };
                            if ((u == "search-form" || u == "searchForm") && (a == "searchBtn" || a == "search-btn")) {
                                var f = w("kw") || w("search-kw") || w("kw1");
                                o.w = f ? f.value: ""
                            }
                        } else o = {
                            f: g.getHref(n),
                            c: g.getText(n),
                            cId: i
                        };
                        return o
                    },
                    getKeydown: function(t) {
                        t = d.fix(t || event);
                        if (t.keyCode != 13) return ! 1;
                        var n = t.target,
                        r = n.tagName,
                        i = g.getContainerId(n);
                        if (r == "INPUT") {
                            var s = p.parentNode(n, "FORM");
                            if (s) {
                                var o = s.id || "",
                                u = n.id,
                                a = {
                                    f: s.action,
                                    c: "form:" + (s.name || o),
                                    cId: i
                                };
                                if (u == "kw" || u == "search-kw" || u == "kw1") a.w = n.value;
                                return a
                            }
                        }
                        return ! 1
                    }
                },
                b = {
                    trackUrl: null,
                    clickUrl: null,
                    areaIds: null
                },
                w = function(t) {
                    return document.getElementById(t)
                };
                return {
                    version: e,
                    util: g,
                    data: y,
                    config: b,
                    sendLog: function() {
                        return i.__QIHOO_MONITOR_COMMON_imgs = {},
                        function(e) {
                            var t = "log_" + +(new Date),
                            n = i.__QIHOO_MONITOR_COMMON_imgs[t] = new Image;
                            n.onload = n.onerror = function() {
                                i.__QIHOO_MONITOR_COMMON_imgs && i.__QIHOO_MONITOR_COMMON_imgs[t] && (i.__QIHOO_MONITOR_COMMON_imgs[t] = null, delete i.__QIHOO_MONITOR_COMMON_imgs[t])
                            },
                            n.src = e
                        }
                    } (),
                    buildLog: function() {
                        var e = "";
                        return function(t, n) {
                            if (t === !1) return;
                            t = t || {};
                            var r = y.getBase();
                            t = v.mix(r, t, !0);
                            var i = n + v.encodeURIJson(t);
                            if (i == e) return;
                            e = i,
                            setTimeout(function() {
                                e = ""
                            },
                            100);
                            var s = v.encodeURIJson(t);
                            s += "&t=" + +(new Date),
                            n = n.indexOf("?") > -1 ? n + "&" + s: n + "?" + s,
                            this.sendLog(n)
                        }
                    } (),
                    log: function(t, n) {
                        n = n || "click";
                        var r = b[n + "Url"];
                        r || alert("Error : the " + n + "url does not exist!"),
                        this.buildLog(t, r)
                    },
                    setConf: function(t, n) {
                        var r = {};
                        return v.isObject(t) ? r = t: r[t] = n,
                        this.config = v.mix(this.config, r, !0),
                        this
                    },
                    setUrl: function(t) {
                        return t && (this.util.getLocation = function() {
                            return t
                        }),
                        this
                    },
                    setProject: function(t) {
                        return t && (this.util.getProject = function() {
                            return t
                        }),
                        this
                    },
                    setId: function() {
                        var t = [],
                        n = 0,
                        r;
                        while (r = arguments[n++]) v.isArray(r) ? t = t.concat(r) : t.push(r);
                        return this.setConf("areaIds", t),
                        this
                    },
                    getTrack: function(t) {
                        var n = this.data.getTrack(t);
                        return this.log(n, "track"),
                        this
                    },
                    getClickHeatmap: function(t, n) {
                        if (this.heatmapTimer) return;
                        this.heatmapTimer = !0;
                        var r = this,
                        i = [];
                        t = t || 10,
                        n = n || 5;
                        var s = 0,
                        o = function a(e) {
                            clearTimeout(s);
                            if (e || i.length > t) {
                                if (!i.length) return;
                                r.log({
                                    pos: i.join(","),
                                    sr: g.getScreenSize()
                                },
                                "clickHeatMap"),
                                i = [];
                                return
                            }
                            s = setTimeout(function() {
                                a(!0)
                            },
                            n * 60 * 1e3)
                        };
                        return p.on(u, "mousedown",
                        function(e) {
                            var t = e.pageX + "." + e.pageY;
                            i.push(t),
                            o()
                        }),
                        this
                    },
                    getClickAndKeydown: function() {
                        var t = this;
                        return p.on(u, "mousedown",
                        function(e) {
                            var n = t.data.getClick(e);
                            t.log(n, "click")
                        }),
                        p.on(u, "keydown",
                        function(e) {
                            var n = t.data.getKeydown(e);
                            t.log(n, "click")
                        }),
                        r.getClickAndKeydown = function() {
                            return t
                        },
                        this
                    }
                }
            } (window);
            r.setConf({
                trackUrl: "//s.360.cn/w360/s.htm",
                clickUrl: "//s.360.cn/w360/c.htm",
                clickHeatMapUrl: "//s.360.cn/w360/c.htm",
                wpoUrl: "//s.360.cn/w360/p.htm"
            }),
            window.QIHOO_MONITOR_COMMON = r,
            typeof window.monitor == "undefined" && (window.monitor = r)
        })()
    },
    9 : function(e, t) {
        "use strict";
        var n = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        };
        window.qdas_monitor = function(e, t, r) {
            function a(e, t, n, r) {
                for (var i in t) if (n || !(e[i] || i in e)) e[i] = t[i];
                return e
            }
            function f(e) {
                var t = {};
                for (var r in e) n(e[r]) != "object" && r != "pid" && r != "twoChannel" && r != "threeChannel" && (t[r] = e[r]);
                return t
            }
            function l() {
                var t = +(new Date),
                n = u.getTime(),
                r = e.data.getTrack(),
                i = {
                    intime: n,
                    outtime: t,
                    type: "leave"
                };
                i = a(r, i, !0),
                e.log(i, "track")
            }
            function c() {
                var n = /(\w+):\/\/([^\:|\/]+)(\:\d*)?(.*\/)?/i,
                r = t.location.href,
                i = r.match(n),
                u = i.length >= 3 ? i[2].split(".") : [""],
                f = i.length >= 5 ? i[4].split("/") : [0, ""],
                l = {
                    p: e.util.getProject(),
                    u: t.location.href,
                    guid: e.util.getGuid(),
                    id: e.util.getGuid(),
                    mid: $utils.getCookie("__mid"),
                    pid: "",
                    twoChannel: u[0],
                    threeChannel: f[1],
                    title: document.getElementsByTagName("title")[0].innerHTML,
                    from: $utils.getParam("from", location.href) || "",
                    src: $utils.getParam("src", location.href) || ""
                };
                return l = a(o._getBase(), l, !0),
                l = a(l, s, !0),
                l
            }
            var i = {
                isOpenLeave: !0,
                isOpenClick: !0,
                isOpenTrack: !0
            },
            s = {},
            o = {
                _getBase: e.data.getBase,
                _getClick: e.data.getClick,
                _getReferrer: e.util.getReferrer
            },
            u = new Date;
            return {
                init: function(h) {
                    if (!$utils.getCookie("__mid")) try {
                        var p = external && external.GetMID && external.GetSID && external.GetMID(external.GetSID(t)) || wdextcmd && wdextcmd.GetMid && wdextcmd.GetMid() || "";
                        if (p) {
                            var d = 2592e7,
                            v = new Date;
                            v.setTime(v.getTime() + d),
                            $utils.setCookie("__mid", p, {
                                expires: v,
                                path: "/",
                                domain: ".btime.com"
                            })
                        }
                    } catch(m) {}
                    if (!h || h && (typeof h === "undefined" ? "undefined": n(h)) != "object") {
                        alert("请至少提供配置信息");
                        return
                    }
                    if (!h.pid && !h.basePar) {
                        alert("请提供pid");
                        return
                    }
                    h.basePar || (h.basePar = {
                        pid: h.pid
                    },
                    h.twoChannel && (h.basePar.twoChannel = h.twoChannel), h.threeChannel && (h.basePar.threeChannel = h.threeChannel)),
                    s = h.basePar,
                    i = a(i, f(h), !0),
                    e.setProject("btime"),
                    e.data.getBase = c;
                    if (i.isOpenTrack) {
                        if (h.trackPar) {
                            var g = e.data.getTrack;
                            e.data.getTrack = function() {
                                return a(g(), h.trackPar, !0)
                            }
                        }
                        e.getTrack()
                    }
                    i.isOpenClick && (e.data.getClick = function(e) {
                        var t = o._getClick(e) || {},
                        n = o._getReferrer();
                        t.r = n;
                        var i = r.event.fix(e);
                        return r(i.target).parents(".N-top").html() && (t.newtop = "no"),
                        r(i.target).parents(".N-nav").html() && (t.newtop = "no"),
                        r(i.target).parents(".N-ft").html() && (t.newtop = "no"),
                        r(i.target).parents(".article-nav").html() && (t.newtop = "no"),
                        r(i.target).attr("alt") && (t.c = r(i.target).attr("alt")),
                        h.clickPar && (t = a(t, h.clickPar, !0)),
                        t
                    },
                    e.getClickAndKeydown().getClickHeatmap(10, 1).setActiveTime(60)),
                    i.isOpenLeave && r(t).on("beforeunload", l)
                },
                customizeLog: function(i) {
                    if (i && (typeof i === "undefined" ? "undefined": n(i)) == "object" && i.event_name) {
                        var s = {};
                        if (i.event_name != "click" && i.event_name != "track") {
                            if (!i.url) {
                                alert("自定义事件url不能为空");
                                return
                            } (!e.conf[i.event_name] || e.conf[i.event_name] && e.conf[i.event_name] != i.url) && e.setConf(i.event_name, i.url)
                        }
                        i.extendOtherData ? (i.extendOtherData == "track" && (s = a(e.data.getTrack(), i.para, !0)), i.extendOtherData == "click" && (s = a(e.data.getClick(i.el || t.event), i.para, !0))) : s = i.para,
                        e.log(s, i.event_name)
                    }
                }
            }
        } (monitor, window, jQuery),
        window.common_monitor = function(e, t, r) {
            function a(e, t, n, r) {
                for (var i in t) if (n || !(e[i] || i in e)) e[i] = t[i];
                return e
            }
            function f(e) {
                var t = {};
                for (var r in e) n(e[r]) != "object" && r != "pid" && r != "twoChannel" && r != "threeChannel" && (t[r] = e[r]);
                return t
            }
            function l() {
                var t = +(new Date),
                n = u.getTime(),
                r = e.data.getTrack(),
                i = {
                    intime: n,
                    outtime: t,
                    type: "leave"
                };
                i = a(r, i, !0),
                e.log(i, "track")
            }
            function c() {
                var n = /(\w+):\/\/([^\:|\/]+)(\:\d*)?(.*\/)?/i,
                r = t.location.href,
                i = r.match(n),
                u = i.length >= 3 ? i[2].split(".") : [""],
                f = i.length >= 5 ? i[4].split("/") : [0, ""],
                l = {
                    p: e.util.getProject(),
                    u: t.location.href,
                    guid: e.util.getGuid(),
                    id: e.util.getGuid(),
                    mid: $utils.getCookie("__mid"),
                    pid: "",
                    twoChannel: u[0],
                    threeChannel: f[1],
                    title: document.getElementsByTagName("title")[0].innerHTML,
                    from: $utils.getParam("from", location.href) || "",
                    src: $utils.getParam("src", location.href) || ""
                };
                return l = a(o._getBase(), l, !0),
                l = a(l, s, !0),
                l
            }
            var i = {
                isOpenLeave: !0,
                isOpenClick: !0,
                isOpenTrack: !0
            },
            s = {},
            o = {
                _getBase: e.data.getBase,
                _getClick: e.data.getClick,
                _getReferrer: e.util.getReferrer
            },
            u = new Date;
            return {
                init: function(h) {
                    if (!$utils.getCookie("__mid")) try {
                        var p = external && external.GetMID && external.GetSID && external.GetMID(external.GetSID(t)) || wdextcmd && wdextcmd.GetMid && wdextcmd.GetMid() || "";
                        if (p) {
                            var d = 2592e7,
                            v = new Date;
                            v.setTime(v.getTime() + d),
                            $utils.setCookie("__mid", p, {
                                expires: v,
                                path: "/",
                                domain: ".btime.com"
                            })
                        }
                    } catch(m) {}
                    if (!h || h && (typeof h === "undefined" ? "undefined": n(h)) != "object") {
                        alert("请至少提供配置信息");
                        return
                    }
                    if (!h.pid && !h.basePar) {
                        alert("请提供pid");
                        return
                    }
                    h.basePar || (h.basePar = {
                        pid: h.pid
                    },
                    h.twoChannel && (h.basePar.twoChannel = h.twoChannel), h.threeChannel && (h.basePar.threeChannel = h.threeChannel)),
                    s = h.basePar,
                    i = a(i, f(h), !0),
                    e.setConf({
                        trackUrl: "//s.btime.com/t.html",
                        clickUrl: "//s.btime.com/c.html"
                    }),
                    e.setProject("btime"),
                    e.data.getBase = c;
                    if (i.isOpenTrack) {
                        if (h.trackPar) {
                            var g = e.data.getTrack;
                            e.data.getTrack = function() {
                                return a(g(), h.trackPar, !0)
                            }
                        }
                        e.getTrack()
                    }
                    i.isOpenClick && (e.data.getClick = function(e) {
                        var t = o._getClick(e) || {},
                        n = o._getReferrer();
                        t.r = n;
                        var i = r.event.fix(e);
                        return r(i.target).parents(".N-top").html() && (t.newtop = "no"),
                        r(i.target).parents(".N-nav").html() && (t.newtop = "no"),
                        r(i.target).parents(".N-ft").html() && (t.newtop = "no"),
                        r(i.target).parents(".article-nav").html() && (t.newtop = "no"),
                        r(i.target).attr("alt") && (t.c = r(i.target).attr("alt")),
                        h.clickPar && (t = a(t, h.clickPar, !0)),
                        t
                    },
                    e.getClickAndKeydown()),
                    i.isOpenLeave && r(t).on("beforeunload", l)
                },
                customizeLog: function(i) {
                    if (i && (typeof i === "undefined" ? "undefined": n(i)) == "object" && i.event_name) {
                        var s = {};
                        if (i.event_name != "click" && i.event_name != "track") {
                            if (!i.url) {
                                alert("自定义事件url不能为空");
                                return
                            } (!e.conf[i.event_name] || e.conf[i.event_name] && e.conf[i.event_name] != i.url) && e.setConf(i.event_name, i.url)
                        }
                        i.extendOtherData ? (i.extendOtherData == "track" && (s = a(e.data.getTrack(), i.para, !0)), i.extendOtherData == "click" && (s = a(e.data.getClick(i.el || t.event), i.para, !0))) : s = i.para,
                        e.log(s, i.event_name)
                    }
                }
            }
        } (QIHOO_MONITOR_COMMON, window, jQuery)
    },
    10 : function(e, t) {
        "use strict";
        window.monitorObj = function(e, t, n, r) {
            function f(e) {
                if (!e.length) return {};
                var t = {
                    "微信扫码分享": "6",
                    "分享到新浪微博": "0",
                    "分享到ＱＱ空间": "2",
                    "分享到豆瓣网": "3",
                    "分享到人人网": "4"
                },
                n = e.attr("title") || e[0].innerText;
                return {
                    share_type: t[n] || "",
                    action: "share"
                }
            }
            function l(e, t) {
                var r = {};
                if (e == "qh-latest-list-wrap") {
                    var i = o.getParentNode(t[0], "DIV");
                    if (!n(i).attr("data-cmt-id")) return;
                    return r = {
                        target_comment_id: n(i).attr("data-cmt-id"),
                        action: "comment"
                    },
                    r
                }
                if (e == "QIHOO360COMMENTMX") {
                    var s = o.getParentNode(t[0], "SPAN");
                    if (!s) return;
                    var u = t.parents(".qh-cmt").find(".qh-cmt-reply");
                    if (!u.length) return;
                    var a = u.attr("data-reply-pid");
                    return r = {
                        target_comment_id: a,
                        action: "comment"
                    },
                    r
                }
                if (e == "comment-qh") {
                    var f = o.getParentNode(t[0], "A");
                    if (!f) return;
                    if (n("#" + e).find("textarea").val() !== "") return r = {
                        action: "comment"
                    },
                    r
                }
            }
            function c() {
                var e = [];
                return n("[bk]").each(function(t, r) {
                    var i = n(r),
                    s = i.attr("bk"),
                    a = i.data("read"),
                    f = !1,
                    l = {};
                    a == 2 && (f = !0),
                    !f && o.inviewport(r, {
                        threshold: 0
                    }) && i.is(":visible") && s.length && (l.action = "area_view", l.bk = s, l.pid = E.pid, l.ts = (new Date).getTime(), l = n.extend(u.getBase(), l), e.push(JSON.stringify(l)), i.data("read", 2))
                }),
                e
            }
            function h() {
                var e = [];
                return n("[data-gid]").each(function(t, i) {
                    var s = n(i),
                    u = s.attr("data-gid"),
                    a = s.attr("data-channel-position") ? "-" + s.attr("data-channel-position") : "",
                    f = u + a,
                    l = "",
                    c = "",
                    h = "";
                    try {
                        if (!weblogMap || !weblogMap[f]) return
                    } catch(p) {
                        return
                    }
                    l = weblogMap[f].adtrack,
                    c = s.attr("data-read");
                    var d; ! c && o.inviewport(i, {
                        threshold: 0
                    }) && s.is(":visible") && (l ? e.push(v(i)) : (h = weblogMap[f].slog.length ? weblogMap[f].slog: "{}", d = JSON.parse(h), d.bk = s.parents("[bk]").attr("bk"), d.action = "view", d.referer = r.location.href, d.ts = (new Date).getTime(), e.push(JSON.stringify(d))), s.attr("data-read", 1))
                }),
                e
            }
            function p() {
                var e = n(".content-text"),
                t = n(r).scrollTop(),
                i = e.offset().top,
                s = e.height(),
                o = 0,
                u = n(r).height(),
                a = i + s;
                return a < t + u ? o = 1 : i <= t ? o = (t - i + u) / s: i > t && i < t + u ? o = (t + u - i) / s: o = 0,
                o
            }
            function d() {
                var e = h();
                e.length && a.buildLog(e);
                var t = [];
                n("[data-rendered]").each(function(e, r) {
                    var i = n(r);
                    is_read = i.attr("data-read"),
                    is_read || i.is(":visible") && o.inviewport(r, {
                        threshold: 0
                    }) && (t.push(m("百度贴片", i.attr("id"))), i.attr("data-read", 1))
                }),
                t.length && a.buildLog(t);
                var r = c();
                r.length && a.buildLog(r)
            }
            function v(e) {
                var t = n(e),
                i = t.attr("bk") || t.parents("[bk]").length && t.parents("[bk]").attr("bk") || "",
                s = t.attr("ad_track"),
                o = "{}",
                u = t.attr("data-gid");
                if (s == 2) {
                    var a = [];
                    t.find(".js-track-sub").each(function() {
                        var e = decodeURIComponent(decodeURIComponent(n(this).attr("href"))).split("url=");
                        a.push(e[e.length - 1])
                    }),
                    o = m(i, a.join(","))
                } else {
                    var f = e.tagName == "A" ? t.attr("href") : t.find("a").length && t.find("a").attr("href") || "";
                    if (s != "weblogignore") {
                        o = m(i, f);
                        var l = r.weblogMap[u] ? r.weblogMap[u].slog: !1;
                        if (l && l.length) {
                            var c = n.extend(JSON.parse(o), JSON.parse(l));
                            o = JSON.stringify(c)
                        }
                    }
                }
                var h = t.data("show_req");
                if (h && h.length) for (var p = 0,
                d = h.length; p < d; p++) if (h[p]) {
                    var v = new Image;
                    v.src = h[p]
                }
                return o
            }
            function m(e, t) {
                var i;
                E.isChannel ? i = "": i = JSON.parse(monitorObj.basePar).uid;
                var s = {
                    action: "ad_view",
                    ts: +(new Date),
                    pid: E.pid,
                    bk: e,
                    link_type: 9,
                    type: E.isChannel ? E.pid: E.twoChannel,
                    id: i,
                    referer: r.location.href
                };
                s = n.extend(u.getBase(), s),
                s.link_list = t && [t] || [];
                var o = JSON.stringify(s);
                return o
            }
            function g(e, t, r) {
                var i;
                E.isChannel ? i = "": i = JSON.parse(monitorObj.basePar).uid;
                var s = {
                    pid: E.pid,
                    bk: e,
                    link_type: 9,
                    type: E.isChannel ? E.pid: E.twoChannel,
                    action: "ad_click",
                    ts: +(new Date),
                    id: i
                };
                s = n.extend({},
                u.getBase(), s),
                r && n.extend(s, r),
                s.link_list = [t],
                a.buildLog([JSON.stringify(s)])
            }
            function y() {
                n(document).on("mousedown",
                function(e) {
                    e = s.fix(e);
                    var t = o.getContainId(e.target),
                    i = n(e.target),
                    c = {},
                    h = i.data("gid") ? i: i.parents("[data-gid]"),
                    p = h.data("gid"),
                    d = h.data("channel-position"),
                    v = typeof d != "undefined" && d.length != 0 ? "-" + d: "",
                    m = p + v,
                    y = p ? r.weblogMap[m].slog: null,
                    b = p ? r.weblogMap[m].adtrack: 0,
                    w = {},
                    S = "";
                    if (b) {
                        var x = n(o.getParentNode(i[0], "A"));
                        if (x.length) {
                            var T = x.attr("href");
                            g(t, T, JSON.parse(y));
                            var N;
                            x.data("click_req") ? N = x: x.parents("[data-gid]").data("click_req") && (N = x.parents("[data-gid]"));
                            if (N) {
                                var C = N.data("click_req");
                                if (C && C.length) for (var k = 0,
                                L = C.length; k < L; k++) if (C[k]) {
                                    var A = new Image;
                                    A.src = C[k]
                                }
                            }
                        }
                    } else {
                        var O = monitorObj.basePar;
                        switch (t) {
                        case "item-content-link":
                            a.buildLog([JSON.stringify({
                                action:
                                "third_redirect_click",
                                third_url: o.getHref(e.target)
                            })]);
                            break;
                        case "share":
                            w = f(i);
                            if (w) try {
                                w = n.extend(!0, JSON.parse(O), w),
                                a.buildLog([JSON.stringify(w)])
                            } catch(M) {}
                            break;
                        case "qh-latest-list-wrap":
                        case "QIHOO360COMMENTMX":
                        case "comment-qh":
                            w = l(t, i);
                            if (w) try {
                                w = n.extend(!0, JSON.parse(O), w),
                                a.buildLog([JSON.stringify(w)])
                            } catch(M) {}
                            break;
                        case "suggest-common":
                        case "search-form":
                            var _ = "";
                            if (t == "search-form") _ = n("#" + t).find("#haosou-input").val();
                            else {
                                var x = n(o.getParentNode(i[0], "A"));
                                _ = x.attr("data-text")
                            }
                            if (_) try {
                                w = {
                                    keyword: _,
                                    action: "search"
                                };
                                var D = u.getBase();
                                w = n.extend(!0, w, D),
                                a.buildLog([JSON.stringify(w)])
                            } catch(M) {}
                            break;
                        default:
                            if (!y) return;
                            try {
                                w = JSON.parse(y)
                            } catch(M) {
                                return
                            }
                            w.action = "click";
                            if (i.hasClass("close") || i.parent().hasClass("close")) w.action = "dislike_infolog";
                            w.bk = n(e.target).parents("[bk]").attr("bk") || t,
                            w.pid = E.pid,
                            w.ts = +(new Date),
                            S = JSON.stringify(w),
                            a.buildLog([S])
                        }
                    }
                })
            }
            function b(e) {
                var t = function() {
                    return {
                        contain: {},
                        post: function(r) {
                            var i = +(new Date),
                            s = e;
                            try {
                                s = JSON.parse(s),
                                s.action = "video_seq",
                                s.stream_vbt = "高清",
                                s.ts = i,
                                s = n.extend(!0, s, r)
                            } catch(o) {
                                return
                            }
                            var u = JSON.stringify(s);
                            a.buildLog([u])
                        },
                        post_other: function(r) {
                            var s = JSON.parse(e),
                            u = {
                                uid: E.guid,
                                channel: "",
                                url: o.getLocation(),
                                sign: "btime_pc",
                                version: "3.0",
                                market: "",
                                device: 2,
                                net: 5,
                                t: +(new Date),
                                act: "click",
                                scene: 0,
                                sub_scene: 0,
                                refer_scene: 0,
                                refer_subscene: 0,
                                func: ""
                            };
                            u = n.extend(u, r || {}),
                            console.log(o.jsonToStr(u)),
                            a.sendLog(i.shortVideoApi + "?" + o.jsonToStr(u))
                        },
                        vStart: function() {
                            var t = this;
                            t.post({
                                type: "start",
                                pt: 0
                            }),
                            E.isShortVideo && t.post_other({
                                func: "playvideo"
                            })
                        },
                        vPlaying: function(t) {
                            var n = this;
                            n.post({
                                type: "playing",
                                pt: t
                            })
                        },
                        vPause: function(t) {
                            var n = this;
                            n.post({
                                type: "pause",
                                pt: t
                            })
                        },
                        vPlay: function(t) {
                            var n = this;
                            n.post({
                                type: "play",
                                pt: t
                            })
                        },
                        vStop: function(t) {
                            var n = this;
                            n.post({
                                type: "stop",
                                pt: t
                            }),
                            E.isShortVideo && n.post_other({
                                func: "finishvideo"
                            })
                        }
                    }
                } (),
                s = {};
                r.onPlayerEvent = function(e, n) {
                    var r = JSON.parse(n),
                    i = Math.floor(r.videoCurrentTime);
                    if (r.type == "replay") switch (e) {
                    case "videoupdate":
                        i === 0 && !s[0] && (s[0] = 1, t.vStart()),
                        r.videoTotalTime && i !== 0 && i % 5 == 0 && !s[i] && (s[i] = 1, t.vPlaying(i));
                        break;
                    case "videostop":
                        t.vStop(i);
                        break;
                    case "videopause":
                        t.vPause(i);
                        break;
                    case "videoplay":
                        t.vPlay(i)
                    }
                }
            }
            function w(e) {
                var t = +(new Date),
                i = r.G_start_time.getTime();
                leaveTime = Math.floor((t - i) / 1e3);
                var s = {
                    action: "duration",
                    ts: t,
                    duration: leaveTime,
                    referer: r.location.href
                };
                s = n.extend(!0, u.getBase(), s, e),
                a.buildLog([JSON.stringify(s)])
            }
            var i = {
                weblogApi: "https://click.btime.com/api/weblog",
                shortVideoApi: "http://res.qhupdate.com/360reader/click.gif"
            },
            s = {
                fix: function(t) {
                    if (! ("target" in t)) {
                        var n = t.srcElement || t.target;
                        n && n.nodeType == 3 && (n = n.parentNode),
                        t.target = n
                    }
                    return t
                }
            },
            o = {
                jsonToStr: function(n) {
                    return e.jsonToStr(n)
                },
                cookie: {
                    set: e.cookie.set,
                    get: e.cookie.get
                },
                inviewport: function(n, r) {
                    return e.inviewport(n, r)
                },
                getGuid: function() {
                    return t.util.getGuid()
                },
                getLocation: function() {
                    try {
                        return t.util.getLocation()
                    } catch(n) {
                        return ""
                    }
                },
                getScreenSize: function() {
                    try {
                        return t.util.getScreenSize()
                    } catch(n) {
                        return ""
                    }
                },
                getReferrer: function() {
                    try {
                        return t.util.getReferrer()
                    } catch(n) {
                        return ""
                    }
                },
                isUrl: function(t) {
                    var n = /((http|ftp|https|file):\/\/([\w\-]+\.)+[\w\-]+(\/[\w\u4e00-\u9fa5\-\.\/?\@\%\!\&=\+\~\:\#\;\,]*)?)/ig;
                    return t.match(n) ? !0 : !1
                },
                getContainId: function(t) {
                    var n = null;
                    while (t) {
                        if (t.attributes && ("bk" in t.attributes || "data-bk" in t.attributes)) {
                            n = t.getAttribute("bk") || t.getAttribute("data-bk");
                            if (n) return n.substr(0, 100)
                        }
                        if (t.id) return n = t.getAttribute("data-desc") || t.id,
                        n.substr(0, 100);
                        t = t.parentNode
                    }
                    return null
                },
                getHref: function(t) {
                    try {
                        return t.getAttribute("data-href") || t.href || ""
                    } catch(n) {
                        return ""
                    }
                },
                getParentNode: function(t, n, r) {
                    r = r || 5;
                    while (r > 0) {
                        var i = n.toUpperCase();
                        try {
                            if (i === t.tagName) return t
                        } catch(s) {
                            return null
                        }
                        t = t.parentNode,
                        r--
                    }
                    return null
                }
            },
            u = {
                getBase: function() {
                    var t = {
                        guid: o.getGuid(),
                        mid: o.cookie.get("__mid") || "",
                        client_id: 6,
                        from: E.from,
                        ts: +(new Date),
                        scene_id: E.scene_id,
                        version: E.version
                    };
                    return t.dev_id = t.mid || t.guid,
                    t
                },
                getTrack: function() {
                    return {
                        url: o.getLocation(),
                        referer: o.getReferrer(),
                        screen: o.getScreenSize()
                    }
                }
            },
            a = {
                log: function(t, n) {},
                logTrack: function(t) {
                    a.buildLog(n.extend(!0, {},
                    u.getTrack(), t || {}))
                },
                buildLog: function(t, r) {
                    if (t === !1) return;
                    var r = r || i.weblogApi;
                    if (n.isArray(t)) for (var s = 0,
                    o = t.length; s < o; s++) a.buildLog(t[s]);
                    else {
                        var f = typeof t == "string" ? JSON.parse(t) : t;
                        f = n.extend(u.getBase(), f),
                        a.sendLog(r + "?content[]=" + encodeURIComponent(JSON.stringify(f)))
                    }
                },
                sendLog: function() {
                    return r.__btime_monitor_imgs__ = {},
                    function(e) {
                        var t = "log" + (new Date).getTime(),
                        n = r.__btime_monitor_imgs__[t] = new Image;
                        n.onload = n.onerror = function() {
                            r.__btime_monitor_imgs__ && r.__btime_monitor_imgs__[t] && (r.__btime_monitor_imgs__[t] = null, delete r.__btime_monitor_imgs__[t])
                        },
                        n.src = e
                    }
                } ()
            },
            E = {
                isChannel: !0,
                pid: "",
                from: ""
            };
            return {
                readPercentage: 0,
                basePar: "",
                init: function(t) {
                    setTimeout("monitorObj.track()", 1e3),
                    n(r).scroll(n.throttle(1e3, monitorObj.track));
                    var i = this;
                    E = n.extend(!0, E, t || {});
                    if (E.isChannel) r.App && r.App.router && r.App.router.channel && n(r).on("beforeunload",
                    function() {
                        i.LeaveTimeTrack()
                    }),
                    n(document.body).on("clickPar",
                    function(e, t) {
                        var n = t && t.s_log && JSON.stringify(t.s_log) || "";
                        n && b(n)
                    }),
                    n(document.body).on("tabSecondChannelTrack",
                    function() {
                        i.LeaveTimeTrack()
                    });
                    else {
                        var s = JSON.parse(t.baseLog);
                        s.guid || (s.guid = t.guid),
                        i.basePar = JSON.stringify(s),
                        b(i.basePar),
                        n(document.body).on("bubble_click",
                        function() {
                            var e = n(".heart-btn").attr("data-emoji-type") || 1,
                            t = JSON.parse(i.basePar);
                            t.action = "bubble_click",
                            t.bubble_type = e,
                            t.ts = +(new Date),
                            a.buildLog([JSON.stringify(t)])
                        })
                    }
                    y(),
                    n(".content-text").length && (r.ReadPercentageInter = setInterval("monitorObj.CalNewsReadPercentage()", 2e3))
                },
                track: d,
                CalNewsReadPercentage: function() {
                    var t = (new Number(p())).toFixed(2),
                    i = this;
                    if (t > i.readPercentage) {
                        i.readPercentage = t;
                        var s = +(new Date),
                        o = i.basePar;
                        try {
                            o = JSON.parse(o)
                        } catch(u) {
                            return
                        }
                        o = n.extend(!0, o, {
                            action: "detail",
                            percent: t,
                            ts: s
                        }),
                        a.buildLog([JSON.stringify(o)])
                    } (t == 1 || (s - r.G_start_time.getTime()) / 1e3 > 300) && r.clearInterval(ReadPercentageInter)
                },
                LeaveTimeTrack: function() {
                    var t = r.App.router.channel_cid;
                    w({
                        channel_id: t
                    })
                },
                log: a.log,
                buildLog: a.buildLog,
                sendLog: a.sendLog,
                logTrack: a.logTrack,
                tracks: function(t) {
                    var t = n.extend(JSON.parse(m()), t);
                    a.buildLog(t)
                }
            }
        } (window.$utils || {},
        window.QIHOO_MONITOR, jQuery, window),
        function(e, t, n) {
            if (!window.App) return;
            if (App && App.data) for (var r in App.data) if (App.data[r] && App.data[r].length) {
                var i, s;
                if (r == "ads") {
                    var o = App.data.ads;
                    for (i = 0, s = o.length; i < s; i++) e.setWeblogMonitorMap(o[i].ads)
                } else if (r == "aside_list") {
                    var u = App.data.aside_list;
                    for (i = 0, s = u.length; i < s; i++) u[i].data.list && e.setWeblogMonitorMap(u[i].data.list)
                } else e.setWeblogMonitorMap(App.data[r])
            }
        } (window.$utils || {},
        jQuery, window)
    },
    11 : function(e, t) {
        "use strict"; (function() {
            template.helper("cutCityProvince",
            function(e, t) {
                if (!e) return "";
                var n, r;
                r = e.length,
                n = e.slice(r - 1, r);
                if (n == "市" || n == "省") e = e.slice(0, r - 1);
                return e
            }),
            template.helper("catUrl",
            function(e) {
                if ( + e == 43e4) return "//hunan.btime.com";
                var t = App.config.webRoot ? "//www.brtn.cn": "//www.btime.com";
                return e ? t + "/local/" + e: ""
            }),
            template.helper("cutter",
            function(e, t) {
                var n, r, i, s, o;
                return e ? e.indexOf("qhimg.com") < 0 && e.indexOf("qhmsg.com") < 0 ? e: (t && (s = t.split("-")[0] + "_" + t.split("-")[1] + "_", o = e.match(/^(http:\/\/.+?)(\/.+)*(\/.+)$/), o && o.length > 0 && (n = [o[1], "/", "dmfd", "/", s, o[3]].join(""))), n ? n: e) : "//p0.ssl.qhimg.com/t01742f4d8eae91b502.png"
            }),
            template.helper("strCount",
            function(e, t) {
                var e = $.trim(e),
                n = 0,
                r = /[\u4e00-\u9fa5]/,
                i = parseInt("FF61", 16),
                s = parseInt("FF9F", 16),
                o = parseInt("FFE8", 16),
                u = parseInt("FFEE", 16);
                for (var a = 0,
                f = e.length; a < f; a++) if (r.test(e[a])) n += 1;
                else {
                    var l = parseInt(e.charCodeAt(a));
                    l < 256 ? n += .5 : i <= l && l <= s ? n += .5 : o <= l && l <= u ? n += .5 : n += 1
                }
                return n
            }),
            template.helper("ellipsis",
            function(e, t) {
                return e.length > t && (e = e.slice(0, t - 3) + "..."),
                e
            }),
            template.helper("getChannelPosition",
            function(e) {
                if (e) return JSON.parse(e).channel_position ? JSON.parse(e).channel_position[1] : ""
            })
        })()
    },
    17 : function(e, t) {},
    18 : function(e, t) {},
    21 : function(e, t, n) {
        var r, i;
        "use strict";
        var s = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        }; (function(o, u) {
            s(t) === "object" ? e.exports = u() : (r = u, i = typeof r == "function" ? r.call(t, n, t, e) : r, i === undefined || !(e.exports = i))
        })(window,
        function() {
            var e = n(22),
            t = {
                poll: function(n, r, i, s, o) {
                    r = r || 100,
                    i == null && (i = Infinity);
                    if (i <= 0) {
                        s && s();
                        return
                    }
                    n() !== !1 ? setTimeout(function() {
                        t.poll(n, r, i - 1, s, o)
                    },
                    r) : o && o()
                },
                await: function(n, r, i, s, o) {
                    t.poll(function() {
                        return n() ? (r(), !1) : !0
                    },
                    s, o, i)
                },
                jsonp: function() {
                    var n = {},
                    r = 0,
                    i = 6e5,
                    o = {},
                    u = function a(u, f, l, c) { (typeof f == "undefined" ? "undefined": s(f)) !== "object" && (c = l, l = f, f = null),
                        c = t.mix(c || {},
                        {
                            jsonp: "_callback",
                            timeout: 3e4,
                            threshold: i
                        }),
                        f && (u += (/\?/.test(u) ? "&": "?") + t.encodeURIJson(f));
                        var h;
                        h = n[u] = n[u] || c.cb || "__jsonp" + r+++"__",
                        o[h] = {
                            url: u,
                            startTime: +(new Date)
                        },
                        u += (/\?/.test(u) ? "&": "?") + c.jsonp + "=" + encodeURIComponent(h) + "&t=" + Math.floor((new Date).getTime() / c.threshold),
                        window[h] || (window[h] = function() {
                            var e = [],
                            t = function(n, r) {
                                o[h].endTime = +(new Date),
                                a.fire("resourceLoaded", {
                                    data: o[h]
                                });
                                var i = e.shift();
                                i && i(n, r)
                            };
                            return t.add = function(t) {
                                e.push(t)
                            },
                            t
                        } ());
                        var p = setTimeout(function() {
                            window[h](null, {
                                status: "error",
                                reason: "timeout"
                            })
                        },
                        c.timeout);
                        window[h].add(function(e, t) {
                            clearTimeout(p),
                            l && (t = t || {
                                status: "ok"
                            },
                            l(e, t))
                        }),
                        e({
                            path: u,
                            type: "js",
                            force: !0
                        }),
                        t.createEvents(a)
                    };
                    return u.getMonitorData = function() {
                        return o
                    },
                    u
                } (),
                encodeURIJson: function(t) {
                    var n = [];
                    for (var r in t) {
                        if (t[r] == null) continue;
                        if (t[r] instanceof Array) for (var i = 0; i < t[r].length; i++) n.push(encodeURIComponent(r) + "[]=" + encodeURIComponent(t[r][i]));
                        else n.push(encodeURIComponent(r) + "=" + encodeURIComponent(t[r]))
                    }
                    return n.join("&")
                },
                mix: function(t, n, r) {
                    r = r ||
                    function(e, n, r) {
                        return t[r] || r in t ? e: n
                    },
                    r === !0 && (r = function(t, n) {
                        return n
                    });
                    for (var i in n) t[i] = r(t[i], n[i], i, t, n),
                    t[i] === undefined && delete t[i];
                    return t
                },
                createEvents: function(n) {
                    var r = {},
                    i = t.mix,
                    s = $.extend;
                    return s(!0, n, {
                        on: function(t, n) {
                            r[t] = r[t] || [];
                            if (r[t].indexOf(n) > -1) return;
                            return r[t].push(n),
                            !0
                        },
                        off: function(t, n) {
                            r[t] = r[t] || [];
                            if (n) {
                                var i = r[t].indexOf(n);
                                if (i < 0) return ! 1;
                                r[t].splice(i, 1)
                            } else r[t] = [];
                            return ! 0
                        },
                        fire: function(t, i) {
                            i = i || {},
                            s(!0, i, {
                                type: t,
                                target: n,
                                preventDefault: function() {
                                    i.returnValue = !1
                                }
                            });
                            var o = r[t] || [];
                            for (var u = 0; u < o.length; u++) o[u](i);
                            return i.returnValue !== !1
                        }
                    }),
                    i(n, {
                        on: function(t, n) {
                            r[t] = r[t] || [],
                            r[t].push(n)
                        },
                        fire: function(t, s) {
                            s = s || {},
                            i(s, {
                                type: t,
                                target: n,
                                preventDefault: function() {
                                    s.returnValue = !1
                                }
                            });
                            var o = r[t] || [];
                            for (var u = 0; u < o.length; u++) o[u](s);
                            return s.returnValue !== !1
                        }
                    }),
                    n.trigger = n.fire,
                    n
                }
            };
            return t.cookie = {
                getRaw: function(t) {
                    var n = new RegExp("(^| )" + t + "=([^;]*)(;|$)"),
                    r = n.exec(document.cookie);
                    return r ? r[2] || null: null
                },
                get: function(n) {
                    var r = t.cookie.getRaw(n);
                    return "string" == typeof r ? (r = decodeURIComponent(r), r) : null
                },
                setRaw: function(t, n, r) {
                    r = r || {};
                    var i = r.expires;
                    "number" == typeof r.expires && (i = new Date, i.setTime(i.getTime() + r.expires)),
                    document.cookie = t + "=" + n + (r.path ? "; path=" + r.path: "") + (i ? "; expires=" + i.toGMTString() : "") + (r.domain ? "; domain=" + r.domain: "") + (r.secure ? "; secure": "")
                },
                set: function(n, r, i) {
                    t.cookie.setRaw(n, encodeURIComponent(r), i)
                },
                remove: function(n, r) {
                    r = r || {},
                    r.expires = new Date(0),
                    t.cookie.setRaw(n, "", r)
                }
            },
            t
        })
    },
    22 : function(e, t, n) {
        var r, i;
        "use strict";
        var s = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        }; (function(o, u) {
            s(t) === "object" ? e.exports = u() : (r = u, i = typeof r == "function" ? r.call(t, n, t, e) : r, i === undefined || !(e.exports = i))
        })(window,
        function() {
            var e = document,
            t = window,
            n = {},
            r = {},
            i = function(t) {
                return t.constructor === Array
            },
            s = {
                mods: {}
            },
            o = e.getElementsByTagName("script"),
            u = o[o.length - 1],
            a,
            f = function(t) {
                if (t.clearAttributes) t.clearAttributes();
                else for (var n in t) t.hasOwnProperty(n) && n.toLowerCase() !== "parentnode" && delete t[n];
                t && t.parentNode && t.parentNode.removeChild(t),
                t = null
            },
            l = e.createElement("script").readyState ?
            function(e, t) {
                e.onreadystatechange = function() {
                    var n = e.readyState;
                    if (n === "loaded" || n === "complete") e.onreadystatechange = null,
                    t.apply(this)
                }
            }: function(e, t) {
                e.addEventListener("load", t, !1)
            },
            c = function d(t, i, s, o, a, c) {
                var h = u;
                if (!t) return;
                if (n[t]) {
                    r[t] = !1;
                    if (!o) {
                        a && a(t, c);
                        return
                    }
                }
                if (r[t]) {
                    setTimeout(function() {
                        d(t, i, s, o, a, c)
                    },
                    1);
                    return
                }
                r[t] = !0;
                var p;
                if (i === "js" || t.indexOf(".js") >= 0) p = e.createElement("script"),
                p.setAttribute("type", "text/javascript"),
                s && (p.charset = s),
                p.setAttribute("src", t),
                p.setAttribute("async", !0),
                l(p,
                function() {
                    n[t] = !0,
                    a && a(t, c),
                    f(p)
                }),
                h.parentNode.insertBefore(p, h);
                else if (i === "css" || t.indexOf(".css") >= 0) {
                    p = e.createElement("link"),
                    p.setAttribute("type", "text/css"),
                    s && (p.charset = s),
                    p.setAttribute("rel", "stylesheet"),
                    p.setAttribute("href", t),
                    n[t] = !0,
                    h.parentNode.insertBefore(p, h),
                    a && a(t, c);
                    return
                }
            },
            h = function(t) {
                if (!t || !i(t)) return;
                var n = 0,
                r, o = [],
                u = s.mods,
                a = [],
                f = {},
                l = function c(e) {
                    var t = 0,
                    n, r;
                    if (f[e]) return a;
                    f[e] = !0;
                    if (u[e].requires) {
                        r = u[e].requires;
                        for (; typeof(n = r[t++]) != "undefined";) u[n] ? (c(n), a.push(n)) : a.push(n);
                        return a
                    }
                    return a
                };
                for (; typeof(r = t[n++]) != "undefined";) u[r] && u[r].requires && u[r].requires[0] && (a = [], f = {},
                o = o.concat(l(r))),
                o.push(r);
                return o
            },
            p = function(t) {
                if (!t || !i(t)) return;
                this.queue = t,
                this.current = null
            };
            return p.prototype = {
                _interval: 10,
                start: function() {
                    var t = this;
                    this.current = this.next();
                    if (!this.current) {
                        this.end = !0;
                        return
                    }
                    this.run()
                },
                run: function() {
                    var t = this,
                    n, r = this.current;
                    if (typeof r == "function") {
                        r(),
                        this.start();
                        return
                    }
                    typeof r == "string" && (s.mods[r] ? (n = s.mods[r], c(n.path, n.type, n.charset, n.force,
                    function(e) {
                        t.start()
                    },
                    t)) : /\.js|\.css/i.test(r) ? c(r, "", "", "",
                    function(e, t) {
                        t.start()
                    },
                    t) : this.start())
                },
                next: function() {
                    return this.queue.shift()
                }
            },
            a = function() {
                var t = [].slice.call(arguments),
                n,
                r = t[0];
                if (typeof r != "string" && typeof r != "function") {
                    var i = r.name || r.path,
                    s = r.callback || t[1];
                    a.add(i, r),
                    t[0] = i,
                    t[1] = s
                }
                n = new p(h(t)),
                n.start()
            },
            a.add = function(e, t) {
                if (!e || !t || !t.path) return;
                s.mods[e] = t
            },
            a.delay = function() {
                var e = [].slice.call(arguments),
                n = e.shift();
                t.setTimeout(function() {
                    a.apply(this, e)
                },
                n)
            },
            a.done = function() {
                var e = [].slice.call(arguments),
                t = 0,
                r;
                for (; r = e[t++];) typeof r == "string" && (s.mods[r] ? (mod = s.mods[r], n[mod.path] = !0) : /\.js|\.css/i.test(r) && (n[r] = !0))
            },
            a.css = function(t, n) {
                n = n || "qboot-inline-css";
                var r = e.getElementById(n);
                r || (r = e.createElement("style"), r.type = "text/css", r.id = n, e.getElementsByTagName("head")[0].appendChild(r)),
                r.styleSheet ? r.styleSheet.cssText = r.styleSheet.cssText + t: r.appendChild(e.createTextNode(t))
            },
            a.setConfig = function(e, t) {
                return s[e] = t,
                a
            },
            a.getConfig = function(e) {
                return s[e]
            },
            a
        })
    },
    30 : function(e, t, n) {
        "use strict";
        var r = n(21),
        i = n(31);
        document.getElementById("suggest-container") || $("#search-block .search-suggest").prepend('<div id="suggest-container" style="display:none" class="suggest"><div class="suggest-bd"></div><div class="suggest-ft"><div class="declare">安全搜索从360搜索开始</div></div></div>');
        var s = r.jsonp,
        o = "suggest-container",
        u = "haosou-input",
        a = "search-block",
        f = $("#" + u)[0],
        l = $("#" + a)[0],
        c = $("#" + o)[0],
        h = $("#" + o + " .suggest-bd")[0],
        p = f.form,
        d = new i(f, {
            autoPosition: !1,
            uiReferElem: l,
            uiWrapElem: c,
            uiContainerElem: h,
            recAllTimeout: 120
        });
        window._suggest = d,
        function() {
            var e = i.log,
            t = d,
            n = t.ui,
            r = t.data,
            o = "reci",
            u = "direct",
            a = "common",
            f = "on",
            l = {},
            c = {},
            h = function(t) {
                return String(t).replace(/[^\x00-\xff]/g, "abc").replace(/[\d]/g, "abc").length
            },
            p = "",
            v = !1;
            l[a] = [1, 50],
            l[u] = [6, 50],
            c[a] = [],
            c[u] = [],
            c[o] = [],
            n.searchForm.on("submit",
            function(e) {
                var t = n.getFocusedGroup();
                if (t == u) {
                    var r = $("#suggest-direct>a." + f);
                    r[0] && v && (window.open(r.attr("href")), e.preventDefault && e.preventDefault(), v = !1)
                } else {
                    var r = $("#suggest-reci>a." + f);
                    t == o && r[0] && r.attr("href") && v && (window.open(r.attr("href")), e.preventDefault && e.preventDefault(), v = !1)
                }
                p = n.getTextInputVal()
            }),
            function() {
                r.bindGroupHandler(a, {
                    request: function(t, n) {
                        if (!n || !t) return;
                        var r = h(t);
                        r >= l[a][0] && r <= l[a][1] && s("//sug.so.360.cn/suggest?word=" + encodeURIComponent(t) + "&encodein=utf-8&encodeout=utf-8&pq=" + encodeURIComponent(p),
                        function(e, t) {
                            n(e)
                        },
                        {
                            jsonp: "callback"
                        })
                    },
                    receive: function(t) {
                        return t && t.q && t.s && t.s.length > 0 ? {
                            query: t.q,
                            data: t.s
                        }: null
                    }
                }),
                n.bindGroupHandler(a, {
                    render: {
                        setup: function() {
                            c[a] = []
                        },
                        build: function() {
                            var e = 0;
                            return function(r) {
                                if (!r) return "";
                                var i = "",
                                s, o = t.query.length,
                                u = 0;
                                n.setGroupTotal(a, r.length);
                                for (var f = 0,
                                l = r.length; f < l; f++) {
                                    r[f] = r[f].trim(),
                                    s = r[f].toLowerCase();
                                    if (s === t.query) continue;
                                    s.indexOf(t.query) === 0 && (s = "<b>" + t.query + "</b>" + s.substring(o)),
                                    i += '<a data-text="' + r[f] + '" data-index="' + u + '"  class="suggest-item">' + s + "</a>",
                                    u++
                                }
                                return i = i ? '<div id="suggest-common" class="suggest-list">' + i + "</div>": "",
                                e != l && (e = l, $(".suggest-ft .declare").css("position", "relative").css("position", "absolute")),
                                i
                            }
                        } (),
                        teardown: function() {
                            c[a] = $("#suggest-common>a")
                        }
                    },
                    init: function() {
                        n.initGroupUserBehavior(a, "#suggest-common>a"),
                        n.container.delegate("#suggest-common>a", "click",
                        function(e) {
                            e.preventDefault()
                        }),
                        n.on("itemSelect",
                        function(t) {
                            if (t.group !== a) return;
                            if (t.index > -1 && c[a][t.index]) {
                                var r = c[a].eq(t.index);
                                t.trigger != "keyboard" && n.setTextInputVal(r.attr("data-text")),
                                n.trigger("enter", {
                                    trigger: t.trigger
                                }),
                                e("itemSelect[COMMON] index:" + t.index)
                            }
                        }),
                        n.on("itemFocus",
                        function(e) {
                            if (e.group !== a) return;
                            if (e.index > -1 && c[a][e.index]) {
                                var t = c[a].eq(e.index);
                                t.addClass(f),
                                e.trigger == "keyboard" && n.setTextInputVal(t.attr("data-text"))
                            }
                        }),
                        n.on("itemBlur",
                        function(e) {
                            if (e.group !== a) return;
                            e.index > -1 && c[a][e.index] && c[a].eq(e.index).removeClass(f)
                        })
                    }
                })
            } (),
            n.on("itemSelect",
            function(e) {
                setTimeout(function() {
                    n.hide()
                },
                300)
            }),
            n.on("change",
            function(e) {}),
            $("#search-block").hover(function() {
                $(this).find(".search-input").addClass("input-hover")
            },
            function() {
                $(this).find(".search-input").removeClass("input-hover")
            }),
            $(window).on("blur",
            function() {
                n.hide()
            })
        } ()
    },
    31 : function(e, t, n) {
        var r, i;
        "use strict";
        var s = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ?
        function(e) {
            return typeof e
        }: function(e) {
            return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol": typeof e
        }; (function(o, u) {
            s(t) === "object" ? e.exports = u() : (r = u, i = typeof r == "function" ? r.call(t, n, t, e) : r, i === undefined || !(e.exports = i))
        })(window,
        function() {
            function r(e) {
                return !! e && e.nodeType == 1
            }
            var e = n(21),
            t = function() {
                var e = function(t) {
                    window.console && console.log
                };
                return function() {
                    return
                }
            } (),
            i = e.createEvents,
            s = $.extend,
            o = document.body,
            u = function(t) {
                return this._config = {
                    recAllTimeout: 150
                },
                s(!0, this._config, t),
                this._handler = {},
                this._recAllStarted = !1,
                this._recAllTimer = null,
                this._recData = {},
                this._init()
            };
            u.prototype = {},
            u.prototype._init = function() {
                var e = this;
                return i(e),
                !0
            },
            u.prototype.setOne = function(e, t, n) {
                var r = this;
                t = t.toLowerCase(),
                r._recData[t] || (r._recData[t] = {}),
                r._recData[t][e] = n
            },
            u.prototype.setAll = function(e, t) {
                e = e.toLowerCase(),
                this._recData[e] = t
            },
            u.prototype.getAll = function(e) {
                var t = this;
                return e = e.toLowerCase(),
                this._requestAll(e)
            },
            u.prototype.getOne = function(e, t) {
                var n = this;
                return t = t.toLowerCase(),
                n._recData[t] && n._recData[t][e] ? (n.trigger("receiveOne", {
                    name: e,
                    query: t,
                    data: n._recData[t][e]
                }), !0) : this._requestOne(e, t)
            },
            u.prototype.bindGroupHandler = function(e, t) {
                this._handler[e] = t
            },
            u.prototype._requestAll = function(e) {
                var t = this;
                e = e.toLowerCase(),
                t._recAllStarted && (t._recAllStarted = !1, clearTimeout(t._recAllTimer)),
                t._recData[e] || (t._recData[e] = {});
                var n;
                for (n in t._handler) t._handler[n].request &&
                function(n) {
                    t._recData[e] && t._recData[e][n] ? (t._recAllStarted || (t._recAllStarted = !0, t._recAllTimer = setTimeout(function() {
                        t.trigger("receiveAll", {
                            query: e,
                            data: t._recData[e]
                        })
                    },
                    t._config.recAllTimeout)), t._receiveOne(n, t._recData[e][n])) : t._handler[n].request(e,
                    function(r) {
                        t._recAllStarted || (t._recAllStarted = !0, t._recAllTimer = setTimeout(function() {
                            t.trigger("receiveAll", {
                                query: e,
                                data: t._recData[e]
                            })
                        },
                        t._config.recAllTimeout)),
                        t._receiveOne(n, r)
                    })
                } (n);
                return ! 0
            },
            u.prototype._requestOne = function(e, t) {
                var n = this;
                return t = t.toLowerCase(),
                n._recData[t] || (n._recData[t] = {}),
                n._handler[e] && n._handler[e].request &&
                function(e) {
                    n._handler[e].request(t,
                    function(t) {
                        n._receiveOne(e, t)
                    })
                } (e),
                !0
            },
            u.prototype._receiveOne = function(e, t) {
                var n = this,
                r;
                return n._handler[e] && n._handler[e].receive && (r = n._handler[e].receive(t), r && r.query && (r.query = r.query.toLowerCase(), n._recData[r.query] || (n._recData[r.query] = {})), r && r.query && r.data && (n._recData[r.query][e] = r.data, n.trigger("receiveOne", {
                    name: e,
                    query: r.query,
                    data: r.data
                }))),
                !0
            };
            var a = function(t) {
                t.style.display = ""
            },
            f = function(t) {
                t.style.display = "none"
            },
            l = {
                DOWN: 40,
                UP: 38,
                ESC: 27,
                ENTER: 13,
                BACKSPACE: 8
            },
            c = [40, 39, 38, 37, 27, 13, 18, 17, 16],
            h = function(t, n) {
                return this._config = {
                    uiReferElem: null,
                    uiContainerElem: null,
                    posAdjust: {},
                    autoPosition: !0
                },
                s(!0, this._config, n),
                this.container = null,
                this.searchForm = null,
                this.isWatching = !1,
                this._groupHandlerNames = [],
                this._groupHandler = {},
                this._groupTotal = {},
                this._focusedItemIndex = {},
                this._focusedGroupIndex = -1,
                this.textInput = null,
                this.query = "",
                this.lastInputVal = "",
                this._init(t)
            };
            h.prototype = {
                config: function() {
                    var t = [].slice.call(arguments);
                    if (t.length === 1) return this._config[t[0]] || null;
                    if (t.length === 2) return this._config[t[0]] = t[1],
                    t[1]
                }
            },
            h.prototype._init = function(e) {
                i(this);
                var n = this,
                s = n.setupTextInput(e);
                return s ? n.config("uiReferElem") && !r(n.config("uiReferElem")) ? (t.error("uiReferElem is not exist"), !1) : (n.config("uiReferElem") || n.config("uiReferElem", e), n.config("uiContainerElem") && !r(n.config("uiContainerElem")) ? (t.error("uiContainerElem is not exist"), !1) : n.config("uiWrapElem") && !r(n.config("uiWrapElem")) ? (t.error("uiWrapElem is not exist"), !1) : (n.config("uiWrapElem") || n.config("uiWrapElem", n.config("uiContainerElem")), n.searchForm = $(e.form), n.wrap = $(n.config("uiWrapElem")), n.container = $(n.config("uiContainerElem")), this._initSuggest())) : (t.error("setup textInput[" + e + "] error"), !1)
            },
            h.prototype.setupTextInput = function(e) {
                return ! e || !r(e) ? (t.error("textInput[" + e + "] is not exist"), !1) : (this.textInput = $(e), this.query = "", this.lastInputVal = "", this.container && this.fillContent(), $(e).attr("qsugInited") == 1 ? !0 : this._initTextInput() && this.textInput.attr("qsugInited", 1))
            },
            h.prototype.focusTextInput = function() {
                var e = this;
                setTimeout(function() {
                    e.textInput.focus(),
                    e.trigger("focus")
                },
                0)
            },
            h.prototype.setTextInputVal = function(e) {
                this.textInput.val(e || "")
            },
            h.prototype.getTextInputVal = function() {
                return this.textInput.val() || ""
            },
            h.prototype.resetTextInput = function() {
                this.query = "",
                this.lastInputVal = "",
                this.container && this.fillContent()
            },
            h.prototype._initTextInput = function() {
                var e = this,
                n, r = function() {
                    var n = e.getTextInputVal(),
                    r = n.trim();
                    if (n === e.lastInputVal) return;
                    e.lastInputVal = n,
                    e.query = r,
                    r || (e.fillContent(""), e.hide()),
                    e.trigger("change", {
                        query: e.query
                    })
                },
                i = function() {
                    if (e.isWatching) return;
                    n = setTimeout(function() {
                        r(),
                        n = setTimeout(arguments.callee, 200)
                    },
                    100),
                    e.isWatching = !0
                },
                s = function() {
                    n && clearTimeout(n),
                    e.isWatching = !1
                };
                return e.textInput.attr("autocomplete", "off").on("focus",
                function() {
                    e.trigger("focus")
                }).on("blur",
                function() {
                    e.trigger("stopWatch"),
                    e.trigger("blur")
                }).on("paste input",
                function(t) {
                    e.trigger("startWatch")
                }).on("keydown",
                function(t) {
                    e.keyEventHandler(t)
                }),
                e.on("startWatch", i),
                e.on("stopWatch", s),
                e.on("restoreQuery",
                function(t) {
                    e.setTextInputVal(e.query)
                }),
                t("initTextInput finished"),
                !0
            },
            h.prototype.keyEventHandler = function() {
                var e = function(t) {
                    return c.indexOf(t) === -1
                };
                return function(t) {
                    var n = this,
                    r = "",
                    i = {
                        trigger: "keyboard"
                    };
                    switch (t.keyCode) {
                    case l.UP:
                        r = "up",
                        n.isVisible() && n.previous(),
                        t.preventDefault && t.preventDefault(),
                        n.trigger("stopWatch");
                        break;
                    case l.DOWN:
                        r = "down",
                        n.isVisible() ? n.next() : n.displayContainer(),
                        t.preventDefault && t.preventDefault(),
                        n.trigger("stopWatch");
                        break;
                    case l.ESC:
                        r = "esc",
                        n.hide(),
                        n.trigger("stopWatch");
                        break;
                    case l.BACKSPACE:
                        r = "backspace",
                        n.trigger("startWatch");
                        break;
                    case l.ENTER:
                        n.isVisible() && (r = "itemSelect", i.group = n.getFocusedGroup(), i.index = n._focusedItemIndex[i.group]),
                        n.trigger("stopWatch");
                        break;
                    default:
                        e(t.keyCode) && n.trigger("startWatch")
                    }
                    r != "" && n.trigger(r, i)
                }
            } (),
            h.prototype._initSuggest = function() {
                var e = this;
                return e.fillContent(),
                e.on("enter",
                function(n) {
                    e.trigger("stopWatch");
                    if (n.trigger == "mouse" || n.trigger == "touch") {
                        var r = e.searchForm[0],
                        i = !0,
                        s = window.document;
                        if (!r) return;
                        if (s.createEvent) {
                            var o = s.createEvent("MouseEvents");
                            o.initEvent("submit", !0, !0),
                            i = r.dispatchEvent(o)
                        } else s.createEventObject && (i = r.fireEvent("onsubmit"));
                        i && r.submit()
                    }
                    t("enter with:" + e.getTextInputVal())
                }),
                e.on("itemFocus",
                function() {
                    var t = "";
                    return function(n) {
                        if (n.group != t) {
                            var r = e._groupHandlerNames;
                            for (var i = r.length - 1; i >= 0; i--) r[i] != n.group && e.restoreGroup(r[i]);
                            t = n.group
                        }
                    }
                } ()),
                $(window).on("resize",
                function() {
                    setTimeout(function() {
                        e.setContainerRegion()
                    })
                }),
                e.container.on("mousedown",
                function(t) {
                    var n = e.textInput[0];
                    n.onbeforedeactivate = function(e) {
                        return window.event.returnValue = !1,
                        n.onbeforedeactivate = null,
                        !1
                    }
                }),
                t("initEvent finished"),
                !0
            },
            h.prototype.setFocusedGroup = function(e) {
                this._focusedGroupIndex = this._groupHandlerNames.indexOf(e || "")
            },
            h.prototype.getFocusedGroup = function() {
                return this._groupHandlerNames[this._focusedGroupIndex] || null
            },
            h.prototype.bindGroupHandler = function(e, t) {
                var n = this;
                n._groupHandlerNames.push(e),
                n._groupHandler[e] = t,
                n._focusedItemIndex[e] = -1,
                t.init && t.init()
            },
            h.prototype.restoreGroup = function(e) {
                var t = this;
                t.trigger("itemBlur", {
                    group: e,
                    index: t._focusedItemIndex[e]
                }),
                t._focusedItemIndex[e] = -1,
                t._groupHandlerNames[t._focusedGroupIndex] && (t._focusedGroupIndex = -1)
            },
            h.prototype.initGroupUserBehavior = function(e, t) {
                var n = this,
                r = "mouse";
                n.container.delegate(t, "mouseover",
                function(r) {
                    var i = $(this).attr("data-index"),
                    s = i === undefined ? $(t, n.container).index(this) : i,
                    o = n._groupHandlerNames;
                    for (var u = o.length - 1; u >= 0; u--) n.trigger("itemBlur", {
                        group: o[u],
                        index: n._focusedItemIndex[o[u]],
                        trigger: "mouse"
                    });
                    n.trigger("itemFocus", {
                        group: e,
                        index: s,
                        trigger: "mouse"
                    }),
                    n.setFocusedGroup(e, s),
                    n._focusedItemIndex[e] = s
                }),
                n.container.delegate(t, "touchstart",
                function(i) {
                    var s = $(this).attr("data-index"),
                    o = s === undefined ? $(t, n.container).core.indexOf(this) : s,
                    u = n._groupHandlerNames;
                    for (var a = u.length - 1; a >= 0; a--) n.trigger("itemBlur", {
                        group: u[a],
                        index: n._focusedItemIndex[u[a]],
                        trigger: "touch"
                    });
                    n.trigger("itemFocus", {
                        group: e,
                        index: o,
                        trigger: "touch"
                    }),
                    n.setFocusedGroup(e, o),
                    n._focusedItemIndex[e] = o,
                    r = "touch"
                }),
                n.container.delegate(t, "touchend",
                function(r) {
                    var i = $(this).attr("data-index"),
                    s = i === undefined ? $(t, n.container).core.indexOf(this) : i;
                    n.trigger("itemBlur", {
                        group: e,
                        index: s,
                        trigger: "touch"
                    })
                }),
                n.container.delegate(t, "click",
                function(i) {
                    var s = $(this).attr("data-index"),
                    o = s === undefined ? $(t, n.container).index(this) : s;
                    n.trigger("itemSelect", {
                        group: e,
                        index: o,
                        trigger: r
                    })
                })
            },
            h.prototype.render = function(e) {
                var n = this,
                r, i, s = [],
                o,
                u;
                e = e || {};
                for (o = 0, u = n._groupHandlerNames.length; o < u; o++) r = n._groupHandlerNames[o],
                i = n._groupHandler[r],
                i && i.render && (i.render.setup && (i.render.setup(), n.setGroupTotal(r, 0), n.restoreGroup(r), t("Render setup [" + r + "]")), i.render.build && (s.push(i.render.build(e[r])), t("Render buildui [" + r + "]:", e[r])));
                n.fillContent(s.join(""));
                for (o = 0, u = n._groupHandlerNames.length; o < u; o++) r = n._groupHandlerNames[o],
                i = n._groupHandler[r],
                i && i.render && i.render.teardown && (i.render.teardown(), t("Render teardown [" + r + "]"))
            },
            h.prototype.setGroupTotal = function(e, t) {
                this._groupTotal[e] = t
            },
            h.prototype.groupPrevious = function(e) {
                var t = this,
                n = t._groupTotal[e],
                r = t._focusedItemIndex[e],
                i = -1;
                return n > 0 && (r <= -1 ? r = n - 1 : r >= 0 && (i = r, r--)),
                t.trigger("itemBlur", {
                    group: e,
                    index: i,
                    trigger: "keyboard"
                }),
                t.trigger("itemFocus", {
                    group: e,
                    index: r,
                    trigger: "keyboard"
                }),
                t._focusedItemIndex[e] = r,
                r
            },
            h.prototype.groupNext = function(e) {
                var t = this,
                n = t._groupTotal[e],
                r = t._focusedItemIndex[e],
                i = -1;
                return n > 0 && (r <= -1 ? r = 0 : r < n && (i = r, r++), r >= n && (r = -1)),
                t.trigger("itemBlur", {
                    group: e,
                    index: i,
                    trigger: "keyboard"
                }),
                t.trigger("itemFocus", {
                    group: e,
                    index: r,
                    trigger: "keyboard"
                }),
                t._focusedItemIndex[e] = r,
                r
            },
            h.prototype.displayContainer = function() {
                var e = this;
                e.container.html().trim() ? e.show() : e.hide()
            },
            h.prototype.fillContent = function(e) {
                var n = this;
                n.container.html(e || ""),
                n.displayContainer(),
                n.isVisible(),
                t("fillContent :" + e)
            },
            h.prototype.setContainerRegion = function() {
                var e = this;
                if (!e.config("autoPosition")) return ! 1;
                var t = e.config("uiReferElem"),
                n = $(e.config("uiReferElem")).offset(),
                r = e.config("posAdjust"),
                i = e.wrap.attr("width") ? parseInt(e.wrap.attr("width"), 10) : t.offsetWidth;
                n.bottom = n.top + t.offsetHeight,
                e.wrap.css({
                    position: "absolute",
                    top: (r.top ? r.top + n.bottom: n.bottom) + "px",
                    left: (r.left ? r.left + n.left: n.left) + "px",
                    width: (r.width ? r.width + i: i) + "px",
                    "z-index": r["z-index"] ? r["z-index"] : 99
                },
                1)
            },
            h.prototype.isVisible = function() {
                return this.wrap.css("display") != "none"
            },
            h.prototype.show = function() {
                var e = this;
                e.trigger("show");
                if (e.isVisible()) return;
                e.setContainerRegion(),
                a(e.wrap[0])
            },
            h.prototype.hide = function() {
                var e = this;
                e.trigger("hide");
                if (!e.isVisible()) return;
                f(e.wrap[0])
            },
            h.prototype.previous = function() {
                var e = this,
                n = e._focusedGroupIndex,
                r = e._groupHandlerNames[n],
                i = e._groupHandlerNames.length,
                s = -1;
                n <= -1 && (n = i - 1, r = e._groupHandlerNames[n]);
                while (s === -1 && n > -1) e._groupHandler[r] && (s = e.groupPrevious(r)),
                s === -1 && (n > 0 ? (n--, r = e._groupHandlerNames[n]) : (n = -1, r = ""), t("changeGroup", n));
                n === -1 && s === -1 && e.trigger("restoreQuery"),
                e._focusedGroupIndex = n,
                t(r + " previous:" + s)
            },
            h.prototype.next = function() {
                var e = this,
                n = e._focusedGroupIndex,
                r = e._groupHandlerNames[n],
                i = e._groupHandlerNames.length,
                s = -1;
                n >= i && (n = -1),
                n <= -1 && (n = 0, r = e._groupHandlerNames[n]);
                while (s === -1 && n < i) e._groupHandler[r] && (s = e.groupNext(r)),
                s === -1 && (n < i ? (n++, r = e._groupHandlerNames[n]) : (n = -1, r = ""), t("changeGroup", n));
                n === i && s === -1 && e.trigger("restoreQuery"),
                e._focusedGroupIndex = n,
                t(r + " next:" + s)
            };
            var p = function d(e, t) {
                var n = this;
                if (! (n instanceof d)) return new d(e, t);
                n._config = {
                    ui: null,
                    data: null
                },
                s(!0, n._config, t),
                n.query = "",
                n.renderQuery = "",
                n.ui = null,
                n.data = null,
                n._init(e, t)
            };
            return p.prototype = {
                config: function() {
                    var t = [].slice.call(arguments);
                    if (t.length === 1) return this._config[t[0]] || null;
                    if (t.length === 2) return this._config[t[0]] = t[1],
                    t[1]
                }
            },
            p.prototype._init = function(e, n) {
                var r = this;
                return r.isWatching = !1,
                r.ui = r.config("ui") || r.config("ui", new h(e, n)),
                r.ui ? (r.data = r.config("data") || r.config("data", new u(n)), r.data ? (i(r), r._initEvent()) : (t.error("init data error"), !1)) : (t.error("init ui error"), !1)
            },
            p.prototype._initEvent = function() {
                var e = this,
                n = e.data,
                r = e.ui;
                return r.on("change",
                function(r) {
                    var i = e.query = r.query.toLowerCase();
                    i && (n.getAll(i), t("input query:" + i))
                }),
                n.on("receiveAll",
                function(t) {
                    t.query.toLowerCase() === e.query && (e.renderQuery = t.query.toLowerCase(), r.render(t.data))
                }),
                !0
            },
            p.log = t,
            p.log.error = t,
            qSuggest = p
        })
    },
    86 : function(e, t) {},
    87 : function(e, t) {},
    88 : function(e, t) {},
    89 : function(e, t) {
        "use strict";
        function s(e, t) {
            if (!e) return "";
            var n = $("#pubKey");
            if (!n.length && !t) return e;
            if (JSEncrypt === undefined) throw new Error("Please introduce [JSEncrypt] package");
            var r = t ? $.trim(t) : $.trim(n.val());
            r = decodeURIComponent(r);
            var i = new JSEncrypt;
            return i.setPublicKey(r),
            i.encrypt($.trim(e))
        }
        var n = n || {},
        r = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDarKnIQrARGnTHhbxqLQ1ZID6lXRdTseCW2tYwDaq5TGejVPKOy4HQ3cUBHhMPFTByvIw+P6quHQrrtzmPnL+ifpOaEyre9/n3RLhxMb7fsctGlXFhiA8+Pf2EJmbvl5R52i5Izsoi4Fk7VC1qjavl1uIjrU17qrVWfJPYfgR9iwIDAQAB";
        n.ui = n.ui || {},
        n.dataApi = {
            yzRefresh: ""
        },
        n.timestamp = (new Date).getTime(),
        n.smsVerify = function() {
            function i(e) {
                return e.attr(t, t).addClass(t)
            }
            function s(e) {
                return e.removeClass(t).removeAttr(t)
            }
            function o(e) {
                var t = e.data("freq") || 60,
                n = null,
                r = "秒后重新获取";
                e.data("orgtxt", e.text()).text("验证码已经发送"),
                i(e).blur(),
                setTimeout(function() {
                    n = setInterval(function() {
                        t--,
                        e.text(t + r),
                        t <= -1 && (s(e).text(e.data("orgtxt")), clearInterval(n), n = null)
                    },
                    1e3)
                },
                500)
            }
            var e = ".yz-sms",
            t = "disabled",
            r = !1;
            $(e).each(function() {
                var e = $(this),
                t = $(e.data("phone")),
                n = e.data("phonecode"),
                r = /^(?:13|14|15|16|17|18|19)[\d]{9}$/;
                n && r.test(n) ? s(e) : i(e),
                t.length && t.on("input blur keyup",
                function() {
                    var t = $(this).val();
                    r.test(t) ? (s(e), e.data("phonecode", t)) : (i(e), e.data("phonecode", 0))
                });
                if (typeof serverdata != "undefined") {
                    var o = serverdata.tel;
                    r.test(o) ? (s(e), e.data("phonecode", o)) : (i(e), e.data("phonecode", 0))
                }
            }).on("click",
            function() {
                var e = $(this),
                t = e.data("api"),
                u = e.data("phonecode"),
                a = (new Date).getTime(),
                f = $('input[name="purpose"]').val(),
                l = $('input[name="image_captcha"]'),
                c = l.val(),
                h = {
                    mobile: u,
                    timestamp: a,
                    purpose: f,
                    image_captcha: c
                };
                if (e.hasClass("disabled")) return;
                if (!u) return ! 1;
                i(e),
                $.ajax({
                    type: "POST",
                    url: t,
                    dataType: "jsonp",
                    data: h
                }).done(function(t) {
                    if (t.errno != 0) {
                        s(e),
                        n.msgBox(t.errmsg, e, 1);
                        var r = $(".yz-refresh").attr("href"),
                        i,
                        u = Date.parse(new Date),
                        a = r + "?=" + u;
                        $(".yz-img").find("img").remove(),
                        i = $('<img src="' + a + '">'),
                        $(".yz-img").html(i)
                    } else o(e)
                }).fail(function() {
                    s(e)
                }),
                r = !0
            })
        },
        n.datePicker = function() {
            $.ms_DatePicker({
                YearSelector: ".sel_year",
                MonthSelector: ".sel_month",
                DaySelector: ".sel_day"
            })
        },
        n.areaData = function() {
            function d(t) {
                var r = t;
                if (r >= 0) {
                    var i = e[r].cities;
                    n.html(u);
                    for (a in i) {
                        c = o == i[a].id ? "selected": "";
                        if (a >= 0) {
                            var s = '<option value="' + i[a].id + '" ' + c + ">" + i[a].title + "</option>";
                            n.append(s)
                        }
                    }
                }
            }
            var e = city_Data,
            t = $(".sel_province"),
            n = $(".sel_city"),
            r = "请选择",
            i = -1,
            s = t.attr("rel"),
            o = n.attr("rel"),
            u = '<option value="' + i + '">' + r + "</option>";
            t.html(u),
            n.html(u);
            for (var a in e) if (e.hasOwnProperty(a)) {
                var f = e[a].title,
                l = e[a].id,
                c = s == l ? "selected": "",
                h = '<option data-i="' + a + '" value="' + l + '" ' + c + ">" + f + "</option>";
                t.append(h)
            }
            if (s) {
                var p = t.find("option:selected").attr("data-i");
                d(p)
            }
            t.on("change",
            function() {
                var e = $(this).find("option:selected").attr("data-i");
                d(e)
            })
        },
        n.createPassword = function(e) {
            var t = typeof r == "undefined" ? "": r;
            $(e).on("input change blur keyup",
            function() {
                var e = $(this),
                n = e.val(),
                r = s(n, t);
                e.parent().find(".ipt_PassWd").val(r)
            })
        },
        n.refresh = function(e) {
            var t = window.location.href,
            n = parseInt(e) ? e * 1e3: 0;
            setTimeout(function() {
                window.location = add_url_params(t, {
                    __t: new Date * 1
                })
            },
            n)
        },
        n.msgBox = function(e, t, n) {
            if (n == 0) var r = $('<div class="msg-box icon-success">' + e + "</div>");
            else if (n == 1) var r = $('<div class="msg-box icon-error">' + e + "</div>");
            r.appendTo("body");
            var i = $(".msg-box").innerHeight() + 3,
            s = $(".msg-box").innerWidth() + 2,
            o = t.offset().top,
            u = t.offset().left,
            a = t.innerWidth() / 2 - s / 2;
            $(".msg-box").css({
                top: o,
                left: u + a,
                opacity: 0
            }),
            r.show(),
            r.animate({
                top: o - i,
                opacity: 1
            },
            500, "swing"),
            setTimeout(function() {
                $(".msg-box").remove()
            },
            1500)
        },
        n.yzRefresh = function() {
            var e = $(".yz-refresh"),
            t = $(".yz-img");
            e.on("click",
            function(n) {
                n.preventDefault();
                var r = e.attr("href"),
                i,
                s = Date.parse(new Date),
                o = r + "?=" + s;
                t.find("img").remove(),
                i = $('<img src="' + o + '">'),
                t.html(i)
            }),
            $('input[name="image_captcha"]').on("focus",
            function() {
                $(this).parents("td").find("span.error.errormsg.new").remove(),
                $(this).parents("form").find(".btn-default").removeAttr("disabled"),
                $(this).parents("form").find(".btn-default").data("imageCaptcha", 0)
            })
        },
        n.modifyName = function() {
            var e = $(".js-modify"),
            t = $(".js-modify-box"),
            r = $(".js-save"),
            i = $(".js-cancel"),
            s = $(".user-name-box");
            e.on("click",
            function(e) {
                e.preventDefault();
                var t = $(this).parents(".modify-area"),
                n = t.find(".user-name-box span").text();
                t.find(".user-name-box").hide(),
                t.find(".js-modify-box").show(),
                t.find('.js-modify-box input[name="nick_name"]').val(n)
            }),
            i.on("click",
            function(e) {
                e.preventDefault();
                var t = $(this).parents(".modify-area");
                t.find(".js-modify-box").hide(),
                t.find(".user-name-box").show()
            }),
            r.on("click",
            function(e) {
                e.preventDefault();
                var r = $(this).parents(".modify-area"),
                i = $(this).parent(".js-modify-box").find('input[name="nick_name"]').val(),
                o = r.find(".js-modify-box").data("action"),
                u = $(this);
                if (i == "") return n.msgBox("请输入用户名!", u, 1),
                !1;
                if (u.data("state") == 1) return ! 1;
                u.data("state", 1),
                $.ajax({
                    type: "POST",
                    url: o,
                    dataType: "jsonp",
                    data: {
                        nick_name: i
                    }
                }).done(function(e) {
                    e.errno == 0 ? (n.msgBox("修改成功", u, 0), setTimeout(function() {
                        s.find("span").html(i),
                        u.data("state", 0),
                        t.hide(),
                        s.show()
                    },
                    1500)) : setTimeout(function() {
                        n.msgBox(e.errmsg, u, 1),
                        u.data("state", 0)
                    },
                    1500)
                })
            })
        },
        n.tab = function() {
            $("[data-tab]").each(function() {
                var e = "mouseover",
                t = $(this),
                r = t.data("tab"),
                i = t.siblings("[data-con]"),
                s = i.data("con"),
                o = t.find(r),
                u = i.find(s),
                a = o.toArray();
                o.on(e,
                function(e) {
                    e.preventDefault();
                    var t = $(this),
                    r = t.index(),
                    i = u.eq(r);
                    n.ui.cur(t),
                    i.show().siblings(u).hide(),
                    t.blur()
                })
            })
        },
        n.ui.cur = function(e, t, n) {
            var e = $(e) || e,
            n = n || "",
            r = t || "cur";
            e.addClass(r).siblings(n).removeClass(r)
        },
        n.weiboLogin = function() {
            var e = $(".other-wb");
            e.on("click",
            function() {})
        },
        n.userSub = function() {
            var e = $(".subscribe-list"),
            t = e.find("ul"),
            n = e.data("usersub"),
            r = $(".subscribe-num"),
            s = 1,
            o = 12,
            u = {
                status: !1,
                pmax: 0,
                create: function(t, n) {
                    var r = [];
                    t > 0 && r.push('<a class="first_style" href="javascript:;" data-p="1" data-click="news_page" target="_self">首页</a>'),
                    t > 1 && r.push('<a class="next_style" href="javascript:;" data-p="', t - 1, '" data-click="news_page" target="_self">上一页</a>');
                    for (var i = Math.max(1, t - 2); i <= Math.min(n, t + 2); i++) i === t ? r.push('<a class="nowPage_style" href="javascript:;" target="_self">', i, "</a>") : r.push('<a class="page_style" href="javascript:;" data-p="', i, '" data-click="news_page" target="_self">', i, "</a>");
                    t < n && r.push('<a class="next_style" href="javascript:;" data-p="', t + 1, '" data-click="news_page" target="_self">下一页</a>'),
                    t < n - 3 && r.push('<a class="first_style" href="javascript:;" data-p="', n - 1, '" data-click="news_page" target="_self">末页</a>'),
                    $(".pageBox").html(r.join(""))
                }
            },
            a = function(a) {
                e.length && $.ajax({
                    type: "get",
                    dataType: "jsonp",
                    data: {
                        pageNo: a,
                        pageRow: o
                    },
                    url: n
                }).done(function(e) {
                    if (e.errno == 0) {
                        var n = [],
                        e = e.data,
                        s = e.list,
                        f = e.total,
                        l = parseInt(f / o) + 1;
                        r.html(f);
                        for (i in s) if (s.hasOwnProperty(i)) {
                            var c = "//record.btime.com/show?uid=" + s[i].c_id;
                            if (s[i].identify_status == 1) var h = '<i class="icon icon-authenticate"></i>';
                            else var h = "";
                            n.push('<li><a href="', c, '"><div class="pic"><img src="', s[i].icon, '" alt=""></div><div class="info"><p class="name"><span>', s[i].name, "</span>", h, '</p><p class="brief">', s[i].summary, "</p></div></a></li>")
                        }
                        t.html(n.join("")),
                        f > o && u.create(a, l)
                    }
                })
            };
            $(".pageBox").on("click", '[data-click="news_page"]',
            function() {
                a($(this).data("p"))
            }),
            a(1)
        },
        n.paizhaoPop = function() {
            $('[data-popup="popup"]').each(function() {
                var e = $(this),
                t = e.data("img");
                e.on("click",
                function(e) {
                    e.preventDefault();
                    var n = $('<div class="pop-cnt"><div class="pop-box"><span class="pop-close"></span><img src="' + t + '">' + "</div>" + '<div class="pop_mask"></div>' + "</div>");
                    n.appendTo("body"),
                    setTimeout(function() {
                        n.show();
                        var e = $(".pop-box"),
                        t = e.width(),
                        r = e.height();
                        e.css({
                            marginTop: -r / 2 + "px",
                            marginLeft: -t / 2 + "px"
                        })
                    },
                    100)
                }),
                $(document).on("click", ".pop-close",
                function(e) {
                    e.preventDefault(),
                    $(".pop-cnt").remove()
                })
            })
        },
        n.showLoginCode = function() {
            $("#login-code-wrapper").show()
        },
        n.refreshCode = function() {
            var e = $(".yz-img"),
            t = e.attr("href") + "?=" + (new Date).getTime();
            e.html('<img src="' + t + '" />')
        },
        n.checkCode = function(e, t, r) {
            var i = e.find("input"),
            s = i.val(),
            o = i.data("action");
            $.ajax({
                type: "POST",
                url: o,
                dataType: "jsonp",
                data: {
                    image_captcha: s
                }
            }).done(function(e) {
                e.errno == 0 ? (i.parent().find("span.error.errormsg.new").remove(), i.parents("form").find(".btn-default").removeAttr("disabled"), i.parents("form").find(".btn-default").data("imageCaptcha", 0), t && t()) : (i.parent().find("span.error.errormsg.new").remove(), i.parent().append('<span class="error errormsg new">验证码错误</span>'), i.parents("form").find(".btn-default").attr("disabled", !0), i.parents("form").find(".btn-default").data("imageCaptcha", 1), n.refreshCode(), r && r())
            })
        },
        n.bindRefreshCode = function() {
            $("#login-code-wrapper").on("click", ".yz-img",
            function() {
                n.refreshCode()
            })
        },
        $(function() {
            qdas_monitor.init({
                basePar: {
                    p: "QH_156_1#record",
                    pid: "usercenter",
                    version: "v4"
                }
            }),
            n.smsVerify(),
            n.datePicker(),
            n.areaData(),
            n.yzRefresh(),
            n.modifyName(),
            n.tab(),
            n.userSub(),
            n.paizhaoPop(),
            n.createPassword('input[type="password"]'),
            n.bindRefreshCode(),
            qboot.cookie.remove("__guid", {
                path: "/"
            }),
            $(document).on("click", "#login-btn",
            function(e) {
                function o() {
                    r.find('input[name="timestamp"]').val(n.timestamp),
                    r.find('input[name="jump"]').val() == "" && r.find('input[name="jump"]').val(s),
                    r.find(".btn-default").attr("disabled", !0);
                    var e = r.serialize();
                    $.ajax({
                        type: "POST",
                        url: i,
                        dataType: "jsonp",
                        data: e
                    }).done(function(e) {
                        e.errno == 0 ? (n.msgBox("登录成功", r.find(".btn-default"), 0), setTimeout(function() {
                            var t = e.data.url;
                            window.location.href = t
                        },
                        1500)) : (n.msgBox(e.errmsg, r.find(".btn-default"), 1), r.find(".btn-default").removeAttr("disabled"), n.refreshCode())
                    })
                }
                e.preventDefault();
                var t = $(this).parents("form#loginForm").find("#code-wrapper"),
                r = $("#loginForm"),
                i = r.attr("action"),
                s = encodeURIComponent(document.referrer);
                if (!JC.Valid.check(r[0])) return ! 1;
                n.checkCode(t,
                function() {
                    o()
                })
            }),
            $(document).on("click", "#regist-btn",
            function(e) {
                function s() {
                    t.find(".btn-default").attr("disabled", !0);
                    var e = t.serialize();
                    $.ajax({
                        type: "POST",
                        url: r,
                        dataType: "jsonp",
                        data: e
                    }).done(function(e) {
                        e.errno == 0 ? (n.msgBox("验证成功", t.find(".btn-default"), 0), setTimeout(function() {
                            var t = e.data.url;
                            window.location.href = t
                        },
                        1500)) : (n.msgBox(e.errmsg, t.find(".btn-default"), 1), t.find(".btn-default").removeAttr("disabled"))
                    })
                }
                e.preventDefault();
                var t = $("#registForm"),
                r = t.attr("action"),
                i = $(this).parents("form").find("#code-wrapper");
                t.find('input[name="timestamp"]').val(n.timestamp),
                $(".ipt_mobile").length > 0 && $(".ipt_mobile").val(serverdata.tel);
                if (!JC.Valid.check(t[0])) return ! 1;
                $("form #code-wrapper").length && $(this).data("type") != "reset" ? n.checkCode(i,
                function() {
                    s()
                }) : s()
            })
        })
    }
});