<template>
  <li>
    <a :href="url" target="_blank" rel="noopener" class="process">
      <div v-if="flair" class="process__flair"><span>{{ flair }}</span> <i class="far fa-external-link" /></div>
      <h4 class="process__title">{{ title }}</h4>
      <div v-if="process.thumbnail" class="process__thumbnail">
        <img :src="cms + process.thumbnail.formats.medium.url" :alt="process.thumbnail.alternativeText" />
      </div>
      <p v-if="description" class="process__description">{{ description }}</p>
    </a>
  </li>
</template>

<script>
  export default {
    props: {
      process: {
        type: Object,
        required: true
      }
    },

    data () {
      return {
        cms: GlobalConfig.cms_url
      }
    },

    computed: {
      title () {
        return this.getMultilangField('title')
      },

      description () {
        return this.getMultilangField('description')
      },

      flair () {
        return this.getMultilangField('flair')
      },

      url () {
        return this.getMultilangField('url')
      }
    },

    methods: {
      getMultilangField (name) {
        const { locale } = GlobalConfig
        const fields = {
          ca: name,
          es: `${name}_es`,
          en: `${name}_en`
        }

        return this.process[fields[locale]] || this.process[name]
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  li {
    display: flex;
  }

  .process {
    display: block;
    background: $card-bg;
    color: $brand-primary;
    list-style: none;
    margin: 0;
    border-radius: .5rem;
    padding: 1rem;
    transition: .2s ease;

    &:hover {
      text-decoration: none;
      background: lighten($brand-primary, 60%);
      transform: translateY(-.25rem);
      box-shadow: 0 0 0 2px $brand-primary;

      img {
        opacity: .75;
        mix-blend-mode: multiply;
      }

      .far {
        opacity: 1;
      }
    }

    &__flair {
      display: flex;
      margin: -1rem 0 1rem 0;
      align-items: center;

      span {
        display: inline-block;
        background: $brand-primary;
        color: $white;
        font-weight: bold;
        border-radius: 0 0 .5rem .5rem;
        padding: .5rem 1rem;
      }

      .far {
        margin-left: auto;
        opacity: .5;
        transition: .2s ease;
      }
    }

    &__title {
      font-weight: 900;
    }

    &__thumbnail {
      margin: .75rem -1rem;

      img {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        transition: .2s ease;
        mix-blend-mode: multiply;
      }
    }

    &__description {
      font-size: .85rem;
      margin: 0;
    }
  }
</style>