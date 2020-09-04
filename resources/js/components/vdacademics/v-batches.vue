<template>
    <div id="queryPage"
         class="">np</div>
</template>

<script>
    import Switches from 'vue-switches';
    import Multiselect from 'vue-multiselect';
    import Datepicker from "vuejs-datepicker";
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';

    Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
    Vue.component('multiselect', Multiselect);
    export default {
        components: {
            Switches,
            Datepicker
        },
        data() {
            return {
                batch: {
                    id: '',
                    name: '',
                    startDate: '',
                    endDate: '',
                    course: '',
                    strength: '',
                    session_type: '',
                    instructor_name: '',
                    class_time: '',
                    comments: '',
                    days: {
                        mon: false,
                        tue: false,
                        wed: false,
                        thu: false,
                        fri: false,
                        sat: false,
                        sun: false,
                    }
                },
                batch_id: '',
                edit: false,
                editMode: false,
                createMode: true,
            }
        },
        props: {
            courses: Array,
            batches: Array
        },
        methods: {
            goBack() {
                this.editMode = false;
                this.edit = false;
            },
            newbatch() {
                this.editMode = true;
                this.edit = false;
                this.batch.id = '';
                this.batch.name = '';
                this.batch.startDate = '';
                this.batch.endDate = '';
                this.batch.course = '';
                this.batch.strength = '';
                this.batch.session_type = '';
                this.batch.instructor_name = '';
                this.batch.class_time = '';
                this.batch.comments = '';
                this.batch.days.mon = false;
                this.batch.days.tue = false;
                this.batch.days.wed = false;
                this.batch.days.thu = false;
                this.batch.days.fri = false;
                this.batch.days.sat = false;
                this.batch.days.sun = false;

            },
            editbatch(batchid) {
                this.editMode = true;
                this.edit = true;
                fetch("api/batches/" + batchid)
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        this.batch.name = data.b_name;
                        this.batch.startDate = data.b_startDate;
                        this.batch.endDate = data.b_endDate;
                        this.batch.course = data.course_id;
                        this.batch.strength = data.b_strength;
                        this.batch.instructor_name = data.instructor_id;
                    })
                    .catch(err => console.log(err));

            },
            deletebatch(id) {
                if (confirm('Are You Sure?')) {
                    fetch(`api/batches/${id}`, {
                        method: 'delete',
                        headers: {
                            "content-type": "application/json",
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            alert('batch Removed');
                            this.fetchData();
                            window.location.href = window.location.href;
                        })
                        .catch(err => console.log(err));
                }
            },
            addbatch() {
                if (this.edit === false) {
                    // Add
                    fetch('api/batches', {
                        method: 'post',
                        body: JSON.stringify(this.batch),
                        headers: {
                            'content-type': 'application/json',
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            this.batch.batch_name = '';
                            this.batch.batch_duration = '';
                            this.batch.batch_fee = '';
                            this.batch.batch_comments = '';
                            alert('Batch Added');
                            this.fetchData();
                        })
                        .catch(err => console.log(err));
                } else {
                    // Update
                    fetch('api/batches', {
                        method: 'put',
                        body: JSON.stringify(this.batch),
                        headers: {
                            'content-type': 'application/json',
                            "X-CSRF-TOKEN": document.head.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            this.batch.batch_name = '';
                            this.batch.batch_duration = '';
                            this.batch.batch_fee = '';
                            this.batch.batch_comments = '';
                            alert('batch Updated');
                            this.fetchData();
                        })
                        .catch(err => console.log(err));
                }
                this.editMode = false;
            },
        }
    }

</script>

<style></style>