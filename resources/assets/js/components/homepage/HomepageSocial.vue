<template>
  <article class="homepage__card social">
    <a href="https://www.facebook.com/AlteaParticipa/" class="facebook">
      <i class="fab fa-facebook mr-2" />
      @AlteaParticipa
    </a>
    <a href="https://twitter.com/EsAltea" class="twitter">
      <i class="fab fa-twitter mr-2" />
      @EsAltea
    </a>
  </article>
</template>

<script>
  export default {

  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .social {
    display: flex;
    flex-direction: column;

    a {
      display: flex;
      align-items: center;
      font-size: 1.5rem;

      &:hover {
        background: mix($brand-primary, $white, 5%);
      }

      &.facebook {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
      }

      &.twitter {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top: 1px mix($brand-primary, $white, 10%) solid;
      }
    }
  }
</style>