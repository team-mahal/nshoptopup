<template>
<div>
	<h2 class="text-center font-bold text-3xl">Rules</h2>
	<div v-html="match.product.rules">
	 	
	</div>
</div>
</template>
<script>
  export default {
  	props:['match'],
  }
</script>