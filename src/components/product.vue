<template>
  <div>
    <!--<h1>商品列表</h1>-->
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <router-link to="/pl" class="list-group-item active">商品管理</router-link>
          <router-link to="/pa" class="list-group-item">添加商品</router-link>
        </div>
      </div>
      <div class="col-md-10">
        <p style="border-bottom:2px solid #fff;"></p>
        <router-view></router-view>
      </div>
    </div>
    <br>
  </div>
</template>

<script>
  export default {
    data:function(){
      return {
        $SIDENAV :null
      }
    },
    mounted:function(){
      //侧边栏导航激活
      this.$SIDENAV = $(".list-group");
      this.$SIDENAV.find("a").click((e)=>{
        var e = e;
      //console.log($(e.target)[0])
      setTimeout(()=>{
        $(e.target).addClass("active")
          .siblings().removeClass("active")
      },100)
    })

  },
  methods:{
  }

  }

</script>

<style>
</style>
