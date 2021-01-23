<template>
  <section class="altea-decideix">
    <h3>{{ $t('altea_decideix.open') }}</h3>
    <ul class="processes open">
      <li v-for="process in open_processes" :key="process.id">
        <a :href="process.url" target="_blank" rel="noopener" class="process">
          <div v-if="process.flair" class="process__flair"><span>{{ process.flair }}</span> <i class="far fa-external-link" /></div>
          <h4 class="process__title">{{ process.title }}</h4>
          <div v-if="process.thumbnail" class="process__thumbnail">
            <img :src="cms + process.thumbnail.formats.small.url" :alt="process.thumbnail.alternativeText" />
          </div>
          <p v-if="process.description" class="process__description">{{ process.description }}</p>
        </a>
      </li>
    </ul>
  </section>
</template>

<script>
  export default {
    data () {
      return {
        open_processes: [],
        archived_processes: [],
        cms: GlobalConfig.cms_url
      }
    },

    async mounted () {
      this.open_processes = await Strapi.getOpenProcesses()
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  h3 {
    color: $gray-light;
    margin-bottom: 1rem;
  }

  .processes {
    display: grid;
    margin: 0;
    padding: 0;
    list-style: none;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));

    li {
      padding: 0;
      margin: 0;
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
  }
</style>