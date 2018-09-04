<template>
  <div class="page">
      <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd flex">
          <img class="userinfo-avatar" v-if="userInfo.avatarUrl" :src="userInfo.avatarUrl" background-size="cover" />
              <div class="userinfo-nickname">
                <card :text="userInfo.nickName"></card>
                <p>{{userInfo.time}}</p>
              </div>
        </div>
        <div class="weui-panel__bd">
          <div class="weui-media-box weui-media-box_text">
            <div class="weui-media-box__title weui-media-box__title_in-text">问题一</div>
            <div class="weui-media-box__desc">采用好的回答</div>
          </div>
        </div>
        <div class="weui-panel__ft">
          <div class="weui-cell weui-cell_access weui-cell_link" @click="jumpToDetail">
            <div class="weui-cell__bd flex">
              18个回答
            </div>
            <div class="weui-cell__ft weui-cell__ft_in-access"></div>
          </div>
        </div>
      </div>
      <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd flex">
          <img class="userinfo-avatar" v-if="userInfo.avatarUrl" :src="userInfo.avatarUrl" background-size="cover" />
              <div class="userinfo-nickname">
                <card :text="userInfo.nickName"></card>
                <p>{{userInfo.time}}</p>
              </div>
        </div>
        <div class="weui-panel__bd">
          <div class="weui-media-box weui-media-box_text">
            <div class="weui-media-box__title weui-media-box__title_in-text">问题一</div>
            <div class="weui-media-box__desc">采用好的回答</div>
          </div>
        </div>
        <div class="weui-panel__ft">
          <div class="weui-cell weui-cell_access weui-cell_link">
            <div class="weui-cell__bd flex">
              18个回答
            </div>
            <div class="weui-cell__ft weui-cell__ft_in-access"></div>
          </div>
        </div>
      </div>
  </div>
</template>
<script>
import card from '@/components/card'

export default {
  data () {
    return {
      userInfo: {

      }
    }
  },
  components: {
    card
  },
  methods: {
    jumpToDetail () {
      this.$router.push({ path: '/pages/question/detail/main' })
      console.log(this.$router)
    },
    getUserInfo () {
      // 调用登录接口
      wx.login({
        success: () => {
          wx.getUserInfo({
            success: (res) => {
              this.userInfo = res.userInfo
              this.userInfo.time = '2018-3-14 19:30:28'
            }
          })
        }
      })
    }
  },
  created () {
    this.getUserInfo()
  }
}
</script>
<style scoped>
.flex{
  display: flex;
  align-items: center;
}
.userinfo-avatar{
  width: 60rpx;
  height: 60rpx;
  border-radius: 50%;
  margin-right: 20rpx;
}
.userinfo-nickname{
  font-size: 20rpx;
}
</style>
