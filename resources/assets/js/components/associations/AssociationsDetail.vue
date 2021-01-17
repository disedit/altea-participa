<template>
  <div>
    <router-link to="/associacions">Back</router-link>
    <div v-if="association">
      <h3>{{ association.name }}</h3>
    </div>
    <div v-else>
      Loading...
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        association: null
      }
    },

    async mounted () {
      const slug = this.$route.params.slug
      const results = await Strapi.getAssociation(slug)
      this.association = results[0]
    }
  }
</script>

<style lang="scss" scoped>

</style>