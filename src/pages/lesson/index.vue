<template>
  <div class="page">
    <div class="page__bd">
      <div class="weui-grids">
        <block v-for="item in grids" :key="index">
          <navigator url="" class="weui-grid" hover-class="weui-grid_active">
            <image class="weui-grid__icon" :src="item.src" />
            <div class="weui-grid__label">{{item.name}}</div>
          </navigator>
        </block>
      </div>
    </div>
  </div>
</template>
<script>
// import base64 from '../../../static/images/base64';
export default {
  data () {
    return {
      grids: [
        { src: '../../../static/img/首页.png', name: 'Button' },
        { src: '../../../static/img/首页.png', name: 'Cell' },
        { src: '../../../static/img/首页.png', name: 'Toast' },
        { src: '../../../static/img/首页.png', name: 'Dialog' },
        { src: '../../../static/img/首页.png', name: 'Progress' },
        { src: '../../../static/img/首页.png', name: 'Msg' },
        { src: '../../../static/img/首页.png', name: 'Article' },
        { src: '../../../static/img/首页.png', name: 'ActionSheet' },
        { src: '../../../static/img/首页.png', name: 'Icons' }
      ]
    }
  },
  methods: {

  }
}
</script>
