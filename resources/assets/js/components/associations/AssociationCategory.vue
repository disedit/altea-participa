<template>
  <li class="category__item">
    <button
      :id="`title-${category.cat_slug}`"
      @click="expanded = !expanded"
      :aria-expanded="expanded ? 'true' : 'false'"
      :aria-controls="`detail-${category.cat_slug}`"
    >
      <i :class="`category__icon far fa-${category.icon}`" />
      {{ category.cat_name }}
      <i :class="['category__chev', 'far', { 'fa-chevron-down': expanded, 'fa-chevron-up': !expanded }]" />
    </button>
    <div
      v-show="expanded"
      :id="`detail-${category.cat_slug}`" 
      aria-labelledby="`title-${category.cat_slug}`"
    >
      <ul v-if="category.associations.length > 0" class="associations">
        <li v-for="association in category.associations" :key="association.id">
          <router-link :to="`/associacions/${association.slug}`">
            {{ association.name }}
          </router-link>
        </li>
      </ul>
      <div v-else class="associations associations--empty">
        No hi ha associacions en aquesta categoria
      </div>
    </div>
  </li>
</template>

<script>
  export default {
    props: {
      category: {
        type: Object,
        required: true
      }
    },

    data () {
      return {
        expanded: false
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .category {
    &__item {
    background: $card-bg;
    color: $brand-primary;
    list-style: none;
    margin: 0;
    border-radius: .5rem;
    margin-bottom: 1rem;

      button {
        position: relative;
        z-index: 10;
        width: 100%;
        display: flex;
        appearance: none;
        background: transparent;
        font-weight: 900;
        color: inherit;
        border: 0;
        padding: 1rem;
        font-size: 1.5rem;
        align-items: center;
        border-radius: .5rem;

        &[aria-expanded='true'] {
          border-radius: .5rem .5rem 0 0;
        }

        &:hover {
          background: lighten($brand-primary, 60%);
        }

        &:active {
          background: lighten($brand-primary, 57%);
        }

        &:focus {
          outline: 0;
          box-shadow: 0 0 0 4px rgba($brand-primary, .5);
        }
      }
    }

    &__chev {
      margin-left: auto;
      font-size: 1rem;
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
        border-bottom: 1px rgba($brand-primary, .2) dashed;

        &:hover {
          background: lighten($brand-primary, 60%);
          color: $brand-primary;
          text-decoration: none;
          border-bottom-style: solid;
        }

        &:active {
          background: lighten($brand-primary, 57%);
        }

        &:active {
          outline: 0;
          box-shadow: 0 0 0 4px rgba($brand-primary, .5);
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
</style>