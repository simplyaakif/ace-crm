(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["v-student"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-student.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/misc/v-student.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      studentData: {}
    };
  },
  props: {
    student: Object
  },
  methods: {
    openModal: function openModal() {
      var _this = this;

      this.$swal({
        title: "Loading Record",
        onOpen: function onOpen() {
          _this.$swal.showLoading();
        }
      });
      this.loadStudents();
      this.$swal.close();
      $('#modelId' + this.student.id).modal();
    },
    loadStudents: function () {
      var _loadStudents = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var _this2 = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return fetch('misc/load-student-data', {
                  method: 'post',
                  body: JSON.stringify(this.student),
                  headers: {
                    'content-type': 'application/json',
                    "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
                  }
                }).then(function (res) {
                  return res.json();
                }).then(function (data) {
                  _this2.studentData = data;
                })["catch"](function (err) {
                  return console.log(err);
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function loadStudents() {
        return _loadStudents.apply(this, arguments);
      }

      return loadStudents;
    }()
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-student.vue?vue&type=template&id=389a6de8&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/misc/v-student.vue?vue&type=template&id=389a6de8& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("span", { staticClass: "tx-gray-600", on: { click: _vm.openModal } }, [
      _c("i", { staticClass: "icon ion-more tx-18 lh-0" })
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: {
          id: "modelId" + this.student.id,
          tabindex: "-1",
          role: "dialog",
          "aria-labelledby": "modelTitleId",
          "aria-hidden": "true"
        }
      },
      [
        _c(
          "div",
          { staticClass: "modal-dialog modal-lg", attrs: { role: "document" } },
          [
            _c("div", { staticClass: "modal-content" }, [
              _c("div", { staticClass: "modal-body bg-gray-200" }, [
                _c("div", { staticClass: "row" }, [
                  _vm._m(0),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-9" }, [
                    _c("div", { staticClass: "card" }, [
                      _c("img", {
                        staticClass: "card-img-top",
                        attrs: { src: "", alt: "" }
                      }),
                      _vm._v(" "),
                      _c("div", { staticClass: "card-body" }, [
                        _c("h3", { staticClass: "card-title" }, [
                          _vm._v("Profile Information")
                        ]),
                        _vm._v(" "),
                        _c("ul", { staticClass: "list-unstyled" }, [
                          _c("li", [
                            _vm._v(
                              "\n                                            Student Name: " +
                                _vm._s(_vm.studentData.a_name) +
                                "\n                                        "
                            )
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v(
                              "\n                                            Father Name:\n                                            " +
                                _vm._s(_vm.studentData.a_father_name) +
                                "\n                                        "
                            )
                          ]),
                          _vm._v(" "),
                          _c("li", [
                            _vm._v(
                              "\n                                            Date of Birth\n                                        "
                            )
                          ]),
                          _vm._v(" "),
                          _c("li"),
                          _vm._v(" "),
                          _c("li")
                        ])
                      ])
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _vm._m(1)
            ])
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "card" }, [
        _c("img", {
          staticClass: "img-fluid rounded-circle",
          attrs: { src: "http://via.placeholder.com/280x280", alt: "" }
        })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer bg-gray-200" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-secondary rounded-circle",
          attrs: { type: "button", "data-dismiss": "modal" }
        },
        [_vm._v("x")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/misc/v-student.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/misc/v-student.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _v_student_vue_vue_type_template_id_389a6de8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./v-student.vue?vue&type=template&id=389a6de8& */ "./resources/js/components/misc/v-student.vue?vue&type=template&id=389a6de8&");
/* harmony import */ var _v_student_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./v-student.vue?vue&type=script&lang=js& */ "./resources/js/components/misc/v-student.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _v_student_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _v_student_vue_vue_type_template_id_389a6de8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _v_student_vue_vue_type_template_id_389a6de8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/misc/v-student.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/misc/v-student.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/misc/v-student.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_student_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-student.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-student.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_student_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/misc/v-student.vue?vue&type=template&id=389a6de8&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/misc/v-student.vue?vue&type=template&id=389a6de8& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_student_vue_vue_type_template_id_389a6de8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-student.vue?vue&type=template&id=389a6de8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-student.vue?vue&type=template&id=389a6de8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_student_vue_vue_type_template_id_389a6de8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_student_vue_vue_type_template_id_389a6de8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);