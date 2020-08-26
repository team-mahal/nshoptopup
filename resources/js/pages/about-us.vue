<template>
    <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0">
        <h1 class="text-center text-2xl lg:text-4xl font-extrabold mt-2 lg:mt-8 mb-2 lg:mb-6">About Us</h1>
        <!-- <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-2 md:gap-4">
            <div class="text-center justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8">
                <div class="rounded-full h-24 w-24 m-auto flex items-center justify-center bg-red-300">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-phone-alt fa-w-16 fa-2x text-white h-10 w-10"><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z" class=""></path></svg>
                </div>
                <h2 class="text-xl md-2xl font-serif font-bold mt-2 lg:mt-4">Contact Number</h2>
                <a href="tel:01889465794" class="text-orange-300">01889465794</a>
            </div>
            <div class="text-center justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8">
                <div class="rounded-full h-24 w-24 m-auto flex items-center justify-center bg-red-300">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-2x text-white h-10 w-10"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" class=""></path></svg>
                </div>
                <h2 class="text-xl md-2xl font-serif font-bold mt-2 lg:mt-4">Contact E-mail</h2>
                <a href="mailto:info@test.kmf" class="text-orange-300">info@test.kmf</a>
            </div>
        </div> -->
    </div>
</template>

<script>
export default {
    data() {
        return{
            aboutData: [],
        }
    },
    methods: {
        getAboutData() {
            axios.get("/api/page-data/1").then(response => {
                this.aboutData = response.data;
            });
        },
    },
    mounted() {
        this.getAboutData();
    }
}
</script>