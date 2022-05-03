<template>
  <div v-if="!is404">
    <div v-if="!pending">
      <vue-markdown>{{ content }}</vue-markdown>
    </div>
    <div v-else class="loading">
      Carregant...
    </div>
  </div>
  <div v-else>
    <p class="main-text">No hem trobat la pàgina que estaves buscant...</p>
    <p><a href="/">Torna a la pàgina principal</a></p>
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
      pending: true,
      is404: false
    }
  },

  async mounted () {
    const pageTitle = document.getElementById('PageTitle')
    this.page = await Strapi.getPage(window.GlobalConfig.page)
    this.pending = false
    if (this.page.length === 0) {
      this.is404 = true
      pageTitle.innerHTML = 'Error 404'
    } else {
      pageTitle.innerHTML = this.title
    }
  },

  computed: {
    content () {
      return this.page ? this.page[0].contingut_va : ''
    },

    title () {
      return this.page ? this.page[0].titol_va : ''
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

.main-text {
  font-size: 1.5rem;
  padding: 2rem 0;
}
</style>