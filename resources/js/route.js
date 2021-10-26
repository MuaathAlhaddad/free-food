import Vue from 'vue'
import Router from 'vue-router';
import ResourceShow from "./pages/resource-show.vue";
import ResourceIndex from "./pages/resource-index.vue";
import Checkout from "./pages/checkout.vue";
import Shipping from "./pages/shipping.vue";

Vue.use(Router)


export default new Router({
            mode: 'history',

            routes: [
                {
                    path: "/website",
                    component: ResourceIndex,
                    name: "products_index",
                    props: {role: false},
                },
                {
                    path: "/website/:id?",
                    component: ResourceShow,
                    name: "products_show"
                },
                {
                    path: "/checkout",
                    component: Checkout,
                    name: "checkout"
                },
                {
                    path: "/shipping",
                    component: Shipping,
                    name: "shipping"
                },
            ],

            fallback: false
        });
