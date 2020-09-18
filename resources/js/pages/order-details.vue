<template>
    <div class="container mx-auto">
        <div class="text-center md:my-2"> 
            <h2 class="text-xl md:text-3xl text-red-300 font-bold">SHOP ORDER DETAILS</h2>
        </div>
        <div class="div overflow-x-scroll" >
            <table class="border-collapse border-2 border-gray-500 mx-auto">
            <thead class="bg-gray-300">
                <tr class="text-gray-800">
                    <th class="border border-gray-400 px-4 py-2">ORDER ID</th>
                    <th class="border border-gray-400 px-4 py-2">PLAYER ID</th>
                    <th class="border border-gray-400 px-4 py-2">PRODUCT ID</th>
                    <th class="border border-gray-400 px-4 py-2">PRODUCT NAME</th>
                    <th class="border border-gray-400 px-4 py-2">PRICE</th>
                    <th class="border border-gray-400 px-4 py-2">QUANTITY</th>
                    <th class="border border-gray-400 px-4 py-2">ORDER DATE TIME</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="invoice in invoices" :key="invoice.id" >
                    <td class="border border-gray-400 px-4 py-2">{{ invoice.invoice_id }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ invoice.user_id }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ invoice.id }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ invoice.name }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ formatPrice(invoice.sale_price) }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ invoice.quantity }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ invoice.created_at }}</td>
                </tr>
                <tr>
                    <td class="border border-gray-400 px-4 py-2 text-right font-bold" colspan="4">Total</td>
                    <td class="border border-gray-400 px-4 py-2 text-left font-bold" colspan="3">{{ formatPrice(totalPrice()) }}</td>
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
    data() {
        return {
        invoices: []
        };
    },
    methods: {
        fetchInvoices() {
        let id = this.$route.params.id;
        var user_id = this.user.id;
        axios.get(`/api/invoice-details/${id}/${user_id}`).then(response => {
            this.invoices = response.data;
        });
        },
        addToCart(product) {
            this.$store.dispatch('cart/addToCart', product)
        },
        totalPrice() {
            let total = 0;

            for (let item of this.invoices) {
                total += item.sale_price;
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
        this.fetchInvoices();
    }
};
</script>
