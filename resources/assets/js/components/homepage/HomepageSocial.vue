<template>
  <div class="social-wrapper">
    <article class="homepage__card social">
      <a href="https://www.facebook.com/AlteaParticipa/" class="facebook">
        <i class="fab fa-fw fa-facebook mr-2" />
        @AlteaParticipa
      </a>
      <a href="https://www.instagram.com/alteaparticipa/" class="instagram">
        <i class="fab fa-fw fa-instagram mr-2" />
        @AlteaParticipa
      </a>
    </article>
    <article class="homepage__card activities mt-4">
      <a href="/activitats" class="activities">
        <i class="far fa-fw fa-calendar-alt mr-2" />
        {{ $t('activities.title') }}
      </a>
    </article>
    <article class="homepage__card docs mt-4">
      <a href="/documents" class="docs">
        <i class="far fa-fw fa-file-alt mr-2" />
        {{ $t('documents.title') }}
      </a>
    </article>
    <article class="homepage__card gva mt-4">
      <a href="https://gvaparticipa.gva.es/" class="gva">
        <img src="https://gvaparticipa.gva.es/system/site_customization/images/images/000/000/001/original/logo435x85.png?1611748247" alt="GVA Participa">
      </a>
    </article>
    <article class="homepage__card xarxasalut mt-4">
      <a href="mailto:xarxasalutaltea@gmail.com" class="gva">
        <img src="/images/xarxasalut.jpg" alt="Xarxa Salut">
      </a>
    </article>
  </div>
</template>

<script>
  export default {

  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .homepage__card a {
    font-size: 1.5rem;
  }

  .social-wrapper {
    flex-grow: 1;
  }

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
        color: #1877F2;
      }

      &.instagram {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top: 1px mix($brand-primary, $white, 10%) solid;
        color: #E1306C;
      }
    }
  }

  .gva {
    img {
      display: block;
      width: 150px;
      margin: -10px auto;
    }
  }
</style>