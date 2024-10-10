<template>
  <div class="association-home">
    <div class="row">
      <div class="col-md-8">
        <div v-if="categories" class="categories">
          <ul>
            <association-category v-for="category in categories" :key="category.id" :category="category" />
          </ul>
        </div>
        <div v-else-if="loading" class="loading">
          <i class="far fa-circle-notch fa-spin"></i> {{ $t('global.loading') }}
        </div>
      </div>
      <div class="col-md-4">
        <associations-mar />
      </div>
    </div>
    <associations-docs />
  </div>
</template>

<script>
  import AssociationCategory from './AssociationCategory.vue';
  import AssociationsDocs from './AssociationsDocs.vue';
  import AssociationsMar from './AssociationsMar.vue';

  export default {
    components: {
      AssociationCategory,
      AssociationsDocs,
      AssociationsMar
    },

    data () {
      return {
        loading: true,
        categories: null,
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
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
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