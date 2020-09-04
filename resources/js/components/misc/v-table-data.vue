<template>
    <div>
        <div v-show="mainPage" id="mainPage">

            <div class="columns">
                <div class="column is-4">
                    <date-interval-filter class="box"
                                          title="Visited Between"
                                          format="Y-m-d"
                                          @update="
                                        intervals.queries.created_at.min = $event.min;
                                        intervals.queries.created_at.max = $event.max;
        ">
                    </date-interval-filter>
                </div>
                <div class="column is-4">
                    <select-filter title="Course"
                                   :multiple="true"
                                   :options="courses"
                                   label="c_title"
                                   class="box"
                                   v-model="filters.courses.id"/>
                </div>
                <div class="column is-4">

<!--                    <vue-filter class="box"-->
<!--                                :options="activeOptions"-->
<!--                                :icons=true-->
<!--                                title="Status"-->
<!--                                v-model="filters.queries.q_is_converted"-->
<!--                    >-->
<!--                    </vue-filter>-->
                    <select-filter title="Status"
                                   :multiple="true"
                                   :options="q_is_converted"
                                   label="label"
                                   trackBy = "label"
                                   class="box"
                                   v-model="filters.queries.q_is_converted"/>
                </div>


            </div>
            <div class="columns">
                <div class="column is-4">

                    <select-filter class="box"
                                   multiple
                                   :options="interaction"
                                   title="Interaction Type"
                                   label="q_interaction_type"
                                   trackBy="q_interaction_type"
                                   v-model="filters.queries.q_interaction_type"
                    >
                    </select-filter>
                </div>
                <div class="column is-4">

<!--                    <vue-filter class="box"-->
<!--                                :options="dealtBy"-->
<!--                                title="Dealt By"-->
<!--                                v-model="filters.queries.q_dealt_by"-->
<!--                    >-->
<!--                    </vue-filter>-->
                    <select-filter title="Dealt By"
                                   :multiple="true"
                                   :options="dealtBy"
                                   label="label"
                                   trackBy = "label"
                                   class="box"
                                   v-model="filters.queries.q_dealt_by"/>
                </div>

            </div>

            <vue-table class="box is-paddingless raises-on-hover is-rounded"
                       :path="url"
                       :intervals="intervals"
                       :filters="filters"
                       @excel="$toastr.info('You just pressed Excel', 'Event')"
                       @create="$toastr.success('Lets create a new Entry', 'Event')"
                       @edit="editData"
                       @destroy="$toastr.error('You just pressed Delete', 'Event')"
                       @postdestroy="$toastr.success('Query Deleted Successfully', 'Event')"
                       id="queries">
              <span slot="q_name"
                    slot-scope="props">
                        {{ props.row.q_name }}
                    </span>
            </vue-table>
        </div>
        <div v-show="editPage" id="editPage">
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text"
                                   placeholder="Enter Name" v-model="selectedQuery.q_name">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                            <input v-mask="'####-#######'" class="form-control" type="text"
                                   placeholder="Enter Phone Number" v-model="selectedQuery.q_contact">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Email address:</label>
                            <input class="form-control" type="text" name="email"
                                   placeholder="Enter Email Address" v-model="selectedQuery.q_email">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Courses: <span class="tx-danger">*</span></label>
                            <multiselect v-model="selectedQuery.coursesId" label="c_title" track-by="id"
                                         :options="courses"
                                         placeholder="Pick a value" :multiple="true" :taggable="true">

                            </multiselect>
<!--                            <vue-select source="/select/courses"-->
<!--                                        label="c_title"-->
<!--                                        multiple-->
<!--                                        v-model="selectedQuery.courses">-->
<!--                            </vue-select>-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Session Learing Type: </label>
                            <multiselect v-model="selectedQuery.q_session_type"
                                         :options="['Regular','Weekend','Online']"
                                         :searchable="true" :close-on-select="true"
                                         placeholder="Pick a value"></multiselect>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Preferred Timings: </label>
                            <multiselect v-model="selectedQuery.q_preferred_timings" :options="['Morning','Evening']"
                                         :searchable="true" :close-on-select="true"
                                         placeholder="Pick a value"></multiselect>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Query Recieved As: </label>
                            <multiselect v-model="selectedQuery.q_interaction_type"
                                         :options="['On Campus Visit','Phone Call','Online Registration','Online Chat']"
                                         :searchable="true" :close-on-select="true"
                                         placeholder="Pick a value"></multiselect>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Status </label>
                            <select name="" id="" v-model="selectedQuery.q_is_converted" class="form-control">
                                <option value="Not Converted">Not Converted</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Follow Up">Follow Up</option>
                                <option value="Call">Call</option>
                                <option value="Interested">Interested</option>
                                <option value="Interested in Next Session">Interested in Next Session</option>
                                <option value="Converted Successfully">Converted Successfully</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Query Dealt By: </label>
                            <multiselect  v-model="selectedQuery.q_dealt_by"
                                         :options="['Miss Jiya','Miss Ayesha','Sir Abdullah','Sir Aakif']"
                                         :searchable="true" :close-on-select="true"
                                         placeholder="Pick a value"></multiselect>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Address:</label>
                            <textarea rows="10" class="form-control" type="text"
                                      value="" placeholder="Enter Address"
                                      v-model="selectedQuery.q_address"> </textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Comments: </label>
                            <textarea rows="10" class="form-control" type="text" name=""
                                      value="" placeholder="Dealt By Comments"
                                      v-model="selectedQuery.q_remarks"> </textarea>
                        </div>
                    </div><!-- col-8 -->

                </div><!-- row -->

                <div class="form-layout-footer">
                    <button class="btn btn-info" @click="update">Update Query Info</button>
                    <button class="btn btn-secondary" @click="back">Back</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div>

    </div>
</template>

<script>
    import {VueTable} from '@enso-ui/tables/bulma';
    import {DateFilter, DateIntervalFilter, SelectFilter, VueFilter} from '@enso-ui/filters/bulma';
    import {Modal, ModalCard} from '@enso-ui/modal/bulma';
    import Multiselect from 'vue-multiselect';
    import {VueSelect} from '@enso-ui/select/bulma';
    import VueMask from 'v-mask';
    import {  VueForm } from '@enso-ui/forms/bulma';
    import Toastr from '@enso-ui/toastr/bulma';
    import ToastrPlugin from '@enso-ui/toastr';

    Vue.use(ToastrPlugin, {
        layout: Toastr,
        options: {
            duration: 3500,
            position: 'top-center',
        },
    });

    Vue.use(VueMask);
    Vue.component('vue-select', VueSelect);
    Vue.component('vue-form',VueForm);

    Vue.component('vue-table', VueTable);
    Vue.component('vue-filter', VueFilter);
    Vue.component('date-interval-filter', DateIntervalFilter);
    Vue.component('date-filter', DateFilter);
    Vue.component('select-filter', SelectFilter);
    Vue.component('modal', Modal);
    Vue.component('modal-card', ModalCard);
    Vue.component('multiselect', Multiselect);

    export default {
        props: {
            url: String,
            courses: Array,
        },
        data() {
            return {
                q_is_converted: [
                    {value: 'Not Converted', label: 'Not Converted'},
                    {value: 'Rejected', label: 'Rejected'},
                    {value: 'Follow Up', label: 'Follow Up'},
                    {value: 'Call', label: 'Call'},
                    {value: 'Interested', label: 'Interested'},
                    {value: 'Interested in Next Session', label: 'Interested in Next Session'},
                    {value: 'Converted Successfully', label: 'Converted Successfully'},
                ],
                dealtBy: [
                    {value: 'Miss Jiya', label: 'Miss Jiya'},
                    {value: 'Miss Ayesha', label: 'Miss Ayesha'},
                    {value: 'Sir Abdullah', label: 'Sir Abdullah'},
                    {value: 'Sir Aakif', label: 'Sir Aakif'},
                ],
                interaction: [
                    {q_interaction_type: 'On Campus Visit', id: 0},
                    {q_interaction_type: 'Phone Call', id: 1},
                    {q_interaction_type: 'Online Registration', id: 2},
                    {q_interaction_type: 'Online Chat', id: 3},
                ],
                scopedSlots: ["q_name"],
                ic: true,
                filters: {
                    queries: {
                        q_is_converted: [],
                        q_interaction_type: [],
                        q_dealt_by: [],
                    },
                    courses: {
                        id: [],
                    },
                },
                intervals: {
                    queries: {
                        created_at: {
                            max: null,
                            min: null,
                            dateFormat: 'Y-m-d',
                        },
                    },
                },
                selectedQuery: {
                    coursesId: {
                        id: [],
                    },
                },
                selectedModal: false,
                mainPage: true,
                editPage: false,
                editPath:'',
            }
        },
        methods: {
            editData(Event) {
                this.$toastr.warning('You just pressed Edit', 'Event');
                // console.log(Event);
                this.selectedQuery = Event;
                var value = this;

                this.$http.post('/courses/student-courses', {
                    id: this.selectedQuery.dtRowId,
                })
                    .then(function (response) {
                        value.selectedQuery.coursesId = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                console.log(this.selectedQuery.coursesId);
                this.editPath = '/form/courses/10/edit';
                this.editPage = true;
                this.mainPage = false;
            },
            back() {
                this.editPage = false;
                this.mainPage = true;
            },
            closeModal() {
                // this.mainPage = true;
                this.selectedModal = false;

            },
            update(){
                this.$toastr.warning('Updating', 'Event');
              this.$http.put('/queries/update',{query:this.selectedQuery})
                  .then(dt=>{
                this.$toastr.success(dt.data, 'Event');
                    console.log(dt);
                  })
                  .catch(er=>{
                      console.log(er);
                  })
            }
        }

    }
</script>

<style>
    .modal label {
        font-size: 14px !important;
    }
</style>
