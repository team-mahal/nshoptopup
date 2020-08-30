<template>
<div>
	<Navbar @toggleCart="toggleCart()" ref="childNavbarComponent"/>
		<Cart v-if="cartShow" @toggleCartIcon="toggleCartIcon()" class="manual-width shadow-2xl"/>
			<div class="main-layout min-h-screen">
				<div class="mt-4">
					<child />
				</div>
			</div>
	<Footer />
</div>
</template>

<script>
import Navbar from '~/components/Navbar'
import Footer from '~/components/Footer'
import Cart from '~/components/Cart'

export default {
	name: 'MainLayout',

	components: {
		Navbar,
		Footer,
		Cart
	},
	data(){
		return {
			cartShow: false
		}
	},
	methods: {
		toggleCart(){
			// this.cartShow = true;
			this.cartShow = !this.cartShow;
		},
		toggleCartIcon(){
			this.cartShow = !this.cartShow;
			this.$refs.childNavbarComponent.toggleCartIcon();
		}
	}
}
</script>
<style>
	.manual-width{
		width: 450px;
		z-index: 99999;
		position: fixed;
		right: 0;
	}
	@media only screen and (max-width: 600px) {
		.manual-width{
			width: 100%;
		}
	}
</style>