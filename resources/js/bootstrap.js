
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * Next we'll load chosen, for a nicer multi-select box with searching.
 * This will just attach itself to any .form-control-chosen element.
 */

window.chosen = require('chosen-js');

/**
 * simple-lightbox is a lightweight lightbox interface, to make paging through
 * item photos a little nicer. It will register on elements with 'data-lightbox="show"'
 */

 window.SimpleLightbox = require('simple-lightbox');

 /**
 * simple-lightbox is a lightweight lightbox interface, to make paging through
 * item photos a little nicer. It will register on elements with 'data-lightbox="show"'
 */

 window.slider = require("bootstrap-slider");

/**
 * Both chosen and simple-lightbox need to be initialized *after* the rest of the
 * page has loaded - otherwise their elements may not be present yet.
 */

$(() => {
    $('.form-control-chosen').chosen()
    $('[data-toggle="tooltip"]').tooltip()
    let lightbox = new SimpleLightbox({elements: '[data-lightbox="show"]'});
});

const image = document.head.querySelector('meta[name="default-image"]');

window.defaultImage = image ? image.content : '/images/default.png';