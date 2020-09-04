<template>
    <div class="d-inline-block">
        <span @click="openModal" class="text-decoration-none " style="color:inherit">
            <span class="square-8 rounded-circle bg-purple mr-1">
            </span>
                <span class="mr-3">
                    {{admission.b_name}}-{{admission.b_timings}} ({{admission.admissions_count}})
                    </span>
        </span>
    
        <div class="modal fade" :id="'modelId'+this.admission.id" tabindex="-1" role="dialog"
             aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">{{admission.b_name}} Admissions in this Month</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-responsive text-capitalize">
                            <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Session</th>
                                <th>Mobile</th>
                                <th>Date of Admission</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(student,k) in students" :key="k">
                                <td>{{k+1}}</td>
                                <td>{{student.a_name}}</td>
                                <td>{{student.b_name}}</td>
                                <td>{{student.a_mobile}}</td>
                                <td>{{student.session_start_date}}</td>
                                
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
    
        <!-- Modal -->
    </div>
</template>

<script>
    import VueSweetalert2 from 'vue-sweetalert2';

    Vue.use(VueSweetalert2);
    export default {
        props: {
            admission: Object,
        },
        data() {
            return {
                students: [],
            }
        },
        methods: {
            openModal() {
                this.$swal({
                    title: "Loading Records",
                    onOpen: () => {
                        this.$swal.showLoading();
                    }
                });
                this.loadStudents();
                this.$swal.close();
                $('#modelId' + this.admission.id).modal();

            },
            async loadStudents() {

                await fetch('misc/load-month-students-for-batch', {
                    method: 'post',
                    body: JSON.stringify(this.admission),
                    headers: {
                        'content-type': 'application/json',
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        this.students = data;
                    })
                    .catch(err => console.log(err));
                // return this.students;
            }

        }
    }
</script>