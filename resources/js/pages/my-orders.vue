<template>
    <div class="container mx-auto">
        <div class="bg-pink-500 mx-auto p-4 w-full md:w-1/2 m-2 text-white font-bold text-center" v-if="check === false">
            See Orders You Must Be Log In
        </div>
        <div v-if="check === true">
            <div class="text-center md:my-2">
                <h2 class="text-xl md:text-3xl text-red-300 font-bold uppercase section-title">Offer Orders</h2>
            </div>
            <div class="div overflow-x-scroll" style="height: 500px;">
                <table class="border-collapse border-2 border-gray-500 mx-auto">
                <thead class="bg-gray-300">
                    <tr class="text-gray-800">
                        <th class="border border-gray-400 px-4 py-2">ORDER ID</th>
                        <th class="border border-gray-400 px-4 py-2">PLAYER ID</th>
                        <th class="border border-gray-400 px-4 py-2">PACKAGE ID</th>
                        <th class="border border-gray-400 px-4 py-2">PRODUCT NAME</th>
                        <th class="border border-gray-400 px-4 py-2">AMOUNT</th>
                        <th class="border border-gray-400 px-4 py-2">STATUS</th>
                        <th class="border border-gray-400 px-4 py-2">PAYMENT</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr v-for="order in orders" :key="order.id" >
                        <td class="border border-gray-400 px-4 py-2">{{ order.id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ order.user_id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ order.package_id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ order.name }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ formatPrice(order.sale_price) }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ order.status }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ order.payment }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-4 py-2 text-right font-bold" colspan="4">Total</td>
                        <td class="border border-gray-400 px-4 py-2 text-left font-bold" colspan="3">{{ formatPrice(totalPrice()) }}</td>
                    </tr>
                </tbody>
                </table>
            </div>



             <div class="text-center md:my-2">
                <h2 class="text-xl md:text-3xl text-red-300 font-bold section-title">SHOP ORDERS</h2>
            </div>
            <div class="div overflow-x-scroll" style="height: 500px;">
                <table class="border-collapse border-2 border-gray-500 mx-auto">
                <thead class="bg-gray-300">
                    <tr class="text-gray-800">
                        <th class="border border-gray-400 px-4 py-2">ORDER ID</th>
                        <th class="border border-gray-400 px-4 py-2">PLAYER ID</th>
                        <th class="border border-gray-400 px-4 py-2">AMOUNT</th>
                        <th class="border border-gray-400 px-4 py-2">STATUS</th>
                        <th class="border border-gray-400 px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr v-for="invoice in invoices" :key="invoice.id" >
                        <td class="border border-gray-400 px-4 py-2">{{ invoice.id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ invoice.user_id }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ formatPrice(invoice.total) }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ invoice.status }}</td>
                        <td class="border border-gray-400 px-4 py-2">
                            <router-link :to="{
                                name: 'order-details',
                                params: { id: invoice.id } }"  
                                class="px-2 py-1 mt-2  mr-2 text-sm font-semibold bg-orange-400 text-white rounded dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-200 focus:text-gray-900 hover:bg-red-300 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
                                href="#"
                            >
                                Detials
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-4 py-2 text-right font-bold" colspan="2">Total</td>
                        <td class="border border-gray-400 px-4 py-2 text-left font-bold" colspan="3">{{ formatPrice(totalPrice()) }}</td>
                    </tr>
                </tbody>
                </table>
            </div>

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
            invoices:[],
            orders:[],
        }
    },
    methods: {
        getInvoicesData(){
            var id = this.user.id;
            axios.get(`/api/invoices-data/${id}`).then(response => {
                this.invoices = response.data;
            });
        },
        getOrdersData(){
            var id = this.user.id;
            axios.get(`/api/orders-data/${id}`).then(response => {
                this.orders = response.data;
            });
        },
        totalPrice() {
            let total = 0;

            for (let item of this.invoices) {
                total += item.total;
            }
            this.totalSop = total;
            return total.toFixed(2);
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
    },
    mounted() {
        this.getInvoicesData();
        this.getOrdersData();
    }
}
</script>

<style>
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