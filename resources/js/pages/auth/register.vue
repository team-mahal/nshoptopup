<template>
<div class="max-w-md mx-auto">
	<div class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 flex flex-col mt-16">
		<h2 class="text-center font-bold text-3xl">Register</h2>
		<form @submit.prevent="register" @keydown="form.onKeydown($event)">
			<!-- Name -->
			<div class="form-group font-bold">
				<label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
				<div class="col-md-7">
					<input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Name" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="text" name="name">
					<has-error :form="form" field="name" />
				</div>
			</div>

			<!-- Email -->
			<div class="form-group font-bold">
				<label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
				<div class="col-md-7">
					<input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="E-mail" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="email" name="email">
					<has-error :form="form" field="email" />
				</div>
			</div>

			<!-- Password -->
			<div class="form-group font-bold">
				<label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
				<div class="col-md-7">
					<input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" name="password">
					<has-error :form="form" field="password" />
				</div>
			</div>

			<!-- Password Confirmation -->
			<div class="form-group font-bold">
				<label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
				<div class="col-md-7">
					<input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" placeholder="Password Confirmation" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" name="password_confirmation">
					<has-error :form="form" field="password_confirmation" />
				</div>
			</div>

			<div class="form-group font-bold">
				<div class="col-md-7 offset-md-3 d-flex">
					<!-- Submit Button -->
					<button :loading="form.busy" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
						{{ $t('register') }}
					</button>

					<!-- GitHub Register Button -->
					<login-with-github />
				</div>
			</div>
		</form>
	</div>
</div>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
	middleware: 'guest',

	components: {
		LoginWithGithub
	},

	metaInfo () {
		return { title: this.$t('register') }
	},

	data: () => ({
		form: new Form({
			name: '',
			email: '',
			password: '',
			password_confirmation: ''
		}),
		mustVerifyEmail: false
	}),

	methods: {
		async register () {
			// Register the user.
			const { data } = await this.form.post('/api/register')

			// Must verify email fist.
			if (data.status) {
				this.mustVerifyEmail = true
			} else {
				// Log in the user.
				const { data: { token } } = await this.form.post('/api/login')

				// Save the token.
				this.$store.dispatch('auth/saveToken', { token })

				// Update the user.
				await this.$store.dispatch('auth/updateUser', { user: data })

				// Redirect home.
				this.$router.push({ name: 'home' })
			}
		}
	}
}
</script>
