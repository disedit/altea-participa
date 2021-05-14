<template>
  <section class="altea-decideix">
    <h3>{{ $t('altea_decideix.open') }}</h3>
    <ul v-if="open_processes.length" class="processes open">
      <altea-decideix-item v-for="process in open_processes" :key="process.id" :process="process" />
    </ul>
    <div v-else-if="loading === 'open'" class="loading">
      <i class="far fa-circle-notch fa-spin"></i> {{ $t('global.loading') }}
    </div>
    <div v-else class="empty">
      {{ $t('altea_decideix.no_open_processes') }}
    </div>

    <button
      @click="show_archived = !show_archived"
      aria-controls="archive"
      :aria-expanded="show_archived ? 'true' : 'false'"
      class="archived-button">
      <i :class="['far', { 'fa-chevron-down': !show_archived, 'fa-chevron-up': show_archived }]" />
      <h3 id="archive-title">{{ $t('altea_decideix.archived') }}</h3>
    </button>

    <div v-if="show_archived" id="archive" aria-labelledby="archive-title">
      <ul v-if="archived_processes.length" class="processes open">
        <altea-decideix-item v-for="process in archived_processes" :key="process.id" :process="process" />
      </ul>
      <div v-else-if="loading === 'archived'" class="loading">
        <i class="far fa-circle-notch fa-spin"></i> {{ $t('global.loading') }}
      </div>
      <div v-else class="empty">
        {{ $t('altea_decideix.no_archived_processes') }}
      </div>
    </div>
  </section>
</template>

<script>
  import AlteaDecideixItem from './AlteaDecideixItem.vue'

  export default {
    components: {
      AlteaDecideixItem,
    },

    data () {
      return {
        open_processes: [],
        archived_processes: [],
        show_archived: true,
        loading: false
      }
    },

    watch: {
      async show_archived (show) {
        if (show && !this.archived_processes.length) {
          this.loading = 'archived'
          this.archived_processes = await Strapi.getArchivedProcesses()
          this.loading = false
        }
      }
    },

    async mounted () {
      this.loading = 'open'
      this.open_processes = await Strapi.getOpenProcesses()
      this.archived_processes = await Strapi.getArchivedProcesses()
      this.loading = false
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
    gap: 1rem;

    li {
      padding: 0;
      margin: 0;
    }
  }

  .archived-button {
    display: flex;
    align-items: center;
    color: $gray-light;
    padding: 0.4rem 1rem 0.3rem 1rem;
    margin: 3.5rem 0 1.5rem 0;
    border: 1px $gray-light solid;
    border-radius: 2rem;
    transform: 0.25s ease-in;
    background: $white;
    color: $gray-light;

    h3 {
      color: inherit;
      text-transform: uppercase;
      font-size: 0.9rem;
      font-weight: bold;
      margin: 0;
    }

    .far {
      margin-right: .5rem;
    }

    &:hover {
      text-decoration: none;
      background: lighten($gray-light, 10%);
      border-color: lighten($gray-light, 10%);
      color: $white;
    }

    &:focus,
    &:active {
      outline: 0;
      box-shadow: 0 0 0 4px lighten($gray-light, 50%);
    }
  }

  .loading,
  .empty {
    color: $gray-mid;
    font-size: 2rem;
    text-align: center;
    padding: 1rem;
  }
</style>