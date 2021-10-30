import Vue from "vue";

import store from './store.js';
import router from './route.js';

window.Vue = require('vue').default;

// import productsIndex from './pages/products-index.vue';
// // import productsShow from './pages/products-show.vue';
import itemsIndex from './pages/items-index.vue';
// import productsShow from './pages/item-show.vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
const app = new Vue({
    el: '#app',
    store,
    router,
    components:{
        // productsIndex,
        // productsShow,
        itemsIndex
    }
});
