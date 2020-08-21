import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// // state
let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');
export const state = {
    cart: cart ? JSON.parse(cart) : [],
    cartCount: cartCount ? parseInt(cartCount) : 0,
}

// getters
export const getters = {
    cart: state => state.cart,
    cartCount: state => state.cartCount,
}
// mutations
export const mutations = {
    [types.ADD_TO_CART] (state, item) {
        let found = state.cart.findIndex(product => product.id == item.id);
        if (found != -1) {
            state.cart[found].quantity++;
        } else {
            state.cart.push(item);
        }
        state.cartCount++;
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
    },
    [types.REMOVE_CART] (state, item) {
        let index = state.cart.indexOf(item);
        if (index > -1) {
            let product = state.cart[index];
            state.cartCount -= product.quantity;
    
            state.cart.splice(index, 1);
        }
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
    }

    ,
    [types.CHECK_OUT] (state, item) {
        state.cart = [];
        state.cartCount = 0;
        window.localStorage.setItem('cart', []);
        window.localStorage.setItem('cartCount', 0);
    }
  }

  export const actions = {
    addToCart ({ commit, dispatch }, payload) {
      commit(types.ADD_TO_CART, payload)
    },
    removeFromCart ({ commit, dispatch }, payload) {
        commit(types.REMOVE_CART, payload)
    },
    checkOut ({ commit, dispatch }, payload) {
        commit(types.CHECK_OUT, payload)
    },
}
