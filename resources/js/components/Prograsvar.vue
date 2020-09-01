<template>
	<div>
	    <progress-bar
	      :options="options"
	      :value="abcd"
	   />
	</div>
</template>

<script>
	export default {
		props:['abcd'],
		data () {
			return {
				options: {
				  text: {
				    color: '#FFFFFF',
				    shadowEnable: true,
				    shadowColor: '#000000',
				    fontSize: 14,
				    fontFamily: 'Helvetica',
				    dynamicPosition: false,
				    hideText: true
				  },
				  progress: {
				    color: '#C31F53',
				    backgroundColor: '#E6B5C5'
				  },
				  layout: {
				    height: 5,
				    width: 260,
				    verticalTextAlign: 61,
				    horizontalTextAlign: 43,
				    zeroOffset: 0,
				    strokeWidth: 30,
				    progressPadding: 0,
				    type: 'line'
				  }
				}
			}
		},
	}
</script>

<style>
	.v-progress-linear__determinate{
		background: #C31F53!important;
	}
	.v-application .indigo.darken-2{
		background: #C31F53!important;
	}
</style>