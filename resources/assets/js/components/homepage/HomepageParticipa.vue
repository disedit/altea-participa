<template>
  <article class="homepage__card participa">
    <a href="/participa">
      <h2>{{ participa.title }}</h2>
      <div class="calendar">
          <div class="calendar__heading">{{ participa.phase }}</div>
          <div class="calendar__dates">
              <div class="calendar__days"><strong>{{ participa.date.from }}</strong> - <strong>{{ participa.date.to }}</strong></div>
              <div class="calendar__month">{{ participa.date.month }}</div>
          </div>
      </div>
      <div class="participa__button">{{ participa.button }}</div>
    </a>
  </article>
</template>

<script>
  export default {
    data () {
      return {
        participa: window.GlobalConfig.participa
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>