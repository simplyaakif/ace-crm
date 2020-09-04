<template>
    <div>
        <span @click="openModal" class="tx-gray-600"><i
                class="icon ion-more tx-18 lh-0"></i></span>
        
        <div class="modal fade" :id="'modelId'+this.student.id" tabindex="-1" role="dialog"
             aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!--<div class="modal-header">-->
                    <!--<h5 class="modal-title">{{admission.b_name}} Admissions in this Month</h5>-->
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--<span aria-hidden="true">&times;</span>-->
                    <!--</button>-->
                    <!--</div>-->
                    <div class="modal-body bg-gray-200">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="img-fluid rounded-circle" src="http://via.placeholder.com/280x280"
                                         alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                    <img class="card-img-top" src="" alt="">
                                    <div class="card-body">
                                        <h3 class="card-title">Profile Information</h3>
                                        <ul class="list-unstyled">
                                            <li>
                                                Student Name: {{studentData.a_name}}
                                            </li>
                                            <li>
                                                Father Name:
                                                {{studentData.a_father_name}}
                                            </li>
                                            <li>
                                                Date of Birth
                                            </li>
                                            <li>
                                            
                                            </li>
                                            <li>
                                            
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-gray-200">
                        <button type="button" class="btn btn-secondary rounded-circle" data-dismiss="modal">x</button>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</template>
<script>
    export default {
        data() {
            return {
                studentData: {}
            }
        },
        props: {
            student: Object,

        },
        methods: {
            openModal() {
                this.$swal({
                    title: "Loading Record",
                    onOpen: () => {
                        this.$swal.showLoading();
                    }
                });
                this.loadStudents();
                this.$swal.close();
                $('#modelId' + this.student.id).modal();

            },
            async loadStudents() {

                await fetch('misc/load-student-data', {
                    method: 'post',
                    body: JSON.stringify(this.student),
                    headers: {
                        'content-type': 'application/json',
                        "X-CSRF-TOKEN": document.head.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        this.studentData = data;
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>
