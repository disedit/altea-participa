<template>
  <main class="homepage">
    <div class="container-fluid container-xl" style="margin-bottom: 2rem;">
      <a v-if="$i18n.locale === 'es'" href="/altea-decideix" class="new-poll-alert">
        <strong style="margin-right: 1rem">Nueva encuesta</strong>
        Estudio de impacto de las viviendas turísticas
        <i class="far fa-arrow-right"></i>
      </a>
      <a v-else href="/altea-decideix" class="new-poll-alert">
        <strong style="margin-right: 1rem">Nova enquesta</strong>
        Estudi d'impacte de les vivendes turístiques
        <i class="far fa-arrow-right"></i>
      </a>
      <homepage-consulta />
    </div>
    <homepage-projects />
    <div class="container-fluid container-xl">
      <ul class="homepage__grid">
        <!--<li class="homepage__grid__elections"><homepage-elections /></li>-->
        <li class="homepage__grid__decideix"><homepage-decideix /></li>
        <!--<li class="homepage__grid__consulta"><homepage-consulta /></li>-->
        <!--<li class="homepage__grid__participa"><homepage-participa /></li>-->
        <li class="homepage__grid__social"><homepage-social /></li>
        <li class="homepage__grid__assocs"><homepage-assocs /></li>
        <li class="homepage__grid__millora"><homepage-millora /></li>
        <li class="homepage__grid__news"><homepage-news /></li>
      </ul>
    </div>
    <option-modal />
  </main>
</template>

<script>
  import HomepageProjects from './homepage/HomepageProjects'
  // import HomepageElections from './homepage/HomepageElections'
  import HomepageConsulta from './homepage/HomepageConsulta'
  // import HomepageParticipa from './homepage/HomepageParticipa'
  import HomepageDecideix from './homepage/HomepageDecideix'
  import HomepageSocial from './homepage/HomepageSocial'
  import HomepageAssocs from './homepage/HomepageAssocs'
  import HomepageMillora from './homepage/HomepageMillora'
  import HomepageNews from './homepage/HomepageNews'
  import OptionModal from './helpers/OptionModal'

  export default {
    components: {
      HomepageProjects,
      // HomepageElections,
      HomepageConsulta,
      // HomepageParticipa,
      HomepageDecideix,
      HomepageSocial,
      HomepageAssocs,
      HomepageMillora,
      HomepageNews,
      OptionModal
    }
  }
</script>

<style lang="scss">
  @import '../../sass/_variables';

  .homepage {
    display: flex;
    flex-direction: column;
    position: relative;
    min-height: 100vh;
    padding-top: 10rem;
    align-items: center;
    justify-content: center;

    &::before {
      content: '';
      display: block;
      position: sticky;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 0;
      height: 100vh;
      width: 100%;
      background-image: url('../../images/altea.jpg');
      background-size: cover;
      background-position: center top;
      margin-top: -100vh
    }

    &::after {
      content: '';
      display: block;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1;
      background: linear-gradient(rgba(0, 43, 149, 0.5), rgba(0, 43, 149, 0.2));
    }

    .container-fluid {
      margin-bottom: 4rem;
    }

    &__grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-template-rows: repeat(2, minmax(315px, 30vh));
      grid-template-areas:
        "assocs assocs assocs assocs decideix decideix"
        "millora millora news news news news"
        "social social news news news news";
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 2rem;

      li {
        display: flex;
      }

      &__elections {
        grid-area: elections;
      }

      &__consulta {
        grid-area: consulta;
      }

      &__participa {
        grid-area: participa;
      }

      &__decideix {
        grid-area: decideix;
      }

      &__social {
        grid-area: social;
        align-self: flex-start;
        position: sticky;
        top: 85px;
        z-index: 100;
      }

      &__assocs {
        grid-area: assocs;
      }

      &__millora {
        grid-area: millora;
      }

      &__news {
        grid-area: news;
      }
    }

    &__card {
      display: flex;
      position: relative;
      z-index: 2;
      flex-grow: 1;
      transition: .2s ease;

      &:not(.unhoverable):hover {
        transform: translateY(-.25rem);
        color: $brand-primary;
      }

      & > a,
      & > .wrapper {
        display: block;
        background: $white;
        padding: 1.5rem 2rem;
        border-radius: .5rem;
        flex-grow: 1;
        box-shadow: $card-shadow;
        transition: .2s ease;
      }

      & > a:hover {
        text-decoration: none;
        box-shadow: $card-raised-shadow;
      }

      h2 {
        font-weight: 900;
      }

      p {
        opacity: .75;
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
          "assocs"
          "decideix"
          "millora"
          "news"
          "social";
        grid-template-rows: auto;
        gap: 1.25rem;
        margin: 2rem 0;
      }
    }
  }

  .new-poll-alert {
    background: #f1c40f;
    position: relative;
    z-index: 10;
    width: 100%;
    padding: 1rem;
    border-radius: .25rem;
    display: flex;
    line-height: 1.1;
    transition: .25s ease;

    i {
      margin-left: auto;
    }

    &:hover {
      text-decoration: none;
      transform: translateY(-.25rem);
    }
  }
</style>