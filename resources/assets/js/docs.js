window.axios = require('axios');
window.Vue = require('vue');

import VueI18n from 'vue-i18n';
import Strapi from './strapi';
import Docs from './components/docs/Docs';

import Catalan from './language/ca.js';
import Spanish from './language/es.js';
import English from './language/en.js';

window.Strapi = new Strapi();

Vue.use(VueI18n);

const messages = {
  en: English,
  ca: Catalan,
  es: Spanish,
}

const i18n = new VueI18n({
  locale: window.GlobalConfig.locale,
  messages,
});

const app = new Vue({
  components: {
    Docs
  },
  el: '#app',
  i18n,
  template: '<docs />',
});
