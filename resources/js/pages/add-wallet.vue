<template>
    <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0">
        <h1 class="text-center text-2xl lg:text-4xl text-red-300 font-extrabold mt-2 lg:mt-8 mb-2 lg:mb-6">Add Money</h1>
        <div class="justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                
            </div>
            <div class="mt-5 border-2 border-gray-600 shadow-xl p-5 text-center">
                <div class="mt-5">
                    <h4 class="font-bold text-base">Amount To Add</h4>
                    <input v-model="amount" required type="number" placeholder="Amount To Add" class="p-2 class-manual-width bg-white hover:bg-gray-100 hover:border-gray-300 border-lg border-gray-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300" />
                    <p v-if="amount === ''" class="text-pink-700">Amount is required</p>  
                    <p v-else-if="amount < 10" class="text-pink-700">Must be between 1 and 90000</p> 
                    <p v-else-if="amount >= 90000" class="text-pink-700">Must be between 1 and 90000</p> 
                </div>
                <button @click="addAmount()" class="text-white class-manual-width text-center bg-pink-500 hover:bg-pink-800 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-3">Add Wallet</button>
            </div>
        </div>
        <div id="spay"></div>
    </div>
</template>
<script>
import axios from "axios";
import Swal from "sweetalert2";
import { mapGetters } from "vuex";
export default {
    computed: mapGetters({
    user: "auth/user",
    check: "auth/check"
  }),
    data(){
        return{
            paymentMethod: 1,
            paymentNumber: '',
            amount: 0,
            transactionid:'',
            paymentMethods: [],
        }
    },
    methods: {
        addAmount(){
            if(this.check == false){
                Swal.fire({
                    type: "warning",
                    title: "You are not login user",
                    html: "<p style='color: red;'>Login first to add wallet</p>",
                    reverseButtons: true,
                    confirmButtonText: "ok"
                });
            }else{
                if(this.amount>0){
                    var params = {
                        amount: this.amount
                    };
                    axios.post(`/api/add-wallet/${this.user.id}`, params).then(response => {
                        document.getElementById("spay").innerHTML=response.data;
                        document.getElementById('frm_submit').submit()
                    });
                }
            }
        },
        loadPaymentMethod() {
			axios.get("/api/paymentMethods").then(response => {
                console.log(response.data)
				this.paymentMethods = response.data;
			});

		},
    },
	created() {
		this.loadPaymentMethod();
	}
}
</script>

<style scoped>
input:checked + label{
  background: #9A309E;
    border-radius: 10px;
}
.class-manual-width{
    width: 25rem;
}
@media only screen and (max-width: 475px) {
    .class-manual-width{
    width: 100%;
}
}
</style>