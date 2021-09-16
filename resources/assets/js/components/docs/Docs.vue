<template>
  <div class="docs">
    <ul>
      <li v-for="doc in docs" :key="doc.id">
        <a :href="cms + doc.file.url" target="_blank" rel="noopener">
          <i class="far fa-file-alt" />
          <span class="title">{{ doc.title }}</span>
          <span v-if="doc.etiqueta" class="flair">{{ doc.etiqueta }}</span>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        docs: null,
        cms: GlobalConfig.cms_url
      }
    },

    mounted () {
      this.getDocuments();
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