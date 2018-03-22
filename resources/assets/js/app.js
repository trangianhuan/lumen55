import routes from './router/router.js';
Vue.component('main-app', require('./MainApp.vue'));

const router = new VueRouter({
  mode: 'history',
  routes
})

const app = new Vue({
    el: '#app',
    router
});