export default {
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
