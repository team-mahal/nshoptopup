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
				<input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="email" name="email">
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

export default {
	scrollToTop: false,

	metaInfo () {
		return { title: this.$t('settings') }
	},

	data: () => ({
		form: new Form({
			name: '',
			email: ''
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

			this.$store.dispatch('auth/updateUser', { user: data })
		}
	}
}
</script>
<style>
	#m-auto{
		margin: auto !important;
	}
</style>