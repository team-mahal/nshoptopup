<template>
  <div class="container mx-auto">
    <div class="flex flex-wrap">
      <div class="md:w-8/12 w-full pr-6 px-2">
        <div class="w-full shadow-lg p-2 pr-8 px-2 border-2">
          <h3
            class="text-3xl sm:text-1xl md:text-2xl lg:text-3xl text-red-300 font-bold"
          >
            Your order
          </h3>
          <div v-for="item in cart" :key="item.id" class="navbar-item" href="">
            <div class="flex flex-wrap p-2">
              <div class="w-1/5 border-2 p-2">
                <img
                  class="w-full h-24 rounded"
                  :src="'/product/' + item.logo"
                  v-bind:alt="item.name"
                />
              </div>
              <div class="w-9/12">
                <p class="text-base font-serif px-2">{{ item.name }}</p>
                <div class="control px-2 mt-2">
                  <button
                    class="bttn bttn-left px-2 hover:bg-gray-300"
                    id="minus"
                  >
                    <span>-</span>
                  </button>
                  <input type="number" class="input" id="input" :value="item.quantity"/>
                  <button
                    class="bttn bttn-right px-2 hover:bg-gray-300"
                    id="plus"
                  >
                    <span>+</span>
                  </button>
                </div>
              </div>
              <div class="items-center justify-center" style="width:5%">
                <div
                  class="font-normal text-lg mb-1"
                  style="display: inline-flex;"
                >
                  <p
                    class="text-xl font-normal mr-1 font-black"
                    style="margin-top: -4px;"
                  >
                    &#2547;
                  </p>
                  <div>{{ item.quantity * item.sale_price }}</div>
                </div>
                <span
                  class="removeBtn cursor-pointer"
                  title="Remove from cart"
                  @click.prevent="removeFromCart(item)"
                  >Remove</span
                >
              </div>
            </div>
            <hr class="" />
          </div>
        </div>
      </div>
      <div class="md:w-4/12 h-full w-full shadow-lg p-2 border-2">
        <h3
          class="text-3xl sm:text-1xl md:text-2xl p-2 lg:text-3xl text-red-300 font-bold"
        >
          Order Summary
        </h3>
        <div v-for="item in cart" :key="item.id" class="navbar-item" href="">
          <div class="flex flex-wrap p-2">
            <div class="w-9/12">
              <p class="text-base font-serif px-2">{{ item.name }}</p>
            </div>
            <div class="flex items-center" style="width:5%">
              <div
                class="font-normal text-lg mb-1"
                style="display: inline-flex;"
              >
                <p
                  class="text-xl font-normal mr-1 font-black"
                  style="margin-top: -4px;"
                >
                  &#2547;
                </p>
                <div>{{ item.quantity * item.sale_price }}</div>
              </div>
            </div>
          </div>
          <hr class="" />
        </div>
        <hr class="" />
        <hr class="" />
        <div class="flex flex-wrap p-2">
          <div class="w-9/12">
            <p class="font-bold font-serif px-2">Total</p>
          </div>
          <div class="flex items-center" style="width:5%">
            <div class="font-bold text-lg mb-1" style="display: inline-flex;">
              <p
                class="text-xl font-bold mr-1 font-black"
                style="margin-top: -4px;"
              >
                &#2547;
              </p>
              <div>{{ totalPrice() }}</div>
            </div>
          </div>
        </div>
        <p
          class="text-white text-center bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded mb-4"
        >
          Confirm Payment
        </p>
      </div>
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
      this.$store.dispatch("cart/removeFromCart", item);
    },
    totalPrice() {
      let total = 0;

      for (let item of this.cart) {
        total += item.quantity * item.sale_price;
      }

      return total.toFixed(2);
    },
    checkCartIconToggle() {
      this.$emit("toggleCartIcon");
    }
  },
  mounted() {
    this.checkCartIconToggle();
  }
};
</script>
<style>
.removeBtn {
  position: relative;
  bottom: 0;
  left: 0;
  right: 0;
}
.control {
  display: flex;
  width: 90px;
  height: 31px;
}
.control .bttn-left {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}
.control .input {
  width: calc(100px * 0.5);
  padding: 0;
  margin: 0;
  text-align: center;
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  border-left: none;
  border-right: none;
}
.control a.bttn {
  color: black;
  text-decoration: none;
}
.control a.bttn,
.control .bttn {
  width: calc(100px * 0.5);
  text-align: center;
  border: 1px solid black;
  box-shadow: none;
  background-color: white;
  font-weight: bold;
}
.control a.bttn span,
.control .bttn span {
  margin: auto !important;
}
.control .bttn-right {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
.bttn:hover {
  background: #ccc;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
