(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["v-batches"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdacademics/v-batches.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/vdacademics/v-batches.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_switches__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-switches */ "./node_modules/vue-switches/src/switches.vue");
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-multiselect */ "./node_modules/vue-multiselect/dist/vue-multiselect.min.js");
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_multiselect__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vuejs_datepicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js");
/* harmony import */ var vue_ctk_date_time_picker__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-ctk-date-time-picker */ "./node_modules/vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.common.js");
/* harmony import */ var vue_ctk_date_time_picker__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_ctk_date_time_picker__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var vue_ctk_date_time_picker_dist_vue_ctk_date_time_picker_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css */ "./node_modules/vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css");
/* harmony import */ var vue_ctk_date_time_picker_dist_vue_ctk_date_time_picker_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vue_ctk_date_time_picker_dist_vue_ctk_date_time_picker_css__WEBPACK_IMPORTED_MODULE_4__);
//
//
//
//
//





Vue.component('VueCtkDateTimePicker', vue_ctk_date_time_picker__WEBPACK_IMPORTED_MODULE_3___default.a);
Vue.component('multiselect', vue_multiselect__WEBPACK_IMPORTED_MODULE_1___default.a);
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Switches: vue_switches__WEBPACK_IMPORTED_MODULE_0__["default"],
    Datepicker: vuejs_datepicker__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      batch: {
        id: '',
        name: '',
        startDate: '',
        endDate: '',
        course: '',
        strength: '',
        session_type: '',
        instructor_name: '',
        class_time: '',
        comments: '',
        days: {
          mon: false,
          tue: false,
          wed: false,
          thu: false,
          fri: false,
          sat: false,
          sun: false
        }
      },
      batch_id: '',
      edit: false,
      editMode: false,
      createMode: true
    };
  },
  props: {
    courses: Array,
    batches: Array
  },
  methods: {
    goBack: function goBack() {
      this.editMode = false;
      this.edit = false;
    },
    newbatch: function newbatch() {
      this.editMode = true;
      this.edit = false;
      this.batch.id = '';
      this.batch.name = '';
      this.batch.startDate = '';
      this.batch.endDate = '';
      this.batch.course = '';
      this.batch.strength = '';
      this.batch.session_type = '';
      this.batch.instructor_name = '';
      this.batch.class_time = '';
      this.batch.comments = '';
      this.batch.days.mon = false;
      this.batch.days.tue = false;
      this.batch.days.wed = false;
      this.batch.days.thu = false;
      this.batch.days.fri = false;
      this.batch.days.sat = false;
      this.batch.days.sun = false;
    },
    editbatch: function editbatch(batchid) {
      var _this = this;

      this.editMode = true;
      this.edit = true;
      fetch("api/batches/" + batchid).then(function (res) {
        return res.json();
      }).then(function (data) {
        console.log(data);
        _this.batch.name = data.b_name;
        _this.batch.startDate = data.b_startDate;
        _this.batch.endDate = data.b_endDate;
        _this.batch.course = data.course_id;
        _this.batch.strength = data.b_strength;
        _this.batch.instructor_name = data.instructor_id;
      })["catch"](function (err) {
        return console.log(err);
      });
    },
    deletebatch: function deletebatch(id) {
      var _this2 = this;

      if (confirm('Are You Sure?')) {
        fetch("api/batches/".concat(id), {
          method: 'delete',
          headers: {
            "content-type": "application/json",
            "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
          }
        }).then(function (res) {
          return res.json();
        }).then(function (data) {
          alert('batch Removed');

          _this2.fetchData();

          window.location.href = window.location.href;
        })["catch"](function (err) {
          return console.log(err);
        });
      }
    },
    addbatch: function addbatch() {
      var _this3 = this;

      if (this.edit === false) {
        // Add
        fetch('api/batches', {
          method: 'post',
          body: JSON.stringify(this.batch),
          headers: {
            'content-type': 'application/json',
            "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
          }
        }).then(function (res) {
          return res.json();
        }).then(function (data) {
          _this3.batch.batch_name = '';
          _this3.batch.batch_duration = '';
          _this3.batch.batch_fee = '';
          _this3.batch.batch_comments = '';
          alert('Batch Added');

          _this3.fetchData();
        })["catch"](function (err) {
          return console.log(err);
        });
      } else {
        // Update
        fetch('api/batches', {
          method: 'put',
          body: JSON.stringify(this.batch),
          headers: {
            'content-type': 'application/json',
            "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
          }
        }).then(function (res) {
          return res.json();
        }).then(function (data) {
          _this3.batch.batch_name = '';
          _this3.batch.batch_duration = '';
          _this3.batch.batch_fee = '';
          _this3.batch.batch_comments = '';
          alert('batch Updated');

          _this3.fetchData();
        })["catch"](function (err) {
          return console.log(err);
        });
      }

      this.editMode = false;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdacademics/v-batches.vue?vue&type=template&id=496a3a65&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/vdacademics/v-batches.vue?vue&type=template&id=496a3a65& ***!
  \************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { attrs: { id: "queryPage" } }, [_vm._v("np")])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/vdacademics/v-batches.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/vdacademics/v-batches.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _v_batches_vue_vue_type_template_id_496a3a65___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./v-batches.vue?vue&type=template&id=496a3a65& */ "./resources/js/components/vdacademics/v-batches.vue?vue&type=template&id=496a3a65&");
/* harmony import */ var _v_batches_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./v-batches.vue?vue&type=script&lang=js& */ "./resources/js/components/vdacademics/v-batches.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _v_batches_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _v_batches_vue_vue_type_template_id_496a3a65___WEBPACK_IMPORTED_MODULE_0__["render"],
  _v_batches_vue_vue_type_template_id_496a3a65___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/vdacademics/v-batches.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/vdacademics/v-batches.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/vdacademics/v-batches.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_batches_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-batches.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdacademics/v-batches.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_batches_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/vdacademics/v-batches.vue?vue&type=template&id=496a3a65&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/vdacademics/v-batches.vue?vue&type=template&id=496a3a65& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_batches_vue_vue_type_template_id_496a3a65___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-batches.vue?vue&type=template&id=496a3a65& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdacademics/v-batches.vue?vue&type=template&id=496a3a65&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_batches_vue_vue_type_template_id_496a3a65___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_batches_vue_vue_type_template_id_496a3a65___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);