<template>
  <div v-if="!is404" class="page">
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
      return this.getMultilangField('contingut')
    },

    title () {
      return this.getMultilangField('titol')
    },
  },

  methods: {
    getMultilangField (name) {
      if (!this.page[0]) return
      const page = this.page[0]
      const { locale } = GlobalConfig
      const fields = {
        ca: `${name}_va`,
        es: `${name}_es`,
        en: `${name}_en`
      }

      return page[fields[locale]] || page[name]
    }
  }
}
</script>

<style lang="scss">
.page {
  max-width: 800px;

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

  .main-list {
    ul {
      display: grid;
      list-style: none;
      padding: 0;
      margin: 0;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;

      li {
        display: flex;
      }

      a {
        flex-grow: 1;
        display: flex;
        align-items: flex-end;
        border: 2px var(--primary) solid;
        border-radius: .5rem;
        padding: 4rem 1rem 1rem 1rem;
        line-height: 1.1;
        font-weight: bold;
        font-size: 2rem;

        &:hover {
          background: var(--primary);
          color: #fff;
          text-decoration: none;
        }
      }
    }
  }

  figure {
    background: #f3f2ff;
    padding: 1rem;
    border-radius: .75rem;

    img {
      width: 100%;
      max-height: 300px;
      object-fit: contain;
    }

    figcaption {
      text-align: center;
      color: var(--primary);
      font-size: .9rem;
      width: 80%;
      margin: 0 auto;
    }
  }

  h2 {
    font-weight: 900;
  }

  h3 {
    font-weight: bold;
    margin-top: 2rem;
    font-size: 1rem;
  }
}
</style>