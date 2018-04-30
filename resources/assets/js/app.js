
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('task-draggable', require('./components/TaskComponent.vue'));
Vue.component('uploader', require('./components/uploader/view.vue'));


import post from './components/post/post'
import formPost from './components/post/form'

import VueRouter from 'vue-router'
Vue.use(VueRouter);
const router = new VueRouter({
  mode: 'hash',
  routes: [
    {
      path: '/',
      component: post
    },
    {
      path: '/create',
      component: formPost
    },
    {
      path: '/edit/:postId',
      component: formPost
    },
  ]
})

const app = new Vue({
    el: '#app',
    router,
});
