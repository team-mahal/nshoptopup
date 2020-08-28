<template>
<div class="justify-center shadow-lg hover:shadow-xl  mx-auto border-2 w-full md:w-6/12 xl:w-6/12 p-2 md:p-4 m-2 md:m-0" id="m-auto">

	<form @submit.prevent="update" @keydown="form.onKeydown($event)">
		<h4 class="text-center font-bold text-xl">Edit Your Profile</h4>
		<alert-success :form="form" :message="$t('info_updated')" class="gb-green-900 text-white text-center p-3"/>

		<!-- Name -->
		<div class="form-group row">
			<label class="font-bold">{{ $t('name') }}</label>
			<div class="col-md-7">
				<input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="text" name="name">
				<has-error :form="form" field="name" />
			</div>
		</div>

		<!-- Email -->
		<div class="form-group row">
			<label class="font-bold">{{ $t('email') }}</label>
			<div class="col-md-7">
				<input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="email" name="email" placeholder="Enter E-mail Address">
				<has-error :form="form" field="email" />
			</div>
		</div>
		<!-- Phone -->
		<div class="form-group row">
			<label class="font-bold">Phone Number</label>
			<div class="col-md-7">
				<input type="number" v-model="form.phone" :class="{ 'is-invalid': form.errors.has('phone') }" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" name="phone" placeholder="Enter Phone Number">
				<has-error :form="form" field="phone" />
			</div>
		</div>
		<!-- Profile Picture -->
		<div class="form-group row">
			<label class="font-bold">Profile Picture</label>
			<div v-if="!form.file">
				<input id="file" type="file" @change="onFileChange" class="form-control pt-2 pb-2 border-2 border-gray-200 w-full pl-4">
			</div>
			<div v-else-if="fileShow" class="flex">
				<img :src="fileShow" height="80px;" width="150px" class="mb-4 border-2 border-gray-500 border-full"/>
				<button @click="removeImage" class="text-red-300">&#10006;</button>
			</div>
			<!-- {{ form }} -->
			<div v-else class="flex">
				<img :src="'/user/'+ form.file" height="80px;" width="150px" class="mb-4 border-2 border-gray-500 border-full"/>
				<button @click="removeImage" class="text-red-300">&#10006;</button>
			</div>
			<has-error :form="form" field="file"></has-error>
		</div>
		<!-- Address -->
		<div class="form-group row">
			<label class="font-bold">Address</label>
			<div class="col-md-7">
				<textarea :class="{ 'is-invalid': form.errors.has('email') }" class="border-2 border-gray-200 w-full" v-model="form.address"  name="address" id="" cols="60" rows="5"></textarea>
				<has-error :form="form" field="email" />
			</div>
		</div>
		<!-- Submit Button -->
		<div class="form-group row">
			<div class="col-md-9 ml-md-auto">
				<button :loading="form.busy" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" type="success">
					{{ $t('update') }}
				</button>
			</div>
		</div>
	</form>
</div>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'
import Swal from "sweetalert2";
export default {
	scrollToTop: false,

	metaInfo () {
		return { title: this.$t('settings') }
	},

	data: () => ({
		fileShow: '',
		form: new Form({
			name: '',
			email: '',
			file: '',
			address: '',
			phone: '',
		})
	}),

	computed: mapGetters({
		user: 'auth/user'
	}),

	created () {
		// Fill the form with user data.
		this.form.keys().forEach(key => {
			this.form[key] = this.user[key]
		})
	},

	methods: {
		async update () {
			const { data } = await this.form.patch('/api/settings/profile')
			if(data){
				Swal.fire({
					type: "success",
					title: "Profile update successfully !!",
					reverseButtons: true,
					confirmButtonText: "ok"
				});
			}
			this.$store.dispatch('auth/updateUser', { user: data })
		},
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
		},
        createImage(file) {     
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
				vm.form.file = e.target.result;
				vm.fileShow = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function (e) {
			this.form.file = '';
			this.fileShow ='';
        },
	}
}
</script>
<style>
	#m-auto{
		margin: auto !important;
	}
</style>