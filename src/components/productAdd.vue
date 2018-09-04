<template>
  <div class="">
    <div class="row">
      <div class="col-md-10">
        <div class="page-header">
          <h1>添加商品</h1>
        </div>
        <form action="#">
          <div class="form-group">
            <label for="title">商品名称</label>
            <input type="text" id="title" class="form-control" placeholder="请输入商品名称">
          </div>
          <div class="form-group">
            <label for="title">商品图片</label>
            <input type="text" id="pic" class="form-control" placeholder="请输入商品的路径">
          </div>
          <div class="form-group">
            <label for="title">商品价格</label>
            <input type="text" id="price" class="form-control" placeholder="请输入商品价格">
          </div>
          <div class="form-group">
            <label for="text">商品描述</label>
            <textarea class="form-control" name="" id="text" cols="30" rows="10"></textarea>
          </div>
          <div class="checkbox pull-left">
            <label>
              <input type="checkbox">全局置顶
            </label>
          </div>
          <button class="btn btn-default pull-right" type="submit">发布商品</button>
        </form>
      </div>
    </div>
  </div>
</template>
