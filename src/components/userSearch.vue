<template>
  <div>
    <div class="row">
      <div class="col-md-10">
        <div class="page-header">
          <h1>用户搜索</h1>
        </div>
        <form action="#" class="user_search">
          <div class="alert alert-info" role="alert">
            <strong>技巧提示:</strong>搜索用户名
          </div>
          <div class="form-group">
            <label for="name">用户名</label>
            <input
              v-model="kw" name="kw"
              type="text" id="name" class="form-control" placeholder="请输入用户名">
          </div>
          <button
            @click="searchData"
            type="button"
            class="btn btn-default">搜索</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data:function(){
      return {
        kw:"",
        pagedata:[],
      }
    },
    mounted:function(){

    },
    methods: {
      searchData:function(){
         this.$http.get("http://127.0.0.1/after/tpls/src/data/user/getUserList.php?kw="+this.kw).then(result=>{
           //console.log(result.data);
            this.pagedata = result.data.pagedata;
            this.$router.push("/ul");
            //将所有的数据传递给用户列表
            //window.bus.$emit("nodify",result.data)//有问题，创建前接受数据，挂载后数据仍然为null
            sessionStorage.setItem("searchdata",JSON.stringify(result.data));
         })
      }
    }
  }
</script>

<style></style>
