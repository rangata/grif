
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import axios from 'axios'
import BootstrapVue from 'bootstrap-vue';
import '@syncfusion/ej2-base/styles/bootstrap.css'
import '@syncfusion/ej2-vue-grids/styles/material.css'
Vue.use(require('vue-moment'));
Vue.use(BootstrapVue);
import VueSwal from 'vue-swal'

import {Sidebar, AppHeader} from '@coreui/vue';

Vue.use(VueSwal)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('goods', require('./components/goods/goods.vue').default);
Vue.component('customers-list', require('./components/customers/CustomerList').default);
Vue.component('docs', require('./components/documents/docs').default);
Vue.component('header-app', require('./components/header').default);
Vue.component('upload-file', require('./components/documents/UploadFile').default);
Vue.component('company-partial', require('./components/companies/company-partial').default);
Vue.component('customer-show', require('./components/customers/CustomerShow').default);
// Vue.component('full', require('./components/full').default);

const app = new Vue({
    el: '#app'
});
