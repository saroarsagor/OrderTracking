require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


Vue.component('admin-master', require('./components/admin/adminMaster.vue'));

import  routes from "./routes";
const router = new VueRouter({
    routes // short for `routes: routes`
  })


 


const app = new Vue({
    router,
    mode:'history',
});

app.$mount('#app');
