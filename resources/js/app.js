
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Pagination from './components/Pagination.vue';
import Search from './components/Search.vue';
import VueSelect from 'vue-select';
import Result from './components/Result.vue';
import { BFormRadioGroup } from 'bootstrap-vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('v-pagination', Pagination);
Vue.component('search-page', Search);
Vue.component('v-select', VueSelect);
Vue.component('b-form-radio-group', BFormRadioGroup);
Vue.component('search-result', Result);

const app = new Vue({
    el: '#app'
});
