import Vue from 'vue'
import App from './App'
import '@/assets/css/weui.css'
import MpvueRouterPatch from 'mpvue-router-patch'

Vue.use(MpvueRouterPatch)

Vue.config.productionTip = false
App.mpType = 'app'

const app = new Vue(App)
app.$mount()
