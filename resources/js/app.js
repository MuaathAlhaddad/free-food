import store from './store.js';

window.Vue = require('vue').default;

import productsIndex from './pages/products-index.vue';

const app = new Vue({
    el: '#app',
    store,
    components:{
        productsIndex
    }
});
