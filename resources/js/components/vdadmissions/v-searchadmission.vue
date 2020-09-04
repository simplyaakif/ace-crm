<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <label for="" class="form-control-label">Type in to Search Admission</label>
                <input class="form-control"
                       placeholder="Type in to Search"
                       type="text"
                       v-model="searchFilters.searchBox">
            </div>
            <div class="col-md-4">
                <label for="" class="form-control-label">Roll #</label> <input class="form-control"
                                                                               placeholder="Type in to Search"
                                                                               type="text"
                                                                               v-model="searchFilters.roll">
            </div>
            <!-- col -->
        </div>
        
        <div class="row">
            
            <div class="col-lg mg-t-10 " style="">
                <label for="" class="form-control-label">Select Batch or Batches</label>
                <multiselect v-model="searchFilters.selectedBatches" :options="batches"
                             :searchable="true" :close-on-select="false" :multiple="true" :taggable="true"
                             track-by="id"
                             :custom-label="batchlabel"
                             :show-labels="false" placeholder="Pick a value"></multiselect>
            
            </div>
            <div class="col-lg mg-t-10 ">
                <label for="" class="form-control-label">Search From Date</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    
                    <VueCtkDateTimePicker minute-interval="15" label="Select Start Date" color="#138496"
                                          format="YYYY-MM-DD"
                                          :only-date=true v-model="searchFilters.startDate"
                                          formatted="DD MMM YYYY"></VueCtkDateTimePicker>
                
                </div>
            </div>
            <!-- col -->
        
        </div>
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg mg-t-10 " style="">
                <label for="" class="form-control-label">Choose Completion status</label>
                <multiselect v-model="searchFilters.completionStatus"
                             :options="status"
                             label="title"
                             track-by="id"
                             :searchable="true" :close-on-select="false" :multiple="true" :taggable="true"
                             :show-labels="false" placeholder="Pick a value"></multiselect>
            </div>
            <!-- col -->
            
            <div class="col-lg mg-t-10 ">
                <label for="" class="form-control-label">Search To Date</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    <VueCtkDateTimePicker minute-interval="15" label="Select End Date" color="#138496"
                                          format="YYYY-MM-DD"
                                          :only-date=true v-model="searchFilters.endDate"
                                          formatted="DD MMM YYYY"></VueCtkDateTimePicker>
                
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
        
        <div class="row">
            <div class="col-lg">
                <button @click="getDetails" type="submit" class="btn btn-teal btn-block mg-t-20">Search Database
                </button>
            </div>
        </div>
        
        <div class="row">
            <hr class="bd-t">
        </div>
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mg-t-50 pd-t-20 bd-t">
            Admissions Data</h6>
        <p class="mg-b-25 mg-lg-b-20 pd-b-20 bd-b">
            Data Retrieved based on your input</p>
        
        <div class="row">
            <div class="col-md-2 col-4 text-center" v-for="(admission,i) in admissions" :key="i ">
                <a :href="url+'/student/'+admission.id" style="color: inherit;">
                    <img v-if="admission.a_dp" :src="admission.a_dp" alt="" class="img-fluid">
                    <img v-else src="https://centrik.in/wp-content/uploads/2017/02/user-image-.png" alt=""
                         class="img-fluid">
                    <h5 class="tx-14 mt-3"> {{admission.a_name}}</h5>
                    <h6 class="tx-12 font-weight-lighter">{{admission.a_reg_id}}</h6>
                    <h6 class="tx-12 font-weight-lighter">{{admission.a_mobile}}</h6>
                </a>
            </div>
        </div>
    
    </div>
</template>

<script>
    import Datepicker from "vuejs-datepicker";
    import Multiselect from 'vue-multiselect';
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';

    Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
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
                    selectedBatches: [],
                    completionStatus: [],
                    startDate: '',
                    roll: '',
                    endDate: '',
                },
                status: [
                    {
                        val: 0,
                        title: 'Active',
                    },
                    {
                        val: 1,
                        title: 'Completed',
                    },
                    {
                        val: 2,
                        title: 'Freeze',
                    }
                ],
            }
        },
        props: {
            admissions: Array,
            batches: Array,
            url: String,
        },
        methods: {
            batchlabel({b_name, b_timings, b_session_type}) {
                return `${b_name} at ${b_timings}`
            },
            getDetails() {
                this.$swal({
                    title: "Loading Records",
                    onOpen: () => {
                        this.$swal.showLoading();
                    }
                });
                fetch("search-admissions-data", {
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
                        this.admissions = data;
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

        },
    }
</script>


