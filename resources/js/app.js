
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as bootstrap from 'bootstrap';
import _ from 'lodash';
import $ from 'jquery';
import Popper from 'popper.js';
import TomSelect from 'tom-select';
import SimpleLightbox from 'simple-lightbox';
import Slider from 'bootstrap-slider';

window._ = _;
window.$ = window.jQuery = $;
window.Popper = Popper;

/**
 * Next we'll load chosen, for a nicer multi-select box with searching.
 * This will just attach itself to any .form-control-chosen element.
 */

window.TomSelect = TomSelect;

/**
 * simple-lightbox is a lightweight lightbox interface, to make paging through
 * item photos a little nicer. It will register on elements with 'data-lightbox="show"'
 */

window.SimpleLightbox = SimpleLightbox;

/**
 * simple-lightbox is a lightweight lightbox interface, to make paging through
 * item photos a little nicer. It will register on elements with 'data-lightbox="show"'
 */

window.slider = Slider;

/**
 * Both chosen and simple-lightbox need to be initialized *after* the rest of the
 * page has loaded - otherwise their elements may not be present yet.
 */

$(() => {
    $('[data-toggle="tooltip"]').tooltip()
    let lightbox = new SimpleLightbox({elements: '[data-lightbox="show"]'});
});

const image = document.head.querySelector('meta[name="default-image"]');

window.defaultImage = image ? image.content : '/images/default.png';

