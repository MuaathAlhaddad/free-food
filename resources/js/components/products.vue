<template>
    <div>
        <!--        Products    -->
        <div class="row text-center  justify-content-around">
            <div class="card col-sm-3 p-0 mt-3" v-for="product in products" :key="product.id">
                <product :product="product"></product>
            </div>
            <div class="section" v-if="products.length === 0">
                <p>{{ noProductLabel }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import Product from "./product";

export default {
    name: "products",

    components: { Product },

    data () {
        return {
            id: '',
            noProductLabel: 'No product found',
            productsFiltered: [],
        };
    },

    computed: {
        products () {
            if (this.$store.state.userInfo.hasSearched) {
                return this.getProductByTitle();
            } else {
                return this.$store.state.products;
            }
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
