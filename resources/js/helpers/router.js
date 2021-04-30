import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);
export const router = new Router({
    mode: 'history',
    routes: [
        { path: '/', props: true, component: require('../componentes/bienvenida/Home.vue').default },
        { path: '/login', props: true, component: require('../componentes/login/Home.vue').default },
        { path: '/register', props: true, component: require('../componentes/registro/Home.vue').default },
    ]
});