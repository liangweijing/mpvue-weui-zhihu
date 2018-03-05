<template>
  <div>
    <div class="page-header">
      <h1>用户列表</h1>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>用户名</th>
          <th>邮箱</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="u in userList">
          <th>{{u.uid}}</th>
          <td>{{u.uname}}</td>
          <td>{{u.email}}</td>
          <td>
            <div role="presentation" class="dropdown">
              <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown" href="#"
                      role="button"
                      aria-haspopup="true" aria-expanded="false">
                操作
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <!--传入用户uid，以便操作-->
                <li><a
                  @click="editUserClick(u.uid,u.uname,u.email)"
                  href="#">编辑</a></li>
                <li><a
                  @click="deleteUserClick(u.uid,u.uname)"
                  href="#">删除</a></li>
                <li><a
                  @click="updateUserUpwdClick(u.uid,u.uname,u.upwd)"
                  href="#">修改密码</a></li>
              </ul>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation" class="pull-right">
      <ul class="pagination">
        <li
          v-if="pno>1"
          @click="modifyPage(false)"
          ><a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <!--<li class="active"><a href="#">1</a></li>-->
        <!--<li><a href="#">2</a></li>-->
        <!--<li><a href="#">3</a></li>-->
        <!--<li><a href="#">4</a></li>-->
        <!--<li><a href="#">5</a></li>-->
        <li
          v-for="page in pageList"
          :class="{active:page==pno}"
          @click="choosePage(page)"
          ><a href="#">{{page}}</a></li>

        <li
          v-if="pno<pageCount"
          @click="modifyPage(true)"
          >
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>

    <!--编辑，修改密码，删除-->
    <div class="edit">
      <div>
        <p>
          <span>用户ID：</span>
          <input
            :value="uid"
            type="text" disabled/>
        </p>
        <p>
          <span>用户名：</span>
          <input
            v-model="uname"
            type="text" placeholder="请输入2-8位用户名"/>
        </p>
        <p>
          <span>密码&nbsp;&nbsp;&nbsp;：</span>
          <input
            v-model="upwd"
            type="text" placeholder="请输入密码"/>
        </p>
        <p>
          <span>邮箱&nbsp;&nbsp;&nbsp;：</span>
          <input
            v-model="email"
            type="text" placeholder="请输入邮箱"/>
        </p>
        <button @click="sureEditClick">确定</button>
        <button @click="cancelEditClick">取消</button>
      </div>
    </div>
    <!--修改密码-->
    <div class="update">
      <div>
        <p>
          <span>用户名：</span>
          <input
            :value="uname"
            type="text" disabled/>
        </p>
        <p>
          <span>旧密码：</span>
          <input
            v-model="upwd"
            type="text" placeholder="请输入旧密码"/>
        </p>
        <p>
          <span>新密码：</span>
          <input
            v-model="cpwd"
            type="text"placeholder="请输入新密码"/></p>
      <button @click="sureUpdateClick">确定</button>
      <button @click="cancelUpdateClick">取消</button>
      </div>
    </div>
    <!--删除-->
    <div class="delete">
      <div>
        <span>确定删除&nbsp;&nbsp;{{uid}}:{{uname}}&nbsp;&nbsp;的用户吗？</span>
        <button @click="sureDeleteClick">确定</button>
        <button @click="cancelDeleteClick">取消</button>
      </div>
    </div>
    <!--弹出框-->
    <div class="updatepwdModel">
      <h2>{{updateMsg}}</h2>
    </div>
  </div>
</template>
<script>
//    pno:1,  //当前页面
//    pageSize:5,//页面显示数
//    userList:[],//用户列表
//    pageList:[],//分页数组，[1,2,3..]
//    pageCount:1,//分页数
//    msg:搜索的数据
  export default {
    data:function(){
      return {
        pno:1,
        pageSize:9,
        userList:[],
        pageList:[],
        pageCount:1,

        msg:null,

        uid:0,
        uname:"",
        email:"",
        upwd:"",
        cpwd:"",

        updateMsg:""

      }
    },
//    beforeCreate:function(){不行，组件挂载后this.msg仍然没数据
//      window.bus.$on("nodify",msg=> {
//        //console.log(msg)
//        this.msg = Object.assign({}, msg);
//        console.log(this.msg)
//      })
//    },
    mounted:function(){
      //用本地会话存储搜索的信息
      this.msg = JSON.parse(sessionStorage.getItem("searchdata"));
      //console.log(this.msg)
      this.loadUserList();
    },
    methods:{
      loadUserList:function(){
        //console.log(this.msg);
        //搜索
        if(this.msg){
            this.userList=this.msg.pagedata;
            this.pageCount=this.msg.pageCount;
            this.pageList=[];
            for(var i=0;i<this.pageCount;i++){
              this.pageList.push(i+1);
            }
            //将数据向页面传递完，清除sessionStorage
            sessionStorage.removeItem("searchdata");
          }
        //加载全部
        else{
          this.$http.get("http://127.0.0.1/after/tpls/src/data/user/getUserList.php?pno="+this.pno+"&pageSize="+this.pageSize)
            .then((result)=>{
                //console.log(result.data);
                this.userList=result.data.pagedata;
                this.pageCount=result.data.pageCount;
                this.pageList=[];
                for(var i=0;i<this.pageCount;i++){
                  this.pageList.push(i+1);
                }
                })
        }
      },

      choosePage:function(page){
        this.pno=page;
        this.loadUserList();
      },

      modifyPage:function(isNext){
        if(isNext){
          this.pno++;
        }else{
          this.pno--;
        }
        this.loadUserList();
      },

      //编辑用户信息
      editUserClick:function(uid,uname,email){
        $(".edit").show();
        //将uid保存，以便操作
        //console.log(uid)
        this.uid = uid;
        this.uname=uname;
        this.email = email;
      },
      sureEditClick:function(){
        //console.log(this.uid,this.uname,this.upwd,this.email)
        this.$http.get("http://127.0.0.1/after/tpls/src/data/user/editUser.php?uid="+this.uid+"&uname="+this.uname+"&upwd="+this.upwd+"&email="+this.email)
          .then(result=>{
            //console.log(result.data);
            if(result.data.code==1){
              this.updateMsg=result.data.msg
            }else{
              this.updateMsg="未修改任何用户信息！"
            }
            $(".edit").hide();
            $(".updatepwdModel").show();
            setTimeout(()=>{
              $(".updatepwdModel").hide();
            },2000)
          }).then(()=>{
                  this.loadUserList();
              })
      },
      cancelEditClick:function(){
        $(".edit").hide();
      },

      //更新密码
      updateUserUpwdClick:function(uid,uname,upwd){
        $(".update").show();
        this.uid=uid;
        this.uname=uname;
        this.upwd=upwd;
      },
      sureUpdateClick:function(){
        this.$http.get("http://127.0.0.1/after/tpls/src/data/user/updateUpwd.php?uid="+this.uid+"&upwd="+this.upwd+"&cpwd=123"+this.cpwd+"&uname="+this.uname)
          .then(result=>{
              if(result.data.code==1)
                  this.updateMsg = result.data.msg;
              else
                this.updateMsg = "更新密码失败！";
                //弹出框
                $(".update").hide();
                $(".updatepwdModel").show();
                setTimeout(()=>{
                  $(".updatepwdModel").hide();
              },2000)
        })
        .then(()=>{
          this.loadUserList();
        })
      },
      cancelUpdateClick:function(){
        $(".update").hide();
      },

      //删除用户
      deleteUserClick:function(uid,uname){
        $(".delete").show();
        this.uid=uid;
        this.uname=uname;
      },
      sureDeleteClick:function(){
        //console.log(1);
        this.$http.get("http://127.0.0.1/after/tpls/src/data/user/deleteUser.php?uid="+this.uid)
          .then(result=>{
            if(result.data.code==1)
                this.updateMsg = result.data.msg;
            else
                this.updateMsg = "删除用户失败！";
            //弹出框
            $(".delete").hide();
            $(".updatepwdModel").show();
            setTimeout(()=>{
              $(".updatepwdModel").hide();
            },2000)
          })
          .then(()=>{
              this.loadUserList();
          })
      },
      cancelDeleteClick:function(){
        $(".delete").hide();
      },

    },
  }
</script>

<style>
  .edit,.update,.delete{
    position:absolute;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.3);
    z-index:20;
    display:none;
  }
  .edit>div,.update>div,.delete>div{
    background:#eee;
    padding:40px;
    border-radius:10px;
    position:absolute;
    left:50%;
    margin-left:-250px;
    margin-top:200px;
  }
  .edit>div span,.update>div span,.delete>div span{
    font-size:30px;
  }
  .edit>div input,.update>div input{
    width:300px;
    height:40px;
  }
  .edit>div>button,.update>div>button,.delete>div>button{
    padding:10px;
    font-size:20px;
    font-weight:bold;
  }
  .deleteModel,.updatepwdModel{
    width:400px;
    padding:20px;
    background:lightblue;
    position:relative;
    display:none;
    color:hotpink;
    text-align:center;
    border-radius:20px;
    position:absolute;
    top:300px;
    left:50%;
    margin-left:-300px;
  }
</style>
