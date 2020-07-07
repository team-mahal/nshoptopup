<template>
<div class="max-w-md mx-auto">
	<div class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 flex flex-col mt-16">
		<form @submit.prevent="login" @keydown="form.onKeydown($event)">
			<!-- Email -->
			<div class="form-group row">
				<label class="col-md-3 col-form-label text-md-right font-bold">{{ $t('email') }}</label>
				<div class="col-md-7">
					<input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="email" name="email" placeholder="Email">
					<has-error class="text-red-600" :form="form" field="email" />
				</div>
			</div>

			<!-- Password -->
			<div class="form-group row">
				<label class="col-md-3 col-form-label text-md-right font-bold">{{ $t('password') }}</label>
				<div class="col-md-7">
					<input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" name="password" placeholder="Password">
					<has-error :form="form" field="password" />
				</div>
			</div>

			<!-- Remember Me -->
			<div class="form-group row">
				<div class="col-md-3" />
				<div class="col-md-7 d-flex">
					<checkbox v-model="remember" name="remember">
						{{ $t('remember_me') }}
					</checkbox>

					<router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
						{{ $t('forgot_password') }}
					</router-link>
				</div>
			</div>

			<div class="mt-5">
				<!-- Submit Button -->
				<button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" :loading="form.busy">
					{{ $t('login') }}
				</button>

				<!-- GitHub Login Button -->
				<login-with-github />
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
		return { title: this.$t('login') }
	},

	data: () => ({
		form: new Form({
			email: '',
			password: ''
		}),
		remember: false
	}),

	methods: {
		async login () {
			// Submit the form.
			const { data } = await this.form.post('/api/login')

			// Save the token.
			this.$store.dispatch('auth/saveToken', {
				token: data.token,
				remember: this.remember
			})

			// Fetch the user.
			await this.$store.dispatch('auth/fetchUser')

			// Redirect home.
			this.$router.push({ name: 'home' })
		}
	}
}
</script>
