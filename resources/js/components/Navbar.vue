<template>
<nav class="p-3 shadow-md">
	<div class="container mx-auto">
		<div class="flex justify-between items-center">
			<router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
				<img src="/logo.png" class="w-48">
			</router-link>
			
			<div class="text-right w-full">
				<div v-if="user" class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-dark"
						 href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
					>
						<img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
						{{ user.name }}
					</a>
					<div class="dropdown-menu">
						<router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
							<fa icon="cog" fixed-width />
							{{ $t('settings') }}
						</router-link>

						<div class="dropdown-divider" />
							<a href="#" class="dropdown-item pl-3" @click.prevent="logout">
								<fa icon="sign-out-alt" fixed-width />
								{{ $t('logout') }}
							</a>
						</div>
					</div>
					<!-- Guest -->
					<template v-else>
						<div class="flex justify-end items-center">
							<div class="w-20">
								<router-link :to="{ name: 'login' }" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" active-class="active">
									{{ $t('login') }}
								</router-link>
							</div>
							<div class="w-20">
								<router-link :to="{ name: 'register' }" class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" active-class="active">
									{{ $t('register') }}
								</router-link>
							</div>
						</div>
					</template>
				</div>
			</div>
		</div>
	</div>
</nav>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
	components: {
		LocaleDropdown
	},

	data: () => ({
		appName: window.config.appName
	}),

	computed: mapGetters({
		user: 'auth/user'
	}),

	methods: {
		async logout () {
			// Log out the user.
			await this.$store.dispatch('auth/logout')

			// Redirect to login.
			this.$router.push({ name: 'login' })
		}
	}
}
</script>

<style scoped>
.profile-photo {
	width: 2rem;
	height: 2rem;
	margin: -.375rem 0;
}
</style>
