<template>
  <li :class="['category__item', `category-${category.color}`]">
    <button
      :id="`title-${category.cat_slug}`"
      @click="expanded = !expanded"
      :aria-expanded="expanded ? 'true' : 'false'"
      :aria-controls="`detail-${category.cat_slug}`"
    >
      <div class="category__icon">
        <i :class="`far fa-fw fa-${category.icon}`" />
        <img v-if="category.logo" :src="cms + category.logo.url" :alt="category.logo.alternativeText" class="category__logo" />
      </div>
      <span class="category__name">{{ name }}</span>
    </button>
    <transition name="slide">
      <div
        class="category__dropdown"
        v-show="expanded"
        :id="`detail-${category.cat_slug}`" 
        :aria-labelledby="`title-${category.cat_slug}`"
      >
        <div v-if="description" class="category__description">
          <vue-markdown>{{ description }}</vue-markdown>
        </div>
        <ul v-if="category.associations.length > 0" class="associations">
          <li v-for="association in category.associations" :key="association.id">
            <router-link :to="`/associacions/${association.slug}`">
              {{ association.name }}
            </router-link>
          </li>
        </ul>
        <div v-else class="associations associations--empty">
          <slot>
            {{ $t('associations.no_assocs') }}
          </slot>
        </div>
      </div>
    </transition>
  </li>
</template>

<script>
  import VueMarkdown from 'vue-markdown'

  export default {
    components: {
      VueMarkdown
    },

    props: {
      category: {
        type: Object,
        required: true
      }
    },

    data () {
      return {
        expanded: false,
        cms: GlobalConfig.cms_url
      }
    },

    computed: {
      name () {
        return this.getMultilangField('cat_name')
      },

      description () {
        return this.getMultilangField('description')
      }
    },

    methods: {
      getMultilangField (name) {
        const { locale } = GlobalConfig
        const fields = {
          ca: name,
          es: `${name}_es`,
          en: `${name}_en`
        }

        return this.category[fields[locale]] || this.category[name]
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';
  @import '../../../sass/_assoc-colors';

  .category {
    &__item {
      color: $white;
      list-style: none;
      margin: 0;
      border-radius: .5rem;

      button {
        position: relative;
        z-index: 10;
        width: 100%;
        aspect-ratio: 1.25;
        display: flex;
        flex-direction: column;
        appearance: none;
        background: transparent;
        font-weight: 900;
        color: inherit;
        border: 0;
        padding: 1rem;
        font-size: 1.75rem;
        border-radius: .5rem;
        transition: .25s ease;
        line-height: 1;
      }
    }

    &__name {
      text-align: left;
      margin-top: auto;
    }

    &__icon {
      display: flex;
      margin-right: .5rem;
      font-size: 2rem;
      width: 100%;

      img {
        margin-left: auto;
      }
    }

    &__dropdown {
      border-radius: 0 0 .5rem .5rem;
    }

    &__logo {
      height: 2.25rem;
      margin: -.5rem 1rem -.5rem;
    }

    &__description {
      font-size: .85rem;
      border-bottom: 1px rgba($brand-primary, .2) solid;
      padding: .75rem 1rem;

      &::v-deep p:last-child {
        margin: 0;
      }
    }
  }

  .associations {
    padding: 0;
    margin: 0;

    li {
      list-style: none;
      margin: 0;

      a {
        display: block;
        padding: .5rem 1rem;

        &:hover {
          text-decoration: none;
          border-bottom-style: solid;
        }
      }

      &:last-child {
        a {
          border-bottom: 0;
          border-radius: 0 0 .5rem .5rem;
        }
      }
    }

    &--empty {
      padding: 1rem;
    }
  }

  @each $name, $color in $assoc-colors {
    .category-#{$name} {
      button {
        background: $color;

        &[aria-expanded='true'] {
          border-radius: .5rem .5rem 0 0;
        }

        &:hover {
          background: darken($color, 10%);
        }

        &:active {
          background: darken($color, 15%);
        }

        &:focus {
          outline: 0;
          box-shadow: 0 0 0 4px rgba($color, .5);
        }
      }

      .category__dropdown {
        background: mix($color, $white, 30%);
        color: darken($color, 20%);

        a {
          color: darken($color, 20%);
          border-bottom: 1px rgba($color, .2) dashed;

          &:hover {
            background-color: mix($color, $white, 40%);
            color: darken($color, 30%);
          }

          &:active {
            background: mix($color, $white, 45%);
          }

          &:focus {
            position: relative;
            z-index: 2;
            outline: 0;
            box-shadow: 0 0 0 4px rgba($color, .75);
          }
        }
      }
    }
  }
</style>