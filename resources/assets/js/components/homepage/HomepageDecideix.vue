<template>
  <article class="homepage__card decideix">
    <a href="/altea-decideix" class="d-flex flex-column">
      <span class="decideix__flair">{{ $t('altea_decideix.new_vote') }}</span>
      <i class="far fa-megaphone mb-2" />
      <h2 class="mt-auto">{{ $t('altea_decideix.title') }}</h2>
      <p class="mb-0" v-if="open_processes.length > 0">
        <strong>{{ multilang(open_processes[0], 'flair') }}</strong>
        {{ multilang(open_processes[0], 'title') }}
      </p>
    </a>
  </article>
</template>

<script>
export default {
  data () {
    return {
      open_processes: []
    }
  },
  async mounted () {
    this.open_processes = await Strapi.getLastOpenProcess()
  },
  methods: {
      multilang (object, field) {
        const { locale } = GlobalConfig
        const fields = {
          ca: field,
          es: `${field}_es`,
          en: `${field}_en`
        }

        return object[fields[locale]] || object[field]
      }
    }
}
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .decideix {
    .far {
      font-size: 3rem;
    }

    h2, p, .far {
      color: $green;
    }

    &__flair {
      background: $red;
      width: fit-content;
      color: $white;
      padding: .25rem .75rem;
      border-radius: .5rem;
      font-weight: bold;
      margin-top: -2.5rem;
      margin-bottom: 1rem;
      animation: pulse 2s infinite;
    }
  }
</style>