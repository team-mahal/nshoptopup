<template>
  <div class="navbar-item has-dropdown is-hoverable bg-white borded-2 rounded-t-lg">
    
    <div class="flex justify-between text-3xl font-bold bg-gray-600 border-b-2 text-white p-2">
      <h2 class="">Cart Items</h2>
      <svg @click="toggleCartIcon()" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-right fa-w-14 h-8 w-8 text-white mt-1"><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" class=""></path></svg>
    </div>
    <!-- {{ cart }} -->
    <div v-if="cart.length > 0" class="navbar-dropdown is-boxed is-right">
      <div class=" bg-white p-2">
        <div class="">

        </div>
      <div
        v-for="item in cart"
        :key="item.id"
        class="navbar-item"
        href=""
      >

          <div class="flex flex-wrap p-2">
              <div class="w-1/5">
                  <img
                    class="w-full h-16 rounded"
                    :src="'/product/' + item.logo"
                    v-bind:alt="item.name"
                  />
              </div>
              <div class="w-9/12">
                  <p class="text-base font-serif px-2">{{ item.name }}</p>
                  <h5 class="text-sm px-2">&#2547; {{ item.sale_price }} x {{ item.quantity }} = &#2547; {{ item.quantity * item.sale_price }}</h5>
              </div>
              <div class="flex items-center justify-center" style="width:5%">
                  <span
                    class="removeBtn"
                    title="Remove from cart"
                    @click.prevent="removeFromCart(item)"
                >X</span>
              </div>
          </div>
          <hr class="" />

        <!-- {{ item.name }} x{{ item.quantity }} - &#2547; {{ item.quantity * item.sale_price }} -->

      </div>
      <h4 class="navbar-item text-center mt-1 text-base font-semibold" href=""> Total: &#2547; {{ totalPrice() }} </h4>
      <div class="flex p-2 mt-2 justify-center items-center">
            <router-link  :to="'/check-out'" class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded w-40">Check Out</router-link>
            <!-- <button class="flex justify-center items-center text-white text-center mt-3 md:mt-0 bg-pink-400 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded">
                Order Now
            </button> -->
        </div>
    </div>
    </div>
    <div v-else class="navbar-dropdown is-boxed is-right px-2">
      <img src="/img/empty-cart-small.png" class="w-full"/>
      <h4 class="navbar-item text-center my-2 text-base font-semibold" href=""> Your cart is Empty! </h4>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: mapGetters({
    cart: "cart/cart",
    cartCount: "cart/cartCount"
  }),
  methods: {
    removeFromCart(item) {
      this.$store.dispatch('cart/removeFromCart', item)
    },
    totalPrice() {
      let total = 0;

      for (let item of this.cart) {
        total += item.quantity * item.sale_price;
      }

      return total.toFixed(2);
    },
    toggleCartIcon() {
      this.$emit('toggleCartIcon');
    },
    checkOut() {
        this.$store.dispatch('cart/checkOut', [])
    }
  },
  watch: {
    canI: function () {
      if (this.canI) {
        ++this.counter;
        this.$emit('increment');
      }
    }
  }
};
</script>

<style>
.removeBtn {
  margin-right: 1rem;
  color: red;
}
</style>
