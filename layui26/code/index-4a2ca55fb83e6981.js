(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
	[405], {
		8312: function(e, n, t) {
			(window.__NEXT_P = window.__NEXT_P || []).push(["/",
				function() {
					return t(7793)
				}
			])
		},
		7793: function(e, n, t) {
			"严格使用";
			t.r(n), t.d(n, {
				default: function() {
					return nt
				}
			});
			var r, o, a, s, $, i, c, l, _, u, h, d = t(603),
				f = t(5893),
				p = t(9008),
				m = t.n(p),
				x = t(24),
				v = t(4288),
				g = t(4924),
				j = t(4184),
				y = t.n(j),
				w = t(7294),
				k = t(5615),
				N = t.n(k),
				C = t(4664),
				b = (0, w.createContext)(null),
				Z = function(e) {
					var n = e.children,
						t = (0, w.useRef)(null);
					return (0, f.jsx)(b.Provider, {
						value: t,
						children: n
					})
				}, E = t(8006),
				S = t(3889),
				L = t(1538),
				O = (0, x.cn)(0),
				P = (0, x.cn)(null),
				K = (0, x.cn)(""),
				R = (0, x.cn)(!1),
				T = (0, x.cn)(function(e) {
					return {
						icon: e(P),
						message: e(K)
					}
				}, function(e, n, t) {
					window.clearTimeout(e(O)), n(K, t.message), n(P, t.icon), n(R, !0), (null == t ? void 0 : t.timeout) && n(O, window.setTimeout(function() {
						n(R, !1)
					}, t.timeout))
				}),
				M = t(4908),
				B = t.n(M),
				A = function() {
					var e = (0, w.useRef)(null),
						n = (0, d.Z)((0, x.KO)(T), 1)[0],
						t = (0, d.Z)((0, x.KO)(R), 1)[0];
					return (0, f.jsx)(L.Z, { in : t,
						nodeRef: e,
						timeout: 500,
						classNames: B(),
						unmountOnExit: !0,
						children: (0, f.jsx)("div", {
							className: B().container,
							ref: e,
							children: (0, f.jsxs)("span", {
								className: B().flash,
								children: [null == n ? void 0 : n.icon, null == n ? void 0 : n.message]
							})
						})
					})
				}, F = t(5606),
				H = t.n(F);

			function D() {
				return (D = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var V = function(e) {
				return w.createElement("svg", D({
					width: 16,
					height: 16,
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), r || (r = w.createElement("path", {
					fillRule: "evenodd",
					clipRule: "evenodd",
					d: "M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM6.28 5.22a.75.75 0 0 0-1.06 1.06L6.94 8 5.22 9.72a.75.75 0 1 0 1.06 1.06L8 9.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L9.06 8l1.72-1.72a.75.75 0 1 0-1.06-1.06L8 6.94 6.28 5.22Z",
					fill: "currentColor"
				})))
			}, G = function(e) {
					var n = e.children,
						t = (0, w.useRef)(),
						r = (0, w.useRef)(null),
						o = (0, w.useRef)(),
						a = (0, w.useRef)(),
						s = (0, d.Z)((0, x.KO)(C.Fi), 2),
						$ = s[0],
						i = s[1],
						c = (0, w.useState)(!1),
						l = c[0],
						_ = c[1],
						u = (0, w.useRef)(null),
						h = (0, w.useRef)(null),
						p = (0, w.useCallback)(function(e) {
							var n;
							(n = "left" === t.current ? o.current - (e.clientX - a.current) * 2 : o.current + (e.clientX - a.current) * 2) > 920 ? n = 920 : n < 520 && (n = 520), i(n)
						}, [i]),
						m = (0, w.useCallback)(function() {
							document.removeEventListener("mousemove", p), document.removeEventListener("mouseup", m), _(!1)
						}, [p]),
						v = (0, w.useCallback)(function(e) {
							return function(n) {
								t.current = e, o.current = r.current.offsetWidth, a.current = n.clientX, _(!0), document.addEventListener("mousemove", p), document.addEventListener("mouseup", m)
							}
						}, [p, m]);
					return (0, f.jsxs)("div", {
						className: H().resizableFrame,
						children: [(0, f.jsx)("div", {
							className: y()(H().windowSizeDragPoint, H().left),
							onMouseDown: v("left")
						}), (0, f.jsx)("div", {
							className: y()(H().windowSizeDragPoint, H().right),
							onMouseDown: v("right")
						}), (0, f.jsx)("div", {
							ref: r,
							style: {
								width: $ || "auto"
							},
							children: n
						}), (0, f.jsx)(L.Z, {
							nodeRef: u,
							in : !! ($ && !l),
							unmountOnExit: !0,
							timeout: 200,
							classNames: {
								enter: H().fadeEnter,
								enterActive: H().fadeEnterActive,
								exit: H().fadeExit,
								exitActive: H().fadeExitActive
							},
							children: (0, f.jsx)("div", {
								className: H().resetWidthContainer,
								ref: u,
								children: (0, f.jsxs)("a", {
									className: H().resetWidth,
									onClick: function(e) {
										e.preventDefault(), i(null)
									},
									children: [(0, f.jsx)(V, {}), "设置为自动宽度"]
								})
							})
						}), (0, f.jsx)(L.Z, {
							nodeRef: h,
							in : l,
							unmountOnExit: !0,
							timeout: 200,
							classNames: {
								enter: H().fadeEnter,
								enterActive: H().fadeEnterActive,
								exit: H().fadeExit,
								exitActive: H().fadeExitActive
							},
							children: (0, f.jsx)("div", {
								ref: h,
								className: H().ruler,
								children: (0, f.jsxs)("span", {
									children: [$, " px"]
								})
							})
						})]
					})
				}, U = function() {
					var e, n, t, r = (0, w.useContext)(b),
						o = (0, d.Z)((0, x.KO)(E.XM), 1)[0],
						a = (0, d.Z)((0, x.KO)(C.nf), 1)[0],
						s = (0, d.Z)((0, x.KO)(C.iB), 2),
						$ = s[0],
						i = s[1],
						c = (0, d.Z)((0, x.KO)(v.MU), 1)[0],
						l = (n = (e = (0, w.useState)(!1))[0], t = e[1], (0, w.useEffect)(function() {
							var e;
							t(/constructor/i.test(window.HTMLElement) || "[object SafariRemoteNotification]" === (e = !window.safari || "undefined" != typeof safari && window.safari.pushNotification).toString())
						}, []), n);
					return (0, f.jsx)("div", {
						className: N().frameContainer,
						children: (0, f.jsx)(G, {
							children: (0, f.jsxs)("div", {
								className: N().frame,
								ref: r,
								style: {
									padding: o,
									backgroundImage: a ? c : ""
								},
								children: [(0, f.jsx)(A, {}), !a && (0, f.jsx)("div", {
									"data-ignore-in-export": !0,
									className: N().noBackground
								}), (0, f.jsxs)("div", {
									className: y()(N().window, (0, g.Z)({}, N().withShadow, !l)),
									children: [(0, f.jsxs)("div", {
										className: N().header,
										children: [(0, f.jsxs)("div", {
											className: N().controls,
											children: [(0, f.jsx)("div", {
												className: N().control
											}), (0, f.jsx)("div", {
												className: N().control
											}), (0, f.jsx)("div", {
												className: N().control
											})]
										}), (0, f.jsxs)("div", {
											className: N().fileName,
											children: [(0, f.jsx)("input", {
												type: "text",
												value: $,
												onChange: function(e) {
													return i(e.target.value)
												},
												spellCheck: !1,
												tabIndex: -1
											}), 0 === $.length ? (0, f.jsx)("span", {
												"data-ignore-in-export": !0,
												children: "文本1"
											}) : null]
										})]
									}), (0, f.jsx)(S.Z, {})]
								})]
							})
						})
					})
				}, W = t(6100),
				X = t.n(W),
				I = t(4672),
				z = t(9689),
				Y = t.n(z),
				J = function(e) {
					var n = e.title,
						t = e.children;
					return (0, f.jsxs)("div", {
						className: Y().container,
						children: [(0, f.jsx)("strong", {
							className: Y().controlTitle,
							children: n
						}), (0, f.jsx)("div", {
							className: Y().control,
							children: t
						})]
					})
				}, q = t(5039),
				Q = t(5038),
				ee = t.n(Q),
				en = function(e) {
					var n = e.checked,
						t = e.onCheckedChange;
					return (0, f.jsx)(q.fC, {
						className: ee().switchRoot,
						checked: n,
						onCheckedChange: t,
						children: (0, f.jsx)(q.bU, {
							className: ee().switchThumb
						})
					})
				}, et = function() {
					var e = (0, d.Z)((0, x.KO)(C.nf), 2),
						n = e[0],
						t = e[1];
					return (0, I.Z)("b", function() {
						t(function(e) {
							return !e
						})
					}), (0, f.jsx)(J, {
						title: "背景颜色",
						children: (0, f.jsx)(en, {
							checked: n,
							onCheckedChange: t
						})
					})
				}, er = function() {
					var e = (0, d.Z)((0, x.KO)(v.H_), 2),
						n = e[0],
						t = e[1],
						r = (0, w.useCallback)(function() {
							return t(function(e) {
								return !e
							})
						}, [t]);
					return (0, I.Z)("d", r), (0, f.jsx)(J, {
						title: "深色模式",
						children: (0, f.jsx)(en, {
							checked: n,
							onCheckedChange: t
						})
					})
				}, eo = t(7568),
				ea = t(655),
				es = t(7927);

			function e$() {
				return (e$ = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var ei = function(e) {
				return w.createElement("svg", e$({
					width: 16,
					height: 16,
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), o || (o = w.createElement("path", {
					d: "m2 12.5 2.306-2.76a1.025 1.025 0 0 1 1.605.028v0a1.735 1.735 0 0 0 2.68.07l2.147-2.48c.36-.415.97-.478 1.404-.144L14.5 9.028M4 14.5h8.5a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v8.5a2 2 0 0 0 2 2Z",
					stroke: "currentColor",
					strokeWidth: 1.5,
					strokeLinecap: "round",
					strokeLinejoin: "round"
				})), a || (a = w.createElement("path", {
					d: "M5.5 5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z",
					stroke: "currentColor",
					strokeLinecap: "round",
					strokeLinejoin: "round"
				})))
			};

			function ec() {
				return (ec = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var el = function(e) {
				return w.createElement("svg", ec({
					width: 16,
					height: 16,
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), s || (s = w.createElement("path", {
					d: "M4.25 7.75 2.539 9.654a2.692 2.692 0 1 0 3.807 3.807L8.25 11.75m3.5-3.5 1.711-1.904A2.692 2.692 0 1 0 9.654 2.54L7.75 4.25m-1 5 2.5-2.5",
					stroke: "currentColor",
					strokeWidth: 1.5,
					strokeLinecap: "round",
					strokeLinejoin: "round"
				})))
			};

			function e_() {
				return (e_ = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var eu = function(e) {
				return w.createElement("svg", e_({
					viewBox: "0 0 13 12",
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), $ || ($ = w.createElement("path", {
					d: "M6.5 3.567a.609.609 0 0 0-.443.2L2.44 7.471a.542.542 0 0 0-.162.395.56.56 0 0 0 .562.567.58.58 0 0 0 .41-.172l3.246-3.337 3.257 3.337c.11.105.252.172.41.172a.56.56 0 0 0 .56-.567.542.542 0 0 0-.161-.395L6.938 3.767a.589.589 0 0 0-.438-.2Z",
					fill: "currentColor"
				})))
			};

			function e0() {
				return (e0 = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var eh, ed, e3, e2 = function(e) {
					return w.createElement("svg", e0({
						width: 16,
						height: 16,
						fill: "none",
						xmlns: "http://www.w3.org/2000/svg"
					}, e), i || (i = w.createElement("path", {
						d: "M6.075 2.75H4.75a2 2 0 0 0-2 2v7.5a2 2 0 0 0 2 2h6.5a2 2 0 0 0 2-2v-7.5a2 2 0 0 0-2-2H9.925m-.04.275-.292 1.023A1.657 1.657 0 0 1 8 5.25v0c-.74 0-1.39-.49-1.593-1.202l-.293-1.023a1 1 0 0 1 .962-1.275h1.848a1 1 0 0 1 .962 1.275Z",
						stroke: "currentColor",
						strokeWidth: 1.5,
						strokeLinecap: "round",
						strokeLinejoin: "round"
					})))
				}, e4 = function(e, n) {
					var t = document.createElement("a");
					t.download = n, t.href = e, t.click()
				}, e1 = t(6293),
				ef = {
					filter: function(e) {
						var n;
						return "TEXTAREA" !== e.tagName && !(null === (n = e.dataset) || void 0 === n ? void 0 : n.ignoreInExport)
					},
					pixelRatio: 2,
					skipAutoScale: !0
				}, e5 = (eh = (0, eo.Z)(function(e) {
					return (0, ea.__generator)(this, function(n) {
						return [2, (0, e1.YM)(e, ef)]
					})
				}), function(e) {
					return eh.apply(this, arguments)
				}),
				e6 = (ed = (0, eo.Z)(function(e) {
					return (0, ea.__generator)(this, function(n) {
						return [2, (0, e1.SE)(e, ef)]
					})
				}), function(e) {
					return ed.apply(this, arguments)
				}),
				ep = (e3 = (0, eo.Z)(function(e) {
					return (0, ea.__generator)(this, function(n) {
						return [2, (0, e1.KT)(e, ef)]
					})
				}), function(e) {
					return e3.apply(this, arguments)
				}),
				em = t(3159),
				ex = t.n(em),
				e7 = function() {
					var e, n, t, r, o, a = (0, w.useState)(!1),
						s = a[0],
						$ = a[1],
						i = (n = (e = (0, w.useState)(!1))[0], t = e[1], (0, w.useEffect)(function() {
							t(window.navigator && window.navigator.clipboard && "function" == typeof ClipboardItem)
						}, []), n),
						c = (0, w.useContext)(b),
						l = (0, d.Z)((0, x.KO)(T), 2)[1],
						_ = (0, d.Z)((0, x.KO)(R), 2)[1],
						u = (r = (0, eo.Z)(function() {
							var e, n;
							return (0, ea.__generator)(this, function(t) {
								switch (t.label) {
									case 0:
										if (!(null == c ? void 0 : c.current)) throw Error("找不到要导出的框架");
										return l(((e = {}).icon = (0, f.jsx)(ei, {}), e.message = "正在导出 PNG", e)), [4, e5(c.current)];
									case 1:
										return e4(n = t.sent(), "sxiaw.com.png"), _(!1), [2]
								}
							})
						}), function() {
							return r.apply(this, arguments)
						}),
						h = function() {
							l({
								icon: (0, f.jsx)(e2, {}),
								message: "正在复制 PNG"
							}), navigator.clipboard.write([new ClipboardItem({
								"image/png": new Promise(function(e) {
									if (!(null == c ? void 0 : c.current)) throw Error("找不到要导出的框架");
									e6(c.current).then(function(n) {
										if (!n) throw Error("预期toBlob返回blob");
										e(n), l({
											icon: (0, f.jsx)(e2, {}),
											message: "PNG图片 已复制到剪贴板！",
											timeout: 2e3
										})
									})
								})
							}), ])
						}, p = (o = (0, eo.Z)(function() {
							var e, n;
							return (0, ea.__generator)(this, function(t) {
								switch (t.label) {
									case 0:
										if (!(null == c ? void 0 : c.current)) throw Error("找不到要导出的框架");
										return l(((e = {}).icon = (0, f.jsx)(ei, {}), e.message = "正在导出 SVG", e)), [4, ep(c.current)];
									case 1:
										return e4(n = t.sent(), "sxiaw.com.svg"), _(!1), [2]
								}
							})
						}), function() {
							return o.apply(this, arguments)
						}),
						m = function(e) {
							return function(n) {
								n.preventDefault(), e(), $(!1)
							}
						}, v = function(e) {
							e.preventDefault(), u()
						}, g = function() {
							return navigator.clipboard.writeText(window.location.toString())
						};
					return (0, I.Z)("ctrl+s,cmd+s", function(e) {
						e.preventDefault(), u()
					}), (0, I.Z)("ctrl+c,cmd+c", function(e) {
						i && (e.preventDefault(), h())
					}), (0, I.Z)("ctrl+shift+c,cmd+shift+c", function(e) {
						e.preventDefault(), g()
					}), (0, I.Z)("ctrl+shift+s,cmd+shift+s", function(e) {
						e.preventDefault(), p()
					}), (0, f.jsxs)("div", {
						className: ex().container,
						children: [(0, f.jsx)("button", {
							onClick: v,
							className: ex().button,
							"aria-label": "导出 PNG",
							children: "导出"
						}), (0, f.jsxs)(es.fC, {
							open: s,
							onOpenChange: $,
							children: [(0, f.jsx)(es.xz, {
								asChild: !0,
								children: (0, f.jsx)("button", {
									className: y()(ex().button, ex().small),
									"aria-label": "请参阅其他导出选项",
									children: (0, f.jsx)(eu, {})
								})
							}), (0, f.jsx)(es.h_, {
								children: (0, f.jsxs)(es.VY, {
									className: ex().popover,
									sideOffset: 5,
									side: "top",
									children: [(0, f.jsxs)("a", {
										href: "#",
										onClick: m(u),
										className: ex().option,
										children: [(0, f.jsx)(ei, {}), "保存 PNG"]
									}), (0, f.jsxs)("a", {
										href: "#",
										className: ex().option,
										onClick: m(p),
										children: [(0, f.jsx)(ei, {}), "保存 SVG"]
									}), i && (0, f.jsxs)("a", {
										href: "#",
										className: ex().option,
										onClick: m(h),
										children: [(0, f.jsx)(e2, {}), "复制图片"]
									}), (0, f.jsxs)("a", {
										href: "#",
										className: ex().option,
										onClick: m(g),
										children: [(0, f.jsx)(el, {}), "复制 URL"]
									})]
								})
							})]
						})]
					})
				}, ev = t(7009),
				eg = t(18),
				ej = t(5859),
				e8 = t(5198),
				ey = t.n(e8),
				ew = function() {
					var e = (0, w.useState)(!1),
						n = e[0],
						t = e[1],
						r = (0, d.Z)((0, x.KO)(eg.RH), 2),
						o = r[0],
						a = r[1],
						s = (0, d.Z)((0, x.KO)(eg.E$), 1)[0];
					return (0, I.Z)("l", function(e) {
						e.preventDefault(), n || t(!0)
					}), (0, f.jsx)(J, {
						title: "语言",
						children: (0, f.jsxs)(ev.fC, {
							open: n,
							onOpenChange: function(e) {
								return t(e)
							},
							value: (null == o ? void 0 : o.name) || "auto-detect",
							onValueChange: function(e) {
								"auto-detect" === e ? a(null) : a(Object.values(ej.a).find(function(n) {
									return n.name === e
								}))
							},
							children: [(0, f.jsxs)(ev.xz, {
								className: ey().trigger,
								children: [(0, f.jsx)(ev.B4, {
									children: (0, f.jsxs)("span", {
										style: {
											display: "block",
											textAlign: "start",
											overflow: "hidden",
											textOverflow: "ellipsis",
											whiteSpace: "nowrap",
											width: "100px"
										},
										children: [(null == o ? void 0 : o.name) || "auto-detect", s ? " (auto)" : ""]
									})
								}), (0, f.jsx)(ev.JO, {
									className: ey().icon,
									children: (0, f.jsx)(eu, {})
								})]
							}), (0, f.jsx)(ev.h_, {
								children: (0, f.jsx)(ev.VY, {
									className: ey().content,
									children: (0, f.jsxs)(ev.l_, {
										className: ey().viewport,
										children: [(0, f.jsx)(ev.ck, {
											value: "auto-detect",
											className: ey().item,
											children: (0, f.jsx)(ev.S_, {
												children: "Auto-Detect"
											})
										}), Object.values(ej.a).map(function(e, n) {
											return (0, f.jsx)(ev.ck, {
												value: e.name,
												className: ey().item,
												children: (0, f.jsx)(ev.S_, {
													children: e.name
												})
											}, n)
										})]
									})
								})
							})]
						})
					})
				}, ek = t(5772),
				eN = t(4172),
				eC = t.n(eN),
				eb = function() {
					var e = (0, d.Z)((0, x.KO)(E.XM), 2),
						n = e[0],
						t = e[1];
					return (0, I.Z)("p", function(e) {
						console.info(e.target);
						var r = E.gN.indexOf(n);
						E.gN[r + 1] ? t(E.gN[r + 1]) : t(E.gN[0])
					}), (0, f.jsx)(J, {
						title: "填充",
						children: (0, f.jsx)(ek.fC, {
							className: eC().toggleGroup,
							type: "single",
							value: "".concat(n),
							"aria-label": "画面填充",
							onValueChange: function(e) {
								var n = parseInt(e, 10);
								(0, E.XW)(n) && t(n)
							},
							children: E.gN.map(function(e) {
								return (0, f.jsx)(ek.ck, {
									className: eC().toggleGroupItem,
									value: "".concat(e),
									"aria-label": "".concat(e),
									children: e
								}, e)
							})
						})
					})
				}, eZ = t(6042),
				eE = t(9396),
				eS = t(4327),
				eL = w.forwardRef(function(e, n) {
					var t = e.children,
						r = (0, eS.Z)(e, ["children"]);
					return (0, f.jsxs)(ev.fC, (0, eE.Z)((0, eZ.Z)({}, r), {
						children: [(0, f.jsxs)(ev.xz, {
							ref: n,
							className: ey().trigger,
							children: [(0, f.jsx)(ev.B4, {}), (0, f.jsx)(ev.JO, {
								className: ey().icon,
								children: (0, f.jsx)(eu, {})
							})]
						}), (0, f.jsx)(ev.h_, {
							children: (0, f.jsx)(ev.VY, {
								className: ey().content,
								children: (0, f.jsx)(ev.l_, {
									className: ey().viewport,
									children: t
								})
							})
						})]
					}))
				});
			eL.displayName = "Select";
			var eO = w.forwardRef(function(e, n) {
				var t = e.children,
					r = (0, eS.Z)(e, ["children"]);
				return (0, f.jsx)(ev.ck, (0, eE.Z)((0, eZ.Z)({}, r), {
					ref: n,
					className: ey().item,
					children: t
				}))
			});
			eO.displayName = "SelectItem";
			var eP = t(1848),
				eK = t.n(eP),
				eR = function() {
					var e = (0, d.Z)((0, x.KO)(v.Oj), 2),
						n = e[0],
						t = e[1];
					return (0, I.Z)("c", function() {
						var e = Object.values(v.yU).indexOf(n);
						Object.values(v.yU)[e + 1] ? t(Object.values(v.yU)[e + 1]) : t(Object.values(v.yU)[0])
					}), (0, f.jsx)(J, {
						title: "主题样式",
						children: (0, f.jsx)(eL, {
							value: "".concat(n.name),
							onValueChange: function(e) {
								t(Object.values(v.yU).find(function(n) {
									return n.name === e
								}))
							},
							children: Object.values(v.yU).map(function(e, n) {
								return (0, f.jsxs)(eO, {
									value: e.name,
									children: [(0, f.jsx)(ev.S_, {
										children: (0, f.jsx)("span", {
											className: eK().themePreview,
											style: {
												backgroundImage: "linear-gradient(140deg, ".concat(e.background.from, ", ").concat(e.background.to, ")")
											}
										})
									}), e.name]
								}, n)
							})
						})
					})
				}, eT = function() {
					return (0, f.jsxs)("div", {
						className: X().controls,
						children: [(0, f.jsx)(eR, {}), (0, f.jsx)(et, {}), (0, f.jsx)(er, {}), (0, f.jsx)(eb, {}), (0, f.jsx)(ew, {}), (0, f.jsx)(e7, {})]
					})
				}, eM = t(1528),
				eB = t(7094),
				eA = t.n(eB);

			function eF() {
				return (eF = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var eH = function(e) {
				return w.createElement("svg", eF({
					width: 16,
					height: 16,
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), c || (c = w.createElement("path", {
					d: "M8 4.75v-3m0 3H3.75a2 2 0 0 0-2 2v5.5a2 2 0 0 0 2 2h8.5a2 2 0 0 0 2-2v-5.5a2 2 0 0 0-2-2H8Zm-2.25 6.5h4.5m-5.5-3h.5m2.5 0h.5m2.5 0h.5",
					stroke: "currentColor",
					strokeWidth: 1.5,
					strokeLinecap: "round",
					strokeLinejoin: "round"
				})))
			};

			function eD() {
				return (eD = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var eV = function(e) {
				return w.createElement("svg", eD({
					viewBox: "0 0 16 16",
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), l || (l = w.createElement("path", {
					d: "m4.75 4.75 6.5 6.5m0-6.5-6.5 6.5",
					stroke: "currentColor",
					strokeWidth: 1.5,
					strokeLinecap: "round",
					strokeLinejoin: "round"
				})))
			}, eG = function(e) {
					var n = e.children,
						t = e.keys;
					return (0, f.jsxs)(f.Fragment, {
						children: [(0, f.jsx)("div", {
							children: n
						}), (0, f.jsx)("div", {
							className: eA().keys,
							children: t.map(function(e) {
								return (0, f.jsx)("span", {
									className: eA().key,
									children: e
								}, e)
							})
						})]
					})
				}, eU = function() {
					var e = (0, w.useState)(!1),
						n = e[0],
						t = e[1],
						r = (0, w.useCallback)(function() {
							return t(function(e) {
								return !e
							})
						}, [t]);
					return (0, I.Z)("shift+/", r), (0, f.jsx)(f.Fragment, {
						children: (0, f.jsx)("div", {
							className: eA().container,
							children: (0, f.jsxs)(eM.fC, {
								open: n,
								onOpenChange: t,
								children: [(0, f.jsx)(eM.xz, {
									asChild: !0,
									children: (0, f.jsxs)("button", {
										className: eA().anchor,
										children: [(0, f.jsx)(eH, {}), "键盘快捷键"]
									})
								}), (0, f.jsxs)(eM.h_, {
									children: [(0, f.jsx)(eM.aV, {
										className: eA().overlay
									}), (0, f.jsxs)(eM.VY, {
										className: eA().popover,
										children: [(0, f.jsx)(eM.Dx, {
											className: eA().dialogTitle,
											children: "键盘快捷键"
										}), (0, f.jsxs)("div", {
											className: eA().shortcuts,
											children: [(0, f.jsx)(eG, {
												keys: ["F"],
												children: "焦点文本编辑器"
											}), (0, f.jsx)(eG, {
												keys: ["Esc"],
												children: "展开文本编辑器"
											}), (0, f.jsx)(eG, {
												keys: ["C"],
												children: "改变颜色"
											}), (0, f.jsx)(eG, {
												keys: ["B"],
												children: "切换背景"
											}), (0, f.jsx)(eG, {
												keys: ["D"],
												children: "切换暗模式"
											}), (0, f.jsx)(eG, {
												keys: ["P"],
												children: "更改填充"
											}), (0, f.jsx)(eG, {
												keys: ["L"],
												children: "查询语言"
											}), (0, f.jsx)(eG, {
												keys: ["⌘", "S"],
												children: "保存PNG"
											}), (0, f.jsx)(eG, {
												keys: ["⌘", "shift", "S"],
												children: "保存SVG"
											}), (0, f.jsx)(eG, {
												keys: ["⌘", "C"],
												children: "复制图片"
											}), (0, f.jsx)(eG, {
												keys: ["⌘", "shift", "C"],
												children: "复制 URL"
											}), (0, f.jsx)(eG, {
												keys: ["?"],
												children: "打开快捷方式"
											})]
										}), (0, f.jsx)(eM.x8, {
											asChild: !0,
											children: (0, f.jsx)("button", {
												className: eA().closeButton,
												"aria-label": "关闭",
												children: (0, f.jsx)(eV, {})
											})
										})]
									})]
								})]
							})
						})
					})
				};

			function eW() {
				return (eW = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var eX = function(e) {
				return w.createElement("svg", eW({
					width: 85,
					height: 22,
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e) )
			};

			function eI() {
				return (eI = Object.assign ? Object.assign.bind() : function(e) {
					for (var n = 1; n < arguments.length; n++) {
						var t = arguments[n];
						for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r])
					}
					return e
				}).apply(this, arguments)
			}
			var ez = function(e) {
				return w.createElement("svg", eI({
					viewBox: "0 0 16 16",
					fill: "none",
					xmlns: "http://www.w3.org/2000/svg"
				}, e), h || (h = w.createElement("path", {
					d: "m6.232 3.757 6.187-.176m0 0-.176 6.187m.176-6.187-8.838 8.838",
					stroke: "currentColor",
					strokeWidth: 1.5,
					strokeLinecap: "round",
					strokeLinejoin: "round"
				})))
			}, eY = t(214),
				eJ = t.n(eY),
				eq = t(5152),
				eQ = t.n(eq),
				e9 = function(e) {
					var n = e.children;
					return (0, f.jsx)(w.Fragment, {
						children: n
					})
				}, ne = eQ()(function() {
					return Promise.resolve(e9)
				}, {
					ssr: !1
				}),
				nn = "".concat("ray-so-v2-c6p4l6o9o-raycastapp.vercel.app").concat("/_next/static/media/cover-photo.331cb248.png"),
				nt = function() {
					var e = (0, d.Z)((0, x.KO)(v.H_), 1)[0];
					return (0, f.jsxs)(f.Fragment, {
						children: [(0, f.jsxs)(m(), {
							children: [(0, f.jsx)("title", {
								children: "代码转图片，代码生成图片，各种语言代码转图片"
							}), (0, f.jsx)("link", {
								rel: "shortcut icon",
								href: "/favicon.png"
							}), (0, f.jsx)("meta", {
								name: "title",
								content: "代码转图片，代码生成图片，各种语言代码转图片"
							}), (0, f.jsx)("meta", {
								name: "description",
								content: "将代码转换为美丽的图像。从一系列语法颜色中进行选择，隐藏或显示背景，并在深色和浅色窗口之间切换."
							}), (0, f.jsx)("meta", {
								property: "og:type",
								content: "website"
							}), (0, f.jsx)("meta", {
								property: "og:url",
								content: "https://www.sxiaw.com/"
							}), (0, f.jsx)("meta", {
								property: "og:title",
								content: "sxiaw.com - 代码转图片，代码生成图片，各种语言代码转图片"
							}), (0, f.jsx)("meta", {
								property: "og:description",
								content: "将代码转换为美丽的图像。从一系列语法颜色中进行选择，隐藏或显示背景，并在深色和浅色窗口之间切换."
							}), (0, f.jsx)("meta", {
								property: "og:image",
								content: nn
							}), (0, f.jsx)("meta", {
								property: "twitter:card",
								content: "summary_large_image"
							}), (0, f.jsx)("meta", {
								property: "twitter:url",
								content: "https://www.sxiaw.com/"
							}), (0, f.jsx)("meta", {
								property: "twitter:title",
								content: "sxiaw.com - C代码转图片，代码生成图片，各种语言代码转图片"
							}), (0, f.jsx)("meta", {
								property: "twitter:description",
								content: "将代码转换为美丽的图像。从一系列语法颜色中进行选择，隐藏或显示背景，并在深色和浅色窗口之间切换."
							}), (0, f.jsx)("meta", {
								property: "twitter:image",
								content: nn
							}), (0, f.jsx)("meta", {
								name: "keywords",
								content: "generate, create, convert, source, code, snippet, image, picture, share, export"
							})]
						}), (0, f.jsxs)("div", {
							"data-theme": e ? "dark" : "light",
							className: eJ().app,
							children: [(0, f.jsx)(eU, {}), (0, f.jsx)(ne, {
								children: (0, f.jsxs)(Z, {
									children: [(0, f.jsx)(U, {}), (0, f.jsx)(eT, {})]
								})
							}), (0, f.jsxs)("div", {
								className: eJ().footer,
								children: [(0, f.jsxs)("a", {
									href: "mailto:2010409646@qq.com",
									className: eJ().footerLink,
									children: ["联系我们", (0, f.jsx)(ez, {})]
								}), (0, f.jsxs)("a", {
									href: "https://www.sxiaw.com",
									target: "_blank",
									className: eJ().footerLink,
									rel: "noreferrer",
									children: ["返回硕夏网", (0, f.jsx)(ez, {})]
								})]
							})]
						})]
					})
				}
		},
		9689: function(e) {
			e.exports = {
				container: "ControlContainer_container__x_T7_",
				controlTitle: "ControlContainer_controlTitle__qtDEZ",
				control: "ControlContainer_control__GLDPu"
			}
		},
		6100: function(e) {
			e.exports = {
				controls: "Controls_controls__kwzcE"
			}
		},
		3159: function(e) {
			e.exports = {
				container: "ExportButton_container__KRFXe",
				button: "ExportButton_button__d___t",
				small: "ExportButton_small__wEA7u",
				popover: "ExportButton_popover__5YO6w",
				option: "ExportButton_option__pZueK"
			}
		},
		4908: function(e) {
			e.exports = {
				container: "FlashMessage_container__9JU3x",
				flash: "FlashMessage_flash__KCy2A",
				enter: "FlashMessage_enter__XVHF5",
				enterActive: "FlashMessage_enterActive__As3Hm",
				exit: "FlashMessage_exit__JZrjR",
				exitActive: "FlashMessage_exitActive__28ixe"
			}
		},
		214: function(e) {
			e.exports = {
				app: "Home_app__dQwNI",
				footer: "Home_footer____T7K",
				footerLink: "Home_footerLink__yxvET",
				madeBy: "Home_madeBy__V0zPS",
				logoLink: "Home_logoLink__2UYfL"
			}
		},
		7094: function(e) {
			e.exports = {
				container: "KeyboardShortcutsPanel_container__3eU1O",
				anchor: "KeyboardShortcutsPanel_anchor__xBrwB",
				overlay: "KeyboardShortcutsPanel_overlay__5h2Q6",
				overlayShow: "KeyboardShortcutsPanel_overlayShow__bICFP",
				popover: "KeyboardShortcutsPanel_popover__orsm0",
				contentShow: "KeyboardShortcutsPanel_contentShow__OWL9t",
				dialogTitle: "KeyboardShortcutsPanel_dialogTitle__hCTes",
				closeButton: "KeyboardShortcutsPanel_closeButton__R_L_R",
				shortcuts: "KeyboardShortcutsPanel_shortcuts__uYhxP",
				keys: "KeyboardShortcutsPanel_keys__KqZ4n",
				key: "KeyboardShortcutsPanel_key__0TfjL"
			}
		},
		4172: function(e) {
			e.exports = {
				toggleGroup: "PaddingControl_toggleGroup__XOcw7",
				toggleGroupItem: "PaddingControl_toggleGroupItem__dDs6N"
			}
		},
		5198: function(e) {
			e.exports = {
				trigger: "Select_trigger__HExyy",
				icon: "Select_icon__EBYxO",
				content: "Select_content__XScL_",
				viewport: "Select_viewport__tlvUS",
				item: "Select_item__N4dGh"
			}
		},
		1848: function(e) {
			e.exports = {
				themePreview: "ThemeControl_themePreview__0Wrk2"
			}
		},
		5038: function(e) {
			e.exports = {
				switchRoot: "Toggle_switchRoot__BeTtP",
				switchThumb: "Toggle_switchThumb__Iw0WB"
			}
		}
	},
	function(e) {
		e.O(0, [832, 705, 96, 774, 888, 179], function() {
			return e(e.s = 8312)
		}), _N_E = e.O()
	}
]);