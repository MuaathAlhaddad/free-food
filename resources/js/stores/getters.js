import store from '../store';

export default {
    productsAdded: state => {
        return state.foods.filter(el => {
            return el.isAddedToCart;
        });
    },
    productsAddedToFavourite: state => {
        return state.foods.filter(el => {
            return el.isFavourite;
        });
    },
    getProductById: state => id => {
        return state.foods.find(product => product.id == id);
    },
    isUserLoggedIn: state => {
        return state.userInfo.isLoggedIn;
    },
    isUserSignedUp: state => {
        return state.userInfo.isSignedUp;
    },
    getUserName: state => {
        return state.userInfo.name;
    },
    isLoginModalOpen: state => {
        return state.systemInfo.openLoginModal;
    },
    isSignupModalOpen: state => {
        return state.systemInfo.openSignupModal;
    },
    isCheckoutModalOpen: state => {
        return state.systemInfo.openCheckoutModal;
    },
    quantity: state => {
        return state.foods.quantity;
    }
}
