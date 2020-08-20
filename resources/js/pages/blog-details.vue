<template>
    <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0">
        <h1 class="text-2xl md:text-3xl mt-3 lg:mt-10 font-extrabold">{{ blog.title }}</h1>
        <img
            :src="'/blog/' + blog.logo"
            v-bind:alt="blog.title"
            class="rounded w-full mt-3 lg:mt-5 h-32 sm:h-32"
            style="height: 320px"
        />
        <p 
        v-html="blog.description"
        class="mt-3 text-xs sm:text-xs md:text-base md:mt-6 font-serif"
        >
        </p>
        <router-link :to="'/'" class="text-white w-full inline-block cursor-pointer bg-red-400 hover:bg-red-700 text-white font-bold py-2 lg:py-5 mt-4 lg:mt-6 rounded text-center">
            Go Back Home
        </router-link>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return {
            blog: [],
        }
    },
    methods: {
        fetchBlog() {
            let id = this.$route.params.id;
            axios.get(`/api/blog/${id}`).then(response => {
                this.blog = response.data;
            });
        }
    },
    mounted() {
        this.fetchBlog();
    }
}
</script>