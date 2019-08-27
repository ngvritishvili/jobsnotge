/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'bootstrap';
import Vue from 'vue';
import Search from "vue-instantsearch";
import axios from 'axios';
import VueAxios from 'vue-axios'

window.Vue = require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueAxios, axios);

Vue.use(Search);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('instant-search', require('./components/InstantVueSearch.vue').default);
Vue.component('go-search', require('./components/JustSearch.vue').default);
Vue.component('job-search', require('./components/JobSearch.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.mixin({
//     methods: {
//         route: route
//     }
// });
const app = new Vue({
    el: '#app',
 // components: { InstantVueSearch },


    ready(){

        alert('READY')
    }

    });
