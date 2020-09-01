function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  { path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },

  { path: '*', component: page('errors/404.vue') },

  { path: '/details/:id/:slug', name: 'details', component: page('product-details.vue')},
  { path: '/blog-details/:id/:slug', name: 'blog-details', component: page('blog-details.vue')},
  { path: '/blogs', name: 'blogs', component: page('blogs.vue')},
  { path: '/contact', name: 'contact', component: page('contact.vue')},
  { path: '/about-us', name: 'about-us', component: page('about-us.vue')},
  { path: '/privacy-policy', name: 'privacy-policy', component: page('privacy-policy.vue')},
  { path: '/shop', name: 'shop', component: page('shop.vue')},
  { path: '/shop-details/:id/:slug', name: 'shop-details', component: page('shop-details.vue')},
  { path: '/check-out', name: 'check-out', component: page('check-out.vue')},
  { path: '/my-orders', name: 'my-orders', component: page('my-orders.vue')},
  { path: '/order-details/:id', name: 'order-details', component: page('order-details.vue')},
  { path: '/my-account', name: 'my-account', component: page('my-account.vue')},
  { path: '/my-wallet', name: 'my-wallet', component: page('my-wallet.vue')},
  { path: '/add-wallet', name: 'add-wallet', component: page('add-wallet.vue')},
  { path: '/playzoon', name: 'playzoon', component: page('playzoon.vue')},
]
