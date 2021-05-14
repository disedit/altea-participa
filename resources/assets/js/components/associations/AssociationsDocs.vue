<template>
  <div class="docs" v-if="docs">
    <h3>{{ $t('associations.docs')}}</h3>
    <div>
      <ul>
        <li v-for="doc in docs" :key="doc.id">
          <a :href="cms + doc.document.url" target="_blank" rel="noopener">
            <i class="far fa-file-alt" />
            <span class="title">{{ doc.title }}</span>
            <span v-if="doc.etiqueta" class="flair">{{ doc.etiqueta }}</span>
          </a>
        </li>
      </ul>
    </div>
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
        this.docs = await Strapi.getAssociationDocuments();
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .docs {
    h3 {
      margin-top: 2rem;
      font-weight: 900;
    }

    ul {
      font-size: 1.25rem;
      margin: 0;
      padding: 0;
      list-style: none;
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