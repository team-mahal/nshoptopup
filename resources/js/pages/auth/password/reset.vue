<template>
<div class="row" style="min-height: 460px">
	<div class="col-4 m-auto  p-2 md:p-4">
		<card class="justify-center shadow-lg hover:shadow-xl  m-auto border-2 w-full md:w-4/12 xl:w-3/12 p-2 md:p-4 m-2 md:m-0" style="margin:auto;">
			<form @submit.prevent="reset" @keydown="form.onKeydown($event)">
				<alert-success class="text-red-600" :form="form" :message="status" />

				<!-- Email -->
				<div class="form-group row">
					<label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
					<div class="col-md-7">
						<input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }"  class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="email" name="email" readonly>
						<has-error class="text-red-600" :form="form" field="email" />
					</div>
				</div>

				<!-- Password -->
				<div class="form-group row">
					<label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
					<div class="col-md-7">
						<input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }"  class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" name="password">
						<has-error class="text-red-600" :form="form" field="password" />
					</div>
				</div>

				<!-- Password Confirmation -->
				<div class="form-group row">
					<label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
					<div class="col-md-7">
						<input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }"  class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" name="password_confirmation">
						<has-error class="text-red-600" :form="form" field="password_confirmation" />
					</div>
				</div>

				<!-- Submit Button -->
				<div class="form-group row">
					<div class="col-md-9 ml-md-auto">
						<button :loading="form.busy" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mt-3">
							{{ $t('reset_password') }}
						</button>
					</div>
				</div>
			</form>
		</card>
	</div>
</div>
</template>

<script>
import Form from 'vform'

export default {
	middleware: 'guest',

	metaInfo () {
		return { title: this.$t('reset_password') }
	},

	data: () => ({
		status: '',
		form: new Form({
			token: '',
			email: '',
			password: '',
			password_confirmation: ''
		})
	}),

	created () {
		this.form.email = this.$route.query.email
		this.form.token = this.$route.params.token
	},

	methods: {
		async reset () {
			const { data } = await this.form.post('/api/password/reset')

			this.status = data.status

			this.form.reset()
		}
	}
}
</script>
