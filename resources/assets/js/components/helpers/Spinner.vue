<template>
  <span class="icon">
    <i v-if="loading" class="far fa-spinner-third fa-spin" aria-hidden="true"></i>
    <i v-else :class="'far fa-' + icon" aria-hidden="true"></i>
  </span>
</template>

<script>
  export default {
    name: 'spinner',

    props: {
      icon: String,
      loading: Boolean
    }
  }
</script>

<style lang="scss" scoped>
  .fa {
    margin-right: 5px;
  }
</style>
