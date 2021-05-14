<template>
  <div class="homepage__card news unhoverable">
    <div class="wrapper">
      <h2>{{ $t('altea_news.title') }}</h2>
      <ul class="stories" v-if="!loading">
        <li v-for="story in stories" :key="story.id">
          <a :href="story.link" target="_blank" rel="noopener" class="story">
            <div class="story-thumbnail">
              <img :src="story.thumbnail" :alt="story.alt_text" />
            </div>
            <h3 class="story-headline" v-html="story.title"></h3>
          </a>
        </li>
        <li>
          <a href="https://alteadigital.es/ca/category/participacio-ciutadana/" target="_blank" rel="noopener" class="more-stories">
            <i class="far fa-plus-circle" /> {{ $t('altea_news.more') }}
          </a>
        </li>
      </ul>
      <div v-else class="loading">
        <i class="far fa-circle-notch fa-spin" />
        {{ $t('global.loading') }}
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        stories: [],
        loading: true
      }
    },
    mounted () {
      this.getStories();
    },
    methods: {
      async getStories () {
        this.loading = true;
        this.stories = await Participa.getStories();
        this.loading = false;
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  $section-color: $red;

  .news {
    h2, p {
      color: $section-color;
    }

    .wrapper {
      padding: 1.5rem 2rem 0 2rem;
    }
  }

  .stories {
    margin: 0 -2rem;
    padding: 0;

    li:not(:last-child) {
      border-bottom: 1px rgba($section-color, .25) solid;
    }
  }

  .story {
    display: flex;
    width: 100%;
    padding: 1rem 2rem;
    color: $section-color;

    &:hover {
      background: rgba($section-color, .05);
      text-decoration: none;
      color: mix($black, $section-color, 10%);
    }

    &-thumbnail {
      margin-right: 1rem;
      max-width: 200px;
      flex-shrink: 0;
      align-self: stretch;
      display: flex;

      img {
        width: 100%;
        height: 100%;
        min-height: 200px;
        border-radius: .5rem;
        object-fit: cover;
      }
    }

    &-headline {
      font-size: 1.25rem;
      font-weight: 900;
    }
  }

  .more-stories {
    color: $section-color;
    text-align: center;
    font-size: 1.25rem;
    padding: 1rem 2rem;
    width: 100%;

    &:hover {
      background: rgba($section-color, .05);
      text-decoration: none;
      color: mix($black, $section-color, 10%);
    }
  }

  .loading {
    text-align: center;
    font-size: 2rem;
    color: $gray-light;
  }
</style>