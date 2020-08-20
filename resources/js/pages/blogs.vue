<template>
    <div class="container mx-auto w-full px-2 lg-px-6">
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
        <h1 class="text-center text-2xl lg:text-4xl font-extrabold mt-2 lg:mt-8">NEWS & EVENTS</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-1 lg:mt-5">
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
    </div>
</template>
<script>
import axios from "axios";
import carousel from "vue-owl-carousel";
export default {
    components: { carousel },
    data(){
        return{
            blogs: [],
        }
    },
    methods: {
        loadBlogs() {
            axios.get("/api/all-blog").then(response => {
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
    mounted() {
        this.loadBlogs();
    }
}
</script>