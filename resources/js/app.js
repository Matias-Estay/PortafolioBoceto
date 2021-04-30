import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';
import VeeValidate, { Validator } from "vee-validate";
import es from 'vee-validate/dist/locale/es';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { router } from './helpers/router.js';
import { store } from './store';
import { ValidationProvider } from 'vee-validate';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(VueSweetalert2);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
require('jquery');
require('./fontawesome');

Validator.localize("es", es);

Vue.use(VeeValidate, {
    inject: true,
    fieldsBagName: 'veeFields'
});

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('send-email', require('./componentes/Login/RecuperarPassword/SendEmail.vue').default);
Vue.component('reset-password', require('./componentes/Login/RecuperarPassword/ResetPassword.vue').default);
Vue.component('font-awesome-icon', FontAwesomeIcon)
window.Vue = require('vue').default;

const app = new Vue({
    el: '#app',
    router,
    store
});
