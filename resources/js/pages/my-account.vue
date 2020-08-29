<template>
    <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0" style="min-height: 460px">
        <img v-if="user.file" :src="'/user/'+user.file" alt="opps" class="rounded-full h-24 w-24 m-auto flex items-center justify-center mt-2 lg:mt-8 border-2 border-gray-500" id="prodile">
        <div v-else class="rounded-full h-24 w-24 m-auto flex items-center justify-center bg-red-300 mt-2 lg:mt-8 text-white text-2xl md:text-4xl font-bold" id="prodile">
            {{ nameFirstChar() }}
        </div>
        <h1 class="text-center text-2xl lg:text-4xl font-extrabold">{{ user.name }}</h1>
        <h4 class="text-center ">User ID : <b>{{ user.id }}</b></h4>
        <h4 class="text-center mb-2">Phone : <b>{{ user.phone }}</b></h4>
        <h4 class="text-center mb-2">Email : <b>{{ user.email }}</b></h4>
        <h4 class="text-center mb-2 lg:mb-6">Address : <b>{{ user.address }}</b></h4>
        <div class="w-full md:w-1/2  mx-auto">
            <div class="text-center justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8" id="mainDiv">
                <div class="rounded-full h-32 w-32 m-auto flex items-center justify-center border-2 border-red-300 bg-red-300" id="insideDid">
                    
                    <div
                  class="font-normal text-lg text-white mb-1"
                  style="display: inline-flex;"
                >
                  <p
                    class="text-2xl font-normal mr-1 font-black"
                    style="margin-top: -4px;"
                  >
                    &#2547;
                  </p>
                  <div class="font-bold text-xl">{{ formatPrice(user.wallet) }}</div>
                </div>
                </div>
                <h2 class="text-xl md-2xl font-serif font-bold mt-2 lg:mt-4">Available Balance</h2>
            </div>
        </div>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
    computed: mapGetters({
        user: "auth/user",
        check: "auth/check"
    }),
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        nameFirstChar()
        {
           return this.user.name.split(/\s/).reduce((response,word)=> response+=word.slice(0,1),'');
        }
    }
}
</script>

<style scoped>
/* #mainDiv:hover #insideDid{
    background: #fc8625 !important;
    color: #ffffff !important;
} */
#prodile{
    border: 2px solid #4b14ce7a;
    box-shadow: 0px 2px 9px 2px #585353;
    background-color: rgb(25 15 107 / 46%);
}
</style>