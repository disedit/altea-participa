<template>
  <li>
    <a :href="activity.link" target="_blank" rel="noopener" class="activity">
      <h4 class="activity__title">{{ title }}</h4>
      <div v-if="activity.photo" class="activity__thumbnail">
        <img :src="cms + activity.photo.formats.thumbnail.url" :alt="activity.photo.alternativeText" />
      </div>
      <p v-if="description" class="activity__description">{{ description }}</p>
      <p v-if="button" class="activity__button">{{ button }}</p>
    </a>
  </li>
</template>

<script>
  export default {
    props: {
      activity: {
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

      button () {
        return this.getMultilangField('button')
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

        return this.activity[fields[locale]] || this.activity[name]
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .activity {
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

    &__button {
      background: rgba($brand-primary, .1);
      margin: 1rem 0 0;
      padding: .25rem;
      text-align: center;
      border-radius: .25rem;
    }
  }
</style>