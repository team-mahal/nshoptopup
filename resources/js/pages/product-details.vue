<template>
  <div class="container mx-auto">
    <div class="flex">
      <div class="w-5/12 shadow-lg p-2">
        <div class="px-2 py-4">
          <h3 class="text-4xl text-red-300 font-bold">{{ product.name }}</h3>
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
      <div class="w-7/12 px-2">
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
                ID Code
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
                <div v-if="showAcountType === 1" class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
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
          <div class="grid grid-cols-4 gap-4 mt-4">
            <div
              v-for="(p, key, index) in packages"
              :key="index"
              class=""
            >
              <input type="radio" @change="onChangePackage(p)" :value="p.sale_price" :id="key" v-model="checkedData" style="display:none"/>
              <label class="rounded w-full checked:bg-gray-900 float-left p-2 border hover:bg-red-700 focus:bg-red-300 hover:text-white border-gray-300 text-center text-gray-700 font-bold" :for="key">{{ p.name }}</label>
              
            </div>
          </div>
        </div>
        <div
          class="shadow-lg p-2 bg-white p-4 mt-8 transition duration-1000"
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
              <h2 class="text-1xl text-gray-500 border-b-2 font-bold italic mt-4">All Payment Channel</h2>
              <div class="flex mt-2" v-on:click="toggleCollapse">
                  <img src="/icons/wallet.png" class="mr-2" />
                  <div>
                      <h2 class="text-1xl text-gray-700 font-bold">Wallet</h2>
                      <h2 class="text-sm text-red-300 italic font-bold">BDT {{ checkedData.toLocaleString() }} </h2>
                  </div>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-4 gap-4 mt-5">
            <transition name="smooth">
                  <p ref="myText" v-show="show" class="transition duration-1000 ease-in-out">
                    Now it's smooth - getting closer to BS4 collapse, but now I need to know the exact height of each section at a particular screen size to set the max-height. Over-compensating max-width work ok, but is still a bit 'jerky'. Is there a way to calculate an elements height before starting the show/hide? If the max-height value is too small, elements overlap.
                  </p>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      product: [],
      packages: [],
      showElement: 0,
      showAcountType: 1,
      checkedData: '',
      key: '',
      selectedPackageData: [],
      computedHeight: 'auto',
      show: false,
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
        if(event.target.value == 'null' || event.target.value == 'facebook'){
            this.showAcountType = 1;
        }else{
            this.showAcountType = 0;
        }
    },
    onChangePackage(p){
       this.selectedPackageData = p;
    },
    toggle: function(todo){
    	todo.done = !todo.done
    },
    toggleCollapse: function() {
    	this.show = !this.show;
    },
    initHeight: function(){
    
      this.$refs['myText'].style.position = 'absolute';
      this.$refs['myText'].style.visibility = 'hidden';
      this.$refs['myText'].style.display = 'block';
    	      
      const height = getComputedStyle(this.$refs['myText']).height;      
      this.computedHeight= height;  
      
      this.$refs['myText'].style.position = null;
      this.$refs['myText'].style.visibility = null;
      this.$refs['myText'].style.display = 'none';
      
    }
  },
  mounted() {
    this.fetchProduct();
    this.fetchPackages();
    this.initHeight();
  }
};
</script>
<style>
input[type=radio]:checked + .radio {
    background-color: #241009;
}
input[type="radio"]:checked+label { background-color: #DD6B20 !important; color:#ffffff !important; }
.smooth-enter-active, .smooth-leave-active {
  transition: height 5s !important;
  overflow: hidden !important;
}
.smooth-enter, .smooth-leave-to {
  height: 0 !important;
}
</style>