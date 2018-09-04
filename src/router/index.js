import Vue from 'vue'
import Router from 'vue-router'//路由模块
//import Hello from '@/components/Hello'

import Login from '@/components/login'
//主页面
import Index from '@/components/index'
import IndexCharts from '@/components/indexCharts'//@是统一资源符，直接在src目录中寻找
//功能详述
import FunctionModel from '@/components/function'
//用户管理
import User from '@/components/user'
import UserList from '@/components/userList'
import UserSearch from '@/components/userSearch'
//商品管理
import Product from '@/components/product'
import ProductList from '@/components/productList'
import ProductAdd from '@/components/productAdd'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Login
    },
    {
      path:'/index',
      component: Index,
      children:[
        {path:'/',component:IndexCharts},
        {path:'/pl',
         component:Product,
         children:[
           {path:'/',component:ProductList},
           {path:'/pa',component:ProductAdd},
         ]
        },
        {path:'/ul',
         component:User,
         children:[
           {path:"/",component:UserList},
           {path:"/us",component:UserSearch},
          ]
        },
        {path:'/fun',component:FunctionModel},
      ]
    }
  ]
})
