<template>
  <article class="homepage__card participa">
    <a href="/participa" class="d-flex flex-column">
      <div class="d-flex">
        <h2 class="mr-4">{{ participa.title }}</h2>
        <div class="calendar ml-auto mb-4 d-none d-md-block">
            <div class="calendar__heading">{{ participa.phase }}</div>
            <div class="calendar__dates">
                <div class="calendar__days"><strong>{{ participa.date.start_day }}</strong> - <strong>{{ participa.date.end_day }}</strong></div>
                <div class="calendar__month">{{ participa.date.start_month }}</div>
            </div>
        </div>
      </div>
      <div class="participa__button">
        <i class="far fa-chart-bar" />
        {{ participa.button }}
      </div>
    </a>
  </article>
</template>

<script>
  export default {
    data () {
      return {
        participa: window.GlobalConfig.participa
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .participa {
    &__button {
      background: mix($brand-primary, $white, 10%);
      margin: auto -2rem -2rem -2rem;
      border-radius: 0 0 .5rem .5rem;
      padding: 1rem 2rem;
      text-align: center;
      font-size: 1.15rem;
    }
  }

  .calendar {
    border: 2px $brand-primary solid;

    &__dates {
      font-size: 1.15rem;
    }
  }
</style>