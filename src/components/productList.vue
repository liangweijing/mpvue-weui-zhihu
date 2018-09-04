<template>
  <div>
    <div class="page-header">
      <h1>商品列表</h1>
    </div>
    <div class="row">
      <div class="col-xs-3">
        <form class="form-inline">
          <div class="form-group">
            <label for="page-size">每页显示记录数：</label>
            <select v-model="pageSize"class="form-control" id="page-size">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
            </select>
          </div>
        </form>
      </div>
    </div>
    <table class="table">
      <thead>
      <tr>
        <th>商品编号</th>
        <th>商品图片</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>操作</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="p in productList">
        <th>{{p.lid}}</th>
        <td>
            <img :src="require('../assets/img/'+p.img)"/>
        </td>
        <td>{{p.title}}</td>
        <td>{{p.price}}</td>
        <td>
          <div role="presentation" class="dropdown">
            <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown" href="#"
                    role="button"
                    aria-haspopup="true" aria-expanded="false">
              操作
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">编辑</a></li>
              <li><a href="#">删除</a></li>
              <li><a href="#">全局置顶</a></li>
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
  </div>
</template>
<script>
  export default {
    data:function(){
      return {
        pno:1,
        pageSize:5,
        productList:[],
        pageList:[],
        pageCount:1,
      }
    },
    mounted:function(){
      this.loadProductList();
    },
    methods:{
      loadProductList:function(){
          this.$http.get("http://127.0.0.1/after/tpls/src/data/product/getProductList.php?pno="+this.pno+"&pageSize="+this.pageSize)
            .then((result)=>{
              //console.log(result.data);
              this.productList=result.data.pagedata;
              this.pageCount=result.data.pageCount;
              this.pageList=[];
              for(var i=0;i<this.pageCount;i++){
                this.pageList.push(i+1);
              }
        })
    },
    choosePage:function(page){
      this.pno=page;
      this.loadProductList();
    },

    modifyPage:function(isNext){
      if(isNext){
        this.pno++;
      }else{
        this.pno--;
      }
      this.loadProductList();
    },

  },

  watch:{
    pageSize:function(){
      this.loadProductList()
    }
  }


}

</script>


<style>

img{
  width:60px;
  height:60px;
  border:1px solid #aaa;
}

.table>tbody>tr>td{
    vertical-align: middle;
  }

</style>
