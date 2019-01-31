/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import datepicker from 'vuejs-datepicker';

require('./bootstrap');

window.Vue = require('vue');





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('journal', require('./components/JournalComponent.vue').default);
Vue.component('journals-list', require('./components/JournalListComponent.vue').default);
Vue.component('modal-component', require('./components/ModalComponent.vue').default);
Vue.component('add-journal-modal', require('./components/AddJournalModalComponent.vue').default);
Vue.component('delete-component', require('./components/ConfirmationModalComponent.vue').default);
Vue.component('edit-component', require('./components/EditJournalModalComponent.vue').default);
Vue.component('view-details-component', require('./components/ViewJournalDetailsModalComponent.vue').default);
Vue.component('stats-component', require('./components/StatsComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
});