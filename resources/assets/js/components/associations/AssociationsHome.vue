<template>
  <div class="association-home">
    <div v-if="categories" class="categories">
      <ul>
        <association-category v-for="category in categories" :key="category.id" :category="category" />
      </ul>
    </div>
    <div v-else-if="loading" class="loading">
      <i class="fas fa-circle-notch fa-spin"></i> Carregant...
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

  .categories ul {
    margin: 0;
    padding: 0;
  }

  .loading {
    color: $gray-mid;
    font-size: 2rem;
    text-align: center;
    padding: 1rem;
  }
</style>