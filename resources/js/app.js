require('./bootstrap');
import Vue from 'vue';
import UserComponent from './components/UserComponent.vue';

Vue.component('user-component', UserComponent);

const app = new Vue({
    el: '#app'
});
