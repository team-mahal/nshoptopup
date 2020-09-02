<template>
<div>
		<h4 class="text-center font-bold text-3xl">Registered Participants</h4>
		<hr>
		<table class="border-collapse w-full">
		      <thead>
		        <tr>
		          <th class="p-3 text-gray-800 text-center border border-b">S.NO</th>
		          <th class="p-3 text-gray-800 text-center border border-b">Game Name</th>
		        </tr>
		      </thead>
		      <tbody>
		        <tr v-for="(item,index) in match.users" :key="item.name">
		          <td class="p-3 text-gray-800 text-center border border-b">{{ index+1 }}</td>
		          <td class="p-3 text-gray-800 text-center border border-b">{{ item.pivot.gamename }}</td>
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