import Vue from 'vue'
import Router from 'vue-router';
import ResourceShow from "./pages/resource-show.vue";
import ProductsIndex from "./pages/resource-index.vue";

Vue.use(Router)


export default new Router({
            mode: 'history',

            routes: [
                {
                    path: "/website",
                    component: ProductsIndex,
                    name: "products_index"
                },
                {
                    path: "/website/:id?",
                    component: ResourceShow,
                    name: "products_show"
                },
            ],

            fallback: false
        });
