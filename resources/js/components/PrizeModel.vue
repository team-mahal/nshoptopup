<template>
<div> 
	<h2 class="text-center font-bold text-3xl">Prize</h2>
		    <table class="border-collapse w-full">
		    	<thead> 
			        <tr>
			          	<th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300">Position</th>
			          	<th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300">Prize</th>
			          	<th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300">Pro Points</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr v-for="(item,index) in match.prizes" :key="item.name">
			          	<td class="p-3 text-gray-800 text-center border border-b">{{ item.lavel }}</td>
			          	<td class="p-3 text-gray-800 text-center border border-b">BDT {{ item.prize }}</td>
			          	<td class="p-3 text-gray-800 text-center border border-b">{{ item.propoints }}</td>
			        </tr>
			    </tbody>
		    </table>
		</div>
</template>
<script>
  export default {
  	props:['match'],
  }
</script>