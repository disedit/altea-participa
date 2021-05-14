<template>
  <article class="homepage__card decideix">
    <a href="/altea-decideix" class="d-flex flex-column">
      <i class="far fa-megaphone mb-2" />
      <h2 class="mt-auto">{{ $t('altea_decideix.title') }}</h2>
      <p class="mb-0">{{ $t('altea_decideix.description') }}</p>
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
      color: $green;
    }
  }
</style>