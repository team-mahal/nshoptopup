<template>
    <div class="container mx-auto p-2 md:p-0" style="min-height: 460px">
        <div class="w-full md:w-1/2  mx-auto mt-2 lg:mt-8">
            <div class="text-center justify-center shadow-lg hover:shadow-xl p-4 lg:p-8" id="mainDiv">
                <div class="rounded-full h-32 w-32 m-auto flex items-center justify-center border-2 border-red-300" id="insideDid">
                    
                    <div
                  class="font-normal text-lg mb-1"
                  style="display: inline-flex;"
                >
                  <p
                    class="text-2xl font-normal mr-1 font-black"
                    style="margin-top: -4px;"
                  >
                    &#2547;
                  </p>
                  <div class="font-bold text-xl ">{{ formatPrice(user.wallet) }}</div>
                </div>
                </div>
                <h2 class="text-xl md-2xl font-serif font-bold mt-2 lg:mt-4">Available Balance</h2>
            </div>
        </div>
        <div class="text-center md:my-2  mt-2 md:mt-8">
            <h2 class="text-xl md:text-3xl text-red-300 font-bold uppercase section-title">Transaction</h2>
        </div>
        <div class="div overflow-x-scroll" style="height: 500px;">
            <table class="border-collapse border-2 border-gray-500 mx-auto">
            <thead class="bg-gray-300">
                <tr class="text-gray-800">
                    <th class="border border-gray-400 px-4 py-2">Amount</th>
                    <th class="border border-gray-400 px-4 py-2">Number</th>
                    <th class="border border-gray-400 px-4 py-2">Transaction Id</th>
                    <th class="border border-gray-400 px-4 py-2">DATE</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="transaction in transactions" :key="transaction.id" >
                    <td class="border border-gray-400 px-4 py-2">
                        <div
                        class="font-normal text-lg mb-1 font-normal"
                        style="display: inline-flex;"
                        >{{ formatPrice(transaction.amount) }} <p
                            class="text-xl font-normal ml-1 font-black"
                            style="margin-top: -4px;"
                        >
                            &#2547;
                        </p>
                    </div>
                    </td>
                    <td class="border border-gray-400 px-4 py-2">{{ transaction.sender }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ transaction.trxId }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ formatCompat(transaction.created_at) }}</td>
                </tr>
                <tr>
                    <!-- <td class="border border-gray-400 px-4 py-2 text-right font-bold" colspan="4">Total</td> -->
                    <td class="border border-gray-400 px-4 py-2 text-center font-bold">
                    
                    <div
                        class="font-normal text-lg mb-1 font-bold"
                        style="display: inline-flex;"
                        >Total : {{ formatPrice(totalPrice()) }} <p
                            class="text-xl font-normal ml-1 font-black"
                            style="margin-top: -4px;"
                        >
                            &#2547;
                        </p>
                    </div>
                  </td>
                    <td class="border border-gray-400 px-4 py-2 text-left font-bold" colspan="3"></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import axios from "axios";
export default {
    computed: mapGetters({
        user: "auth/user",
        check: "auth/check"
    }),
    data(){
        return{
            transactions:[],
        }
    },
    methods: {
        getTransactions(){
            var id = this.user.id;
            axios.get(`/api/transactions/${id}`).then(response => {
                this.transactions = response.data;
            });
        },
        totalPrice() {
            let total = 0;
            for (let item of this.transactions) {
                total += item.amount;
            }
            return total.toFixed(2);
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        formatCompat(date) {
            date = new Date(date)
            var ms = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return date.getDate() + ' ' + ms[date.getMonth()] + ' ' + date.getFullYear()+ ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
        }
    },
    mounted() {
        this.getTransactions();
    }
}
</script>

<style scoped>
#mainDiv:hover #insideDid{
    background: #fc8625 !important;
    color: #ffffff !important;
}
::-webkit-scrollbar {
  width: 5px;
}
::-webkit-scrollbar-track {
  background: #ffffff;
}
::-webkit-scrollbar-thumb {
  background: #ed6c27;
  border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
table{
    width: 100% !important;
}
.section-title{
    font-size: 1.875rem;
    width: fit-content;
    margin: auto;
    padding: 4px 21px;
    margin-bottom: 20px;
    border-bottom: 4px solid #ed6c27;
}
</style>
