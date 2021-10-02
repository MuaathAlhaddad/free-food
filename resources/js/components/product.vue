<template>
    <div>

        <img class="card-img-top" src="https://thesmartlocal.com/images/easyblog_articles/3016/localfoodkl-36.jpg" alt="Placeholder image">

        <div class="card-body ">
            <div class="row justify-content-between">
                <div class="col-sm-10 text-left pl-0">
                    <router-link
                        class="display-4 card-title p-0 m-0 text-left"
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
                        {{ product.title }}
                    </router-link>
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

                <div class="text-center">
                    <span v-for="tag in product.tags" :key="tag.index" class="m-1 badge badge-pill" :class="badgeColors[random(badgeColors.length)]">{{ tag }}</span>
                </div>

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
        },
        badgeColors () {
            return this.$store.state.badgeColors;
        }
    },

    methods: {
        random(max) {
          return Math.floor(Math.random() * max);;
        },
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


