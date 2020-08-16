<template>
  <div class="container mx-auto">
    <div class="flex flex-wrap">
      
      <div class="md:w-5/12 w-full shadow-lg p-2">
        <div class="px-2 py-4">
          <h3 class="text-4xl sm:text-1xl md:text-2xl lg:text-4xl text-red-300 font-bold">{{ product.name }}</h3>
          <h4 class="text-2xl text-red-300 font-bold">
            {{ product.tag_line }}
          </h4>
          <div class="flex justify-center p-3 py-5">
            <div class="w-5/12">
              <img
                class="w-full rounded"
                :src="'/product/' + product.logo"
                v-bind:alt="product.name"
              />
            </div>
          </div>
          <div class="flex flex-wrap mb-4">
            <div class="w-1/4 mb-2 px-1">
              <div
                class="bg-orange-600 w-full hover:bg-red-300 text-white px-1 text-center text-sm py-2 rounded justify-center flex"
              >
                <div>Downlaod</div>
                <img src="/icons/android-os.png" class="ml-1" />
              </div>
            </div>
            <div class="w-1/4 mb-2 px-1">
              <div
                class="bg-orange-600 w-full hover:bg-red-300 text-white px-1 text-center text-sm py-2 rounded justify-center flex"
              >
                <div>Downlaod</div>
                <img src="/icons/mac-os.png" class="ml-1" />
              </div>
            </div>
            <div class="w-1/4 mb-2 px-1">
              <div
                class="bg-orange-600 w-full hover:bg-red-300 text-white px-1 text-center text-sm py-2 rounded justify-center flex"
              >
                <div>Website</div>
                <img src="/icons/link.png" class="ml-1" />
              </div>
            </div>
            <div class="w-1/4 mb-2 px-1">
              <div
                class="bg-orange-600 w-full hover:bg-red-300 text-white px-1 text-center text-sm py-2 rounded justify-center flex"
              >
                <div>Community</div>
                <img src="/icons/messaging.png" class="ml-1" />
              </div>
            </div>
          </div>
          <div
            class="font-bold text-xs text-gray-600 mb-2"
            v-html="product.description"
          >
            {{ product.description }}
          </div>
        </div>
      </div>

      <div class="md:w-7/12 w-full px-2 mt-4">
        <div
          v-if="showElement === 1"
          class="shadow-lg p-2 bg-white p-4 mb-8"
          style="box-shadow: 0 2px 10px #0000003b;"
        >
          <div class="flex">
            <div
              class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
            >
              0
            </div>
            <div class="ml-2">
              <h3 class="text-1xl text-gray-700 font-bold">
                ID / Password
              </h3>
            </div>
          </div>
          <div class="mt-4">
            <form class="w-full">
              <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="account-type"
                  >
                    Account Type
                  </label>
                  <div class="relative">
                    <select
                      class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      id="account-type"
                      @change="onChange($event)"
                    >
                      <option value="null">Select And Option</option>
                      <option value="facebook">Facebook</option>
                      <option value="gmail">Gmail</option>
                    </select>
                    <div
                      class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                    >
                      <svg
                        class="fill-current h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
                <div
                  v-if="showAcountType === 1"
                  class="w-full md:w-1/3 px-3 mb-6 md:mb-0"
                >
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="grid-city"
                  >
                    Facebook Number
                  </label>
                  <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-city"
                    type="text"
                    placeholder="Enter Number"
                  />
                </div>
                <div v-else class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="grid-city"
                  >
                    Your Gmail
                  </label>
                  <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-city"
                    type="email"
                    placeholder="Enter Email"
                  />
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="password"
                  >
                    Password
                  </label>
                  <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="password"
                    type="password"
                    placeholder="Enter Password"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>


        <div
          v-else
          class="shadow-lg p-2 bg-white p-4 mb-8"
          style="box-shadow: 0 2px 10px #0000003b;"
        >
          <div class="flex">
            <div
              class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
            >
              0
            </div>
            <div class="ml-2">
              <h3 class="text-1xl text-gray-700 font-bold">
                ID / Code
              </h3>
            </div>
          </div>
          <div class="mt-4">
            <form class="w-full">
              <div class="flex flex-wrap -mx-3 mb-2">
                <div
                  class="w-full md:mb-0"
                >
                  <label
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="grid-city"
                  >
                   Id Code
                  </label>
                  <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-city"
                    type="text"
                    placeholder="ID CODE"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>


        <div
          class="shadow-lg p-2 bg-white p-4"
          style="box-shadow: 0 2px 10px #0000003b;"
        >
          <div class="flex">
            <div
              class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
            >
              1
            </div>
            <div class="ml-2">
              <h3 class="text-1xl text-gray-700 font-bold">
                Select Denomination
              </h3>
            </div>
          </div>
          <div class="grid grid-cols-4 gap-4 sm:grid-cols-2 md:grid-cols-3 mt-4">
            <div v-for="(p, key, index) in packages" :key="index" class="">
              <input
                type="radio"
                @change="onChangePackage(p)"
                :value="p.sale_price"
                :id="key"
                v-model="checkedData"
                style="display:none"
              />
              <label
                class="rounded w-full checked:bg-gray-900 float-left p-2 border hover:bg-red-700 focus:bg-red-300 hover:text-white border-gray-300 text-center text-gray-700 font-bold"
                :for="key"
                >{{ p.name }}</label
              >
            </div>
          </div>
        </div>
        <div
          class="shadow-lg p-2 bg-white p-4 mt-8 transition duration-1000 pb-10"
          style="box-shadow: 0 2px 10px #0000003b;"
        >
          <div class="flex">
            <div
              class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
            >
              2
            </div>
            <div class="ml-2 w-full">
              <h3 class="text-1xl text-gray-700 font-bold">
                Select Payment Channel
              </h3>
              <h2
                class="text-1xl text-gray-500 border-b-2 font-bold italic mt-4"
              >
                All Payment Channel
              </h2>
              <div class="flex justify-between mt-2" v-on:click="growDiv">
                <div class="-ml-2">
                  <img src="/icons/wallet.png" class="mr-2 float-left" />
                  <div class="float-left">
                    <h2 class="text-1xl text-gray-700 font-bold">Wallet</h2>
                    <h2
                      class="text-sm text-red-300 italic font-bold text-opacity-75"
                    >
                      BDT {{ checkedData.toLocaleString() }}
                    </h2>
                  </div>
                </div>
                <img
                  src="https://img.icons8.com/fluent/45/000000/sort-down.png"
                  class="float-right"
                />
              </div>
            </div>
          </div>
          <div class="w-full mt-4">
            <div id="grow">
              <div class="measuringWrapper">
                <div class="grid grid-cols-3 gap-4">
                  <div
                    class="flex bg-grey-300 border-2 justify-center"
                    v-on:click="modal = true"
                  >
                    <div class="w-full">
                      <div class="flex justify-center">
                        <img
                          src="/bkash.jpg"
                          style="width: 50px;"
                          class="mr-2 p-1"
                        />
                        <h2 class="text-xs text-red-300 font-bold  p-1">
                          BDT {{ checkedData.toLocaleString() }}
                        </h2>
                      </div>
                      <div class="border-t-2 bg-gray-300">
                        <h2 class="text-sm text-gray-900 font-normal pl-2">
                          bKash
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="flex bg-grey-300 border-2 justify-center">
                    <div class="w-full">
                      <div class="flex justify-center">
                        <img
                          src="/bkash.jpg"
                          style="width: 50px;"
                          class="mr-2 p-1"
                        />
                        <h2 class="text-xs text-red-300 font-bold  p-1">
                          BDT {{ checkedData.toLocaleString() }}
                        </h2>
                      </div>
                      <div class="border-t-2 bg-gray-300">
                        <h2 class="text-sm text-gray-900 font-normal pl-2">
                          Kmf Credits (BDT)
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

     <div v-if="modal" class="modal sm:px-3">
        <div class="lg:w-6/12 sm:w-10/12 mx-auto bg-white">
          <header class="card p-4 border-b-2">
            <span
              v-on:click="modal = false"
              class="float-right hover:text-red-300 text-2xl transform"
              >×</span
            >
            <div class="grid grid-cols-5 gap-4 justify-center items-center">
              <div class="justify-center items-center">
                <img
                  src="/bkash.jpg"
                  style="width: 60px;"
                  class="mr-2 p-1 items-center float-right"
                />
              </div>
              <div>
                <h2 class="text-sm text-gray-500 font-bold">
                  Checkout using
                </h2>
                <h2 class="text-1xl text-gray-900 font-bold">
                  bKash
                </h2>
              </div>
            </div>
          </header>
          <div class="modal-body bg-gray-300 py-5 px-32 md:px-2 sm:px-2">
            <div class="bg-white p-4">
              <div class="p-1 bg-gray-300">
                <h4 class="text-gray-500 font-light -pb-2">Item</h4>
                <h4 class="text-gray-700 font-bold">
                  {{ selectedPackageData.name }}
                </h4>
                <h4 class="text-gray-500 font-light mt-2 -pb-2">Price</h4>
                <h4 class="text-1xl text-gray-700 font-bold">
                  BDT {{ formatPrice(selectedPackageData.sale_price) }}
                </h4>
                <div
                  class="w-full justify-end flex"
                  style="border-top: 2px solid gray !important;"
                >
                  <p class="text-xs mr-2 mt-3">Total Amount</p>
                  <div class="text-2xl text-red-300 font-medium">
                    BDT {{ formatPrice(selectedPackageData.sale_price) }}
                  </div>
                </div>
              </div>
              <div class="mt-8">
                <form class="w-full">
                  <div class="w-full px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                      for="name"
                    >
                      Name
                    </label>
                    <input
                      class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      id="name"
                      type="text"
                      placeholder="Enter Name"
                    />
                  </div>
                  <div class="w-full px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                      for="email"
                    >
                      Email
                    </label>
                    <input
                      class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      id="email"
                      type="email"
                      placeholder="Enter Email"
                    />
                  </div>
                  <div class="w-full px-3 mb-6 md:mb-3">
                    <label
                      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                      for="phone"
                    >
                      Phone
                    </label>
                    <input
                      class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      id="phone"
                      type="text"
                      placeholder="Enter Phone"
                    />
                  </div>
                  <div class="text-right px-3">
                      <p class="text-sm text-gray-900 transform -translate-y-2">Your phone number will be use as a proof of transactions</p>
                      <label for="remember-me" class="font-bold text-xs text-red-300 mr-2"> Remember me</label><input type="checkbox" id="remember-me" name="remember-me" value="true" class="transform translate-y-1">
                  </div>
                  <div class="w-full px-3 mb-6 md:mb-3 mt-2">
                    <input
                      class="appearance-none block w-full bg-red-300 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      id="phone"
                      type="submit"
                      value="CONFIRM"
                    />
                  </div>
                  <div class="text-center">
                    <p class="font-normal text-xs text-gray-800 mr-2">Voucher will send to the given email above once the transaction is completed</p>
                    <h4 class="text-sm">By clicking "Confirm", you agree to <a href="" class="text-red-300">Kmf Terms and Conditions.</a></h4>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
  data() {
    return {
      product: [],
      packages: [],
      showElement: 0,
      showAcountType: 1,
      checkedData: "",
      key: "",
      selectedPackageData: [],
      computedHeight: "auto",
      modal: false
    };
  },
  methods: {
    fetchProduct() {
      let id = this.$route.params.id;
      axios.get(`/api/product/${id}`).then(response => {
        this.product = response.data;
        this.showElement = response.data.type;
      });
    },
    fetchPackages() {
      let id = this.$route.params.id;
      axios.get(`/api/packages/${id}`).then(response => {
        this.packages = response.data;
      });
    },
    onChange(event) {
      if (event.target.value == "null" || event.target.value == "facebook") {
        this.showAcountType = 1;
      } else {
        this.showAcountType = 0;
      }
    },
    onChangePackage(p) {
      this.selectedPackageData = p;
    },
    growDiv() {
      if (this.checkedData == "") {
        Swal.fire({
          type: "warning",
          title: "You have to select denomination first",
          text:
            "Please choose the item you want to purchase before select payment channel",
          reverseButtons: true,
          confirmButtonText: "ok"
        });
      } else {
        var growDiv = document.getElementById("grow");
        if (growDiv.clientHeight) {
          growDiv.style.height = 0;
        } else {
          var wrapper = document.querySelector(".measuringWrapper");
          growDiv.style.height = wrapper.clientHeight + "px";
        }
      }
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(2).replace(",", ".");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
  },
  mounted() {
    this.fetchProduct();
    this.fetchPackages();
  }
};
</script>
<style>
input[type="radio"]:checked + .radio {
  background-color: #241009;
}
input[type="radio"]:checked + label {
  background-color: #dd6b20 !important;
  color: #ffffff !important;
}
.smooth-enter-active,
.smooth-leave-active {
  transition: height 5s !important;
  overflow: hidden !important;
}
.smooth-enter,
.smooth-leave-to {
  height: 0 !important;
}
#grow {
  -moz-transition: height 0.5s;
  -ms-transition: height 0.5s;
  -o-transition: height 0.5s;
  -webkit-transition: height 0.5s;
  transition: height 0.5s;
  height: 0;
  overflow: hidden;
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
.modal-body{
    height: 500px;
    overflow-y: scroll;
}
::-webkit-scrollbar {width: 5px;}
::-webkit-scrollbar-track {background: #ffffff; }
::-webkit-scrollbar-thumb {background: #ed6c27; border-radius: 10px;}
::-webkit-scrollbar-thumb:hover {background: #555; }
@media only screen and (max-width: 500px) {
  .modal{padding:0px 5px !important;}
  .modal-body{padding:0px 5px !important;}
}
</style>
