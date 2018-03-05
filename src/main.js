// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import VueResource from 'vue-resource'//网络请求模块get,post

Vue.use(VueResource)//使用

//css
import './assets/css/bootstrap.css'
import './assets/css/font-awesome.css'
import './assets/css/animate.css'
import './assets/css/darkly.css'
import './assets/css/main.css'

//js
import './assets/js/jquery'
import './assets/js/jquery.flot'
import './assets/js/bootstrap.js'


Vue.config.productionTip = false

//在全局定义一个bus，用于组件之间的数据传递。
window.bus = new Vue();

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
