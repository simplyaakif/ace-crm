
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');
// import Multiselect from 'vue-multiselect'

// import("vue-sweetalert2").then(VueSweetalert2 => {
//     Vue.use(VueSweetalert2);
//
// });
// import VueSweetalert2 from 'vue-sweetalert2';
// import VueMask from 'v-mask';


// import {Modal, ModalCard} from '@enso-ui/modal/bulma';
// import { VueForm } from '@enso-ui/forms/bulma';

import axios from 'axios';
window.axios = axios;
Vue.prototype.$http = axios;
// import { library } from '@fortawesome/fontawesome-svg-core';
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
// import { faVuejs, faGithub } from '@fortawesome/free-brands-svg-icons';
// import { faCheck, faTimes,faLocationArrow } from '@fortawesome/free-solid-svg-icons';


Vue.component('fa',
    ()=>import (/*webpackChunkName:"FontAwesomeIcon"*/'@fortawesome/vue-fontawesome')
        .then(({ FontAwesomeIcon }) => FontAwesomeIcon));

// Vue.component('fa', FontAwesomeIcon);




// Vue.use(Toastr,()=>import (/*webpackChunkName:"Toastr"*/'@enso-ui/toastr/bulma'));
// Vue.use(ToastrPlugin,()=>import (/*webpackChunkName:"ToastrPlugin"*/'@enso-ui/toastr'));

// import Toastr from '@enso-ui/toastr/bulma';
// import ToastrPlugin from '@enso-ui/toastr';
// Vue.use(ToastrPlugin, {
//     layout: Toastr,
//     options: {
//         duration: 3500,
//         position: 'top-center',
//     },
// });

// import { VueTable } from '@enso-ui/tables/bulma';
// import { IntervalFilter, DateIntervalFilter} from '@enso-ui/filters/bulma';

// library.add(faVuejs, faGithub, faCheck, faTimes,faLocationArrow);

// Vue.component('example-component', () => import(/* webpackChunkName:"example-component" */ './components/ExampleComponent.vue'));
// Vue.component('modal', () => import(/* webpackChunkName:"modal" */ Modal));
// Vue.component('v-searchquery', () => import(/* webpackChunkName:"v-searchquery" */ './components/vdqueries/v-searchquery.vue'));
Vue.component('v-createquery', () => import(/* webpackChunkName:"v-createquery" */ './components/vdqueries/v-createquery.vue'));
Vue.component('v-createadmission', () => import(/* webpackChunkName:"v-createadmission" */ './components/vdadmissions/v-createadmission.vue'));
// Vue.component('v-searchadmission', () => import(/* webpackChunkName:"v-searchadmission" */ './components/vdadmissions/v-searchadmission.vue'));
Vue.component('v-batches', () => import(/* webpackChunkName:"v-batches" */ './components/vdacademics/v-batches.vue'));
Vue.component('v-monthly-batch-admissions', () => import(/* webpackChunkName:"v-monthlyBatchAdmissions" */ './components/misc/v-monthlyBatchAdmissions.vue'));
Vue.component('v-student', () => import(/* webpackChunkName:"v-student" */ './components/misc/v-student.vue'));
Vue.component('v-single-sms', () => import(/* webpackChunkName:"v-single-sms" */ './components/misc/v-single-sms.vue'));
Vue.component('v-table-data', () => import(/* webpackChunkName:"v-table-data" */ './components/misc/v-table-data.vue'));
Vue.component('v-admission-table-data', () => import(/* webpackChunkName:"v-admission-table-data" */ './components/vdadmissions/v-admission-table-data.vue'));
Vue.component('v-recovery-table', () => import(/* webpackChunkName:"v-recovery-table" */ './components/misc/v-recovery-table.vue'));
Vue.component('v-expenses-table', () => import(/* webpackChunkName:"v-expenses-table" */ './components/misc/v-expenses-table.vue'));
Vue.component('v-f-admissions-table', () => import(/* webpackChunkName:"v-f-admissions-table" */ './components/misc/v-f-admissions-table.vue'));
Vue.component('v-edit-finance-student', () => import(/* webpackChunkName:"v-edit-finance-student" */ './components/misc/v-edit-finance-student.vue'));
Vue.component('v-edit-student', () => import(/* webpackChunkName:"v-edit-student" */ './components/misc/v-edit-student.vue'));
// Vue.component('v-media-manager', () => import(/* webpackChunkName:"v-media-manager" */ './components/misc/v-media-manager.vue'));
// Vue.component('v-upload-dp', () => import(/* webpackChunkName:"v-upload-dp" */ './components/misc/v-upload-dp.vue'));

// Charting Component
Vue.component('v-bar-chart', () => import(/* webpackChunkName:"v-bar-chart" */ './components/vdCharts/v-bar-chart'));


// Recovery With Slip Number
Vue.component('v-pay-recovery', () => import(/* webpackChunkName:"v-bar-chart" */ './components/misc/v-pay-recovery'));

// Vue.component('modal-card', ModalCard);
// Vue.component('vue-form', VueForm);
// Vue.component('date-interval-filter', DateIntervalFilter);


require('../assets/vendor/MediaManager/js/manager');



// Vue.use(VueMask);

const app = new Vue({
    el: '#app',

});
