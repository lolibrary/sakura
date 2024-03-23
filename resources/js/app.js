import "@fortawesome/fontawesome-pro/scss/fontawesome.scss";
import "@fortawesome/fontawesome-pro/scss/light.scss";
import "@fortawesome/fontawesome-pro/scss/regular.scss";
import jQuery from 'jquery';
import 'bootstrap';
import axios from 'axios';
import simpleLightbox from 'simple-lightbox';
import { searchJs } from "./search";


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = jQuery;

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Next we'll load chosen, for a nicer multi-select box with searching.
 * This will just attach itself to any .form-control-chosen element.
 */

// window.chosen = require('chosen-js');

/**
 * simple-lightbox is a lightweight lightbox interface, to make paging through
 * item photos a little nicer. It will register on elements with 'data-lightbox="show"'
 */

 window.SimpleLightbox = simpleLightbox;

/**
 * Both chosen and simple-lightbox need to be initialized *after* the rest of the
 * page has loaded - otherwise their elements may not be present yet.
 */

$(() => {
    // $('.form-control-chosen').chosen();
    console.log("debug testing;");
    $('[data-toggle="tooltip"]').tooltip();
    new simpleLightbox({elements: '[data-lightbox="show"]'});
    searchJs.init();
});

const image = document.head.querySelector('meta[name="default-image"]');

window.defaultImage = image ? image.content : '/images/default.png';



// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.component('v-pagination', require('./components/Pagination.vue').default);
// Vue.component('search-page', require('./components/Search.vue').default);
// Vue.component('v-select', require('vue-select').VueSelect);
// Vue.component('b-form-radio-group', require('bootstrap-vue').BFormRadioGroup);
// Vue.component('search-result', require('./components/Result.vue').default);

// const app = new Vue({
//     el: '#app'
// });
