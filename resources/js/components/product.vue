<template>
    <div>

        <img class="card-img-top" src="https://via.placeholder.com/250" alt="Placeholder image">

        <div class="card-body ">
            <div class="row justify-content-between">
                <div class="col-sm-10">
                    <h2 class="display-4 card-title p-0 m-0 text-left">{{ product.title }}</h2>
                </div>
                <div class="col-sm-2">
                    <a href="#" :title="addToFavouriteLabel" v-show="!product.isFavourite" @click.prevent="saveToFavorite(product.id)">
                        <i class="far fa-heart text-primary"></i>
                    </a>
                    <a href="" :title="removeFromFavouriteLabel" v-show="product.isFavourite" @click.prevent="removeFromFavourite(product.id)">
                        <i class="fas fa-heart text-primary" ></i>
                    </a>
                </div>
            </div>

            <div class="row mt-2 text-left">
                <p>{{ product.description }}</p>
            </div>

                <h1 class="display-3 text-center"> RM {{ product.price }} </h1>

            <div class="row">
                <div class="col">
                    <i v-if="product.ratings === 1" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 2" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 2" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 3" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 3" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 3" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 4" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 4" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 4" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 4" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 5" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 5" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 5" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 5" class="fa fa-star" style="color: gold;"></i>
                    <i v-if="product.ratings === 5" class="fa fa-star" style="color: gold;"></i>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-block btn-primary" v-if="!product.isAddedToCart" @click="addToCart(product.id)">{{ addToCartLabel }}</button>
                    <button class="btn btn-block btn-danger" v-if="product.isAddedToCart" @click="removeFromCart(product.id, false)">{{ removeFromCartLabel }}</button>
                </div>
            </div>
        <router-link
            class="details"
            :to="{
                    name: 'products_show',
                    params: {
                          id: product.id,
                          title: product.title,
                          price: product.price,
                          rating: product.ratings,
                          reviews: product.reviews,
                          isAddedBtn: product.isAddedBtn
                        }
                    }">
        </router-link>
    </div>
</template>

<script>
export default {
    name: 'product',
    props: ['product'],

    data () {
        return {
            addToCartLabel: 'Add to cart',
            viewDetailsLabel: 'Details',
            removeFromCartLabel: 'Remove from cart',
            addToFavouriteLabel: 'Add to favourite',
            removeFromFavouriteLabel: 'Remove from favourite',
            selected: 1,
            quantityArray: []
        }
    },

    mounted () {
        for (let i = 1; i <= 20; i++) {
            this.quantityArray.push(i);
        }

        if (this.$props.product.quantity > 1) {
            this.selected = this.$props.product.quantity;
        }
    },

    computed: {
        isUserLogged () {
            return this.$store.getters.isUserLoggedIn;
        }
    },

    methods: {
        addToCart (id) {
            let data = {
                id: id,
                status: true
            }
            this.$store.commit('addToCart', id);
            this.$store.commit('setAddedBtn', data);
        },
        removeFromCart (id) {
            let data = {
                id: id,
                status: false
            }
            this.$store.commit('removeFromCart', id);
            this.$store.commit('setAddedBtn', data);
        },
        saveToFavorite (id) {
                this.$store.commit('addToFavourite', id);
        },
        removeFromFavourite (id) {
            this.$store.commit('removeFromFavourite', id);
        },
        onSelectQuantity (id) {
            let data = {
                id: id,
                quantity: this.selected
            }
            this.$store.commit('quantity', data);
        }
    }
}
</script>


