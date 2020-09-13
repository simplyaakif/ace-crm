<template>
    <div>
        <button @click="openFinanceModal" class="btn btn-primary mt-2">Edit Finance</button>

        <modal :show="modalOpen" @close="closeModal">
            <div class="box" style="padding:30px ;">
                <div v-show="recTable">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Recoveries</h3>
                        <button @click="regInst" class="btn btn-primary">Regenerate Installments</button>
                    </div>
                    <table class="table table-striped mt-3">
                        <tr>
                            <th>Sr.#</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <!--                        <th>Slip #</th>-->
                            <!--                        <th>Date Paid On</th>-->
                        </tr>
                        <tr v-for="(recovery,n) in recoveries" :key="n">
                            <td>{{n+1}}</td>
                            <td class="text-right">{{recovery.instAmount}} Rs</td>
                            <td v-html="$options.filters.dueTag(recovery.dueDate)"></td>
                            <td class="text-center" v-html="$options.filters.paidStatus(recovery.paid_status)"></td>
                            <!--                        <td>{{recovery.slip_number}}</td>-->
                            <!--                        <td>{{recovery.paidOn}}</td>-->

                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">Total Remaining</td>
                            <td colspan="4" class="text-center">{{vRem}}</td>
                        </tr>
                    </table>
                </div>
                <div v-show="!recTable">
                    <div class="columns">
                        <div class="column">
                            <label for="" class="label">Batch Fee Remaining</label>
                            <input v-on:keyup="calRem" class="input" type="text" v-model="remAmount">
                        </div>
                    </div>
                    <div class="columns">
                        <table class="table is-fullwidth">
                            <thead>
                            <tr>
                                <th>Inst. No</th>
                                <th>Batch Fee</th>
                                <th>Due Date <span class="tx-danger">*</span></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tr v-for="(row,n) in instRows" :key="n">
                                <td>{{n+1}}</td>
                                <td><input class="input" type="number" v-on:keyup="calRem" v-on:keydown="calRem"
                                           v-model="row.instAmount"></td>
                                <td>
                                    <input class="input" type="date" v-model="row.dueDate">
                                </td>
                                <td>
                                    <span @click="addInstRow" class="button is-primary"><i class="fa fa-plus"
                                                                                           aria-hidden="true"></i>
                                    </span>
                                    <span v-if="n!=0" @click="deleteInstRow(n)" class="button is-info">
                                        <i class="fa fa-minus"
                                           aria-hidden="true"></i>
                                    </span>
                                </td>
                            </tr>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Required Installment Amount Remaining</th>
                                <th>{{totalRem}}</th>
                                <th>
                                    <button @click="create" class="button is-primary">Create Installments</button>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import moment from 'moment';
    import {Modal} from '@enso-ui/modal/bulma';
    import Toastr from '@enso-ui/toastr/bulma';
    import ToastrPlugin from '@enso-ui/toastr';
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    import Datepicker from "vuejs-datepicker";

    Vue.use(ToastrPlugin, {
        layout: Toastr,
        options: {
            duration: 3500,
            position: 'top-center',
        },
    });

    Vue.component('modal', Modal);
    Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);

    export default {
        components: {
            Datepicker
        },
        props: {
            batch_id: Number,
            student_id: Number,
        },
        filters: {
            dueTag: function (value) {
                var current = moment(value).format('DD-MM-YYYY');
                if (moment(value).isAfter(moment(), 'day')) {
                    return '<span class="tag is-table-tag is-primary">' + current + '</span>';
                } else {
                    return '<span class="tag is-table-tag is-danger">' + current + '</span>';
                }
            },
            paidStatus(val) {
                if (val==0) {
                    return '<span class="tag is-table-tag is-primary">Paid</span>';
                } else {
                    return '<span class="tag is-table-tag ">UnPaid</span>';
                }
            }
        },
        computed: {
            vRem() {
                var i;
                var val = 0;
                for (i = 0; i < this.recoveries.length; i++) {
                    if (this.recoveries[i].paid_status ==0) {
                        val = val + parseInt( this.recoveries[i].instAmount);
                    }
                }
                this.remAmount = parseInt(val);
            return parseInt(val);
            },
        },
        mounted(){
          this.registered_batch_id = this.batch_id;
        },
        data() {
            return {
                modalOpen: false,
                recoveries: [],
                remAmount: 0,
                recTable: true,
                instRows: [],
                registered_batch_id: null,
                totalRem: 0.5,
            }
        },
        methods: {
            create() {
                if (this.totalRem != 0) {
                    this.$toastr.warning('Error ! Installment Amount does not add up to the remaining amount.');
                    return null;
                }
                for (var i = 0; i < this.instRows.length; i++) {
                    if (!this.instRows[i].dueDate || !this.instRows[i].instAmount) {
                        this.$toastr.warning('Error ! Installment Amount or due date missing.');
                        return null;
                    }
                }
                this.$toastr.warning('Updating Recovery Records');
                this.$http.post('/finance/recoveries/edit', {
                    registered_batch_id: this.registered_batch_id,
                    installments: this.instRows
                })
                    .then(res => {
                        console.log(res.data);
                        this.$toastr.success(res.data+'. Kindly reload the page.');
                    })
                    .catch(er => {
                        this.$toastr.danger(er);
                        console.log(er);
                    });
                this.closeModal();
                // window.location.href = window.location.href;
            },
            openFinanceModal() {
                this.$http.get('/session/' + this.student_id + '/' + this.batch_id + '/')
                    .then(res => {
                        this.recoveries = res.data;

                        if (res.data.length > 0) {
                            this.registered_batch_id = res.data[0].registered_batch_id;
                        }
                    })
                    .catch(er => {
                        console.log(er);
                    });
                this.modalOpen = true;
            },
            regInst() {
                this.recTable = false;
                this.instRows = [{
                    instAmount: this.remAmount,
                    dueDate: '',
                }];
                this.totalRem = 0;
            },
            addInstRow: function () {

                this.instRows.push({
                    instAmount: this.totalRem,
                    instDueDate: '',
                });
                this.calRem();

            },
            calRem() {
                var i = 0;
                var val = 0;
                for (i; i < this.instRows.length; i++) {
                    val += parseInt(this.instRows[i].instAmount, 10);
                }
                this.totalRem = this.remAmount - val;

            },
            deleteInstRow: function (idx) {
                this.instRows.splice(idx, 1);
                this.calRem();
            },
            closeModal() {
                this.recTable = true;
                this.modalOpen = false;
            }
        }
    }
</script>

<style>
    .modal-content {
        max-width: 80%;
        font-weight: normal;
    }
</style>
