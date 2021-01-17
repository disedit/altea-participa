<template>
<div>
  <div v-if="categories">
    <ul>
      <association-category v-for="category in categories" :key="category.id" :category="category" />
    </ul>
  </div>
  <div v-else-if="loading">
    Loading...
  </div>
</div>
</template>

<script>
  import AssociationCategory from './AssociationCategory.vue';

  export default {
    components: {
      AssociationCategory
    },

    data () {
      return {
        loading: true,
        categories: null
      }
    },

    mounted () {
      this.getCategories();
    },

    methods: {
      async getCategories () {
        this.loading = true;
        this.categories = await Strapi.getAssociationCategories();
        this.loading = false;
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';


</style>