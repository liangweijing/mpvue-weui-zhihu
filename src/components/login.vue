<template>
  <div class="bgbg">
    <div class="login">
    <div class="loginmain">
      <h2>登录管理系统</h2>
      <form action="#" class="form-horizontal">
        <!-- 让表单在一行中显示form-horizontal -->
        <div class="form-group">
          <label for="username" class="col-lg-1 control-label">用户名</label>
          <div class="col-lg-4">
            <input v-model="uname"type="text" name="username" id="username" class="form-control" placeholder="admin">
          </div>
        </div>
        <div class="form-group"></div>
        <div class="form-group"></div>

        <div class="form-group">
          <label for="password" class="col-lg-1 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
          <div class="col-lg-4">
            <input v-model="upwd"type="password" name="password" id="password" class="form-control" placeholder="admin">
          </div>
        </div>
        <div class="form-group"></div>
        <!-- <div class="form-group"></div> -->

        <div class="form-group">
          <div class="col-lg-11 col-lg-offset-1">
		                <span class="checkbox ">
		                    <label><input type="checkbox" name="" class="checkbox-inline">记住我</label>
		                </span>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-4 col-lg-offset-1">
            <input @click="login"type="button" name="button" value="登录" class="btn btn-danger btn-lg">
            <span class="text"></span>
          </div>

        </div>

      </form>
    </div>
    <div class="rightpic">
      <div id="container">
        <!-- <img src="picture/1.jpg" alt="" width="500px" height="330px"> -->
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  export default{
    data:function(){
      return {
        uname:'',
        upwd:'',
      }
    },
    mounted:function(){

    },
    methods:{
      login:function(){
        //正确的获取到用户名和密码
        //console.log('uname is '+this.uname,',upwd is '+this.upwd);
        //发请求
        this.$http.get("http://127.0.0.1/after/tpls/src/data/user/login.php?uname="+this.uname+"&upwd="+this.upwd)
          .then(result=>{
            //console.log(result.data);
            if(result.data=="true"){
              //登录成功，存储名称，以便显示在头部
              sessionStorage.setItem("uname",this.uname);
              //跳转到首页
              this.$router.push('/index');
            }
          })
      }
    }
  }
</script>

<style>

</style>
