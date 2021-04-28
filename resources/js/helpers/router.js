import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);
export const router = new Router({
    mode: 'history',
    routes: [
        { path: '/', props: true, component: require('../componentes/inicio/Home.vue').default },
        
    ]
});