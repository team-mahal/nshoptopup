<template>
  <div class="container mx-auto w-full md:w-6/12 xl:w-8/12">
    <div class="flex  flex-wrap shadow-lg m-2 md-m-0">
      <div class="md:w-5/12 w-full p-2">
        <div class="flex justify-center py-5">
          <img
            class="w-full rounded"
            :src="'/product/' + product.logo"
            v-bind:alt="product.name"
          />
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 sm:gap-2 md:gap-4 mb-2">
            <p class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded">Buy Now</p>
            <button @click="addToCart(product)" class="text-white text-center mt-3 md:mt-0 bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded">Add To Cart</button>
        </div>
      </div>
      <div class="md:w-7/12 w-full p-2">
        <div class="px-2 py-1">
          <h3
            class="text-4xl sm:text-1xl md:text-2xl lg:text-4xl text-red-300 font-bold"
          >
            {{ product.name }}
          </h3>
          <div class="font-bold text-xl mb-2" style="display: inline-flex;"><p class="text-2xl font-bold mr-1 font-black" style="margin-top: -5px;">&#2547; - </p> <div>{{ product.sale_price }}</div></div>
        </div>
        <div
          class="font-bold text-xs text-gray-600 px-2 py-1 mb-2"
          v-html="product.description"
        >
          {{ product.description }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      product: []
    };
  },
  methods: {
    fetchProduct() {
      let id = this.$route.params.id;
      axios.get(`/api/shop-product/${id}`).then(response => {
        this.product = response.data;
        this.showElement = response.data.type;
      });
    },
    addToCart(product) {
        this.$store.dispatch('cart/addToCart', product)
    }
  },
  mounted() {
    this.fetchProduct();
  }
};
</script>
