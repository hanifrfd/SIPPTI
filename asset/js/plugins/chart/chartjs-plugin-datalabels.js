/*!
 * @license
 * chartjs-plugin-datalabels
 * http://chartjs.org/
 * Version: 0.3.0
 *
 * Copyright 2018 Chart.js Contributors
 * Released under the MIT license
 * https://github.com/chartjs/chartjs-plugin-datalabels/blob/master/LICENSE.md
 */
! function(t, e) {
	"object" == typeof exports && "undefined" != typeof module ? e(require("chart.js")) : "function" == typeof define && define.amd ? define(["chart.js"], e) : e(t.Chart)
}(this, function(l) {
	"use strict";
	var t = (l = l && l.hasOwnProperty("default") ? l.default : l).helpers,
		i = function() {
			this._rect = null, this._rotation = 0
		};
	t.extend(i.prototype, {
		update: function(t, e, n) {
			var a = t.x,
				r = t.y,
				i = a + e.x,
				o = r + e.y;
			this._rotation = n, this._rect = {
				x0: i - 1,
				y0: o - 1,
				x1: i + e.w + 2,
				y1: o + e.h + 2,
				cx: a,
				cy: r
			}
		},
		contains: function(t, e) {
			var n, a, r, i, o, l = this._rect;
			return !!l && (n = l.cx, a = l.cy, r = this._rotation, i = n + (t - n) * Math.cos(r) + (e - a) * Math.sin(r), o = a - (t - n) * Math.sin(r) + (e - a) * Math.cos(r), !(i < l.x0 || o < l.y0 || i > l.x1 || o > l.y1))
		}
	});
	var r = l.helpers,
		g = {
			toTextLines: function(t) {
				var e, n = [];
				for (t = [].concat(t); t.length;) "string" == typeof(e = t.pop()) ? n.unshift.apply(n, e.split("\n")) : Array.isArray(e) ? t.push.apply(t, e) : r.isNullOrUndef(t) || n.unshift("" + e);
				return n
			},
			toFontString: function(t) {
				return !t || r.isNullOrUndef(t.size) || r.isNullOrUndef(t.family) ? null : (t.style ? t.style + " " : "") + (t.weight ? t.weight + " " : "") + t.size + "px " + t.family
			},
			textSize: function(t, e, n) {
				var a, r = [].concat(e),
					i = r.length,
					o = t.font,
					l = 0;
				for (t.font = n.string, a = 0; a < i; ++a) l = Math.max(t.measureText(r[a]).width, l);
				return t.font = o, {
					height: i * n.lineHeight,
					width: l
				}
			},
			parseFont: function(t) {
				var e = l.defaults.global,
					n = r.valueOrDefault(t.size, e.defaultFontSize),
					a = {
						family: r.valueOrDefault(t.family, e.defaultFontFamily),
						lineHeight: r.options.toLineHeight(t.lineHeight, n),
						size: n,
						style: r.valueOrDefault(t.style, e.defaultFontStyle),
						weight: r.valueOrDefault(t.weight, null),
						string: ""
					};
				return a.string = g.toFontString(a), a
			},
			bound: function(t, e, n) {
				return Math.max(t, Math.min(e, n))
			},
			arrayDiff: function(t, e) {
				var n, a, r, i, o = t.slice(),
					l = [];
				for (n = 0, r = e.length; n < r; ++n) i = e[n], -1 === (a = o.indexOf(i)) ? l.push([i, 1]) : o.splice(a, 1);
				for (n = 0, r = o.length; n < r; ++n) l.push([o[n], -1]);
				return l
			}
		};

	function u(t, e) {
		var n = e.x,
			a = e.y;
		if (null === n) return {
			x: 0,
			y: -1
		};
		if (null === a) return {
			x: 1,
			y: 0
		};
		var r = t.x - n,
			i = t.y - a,
			o = Math.sqrt(r * r + i * i);
		return {
			x: o ? r / o : 0,
			y: o ? i / o : -1
		}
	}

	function d(t, e, n, a, r) {
		switch (r) {
			case "center":
				n = a = 0;
				break;
			case "bottom":
				n = 0, a = 1;
				break;
			case "right":
				n = 1, a = 0;
				break;
			case "left":
				n = -1, a = 0;
				break;
			case "top":
				n = 0, a = -1;
				break;
			case "start":
				n = -n, a = -a;
				break;
			case "end":
				break;
			default:
				r *= Math.PI / 180, n = Math.cos(r), a = Math.sin(r)
		}
		return {
			x: t,
			y: e,
			vx: n,
			vy: a
		}
	}
	var s = {
			arc: function(t, e, n) {
				var a, r = (t.startAngle + t.endAngle) / 2,
					i = Math.cos(r),
					o = Math.sin(r),
					l = t.innerRadius,
					s = t.outerRadius;
				return a = "start" === e ? l : "end" === e ? s : (l + s) / 2, d(t.x + i * a, t.y + o * a, i, o, n)
			},
			point: function(t, e, n, a) {
				var r = u(t, a),
					i = t.radius,
					o = 0;
				return "start" === e ? o = -i : "end" === e && (o = i), d(t.x + r.x * o, t.y + r.y * o, r.x, r.y, n)
			},
			rect: function(t, e, n, a) {
				var r = t.horizontal,
					i = Math.abs(t.base - (r ? t.x : t.y)),
					o = r ? Math.min(t.x, t.base) : t.x,
					l = r ? t.y : Math.min(t.y, t.base),
					s = u(t, a);
				return "center" === e ? r ? o += i / 2 : l += i / 2 : "start" !== e || r ? "end" === e && r && (o += i) : l += i, d(o, l, s.x, s.y, n)
			},
			fallback: function(t, e, n, a) {
				var r = u(t, a);
				return d(t.x, t.y, r.x, r.y, n)
			}
		},
		v = l.helpers;
	var b = function(t, e, n, a) {
		var r = this;
		r._hitbox = new i, r._config = t, r._index = a, r._model = null, r._ctx = e, r._el = n
	};
	v.extend(b.prototype, {
		_modelize: function(t, e, n) {
			var a, r = this._index,
				i = v.options.resolve,
				o = g.parseFont(i([e.font, {}], n, r));
			return {
				align: i([e.align, "center"], n, r),
				anchor: i([e.anchor, "center"], n, r),
				backgroundColor: i([e.backgroundColor, null], n, r),
				borderColor: i([e.borderColor, null], n, r),
				borderRadius: i([e.borderRadius, 0], n, r),
				borderWidth: i([e.borderWidth, 0], n, r),
				color: i([e.color, l.defaults.global.defaultFontColor], n, r),
				font: o,
				lines: t,
				offset: i([e.offset, 0], n, r),
				opacity: i([e.opacity, 1], n, r),
				origin: function(t) {
					var e = t._model.horizontal,
						n = t._scale || e && t._xScale || t._yScale;
					if (!n) return null;
					if (void 0 !== n.xCenter && void 0 !== n.yCenter) return {
						x: n.xCenter,
						y: n.yCenter
					};
					var a = n.getBasePixel();
					return e ? {
						x: a,
						y: null
					} : {
						x: null,
						y: a
					}
				}(this._el),
				padding: v.options.toPadding(i([e.padding, 0], n, r)),
				positioner: (a = this._el, a instanceof l.elements.Arc ? s.arc : a instanceof l.elements.Point ? s.point : a instanceof l.elements.Rectangle ? s.rect : s.fallback),
				rotation: i([e.rotation, 0], n, r) * (Math.PI / 180),
				size: g.textSize(this._ctx, t, o),
				textAlign: i([e.textAlign, "start"], n, r)
			}
		},
		update: function(t) {
			var e, n, a, r = null,
				i = this._index,
				o = this._config;
			v.options.resolve([o.display, !0], t, i) && (e = t.dataset.data[i], n = v.valueOrDefault(v.callback(o.formatter, [e, t]), e), r = (a = v.isNullOrUndef(n) ? [] : g.toTextLines(n)).length ? this._modelize(a, o, t) : null), this._model = r
		},
		draw: function(t) {
			var e, n, a, r, i, o, l, s, u, d, f, c, h, y, x = this._model;
			x && x.opacity && (a = x.size, r = x.padding, i = a.height, o = a.width, s = -i / 2, e = {
				frame: {
					x: (l = -o / 2) - r.left,
					y: s - r.top,
					w: o + r.width,
					h: i + r.height
				},
				text: {
					x: l,
					y: s,
					w: o,
					h: i
				}
			}, n = function(t, e, n) {
				var a = e.positioner(t._view, e.anchor, e.align, e.origin),
					r = a.vx,
					i = a.vy;
				if (!r && !i) return {
					x: a.x,
					y: a.y
				};
				var o = e.borderWidth || 0,
					l = n.w + 2 * o,
					s = n.h + 2 * o,
					u = e.rotation,
					d = Math.abs(l / 2 * Math.cos(u)) + Math.abs(s / 2 * Math.sin(u)),
					f = Math.abs(l / 2 * Math.sin(u)) + Math.abs(s / 2 * Math.cos(u)),
					c = 1 / Math.max(Math.abs(r), Math.abs(i));
				return d *= r * c, f *= i * c, d += e.offset * r, f += e.offset * i, {
					x: a.x + d,
					y: a.y + f
				}
			}(this._el, x, e.frame), this._hitbox.update(n, e.frame, x.rotation), t.save(), t.globalAlpha = g.bound(0, x.opacity, 1), t.translate(Math.round(n.x), Math.round(n.y)), t.rotate(x.rotation), u = t, d = e.frame, c = (f = x).backgroundColor, h = f.borderColor, y = f.borderWidth, (c || h && y) && (u.beginPath(), v.canvas.roundedRect(u, Math.round(d.x) - y / 2, Math.round(d.y) - y / 2, Math.round(d.w) + y, Math.round(d.h) + y, f.borderRadius), u.closePath(), c && (u.fillStyle = c, u.fill()), h && y && (u.strokeStyle = h, u.lineWidth = y, u.lineJoin = "miter", u.stroke())), function(t, e, n, a) {
				var r, i, o, l = a.textAlign,
					s = a.font.lineHeight,
					u = a.color,
					d = e.length;
				if (d && u)
					for (r = n.x, i = n.y + s / 2, "center" === l ? r += n.w / 2 : "end" !== l && "right" !== l || (r += n.w), t.font = a.font.string, t.fillStyle = u, t.textAlign = l, t.textBaseline = "middle", o = 0; o < d; ++o) t.fillText(e[o], Math.round(r), Math.round(i), Math.round(n.w)), i += s
			}(t, x.lines, e.text, x), t.restore())
		},
		contains: function(t, e) {
			return this._hitbox.contains(t, e)
		}
	});
	var o = l.helpers,
		e = {
			align: "center",
			anchor: "center",
			backgroundColor: null,
			borderColor: null,
			borderRadius: 0,
			borderWidth: 0,
			color: void 0,
			display: !0,
			font: {
				family: void 0,
				lineHeight: 1.2,
				size: void 0,
				style: void 0,
				weight: null
			},
			offset: 4,
			opacity: 1,
			padding: {
				top: 4,
				right: 4,
				bottom: 4,
				left: 4
			},
			rotation: 0,
			textAlign: "start",
			formatter: function(t) {
				if (o.isNullOrUndef(t)) return null;
				var e, n, a, r = t;
				if (o.isObject(t))
					if (o.isNullOrUndef(t.label))
						if (o.isNullOrUndef(t.r))
							for (r = "", a = 0, n = (e = Object.keys(t)).length; a < n; ++a) r += (0 !== a ? ", " : "") + e[a] + ": " + t[e[a]];
						else r = t.r;
				else r = t.label;
				return "" + r
			},
			listeners: {}
		},
		p = l.helpers,
		m = "$datalabels";

	function a(t, e) {
		var n, a, r = t.getDatasetMeta(e).data || [],
			i = r.length;
		for (n = 0; n < i; ++n)(a = r[n][m]) && a.draw(t.ctx)
	}

	function c(t, e, n) {
		var a, r, i, o, l = t[m].labels;
		for (a = l.length - 1; 0 <= a; --a)
			for (r = (i = l[a] || []).length - 1; 0 <= r; --r)
				if ((o = i[r]).contains(e, n)) return {
					dataset: a,
					label: o
				};
		return null
	}

	function h(t, e, n) {
		var a = e && e[n.dataset];
		if (a) {
			var r = n.label,
				i = r.$context;
			!0 === p.callback(a, [i]) && (t[m].dirty = !0, r.update(i))
		}
	}

	function f(t, e) {
		var n, a, r = t[m],
			i = r.listeners;
		if (i.enter || i.leave) {
			if ("mousemove" === e.type) a = c(t, e.x, e.y);
			else if ("mouseout" !== e.type) return;
			var o, l, s, u, d, f;
			n = r.hovered, r.hovered = a, o = t, l = i, u = a, ((s = n) || u) && (s ? u ? s.label !== u.label && (f = d = !0) : f = !0 : d = !0, f && h(o, l.leave, s), d && h(o, l.enter, u))
		}
	}
	l.defaults.global.plugins.datalabels = e, l.defaults.global.plugins.datalabels = e, l.plugins.register({
		id: "datalabels",
		beforeInit: function(t) {
			t[m] = {
				actives: []
			}
		},
		beforeUpdate: function(t) {
			var e = t[m];
			e.listened = !1, e.listeners = {}, e.labels = []
		},
		afterDatasetUpdate: function(t, a, e) {
			var n, r, i, o, l, s = a.index,
				u = t[m],
				d = u.labels[s] = [],
				f = t.data.datasets[s],
				c = (n = e, !1 === (r = f.datalabels) ? null : (!0 === r && (r = {}), p.merge({}, [n, r]))),
				h = a.meta.data || [],
				y = h.length,
				x = t.ctx;
			for (x.save(), i = 0; i < y; ++i) !(o = h[i]) || o.hidden || o._model.skip ? l = null : (d.push(l = new b(c, x, o, i)), l.update(l.$context = {
				active: !1,
				chart: t,
				dataIndex: i,
				dataset: f,
				datasetIndex: s
			})), o[m] = l;
			x.restore(), p.merge(u.listeners, c.listeners || {}, {
				merger: function(t, e, n) {
					e[t] = e[t] || {}, e[t][a.index] = n[t], u.listened = !0
				}
			})
		},
		afterDatasetsDraw: function(t) {
			for (var e = 0, n = t.data.datasets.length; e < n; ++e) a(t, e)
		},
		beforeEvent: function(t, e) {
			if (t[m].listened) switch (e.type) {
				case "mousemove":
				case "mouseout":
					f(t, e);
					break;
				case "click":
					a = e, r = (n = t)[m].listeners.click, (i = r && c(n, a.x, a.y)) && h(n, r, i)
			}
			var n, a, r, i
		},
		afterEvent: function(t) {
			var e, n, a, r, i = t[m],
				o = i.actives,
				l = i.actives = t.lastActive || [],
				s = g.arrayDiff(o, l);
			for (e = 0, n = s.length; e < n; ++e)(a = s[e])[1] && ((r = a[0][m]).$context.active = 1 === a[1], r.update(r.$context));
			!i.dirty && !s.length || t.animating || t.render(), delete i.dirty
		}
	})
});