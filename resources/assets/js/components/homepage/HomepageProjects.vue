<template>
  <div class="projects">
    <div class="projects__card homepage__card">
      <a href="/projects" class="projects__card homepage__card">
        <h2>Pressupostos participatius</h2>
        <div class="projects__numbers">
          Number
        </div>
      </a>
    </div>
    <div class="projects__statuses">
      <ul class="projects__years">
        <li v-for="edition in projects" :key="`edition-${edition.id}`">
          <h3 class="projects__years__title"><a :href="`/archive/${edition.id}`">{{ edition.year }}</a></h3>
          <ul class="projects__list">
            <li v-for="project in edition.projects" :key="`project-${project.id}`" class="project-card">
              <a href="/">
                <h4 class="project__title">{{ project.name }}</h4>
                <div class="project__description">{{ project.description }}</div>
                <span class="project__cost" v-if="project.cost > 0">{{ project.cost | formatCurrency }}</span>
                <span :class="['project__status', project.color]">{{ project.status }}</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      projects: window.GlobalConfig.projects
    }
  },

  filters: {
    formatCurrency (value) {
      return new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR', maximumSignificantDigits: 3 }).format(value)
    }
  }
}
</script>

<style lang="scss">
@import '../../../sass/_variables';

.projects {
  --container-width: 1110px;
  width: 100%;
  display: grid;
  position: relative;
  z-index: 2;
  grid-template-columns: 1fr calc(var(--container-width) * .3) calc(var(--container-width) * .7) 1fr;
  grid-template-areas: ". card statuses statuses";
  margin-bottom: 1.5rem;

  &__card {
    grid-area: card;
  }

  &__statuses {
    grid-area: statuses;
  }

  &__years {
    display: flex;
    overflow-y: auto;
    list-style: none;
    margin: 0;
    padding: 0;

    &::-webkit-scrollbar {
      width: 15px;
    }

    &::-webkit-scrollbar-track {
      background: rgba($brand-primary, .25);
      border-radius: 10px;
    }
    
    &::-webkit-scrollbar-thumb {
      background: $brand-primary; 
      border-radius: 10px;
    }

    &::-webkit-scrollbar-thumb:hover {
      background: darken($brand-primary, 10%); 
    }

    &__title {
      margin-bottom: 1rem;

      a {
        color: $white;
        font-weight: 900;
        font-size: 2rem;
        text-decoration: none;

        &:hover {
          text-decoration: underline;
        }
      }
    }

    & > li {
      padding: 1rem;
    }

    &:first-child li:first-child {
      margin-left: 0;
    }
  }

  &__list {
    display: flex;
    gap: 1.5rem;
    margin: 0;
    padding: 0;
    list-style: none;

    .project-card {
      position: relative;
      margin-left: -130px;
      transition: .25s ease;

      &:hover {
        transform: translateY(-1rem) rotate(3deg);
        
        &:not(:last-child) {
          margin-right: 100px;
        }
      }

      a {
        display: flex;
        background: $white;
        width: 250px;
        height: 300px;
        border-radius: .5rem;
        text-decoration: none;
        box-shadow: $card-raised-shadow;
        padding: 1rem;
        gap: .5rem;
        flex-direction: column;
      }
    }
  }
}

$colors: ('green': $green, 'orange': $orange, 'teal': $teal);

.project {
  &__title {
    font-weight: 700;
    font-size: 1.75rem;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  &__description {
    opacity: .75;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: auto;
  }

  &__cost {
    font-size: 1.25rem;;
  }

  &__status {
    background: rgba($brand-primary, .25);
    border-radius: .5rem;
    padding: .25rem .75rem;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: .85rem;
    text-align: center;

    @each $name, $color in $colors {
      &.#{$name} {
        background: rgba($color, .25);
      }
    }
  }
}
</style>