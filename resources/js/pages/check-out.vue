<template>
  <div class="container mx-auto" style="min-height: 480px">
    <div class="flex flex-wrap">
      <div class="md:w-8/12 w-full pr-2 md:pr-6 px-2">
        <div class="w-full shadow-lg p-2 pr-8 px-2 border-2">
          <h3
            class="text-3xl sm:text-1xl md:text-2xl lg:text-3xl text-red-300 font-bold"
          >
            Your order
          </h3>
          <div v-for="item in cart" :key="item.id" class="navbar-item" href="">
            <div class="flex flex-wrap p-2">
              <div class="w-1/5 border-2 p-2">
                <img
                  class="w-full h-16 md:h-24 rounded"
                  :src="'/product/' + item.logo"
                  v-bind:alt="item.name"
                />
              </div>
              <div class="w-9/12">
                <p class="text-base font-serif px-2">{{ item.name }}</p>
                <div class="control px-2 mt-2">
                  <button
                    class="bttn bttn-left px-2 hover:bg-gray-300"
                    id="minus"
                    @click.prevent="minusQuntity(item)"
                  >
                    <span>-</span>
                  </button>
                  <input
                    type="number"
                    class="input"
                    :id="item.id"
                    :value="item.quantity.toLocaleString()"
                    v-on:input="changeQuntity(item, $event.target.value)"
                  />
                  <button
                    class="bttn bttn-right px-2 hover:bg-gray-300"
                    id="plus"
                    @click.prevent="plusQuntity(item)"
                  >
                    <span>+</span>
                  </button>
                </div>
              </div>
              <div class="items-center justify-center" style="width:5%">
                <div
                  class="font-normal text-lg mb-1"
                  style="display: inline-flex;"
                >
                  <p
                    class="text-xl font-normal mr-1 font-black"
                    style="margin-top: -4px;"
                  >
                    &#2547;
                  </p>
                  <div>{{ item.quantity * item.sale_price }}</div>
                </div>
                <span
                  class="removeBtn cursor-pointer"
                  title="Remove from cart"
                  @click.prevent="removeFromCart(item)"
                  >Remove</span
                >
              </div>
            </div>
            <hr class="" />
          </div>
        </div>
      </div>
      <div class="md:w-4/12 h-full w-full mt-3 md:mt-0 mx-2 md:mx-0  shadow-lg p-2 border-2">
        <h3
          class="text-3xl sm:text-1xl md:text-2xl p-2 lg:text-3xl text-red-300 font-bold"
        >
          Order Summary
        </h3>
        <div v-for="item in cart" :key="item.id" class="navbar-item" href="">
          <div class="flex flex-wrap p-2">
            <div class="w-9/12">
              <p class="text-base font-serif px-2">{{ item.name }}</p>
            </div>
            <div class="flex items-center" style="width:5%">
              <div
                class="font-normal text-lg mb-1"
                style="display: inline-flex;"
              >
                <p
                  class="text-xl font-normal mr-1 font-black"
                  style="margin-top: -4px;"
                >
                  &#2547;
                </p>
                <div>{{ item.quantity * item.sale_price }}</div>
              </div>
            </div>
          </div>
          <hr class="" />
        </div>
        <hr class="" />
        <hr class="" />
        <div class="flex flex-wrap p-2">
          <div class="w-9/12">
            <p class="font-bold font-serif px-2">Total</p>
          </div>
          <div class="flex items-center" style="width:5%">
            <div class="font-bold text-lg mb-1" style="display: inline-flex;">
              <p
                class="text-xl font-bold mr-1 font-black"
                style="margin-top: -4px;"
              >
                &#2547;
              </p>
              <div>{{ totalPrice() }}</div>
            </div>
          </div>
        </div>
          <hr class="h-1 bg-gray-600 mb-2"/>
        <div class="flex flex-wrap ml-4">
          <h5 class="mr-4 font-bold mt-2">TrxId</h5>
          <div>
            <input id="search" v-model="trxid" placeholder="Transaction ID" class="float-right p-2 bg-gray-200 hover:bg-white hover:border-gray-300 border-lg border-pink-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300">
            <p v-if="trxid === ''" class="text-pink-700">Transaction ID required</p>
          </div>
        </div><br>
        <p
          class="text-white cursor-pointer text-center bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded mb-0"
          v-on:click="submitOrder()"
        >
          Confirm Payment
        </p>
      </div>
    </div>
    <div v-if="modal" class="modal sm:px-3">
      <div class="lg:w-6/12 sm:w-10/12 mx-auto bg-white">
        <header class="card p-4 border-b-2">
          <span
            v-on:click="modal = false"
            class="float-right hover:text-red-300 text-2xl transform -translate-y-3 cursor-pointer"
            >×</span
          >
          <div class="grid grid-cols-1 gap-4 justify-center items-center">
            <div>
              <h2 class="text-1xl text-gray-900 font-bold">
                Login First To Confirm Order
              </h2>
            </div>
          </div>
        </header>
        <div
          class="modal-body bg-gray-300 py-5 md:px-2 sm:px-2"
        >
          <div class="bg-white p-4">
            <div class="mt-8">
              <form
                v-if="check == false"
                @submit.prevent="login"
                @keydown="form.onKeydown($event)"
                class="w-full"
              >
                <div class="w-full px-3 mb-6 md:mb-3">
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="email"
                  >
                    {{ $t("email") }}
                  </label>
                  <input
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="email"
                    name="email"
                    placeholder="Email"
                  />
                  <has-error class="text-red-600" :form="form" field="email" />
                </div>
                <div class="w-full px-3 mb-6 md:mb-3">
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="email"
                  >
                    {{ $t("password") }}
                  </label>
                  <input
                    v-model="form.password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    type="password"
                    name="password"
                    placeholder="Password"
                  />
                  <has-error :form="form" field="password" />
                </div>
                <div class="text-right px-3">
                  <p class="text-sm text-gray-900 transform -translate-y-2">
                    Login First To Submit Order
                  </p>
                  <div class="flex float-right">
                    <label
                      for="remember-me"
                      class="font-bold text-xs text-red-300 mr-2"
                    >
                      {{ $t("remember_me") }} </label
                    ><checkbox
                      v-model="remember"
                      name="remember"
                      class=""
                    ></checkbox>
                  </div>
                </div>
                <div class="w-full px-3 mb-6 md:mb-3 mt-2">
                  <button
                    class="appearance-none block w-full bg-red-300 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                    :loading="form.busy"
                  >
                    {{ $t("login") }}
                  </button>
                </div>
              </form>
              <div v-else>
                  <div class="appearance-none block w-full bg-green-600 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500">
                    Succesfully Login
                  </div>

                  <p
                    class="text-white cursor-pointer text-center bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 mt-2 rounded mb-0"
                    v-on:click="submitOrder()"
                  >
                    Confirm Payment
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Form from "vform";
import { mapGetters } from "vuex";
import axios from "axios";
import Swal from "sweetalert2";
export default {
  computed: mapGetters({
    cart: "cart/cart",
    cartCount: "cart/cartCount",
    user: "auth/user",
    check: "auth/check"
  }),
  data() {
    return {
      modal: false,
      remember: false,
      totalSop: 0,
      trxid: '',
      form: new Form({
        email: "",
        password: ""
      })
    };
  },
  methods: {
    submitOrder() {
      if(this.trxid == ''){
        Swal.fire({
          type: "warning",
          title: "Transaction Id filed is required",
          text: "Transaction ID required",
          reverseButtons: true,
          confirmButtonText: "ok"
        })
      }else if(this.check == false){
        this.modal = true;
      }else{
        axios.get(`/api/trxidData/${this.trxid}/${this.user.id}/${this.totalSop}`).then(response => {
          console.log(response.data);
          if(response.data.error == '0')
          {
            if(response.data.used_code == '1')
            {
              var form = document.createElement("div");
              form.innerHTML = "<b style='color:red;'>This trxID is Already Used !!!</b><br><p>Sender Number : <b>"+ response.data.transaction.sender +"</b></p><p>Amount : <b>"+ response.data.transaction.amount +"</b></p>";
              Swal.fire({
                  title: "Order Failed !!!",
                  html: form,
                  type: "warning",
                  reverseButtons: true,
                  confirmButtonText: "ok"
              })
            }else{
              if(response.data.order_success_code == '0')
              {
                var form = document.createElement("div");
                form.innerHTML = "<b style='color:red;'>Your Order is Not Completed</b><br><p>Sender Number : <b>"+ response.data.transaction.sender +"</b></p><p>Amount : <b>"+ response.data.transaction.amount +"</b></br><b style='color:green;'>This Amount Add Your Wallet Check please</b><br><i>Your Payment Amount Less Than Shop Amount As a result Order Failed</i></p>";
                Swal.fire({
                    title: "Order Failed !!!",
                    html: form,
                    type: "warning",
                    reverseButtons: true,
                    confirmButtonText: "ok"
                })
              }else{
                if(response.data.extra_money == '1'){
                  axios.post(`/api/shopOrder/${this.totalSop}/${this.user.id}`, this.cart).then(response => {
                    if (response.data == "true") {
                      this.$store.dispatch('cart/checkOut', [])
                      Swal.fire({
                        type: "success",
                        title: "Order Completed",
                        html: "Your Order Has Been Successfully Completed <br><p style='color: green;'>Extra Amount Add Your Wallet Check please</p>",
                        reverseButtons: true,
                        confirmButtonText: "ok"
                      })
                    } else {
                      Swal.fire({
                        type: "error",
                        title: "Order Failed",
                        text: "Order Request Error !!!",
                        reverseButtons: true,
                        confirmButtonText: "ok"
                      })
                    }
                  });
                }else{
                  axios.post(`/api/shopOrder/${this.totalSop}/${this.user.id}`, this.cart).then(response => {
                    if (response.data == "true") {
                      this.$store.dispatch('cart/checkOut', [])
                      Swal.fire({
                        type: "success",
                        title: "Order Completed",
                        text: "Your Order Has Been Successfully Completed",
                        reverseButtons: true,
                        confirmButtonText: "ok"
                      })
                    } else {
                      Swal.fire({
                        type: "error",
                        title: "Order Failed",
                        text: "Order Request Error !!!",
                        reverseButtons: true,
                        confirmButtonText: "ok"
                      })
                    }
                  });
                }
              }
            }
          }else{
            var form = document.createElement("div");
            if(response.data.transaction.trxStatus == '0010' || response.data.transaction.trxStatus == '0011'){
              form.innerHTML = "<b style='color:red;'>bKash Say, trxID is valid but transaction is in pending state.</b>";
            }else if(response.data.transaction.trxStatus == '0100'){
              form.innerHTML = "<b style='color:red;'>bKash Say, trxID is valid but transaction has been reversed.</b>";
            }else if(response.data.transaction.trxStatus == '0111'){
              form.innerHTML = "<b style='color:red;'>bKash Say, trxID is valid but transaction has failed.</b>";
            }else if(response.data.transaction.trxStatus == '1001'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Invalid MSISDN input. Try with correct mobile no.</b>";
            }else if(response.data.transaction.trxStatus == '1002'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Invalid trxID, it does not exist.</b>";
            }else if(response.data.transaction.trxStatus == '1003'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Access denied. Username or Password is incorrect.</b>";
            }else if(response.data.transaction.trxStatus == '1004'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Access denied. trxID is not related to this username.</b>";
            }else if(response.data.transaction.trxStatus == '2000'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Access denied. User does not have access to this module.</b>";
            }else if(response.data.transaction.trxStatus == '2001'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Access denied. User date time request is exceeded of the defined limit.</b>";
            }else if(response.data.transaction.trxStatus == '3000'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Missing required mandatory fields for this module</b>";
            }else if(response.data.transaction.trxStatus == '9999'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Could not process request.</b>";
            }else if(response.data.transaction.trxStatus == '4001'){
              form.innerHTML = "<b style='color:red;'>bKash Say, Already Submited This trxID .</b>";
            }else{
              form.innerHTML = "<b style='color:red;'>bKash Say, This trxID is Not Valid !!!</b>";
            }
            Swal.fire({
                title: "Order Failed !!!",
                html: form,
                type: "warning",
                reverseButtons: true,
                confirmButtonText: "ok"
            })
          }
        });
      }
    },
    removeFromCart(item) {
      this.$store.dispatch("cart/removeFromCart", item);
    },
    plusQuntity(item) {
      this.$store.dispatch("cart/plusQuntity", item);
    },
    minusQuntity(item) {
      var id = document.getElementById(item.id).value;
      if (id > 1) {
        this.$store.dispatch("cart/minusQuntity", item);
      }
    },
    changeQuntity(item, new_quntity) {
      if (new_quntity > 0) {
        item["new_quntity"] = new_quntity;
        this.$store.dispatch("cart/changeQuntity", item);
      } else {
        document.getElementById(item.id).value = item.quantity;
      }
    },
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Redirect home.
      // this.$router.push({ name: 'home' })
    },
    totalPrice() {
      let total = 0;

      for (let item of this.cart) {
        total += item.quantity * item.sale_price;
      }
      this.totalSop = total;
      return total.toFixed(2);
    },
    checkCartIconToggle() {
      this.$emit("toggleCartIcon");
    }
  },
  mounted() {
    this.checkCartIconToggle();
  }
};
</script>
<style>
.removeBtn {
  position: relative;
  bottom: 0;
  left: 0;
  right: 0;
}
.control {
  display: flex;
  width: 90px;
  height: 31px;
}
.control .bttn-left {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}
.control .input {
  width: calc(100px * 0.5);
  padding: 0;
  margin: 0;
  text-align: center;
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  border-left: none;
  border-right: none;
}
.control a.bttn {
  color: black;
  text-decoration: none;
}
.control a.bttn,
.control .bttn {
  width: calc(100px * 0.5);
  text-align: center;
  border: 1px solid black;
  box-shadow: none;
  background-color: white;
  font-weight: bold;
}
.control a.bttn span,
.control .bttn span {
  margin: auto !important;
}
.control .bttn-right {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
.bttn:hover {
  background: #ccc;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
/* Modal css */
.modal {
  z-index: 3;
  padding-top: 100px;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
}
.modal-body {
  height: 500px;
  overflow-y: scroll;
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
@media only screen and (max-width: 500px) {
  .modal {
    padding: 0px 5px !important;
  }
  .modal-body {
    padding: 0px 5px !important;
  }
}
</style>
