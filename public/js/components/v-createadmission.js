(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["v-createadmission"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************/
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
/* harmony import */ var v_mask__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! v-mask */ "./node_modules/v-mask/dist/v-mask.esm.js");
/* harmony import */ var vue_sweetalert2__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue-sweetalert2 */ "./node_modules/vue-sweetalert2/dist/index.js");
/* harmony import */ var sweetalert2_dist_sweetalert2_min_css__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! sweetalert2/dist/sweetalert2.min.css */ "./node_modules/sweetalert2/dist/sweetalert2.min.css");
/* harmony import */ var sweetalert2_dist_sweetalert2_min_css__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(sweetalert2_dist_sweetalert2_min_css__WEBPACK_IMPORTED_MODULE_7__);
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
//
//
//








Vue.use(vue_sweetalert2__WEBPACK_IMPORTED_MODULE_6__["default"]);
Vue.use(v_mask__WEBPACK_IMPORTED_MODULE_5__["default"]);
Vue.component('VueCtkDateTimePicker', vue_ctk_date_time_picker__WEBPACK_IMPORTED_MODULE_3___default.a);
Vue.component('multiselect', vue_multiselect__WEBPACK_IMPORTED_MODULE_1___default.a);
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Switches: vue_switches__WEBPACK_IMPORTED_MODULE_0__["default"],
    Datepicker: vuejs_datepicker__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      submitDisable: false,
      admissionDetails: {
        name: '',
        father: '',
        gender: '',
        nationality: '',
        place_of_birth: '',
        first_language: '',
        dob: '',
        cnic: '',
        mobile: '',
        email: '',
        phone: '',
        address: ''
      },
      guardian: {
        name: '',
        mobile: '',
        email: '',
        relation: '',
        cnic: '',
        occupation_type: '',
        occupation_designation: ''
      },
      currentCourse: this.batches[0],
      studentBat: [],
      sendSms: false,
      sendMail: false
    };
  },
  updated: function updated() {// console.log(this.studentBat[0]);
    // this.currentCourse = this.studentBat[0];
  },
  props: {
    batches: Array
  },
  methods: {
    newAdmission: function newAdmission() {
      var _this = this;

      var saveTrue = false;
      this.submitDisable = true;

      if (this.admissionDetails.name && this.admissionDetails.mobile) {
        var j, k;

        if (this.studentBat.length === 0) {
          this.$swal("Error", "No batch selected for the student", "info");
          this.submitDisable = false;
          return null;
        }

        for (j = 0; j < this.studentBat.length; j++) {
          if (this.studentBat[j].start_date && this.studentBat[j].end_date && this.studentBat[j].totalRem === 0) {
            for (k = 0; k < this.studentBat[j].installmentrows.length; k++) {
              if (this.studentBat[j].installmentrows[k].instDueDate) {
                saveTrue = true;
              } else {
                this.$swal("Error", "Installment due date is missing", "info");
                this.submitDisable = false;
                return null;
              }
            }
          } else {
            this.$swal("Error", "Either batch details are missing or Installment total is wrong.", "info");
            this.submitDisable = false;
            return null;
          }
        }
      } else {
        this.$swal("Error", "One of the required field is missing in Student Data.", "info");
        this.submitDisable = false;
        return null;
      }

      if (saveTrue) {
        this.submitDisable = true;
        this.$swal({
          title: "Creating Admission",
          onOpen: function onOpen() {
            _this.$swal.showLoading();
          }
        });
        var transaction = {
          admissionInfo: this.admissionDetails,
          guardianInfo: this.guardian,
          studentBat: this.studentBat,
          sms: this.sendSms,
          mail: this.sendMail
        };
        fetch("create-admission", {
          method: "post",
          body: JSON.stringify(transaction),
          headers: {
            "content-type": "application/json",
            "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
          }
        }).then(function (res) {
          return res.json();
        }).then(function (data) {
          _this.$swal.close();

          _this.$swal("Completed", "Query Added Successfully", "success");

          _this.clear();
        })["catch"](function (err) {
          console.log(err);
        });
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }
    },
    clear: function clear() {
      Object.assign(this.$data, this.$options.data.call(this));
    },
    batchlabel: function batchlabel(_ref) {
      var b_name = _ref.b_name,
          b_timings = _ref.b_timings,
          b_session_type = _ref.b_session_type,
          c_fee = _ref.c_fee;
      return "".concat(b_name, " at ").concat(b_timings, " - [").concat(b_session_type, "] - ").concat(c_fee, "Rs");
    },
    bRemain: function bRemain(k) {
      var index = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
      var val = 0,
          i;

      for (i = 0; i < this.studentBat[k].installmentrows.length; i++) {
        val += parseInt(this.studentBat[k].installmentrows[i].instAmount, 10); // console.log(val);
      }

      this.studentBat[k].totalRem = this.studentBat[k].course_fee - val; // return this.studentBat[k].course_fee - val;
    },
    addInstRow: function addInstRow(k) {
      if (this.studentBat[k].installmentrows.length < 3) {
        var index = this.studentBat[k].installmentrows.length - 1;
        this.studentBat[k].installmentrows.push({
          instAmount: this.studentBat[k].totalRem,
          instDueDate: '',
          instFeeStatus: 0,
          slip: ''
        });
      }

      this.bRemain(k);
    },
    deleteInstRow: function deleteInstRow(k, idx) {
      this.studentBat[k].installmentrows.splice(idx, 1);
      var val = 0,
          i;

      for (i = 0; i < this.studentBat[k].installmentrows.length; i++) {
        val += parseInt(this.studentBat[k].installmentrows[i].instAmount, 10); // console.log(val);
      }

      this.studentBat[k].totalRem = this.studentBat[k].course_fee - val;
    },
    addBatRow: function addBatRow(k) {
      this.studentBat.push({
        course_name: this.currentCourse.b_name,
        course_fee: this.currentCourse.c_fee,
        start_date: this.currentCourse.b_startDate,
        end_date: this.currentCourse.b_endDate,
        bat_id: this.currentCourse.id,
        installmentrows: [{
          instAmount: this.currentCourse.c_fee,
          instDueDate: '',
          instFeeStatus: 0,
          slip: ''
        }],
        totalRem: 0
      });
    },
    deleteBatRow: function deleteBatRow(idx) {
      this.studentBat.splice(idx, 1);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=template&id=7cf635ac&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=template&id=7cf635ac& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "form-layout form-layout-1" }, [
      _c("div", { staticClass: "row mg-b-25" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(1),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.name,
                  expression: "admissionDetails.name"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Candidate Name" },
              domProps: { value: _vm.admissionDetails.name },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "name", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Father's Name: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.father,
                  expression: "admissionDetails.father"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Father's Name" },
              domProps: { value: _vm.admissionDetails.father },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "father", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c(
            "div",
            { staticClass: "form-group" },
            [
              _c("label", { staticClass: "form-control-label" }, [
                _vm._v("Gender:")
              ]),
              _vm._v(" "),
              _c("multiselect", {
                attrs: {
                  options: ["Male", "Female"],
                  searchable: false,
                  "close-on-select": true,
                  placeholder: "Pick a gender"
                },
                model: {
                  value: _vm.admissionDetails.gender,
                  callback: function($$v) {
                    _vm.$set(_vm.admissionDetails, "gender", $$v)
                  },
                  expression: "admissionDetails.gender"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Nationality")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.nationality,
                  expression: "admissionDetails.nationality"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Nationality" },
              domProps: { value: _vm.admissionDetails.nationality },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(
                    _vm.admissionDetails,
                    "nationality",
                    $event.target.value
                  )
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Place of Birth: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.place_of_birth,
                  expression: "admissionDetails.place_of_birth"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Place of Birth" },
              domProps: { value: _vm.admissionDetails.place_of_birth },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(
                    _vm.admissionDetails,
                    "place_of_birth",
                    $event.target.value
                  )
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("First Language: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.first_language,
                  expression: "admissionDetails.first_language"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter First Language" },
              domProps: { value: _vm.admissionDetails.first_language },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(
                    _vm.admissionDetails,
                    "first_language",
                    $event.target.value
                  )
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c(
            "div",
            { staticClass: "form-group" },
            [
              _c("label", { staticClass: "form-control-label" }, [
                _vm._v("Date of Birth ")
              ]),
              _vm._v(" "),
              _c("datepicker", {
                attrs: {
                  "clear-button": true,
                  typeable: true,
                  placeholder: "Date of Birth",
                  "wrapper-class": "form-control setupDate"
                },
                model: {
                  value: _vm.admissionDetails.dob,
                  callback: function($$v) {
                    _vm.$set(_vm.admissionDetails, "dob", $$v)
                  },
                  expression: "admissionDetails.dob"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("CNIC Number")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "mask",
                  rawName: "v-mask",
                  value: "#####-#######-#",
                  expression: "'#####-#######-#'"
                },
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.cnic,
                  expression: "admissionDetails.cnic"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter CNIC Number" },
              domProps: { value: _vm.admissionDetails.cnic },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "cnic", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _vm._m(2),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(3),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "mask",
                  rawName: "v-mask",
                  value: "####-#######",
                  expression: "'####-#######'"
                },
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.mobile,
                  expression: "admissionDetails.mobile"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Mobile Number" },
              domProps: { value: _vm.admissionDetails.mobile },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "mobile", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(4),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.email,
                  expression: "admissionDetails.email"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "email",
                name: "email",
                placeholder: "Enter Email Address"
              },
              domProps: { value: _vm.admissionDetails.email },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "email", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Phone Number: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.phone,
                  expression: "admissionDetails.phone"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Phone Number" },
              domProps: { value: _vm.admissionDetails.phone },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "phone", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Address: ")
            ]),
            _vm._v(" "),
            _c("textarea", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.admissionDetails.address,
                  expression: "admissionDetails.address"
                }
              ],
              staticClass: "form-control",
              attrs: { cols: "30", rows: "10" },
              domProps: { value: _vm.admissionDetails.address },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.admissionDetails, "address", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _vm._m(5),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Name: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.name,
                  expression: "guardian.name"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Name" },
              domProps: { value: _vm.guardian.name },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.guardian, "name", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Relationship: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.relation,
                  expression: "guardian.relation"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Relationship" },
              domProps: { value: _vm.guardian.relation },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.guardian, "relation", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("CNIC #: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "mask",
                  rawName: "v-mask",
                  value: "#####-#######-#",
                  expression: "'#####-#######-#'"
                },
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.cnic,
                  expression: "guardian.cnic"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter CNIC Number" },
              domProps: { value: _vm.guardian.cnic },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.guardian, "cnic", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-6" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Occupation Type")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.occupation_type,
                  expression: "guardian.occupation_type"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Occupation Type" },
              domProps: { value: _vm.guardian.occupation_type },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.guardian, "occupation_type", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-6" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Occupation Designation")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.occupation_designation,
                  expression: "guardian.occupation_designation"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "text",
                placeholder: "Enter Occupation Designation"
              },
              domProps: { value: _vm.guardian.occupation_designation },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(
                    _vm.guardian,
                    "occupation_designation",
                    $event.target.value
                  )
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Mobile Number: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "mask",
                  rawName: "v-mask",
                  value: "####-#######",
                  expression: "'####-#######'"
                },
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.mobile,
                  expression: "guardian.mobile"
                }
              ],
              staticClass: "form-control",
              attrs: { type: "text", placeholder: "Enter Mobile Number" },
              domProps: { value: _vm.guardian.mobile },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.guardian, "mobile", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Email address: ")
            ]),
            _vm._v(" "),
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.guardian.email,
                  expression: "guardian.email"
                }
              ],
              staticClass: "form-control",
              attrs: {
                type: "email",
                name: "email",
                placeholder: "Enter Email Address"
              },
              domProps: { value: _vm.guardian.email },
              on: {
                input: function($event) {
                  if ($event.target.composing) {
                    return
                  }
                  _vm.$set(_vm.guardian, "email", $event.target.value)
                }
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-lg-12 bg-gray-100 pb-3" },
          [
            _c("hr"),
            _vm._v(" "),
            _c("h5", [_vm._v("Batch & Finance Details")]),
            _vm._v(" "),
            _c("hr"),
            _vm._v(" "),
            _c("div", { staticClass: "row mb-2" }, [
              _c(
                "div",
                { staticClass: "col-md-10" },
                [
                  _c("multiselect", {
                    attrs: {
                      options: _vm.batches,
                      "deselect-label": "Can't remove this value",
                      label: "b_name",
                      "track-by": "id",
                      searchable: false,
                      "custom-label": _vm.batchlabel,
                      "allow-empty": false,
                      "preselect-first": true,
                      placeholder: "Add Batches"
                    },
                    model: {
                      value: _vm.currentCourse,
                      callback: function($$v) {
                        _vm.currentCourse = $$v
                      },
                      expression: "currentCourse"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-2" }, [
                _c(
                  "button",
                  { staticClass: "btn btn-teal", on: { click: _vm.addBatRow } },
                  [_vm._v("Add New Batch")]
                )
              ])
            ]),
            _vm._v(" "),
            _vm._l(_vm.studentBat, function(bat, k) {
              return _c("div", { key: k, staticClass: "card my-3" }, [
                _c("div", { staticClass: "card-body" }, [
                  _c(
                    "h4",
                    {
                      staticClass: "card-title d-flex justify-content-between"
                    },
                    [
                      _vm._v(
                        _vm._s(bat.course_name) +
                          " -\n                            "
                      ),
                      _c(
                        "span",
                        {
                          on: {
                            click: function($event) {
                              return _vm.deleteBatRow(k)
                            }
                          }
                        },
                        [
                          _c("i", {
                            staticClass: "fa fa-trash",
                            attrs: { "aria-hidden": "true" }
                          })
                        ]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("hr"),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _vm._m(6, true),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: bat.course_fee,
                              expression: "bat.course_fee"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: { type: "text" },
                          domProps: { value: bat.course_fee },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(bat, "course_fee", $event.target.value)
                            }
                          }
                        })
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _vm._m(7, true),
                          _vm._v(" "),
                          _c("VueCtkDateTimePicker", {
                            attrs: {
                              "minute-interval": "15",
                              label: "Select Start Date",
                              color: "#138496",
                              format: "YYYY-MM-DD",
                              "only-date": true,
                              formatted: "DD MMM YYYY"
                            },
                            model: {
                              value: bat.start_date,
                              callback: function($$v) {
                                _vm.$set(bat, "start_date", $$v)
                              },
                              expression: "bat.start_date"
                            }
                          })
                        ],
                        1
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-lg-4" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _vm._m(8, true),
                          _vm._v(" "),
                          _c("VueCtkDateTimePicker", {
                            attrs: {
                              "minute-interval": "15",
                              label: "Select End Date",
                              color: "#138496",
                              format: "YYYY-MM-DD",
                              "only-date": true,
                              formatted: "DD MMM YYYY"
                            },
                            model: {
                              value: bat.end_date,
                              callback: function($$v) {
                                _vm.$set(bat, "end_date", $$v)
                              },
                              expression: "bat.end_date"
                            }
                          })
                        ],
                        1
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "h4",
                    {
                      staticClass: "card-title d-flex justify-content-between"
                    },
                    [_vm._v("Fee - Installments")]
                  ),
                  _vm._v(" "),
                  _c("hr"),
                  _vm._v(" "),
                  _c("table", { staticClass: "table table-stripped" }, [
                    _vm._m(9, true),
                    _vm._v(" "),
                    _c("tfoot", [
                      _c("tr", [
                        _c("th"),
                        _vm._v(" "),
                        _c("th"),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v("Required InstallmentAmount Remaining")
                        ]),
                        _vm._v(" "),
                        _c("th", [_vm._v(_vm._s(bat.totalRem))]),
                        _vm._v(" "),
                        _c("th"),
                        _vm._v(" "),
                        _c("th")
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(bat.installmentrows, function(single, index) {
                        return _c("tr", { key: index }, [
                          _c("td", [
                            _vm._v(
                              "\n                                    " +
                                _vm._s(index + 1) +
                                "\n                                "
                            )
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: single.instAmount,
                                  expression: "single.instAmount"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: { type: "text", value: "22500" },
                              domProps: { value: single.instAmount },
                              on: {
                                keyup: function($event) {
                                  return _vm.bRemain(k, index)
                                },
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    single,
                                    "instAmount",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ]),
                          _vm._v(" "),
                          _c(
                            "td",
                            [
                              _c("VueCtkDateTimePicker", {
                                attrs: {
                                  required: "",
                                  "minute-interval": "15",
                                  label: "Select End Date",
                                  color: "#138496",
                                  format: "YYYY-MM-DD",
                                  "only-date": true,
                                  formatted: "DD MMM YYYY"
                                },
                                model: {
                                  value: single.instDueDate,
                                  callback: function($$v) {
                                    _vm.$set(single, "instDueDate", $$v)
                                  },
                                  expression: "single.instDueDate"
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c("td", [
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: single.instFeeStatus,
                                    expression: "single.instFeeStatus"
                                  }
                                ],
                                staticClass: "form-control",
                                attrs: { name: "", id: "" },
                                on: {
                                  change: function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.$set(
                                      single,
                                      "instFeeStatus",
                                      $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    )
                                  }
                                }
                              },
                              [
                                _c("option", { attrs: { value: "0" } }, [
                                  _vm._v("Not Paid")
                                ]),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "1" } }, [
                                  _vm._v("Paid")
                                ])
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: single.slip,
                                  expression: "single.slip"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                disabled: single.instFeeStatus == 0,
                                type: "text"
                              },
                              domProps: { value: single.slip },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(single, "slip", $event.target.value)
                                }
                              }
                            })
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-teal",
                                on: {
                                  click: function($event) {
                                    return _vm.addInstRow(k)
                                  }
                                }
                              },
                              [
                                _c("i", {
                                  staticClass: "fa fa-plus",
                                  attrs: { "aria-hidden": "true" }
                                })
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-danger",
                                on: {
                                  click: function($event) {
                                    return _vm.deleteInstRow(k, index)
                                  }
                                }
                              },
                              [
                                _c("i", {
                                  staticClass: "fa fa-minus",
                                  attrs: { "aria-hidden": "true" }
                                })
                              ]
                            )
                          ])
                        ])
                      }),
                      0
                    )
                  ])
                ])
              ])
            })
          ],
          2
        ),
        _vm._v(" "),
        _vm._m(10),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-lg-2" },
          [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Send SMS:")
            ]),
            _vm._v(" "),
            _c("switches", {
              attrs: { theme: "bootstrap", color: "info" },
              model: {
                value: _vm.sendSms,
                callback: function($$v) {
                  _vm.sendSms = $$v
                },
                expression: "sendSms"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-lg-2" },
          [
            _c("label", { staticClass: "form-control-label" }, [
              _vm._v("Send EMAIL:")
            ]),
            _vm._v(" "),
            _c("switches", {
              attrs: { theme: "bootstrap", color: "danger" },
              model: {
                value: _vm.sendMail,
                callback: function($$v) {
                  _vm.sendMail = $$v
                },
                expression: "sendMail"
              }
            })
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "form-layout-footer" }, [
        _c(
          "button",
          {
            staticClass: "btn btn-info",
            attrs: { disabled: _vm.submitDisable },
            on: { click: _vm.newAdmission }
          },
          [_vm._v("Save Admission Info\n            ")]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "btn btn-secondary",
            on: { click: function($event) {} }
          },
          [_vm._v("Reset")]
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12" }, [
      _c("h5", [_vm._v("Personal Details")]),
      _vm._v(" "),
      _c("hr")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "form-control-label" }, [
      _vm._v("Name: "),
      _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12" }, [
      _c("hr"),
      _vm._v(" "),
      _c("h5", [_vm._v("Contact Details")]),
      _vm._v(" "),
      _c("hr")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "form-control-label" }, [
      _vm._v("Mobile Number: "),
      _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "form-control-label" }, [
      _vm._v("Email address: "),
      _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12" }, [
      _c("hr"),
      _vm._v(" "),
      _c("h5", [_vm._v("Parent/Guardian Details")]),
      _vm._v(" "),
      _c("hr")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "form-control-label" }, [
      _vm._v("Batch Fee: "),
      _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "form-control-label" }, [
      _vm._v("Session Start Date: "),
      _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { staticClass: "form-control-label" }, [
      _vm._v("Session End Date: "),
      _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Inst. No")]),
        _vm._v(" "),
        _c("th", [_vm._v("Batch Fee")]),
        _vm._v(" "),
        _c("th", [
          _vm._v("Due Date "),
          _c("span", { staticClass: "tx-danger" }, [_vm._v("*")])
        ]),
        _vm._v(" "),
        _c("th", [_vm._v("Fee Status")]),
        _vm._v(" "),
        _c("th", [_vm._v("Slip #")]),
        _vm._v(" "),
        _c("th", [_vm._v("Action")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12" }, [
      _c("hr"),
      _vm._v(" "),
      _c("h5", [_vm._v("Notifications")]),
      _vm._v(" "),
      _c("hr")
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/vdadmissions/v-createadmission.vue":
/*!********************************************************************!*\
  !*** ./resources/js/components/vdadmissions/v-createadmission.vue ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _v_createadmission_vue_vue_type_template_id_7cf635ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./v-createadmission.vue?vue&type=template&id=7cf635ac& */ "./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=template&id=7cf635ac&");
/* harmony import */ var _v_createadmission_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./v-createadmission.vue?vue&type=script&lang=js& */ "./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _v_createadmission_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _v_createadmission_vue_vue_type_template_id_7cf635ac___WEBPACK_IMPORTED_MODULE_0__["render"],
  _v_createadmission_vue_vue_type_template_id_7cf635ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/vdadmissions/v-createadmission.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_createadmission_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-createadmission.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_v_createadmission_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=template&id=7cf635ac&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=template&id=7cf635ac& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_createadmission_vue_vue_type_template_id_7cf635ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./v-createadmission.vue?vue&type=template&id=7cf635ac& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/vdadmissions/v-createadmission.vue?vue&type=template&id=7cf635ac&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_createadmission_vue_vue_type_template_id_7cf635ac___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_v_createadmission_vue_vue_type_template_id_7cf635ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);