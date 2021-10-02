<template>
    <section>
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'products_index'}">
                                Products
                            </router-link>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Show</li>
                    </ol>
                </nav>
            </div>

            <div class="row mt-2 border border-dark p-4 rounded">
                <div class="col-sm-5">
                    <img src="https://via.placeholder.com/400">
                </div>

                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-10 display-3">
                            {{ product.title }}
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
                    <div class="row">
                        <p>
                            {{ product.description }}
                        </p>

                        <div class="card-content__ratings" v-if="product.rating === 1">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="card-content__ratings" v-else-if="product.rating === 2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="card-content__ratings" v-else-if="product.rating === 3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="card-content__ratings" v-else-if="product.rating === 4">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="card-content__ratings" v-else-if="product.rating === 5">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="row align-items-end">
                        <div class="col">
                            <button class="btn btn-block btn-primary" v-if="!product.isAddedToCart" @click="addToCart(product.id)">{{ addToCartLabel }}</button>
                            <button class="btn btn-block btn-danger" v-if="product.isAddedToCart" @click="removeFromCart(product.id, false)">{{ removeFromCartLabel }}</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'products-show',

    validate ({ params }) {
        return /^\d+$/.test(params.id)
    },

    data () {
        return {
            addToCartLabel: 'Add to cart',
            removeFromCartLabel: 'Remove from cart',
            addToFavouriteLabel: 'Add to favourite',
            removeFromFavouriteLabel: 'Remove from favourite',
            product: {},
            selected: 1,
            quantityArray: []
        };
    },

    mounted () {
        this.product = this.$store.getters.getProductById(this.$route.params.id);
        this.selected = this.product.quantity;

        for (let i = 1; i <= 20; i++) {
            this.quantityArray.push(i);
        }
    },

    computed: {
        isAddedBtn () {
            return this.product.isAddedBtn;
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
        onSelectQuantity (id) {
            let data = {
                id: id,
                quantity: this.selected
            }
            this.$store.commit('quantity', data);
        },
        saveToFavorite (id) {
            let isUserLogged = this.$store.state.userInfo.isLoggedIn;

            if (isUserLogged) {
                this.$store.commit('addToFavourite', id);
            } else {
                this.$store.commit('showLoginModal', true);
            }
        },
        removeFromFavourite (id) {
            this.$store.commit('removeFromFavourite', id);
        }
    }
};
</script>

<style lang="scss" scoped>
.card-content {
    padding: 15px 10px 15px 0;

    &__text {
        margin: 15px 0;
    }
    &__reviews {
        display: inline-block;
        width: 100%;
        margin-bottom: 10px;
    }
}
.row {
    min-height: 10rem;
    //background-color: rgba(255,0,0,.1);
}
.row>.col,  .row>[class^=col-] {
    //background-color: rgba(86,61,124,.15);
    //border: 1px solid rgba(86,61,124,.2);
}
</style>

