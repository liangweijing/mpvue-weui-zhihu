<template>
  <div>
    <!--<h1>用户列表</h1>-->
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <router-link to="/ul" class="list-group-item active">用户管理</router-link>
          <router-link to="/us" class="list-group-item">用户搜索</router-link>
          <span role="button" class="list-group-item" data-toggle="modal" data-target="#myModal">添加用户</span>
        </div>
      </div>
      <div class="col-md-10">
        <p style="border-bottom:2px solid #fff;"></p>
        <router-view></router-view>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">添加用户</h4>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="addname">用户名(2-8位)</label>
                <input
                  v-model="uname"name="uname"
                  id="addname" type="text" class="form-control" placeholder="请输入用户名">
              </div>
              <div class="form-group">
                <label for="password">密码（2-8位）</label>
                <input
                  v-model="upwd"name="upwd"
                  id="password" type="password" class="form-control" placeholder="请输入密码">
              </div>
              <div class="form-group">
                <label for="password1">确认密码</label>
                <input
                  v-model="cpwd"
                  id="password1" type="password" class="form-control" placeholder="请输入确认密码">
              </div>
              <div class="form-group">
                <label for="addemail">求输入用户邮箱</label>
                <input
                  v-model="email" name="email"
                  id="addemail" type="email" class="form-control" placeholder="求输入用户邮箱">
              </div>
              <div class="form-group">
                <label for="addgroup">性别</label>
                <select name="gender"id="addgroup" class="form-control">
                  <option value="0">男</option>
                  <option value="1">女</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div id="msg"style="color:red;display:none;">
              <h1>{{msg}}</h1>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button
              @click="addUser()"
              type="button" class="btn btn-primary">提交</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            {{msg}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="success">
        <h1>{{msg}}</h1>
      </div>
    </div>

  </div>


</template>

<script>
  export default {
    data:function(){
      return {
        $SIDENAV :null,
        uname:"",
        upwd:"",
        email:"",
        gender:0,
        cpwd:"",
        msg:"",

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
      addUser:function(){
        this.$http.get("http://127.0.0.1/after/tpls/src/data/user/addUser.php?uname="+this.uname+"&email="+this.email+"&gender="+this.gender)
          .then(result=>{
            console.log(result.data.code);
            //console.log(result.data.msg)
            this.msg=result.data.msg
            if(result.data.code==1){
              //模态框
              $("#myModal").hide();
              //蒙层
              $(".modal-backdrop ").hide();
              //成功模态框
              $("#success").show();
              setTimeout(()=>{
                $("#success").hide();
              },2000);
            }else{
                $("#msg").show();
            }
          })
      }
    }
  }
</script>

<style>
  #success{
    width:100%;
    padding:20px;
    background:lightblue;
    position:relative;
    display:none;
    color:hotpink;
    text-align:center;
    border-radius:20px;
  }
</style>
