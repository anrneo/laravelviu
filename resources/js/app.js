

require('./bootstrap');

window.Vue = require('vue');


Vue.component('main-component', require('./components/MainComponent.vue'));
Vue.component('table-component', require('./components/TableComponent.vue'));
Vue.component('form-component', require('./components/FormComponent.vue'));



const app = new Vue({
    el: '#app'
});
