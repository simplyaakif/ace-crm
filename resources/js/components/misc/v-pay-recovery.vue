<template>
    <div>
        <button @click="openModal" class="button is-info is-small"><i class="fa fa-receipt"></i>Pay Now
        </button>
        <modal :show="modalOpen" @close="closeModal">
            <div class="box" style="min-width:300px">
                <label for="" class="label">Paid Slip Number</label>
                <input v-model="slip" class="input is-info" type="text" placeholder="Required Enter slip number">
                <button @click="payFee" class="button is-success mt-2">Pay Now</button>
            </div>
        </modal>
    </div>
</template>

<script>
    import {Modal} from '@enso-ui/modal/bulma';
    import ToastrPlugin from "@enso-ui/toastr";
    import Toastr from "@enso-ui/toastr/bulma";

    Vue.use(ToastrPlugin, {
        layout: Toastr,
        options: {
            duration: 3500,
            position: 'top-center',
        },
    });
    Vue.component('modal', Modal);
    export default {
        name: "v-pay-recovery",
        props:{
          id:Number,
        },
        data() {
            return {
                modalOpen: false,
                slip:'',
            }
        },
        methods: {
            openModal() {
                this.modalOpen = true;
            },
            closeModal() {
                this.modalOpen = false;
            },
            payFee(){
                if(this.slip!=='' && this.slip !=null){
                    this.$toastr.info("Updating");
                    this.$http.post('/finance/pay', {id: this.id,slip:this.slip})
                        .then(res => {
                            this.$toastr.success(res.data);
                            console.log('Posted Successfully');
                            this.modalOpen = false;
                            location.reload();
                        })
                        .catch(er => {
                            console.log(er);
                        })
                }
                else {
                    this.$toastr.warning("Warning. Slip number missing.");
                    return null;

                }
            }
        }
    }
</script>

<style scoped>

</style>
