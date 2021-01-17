<template>
  <transition :name="transitionName" mode="out-in">
    <router-view></router-view>
  </transition>
</template>

<script>
  export default {
    data () {
      return {
        transitionName: 'slide-left'
      }
    },

    beforeRouteUpdate (to, from, next) {
      this.transitionName = (to.name === 'detail') ? 'slide-left' : 'slide-right'
      next();
    },
  }
</script>

<style lang="scss" scoped>

</style>