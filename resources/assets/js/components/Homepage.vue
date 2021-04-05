<template>
  <main class="homepage">
    <div class="container">
      <ul class="homepage__grid">
        <li class="homepage__grid__participa"><homepage-participa /></li>
        <li class="homepage__grid__decideix"><homepage-decideix /></li>
        <li class="homepage__grid__social"><homepage-social /></li>
        <li class="homepage__grid__assocs"><homepage-assocs /></li>
      </ul>
    </div>
  </main>
</template>

<script>
  import HomepageParticipa from './homepage/HomepageParticipa'
  import HomepageDecideix from './homepage/HomepageDecideix'
  import HomepageSocial from './homepage/HomepageSocial'
  import HomepageAssocs from './homepage/HomepageAssocs'

  export default {
    components: {
      HomepageParticipa,
      HomepageDecideix,
      HomepageSocial,
      HomepageAssocs
    }
  }
</script>

<style lang="scss">
  @import '../../sass/_variables';

  .homepage {
    display: flex;
    position: relative;
    min-height: 100vh;
    background-image: url('../../images/altea.jpg');
    background-size: cover;
    background-position: center top;
    padding-top: 3rem;
    align-items: center;
    justify-content: center;

    &::before {
      content: '';
      display: block;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1;
      background: linear-gradient(rgba(0, 43, 149, 0.85), rgba(0, 43, 149, 0.45));
    }

    &__grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, minmax(200px, 25vh));
      grid-template-areas:
        "participa participa decideix"
        "social assocs assocs";
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 2rem;

      li {
        display: flex;
      }

      &__participa {
        grid-area: participa;
      }

      &__decideix {
        grid-area: decideix;
      }

      &__social {
        grid-area: social;
      }

      &__assocs {
        grid-area: assocs;
      }
    }

    &__card {
      display: flex;
      position: relative;
      z-index: 2;
      flex-grow: 1;
      transition: .2s ease;

      &:hover {
        transform: translateY(-.25rem);
        color: $brand-primary;
      }

      & > a {
        display: block;
        background: $white;
        padding: 2rem;
        border-radius: .5rem;
        flex-grow: 1;
        box-shadow: $card-shadow;
        transition: .2s ease;

        &:hover {
          text-decoration: none;
          box-shadow: $card-raised-shadow;
        }
      }

      h2 {
        font-weight: 900;
      }

      p {
        opacity: .5;
        font-size: 1.15rem;
        line-height: 1.25;
      }
    }
  }

  @media (max-width: 992px) {
    .homepage {
      &__grid {
        grid-template-columns: 1fr;
        grid-template-areas:
          "participa"
          "assocs"
          "decideix"
          "social";
        grid-template-rows: auto;
        gap: 1.25rem;
        margin: 2rem 0;
      }
    }
  }
</style>