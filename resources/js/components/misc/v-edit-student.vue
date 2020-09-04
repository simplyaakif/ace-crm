<template>
    <div>
        <button @click="openModal" class="button is-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit
        </button>
        <modal :show="modalOpen" @close="closeModal">
            <div class="box">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Personal Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Contact Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Batches</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="input" type="text" v-model="student.a_name"
                                           placeholder="Enter Candidate Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Father's Name: </label>
                                    <input class="input" type="text" v-model="student.a_father_name"
                                           placeholder="Enter Father's Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Gender:</label>
                                    <multiselect v-model="student.a_gender" :options="['Male','Female']"
                                                 :searchable="false" :close-on-select="true"
                                                 placeholder="Pick a gender"></multiselect>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Nationality</label>
                                    <input class="input" type="text" v-model="student.a_nationality"
                                           placeholder="Enter Nationality">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Place of Birth: </label>
                                    <input class="input" type="text" v-model="student.a_place_of_birth"
                                           placeholder="Enter Place of Birth">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">First Language: </label>
                                    <input class="input" type="text" v-model="student.a_first_language"
                                           placeholder="Enter First Language">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Date of Birth </label>
                                    <input type="date" class="input" v-model="student.a_dob">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">CNIC Number</label>
                                    <input class="input" v-mask="'#####-#######-#'" type="text"
                                           placeholder="Enter CNIC Number" v-model="student.a_cnic">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class=" mt-3">
                                    <button @click="update" class="button is-primary">
                                        Update All Changes
                                    </button>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Mobile Number: <span class="tx-danger">*</span></label>
                                    <input v-mask="'####-#######'" class="input" type="text"
                                           placeholder="Enter Mobile Number" v-model="student.a_mobile">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Email address: <span class="tx-danger">*</span></label>
                                    <input class="input" type="email" name="email"
                                           placeholder="Enter Email Address" v-model="student.a_email">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="input-label">Phone Number: </label>
                                    <input class="input" type="text"
                                           placeholder="Enter Phone Number" v-model="student.a_phone">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="input-label">Address: </label>
                                    <textarea class="input" cols="30" rows="10"
                                              v-model="student.a_address"></textarea>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class=" mt-3">
                                    <button @click="update" class="button is-primary">
                                        Update All Changes
                                    </button>
                                </div>
                            </div><!-- col-4 -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    Sr.#
                                </th>
                                <th>
                                    Batch Name
                                </th>
                                <th>
                                    Batch Time
                                </th>
                                <th>
                                    Start Date
                                </th>
                                <th>
                                    End Date
                                </th>
                                <th>
                                    Session Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(batch,k) in student.batches" :key="k">
                                <td>
                                    {{k+1}}
                                </td>
                                <!--                                <td>{{batch.b_name}}</td>-->
                                <td>
                                    <vue-select source="/select/batches"
                                                label="b_name"
                                                v-model="batch.pivot.batch_id">
                                    </vue-select>
                                </td>
                                <td>{{batch.b_timings}}</td>
                                <td>{{batch.pivot.session_start_date}}</td>
                                <td>{{batch.pivot.session_end_date}}</td>
                                <td>
                                    <div class="select">
                                        <select class="" name="" id="" v-model="batch.pivot.completion_status">
                                            <option value="0">Active</option>
                                            <option value="1">Completed</option>
                                            <option value="2">Freeze</option>
                                            <option value="3">Cancelled</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <button @click="update" class="button is-primary">
                                        Update All Changes
                                    </button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </modal>
    </div>
</template>
<script>
    import {Modal} from '@enso-ui/modal/bulma';
    import Datepicker from "vuejs-datepicker";
    import VueMask from 'v-mask';
    import Multiselect from 'vue-multiselect';

    import Toastr from '@enso-ui/toastr/bulma';
    import ToastrPlugin from '@enso-ui/toastr';
    import {VueSelect} from '@enso-ui/select/bulma';

    Vue.component('vue-select', VueSelect);

    Vue.use(ToastrPlugin, {
        layout: Toastr,
        options: {
            duration: 3500,
            position: 'top-center',
        },
    });
    Vue.component('multiselect', Multiselect);
    Vue.use(VueMask);
    Vue.component('modal', Modal);
    export default {
        components: {
            Datepicker
        },
        props: [
            'student_id'
        ],
        data() {
            return {
                filters: {
                    batches: {
                        id: 1,
                    }
                },
                modalOpen: false,
                student: {
                    a_reg_id: null,
                    a_name: null,
                    a_father_name: null,
                    a_mobile: null,
                    a_phone: null,
                    a_address: null,
                    a_dob: null,
                    a_gender: null,
                    a_nationality: null,
                    a_place_of_birth: null,
                    a_first_language: null,
                    a_cnic: null,
                },
            }
        },
        created() {
            this.$http.get('/student/admissioninfo/' + this.student_id + '/edit').then(res => {
                this.student = res.data;
            }).catch(er => {
                console.log(er);
            });
        },
        methods: {
            openModal() {
                this.modalOpen = true;
            },
            closeModal() {
                this.modalOpen = false;
            },
            update() {
                if (!this.student.batches[0].pivot.batch_id) {
                    this.$toastr.warning("Warning. Batch Missing..");
                    return null;

                }
                this.$toastr.info("Updating");
                this.$http.post('/student/admissioninfo/update', {student: this.student})
                    .then(res => {
                        this.$toastr.success(res.data);
                        console.log('Posted Successfully');
                    })
                    .catch(er => {
                        console.log(er);
                    })
            }
        }
    }
</script>
<style>
    label {
        font-size: 14px !important;
    }

    .nav-link {
        font-size: 16px;
        color: var(--dark);
    }

    .form-group {
        margin-bottom: 0 !important;
    }
</style>
