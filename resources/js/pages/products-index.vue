<template>
    <div class="container">
        <!--        Search Engine     -->
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control form-control-alternative" style="border-radius: 25px; text-align: center;" placeholder="Input Meat Code here ...">
                </div>
            </div>
        </div>
        <!--        Products    -->
        <div class="row text-center  justify-content-around">
                <div class="card col-sm-3 p-0" v-for="product in products" :key="product.id">
                    <product :product="product"></product>
                </div>
                <div class="section" v-if="products.length === 0">
                    <p>{{ noProductLabel }}</p>
                </div>
        </div>
    </div>
</template>

<script>
import Product from "../components/product";
export default {
    name: "products-index",

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

<style lang="scss" scoped>
.card {
    margin: 5px;
}
</style>
