<template>
  <article class="homepage__card assocs">
    <a href="/associacions">
      <h2>{{ $t('associations.title') }}</h2>
      <p>{{ $t('associations.description') }}</p>
      <div class="assocs__wall mt-auto">
        <ul>
          <li v-for="assoc in assocs" :key="assoc.id">
            {{ assoc.name }}
          </li>
        </ul>
      </div>
    </a>
  </article>
</template>

<script>
  export default {
    data () {
      return {
        assocs: []
      }
    },

    async mounted () {
      this.assocs = await Strapi.getAssociations(30);
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .assocs {
    overflow: hidden;

    a {
      display: flex;
      flex-direction: column;
    }

    h2, p {
      color: $orange;
    }

    &__wall {
      overflow: hidden;
      opacity: .75;
      position: relative;
      width: 200%;
      transition: 2s ease;

      &::before {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to right, rgba($white, 0), $white);
        z-index: 2
      }

      ul {
        margin: 0;
        padding: 0;
        line-height: 2.25;
      }

      li {
        display: inline;
        background: mix($orange, $white, 20%);
        margin: .5rem .5rem 0 0;
        padding: .25rem .5rem;
        border-radius: .25rem;
        -webkit-box-decoration-break: clone;
        box-decoration-break: clone;
        color: mix($orange, $black, 90%);
      }
    }

    &:hover {
      .assocs__wall {
        transform: translateX(-100%);
        transition: 60s linear;
      }
    }
  }
</style>