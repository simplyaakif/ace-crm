<template>
    <div>
        <div class="columns">
            <div class="column is-4">
                <date-interval-filter class="box"
                                      title="Due Between"
                                      format="Y-m-d"
                                      @update="
        intervals.expense.dueDate.min = $event.min;
        intervals.expense.dueDate.max = $event.max;
        ">
                </date-interval-filter>
            </div>
            <div class="column is-4">
                <div class="is-paddingless box selectbox">
                    <div class="header has-background-light has-text-centered">
                        <strong>Course</strong>
                    </div>
                    <div class="sel">
                        <vue-select source="/select/courses"
                                    label="c_title"
                                    multiple
                                    v-model="filters.courses.id">
                        </vue-select>
                    </div>
                </div>
            </div>
            <div class="column is-4">
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

        </div>

        <vue-table class="box is-paddingless raises-on-hover is-rounded"
                   :path="url"
                   :intervals="intervals"
                   :filters="filters"
                   @excel="$toastr.info('You just pressed Excel', 'Event')"
                   @create="$toastr.success('Lets create a new Entry', 'Event')"
                   @edit="$toastr.warning('You just pressed Edit', 'Event')"
                   @destroy="$toastr.error('You just pressed Delete', 'Event')"
                   @postdestroy="$toastr.success('Query Deleted Successfully', 'Event')"
                   @view="view"
                   id="expenses">
            <span slot="status"
                  slot-scope="props">
                <span v-html="$options.filters.dueTag(props.row.dueDate)"></span>

                <!--                <span>-->
                <!--                       {{ props.row.dueDate}}-->
                <!--                </span>-->

                    </span>
        </vue-table>

    </div>
</template>

<script>
    import {VueTable} from '@enso-ui/tables/bulma';
    import {DateFilter, DateIntervalFilter, SelectFilter, VueFilter} from '@enso-ui/filters/bulma';
    import {VueSelect} from '@enso-ui/select/bulma';
    import moment from 'moment';
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
        name:"VFAdmissionsTable",
        props: {
            url: String,
            courses: Array,
        },
        filters: {
            dueTag: function (value) {
                var current = moment(value).format('YYYY-MM-DD');
                // return moment(current).isAfter(moment(), 'day');
                if (moment(current).isAfter(moment(), 'day')) {
                    return '<span class="tag is-table-tag is-primary">Upcoming</span>';
                } else {
                    return '<span class="tag is-table-tag is-danger">Overdue</span>';
                }
            }
        },
        data() {
            return {
                activeOptions: [
                    {value: true, label: 'check', class: 'has-text-success', icon: 'check'},
                    {value: false, label: 'times', class: 'has-text-danger', icon: 'times'},
                ],
                ic: true,
                filters: {
                    batches: {
                        id: [],
                    },
                    admissions: {
                        q_converted: null,
                    },
                    courses: {
                        id: [],
                    },

                },

                intervals: {
                    expense: {
                        dueDate: {
                            max: null,
                            min: null,
                            dateFormat: 'd-m-Y',
                        },
                    },
                },
            }
        },
        methods:{
            view(Event){
                console.log(Event);
                window.location.href = '/misc/student/'+Event.dtRowId;
            }
        },

    }
</script>
