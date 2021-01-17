<template>
  <li>
    <button
      :id="`title-${category.cat_slug}`"
      @click="expanded = !expanded"
      :aria-expanded="expanded ? 'true' : 'false'"
      :aria-controls="`detail-${category.cat_slug}`"
    >
      <i :class="`far fa-${category.icon}`" />
      {{ category.cat_name }}
    </button>
    <div
      v-show="expanded"
      :id="`detail-${category.cat_slug}`" 
      aria-labelledby="`title-${category.cat_slug}`"
    >
      <ul v-if="category.associations.length > 0">
        <li v-for="association in category.associations" :key="association.id">
          <router-link :to="`/associacions/${association.slug}`">
            {{ association.name }}
          </router-link>
        </li>
      </ul>
      <div v-else>
        No categories
      </div>
    </div>
  </li>
</template>

<script>
  export default {
    props: {
      category: {
        type: Object,
        required: true
      }
    },

    data () {
      return {
        expanded: false
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>