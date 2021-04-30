import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate'
import {StoreME} from './StoreME.module';
Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        StoreME,
    },
    plugins: [
        createPersistedState(
            {
                paths: ['StoreME'],
            },
            ),
      ],
});