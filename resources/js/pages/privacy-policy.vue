<template>
    <div class="container mx-auto w-full p-2 md:p-0">
        <h1 class="text-center text-2xl lg:text-4xl font-extrabold mt-2 lg:mt-8 mb-2 lg:mb-6">{{ privacyPolicyData.title }}</h1>
        <div class="justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8" v-html="privacyPolicyData.content">dfghfgh</div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return{
            privacyPolicyData: [],
        }
    },
    methods: {
        getPrivacyPolicyData() {
            axios.get("/api/page-data/2").then(response => {
                this.privacyPolicyData = response.data;
            });
        },
    },
    mounted() {
        this.getPrivacyPolicyData();
    }
}
</script>