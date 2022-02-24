require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';

const router = new VueRouter({
  routes,
  mode:'history'
  
})

//import helpers globle user

import User from './Helpers/User';
window.User = User


// Import Notification Class
 import Notification from './Helpers/Notification';
 window.Notification = Notification

 
// const router = VueRouter.createRouter({
  
//   history: VueRouter.createWebHashHistory(),
//  routes, // short for `routes: routes`
// })
// export default router;

//sweetalert 

import Swal from 'sweetalert2'

window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;
// CommonJS
//const Swal = require('sweetalert2')


window.Reload = new Vue();



const app = new Vue({
    el: '#app',
   router
});
