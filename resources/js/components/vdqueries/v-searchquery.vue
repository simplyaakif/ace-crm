<template>
    <div>
        <div class="row">
            <div class="col-lg">
                <label for="" class="form-control-label">Type in to Search</label> <input class="form-control"
                                                                                          placeholder="Type in to Search"
                                                                                          type="text"
                                                                                          v-model="searchFilters.searchBox">
            </div>
            <!-- col -->
        </div>
        
        <div class="row">
            
            <div class="col-lg mg-t-10 " style="">
                <label for="" class="form-control-label">Select Course</label>
                
                <!--<select-->
                <!--class="form-control select2-show-searc" data-placeholder="Choose one of the Courses"-->
                <!--multiple v-model="selectedCourses"-->
                <!--&gt;-->
                <!--<option value="spokenEnglish">-->
                <!--Spoken English-->
                <!--</option><option value="ielts">-->
                <!--IELTS-->
                <!--</option>-->
                <!---->
                <!--</select>-->
                
                <multiselect v-model="searchFilters.selectedCourses" :options="['Spoken English','IELTS']"
                             :searchable="true" :close-on-select="false" :multiple="true" :taggable="true"
                             :show-labels="false" placeholder="Pick a value"></multiselect>
            
            </div>
            <div class="col-lg mg-t-10 ">
                <label for="" class="form-control-label">Search From Date</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    
                    <datepicker :clear-button="true" :typeable="true" placeholder="Start Date"
                                wrapper-class="form-control setupDate" calendar-class="full-top"
                                v-model="searchFilters.startDate"></datepicker>
                </div>
            </div>
            <!-- col -->
        
        </div>
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg mg-t-10 " style="">
                <label for="" class="form-control-label">Choose Query Type</label>
                <multiselect v-model="searchFilters.queryType"
                             :options="['On Campus Visit','Phone Call','Online Registration','Online Chat']"
                             :searchable="true" :close-on-select="false" :multiple="true" :taggable="true"
                             :show-labels="false" placeholder="Pick a value"></multiselect>
            </div>
            <!-- col -->
            
            <div class="col-lg mg-t-10 ">
                <label for="" class="form-control-label">Search To Date</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    <datepicker :clear-button="true" :typeable="true" placeholder="End Date"
                                wrapper-class="form-control setupDate" v-model="searchFilters.endDate"></datepicker>
                
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
        
        <div class="row">
            <div class="col-lg">
                <button @click="getDetails" type="submit" class="btn btn-primary btn-block mg-t-20">Search Database
                </button>
            </div>
        </div>
        
        <div class="row">
            <hr class="bd-t">
        </div>
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mg-t-50 pd-t-20 bd-t">
            Query Data</h6>
        <p class="mg-b-25 mg-lg-b-20 pd-b-20 bd-b">
            Data Retrieved based on your input</p>
        
        <div class="row">
            <div class="col-md-2 col-4 text-center" v-for="(query,i) in queriesDataLaravel" :key="query.id ">
                <div @click="openDetails(query)">
                    <img src="https://centrik.in/wp-content/uploads/2017/02/user-image-.png" alt="" class="img-fluid">
                    <h5 class="tx-14 mt-3">{{query.q_name}}</h5>
                    <h6 class="tx-12 font-weight-lighter">{{query.q_contact}}</h6>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="min-width:400px;">
                    <div class="modal-header">
                        <h5 class="modal-title">{{queryData.name}} Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-30"  >
                        Name: {{queryData.name}} <br>
                        Mobile Number: {{queryData.phone}} <br>
                        Email Address: {{queryData.email}} <br>
                        Address: {{queryData.address}} <br>
                        Session Type: {{queryData.sessionType}} <br>
                        <!--Dealt By: {{queryData.dealtBy}} <br>-->
                        Preferred Timings: {{queryData.preferredTimings}} <br>
                        <!--Status: -->
                        <hr>
                        <h4>Courses:</h4>
                        <span  v-for="(course,k) in queryData.courses" :key="k"  class="badge badge-pill badge-secondary tx-12 font-weight-light mg-l-10">
                            {{course.c_title}}
                        </span>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!--<button type="button" class="btn btn-primary">Save</button>-->
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</template>

<script>
    import Datepicker from "vuejs-datepicker";
    import Multiselect from 'vue-multiselect';
    // register globally
    Vue.component('multiselect', Multiselect);
    export default {
        components: {
            Datepicker
        },
        data() {
            return {
                searchState: false,
                queriesData: [],
                searchFilters: {
                    searchBox: '',
                    selectedCourses: [],
                    interactionType: [],
                    startDate: '',
                    endDate: '',
                },
                queryData: {
                    id:'',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    courses: '',
                    comments: '',
                    preferredTimings: '',
                    sessionType: '',
                    dealtBy: '',
                }
            }
        },
        props: {
            queriesDataLaravel: Array,
        },
        methods: {
            getDetails() {
                this.$swal({
                    title: "Loading Records",
                    onOpen: () => {
                        this.$swal.showLoading();
                    }
                });
                fetch("searchdata", {
                    method: "post",
                    body: JSON.stringify(this.searchFilters),
                    headers: {
                        "content-type": "application/json",
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        this.queriesDataLaravel = data;
                        this.$swal.close();
                        this.$swal(
                            "Success",
                            "Records loaded successfully",
                            "success"
                        );
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            openDetails(query) {

                fetch("info", {
                    method: "post",
                    body: JSON.stringify(query),
                    headers: {
                        "content-type": "application/json",
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        this.queryData.courses = data;
                    })
                    .catch(err => {
                        console.log(err);
                    });
                this.queryData.id = query.id;
                this.queryData.name = query.q_name;
                this.queryData.phone = query.q_contact;
                this.queryData.email = query.q_email;
                this.queryData.address = query.q_address;
                this.queryData.comments = query.q_comments;
                this.queryData.preferredTimings = query.q_preferred_timings;
                this.queryData.sessionType = query.q_session_type;
                this.queryData.dealtBy = query.q_dealt_by;

                $("#modelId").modal();
            }

        },
    }
</script>

