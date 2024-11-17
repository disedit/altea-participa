<template>
  <div v-if="open_processes.length > 0">
    <a href="/altea-decideix" class="new-poll-alert">
      <strong style="margin-right: 1rem">
        {{ multilang(open_processes[0], 'flair') }}
      </strong>
      {{ multilang(open_processes[0], 'title') }}
      <i class="far fa-arrow-right"></i>
    </a>
  </div>
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