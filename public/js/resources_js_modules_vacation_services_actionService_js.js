"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_modules_vacation_services_actionService_js"],{

/***/ "./resources/js/modules/vacation/services/actionService.js":
/*!*****************************************************************!*\
  !*** ./resources/js/modules/vacation/services/actionService.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var _storage_endpoints__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @storage/endpoints */ "./resources/js/storage/endpoints.js");
/* harmony import */ var _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @composables/notifyService */ "./resources/js/composables/notifyService.js");
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }




var actionService = function actionService() {
  var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)({});
  var aiProcess = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(id) {
      var url, _error$response$data$, _error, response, _error$response$data$2, _error$response, _t;
      return _regenerator().w(function (_context) {
        while (1) switch (_context.p = _context.n) {
          case 0:
            url = _storage_endpoints__WEBPACK_IMPORTED_MODULE_2__.endpoints.vacation.aiProcess + id;
            _context.p = 1;
            _context.n = 2;
            return axios__WEBPACK_IMPORTED_MODULE_1__["default"].post(url);
          case 2:
            response = _context.v;
            if (!(response.status == 200)) {
              _context.n = 3;
              break;
            }
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].success('ИИ начал обработку!');
            return _context.a(2, true);
          case 3:
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].error((_error$response$data$ = (_error = error) === null || _error === void 0 || (_error = _error.response) === null || _error === void 0 || (_error = _error.data) === null || _error === void 0 ? void 0 : _error.message) !== null && _error$response$data$ !== void 0 ? _error$response$data$ : 'Что-то пошло не так!');
            return _context.a(2, false);
          case 4:
            _context.p = 4;
            _t = _context.v;
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].error((_error$response$data$2 = _t === null || _t === void 0 || (_error$response = _t.response) === null || _error$response === void 0 || (_error$response = _error$response.data) === null || _error$response === void 0 ? void 0 : _error$response.message) !== null && _error$response$data$2 !== void 0 ? _error$response$data$2 : 'Произошла ошибка при обработке ИИ!');
            return _context.a(2, false);
        }
      }, _callee, null, [[1, 4]]);
    }));
    return function aiProcess(_x) {
      return _ref.apply(this, arguments);
    };
  }();
  var hunterApply = /*#__PURE__*/function () {
    var _ref2 = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee2(formData) {
      var url, _error$response$data$3, _error2, response, _error$response$data$4, _error$response2, _t2;
      return _regenerator().w(function (_context2) {
        while (1) switch (_context2.p = _context2.n) {
          case 0:
            url = _storage_endpoints__WEBPACK_IMPORTED_MODULE_2__.endpoints.vacation.hunterApply;
            _context2.p = 1;
            _context2.n = 2;
            return axios__WEBPACK_IMPORTED_MODULE_1__["default"].post(url, formData);
          case 2:
            response = _context2.v;
            if (!(response.status == 200)) {
              _context2.n = 3;
              break;
            }
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].success('Отклик отправлен!');
            return _context2.a(2, true);
          case 3:
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].error((_error$response$data$3 = (_error2 = error) === null || _error2 === void 0 || (_error2 = _error2.response) === null || _error2 === void 0 || (_error2 = _error2.data) === null || _error2 === void 0 ? void 0 : _error2.message) !== null && _error$response$data$3 !== void 0 ? _error$response$data$3 : 'Что-то пошло не так!');
            return _context2.a(2, false);
          case 4:
            _context2.p = 4;
            _t2 = _context2.v;
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].error((_error$response$data$4 = _t2 === null || _t2 === void 0 || (_error$response2 = _t2.response) === null || _error$response2 === void 0 || (_error$response2 = _error$response2.data) === null || _error$response2 === void 0 ? void 0 : _error$response2.message) !== null && _error$response$data$4 !== void 0 ? _error$response$data$4 : 'Произошла ошибка при отклике!');
            return _context2.a(2, false);
        }
      }, _callee2, null, [[1, 4]]);
    }));
    return function hunterApply(_x2) {
      return _ref2.apply(this, arguments);
    };
  }();
  var sendForm = /*#__PURE__*/function () {
    var _ref3 = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee3(id, data) {
      var url, formData, response, _error$response$data$5, _error$response3, _t3;
      return _regenerator().w(function (_context3) {
        while (1) switch (_context3.p = _context3.n) {
          case 0:
            url = id ? "".concat(_storage_endpoints__WEBPACK_IMPORTED_MODULE_2__.endpoints.vacation.crud).concat(id, "/") : _storage_endpoints__WEBPACK_IMPORTED_MODULE_2__.endpoints.vacation.crud;
            formData = new FormData();
            Object.entries(data).forEach(function (_ref4) {
              var _ref5 = _slicedToArray(_ref4, 2),
                key = _ref5[0],
                value = _ref5[1];
              if (value !== null && value !== undefined) {
                formData.append(key, value);
              }
            });
            if (id) {
              formData.append('_method', 'PUT');
            }
            _context3.p = 1;
            _context3.n = 2;
            return axios__WEBPACK_IMPORTED_MODULE_1__["default"].post(url, formData);
          case 2:
            response = _context3.v;
            if (!(response.status === 200 || response.status === 201)) {
              _context3.n = 3;
              break;
            }
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].success('Успешно!');
            return _context3.a(2, true);
          case 3:
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].error('Ошибка сервера');
            return _context3.a(2, false);
          case 4:
            _context3.p = 4;
            _t3 = _context3.v;
            _composables_notifyService__WEBPACK_IMPORTED_MODULE_3__["default"].error((_error$response$data$5 = _t3 === null || _t3 === void 0 || (_error$response3 = _t3.response) === null || _error$response3 === void 0 || (_error$response3 = _error$response3.data) === null || _error$response3 === void 0 ? void 0 : _error$response3.message) !== null && _error$response$data$5 !== void 0 ? _error$response$data$5 : 'Ошибка отправки');
            return _context3.a(2, false);
        }
      }, _callee3, null, [[1, 4]]);
    }));
    return function sendForm(_x3, _x4) {
      return _ref3.apply(this, arguments);
    };
  }();
  return {
    aiProcess: aiProcess,
    hunterApply: hunterApply,
    sendForm: sendForm
  };
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (actionService);

/***/ })

}]);