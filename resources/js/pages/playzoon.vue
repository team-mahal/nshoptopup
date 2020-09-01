<template>
<div>
	<section class="container mx-auto" id="favourite-game">
		<div class="text-center">
			<h2 class="text-4xl text-red-300 font-bold">Play Zone</h2>
			<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 md:gap-4 p-2 lg:p-0">
				<div
					v-for="product in products"
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
</div>
</template>
 
<script>
import axios from "axios";
export default {
	data: () => ({
		title: "Nshop Gaming Mall",
		products: [],
		blogs: [],
		sliders: [],
		loaded:false
	}),
  	metaInfo () {
    	return { title: this.$t('home') }
  	},
  	methods: {
  		loadProducts() {
			axios.get("/api/productplayzoon").then(response => {
				this.products = response.data;
			});
		},
		makeSlug(slug) {
			var words = slug.split(" ");
			for (var i = 0; i < words.length; i++) {
				var word = words[i];
				words[i] = word.charAt(0).toLowerCase() + word.slice(1);
			}
			return words.join("-");
		}
  	},
  	created() {
		this.loadProducts();
	}
}
</script>
