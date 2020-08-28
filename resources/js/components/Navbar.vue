<template>
<nav class="p-3 shadow-md">
	<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
	  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
	    <div class="flex flex-row items-center justify-between">

	      	<router-link :to="'/'" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
				<img src="/logo.png" class="w-48">
			</router-link>

	      	<button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
		        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
		          	<path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
		          	<path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
		        </svg>
	      	</button>

	    </div>
		<p v-if="cartBtnShow" class="p-1" @click="toggleCart()"> <span class="cart-number text-white bg-red-300 rounded">{{ cartCount }}</span> <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 h-8 w-12 mr-3 text-white"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg></p>
	    <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
		    <router-link :to="'/shop'" class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Shop</router-link>
		    <router-link :to="'/blogs'" class="px-4 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Blog</router-link>
		    <router-link :to="'/about-us'" class="px-4 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">About Us</router-link>
		    <router-link :to="'/contact'" class="px-4 py-2 mt-2  mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</router-link>

		    <div v-if="user" class="relative" x-data="{ open: false }">
		    	<button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
		          <div class="profile-image">
					<img v-if="user.file" :src="'/user/'+user.file" alt="opps" class="rounded-full h-8 w-8 m-auto flex items-center justify-center border-2 border-gray-500">
					<div v-else class="rounded-full h-8 w-8 m-auto flex items-center justify-center bg-red-300 text-center text-white text-sm font-bold">
						{{ nameFirstChar() }}
					</div>
				  </div>
				  <span>{{ user.name }}</span>
		          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		        </button>
		        <div v-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-50">
		          	<div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
							<router-link :to="{ name: 'my-account' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
								My Account
							</router-link>
						  <router-link :to="{ name: 'settings.profile' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
							{{ $t('settings') }}
						</router-link>
						<router-link :to="{ name: 'my-orders' }" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
							My Orders
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
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
	components: {
		LocaleDropdown
	},

	data: () => ({
		appName: window.config.appName,
		open:false,
		cartBtnShow: true,
	}),

	computed: mapGetters({
		user: 'auth/user',
		cart: 'cart/cart',
		cartCount: 'cart/cartCount',
	}),

	methods: {
		async logout () {
			// Log out the user.
			await this.$store.dispatch('auth/logout')

			// Redirect to login.
			this.$router.push({ name: 'login' })
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
	}
}
</script>

<style scoped>
.profile-photo {
	width: 2rem;
	height: 2rem;
	margin: -.375rem 0;
}
span.cart-number {
    position: absolute;
    transform: translate(18px, -7px);
	padding: 0px 5px;
}
p.p-1 {
    position: fixed;
    right: 0;
    top: 50%;
    z-index: 9999999999999999;
    background: #782472;
    padding: 14px 12px 7px 15px;
}
#prodile{
    border: 2px solid #4b14ce7a;
    box-shadow: 0px 2px 9px 2px #585353;
    background-color: rgb(25 15 107 / 46%);
}
.profile-image{
	position: absolute;
    transform: translate(-35px, -5px);
}
@media screen and (max-width: 600px) {
	p.p-1 {
		padding: 10px 4px 2px 12px !important;
	}
	svg.svg-inline--fa.fa-shopping-cart.fa-w-18.h-8.w-12.mr-3.text-white{
		width: 28px !important;
	}
	span.cart-number[data-v-6dde423b] {
    transform: translate(10px, -7px);
}
}
</style>
