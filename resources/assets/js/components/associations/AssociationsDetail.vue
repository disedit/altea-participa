<template>
  <div>
    <router-link to="/associacions" class="back-button">
      <i class="far fa-chevron-left" />
      {{ $t('associations.back') }}
    </router-link>
    <article v-if="association" class="association">
      <div class="association__wrapper">
        <div class="association__category">
          <span>
            <i :class="`far fa-${association.category.icon}`" /> 
            {{ association.category.cat_name }}
          </span>
          <img :src="cms + association.category.logo.url" :alt="association.category.logo.alternativeText" />
        </div>
        <div class="association__logo" v-if="association.logo">
          <img :src="cms + association.logo.url" :alt="association.logo.alternativeText" />
        </div>
        <h3>{{ association.name }}</h3>
        <ul class="association__details">
          <li v-if="association.address">
            <i class="far fa-fw fa-map-marker-alt" title="Adreça" />
            {{ association.address }}
          </li>
          <li v-if="association.email">
            <i class="far fa-fw fa-envelope" title="E-mail de contacte" />
            <a :href="`mailto:${association.email}`">{{ association.email }}</a>
          </li>
          <li v-if="association.phone">
            <i class="far fa-fw fa-phone" title="Telèfon de contacte" />
            <a :href="`tel:${association.phone}`">{{ association.phone }}</a>
          </li>
          <li v-if="association.facebook">
            <i class="fab fa-fw fa-facebook" title="Facebook" />
            <a :href="`${association.facebook}`" target="_blank" rel="noopener">{{ associationFacebook }}</a>
          </li>
          <li v-if="association.twitter">
            <i class="fab fa-fw fa-twitter" title="Twitter" />
            <a :href="`https://twitter.com/${association.twitter}`" target="_blank" rel="noopener">@{{ association.twitter }}</a>
          </li>
          <li v-if="association.instagram">
            <i class="fab fa-fw fa-instagram" title="Instagram" />
            <a :href="`https://instagram.com/${association.instagram}`" target="_blank" rel="noopener">@{{ association.instagram }}</a>
          </li>
          <li v-if="association.youtube">
            <i class="fab fa-fw fa-youtube" title="Youtube" />
            <a :href="association.youtube" target="_blank" rel="noopener"> Canal de Youtube</a>
          </li>
          <li v-if="association.website">
            <i class="far fa-fw fa-globe" /> <span class="sr-only">Pàgina web</span>
            <a :href="association.website" target="_blank" rel="noopener">{{ associationWebsite }}</a>
          </li>
        </ul>
        <div v-if="associationDescription" class="association__description">
          <vue-markdown>{{ associationDescription }}</vue-markdown>
        </div>
        <div v-if="association.video" class="association__video">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe
              class="embed-responsive-item"
              width="560"
              height="315"
              :src="`https://www.youtube.com/embed/${association.video}`"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>
        </div>
        <div class="association__gallery" aria-hidden="true" v-if="association.photos.length > 0">
          <h4>{{ $t('associations.gallery') }}</h4>
          <ul>
            <li v-for="photo in association.photos" :key="photo.id">
              <div class="embed-responsive embed-responsive-1by1">
                <img v-if="'small' in photo.formats" class="embed-responsive-item" :src="cms + photo.formats.small.url" :alt="photo.alternativeText" />
                <img v-else class="embed-responsive-item" :src="cms + photo.url" :alt="photo.alternativeText" />
              </div>
            </li>
          </ul>
        </div>
      </div>
    </article>
    <div v-else class="loading">
      <i class="far fa-circle-notch fa-spin"></i> {{ $t('global.loading') }}
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
        association: null,
        cms: GlobalConfig.cms_url
      }
    },

    computed: {
      associationFacebook () {
        if (!this.association) return ''
        return this.association.facebook.replace(/https?:\/\/(www.)?facebook.com\//g, '')
      },

      associationWebsite () {
        if (!this.association) return ''
        return this.association.website.replace(/https?:\/\/(www.)?/g, '')
      },

      associationDescription () {
        const { locale } = GlobalConfig
        const fields = {
          ca: 'description',
          es: 'description_es',
          en: 'description_en'
        }

        return this.association[fields[locale]]
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
  @import '../../../sass/_variables';

  .back-button {
    display: inline-flex;
    border: 1px $brand-primary solid;
    border-radius: 4rem;
    padding: .4rem 1rem;
    margin-bottom: 1rem;
    font-size: .9rem;
    align-items: center;

    .far {
      margin-right: .5rem;
    }

    &:hover {
      background: $card-bg;
      text-decoration: none;
      color: $brand-primary;
    }
  }

  .association {
    background: $card-bg;
    padding: 1rem;
    color: $brand-primary;
    border-radius: .75rem;

    &__wrapper {
      max-width: 700px;
      margin: 0 auto;
    }

    &__category {
      display: flex;
      margin-top: -1rem;
      margin-bottom: 1rem;

      span {
        background: $brand-primary;
        color: $white;
        font-weight: bold;
        display: inline-block;
        padding: .5rem 1rem;
        border-radius: 0 0 .5rem .5rem;
      }

      img {
        margin-left: auto;
        height: 2rem;
        margin-top: .5rem;
      }
    }

    h3 {
      font-weight: 900;
      font-size: 1.75rem;
    }

    &__logo {
      background: #fff;
      border: 1px rgba($brand-primary, .2) solid;
      border-radius: .5rem;
      padding: 1rem;
      margin-bottom: 1rem;

      img {
        display: block;
        max-width: 80%;
        max-height: 6rem;
        margin: 0 auto;
        object-fit: contain;
      }
    }

    &__details {
      margin: 1rem 0;
      padding: 0;

      li {
        display: flex;
        list-style: none;
        align-items: center;
        line-height: 1;
        margin: .75rem 0;

        i {
          flex-shrink: 0;
          margin-right: .25rem;
        }

        a {
          overflow-wrap: break-word;
          word-wrap: break-word;
          word-break: break-word;
          hyphens: auto;
        }
      }
    }

    &__description {
      font-size: 1.25rem;
      margin: 1rem 0;
    }

    &__video {
      border-radius: .5rem;
      overflow: hidden;
    }

    &__gallery {
      h4 {
        font-weight: 900;
        margin-top: 2rem;
      }

      ul {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin: 0;
        padding: 0;
        gap: 1rem;

        li {
          margin: 0;
          padding: 0;
          list-style: none;

          img {
            width: 100%;
            border-radius: .5rem;
            object-fit: cover;
          }
        }
      }
    }
  }

  .loading {
    color: $gray-mid;
    font-size: 2rem;
    text-align: center;
    padding: 1rem;
  }

  @media (min-width: 992px) {
    .association {
      h3 {
        font-size: 2.4rem;
      }

      &__logo {
        float: right;

        img {
          width: 100%;
          max-width: 10rem;
          max-height: 7rem;
        }
      }
    }
  }
</style>