<template>
<div>
  <!--导航-->
  <div class="nav navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <router-link to="/index" class="navbar-brand">爱宠商城后台管理系统</router-link>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><router-link to="/index"><span class="glyphicon glyphicon-home"></span>后台首页</router-link></li>
          <li><router-link to="/ul"><span class="glyphicon glyphicon-user"></span>用户管理</router-link></li>
          <li><router-link to="/pl"><span class="glyphicon glyphicon-list-alt"></span>商品管理</router-link></li>
          <li><router-link to="/fun"><span class="glyphicon glyphicon-tag"></span>功能详述</router-link></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{uname}}
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dLabel">
              <li><a href="#" class=""><span class="glyphicon glyphicon-home"></span>前台首页</a></li>
              <li><a href="#" class=""><span class="glyphicon glyphicon-user"></span>个人主页</a></li>
              <li><a href="#" class=""><span class="glyphicon glyphicon-cog"></span>个人设置</a></li>
              <li><a href="#" class=""><span class="glyphicon glyphicon-credit-card"></span>账户中心</a></li>
              <li><a href="#" class=""><span class="glyphicon glyphicon-heart"></span>我的收藏</a></li>
            </ul>
          </li>
          <li><a href="index.html"><span class="glyphicon glyphicon-off"></span>退出</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--/内容-->
  <div class="container">
    <router-view></router-view>
  </div>
</div>
</template>

<script>
  export default {
    data:function(){
      return {
        $NAV :null,
        uname:'',
      }
    },
    mounted:function(){
      //导航激活
      this.$NAV = $(".navbar-collapse");
      //console.log(1)
      this.$NAV.find("a").click((e)=>{
        //console.log($(e.target)[0])
        $(e.target).parent().addClass("active")
          .siblings().removeClass("active")
      })
      this.isLogin();
    },
    methods:{
      isLogin:function(){
        //从登陆页面传递过来的用户名
        this.uname=sessionStorage.getItem("uname");

        //将数据向页面传递完，清除sessionStorage，在indexChart中清除
        //不清除，因为需要用户名
      }
    }
  }
</script>
