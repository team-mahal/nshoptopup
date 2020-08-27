<template>
  <div>
    <div class="container mx-auto">
      <carousel :autoplay="true" :items="1" autoHeight="true">
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
        <img src="/img/banner.jpg" />
      </carousel>
    </div>

    <section class="container mx-auto" id="favourite-game">
      <div class="text-center">
        <h2 class="text-4xl text-red-300 font-bold">FAVOURITE GAMES</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 md:gap-4 p-2 lg:p-0">
          <div
            v-for="product in products"
            :key="product.id"
            class="rounded overflow-hidden shadow-lg hover:shadow-xl border-2 mt-5"
          >
            <router-link
              :to="{
                name: 'details',
                params: { id: product.id, slug: makeSlug(product.name) }
              }"
            >
              <!-- params: { id: product.id,slug: makeSlug(product.name) }, -->

              <img
                class="w-full"
                :src="'/product/' + product.logo"
                v-bind:alt="product.name"
              />
              <div class="px-2 py-4">
                <div class="font-bold text-sm mb-2">{{ product.name }}</div>
                <p class="text-gray-700 text-base">
                  {{ product.tag_line }}
                </p>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-gray-100">
      <div class="container mx-auto mt-5">
        <h3 class="text-3xl text-center font-bold py-5">
          Top-up or Buy game's item, cheap and fast only at KMF
        </h3>
        <div class="flex flex-wrap">
          <div class="w-1/4 rounded overflow-hidden mt-5 mx-auto">
            <img class="w-full" src="/1.svg" alt="Sunset in the mountains" />
            <div class="px-6 py-4">
              <h2 class="font-bold text-sm mb-2 text-center">
                1. Top Up Your Favourite Game
              </h2>
              <p class="text-gray-700 text-base">
                Millions of gamer choose UniPin! Top Up your favourite game
                here!
              </p>
            </div>
          </div>
          <div class="w-1/4 rounded overflow-hidden mr-5 mt-5  mx-auto">
            <img class="w-full" src="/1.svg" alt="Sunset in the mountains" />
            <div class="px-6 py-4">
              <div class="font-bold text-sm mb-2 text-center">
                2. Choose the Amount and Pay
              </div>
              <p class="text-gray-700 text-base text-center">
                Easy to Top Up and attracting promo. You can pay using your
                favourite Payment Channel!
              </p>
            </div>
          </div>
          <div class="w-1/4 rounded overflow-hidden mr-5 mt-5 mx-auto">
            <img class="w-full" src="/3.svg" alt="Sunset in the mountains" />
            <div class="px-6 py-4">
              <div class="font-bold text-sm mb-2 text-center">
                3. Get the Item / Voucher
              </div>
              <p class="text-gray-700 text-base text-center">
                Item / Voucher will instantly sent to you and our Customer
                support will help you 24/7!
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container mx-auto mt-5">
        <div class="mx-auto"> <!-- max-w-screen-lg -->
          <main class="mt-12">
            <!-- recent posts -->
            <div
              class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between"
            >
              <h2 class="font-bold text-xl sm:text-2xl md:text-3xl">NEWS & EVENTS</h2>
              <router-link
                :to="{
                  name: 'blogs',
                }"
                class="text-white cursor-pointer bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
              >
                View all
              </router-link>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">
            <!-- <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-4"> -->
              <div
                v-for="blog in blogs"
                :key="blog.id"
                class="rounded w-full p-3 sm:p-3 md:p-4 lg:p-0 xl:p-0">
                <img
                  :src="'/blog/' + blog.logo"
                  v-bind:alt="blog.title"
                  class="rounded h-48 w-full"
                />
                <div class="p-4 pl-0">
                  <h2 class="font-bold text-xl text-gray-800">
                    {{ blog.title }}
                  </h2>
                  <p v-if="blog.description.length <= 200" class="text-gray-700 text-sm mt-2 h-24 min-h-full" v-html="blog.description.substring(-6, 200)">
                  </p>

                  <p v-else class="text-gray-700 text-sm mt-2 h-24 min-h-full" v-html="blog.description.substring(-6, 150)+ ' ........'">
                  </p> 

                  <router-link
                    :to="{
                      name: 'blog-details',
                      params: { id: blog.id, slug: makeSlug(blog.title) }
                    }"
                    class="inline-block mt-4 ml-auto bg-orange-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded"
                  >
                    Read more
                  </router-link>
                </div>
              </div>

            </div>
            <!-- end recent posts -->
          </main>
          <!-- main ends here -->
        </div>
      </div>
    </section>

    
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import carousel from "vue-owl-carousel";
import axios from "axios";
export default {
  layout: "default",
  components: { carousel },

  metaInfo() {
    return { title: this.$t("home") };
  },
  data: () => ({
    title: "Kmf Gaming Mall",
    products: [],
    blogs: []
  }),

  methods: {
    loadProducts() {
      axios.get("/api/products").then(response => {
        this.products = response.data;
      });
    },
    loadBlogs() {
      axios.get("/api/blogs").then(response => {
        this.blogs = response.data;
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

  computed: mapGetters({
    authenticated: "auth/check"
  }),
  mounted() {
    this.loadProducts();
    this.loadBlogs();
  }
};
</script>
