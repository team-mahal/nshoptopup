<template>
<div> {{ check() }}
		
	<div v-if="!authuser">
		<button onclick="return alert('Please Login to Join');" class="align-middle bg-green-100 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">join</button>
	</div>

	<div v-else-if="isjoined">

		<button @click="roomactives" class="align-middle bg-green-100 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">
			Room Details
		</button>

		<nuxt-link :to="'/playzone/join/'+match.id">
			<button class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">Joined</button>
		</nuxt-link>

		<div v-if="roomactive">
			<span>Room id: {{ match.room_id }}</span>
			<span>Password: {{ match.password }}</span>
		</div>

	</div>

	<div v-else-if="match.status=='ongoing'">
		<button class="align-middle bg-green-100 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">Closed</button>
	</div>

	<div v-else-if="match.users.length>=match.max_join">
		<button class="align-middle bg-green-100 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">Closed</button>
	</div>

	<div v-else-if="match.status=='result'">
		<button class="align-middle bg-green-100 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">Closed</button>
	</div>


	<nuxt-link :to="'/playzone/join/'+match.id" v-else-if="authuser && isjoined==0">
		<button class="align-middle bg-green-100 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" style="margin-top: 10px;">Join</button>
	</nuxt-link>
	
</div>
</template>

<script>
export default {
	props:['match','authuser'],
	data () {
      return {
      	isjoined:0,
      	roomactive:false
      }
    },
	methods:{
		roomactives(){
			this.roomactive=!this.roomactive
			console.log(this.roomactive);
		},
		check(){
			if(this.authuser){
				for (var i = this.match.users.length - 1; i >= 0; i--) {
					if(this.match.users[i].id==this.authuser.id){
						this.isjoined=1;
						break;
					}
				}
			}
		}
	}
};
</script>