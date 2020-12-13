<template>
    <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0">
        <h1 class="text-center text-2xl lg:text-4xl text-red-300 font-extrabold mt-2 lg:mt-8 mb-2 lg:mb-6">Withdraw Money</h1>
        <div class="justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                 <input  id="ckb_10" type="radio" checked name="foo" style="display: none"/>
                <label for="ckb_10">
                    <div @click="paymentMethod = 1" class="border-2 cursor-pointer border-gray-300 items-center text-center rounded-lg p-3 focus:bg-red-300 focus:outline-none focus:shadow-outline">
                        <img src="/img/bkash.png" alt="" class="w-24 mx-auto">
                        <h4 class="text-base font-bold text-red-300">bkash</h4>
                    </div>
                </label>
                <input  id="ckb_91" type="radio" name="foo"  style="display: none"/>
                <label for="ckb_91">
                    <div @click="paymentMethod = 2" class="border-2 cursor-pointer border-gray-300 items-center text-center rounded-lg p-3 focus:outline-none focus:shadow-outline">
                        <img src="/img/nogod.png" alt="" class="w-24 mx-auto">
                        <h4 class="text-base font-bold text-red-300">Nagad</h4>
                    </div>
                </label>
                <input  id="ckb_92" type="radio" name="foo" style="display: none"/>
                <label for="ckb_92">
                    <div @click="paymentMethod = 3" class="border-2 cursor-pointer border-gray-300 items-center text-center rounded-lg p-3 focus:outline-none focus:shadow-outline">
                        <img src="/img/roket.png" alt="" class="w-24 mx-auto">
                        <h4 class="text-base font-bold text-red-300">Rocket</h4>
                    </div>
                </label>
            </div>
            <div class="mt-5 border-2 border-gray-600 shadow-xl p-5 text-center">
                <div v-if="paymentMethod == 1">
                    <img src="/img/bkash.png" alt="" class="w-24 mx-auto">
                    <!-- <h5 class="text-base font-bold">Our bkash number: <b class="text-red-300">017544894898</b> </h5> -->
                </div>
                <div v-else-if="paymentMethod == 2">
                    <img src="/img/nogod.png" alt="" class="w-24 mx-auto">
                    <!-- <h5 class="text-base font-bold">Our Nagad number: <b class="text-red-300">017845725454</b> </h5> -->
                </div>
                <div v-else-if="paymentMethod == 3">
                    <img src="/img/roket.png" alt="" class="w-24 mx-auto">
                    <!-- <h5 class="text-base font-bold">Our rocket number: <b class="text-red-300">01784565598</b> </h5> -->
                </div>
                <h5 class="font-bold mt-3">Your wallet : {{ user.wallet }} BDT <span>( Charge {{ charge() }} )</span></h5>
                <h5 class="font-bold mt-1">Your earn wallet : {{ user.earn_wallet }} BDT</h5>
                <h5 class="font-bold mt-1 text-red-300">The maximum amount of your deposit : {{ totalDeposite() }}  BDT</h5>
                <div class="mt-5">
                    <h4 class="font-bold text-base">Withdraw Amount</h4>
                    <input v-model="amount" required type="number" @input="checkAmount()" placeholder="Amount To Withdraw" class="p-2 class-manual-width bg-white hover:bg-gray-100 hover:border-gray-300 border-lg border-gray-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300" />
                    <p v-if="amount === ''" class="text-pink-700">Amount is required</p>  
                    <p v-if="checkErr" class="text-pink-700">Withdraw amount must less than your maximum deposite amount</p> 
                </div>
                <div class="">
                    <h4 class="font-bold text-base">Receiver Number</h4>
                    <input v-model="paymentNumber" required placeholder="Receiver Number" class="p-2 class-manual-width bg-white hover:bg-gray-100 hover:border-gray-300 border-lg border-gray-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300" />
                    <p v-if="paymentNumber === ''" class="text-pink-700">Receiver Number is required</p> 
                </div>
                <button @click="addAmount()" class="text-white class-manual-width text-center bg-pink-500 hover:bg-pink-800 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-3">Withdraw</button>
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
            discount_percentage: '',
            checkErr : '',
        }
    },
    methods: {
        charge()
        {
            var charge = this.user.wallet * this.discount_percentage / 100;
            var nowAmount = Math.ceil(charge);
            return nowAmount;
        },
        checkAmount(event)
        {
            var charge = this.user.wallet * this.discount_percentage / 100;
            var nowAmount = this.user.earn_wallet + (this.user.wallet - Math.ceil(charge));
            if(this.amount > nowAmount)
            {
                this.amount = nowAmount;
                this.checkErr = 1;
            }else{
                this.checkErr = 0;
            }
        },
        totalDeposite(){
            var charge = this.user.wallet * this.discount_percentage / 100;
            return this.user.earn_wallet + (this.user.wallet - Math.ceil(charge));
        },
        addAmount(){
            if(this.check == false){
                Swal.fire({
                    type: "warning",
                    title: "You are not login user",
                    html: "<p style='color: red;'>Login first to add wallet</p>",
                    reverseButtons: true,
                    confirmButtonText: "ok"
                });
            }else if(this.amount == ''){
                Swal.fire({
                    type: "warning",
                    title: "Amount not amount",
                    html: "<p style='color: red;'>Withdraw amount not empty or required</p>",
                    reverseButtons: true,
                    confirmButtonText: "ok"
                });
            }else if(this.paymentNumber == ''){
                Swal.fire({
                    type: "warning",
                    title: "Receiver number not empty",
                    html: "<p style='color: red;'>Receiver number not empty or required </p>",
                    reverseButtons: true,
                    confirmButtonText: "ok"
                });
            }else{
                var params = {
                    paymentMethod: this.paymentMethod,
                    paymentNumber: this.paymentNumber,
                    amount: this.amount
                };
                axios.post(`/api/withdraw-wallet/${this.user.id}`, params).then(response => {
                console.log(response.data);
                    if (response.data == 'true') {
                        this.paymentMethod = 1;
                        this.paymentNumber = '';
                        this.amount = '';
                        Swal.fire({
                            type: "success",
                            title: "Request sent Successfully !",
                            html: "<p style='color: green;'>Your withdraw request has been successfully sent</p>",
                            reverseButtons: true,
                            confirmButtonText: "ok"
                        });
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Request sent Failed",
                            text: "<p style='color: red;'>Your withdraw request has been Not sent</p>",
                            reverseButtons: true,
                            confirmButtonText: "ok"
                        });
                    }
                });
            }
        },
        getPercentage(){
            axios.get("/api/getPercentage").then(response => {
                this.discount_percentage = response.data;
			});
        }
    },
	created() {
		this.getPercentage();
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