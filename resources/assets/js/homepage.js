window.axios = require('axios');
window.Vue = require('vue').default;
window.Bus = new Vue();

import VueI18n from 'vue-i18n';
import Strapi from './strapi';
import Participa from './api';
import { ModalPlugin } from 'bootstrap-vue';

import Homepage from './components/Homepage';

import Catalan from './language/ca.js';
import Spanish from './language/es.js';
import English from './language/en.js';

window.Strapi = new Strapi();
window.Participa = new Participa();

Vue.use(VueI18n);
Vue.use(ModalPlugin);

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
  el: '#homepage',
  components: { Homepage },
  i18n,
  template: '<Homepage />',
});
