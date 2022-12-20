<template>
  <main class="homepage">
    <div class="container">
      <ul class="homepage__grid">
        <li class="homepage__grid__elections"><homepage-elections /></li>
        <li class="homepage__grid__decideix"><homepage-decideix /></li>
        <li class="homepage__grid__consulta"><homepage-consulta /></li>
        <li class="homepage__grid__participa"><homepage-participa /></li>
        <li class="homepage__grid__social"><homepage-social /></li>
        <li class="homepage__grid__assocs"><homepage-assocs /></li>
        <li class="homepage__grid__millora"><homepage-millora /></li>
        <li class="homepage__grid__news"><homepage-news /></li>
      </ul>
    </div>
  </main>
</template>

<script>
  import HomepageElections from './homepage/HomepageElections'
  import HomepageConsulta from './homepage/HomepageConsulta'
  import HomepageParticipa from './homepage/HomepageParticipa'
  import HomepageDecideix from './homepage/HomepageDecideix'
  import HomepageSocial from './homepage/HomepageSocial'
  import HomepageAssocs from './homepage/HomepageAssocs'
  import HomepageMillora from './homepage/HomepageMillora'
  import HomepageNews from './homepage/HomepageNews'

  export default {
    components: {
      HomepageElections,
      HomepageConsulta,
      HomepageParticipa,
      HomepageDecideix,
      HomepageSocial,
      HomepageAssocs,
      HomepageMillora,
      HomepageNews
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
    background-attachment: fixed;
    padding-top: 10rem;
    padding-bottom: 4rem;
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
      background: linear-gradient(rgba(0, 43, 149, 0.5), rgba(0, 43, 149, 0.2));
    }

    &__grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-template-rows: repeat(2, minmax(315px, 30vh));
      grid-template-areas:
        "elections elections elections elections decideix decideix"
        "participa participa participa consulta consulta consulta"
        "millora millora assocs assocs assocs assocs"
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
          "elections"
          "decidex"
          "consulta"
          "participa"
          "assocs"
          "millora"
          "news"
          "social";
        grid-template-rows: auto;
        gap: 1.25rem;
        margin: 2rem 0;
      }
    }
  }
</style>