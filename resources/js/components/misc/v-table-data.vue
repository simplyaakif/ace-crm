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
                                   trackBy="label"
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
                                   trackBy="label"
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
                <span slot="q_is_converted"
                      slot-scope="props">
                <span v-html="$options.filters.is_converted_tag(props.row.q_is_converted)"></span>

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
                                         :options="['On Campus Visit','Phone Call','Online Registration','Online Chat (Tawk.to)']"
                                         :searchable="true" :close-on-select="true"
                                         placeholder="Pick a value"></multiselect>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Status </label>
                            <select name="" id="" v-model="selectedQuery.q_is_converted" class="form-control">
                                <option value="Call">Call</option>
                                <option value="Interested">Interested</option>
                                <option value="Information">Information</option>
                                <option value="Evaluation Done">Evaluation Done</option>
                                <option value="Fee Pending">Fee Pending</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Follow Up">Follow Up</option>
                                <option value="Admission">Admission</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Query Dealt By: </label>
                            <multiselect v-model="selectedQuery.q_dealt_by"
                                         :options="['Miss Anum','Miss Ayesha','Sir Abdullah','Sir Aakif']"
                                         :searchable="true" :close-on-select="true"
                                         placeholder="Pick a value"></multiselect>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Next Follow Up </label>
                            <div class="flex justify-content-between" v-show="!newDate">
                                <span >{{selectedQuery.updated_at}}</span>
                                <button class="btn btn-primary btn-small" @click="newDate = true">Add new date</button>
                            </div>
                            <div class="flex" v-show="newDate">
                                <input type="datetime-local" class="form-control" v-model="selectedQuery.updated_at">
<!--                                <button class="btn btn-default" @click="!newDate">Previous Date</button>-->
                            </div>
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
                                      placeholder="Dealt By Comments"
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
    import {VueForm} from '@enso-ui/forms/bulma';
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
    Vue.component('vue-form', VueForm);

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
        filters: {
            is_converted_tag: function (value) {
                // return moment(current).isAfter(moment(), 'day');
                if ( value ==='Rejected') {
                    return '<span class="tag is-table-tag is-danger">'+value+'</span>';
                } else if(value === 'Admission')  {
                    return '<span class="tag is-table-tag is-success">'+value+'</span>';
                } else if(value === '1')  {
                    return '<span class="tag is-table-tag is-success">Admission</span>';
                }else if(value === 'Call')  {
                    return '<span class="tag is-table-tag is-info">'+value+'</span>';
                }else if(value === 'Interested')  {
                    return '<span class="tag is-table-tag is-primary">'+value+'</span>';
                }else if(value === 'Follow Up')  {
                    return '<span class="tag is-table-tag is-warning">'+value+'</span>';
                }else if(value === null)  {
                    return '<span class="tag is-table-tag is-warning">Follow Up</span>';
                }else if(value === '0')  {
                    return '<span class="tag is-table-tag is-danger">Rejected</span>';
                }else{
                    return `<span class="tag is-table-tag ">${value}</span>`;
                }
            }
        },
        data() {
            return {
                q_is_converted: [
                    {value: 'Call', label: 'Call'},
                    {value: 'Interested', label: 'Interested'},
                    {value: 'Information', label: 'Information'},
                    {value: 'Evaluation Done', label: 'Evaluation Done'},
                    {value: 'Fee Pending', label: 'Fee Pending'},
                    {value: 'Rejected', label: 'Rejected'},
                    {value: 'Follow Up', label: 'Follow Up'},
                    {value: 'Admission', label: 'Admission'},
                ],
                dealtBy: [
                    {value: 'Miss Anum', label: 'Miss Anum'},
                    {value: 'Miss Ayesha', label: 'Miss Ayesha'},
                    {value: 'Sir Abdullah', label: 'Sir Abdullah'},
                    {value: 'Sir Aakif', label: 'Sir Aakif'},
                ],
                interaction: [
                    {q_interaction_type: 'On Campus Visit', id: 0},
                    {q_interaction_type: 'Phone Call', id: 1},
                    {q_interaction_type: 'Online Registration', id: 2},
                    {q_interaction_type: 'Online Chat (Tawk.to)', id: 3},
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
                editPath: '',
                newDate:false,
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
            update() {
                this.$toastr.warning('Updating', 'Event');
                this.$http.put('/queries/update', {query: this.selectedQuery})
                    .then(dt => {
                        this.$toastr.success(dt.data, 'Event');
                        console.log(dt);
                    })
                    .catch(er => {
                        console.log(er);
                    })
                this.newDate = false;
            }
        }

    }
</script>

<style>
    .modal label {
        font-size: 14px !important;
    }
</style>
