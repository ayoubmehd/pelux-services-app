/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from "vue";
import VueRouter from "vue-router";
import router from "./routes/index.js";
import store from "./store/index.js";
import Main from "./Main.vue";
import "./plugins/vue-tailwind.js";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import "../sass/app.scss";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueRouter);

Vue.filter("formatDate", function (value) {
    if (value) {
        return new Date(value).toLocaleDateString("fr")
    }
});
Vue.filter("capetalize", function (value) {
    if (value) {
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
    }
});

const app = new Vue({
    el: '#app',
    router,
    store,
    components: { "main-component": Main }
});
