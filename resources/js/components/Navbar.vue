<template>
<div>
	<div v-if="notice" class="bg-green-100">
		<center>
			<div>
				<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" id="MARQUEE1" class="scrolling"><b class="text-info">NOTICE : <span class="text-green-700"> {{ notice.notice }}</span></b></marquee>
			</div>
		</center>
	</div>
	<nav class="p-3 shadow-md">

		

		<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
		  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
		    <div class="flex flex-row items-center justify-between">

		      	<router-link :to="'/'" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
					<img src="/logo.png" class="-w-40 h-16">
				</router-link>
		      	<button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open1 = !open1">
			        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
			          	<path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
			        </svg>
		      	</button> 
		    </div>
		
		    <nav :class="{'flex': open1, 'hidden': !open1}" class="flex-col flex-grow pb-4 md:pb-0 md:flex md:justify-end md:flex-row" @click="open1 = !open1">

		    	 <router-link :to="'/'" class="px-2 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Home</router-link>

		    	 <router-link :to="'/playzoon'" class="px-2 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Play Zoon</router-link>

			    <router-link :to="'/shop'" class="px-2 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Shop</router-link>

			    <router-link :to="'/blogs'" class="px-2 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Blog</router-link>

			    <router-link :to="'/about-us'" class="px-2 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">About Us</router-link>

			    <router-link :to="'/contact'" class="px-2 py-2 mt-2  mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</router-link>

			    <a @click="toggleCart()" class="px-2 py-2 mt-2 relative mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"> 
					<span style="font-size: 15px;top: -10px;
    left: 9px;" class="p-1 rounded text-blue-600 text-xs ml-2 absolute">{{ cartCount }}</span> <svg style="height: 28px;width: 28px;color:red;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg>
				</a>

			    <div v-if="user" class="relative" x-data="{ open: false }" @click="open1 = !open1">
			    	<button @click="open = !open" style="display: flex;" class="flex flex-row items-center w-full px-2 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
			          <div class="profile-image">
						<img v-if="user.file" :src="'/user/'+user.file" alt="opps" class="rounded-full h-8 w-8 m-auto flex items-center justify-center border-2 border-gray-500">
						<div v-else class="rounded-full h-8 w-8 m-auto pt-1 bg-red-300 text-center text-white text-sm font-bold">
							{{ nameFirstChar() }}
						</div>
					  </div>
					 <div> <span>{{ user.name }}</span>
			          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></div>
			        </button>
			        <div v-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-50">
			          	<div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800" @click="open = !open">
							<router-link :to="{ name: 'my-account' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
									My Account
							</router-link>
							<router-link :to="{ name: 'add-wallet' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								Add Wallet
							</router-link>
							<router-link :to="{ name: 'withdraw-wallet' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								Withdraw Wallet
							</router-link>
							<router-link :to="{ name: 'settings.profile' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								{{ $t('settings') }}
							</router-link>
							<router-link :to="{ name: 'my-orders' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								My Orders
							</router-link>
							<router-link :to="{ name: 'my-invoice' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								My Invoice
							</router-link>
							<router-link :to="{ name: 'my-wallet' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								My Wallet
							</router-link>
							<router-link :to="{ name: 'settings.password' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								Change Password
							</router-link>
							<a href="#" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" @click.prevent="logout">
								{{ $t('logout') }}
							</a>
			          	</div>
			        </div>
			    </div>
			    <div v-else class="flex justify-end items-center">
					<div class="w-20">
						<router-link :to="{ name: 'login' }" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" active-class="active">
							{{ $t('login') }}
						</router-link>
					</div>
					<div class="w-20">
						<router-link :to="{ name: 'register' }" class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" active-class="active">
							{{ $t('register') }}
						</router-link>
					</div>
				</div>

		    </nav>
		  </div>
		</div>
	</nav>
</div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'
import axios from "axios";
export default {
	components: {
		LocaleDropdown
	},

	data: () => ({
		appName: window.config.appName,
		open:false,
		open1:false,
		cartBtnShow: true,
		notice: [],
	}),

	computed: mapGetters({
		user: 'auth/user',
		cart: 'cart/cart',
		cartCount: 'cart/cartCount',
	}),

	mounted () {
    	document.addEventListener('click', this.close)
    	document.addEventListener('click', this.close1)
  	},
  	beforeDestroy () {
    	document.removeEventListener('click',this.close)
    	document.removeEventListener('click',this.close1)
  	},

	methods: {
		close (e) {
      		if (!this.$el.contains(e.target)) {
      		  	this.open = false
      		}
    	},
    	close1 (e) {
      		if (!this.$el.contains(e.target)) {
      		  	this.open1 = false
      		}
    	},
		async logout () {
			// Log out the user.
			await this.$store.dispatch('auth/logout')

			// Redirect to login.
			this.$router.push({ name: 'login' })
		},
		totalPrice() {
			let total = 0;

			for (let item of this.cart) {
				total += item.quantity * item.sale_price;
			}

			return total;
		},
		toggleCart() {
			this.$emit('toggleCart');
			this.cartBtnShow = !this.cartBtnShow;
		},
		toggleCartIcon(){
			this.cartBtnShow = !this.cartBtnShow;
		},
        nameFirstChar()
        {
           return this.user.name.split(/\s/).reduce((response,word)=> response+=word.slice(0,1),'');
        }
	},
	created(){
		axios.get("/api/notice").then(response => {
			this.notice = response.data;
		});
	}
}
</script>

<style scoped>
.profile-photo {
	width: 2rem;
	height: 2rem;
	margin: -.375rem 0;
}
</style>
