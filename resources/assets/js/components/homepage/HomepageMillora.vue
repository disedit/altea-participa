<template>
  <article class="homepage__card decideix">
    <a href="https://www.altea.es/altea-millora/" target="_blank" class="d-flex flex-column">
      <i class="far fa-camera mb-2" />
      <h2 class="mt-auto">{{ $t('altea_millora.title') }}</h2>
      <p class="mb-0">{{ $t('altea_millora.description') }}</p>
    </a>
  </article>
</template>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .decideix {
    .far {
      font-size: 3rem;
    }

    h2, p, .far {
      color: $purple;
    }
  }
</style>