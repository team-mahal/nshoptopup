<template>
<div class="row" style="min-height: 460px">
		<div class="col-4 m-auto  p-2 md:p-4">
				<card class="justify-center shadow-lg hover:shadow-xl  m-auto border-2 w-full md:w-4/12 xl:w-3/12 p-2 md:p-4 m-2 md:m-0" style="margin:auto;">
						<h4 class="text-xl font-bold text-center">Reset Password</h4>
						<form @submit.prevent="send" @keydown="form.onKeydown($event)">
							<alert-success :form="form" :message="status" style="color: red;"/>

							<!-- Email -->
							<div class="form-group row">
								<label class="col-md-3 col-form-label text-md-right font-bold">{{ $t('email') }}</label>
								<div class="col-md-7">
									<input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="shadow rounded w-full py-2 px-3 text-grey-darker mb-3"  type="email" name="email">
									<has-error :form="form" field="email" style="color: red;"/>
								</div>
							</div>

							<!-- Submit Button -->
							<div class="form-group row">
								<div class="col-md-9 ml-md-auto">
									<button :loading="form.busy"  class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mt-3">
										{{ $t('send_password_reset_link') }}
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
			email: ''
		})
	}),

	methods: {
		async send () {
			const { data } = await this.form.post('/api/password/email')

			this.status = data.status

			this.form.reset()
		}
	}
}
</script>
