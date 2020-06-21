<template>
<div>
	<p>ppppppp</p>
	<div>
		<carousel :autoplay="true" items="1" autoHeight="true">

		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">
		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">
		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">
		    <img src="https://cdn.unipin.com/images/banners/1592558706-MA-200609-1_UniPin_GoG_Available_700x280.jpg">

		</carousel>
	</div>
	<div class="text-center">
		<div class="title mb-4">
			{{ title }}
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

<style scoped>
.top-right {
	position: absolute;
	right: 10px;
	top: 18px;
}

.title {
	font-size: 85px;
}
</style>
