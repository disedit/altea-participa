<template>
  <div>
    <div v-if="!pending">
      <vue-markdown>{{ content }}</vue-markdown>
    </div>
    <div v-else class="loading">
      Carregant...
    </div>
  </div>
</template>

<script>
import VueMarkdown from 'vue-markdown'

export default {
  components: {
    VueMarkdown
  },

  data () {
    return {
      page: null,
      pending: true
    }
  },

  async mounted () {
    this.page = await Strapi.getPage('Memòria+Històrica')
    this.pending = false
  },

  computed: {
    content () {
      return this.page ? this.page[0].contingut_va : ''
    }
  }
}
</script>

<style lang="scss" scoped>
.loading {
  color: #ccc;
  font-size: 2rem;
  text-align: center;
  padding: 2rem 0;
}
</style>