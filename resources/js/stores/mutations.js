export default {
    setPosts(state, response) {
        state.posts = response.data.data;
    },
    setItems(state, response) {
        state.items = response.data.data;
    },
    addToCart: (state, id) => {
        state.products.forEach(el => {
            if (id === el.id) {
                el.isAddedToCart = true;
            }
        });
    },
    setAddedBtn: (state, data) => {
        state.products.forEach(el => {
            if (data.id === el.id) {
                el.isAddedBtn = data.status;
            }
        });
    },
    removeFromCart: (state, id) => {
        state.products.forEach(el => {
            if (id === el.id) {
                el.isAddedToCart = false;
            }
        });
    },
    removeProductsFromFavourite: state => {
        state.products.filter(el => {
            el.isFavourite = false;
        });
    },
    removeDeliveredProductsFromList: state => {
        state.products.filter(product => {
                if (product.isAddedToCart) {
                    product.status = 'Delivered'
                }
            }
        );
    },
    isUserLoggedIn: (state, isUserLoggedIn) => {
        state.userInfo.isLoggedIn = isUserLoggedIn;
    },
    isUserSignedUp: (state, isSignedUp) => {
        state.userInfo.isSignedUp = isSignedUp;
    },
    setHasUserSearched: (state, hasSearched) => {
        state.userInfo.hasSearched = hasSearched;
    },
    setUserName: (state, name) => {
        state.userInfo.name = name;
    },
    setProductTitleSearched: (state, titleSearched) => {
        state.userInfo.productTitleSearched = titleSearched;
    },
    showLoginModal: (state, show) => {
        state.systemInfo.openLoginModal = show;
    },
    showSignupModal: (state, show) => {
        state.systemInfo.openSignupModal = show;
    },
    showCheckoutModal: (state, show) => {
        state.systemInfo.openCheckoutModal = show;
    },
    addToFavourite: (state, id) => {
        state.products.forEach(el => {
            if (id === el.id) {
                el.isFavourite = true;
            }
        });
    },
    removeFromFavourite: (state, id) => {
        state.products.forEach(el => {
            if (id === el.id) {
                el.isFavourite = false;
            }
        });
    },
    quantity: (state, data) => {
        state.products.forEach(el => {
            if (data.id === el.id) {
                el.quantity = data.quantity;
            }
        });
    },
    SET_USER(state, authUser) {
        state.authUser = authUser
    }
}
