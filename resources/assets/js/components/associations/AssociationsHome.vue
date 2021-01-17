<template>
  <div>
    Home
    {{ categories }}
  </div>
</template>

<script>
  export default {
    data () {
      return {
        categories: null
      }
    },

    mounted () {
      this.getCategories();
    },

    methods: {
      async getCategories () {
        this.categories = await Strapi.getAssociationCategories();
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>