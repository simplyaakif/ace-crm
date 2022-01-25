<template>
    <div>
        <div class="form-layout form-layout-1">

            <div class="row mg-b-25">
                <div class="col-lg-12">
                    <h5>Personal Details</h5>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" v-model="admissionDetails.name"
                               placeholder="Enter Candidate Name">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Father's Name: </label>
                        <input class="form-control" type="text" v-model="admissionDetails.father"
                               placeholder="Enter Father's Name">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Gender:</label>
                        <multiselect v-model="admissionDetails.gender" :options="['Male','Female']"
                                     :searchable="false" :close-on-select="true"
                                     placeholder="Pick a gender"></multiselect>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Nationality</label>
                        <input class="form-control" type="text" v-model="admissionDetails.nationality"
                               placeholder="Enter Nationality">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Place of Birth: </label>
                        <input class="form-control" type="text" v-model="admissionDetails.place_of_birth"
                               placeholder="Enter Place of Birth">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">First Language: </label>
                        <input class="form-control" type="text" v-model="admissionDetails.first_language"
                               placeholder="Enter First Language">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Date of Birth </label>
                        <datepicker :clear-button="true" :typeable="true" placeholder="Date of Birth"
                                    wrapper-class="form-control setupDate" v-model="admissionDetails.dob"></datepicker>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">CNIC Number</label>
                        <input class="form-control" v-mask="'#####-#######-#'" type="text"
                               placeholder="Enter CNIC Number" v-model="admissionDetails.cnic">
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <hr>
                    <h5>Contact Details</h5>
                    <hr>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                        <input v-mask="'####-#######'" class="form-control" type="text"
                               placeholder="Enter Mobile Number" v-model="admissionDetails.mobile">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="email" name="email"
                               placeholder="Enter Email Address" v-model="admissionDetails.email">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone Number: </label>
                        <input class="form-control" type="text"
                               placeholder="Enter Phone Number" v-model="admissionDetails.phone">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Address: </label>
                        <textarea class="form-control" cols="30" rows="10"
                                  v-model="admissionDetails.address"></textarea>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <hr>
                    <h5>Parent/Guardian Details</h5>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Name: </label>
                        <input class="form-control" type="text"
                               placeholder="Enter Name" v-model="guardian.name">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Relationship: </label>
                        <input class="form-control" type="text"
                               placeholder="Enter Relationship" v-model="guardian.relation">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">CNIC #: </label>
                        <input class="form-control" v-mask="'#####-#######-#'" type="text"
                               placeholder="Enter CNIC Number" v-model="guardian.cnic">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Occupation Type</label>
                        <input class="form-control" type="text"
                               placeholder="Enter Occupation Type" v-model="guardian.occupation_type">
                    </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Occupation Designation</label>
                        <input class="form-control" type="text"
                               placeholder="Enter Occupation Designation" v-model="guardian.occupation_designation">
                    </div>
                </div><!-- col-6 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Mobile Number: </label>
                        <input v-mask="'####-#######'" class="form-control" type="text"
                               placeholder="Enter Mobile Number" v-model="guardian.mobile">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email address: </label>
                        <input class="form-control" type="email" name="email"
                               placeholder="Enter Email Address" v-model="guardian.email">
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12 bg-gray-100 pb-3">
                    <hr>
                    <h5>Batch & Finance Details</h5>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-10">
                            <multiselect v-model="currentCourse"
                                         :options="batches"
                                         deselect-label="Can't remove this value"
                                         label="b_name" track-by="id"
                                         :searchable="false"
                                         :custom-label="batchlabel"
                                         :allow-empty="false"
                                         :preselect-first="true"
                                         placeholder="Add Batches">

                            </multiselect>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-teal" @click="addBatRow">Add New Batch</button>
                        </div>
                    </div>

                    <div class="card my-3" v-for="(bat,k) in studentBat" :key="k">
                        <div class="card-body">
                            <h4 class="card-title d-flex justify-content-between">{{bat.course_name}} -
                                <span @click="deleteBatRow(k)"><i
                                        class="fa fa-trash"
                                        aria-hidden="true"></i></span></h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Batch Fee: <span
                                                class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" v-model="bat.course_fee">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Session Start Date: <span
                                                class="tx-danger">*</span></label>

                                        <VueCtkDateTimePicker minute-interval="15" label="Select Start Date"
                                                              color="#138496"
                                                              format="YYYY-MM-DD"
                                                              :only-date=true v-model="bat.start_date"
                                                              formatted="DD MMM YYYY"></VueCtkDateTimePicker>

                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Session End Date: <span
                                                class="tx-danger">*</span></label>
                                        <VueCtkDateTimePicker minute-interval="15" label="Select End Date"
                                                              color="#138496"
                                                              format="YYYY-MM-DD"
                                                              :only-date=true v-model="bat.end_date"
                                                              formatted="DD MMM YYYY"></VueCtkDateTimePicker>
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <h4 class="card-title d-flex justify-content-between">Fee - Installments</h4>
                            <hr>
                            <table class="table table-stripped">
                                <thead>
                                <tr>
                                    <th>Inst. No</th>
                                    <th>Batch Fee</th>
                                    <th>Due Date <span
                                            class="tx-danger">*</span></th>
                                    <th>Fee Status</th>
                                    <th>Slip #</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Required InstallmentAmount Remaining</th>
                                    <th>{{bat.totalRem}}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr v-for="(single, index) in bat.installmentrows" :key="index">
                                    <td>
                                        {{index+1}}
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" v-on:keyup="bRemain(k,index)"
                                               v-model="single.instAmount"
                                               value="22500">
                                    </td>
                                    <td>
                                        <VueCtkDateTimePicker required minute-interval="15" label="Select End Date"
                                                              color="#138496"
                                                              format="YYYY-MM-DD"
                                                              :only-date=true v-model="single.instDueDate"
                                                              formatted="DD MMM YYYY"></VueCtkDateTimePicker>

                                    </td>
                                    <td>
                                        <select class="form-control" v-model="single.instFeeStatus" name="" id="">
                                            <option value="0">Not Paid</option>
                                            <option value="1">Paid</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input :disabled="single.instFeeStatus == 0" class="form-control" type="text"
                                               v-model="single.slip">
                                    </td>
                                    <td>
                                        <button class="btn btn-teal" @click="addInstRow(k)"><i class="fa fa-plus"
                                                                                               aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger" @click="deleteInstRow(k,index)"><i
                                                class="fa fa-minus" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <hr>
                    <h5>Notifications</h5>
                    <hr>
                </div>
                <div class="col-lg-2">
                    <label class="form-control-label">Send SMS:</label>
                    <switches theme="bootstrap" v-model="sendSms" color="info"></switches>
                </div>
                <div class="col-lg-2">
                    <label class="form-control-label">Send EMAIL:</label>
                    <switches theme="bootstrap" v-model="sendMail" color="danger"></switches>
                </div>

            </div><!-- row -->

            <div class="form-layout-footer">
                <button :disabled="submitDisable" class="btn btn-info" @click="newAdmission">Save Admission Info
                </button>
                <button class="btn btn-secondary" @click="">Reset</button>
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div>
</template>

<script>
    import Switches from 'vue-switches';
    import Multiselect from 'vue-multiselect';
    import Datepicker from "vuejs-datepicker";
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    import VueMask from 'v-mask';
    import VueSweetalert2 from 'vue-sweetalert2';
    import 'sweetalert2/dist/sweetalert2.min.css';

    Vue.use(VueSweetalert2);
    Vue.use(VueMask);
    Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
    Vue.component('multiselect', Multiselect);
    export default {
        components: {
            Switches,
            Datepicker
        },
        data() {
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
                    address: '',

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
                currentCourse:  this.batches[0],
                studentBat: [],
                sendSms: false,
                sendMail: false,
            }
        },
        updated() {
            // console.log(this.studentBat[0]);
            // this.currentCourse = this.studentBat[0];
        },
        props: {
            batches: Array,
        },
        methods: {
            newAdmission() {
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
                        onOpen: () => {
                            this.$swal.showLoading();
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
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        }
                    })
                        .then(res => res.json())
                        .then(data => {

                            this.$swal.close();
                            this.$swal(
                                "Completed",
                                "Candidate Admitted Successfully",
                                "success"
                            );
                            this.clear();
                        })
                        .catch(err => {
                            console.log(err);
                        });
                    window.scrollTo({top: 0, behavior: 'smooth'});

                }
            },
            clear() {
                Object.assign(this.$data, this.$options.data.call(this));
            },
            batchlabel({b_name, b_timings, b_session_type, c_fee}) {
                return `${b_name} at ${b_timings} - [${b_session_type}] - ${c_fee}Rs`
            }
            ,
            bRemain(k, index = 0) {
                var val = 0, i;
                for (i = 0; i < this.studentBat[k].installmentrows.length; i++) {
                    val += parseInt(this.studentBat[k].installmentrows[i].instAmount, 10);
                    // console.log(val);
                }
                this.studentBat[k].totalRem = this.studentBat[k].course_fee - val;
                // return this.studentBat[k].course_fee - val;
            }
            ,
            addInstRow: function (k) {
                if (this.studentBat[k].installmentrows.length < 3) {
                    var index = this.studentBat[k].installmentrows.length - 1;
                    this.studentBat[k].installmentrows.push({
                        instAmount: this.studentBat[k].totalRem,
                        instDueDate: '',
                        instFeeStatus: 0,
                        slip: '',
                    });
                }
                this.bRemain(k);
            }
            ,
            deleteInstRow: function (k, idx) {
                this.studentBat[k].installmentrows.splice(idx, 1);

                var val = 0, i;
                for (i = 0; i < this.studentBat[k].installmentrows.length; i++) {
                    val += parseInt(this.studentBat[k].installmentrows[i].instAmount, 10);
                    // console.log(val);
                }
                this.studentBat[k].totalRem = this.studentBat[k].course_fee - val;
            }
            ,
            addBatRow: function (k) {
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
                        slip: '',
                    }],
                    totalRem: 0,
                });

            }
            ,
            deleteBatRow: function (idx) {
                this.studentBat.splice(idx, 1);
            }
            ,


        }
    }
</script>
