import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

import '~/plugins'
import '~/components'
import KProgress from 'k-progress';
Vue.component('k-progress', KProgress);
Vue.config.productionTip = false


/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
