<template>
  <article class="homepage__card decideix">
    <a href="/altea-decideix" class="d-flex flex-column">
      <span class="decideix__flair">{{ $t('altea_decideix.new_vote') }}</span>
      <i class="far fa-megaphone mb-2" />
      <h2 class="mt-auto">{{ $t('altea_decideix.title') }}</h2>
      <p class="mb-0"><strong><!--{{ $t('altea_decideix.active') }}-->Enquesta:</strong> Reforma integral del Pavelló Garganes</p>
      <!--<p class="mb-0">{{ $t('altea_decideix.description') }}</p>-->
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