import Vue from 'vue'
import Vuex from 'vuex'
import state from './stores/state.js';
import getters from './stores/getters.js';
import actions from './stores/actions.js';
import mutations from './stores/mutations.js';

Vue.use(Vuex)

export default new Vuex.Store({
    state,

    getters,

    actions,

    mutations,
})
