<template>
<div>
	<div>
		<carousel :autoplay="true" :items="1" autoHeight="true">

		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">
		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">
		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">
		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">

		</carousel>
	</div>
	<div class="text-center">
		<h2 class="text-4xl text-red-300 font-bold">FAVOURITE GAMES</h2>
		<div class="flex flex-wrap">
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			<div class="w-48 rounded overflow-hidden shadow-lg mr-5">
			  <img class="w-full" src="https://cdn.unipin.com/images/icon_product_pages/1578906437-icon-Game-icon-4.jpg" alt="Sunset in the mountains">
			  <div class="px-6 py-4">
			    <div class="font-bold text-sm mb-2">The Coldest Sunset</div>
			    <p class="text-gray-700 text-base">
			       Garena  
			    </p>
			  </div>
			</div>
			
		</div>
	</div>
</div>
</template>

<script>
import { mapGetters } from 'vuex'
import carousel from 'vue-owl-carousel'
export default {
	layout: 'default',
	components: { carousel },

	metaInfo () {
		return { title: this.$t('home') }
	},

	data: () => ({
		title: "Kmf Gaming Mall"
	}),

	computed: mapGetters({
		authenticated: 'auth/check'
	})
}
</script>
