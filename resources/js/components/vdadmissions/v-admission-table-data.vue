<template>
    <div>
        <div class="columns">
            <div class="column is-3">
                <date-interval-filter class="box"
                                      title="Admitted Between"
                                      format="Y-m-d"
                                      @update="
        intervals.admissions.created_at.min = $event.min;
        intervals.admissions.created_at.max = $event.max;
        ">
                </date-interval-filter>
            </div>
            <div class="column is-3">
                <select-filter title="Course"
                               :multiple="true"
                               :options="courses"
                               label="c_title"
                               class="box"
                               v-model="filters.courses.id"/>
            </div>
            <div class="column is-3">
                <div class="is-paddingless box selectbox">
                    <div class="header has-background-light has-text-centered">
                        <strong>Batches</strong>
                    </div>
                    <div class="sel">
                        <vue-select source="/select/batches"
                                    label="b_name"
                                    multiple
                                    v-model="filters.batches.id">
                        </vue-select>
                    </div>
                </div>
            </div>
            <div class="column is-3">
    
                <select-filter class="box"
                               multiple
                               :options="status"
                               title="Course Status"
                               label="completion_status"
                               trackBy="id"
                               v-model="filters.batch_admission.completion_status"
                >
                </select-filter>
            </div>
        </div>
        
        <vue-table class="box is-paddingless raises-on-hover is-rounded"
                   :path="url"
                   :intervals="intervals"
                   :filters="filters"
                   @excel="$toastr.info('You just pressed Excel', 'Event')"
                   @view="view"
                   @create="$toastr.success('Lets create a new Entry', 'Event')"
                   @edit="$toastr.warning('You just pressed Edit', 'Event')"
                   @destroy="$toastr.error('You just pressed Delete', 'Event')"
                   @postdestroy="$toastr.success('Query Deleted Successfully', 'Event')"
                   id="admissions">
            <span slot="completion_status"
                  slot-scope="props">
                <span v-html="$options.filters.statusTag(props.row.completion_status)">0</span>
    
              
                
                    </span>
        </vue-table>
    
    </div>
</template>

<script>
    import {VueTable} from '@enso-ui/tables/bulma';
    import {DateFilter, DateIntervalFilter, SelectFilter, VueFilter} from '@enso-ui/filters/bulma';
    import {VueSelect} from '@enso-ui/select/bulma';
    import Toastr from '@enso-ui/toastr/bulma';
    import ToastrPlugin from '@enso-ui/toastr';

    Vue.use(ToastrPlugin, {
        layout: Toastr,
        options: {
            duration: 3500,
            position: 'top-center',
        },
    });

    Vue.component('vue-table', VueTable);
    Vue.component('vue-filter', VueFilter);
    Vue.component('date-interval-filter', DateIntervalFilter);
    Vue.component('date-filter', DateFilter);
    Vue.component('select-filter', SelectFilter);
    Vue.component('vue-select', VueSelect);

    export default {
        props: {
            url: String,
            courses: Array,
        },
        filters: {
            statusTag: function (value) {
                if (value == 0) {
                    return '<span class="tag is-table-tag is-info">Course Active</span>';
                } else if (value == 1) {
                    return '<span class="tag is-table-tag is-success">Course Completed</span>';
                } else if (value == 2) {
                    return '<span class="tag is-table-tag is-warning">Course Freezed</span>';
                } else if (value == 3) {
                    return '<span class="tag is-table-tag is-danger">Course Cancelled</span>';
                }
            }
        },
        data() {
            return {
                activeOptions: [
                    {value: 0, label: 'Active', class: 'has-text-success', icon: 'check'},
                    {value: 1, label: 'Cancelled', class: 'has-text-danger', icon: 'times'},
                ],
                ic: true,
                status:[
                    {completion_status: 'Course Active', id: 0},
                    {completion_status: 'Course Completed', id: 1},
                    {completion_status: 'Course Friezed', id: 2},
                    {completion_status: 'Course Cancelled', id: 3},
                ],
                filters: {
                    batches: {
                        id: [],
                    },
                    admissions: {
                        q_converted: null,
                    },
                    batch_admission:{
                        completion_status:[],
                    },
                    courses: {
                        id: [],
                    },

                },

                intervals: {
                    admissions: {
                        created_at: {
                            max: null,
                            min: null,
                            DateFormat: 'Y-m-d',
                        },
                    },
                },
            }
        },
        methods: {
            view(Event) {
                console.log(Event);
                window.location.href = '/misc/student/' + Event.dtRowId;
            }
        }

    }
</script>