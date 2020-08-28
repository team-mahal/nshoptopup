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
            <p class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded">{{ product.sale_price }} &#2547;</p>
            <button @click="addToCart(product)" class="flex justify-center items-center text-white text-center mt-3 md:mt-0 bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-cart-plus fa-w-18 h-5 w-5 mr-1"><path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" class=""></path></svg>    
                Add To Cart
            </button>
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
