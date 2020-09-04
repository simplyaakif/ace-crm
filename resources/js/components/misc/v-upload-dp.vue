<template>
    <div class="text-center">
        <button class="button is-success" @click="uploadDp">Save</button>
    </div>
</template>

<script>
    import Toastr from '@enso-ui/toastr/bulma';
    import ToastrPlugin from '@enso-ui/toastr';

    Vue.use(ToastrPlugin, {
        layout: Toastr,
        options: {
            duration: 3500,
            position: 'top-center',
        },
    });
    export default {
        data() {
            return {
                dpUrl: '',
            }
        },
        props:{
            id:Number,
        },
        mounted(){
            EventHub.listen('file_selected', data => {
                this.dpUrl = data;
            })
        },
        methods:{
            uploadDp(){
                if(this.dpUrl === ''){
                    this.$toastr.warning('Kindly select image first.');
                    return null;
                }
                this.$http.post('/student/dp', {
                    id: this.id,
                    url: this.dpUrl,
                })
                    .then(res => {
                        this.$toastr.success(res.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

