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
        let index = state.cart.findIndex(product => product.id == item.id);
        var nowcartCount = 0;
        var oldcartCount = state.cartCount;
        if (index > -1) {
            nowcartCount = state.cartCount.quantity;
            let product = state.cart[index];
            state.cartCount -= product.quantity;
    
            state.cart.splice(index, 1);
        }
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        var cartCount = parseInt(oldcartCount)-parseInt(nowcartCount);
        if(state.cartCount < 0){
            window.localStorage.setItem('cartCount', state.cartCount);
        }else{
            window.localStorage.setItem('cartCount', state.cartCount);
        }
    },
    [types.CHECK_OUT] (state, item) {
        state.cart = [];
        state.cartCount = 0;
        window.localStorage.setItem('cart', []);
        window.localStorage.setItem('cartCount', 0);
    },
    [types.CHANGE_QUNTITY] (state, item) {
        console.log(item);
        let found = state.cart.find(product => product.id == item.id);
        
        //NAN COndition
        if(item.quantity ==''){
            var old_quntity = 0
        }else{
            var old_quntity = item.quantity;
        }
            // Quntity Change 
            if (found) {
                found.quantity = item.new_quntity;
            }
        //NAN COndition
        if(item.new_quntity ==''){
            var add = 0
        }else{
            var add = item.new_quntity
        }
        state.cartCount = parseInt(state.cartCount) - parseInt(old_quntity) + parseInt(add);
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
    },
    [types.MINUS_QUNTITY] (state, item) {
        let found = state.cart.findIndex(product => product.id == item.id);
        if (found != -1) {
            state.cart[found].quantity--;
        }
        state.cartCount--;
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
    },
    [types.PLUS_QUNTITY] (state, item) {
        let found = state.cart.findIndex(product => product.id == item.id);
        if (found != -1) {
            state.cart[found].quantity++;
        }
        state.cartCount++;
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
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
    changeQuntity ({ commit, dispatch }, payload) {
        commit(types.CHANGE_QUNTITY, payload)
    },
    minusQuntity ({ commit, dispatch }, payload) {
        commit(types.MINUS_QUNTITY, payload)
    },
    plusQuntity ({ commit, dispatch }, payload) {
        commit(types.PLUS_QUNTITY, payload)
    },
}
