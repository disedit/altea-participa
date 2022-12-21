<template>
  <article class="homepage__card elections">
    <a href="/eleccions-2023" class="d-flex flex-column">
      <span class="elections__flair">{{ $t('elections.info') }}</span>
      <i class="elections__icon far fa-box-ballot"></i>
      <div class="mt-auto">
        <h2>{{ $t('elections.title') }}</h2>
        <p class="mb-0">{{ $t('elections.description') }}</p>
      </div>
      <div class="elections__button">
        <i class="far fa-info-circle" />
        {{ $t('elections.button') }}
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

  .elections {
    a { 
      color: $orange;
    }

    &__icon {
      font-size: 3rem;
    }

    &__button {
      background: mix($orange, $white, 10%);
      margin: 2rem -2rem -2rem -2rem;
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
</style>