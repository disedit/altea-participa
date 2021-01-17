window.axios = require('axios');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueI18n from 'vue-i18n';

import Strapi from './strapi';

import AssociationsLayout from './components/associations/AssociationsLayout';
import AssociationsHome from './components/associations/AssociationsHome';
import AssociationsDetail from './components/associations/AssociationsDetail';

import Catalan from './language/ca.js';
import Spanish from './language/es.js';
import English from './language/en.js';

window.Strapi = new Strapi();

Vue.use(VueRouter);
Vue.use(VueI18n);

const scrollBehavior = (to, from, savedPosition) => {
  if (savedPosition) {
    return savedPosition;
  } else {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve({ x: 0, y: 0 });
      }, 500);
    });
  }
};

const router = new VueRouter({
  mode: 'history',
  scrollBehavior,
  routes: [
    {
      path: '/associacions',
      component: AssociationsLayout,
      children: [
        { name: 'home', path: '', component: AssociationsHome },
        { name: 'detail', path: ':slug', component: AssociationsDetail }
      ],
    },
  ],
});

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
  el: '#app',
  router,
  i18n,
  template: '<transition name="fade" mode="out-in"><router-view /></transition>',
});
