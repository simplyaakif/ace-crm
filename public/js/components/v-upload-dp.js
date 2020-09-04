(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["v-upload-dp"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-upload-dp.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/misc/v-upload-dp.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _enso_ui_toastr_bulma__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @enso-ui/toastr/bulma */ "./node_modules/@enso-ui/toastr/bulma/index.js");
/* harmony import */ var _enso_ui_toastr__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @enso-ui/toastr */ "./node_modules/@enso-ui/toastr/index.js");
//
//
//
//
//
//


Vue.use(_enso_ui_toastr__WEBPACK_IMPORTED_MODULE_1__["default"], {
  layout: _enso_ui_toastr_bulma__WEBPACK_IMPORTED_MODULE_0__["default"],
  options: {
    duration: 3500,
    position: 'top-center'
  }
});
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      dpUrl: ''
    };
  },
  props: {
    id: Number
  },
  mounted: function mounted() {
    var _this = this;

    EventHub.listen('file_selected', function (data) {
      _this.dpUrl = data;
    });
  },
  methods: {
    uploadDp: function uploadDp() {
      var _this2 = this;

      if (this.dpUrl === '') {
        this.$toastr.warning('Kindly select image first.');
        return null;
      }

      this.$http.post('/student/dp', {
        id: this.id,
        url: this.dpUrl
      }).then(function (res) {
        _this2.$toastr.success(res.data);
      })["catch"](function (error) {
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-upload-dp.vue?vue&type=template&id=137b01e9&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/misc/v-upload-dp.vue?vue&type=template&id=137b01e9& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "text-center" }, [
    _c(
      "button",
      { staticClass: "button is-success", on: { click: _vm.uploadDp } },
      [_vm._v("Save")]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/misc/v-upload-dp.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/misc/v-upload-dp.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _v_upload_dp_vue_vue_type_template_id_137b01e9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./v-upload-dp.vue?vue&type=template&id=137b01e9& */ "./resources/js/components/misc/v-upload-dp.vue?vue&type=template&id=137b01e9&");
/* harmony import */ var _v_upload_dp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./v-upload-dp.vue?vue&type=script&lang=js& */ "./resources/js/components/misc/v-upload-dp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _v_upload_dp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _v_upload_dp_vue_vue_type_template_id_137b01e9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _v_upload_dp_vue_vue_type_template_id_137b01e9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/misc/v-upload-dp.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/misc/v-upload-dp.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/misc/v-upload-dp.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_upload_dp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-upload-dp.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-upload-dp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_upload_dp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/misc/v-upload-dp.vue?vue&type=template&id=137b01e9&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/misc/v-upload-dp.vue?vue&type=template&id=137b01e9& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_upload_dp_vue_vue_type_template_id_137b01e9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-upload-dp.vue?vue&type=template&id=137b01e9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/misc/v-upload-dp.vue?vue&type=template&id=137b01e9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_upload_dp_vue_vue_type_template_id_137b01e9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_upload_dp_vue_vue_type_template_id_137b01e9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);