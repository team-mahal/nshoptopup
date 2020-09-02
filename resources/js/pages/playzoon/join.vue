<template>
<div class="container mx-auto my-5 shadow-xl bg-white p-3">
	<div class="text-center" v-if="i.users">
		<div>
			<div class="text-center">{{ check() }}
				<table class="border-collapse w-full">
					<tbody>
						<tr class="p-3 text-gray-800 text-center border border-b">
							<td class="text-xl font-bold bg-green-500 text-white py-3">{{ i.match_name }}</td>
						</tr>
						<tr>
							<td class="p-3 text-gray-800 text-center border border-b font-bold">Available Balance: ৳{{ authuser.wallet }}</td>
						</tr>
						<tr><td class="p-3 text-gray-800 text-center border border-b font-bold">Match Entry Fee Per Person: ৳{{ i.entry_fee }}</td></tr>
						<tr v-if="row=='solo'" style="visibility: hidden;"><td class="p-3 text-gray-800 text-center border border-b font-bold">Team Entry Fee : ৳{{ totalfee=i.entry_fee }}</td></tr>
						<tr v-if="row=='duo'"><td class="p-3 text-gray-800 text-center border border-b font-bold">Team Entry Fee : ৳{{ totalfee=i.entry_fee*2 }}</td></tr>
						<tr v-if="row=='squad'"><td class="p-3 text-gray-800 text-center border border-b font-bold">Team Entry Fee : ৳{{ totalfee=i.entry_fee*4 }}</td></tr>
						<tr><td class="p-3 text-gray-800 text-center border border-b"><button class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg my-3">{{ i.max_join-i.users.length }} Spots Left</button></td></tr>
					</tbody>
				</table>
			</div>
		</div>
		 	<div>
				<table class="border-collapse w-full">
					<tbody>
						<tr>
							<td class="text-xl font-bold bg-green-500 text-white capitalize py-3">{{ i.type }} Registration</td>
						</tr>
						<tr>
							<td class="p-3 text-gray-800 text-center border border-b font-extrabold">
								<span v-if="i.type=='duo'">This is Duo match.You can join as Solo or Duo.</span>
								<span v-if="i.type=='solo'">This is Solo match.You can join as Solo.</span>
								<span v-if="i.type=='squad'">This is Squad match.You can join as Solo,Duo or Squad</span>
							</td>
						</tr>
						<tr style="text-align: center;">
							 <td class="p-3 text-gray-800 text-center border border-b font-extrabold">
								<div v-if="i.type=='duo'" class="d-flex" style="justify-content: center">
									<label for="Solo" class="py-3">
										<input type="radio" v-model="row" name="match" id="Solo" value="solo"/>
										<span class="mb-5">Solo</span>
									</label>
									<label for="Duo">
										<input type="radio" v-model="row" name="match" id="Duo" value="duo"/>
										<span class="mb-5">Duo</span>
									</label>
								</div>
								<div v-if="i.type=='solo'" style="text-align: center">
									<label for="solo">
										<input type="radio" v-model="row" name="match" id="solo" value="solo"/>
										<span class="mb-5">Solo</span>
									</label>
								</div>
								<div v-if="i.type=='squad'" class="d-flex" style="justify-content: center">
									<label for="solo">
										<input type="radio" class="p-1 m-3" v-model="row" name="match" id="solo" value="solo"/>
										<span class="mb-5">Solo</span>
									</label>
									<label for="duo">
										<input type="radio" class="p-1 m-3" v-model="row" name="match" id="duo" value="duo"/>
										<span class="mb-5">Duo</span>
									</label>
									<label for="squad">
										<input type="radio" class="p-1 m-3" v-model="row" name="match" id="squad" value="squad"/>
										<span class="mb-5">Squad</span>
									</label>
								</div>
							 </td>
						</tr>
						<tr class="text-center">
							<td class="p-3 text-gray-800 text-center border border-b font-extrabold">
								Enter Your Exact {{ i.product.name }} Name
							</td>
						</tr>
						<tr style="text-align: center;">
							<td class="p-3 text-gray-800 text-center border border-b font-extrabold">
								<div v-if="row=='solo'" style="padding: 10px">
									<input
										v-model="player1"
										class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
										:placeholder="'Player 1 '+i.product.name+' Name'"
										required
									/>
                        			<div class="error" v-if="!$v.player1.required">Name is required</div>
								</div>
								<div v-if="row=='duo'" style="padding: 10px">
										<input
											v-model="player1"
											class="px-3 py-3 my-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
											 :placeholder="'Player 1 '+i.product.name+' Name'"
											required
										/>
                        				<div class="error" v-if="!$v.player1.required">Name is required</div>
										<input
											v-model="player2"
											class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
											:placeholder="'Player 2 '+i.product.name+' Name'"
											required
										/>
										<div class="error" v-if="!$v.player2.required">Name is required</div>
								</div>
								<div v-if="row=='squad'" style="padding: 10px">
										<input
											v-model="player1"
											class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
											 :placeholder="'Player 1 '+i.product.name+' Name'"
											required
										/>
										<div class="error" v-if="!$v.player1.required">Name is required</div>
										<input
											v-model="player2"
											class="px-3 py-3 my-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
											 :placeholder="'Player 2 '+i.product.name+' Name'"
											required
										/>
										<div class="error" v-if="!$v.player2.required">Name is required</div>
										<input
											v-model="player3"
											class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
											 :placeholder="'Player 3 '+i.product.name+' Name'"
											required
										/>
										<div class="error" v-if="!$v.player3.required">Name is required</div>
										<input
											v-model="player4"
											class="px-3 py-3 my-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
											:placeholder="'Player 4 '+i.product.name+' Name'"
											required
										/>
										<div class="error" v-if="!$v.player4.required">Name is required</div>
								</div>
								<div>
									<button v-if="(authuser.wallet+authuser.earn_wallet)>=totalfee && isjoined==0"  @click="join" :class="loading ? 'opacity-50 cursor-not-allowed': ''" class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg">Join</button>
									<button v-else-if="isjoined==1" class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg opacity-50">Joined</button>
									<router-link to='/add-wallet' v-else>
										<button class="align-middle bg-green-500 hover:bg-green-300 text-center px-4 py-2 text-white text-sm font-semibold rounded-lg inline-block shadow-lg">Add Money</button>
									</router-link>
								</div>
								<p class="text-red-500" v-if="submitStatus === 'OK'">{{  error }}</p>
								<p class="text-red-500" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
								<p class="text-red-500" v-if="submitStatus === 'PENDING'">Sending...</p>
							</td>
						</tr>
					</tbody>
				</table>
				<br>
			</div>
	</div>
</div>
</template>

<script>
import { mapMutations, mapGetters } from 'vuex'
import axios from "axios";
import { required } from 'vuelidate/lib/validators'
export default {
	props:['matches'],
	data () {
		return {
			error:null,	
			alert: false,
  			valid: true,
  			loading:false,
			dialog: false,
			totalfee:0,
			i:[],
			row:'solo',
			tab: null,
			isjoined:0,
			player1:'',
			player2:'',
			player3:'',
			player4:'',
			knowledge: 0,
			items: [
				'upcoming','ongoing','result',
			],
			submitStatus:null
		}
	},
	computed: mapGetters({
		authuser: "auth/user",
	}),
	validations: {
	    player1: {
	      required
	    },
	    player2: {
	      required
	    },
	    player3: {
	      required
	    },
	    player4: {
	      required
	    },
	},
	methods: {
		clode(){
			this.alert=false
		},
		join(){
			if(this.row=='solo'){
				this.player2=1;
				this.player3=1;
				this.player4=1;
			}
			if(this.row=='duo'){
				this.player3=1;
				this.player4=1;
			}
			var self = this;
			this.$v.$touch()
		  	this.loading=true;
			if (this.$v.$invalid) {
	    		this.submitStatus = 'ERROR'
		  		this.loading=false;
	  		}else {
	  			this.submitStatus = 'PENDING'
				self.isjoined=1;
				axios.post(`/api/join/${this.i.id}`,{
					user_id: this.authuser.id,
					match_id: this.i.id,
					player1: this.player1,
					player2: this.player2,
					player3: this.player3,
					player4: this.player4,
					type: this.row,
					fee:this.totalfee
				})
				.then((res) => {
					self.submitStatus = 'OK'
					self.alert=true
					console.log(res);
				})
			}
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
				if(this.i.users[i].user_id==this.authuser.id){
					this.isjoined=1;
					break;
				}
			}
		}
	},
	created(){
		var self = this
		let id = this.$route.params.id;
	    return axios.get(`/api/singlematch/`+id)
	      	.then((res) => {
	      		self.i=res.data
	    })
  	}}
</script>

<style>
	.v-input--radio-group__input{
		text-transform: capitalize;
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
	ul{
		list-style: none;
		padding: 0px!important;
		margin: 0px;
		
	}
	ul li{
		padding: 0px!important;
		margin: 0px!important;

	}
	ul p{
		margin-bottom: 0px!important;
	}
	img{
		width: 100%;
	}
</style>
