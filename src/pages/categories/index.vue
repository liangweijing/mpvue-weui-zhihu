<template>
  <div class="page">
     <div class="page__bd">
      <div class="weui-tab">
        <div class="weui-navbar">
          <block v-for="(item,index) in tabs" :key="index">
            <div :id="index" :class="{'weui-bar__item_on':activeIndex == index}" class="weui-navbar__item" @click="tabClick">
              <div class="weui-navbar__title">{{item}}</div>
            </div>
          </block>
          <div class="weui-navbar__slider" :class="navbarSliderClass"></div>
        </div>
        <div class="weui-tab__panel">
          <div class="weui-tab__content" :hidden="activeIndex != 0">选项一的内容</div>
          <div class="weui-tab__content" :hidden="activeIndex != 1">选项二的内容</div>
          <div class="weui-tab__content" :hidden="activeIndex != 2">选项三的内容</div>
          <div class="weui-tab__content" :hidden="activeIndex != 3">选项四的内容</div>
          <div class="weui-tab__content" :hidden="activeIndex != 4">选项五的内容</div>
          <div class="weui-tab__content" :hidden="activeIndex != 5">选项六的内容</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      tabs: ['知识', '应用', '品牌', '企业', '人物', '资讯'],
      activeIndex: '0',
      fontSize: 30
    }
  },
  computed: {
    navbarSliderClass () {
      return `weui-navbar__slider_${this.activeIndex}`
    }
  },
  methods: {
    tabClick (e) {
      console.log(e)
      this.activeIndex = e.currentTarget.id
    }
  }
}
</script>

<style scoped>
.weui-bar__item_on{
  color:#1979E7;
}
.weui-navbar__slider{
  left:4rpx;
  background: #1979E7;
  width: 16%;
}
.weui-navbar__slider_0 {
  transform: translateX(0);
}
.weui-navbar__slider_1 {
  transform: translateX(125rpx);
}
.weui-navbar__slider_2 {
  transform: translateX(250rpx);
}
.weui-navbar__slider_3 {
  transform: translateX(375rpx);
}
.weui-navbar__slider_4 {
  transform: translateX(500rpx);
}
.weui-navbar__slider_5 {
  transform: translateX(625rpx);
}
</style>