<template>
	<div class="container mx-auto shadow-xl my-5 bg-white p-5" v-if="match.product">
		<span style="visibility: hidden;">{{ check() }}  {{ isjoined }}</span>
		<div class="text-center" v-if="match.product">
			<img :src="'/product/'+match.product.logo" alt="!opps" class="h-20 w-20 mx-auto object-contain">
		</div>
		<h2 class="text-center text-xl font-bold">{{ match.match_name.substring(0, 30) }}</h2>
		
		<div class="text-center">
			<div v-if="match.status=='upcoming'">
				<button class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg"  v-if="match.users &&  match.users.length>=match.max_join">
			       Registration Closed
			    </button>
			    <button color="success" v-else class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg" >
			      Registration open
			    </button>
			</div>
		    <button class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg"  v-else-if="match.status=='ongoing'">
		       Live
		    </button>
		</div>

		<p class="py-3 text-center text-capitalize mb-0">Platform: {{ match.platform }}</p>
		
		<div class="flex justify-center">
			<div class="text-center w-32 font-limit">
				<button class="align-middle bg-green-500 hover:bg-green-300 p-1 my-2">
	             
	            </button>
	            <p class="mb-0">{{ match.start_time }}</p>
			</div>
			<div class="text-center w-32 font-limit">
				<button class="align-middle bg-green-500 hover:bg-green-300 p-1 my-2">
	              
	            </button>
	            <p class="mb-0">BDT {{ match.total_prize }}</p>
			</div>
			<div class="text-center w-32 font-limit">
				<button class="align-middle bg-green-500 hover:bg-green-300 p-1 my-2">
	              
	            </button>
	            <p class="mb-0" v-if="match.users">{{ match.users.length }}/{{ match.max_join }}</p>
			</div>
		</div>
      	<PrizeModel :match='match'/>
      	<RulesModel :match='match'/>
      	<div v-if="match.status=='result'">
      		<ResultModel :match='match'/>
      	</div>
      	<div v-else>
      		<ParticipantModel :match='match'/>
      	</div>
	</div>
</template>

<script>
import PrizeModel from '~/components/PrizeModel'
import RulesModel from '~/components/RulesModel'
import ParticipantModel from '~/components/ParticipantModel'
import ResultModel from '~/components/ResultModel'
import { mapMutations, mapGetters } from 'vuex'
import axios from "axios";
export default {
	components:{
		PrizeModel,
		RulesModel,
		ParticipantModel,
		ResultModel
	},
    data () {
      return {
      	match:[],
        tab: null,
        knowledge: 0,
        isjoined:0,
        items: [
          'upcoming','ongoing','result',
        ],
      }
    },
	computed: mapGetters({
		authuser: "auth/user",
	}),
	methods: {
	  	formatDate(date) {
	  		console.log(date);
	  		var d = new Date(date);
	  		var day = d.getDate();
		  	var monthIndex = d.getMonth();
		  	var year = d.getFullYear();
		  	return day + '/' + ++monthIndex + '/' + year;
		},
		check(){
			let exists=0;
			if(this.authuser && this.match.users){
				for (var i = this.match.users.length - 1; i >= 0; i--) {
					let exists = Object.values(this.match.users[i]).includes(this.authuser.id);
					if(exists==true){
						this.isjoined=1;
						console.log(this.isjoined);
						break;
					}
				}
			}
		}
	},
	created(){
		var self = this
		let id = this.$route.params.id;
	    return axios.get(`/api/singlematch/`+id)
	      	.then((res) => {
	      		self.match=res.data
	    })
  	}
}
</script>
