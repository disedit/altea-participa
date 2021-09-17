<template>
  <article class="homepage__card participa">
    <a href="/participa" class="d-flex flex-column">
      <span class="participa__flair" v-if="participa.flair">{{ $t('participa.new_edition') }}</span>
      <div class="d-flex align-items-start">
        <h2 class="mr-4 chonky-title">{{ participa.title }}</h2>
        <div class="calendar ml-auto d-none d-md-block">
            <div class="calendar__heading">{{ participa.phase }}</div>
            <div class="calendar__dates">
                <div class="calendar__days"><strong>{{ participa.date.start_day }}</strong> - <strong>{{ participa.date.end_day }}</strong></div>
                <div class="calendar__month">{{ participa.date.start_month }} - {{ participa.date.end_month }}</div>
            </div>
        </div>
      </div>
      <div class="participa__button">
        <i class="far fa-pencil" />
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

  .chonky-title {
    font-size: calc(1.75rem + 1.25vw);
    padding-bottom: 2rem;
  }

  .calendar {
    border: 2px $brand-primary solid;

    &__dates {
      font-size: 1.15rem;
    }
  }

  @keyframes pulse {
  0% {
    transform: scale(0.95);
    box-shadow: 0 0 0 0 rgba($red, 0.7);
  }

  70% {
    transform: scale(1);
    box-shadow: 0 0 0 10px rgba($red, 0);
  }

  100% {
    transform: scale(0.95);
    box-shadow: 0 0 0 0 rgba($red, 0);
  }
}
</style>