<template>
	<div class="container mx-auto">
		<section class="container mx-auto pb-12" id="favourite-game">
			<div class="text-center">
				<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 md:gap-4 p-2 lg:p-0">
					<div
						v-for="product in similarproduct"
						:key="product.id"
						class="rounded overflow-hidden shadow-lg hover:shadow-xl border-2 mt-5"
					>
						<router-link
							:to="{
								name: 'details',
								params: { id: product.id, slug: makeSlug(product.name) }
							}"
						>
							<!-- params: { id: product.id,slug: makeSlug(product.name) }, -->

							<img
								class="w-full"
								:src="'/product/' + product.logo"
								v-bind:alt="product.name"
							/>
							<div class="px-2 py-4">
								<div class="font-bold text-sm mb-2">{{ product.name }}</div>
								<p class="text-gray-700 text-base">
									{{ product.tag_line }}
								</p>
							</div>
						</router-link>
					</div>
				</div>
			</div>
		</section>
		<div class="flex flex-wrap">
			<div class="md:w-5/12 w-full shadow-lg p-2">
				<div class="px-2 py-4">
					<h3
						class="text-4xl sm:text-1xl md:text-2xl lg:text-4xl text-red-300 font-bold"
					>
						{{ product.name }}
					</h3>
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
					v-if="showElement == 1"
					class="shadow-lg p-2 bg-white p-4 mb-8"
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex relative">
						<div
							class="rounded-full h-10 w-10 bg-red-300 flex items-center justify-center text-white text-lg absolute" style="top: -42px;"
						>
							1
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
											v-model="idCodeIdPasswordForm.type"
										>
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
										v-model="idCodeIdPasswordForm.email"
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
										v-model="idCodeIdPasswordForm.email"
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
										v-model="idCodeIdPasswordForm.password"
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
					<div class="flex relative">
						<div
							class="rounded-full h-10 w-10 bg-red-300 flex items-center justify-center text-white text-lg absolute"
							style="top: -42px;"
						>
							0
						</div>
						<div class="ml-2">
							<h3 class="text-1xl text-gray-700 font-bold">
								ID / Code
							</h3>
						</div>
					</div>
					<div>
						<form class="w-full">
							<div class="flex flex-wrap -mx-3 mb-2">
								<div class="w-1/2 md:mb-0 m-3">
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
										v-model="idCodeIdPasswordForm.email"
									/>
									<input type="hidden" v-model="idCodeIdPasswordForm.password" value="id code">
									<input type="hidden" v-model="idCodeIdPasswordForm.type" value="id code">
								</div>
								<div class="w-1/23 m-3 md:mb-0" style="display: none;">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="grid-city"
									>
										Game Name
									</label>
									<input
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										id="grid-city"
										type="text"
										placeholder="Game Name"
										v-model="idCodeIdPasswordForm.password"
									/>
									<input type="hidden" v-model="idCodeIdPasswordForm.password" value="id code">
									<input type="hidden" v-model="idCodeIdPasswordForm.type" value="id code">
								</div>
							</div>
						</form>
					</div>
				</div>

				<div
					class="shadow-lg p-2 bg-white "
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex relative">
						<div
							class="rounded-full h-10 w-10 bg-red-300 flex items-center justify-center text-white text-lg absolute"
							style="top: -42px;"
						>
							2
						</div>
						<div class="ml-2">
							<h3 class="text-1xl text-gray-700 font-bold">
								Select Recharge
							</h3>
						</div>
					</div>
					<div
						class="flex flex-wrap mt-4 justify-center"
					>	
						<div class="text-center" v-for="(game, key, index) in packages" :key="game.id">
					  		<div class="m-1">
					  			<label :for="game.id" class="mb-0 list-group-item py-3 d-block"  style="width: 8rem; font-size: 11px;position: relative;    overflow: hidden;">
					  				<span class="absolute left-0" :class="selectedPackageData.id==game.id ? 'element-check-label' : ''" style="color: #fff;"> L </span>
						  			<input class="absolute" required style="visibility: hidden;" :id="game.id" @change="onChangePackage(game)" v-model="checkedData" name="send" :value="game.sale_price" type="radio">
									<span class="text-xs">{{ game.name }}</span>
						  		</label>
						  	</div>
					  	</div> 
					  	
					</div>
				</div>
				<div
					class="shadow-lg p-2 bg-white p-4 mt-8 transition duration-1000 pb-10"
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex relative">
						<div
							class="rounded-full h-10 w-10 bg-red-300 flex items-center justify-center text-white text-lg absolute"
							style="top: -42px;"
						>
							3
						</div>
						<div class="ml-2">
							<h3 class="text-1xl text-gray-700 font-bold">
								Select Payment
							</h3>
						</div>
					</div>
					<div class="w-full mt-4">
						<div id="grow">
							<div class="measuringWrapper text-gray-900">
								<div>
									<div v-if="check == false" class="flex flex-wrap">
										<p v-on:click="modal = true" class="w-1/2 text-white cursor-pointer text-center bg-orange-500 hover:bg-pink-500 text-white py-2 px-2 rounded mb-0">
											Login
										</p>
										<div class="w-1/2">
											<router-link :to="{ name: 'register' }" class="text-center block bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2 w-full" active-class="active">
												{{ $t('register') }}
											</router-link>
										</div>
									</div>
									<div v-else>
										<div 
											v-if="user!=null"
											class="flex bg-grey-300 border-2 justify-center"
										>
											<label :for="'p100000'" class="mb-0 w-40 list-group-item pt-3 d-block w-full"  style="font-size: 11px;position: relative;overflow: hidden;">
												<div class="w-full">
													<span class="absolute left-0" :class="selectedpaymentmethod.id==100000 ? 'element-check-label' : ''" style="color: #fff;"> L </span>
													<input class="absolute" required style="visibility: hidden;" :id="'p100000'" @change="onChangePayment({id:100000,name:'NPay'})" name="sends" :value="{id:100000,name:'nshopwallet'}" type="radio">
													<div class="flex justify-between cursor-pointer py-1 px-2">
														<img
															src="/4.png"
															style="width: 150px;"
															class="mr-2 p-1 object-contain"
														/>
														<h2 class="text-xs font-bold text-gray-900  p-1">
															<p>Price</p>
															<p>BDT {{ checkedData }}</p>
														</h2>
													</div>
													<div class="border-t-2 bg-gray-300">
														<h2 class="text-sm text-gray-900 font-normal pl-2">
															Pay With NPay
														</h2>
													</div>
												</div>
											</label>
										</div>
										<div 
											v-if="user!=null"
											class="flex bg-grey-300 border-2 justify-center"
										>
											<label :for="'p0'" class="mb-0 w-40 list-group-item pt-3 d-block w-full"  style="font-size: 11px;position: relative;overflow: hidden;">
												<div class="w-full">
													<span class="absolute left-0" :class="selectedpaymentmethod.id==0 ? 'element-check-label' : ''" style="color: #fff;"> L </span>
													<input class="absolute" required style="visibility: hidden;" :id="'p0'" @change="onChangePayment({id:0,name:'nshopwallet'})" name="sends" :value="{id:0,name:'nshopwallet'}" type="radio">
													<div class="flex justify-between cursor-pointer py-1 px-2">
														<img
															src="/logo.png"
															style="width: 100px;"
															class="mr-2 p-1 object-contain"
														/>
														<h2 class="text-xs font-bold text-gray-900  p-1">
															<p>Price</p>
															<p>BDT {{ checkedData }}</p>
														</h2>
													</div>
													<div class="border-t-2 bg-gray-300">
														<h2 class="text-sm text-gray-900 font-normal pl-2">
															Pay With Nshop wallet
														</h2>
													</div>
												</div>
											</label>
										</div>
										
										<div
											class="flex bg-grey-300 border-2 justify-center mt-3"
											v-for="m in paymentMethods"
										>
											<label :for="'p'+m.id" class="mb-0 w-40 list-group-item pt-3 d-block w-full"  style="font-size: 11px;position: relative;    overflow: hidden;">
												<div class="w-full">
									  				<span class="absolute left-0" :class="selectedpaymentmethod.id==m.id ? 'element-check-label' : ''" style="color: #fff;"> L </span>
										  			<input class="absolute" required style="visibility: hidden;" :id="'p'+m.id" @change="onChangePayment(m)" name="sends" :value="m" type="radio">
													<div class="flex justify-between cursor-pointer py-1 px-2">
														<img
															:src="'/paymentMethod/'+m.logo"
															style="width: 40px;height: 40px"
															class="mr-2 p-1 object-contain"
														/>
														<h2 class="text-xs font-bold text-gray-900  p-1">
															<p>Price</p>
															<p>{{  m.currency }} {{ abc(m.discount) }}</p>
														</h2>
													</div>
													<div class="border-t-2 bg-gray-300">
														<h2 class="text-sm text-gray-900 font-normal pl-2">
															Pay With {{ m.name }}
														</h2>
													</div>
												</div>
										  	</label>
										</div>
										<div class="mt-5 text-right">
											<button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 mt-2 rounded" v-if="selectedPackageData.length!=0 && selectedpaymentmethod.length!=0 && idCodeIdPasswordForm.email" v-on:click="buynow(user.id)">Buy Now</button>
											<button class="bg-green-500 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed mt-2" v-else disabled>Buy Now</button>
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
						class="float-right hover:text-red-300 text-2xl transform cursor-pointer"
						>×</span
					>
					<div class="justify-center items-center">
						<div>
							<h2 class="text-1xl text-gray-900 font-bold" v-if="check == false">
								Login First To Complete Your Order
							</h2>
							<h2 class="text-1xl text-gray-900 font-bold" v-else>
								Please Complete Your Order
							</h2>
						</div>
					</div>
				</header>
				<div class="modal-body bg-gray-300 py-5 px-32 md:px-2 sm:px-2">
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
										Nshop Email
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
										Nshop Account Password
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
										class="appearance-none block w-full bg-red-300 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										:loading="form.busy"
									>
										{{ $t("login") }}
									</button>
									<router-link :to="{ name: 'register' }" class="mt-5 text-center block bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2 w-full" active-class="active">
										{{ $t('register') }}
									</router-link>
								</div>
								<div class="text-center">
									<h4 class="text-sm">
										By clicking "Confirm", you agree to
										<router-link :to="'/privacy-policy'" class="text-red-300"
											>Nshop Terms and Conditions.</router-link>
									</h4>
								</div>
							</form>
							<div v-else class="">
								<div class="w-full mb-6 md:mb-3 mt-2">
									<button
										class="appearance-none block w-full bg-orange-500 text-white border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										v-if="user!=null && user.wallet >= checkedData"
										v-on:click="orderWithWallet(user.id)"
									>Your Wallet {{ user.wallet }} BDT
										Confirm Order
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div v-if="transactionModal" class="modal sm:px-3">
			<div class="lg:w-6/12 sm:w-10/12 mx-auto bg-white">
				<header class="card p-4 border-b-2">
					<span
						v-on:click="transactionModal = false"
						class="float-right hover:text-red-300 text-2xl transform cursor-pointer"
						>×</span
					>
					<div class="justify-center items-center">
						<div>
							<h2 class="text-1xl text-gray-900 font-bold" v-if="check == false">
								Login First To Complete Your Order
							</h2>
							<h2 class="text-1xl text-gray-900 font-bold" v-else>
								Please Complete Your Order
							</h2>
						</div>
					</div>
				</header>
				<div class="modal-body bg-gray-300 py-5 px-32 md:px-2 sm:px-2">
					<div class="bg-white p-4">
						<div class="mt-8">
							<h2 class="text-1xl text-gray-900 font-bold" v-if="check == false">
								<p class="appearance-none block w-full bg-red-300 text-white border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">Login First To Complete Your Order</p>
							</h2>
							<div v-else>
								<div class="">
									<p>Package: <span>{{ selectedPackageData.name }}</span></p>
									<p>Price: <span>{{ selectedpaymentmethod.currency }} {{ abc1() }}</span></p>
									<p>Payment Method: <span>{{ selectedpaymentmethod.name }}</span></p>
									<div v-if="showElement==0">
										<p>ID CODE: <span>{{ idCodeIdPasswordForm.email }}</span></p>
										<p>NICK NAME: <span>{{ gamename }}</span></p>
									</div>
									<div v-else>
										<p>ID: <span>{{ idCodeIdPasswordForm.email }}</span></p>
										<p>PASSWORD: <span>{{ idCodeIdPasswordForm.password }}</span></p>
									</div>
								</div>
								<div v-if="selectedpaymentmethod!=[] && selectedpaymentmethod.id!=0  && selectedpaymentmethod.id!=100000">

									<p class="text-white text-center bg-red-300 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded w-56 mx-auto mt-2">How to add money?</p>
				                    <span class="my-3 mt-3" style="font-family: auto;" v-html="selectedpaymentmethod.des">
				                      	
				                    </span>

									<input
										v-model="transaction_id"
										class="appearance-none mt-2 block w-full bg-gray-200 text-gray-700 border border-gray-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										placeholder="Transaction Id"
									/>
									<input
										v-model="number"
										class="appearance-none mt-2 block w-full bg-gray-200 text-gray-700 border border-gray-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										placeholder="Sender number"
									/>
								</div>
								<button v-if="user!=null" v-on:click="orderWithTransactionId(user.id)" class="appearance-none block w-full bg-orange-500 text-white border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-2">Confirm Order</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="spay"></div>
	</div>
</template>

<script>
import Form from "vform";
import { mapGetters } from "vuex";
import axios from "axios";
import Swal from "sweetalert2";
export default {
	metaInfo() {
		return { title: this.$t("login") };
	},
	data() {
		return {
			ispandding: false,
			number:'',
			transaction_id: '',
			paymentMethods: [],
			paymentMethod: 1,
			product: [],
			similarproduct: [],
			packages: [],
			showElement: 0,
			showAcountType: 1,
			checkedData: "",
			key: "",
			trxid: "",
			selectedPackageData: [],
			selectedpaymentmethod:[],
			computedHeight: "auto",
			modal: false,
			gamename:null,
			transactionModal: false,
			form: new Form({
				email: "",
				password: ""
			}),
			remember: false,
			idCodeIdPasswordForm: new Form({
				type: "IDCODE",
				email: "",
				password: "",
			})
		};
	},
	computed: mapGetters({
		user: "auth/user",
		check: "auth/check"
	}),
	methods: {
		abc1(){
			if(this.selectedpaymentmethod.discount>0){
				var data = (parseInt(this.selectedPackageData.sale_price)*parseInt(this.selectedpaymentmethod.discount)/100)
				return this.selectedPackageData.sale_price-data;
			}else{
				return this.selectedPackageData.sale_price;
			}
		},
		abc(v){
			if(v>0){
				var data = (parseInt(this.checkedData)*parseInt(v)/100)
				return this.checkedData-data;
			}else{
				return this.checkedData
			}
		},
		onChangePayment(v){
			this.selectedpaymentmethod=v
		},
		paymentmethod(){
			if (this.checkedData == "") {
				Swal.fire({
					type: "warning",
					title: "You have to select denomination first",
					text:
						"Please choose the item you want to purchase before select payment channel",
					reverseButtons: true,
					confirmButtonText: "ok"
				});
			}else if (this.ispandding == false) {
				Swal.fire({
					type: "warning",
					title: "pending order error !!",
					text:"You have a pending order ",
					html: '<p style="color:red;">If an order is pending, it can no longer be ordered</p>',
					reverseButtons: true,
					confirmButtonText: "ok"
				});
			}else {
				transactionModal = true
			}
		},
		fetchProduct() {
			let id = this.$route.params.id;
			axios.get(`/api/product/${id}`).then(response => {
				this.product = response.data;
				this.showElement = response.data.type;
				if(response.data.type==2){
					this.idCodeIdPasswordForm.password="IDCODE"
				}
			});
		},
		makeSlug(slug) {
			var words = slug.split(" ");
			for (var i = 0; i < words.length; i++) {
				var word = words[i];
				words[i] = word.charAt(0).toLowerCase() + word.slice(1);
			}
			return words.join("-");
		},
		similarproducts() {
			let id = this.$route.params.id;
			axios.get(`/api/similarproduct/${id}`).then(response => {
				this.similarproduct = response.data;
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
		formatPrice(value) {
			let val = (value / 1).toFixed(2).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		},
		async login() {
			const { data } = await this.form.post("/api/login");
			this.$store.dispatch("auth/saveToken", {
				token: data.token,
				remember: this.remember
			});
			await this.$store.dispatch("auth/fetchUser");
		},
		buynow(){
			this.transactionModal=true
			if(this.showElement!=1){
				axios.get(`/api/gamename/${this.idCodeIdPasswordForm.email}`).then(response => {
					this.gamename=response.data.password
					
				});
			}
		},
		orderWithTransactionId(){
			
			if(this.showElement == 0){
				var password = "ID Code";
				var type = "ID Code";
				if(this.gamename!=null){
					password=this.gamename
				}
			}else{
				var password = this.idCodeIdPasswordForm.password;
				var type = this.idCodeIdPasswordForm.type;
			}



			var email = this.idCodeIdPasswordForm.email;
			if(this.selectedpaymentmethod.id==100000)
			{
				let id = this.selectedPackageData.id;
				var params = {
					type: type,
					password: password,
					email: email,
					number: this.number,
					method: this.selectedpaymentmethod.id,
					transaction_id: this.transaction_id
				};
				axios.post(`/api/product-order-transaction_id/${id}/${this.user.id}`, params).then(response => {
					console.log(response.data)
					document.getElementById("spay").innerHTML=response.data;
					// document.getElementById("frm_submit").setAttribute("target", "_blank");
					document.getElementById('frm_submit').submit()
				});
			}
			else if(this.selectedpaymentmethod.id==0 && this.checkedData > this.user.wallet ){
				Swal.fire({
					type: "error",
					title: "Your Balance Is Low Please Add Money Or Pay WIth Other Methods",
					text: "Your Balance Is Low Please Add Money Or Pay WIth Other Methods",
					reverseButtons: true,
					confirmButtonText: "ok"
				});
			}
			else if(email == '')
			{
				Swal.fire({
					type: "error",
					title: "First Select ID Code/ID Password",
					text: "please First Select ID Code/ID Password All Field",
					reverseButtons: true,
					confirmButtonText: "ok"
				}).then(result => {
					this.transactionmodal = false;
				});
			}else if(this.selectedpaymentmethod.id!=0 && (this.number == '' || this.transaction_id == ''))
			{
				Swal.fire({
					type: "error",
					title: "Transaction Require error",
					text: "TransactionId/Transaction Number Not Required",
					reverseButtons: true,
					confirmButtonText: "ok"
				}).then(result => {
					this.transactionmodal = true;
				});
			}else{
				let id = this.selectedPackageData.id;
				var params = {
					type: type,
					password: password,
					email: email,
					number: this.number,
					method: this.selectedpaymentmethod.id,
					transaction_id: this.transaction_id
				};
				axios.post(`/api/product-order-transaction_id/${id}/${this.user.id}`, params).then(response => {
					if (response.data.success == '1') {
						Swal.fire({
							type: "success",
							title: "Order Completed",
							html: "Your Order Has Been Successfully Completed",
							reverseButtons: true,
							confirmButtonText: "ok"
						}).then(result => {
							location.reload();
						});
					} else {
						Swal.fire({
							type: "error",
							title: "Order Failed",
							text: response.data.message,
							reverseButtons: true,
							confirmButtonText: "ok"
						});
					}
				});
			}
		},
        loadPaymentMethod() {
			axios.get("/api/paymentMethods").then(response => {
				this.paymentMethods = response.data;
			});

		},
		loadPanddingData() {
			if(this.user!=null){
				axios.get(`/api/check-pandding-order/${this.user.id}`).then(response => {
					this.ispandding = response.data;
				});
			}
		},	
	},
	mounted() {
		console.log("aaaaaaaaaaaaaaaaa")
		this.similarproducts();
		this.fetchProduct();
		this.fetchPackages();
		this.loadPaymentMethod();
		this.loadPanddingData();
	},
	created(){
		console.log("created")
	}
};
</script>
<style>
.bKash-success::before{
	content: "\2713";
    background-color: #4c8658;
    padding: 6px;
    height: 10px;
    width: 10px;
    margin-right: 7px;
    color: white;
    font-weight: bold;
    border-radius: 50%;
}
.bKash-success {
    padding: 9px;
    background: #348e1652;
	border: 2px solid gray;
}
.bKash-error::before { 
  content: "\26A0";
  padding: 5px;
  margin-right: 5px;
  color: red;
  font-size: 20px;
  font-weight: bold;
  border-radius: 50%;
}
.bKash-error {
    padding: 10px;
    background: #e400008c;
    color: white;
    font-family: sans-serif;
    margin-bottom: 5px;
}
.our-bkash {
    padding: 5px;
    border: 1px solid;
    margin-bottom: 18px;
    background: #b59f9f1f;
}
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
/* Modal css */
.modal {
	z-index: 18;
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

<style>
	.product__description{
		height: 29px;
		overflow: hidden;
	}
	.list-group-item {
	    display: table-cell;
	    text-decoration: none;
	    color: #666;
	    font-weight: 700;
	    font-size: 14px;
	    text-align: center;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    word-break: break-word;
	}
	.element-check-label {
	   background-color: #E01B4C;
	    color: #fff;
	    width: 20px;
	    height: 52px;
	    text-align: center;
	    position: absolute;
	    line-height: 52px;
	    top: -19px;
	    z-index: 5;
	    left: -1px;
	    transform: rotate(45deg) scaleX(-1);
	    font-size: 14px;
	    font-weight: 700;
	}
	.section {
	    padding: 15px 5px;
	    margin: 20px 0;
	    box-shadow: 0 1px 6px rgba(57,73,76,.35)!important;
	    animation: fadeIn ease 1s;
	    position: relative;
	}
	.circle {
	    font-size: 15px;
	    color: #333;
	    padding-left: 55px;
	    margin-top: -12px;
	    margin-bottom: 8px;
	}
	.circle span {
	    border-radius: 50%;
	    border: 4px solid #C81F4E;
	    color: #fcfcfc;
	    margin-right: 5px;
	    background-color: #C81F4E;
	    font-weight: 700;
	    font-size: 18px;
	    position: absolute;
	    top: -10px;
	    left: 10px;
	    line-height: 30px;
	    width: 36px;
	    height: 36px;
	    text-align: center;
	}
	.ico-question {
	    background-color: #f66b1c;
	    color: #fff;
	    border-radius: 50%;
	    width: 24px;
	    height: 24px;
	    line-height: 24px;
	    display: inline-block;
	    text-align: center;
	    cursor: pointer;
	}
</style>