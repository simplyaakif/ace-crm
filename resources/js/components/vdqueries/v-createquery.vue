<template>
    <div>
        <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text"
                               placeholder="Enter Name" v-model="query.name">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                        <input v-mask="'####-#######'" class="form-control" type="text"
                               placeholder="Enter Phone Number" v-model="query.phone">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email address:</label>
                        <input class="form-control" type="text" name="email"
                               placeholder="Enter Email Address" v-model="query.email">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Courses: <span class="tx-danger">*</span></label>
                        <multiselect v-model="query.courses" label="c_title" track-by="id" :options="courses"
                                     placeholder="Pick a value" :multiple="true" :taggable="true">

                        </multiselect>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Session Learing Type: </label>
                        <multiselect v-model="query.sessionType" :options="['Regular','Weekend','Online']"
                                     :searchable="true" :close-on-select="true"
                                     placeholder="Pick a value"></multiselect>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Preferred Timings: </label>
                        <multiselect v-model="query.preferredTimings" :options="['Morning','Evening']"
                                     :searchable="true" :close-on-select="true"
                                     placeholder="Pick a value"></multiselect>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Query Recieved As: </label>
                        <multiselect v-model="query.queryRecievedAs"
                                     :options="['On Campus Visit','Phone Call','Online Registration','Online Chat (Tawk.to)']"
                                     :searchable="true" :close-on-select="true"
                                     placeholder="Pick a value"></multiselect>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Query Conversion </label>
                        <select name="" id="" v-model="query.q_is_converted" class="form-control">
                            <option value="Call">Call</option>
                            <option value="Interested">Interested</option>
                            <option value="Information">Information</option>
                            <option value="Evaluation Done">Evaluation Done</option>
                            <option value="Fee Pending">Fee Pending</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Follow Up">Follow Up</option>
                            <option value="Admission">Admission</option>
                            <option value="Admission">Call up for demo</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Query Dealt By: </label>
                        <multiselect  v-model="query.q_dealt_by"
                                      :options="['Miss Ayesha','Miss Anum','Sir Aakif','Sir Abdullah']"
                                      :searchable="true" :close-on-select="true"
                                      placeholder="Pick a value"></multiselect>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Next Follow Up </label>
                        <input type="datetime-local" v-model="query.followUp" class="form-control">

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Address:</label>
                        <textarea rows="10" class="form-control" type="text"
                                  value="" placeholder="Enter Address" v-model="query.address"> </textarea>
                    </div>
                </div><!-- col-8 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Comments/Remarks: </label>
                        <textarea rows="10" class="form-control" type="text" name=""
                                  value="" placeholder="Dealt By Comments" v-model="query.comments"> </textarea>
                    </div>
                </div><!-- col-8 -->

                <div class="col-lg-2">
                    <label class="form-control-label">Send SMS:</label>
                    <switches v-model="sendSms" theme="bootstrap" color="info"></switches>
                </div>
                <div class="col-lg-2">
                    <label class="form-control-label">Send EMAIL:</label>
                    <switches v-model="sendMail" theme="bootstrap" color="danger"></switches>
                </div>

            </div><!-- row -->

            <div class="form-layout-footer">
                <button class="btn btn-info" @click="saveInfo">Save Query Info</button>
                <button class="btn btn-secondary" @click="clear">Reset</button>
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div>
</template>

<script>
    import Switches from 'vue-switches';
    import Multiselect from 'vue-multiselect';
    import VueMask from 'v-mask';
    import VueSweetalert2 from 'vue-sweetalert2';
    import 'sweetalert2/dist/sweetalert2.min.css';

    Vue.use(VueSweetalert2);
    Vue.use(VueMask);
    Vue.component('multiselect', Multiselect);
    export default {
        components: {
            Switches
        },
        data() {
            return {
                query: {
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    dealtBy: '',
                    preferredTimings: '',
                    queryRecievedAs: '',
                    courses: '',
                    contactType: '',
                    sessionType: '',
                    comments: '',
                    q_dealt_by:'',
                    q_is_converted:'',
                    followUp:'',
                },
                sendSms: false,
                sendMail: false,
            }
        },
        props: {
            courses: Array,
        },
        methods: {
            saveInfo() {
                if (this.query.name && this.query.phone && this.query.courses) {
                    this.$swal({
                        title: "Saving Data",
                        onOpen: () => {
                            this.$swal.showLoading();
                        }
                    });
                    var transaction = {
                        queryInfo: this.query,
                        sms: this.sendSms,
                        mail: this.sendMail
                    };
                    fetch("save", {
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
                                "Query Added Successfully",
                                "success"
                            );
                            this.clear();
                        })
                        .catch(err => {
                            console.log(err);
                        });
                } else {
                    this.$swal("Error", "One of the required field is missing.", "info");
                    return null;

                }
            },
            clear() {
                this.query.name = '';
                this.query.phone = '';
                this.query.email = '';
                this.query.address = '';
                this.query.dealtBy = '';
                this.query.preferredTimings = '';
                this.query.queryRecievedAs = '';
                this.query.courses = [];
                this.query.contactType = '';
                this.query.sessionType = '';
                this.query.comments = '';
            }
        }
    }

</script>
