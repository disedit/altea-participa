<template>
  <div class="docs">
    <div v-for="category in sortedDocs" :key="category.slug">
      <div v-if="category.docs.length > 0">
        <h3>{{ category.name }}</h3>
        <ul class="mb-4">
          <li v-for="doc in category.docs" :key="doc.id">
            <a :href="doc.file.url ? `${cms + doc.file.url}` : doc.file_url" target="_blank" rel="noopener">
              <i class="far fa-file-alt" />
              <span class="title">{{ doc.title }}</span>
              <span v-if="doc.etiqueta" class="flair">{{ doc.etiqueta }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        docs: [],
        cms: GlobalConfig.cms_url,
        categories: [
          { slug: 'plans', name: 'Plans', docs: [] },
          { slug: 'ordenances', name: 'Ordenances', docs: [] },
          { slug: 'reglaments', name: 'Reglaments', docs: [] },
          { slug: 'altres', name: 'Altres', docs: [] }
        ]
      }
    },

    mounted () {
      this.getDocuments();
    },

    computed: {
      sortedDocs () {
        const docs = [...this.categories]

        this.docs.forEach((doc) => {
          console.log(doc)
          const catIndex = docs.findIndex((cat) => cat.slug === doc.category)
          docs[catIndex].docs.push(doc)
        })

        return docs
      }
    },

    methods: {
      async getDocuments () {
        const { locale } = GlobalConfig
        this.docs = await Strapi.getDocuments(locale);
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .docs {
    ul {
      font-size: 1.25rem;
      margin: 0;
      padding: 0;
      list-style: none;
      line-height: 2.25;
    }

    a {
      padding: 1rem 0;

      .title {
        margin-left: .5rem;
      }

      &:hover {
        text-decoration: none;

        .title {
          text-decoration: underline;
        }
      }
    }

    .flair {
      background: $card-bg;
      border-radius: .25rem;
      padding: .25rem .5rem;
      font-size: 1rem;
      margin-left: .5rem;
    }
  }
</style>