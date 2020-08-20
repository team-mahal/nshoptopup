<template>
    <div class="container mx-auto">
        <section class="container mx-auto" id="favourite-game">
        <div class="text-center">
            <h2 class="text-4xl text-red-300 font-bold">Shop Products</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 md:gap-4 p-2 lg:p-0">
            <div
                v-for="product in products"
                :key="product.id"
                class="rounded overflow-hidden shadow-lg shadow-manual border-2 mt-5 bg-white"
            >
                <router-link
                :to="{
                    name: 'shop-details',
                    params: { id: product.id, slug: makeSlug(product.name) }
                }"
                >
                <!-- params: { id: product.id,slug: makeSlug(product.name) }, -->

                <img
                    class="w-full h-48 pt-6 pl-6 pr-6 manual-img"
                    :src="'/product/' + product.logo"
                    v-bind:alt="product.name"
                />
                <div class="px-2 py-4">
                    <div class="font-medium text-xl">{{ product.name }}</div>
                    <div class="font-medium text-xl mb-1" style="display: inline-flex;"><p class="text-2xl font-medium mr-1 font-black" style="margin-top: -5px;">&#2547; - </p> <div>{{ product.sale_price }}</div></div>
                    <p class="text-white bg-orange-500 hover:bg-red-300 text-white font-bold py-2 px-2 rounded ml-2">Add To Cart</p>
                </div>
                </router-link>
            </div>
            </div>
        </div>
        </section>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data: () => ({
        products: [],
    }),
    methods: {
        loadProducts() {
            axios.get("/api/shop-products").then(response => {
                this.products = response.data;
            });
        },
        makeSlug(slug) {
            var words = slug.split(" ");
            for (var i = 0; i < words.length; i++) {
                var word = words[i];
                words[i] = word.charAt(0).toLowerCase() + word.slice(1);
            }
            return words.join("-");
        }
    },
    mounted() {
        this.loadProducts();
    }
}
</script>

<style>
.shadow-manual:hover{
   box-shadow: 0 1px 7px 2px rgb(0 0 0 / 10%);
}
.shadow-manual:hover .manual-img{
    padding: 15px 15px 0px 15px;
}
</style>