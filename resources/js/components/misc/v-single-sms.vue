
<template>
    <div>
        <span @click="sendMsg">
            <i class="fa fa-comment" aria-hidden="true"></i>
        </span>
    
        <!-- Modal -->
        <div class="modal fade" :id="'smsmodelId'+student.id" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-gray-200">
                        <h5 class="modal-title">Send SMS</h5>
                    </div>
                    <div class="modal-body bg-gray-200">
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <textarea v-model="message" class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                  </div>
                              </div>
                            </div><!-- row -->
        
                        </div>
                    </div>
                    <div class="modal-footer bg-gray-200">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" @click="send">Send Message</button>
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
                message:'',
            }
        },
        props: {
            student:Object,
        },
        methods: {
            sendMsg(){
                $('#smsmodelId'+this.student.id).modal();
            },
            send(){
                this.$http.post('/sms/single', {
                    student: this.student,
                    message: this.message
                })
                    .then(res => {
                        console.log(res.data);
                        this.$toastr.success('Message sent');
                    })
                    .catch(er => {
                        this.$toastr.danger(er);
                        console.log(er);
                    });
            }
        }
    }

</script>