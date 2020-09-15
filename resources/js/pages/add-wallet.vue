<template>
    <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0">
        <h1 class="text-center text-2xl lg:text-4xl text-red-300 font-extrabold mt-2 lg:mt-8 mb-2 lg:mb-6">Add Money</h1>
        <div class="justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                 <input  id="ckb_10" type="radio" checked name="foo" style="display: none"/>
                <label for="ckb_10">
                    <div @click="paymentMethod = 1" class="border-2 cursor-pointer border-gray-300 items-center text-center rounded-lg p-3 focus:bg-red-300 focus:outline-none focus:shadow-outline">
                        <img v-if="paymentMethods[0] && paymentMethods[0].logo" :src="'/paymentMethod/'+paymentMethods[0].logo" alt="" class="w-24 mx-auto">
                        <h4 v-if="paymentMethods[0] && paymentMethods[0].name" class="text-base font-bold text-red-300">{{ paymentMethods[0].name }}</h4>
                    </div>
                </label>
                <input  id="ckb_91" type="radio" name="foo"  style="display: none"/>
                <label for="ckb_91">
                    <div @click="paymentMethod = 2" class="border-2 cursor-pointer border-gray-300 items-center text-center rounded-lg p-3 focus:outline-none focus:shadow-outline">
                        <img v-if="paymentMethods[1]" :src="'/paymentMethod/'+paymentMethods[1].logo" alt="" class="w-24 mx-auto">
                        <h4 v-if="paymentMethods[1]" class="text-base font-bold text-red-300">{{ paymentMethods[1].name }}</h4>
                    </div>
                </label>
                <input  id="ckb_92" type="radio" name="foo" style="display: none"/>
                <label for="ckb_92">
                    <div @click="paymentMethod = 3" class="border-2 cursor-pointer border-gray-300 items-center text-center rounded-lg p-3 focus:outline-none focus:shadow-outline">
                        <img v-if="paymentMethods[1]" :src="'/paymentMethod/'+paymentMethods[2].logo" alt="" class="w-24 mx-auto">
                        <h4 v-if="paymentMethods[1]" class="text-base font-bold text-red-300">{{ paymentMethods[2].name }}</h4>
                    </div>
                </label>
            </div>
            <div class="mt-5 border-2 border-gray-600 shadow-xl p-5 text-center">
                <div v-if="paymentMethod == 1">
                    <img v-if="paymentMethods[1]" :src="'/paymentMethod/'+paymentMethods[0].logo" alt="" class="w-24 mx-auto">
                    <h5 v-if="paymentMethods[1]" class="text-base font-bold">Our {{ paymentMethods[0].name }} number: <b class="text-red-300">{{ paymentMethods[0].number }}</b> </h5>
                    <p class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-2">How to add money?</p>
                    <span class="my-3 mt-3" style="font-family: auto;">
                        Follow below steps 👇 <br>
                        <b>  Step 1: </b><br>
                        Dial *247# <br>
                        Select Send Money Option.<br>
                        Enter NSHOPTOPUP Personal Account Number.<br>
                        Enter Your amount<br>
                        Enter Reference Number "PlayZone".<br>
                        Now Enter your PIN.<br><br>
                        <b>Almost Done. Now follow Step 2:</b><br>
                        Now Enter Amount To Add place The money you sent and Sender Number Place This is the number from which you paid.<br>
                        Verify your Payment by entering amount and bKash mobile account number.<br>
                        Once NSHOPTOPUP Verify your payment details, Within 1 hours your money will be added.<br>
                    </span>
                </div>
                <div v-else-if="paymentMethod == 2">
                    <img :src="'/paymentMethod/'+paymentMethods[1].logo" alt="" class="w-24 mx-auto">
                    <h5 class="text-base font-bold">Our {{ paymentMethods[1].name }} number: <b class="text-red-300">{{ paymentMethods[1].number }}</b> </h5>
                    <p class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-2">How to add money?</p>
                    <span class="my-3 mt-3" style="font-family: auto;">
                        Follow below steps 👇 <br>
                        <b>  Step 1: </b><br>
                        Dial *167#<br>
                        Select Send Money Option.<br>
                        Enter NSHOPTOPUP Personal Account Number.<br>
                        Enter Your amount<br>
                        Enter Reference Number "PlayZone".<br>
                        Now Enter your PIN.<br><br>
                        <b>Almost Done. Now follow Step 2:</b><br>
                        Now Enter Amount To Add place The money you sent and Sender Number Place This is the number from which you paid.<br>
                        Verify your Payment by entering amount and bKash mobile account number.<br>
                        Once NSHOPTOPUP Verify your payment details, Within 1 hours your money will be added.<br>
                    </span>
                </div>
                <div v-else-if="paymentMethod == 3">
                    <img :src="'/paymentMethod/'+paymentMethods[2].logo" alt="" class="w-24 mx-auto">
                    <h5 class="text-base font-bold">Our {{ paymentMethods[2].name }} number: <b class="text-red-300">{{ paymentMethods[2].number }}</b> </h5>
                    <p class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-2">How to add money?</p>
                    <span class="my-3 mt-3" style="font-family: auto;">
                        Follow below steps 👇 <br>
                        <b>  Step 1: </b><br>
                        Dial *322#<br>
                        Select Send Money Option (option 2).<br>
                        Enter NSHOPTOPUP Personal Account Number.<br>
                        Enter Your amount<br>
                        Now Enter your PIN.<br><br>
                        <b>Almost Done. Now follow Step 2:</b><br>
                        Now Enter Amount To Add place The money you sent and Sender Number Place This is the number from which you paid.<br>
                        Verify your Payment by entering amount and rocket mobile account number.<br>
                        Once NSHOPTOPUP Verify your payment details, Within 1 hours your money will be added.<br>
                    </span>
                </div>
                <div class="mt-5">
                    <h4 class="font-bold text-base">Amount To Add</h4>
                    <input v-model="amount" required type="number" placeholder="Amount To Add" class="p-2 class-manual-width bg-white hover:bg-gray-100 hover:border-gray-300 border-lg border-gray-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300" />
                    <p v-if="amount === ''" class="text-pink-700">Amount is required</p>  
                    <p v-else-if="amount < 10" class="text-pink-700">Must be between 10 and 90000</p> 
                    <p v-else-if="amount >= 90000" class="text-pink-700">Must be between 10 and 90000</p> 
                </div>
                <div class="">
                    <h4 class="font-bold text-base">Transaction id</h4>
                    <input v-model="transactionid" required placeholder="Transaction id" class="p-2 class-manual-width bg-white hover:bg-gray-100 hover:border-gray-300 border-lg border-gray-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300" />
                    <p v-if="paymentNumber === ''" class="text-pink-700">Transaction id is required</p> 
                </div>
                <div class="">
                    <h4 class="font-bold text-base">Sender Number</h4>
                    <input v-model="paymentNumber" required placeholder="Sender Number" class="p-2 class-manual-width bg-white hover:bg-gray-100 hover:border-gray-300 border-lg border-gray-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300" />
                    <p v-if="paymentNumber === ''" class="text-pink-700">Sender Number is required</p> 
                </div>
                <button @click="addAmount()" class="text-white class-manual-width text-center bg-pink-500 hover:bg-pink-800 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-3">Add Wallet</button>
            </div>
        </div>
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
            amount: '',
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
                var params = {
                    paymentMethod: this.paymentMethod,
                    transactionid: this.transactionid,
                    paymentNumber: this.paymentNumber,
                    amount: this.amount
                };
                axios.post(`/api/add-wallet/${this.user.id}`, params).then(response => {
                if (response.data == 'true') {
                    this.paymentMethod = 1;
                    this.paymentNumber = '';
                    this.amount = '';
                    Swal.fire({
                        type: "success",
                        title: "Request sent successfully !",
                        html: "<p style='color: green;'>Your request has been successfully sent</p>",
                        reverseButtons: true,
                        confirmButtonText: "ok"
                    });
                    } else {
                    Swal.fire({
                        type: "error",
                        title: "Order Send Failed",
                        html: "<p style='color: red;'>You Have A Pending Request. Please Completed it Before Make Another</p>",
                        reverseButtons: true,
                        confirmButtonText: "ok"
                    });
                    }
                });
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