<template>
<div class="container mx-auto">
	<div class="text-center" style="width: 100%">
      	<ul class="flex justify-center p-3">
      		<li class="cursor-pointer p-2 capitalize w-1/3" :class="active==item ? 'text-red-500 border-2 border-green-100 rounded-full' : ''" v-for="item in items" @click="fetchdata(item)" :key="item">
        		{{ item }}
      		</li>
      	</ul>
	    <div
	        v-for="item in items"
	        :key="item"
	    >
	        <div class="root flex">
		         <div
		         	style="border-radius: 15px;"
				    v-for="i in match"
				   	v-if="i.status==item"
				  > 
				    <div class="shadow-md hover:shadow-xl rounded-lg overflow-hidden m-3 border-2 border-red-500 border-r-5">
				    	<div class="p-5">
				    		<router-link :to="'/playzoon/singlegame/'+i.id">
						    	<div class="flex">
						    		<div>
						    			<img :src="'/product/'+i.product.logo" alt="!opps" style="object-fit: contain;width: 75px;height: 75px;">
						    		</div>
						    		<div class="content">
						    			<h2 class="text-left">{{ i.match_name.substring(0, 16) }}</h2>
					    				<span class="text-sm">Time : {{ formatDate(i.start_at) }} at {{ i.start_time }}</span>
						    		</div>
						    	</div>
					    		<div class="flex single-box">
									<div class="w-1/3">
				    					<h5 style="font-size: 10px">TOTAL PRIZE</h5>
				    					<span>৳ {{ i.total_prize }}</span>
				    				</div>
									<div class="w-1/3">
				    					<h5 style="font-size: 10px">PER KILL</h5>
				    					<span>৳ {{ i.perkill }}</span>
				    				</div>
					    			<div class="w-1/3">
				    					<h5 style="font-size: 10px">ENTRY FEE</h5>
				    					<span>৳ {{ i.entry_fee }}</span>
				    				</div>
					    		</div>
					    		<div class="flex single-box">
									<div class="w-1/3">
				    					<h5 style="font-size: 10px">TYPE</h5>
				    					<span style="text-transform: capitalize">{{ i.type }}</span>
				    				</div>
									<div class="w-1/3">
				    					<h5 style="font-size: 10px">PLATFORM</h5>
				    					<span class="text-capitalize">{{ i.platform }}</span>
				    				</div>
					    			<div class="w-1/3">
				    					<h5 style="font-size: 10px">MAP</h5>
				    					<span>{{ i.map_id }}</span>
				    				</div>
					    		</div>
						    </router-link>
							<div>
		    					<div style="width: 100%;margin-top: 12px">
		    						<Prograsvar :abcd="(i.users.length/i.max_join)*100"/>
									<div class="flex justify-between">
										<div class="text-green-500 font-bold text-sm" v-if="i.max_join-i.users.length>0">
											Only {{ i.max_join-i.users.length }} spots left
										</div>
										<div v-else class="text-green-500 font-bold text-sm">
											Match is full!
										</div>
										<div class="w-50 text-right">
											{{ i.users.length }}/{{ i.max_join }}
										</div>
									</div>
		    					</div>
		    				</div>
		    				<div style="display: flex;">
			    				<div style="width: 100%">
		    						<div>
		    							<Joinbutton :match="i" :authuser='authuser'/>
		    						</div>
		    					</div>
		    				</div>
				    	</div>
				    </div>
				 </div>
	        </div>
	      </div>
	 </div>
	 <p style="visibility: hidden">{{ users() }}</p>
</div>
</template>

<script>
	import { mapMutations, mapGetters } from 'vuex'
	import Joinbutton from '~/components/Joinbutton'
	import Prograsvar from '~/components/Prograsvar'
	import axios from "axios";
	export default {
		props:['matches'],
		components:{
			Joinbutton,
			Prograsvar
		},
	    data () {
	      	return {
		      	match:[],
		        tab: null,
		        cal:0,
		        knowledge: 0,
		        loding:false,
		        items: [
		          'upcoming','ongoing','result',
		        ],
		        active:'upcoming',
		        product_id:0
	      	}
	    },
		computed: {
			...mapGetters({
			    authuser: "auth/user",
			})
		},
		methods: {
			async users(){
				if(this.authuser && this.cal==0){
					this.cal=1;
					// let { data } = await axios.get(`/api/user/`+this.authuser.id);
					// this.$store.commit('setUser', data)
					await this.$store.dispatch('auth/fetchUser')
				}
			},
			fetchdata(item){
				this.active=item
				this.loding=true;
				console.log(item);
				var self = this;
				axios.get(`/api/matchs/`+item+"/"+this.product_id)
			      .then((res) => {
			      	self.loding=false;
			      	self.match=res.data;
			    })
			},
		  	formatDate(date) {
		  		var d = new Date(date);
		  		var day = d.getDate();
			  	var monthIndex = d.getMonth();
			  	var year = d.getFullYear();
			  	return day + '/' + ++monthIndex + '/' + year;
			},
			check(){
				let exists=0;
				for (var i = this.i.users.length - 1; i >= 0; i--) {
					let exists = Object.values(this.i.users[i]).includes(this.authuser.id);
					if(exists==true){
						this.isjoined=1;
						console.log(this.isjoined);
						break;
					}
				}
			}
		},
		async created () {
			let id = this.$route.params.id;
			this.product_id=id;
		    let res = await axios.get(`/api/matchs/upcoming/`+id)
		    this.match=res.data
	  	}
	};
</script>

<style>
	.bg-color{
		background: #C91F4E;
		margin:5px;
	}
	@media only screen and (max-width: 320px) {
		.content{
			font-size: 20px;
		}
		.content h2{
			font-size: 17px;
		}
		h5{
			font-size: 11px;
		}
	}
	.v-slide-group__prev--disabled{
		display: none!important;
	}
	.v-tab{
		margin-left: 0px!important;
	}
	.bg-light{
		background: #F5F5F5!important;
	}
	.single-box{
		justify-content: center;
		text-align: center;
	}
	.single-box div{
		width: 33.33%;
	}
	.single-box div h5{
		color: black;
		padding: 5px 0px;
	}
	.single-box div span{
		color: #D0254B;
		
	}
	a{
		text-decoration: none;
	}
	span{
		font-size: 15px;
	}
	.v-list-item{
		padding: 0px!important;
	}
	.content{
		margin-left: 10px;
		color: black;
		font-weight: 700;
	}
	.v-slide-group__content{
		justify-content: center!important;
	}
	.root{
		display: flex;
		flex-wrap: wrap;
		justify-content: center!important;
	}
	</style>
	<style scoped>
	.card_2nd_right{
		    padding: 0px 10px;
	    font-size: 15px;
	}
	.playzone{
	    display: flex;
	    flex-wrap: wrap;
	    justify-content: center;
	    color: #000000;
	}
	.playzone img{
	    object-fit:cover;
	}
	.single-playzone{
		display: flex;
	}
	.playzone > div {
		padding: 10px;
	    min-width: 320px;
	    max-width: 320px;
	    margin: 10px;
	    background: #F1F1F1;
	    -webkit-box-shadow: 3px 3px 5px 6px #ccc;
	    -moz-box-shadow: 3px 3px 5px 6px #ccc;
	    box-shadow: -2px 2px 8px 6px #ccc;
	}
	ul p{
		margin-bottom: 0px!important;
	}
	img{
		width: 100%;
	}
</style>
