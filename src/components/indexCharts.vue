<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span>
          </button>
          <h4>爱宠商城后台管理系统</h4>
          <p>公告：爱宠商城目前已上线，具体功能请见“功能详述”</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">网站数据统计</div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
              <tr>
                <th>统计项目</th>
                <th>今日</th>
                <th>昨日</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <th>注册会员</th>
                <td>200</td>
                <td>400</td>
              </tr>
              <tr>
                <th>登陆会员</th>
                <td>2222</td>
                <td>400</td>
              </tr>
              <tr>
                <th>今日发帖</th>
                <td>200</td>
                <td>400</td>
              </tr>
              <tr>
                <th>推荐人数</th>
                <td>200</td>
                <td>400</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">今日访客统计</div>
          <div class="panel-body">
            <!--<canvas id="canvas" class="col-md-12"></canvas>-->
            <div id="placeholder" class="demo-placeholder"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">服务器状态</div>
          <div class="panel-body">
            <p>内存使用率：40%</p>
            <div class="progress">
              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                   aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
              </div>
            </div>
            <p>数据库使用率：20%</p>
            <div class="progress">
              <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                   aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
              </div>
            </div>
            <p>磁盘使用率：60%</p>
            <div class="progress">
              <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                   aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
              </div>
            </div>
            <p>CPU使用率：80%</p>
            <div class="progress">
              <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                   aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">团队留言板</div>
          <div class="panel-body">
            <div class="col-md-7" id="leave">
              <div v-for="n in msgArr" class="media well">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object wh50" src="../assets/img/a.png">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading">{{n.uname}}：</h3>
                  <h4>{{n.msg}}</h4>
                  <h5 style="text-align:right">{{n.t}}</h5>
                </div>
              </div>
              <!--清除留言面板的内容-->
            </div>
            <a @click="clearMsg"class="btn btn-info">清空留言板</a>
            <div class="col-md-5">
              <form action="">
                <div class="form-group">
                  <label for="text1">输入留言内容</label>
                                <textarea v-model="msg" class="form-control" id="text1" rows="5" cols="10"
                                          placeholder="请输入留言内容"></textarea>
                  <a @click="leaveMsg(msg)"class="btn btn-default">留言</a>
                </div>
              </form>
              <div class="panel panel-default">
                <div class="panel-heading">团队联系手册</div>
                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">站长(小亭子)：<span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;1111111111</li>
                    <li class="list-group-item">技术(小亭子)：<span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;13456127694</li>
                    <li class="list-group-item">推广(小亭子)：<span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;13457815482</li>
                    <li class="list-group-item">客服(小亭子)：<span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;13134567782&nbsp;&nbsp;<span class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp;028-888888</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data:function(){
        return {
          //折线图
           flotdata:[],
           totalPoints:300,
           plot:null,
           updateInterval:100,
           myTimer:null,
            uname:"",
            msg:"",
            msgArr:[],
            t:"",
        }
      },
      mounted:function(){
        this.isLogin();
        //初始化plot
        this.plot = $.plot("#placeholder", [this.getRandomdata()], {
          series: {
            shadowSize: 0	// Drawing is faster without shadows
          },
          yaxis: {
            min: 0,
            max: 100
          },
          xaxis: {
            show: false
          }
        });
        //启动周期性定时器来绘制折线图
        this.myTimer = setInterval(()=>{
        this.plot.setData([this.getRandomdata()]);
        this.plot.draw();
      }, this.updateInterval);
      },
      methods:{
         isLogin:function(){
              console.log(sessionStorage.getItem("uname"))
              //从登陆页面传递过来的用户名
              this.uname=sessionStorage.getItem("uname");
             //获取留言内容
             if(localStorage.getItem("msgArr"))
               this.msgArr=JSON.parse(localStorage.getItem("msgArr"));
          },
        leaveMsg:function(msg){
            console.log(this.uname)
            var obj = {uname:this.uname,msg:this.msg,t:new Date().toLocaleString()}
            this.msgArr.push(obj);
            this.msg="";
            //将留言内容存储到本地，以方便下次登陆时获取之前的留言。
            localStorage.setItem("msgArr",JSON.stringify(this.msgArr));
        },
        clearMsg:function(){
          //清空内容，并重新刷新页面
          localStorage.removeItem("msgArr");
          this.$router.go(0);
        },
        getRandomdata:function(){
            if (this.flotdata.length > 0)
            this.flotdata = this.flotdata.slice(1);
            while (this.flotdata.length < this.totalPoints) {
              var prev = this.flotdata.length > 0 ? this.flotdata[this.flotdata.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;
              if (y < 0) {
                y = 0;
              } else if (y > 100) {
                y = 100;
              }
              this.flotdata.push(y);
            }
            var res = [];
            for (var i = 0; i < this.flotdata.length; ++i) {
              res.push([i, this.flotdata[i]])
            }
            //console.log(res);
            return res;
        }
      },
      destroyed:function(){
        //清理工作
        clearInterval(this.myTimer);
      },

    }
</script>

<style>
  #leave{
    overflow:auto;
    height:500px;
  }

  #placeholder{
    height:200px;
  }

</style>
