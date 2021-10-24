<template>
    <div class="header pb-8 pt-2">
        <div class="d-flex flex-row-reverse">

            <router-link
                v-show="(productsAdded.length > 0)"
                class="btn btn-danger "
                :to="{name: 'checkout'}">
                Checkout
            </router-link>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <!--        Products    -->
                    <div class="row text-center  justify-content-around">
                        <div v-for="product in products" :key="product.id" class="card col-sm-3 p-0 mt-3">
                            <product :product="product"></product>
                        </div>
                        <div v-if="products.length === 0" class="section">
                            <p>{{ noProductLabel }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Product from "./product";

export default {
    name: "products",

    components: {Product},

    data() {
        return {
            id: '',
            noProductLabel: 'No product found',
            productsFiltered: [],
        };
    },

    computed: {
        products() {
            if (this.$store.state.userInfo.hasSearched) {
                return this.getProductByTitle();
            } else {
                return this.$store.state.products.filter(product => product.status !== 'Delivered');
            }
        },
        productsAdded() {
            return this.$store.getters.productsAdded;
        }
    },

    methods: {
        // getProductByTitle () {
        //     let listOfProducts = this.$store.state.products,
        //         titleSearched = this.$store.state.userInfo.productTitleSearched;
        //
        //     return this.productsFiltered = getByTitle(listOfProducts, titleSearched);
        // }
    }

}
</script>

<style scoped>
*{
    box-sizing: unset !important;
}
</style>
