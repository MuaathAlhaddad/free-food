import Vue from 'vue'
import VueRouter from 'vue-router';
import products_show from "./pages/products-show.vue";

Vue.use(VueRouter)


export const router = {
    mode: 'history',
    base: decodeURI('/'),
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',

    routes: [
        {
            path: "/user/wishlist",
            component: _0f5a94d3,
            name: "user-wishlist"
        },
        {
            path: "/products/:id?",
            component: product_show,
            name: "products_show"
        },
        {
            path: "/",
            component: _eaf173ce,
            name: "index"
        }
    ],

    fallback: false
}
