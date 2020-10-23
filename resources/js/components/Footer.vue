<template>
	<!-- footer -->
	<footer class="border-t mt-6 pt-6 px-4 lg:px-0" style="background-image: linear-gradient(365deg, rgb(8 169 139), rgb(243 0 255));">
		<div class="flex flex-wrap container mx-auto">
			<div class="w-full lg:w-2/5">
				<router-link
					:to="'/'"
					class="text-lg font-semibold tracking-widest text-gray-900 uppercase"
				>
					<h1 class="font-bold text-white mb-4 text-4xl">
						NSHOP <sub class="text-base">TOPUP</sub>
					</h1>
				</router-link>
				<p class="text-gray-200 lg:block p-0 lg:pr-12" v-html="footerData.content"></p>
			</div>

			<div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
				<!-- <h6 class="font-bold text-white mb-2 mt-16">About US</h6>
					<p class="text-gray-300 lg:block p-0 pr-8 sm:pr-8 md:pr-8 lg:pr-12 xl:pr-12">
						Boisterous he on understood attachment as entreaties ye devonshire.
						In mile.
					</p> -->
					<ul class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2  mt-16">
						<li class="font-semibold text-sm hover:text-pink-300 text-white mb-2"><router-link :to="'/shop'">Shop</router-link></li>
						<li class="font-semibold text-sm hover:text-pink-300 text-white mb-2"><router-link :to="'/blogs'">Blog</router-link></li>
						<li class="font-semibold text-sm hover:text-pink-300 text-white mb-2"><router-link :to="'/about-us'">About US</router-link></li>
						<li class="font-semibold text-sm hover:text-pink-300 text-white mb-2"><router-link :to="'/contact'">Contect</router-link></li>
						<li class="font-semibold text-sm hover:text-pink-300 text-white mb-2"><router-link :to="'/privacy-policy'">Privacy & Policy</router-link></li>
						<li class="font-semibold text-sm hover:text-pink-300 text-white mb-2"><router-link :to="{ name: 'my-account' }">My Account</router-link></li>
					</ul>
			</div>
			<div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-2/5">
				<div
					class="w-full grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3"
				>
					<div>
						<h6 class="font-bold text-base sm:text-sm md:text-sm lg:text-sm xl:text-base text-white mb-2 mt-16">Follow US</h6>
						<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
								<a :href="websiteInfo.fb" target="_blank" title="Follow us facebook"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-facebook-square fa-w-14 fa-1x h-10 text-white"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" class=""></path></svg></a>
								<a :href="websiteInfo.youtube" target="_blank" title="Follow us youtube"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-youtube fa-w-18 fa-1x h-10 text-white"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path></svg></a>
						</div>
					</div>
					<div>
						<h6 class="font-bold text-base sm:text-sm md:text-sm lg:text-sm xl:text-base text-white mb-2 mt-16">Customer Support</h6>
						<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
								<a :href="'mailto:'+websiteInfo.email" title="Contact with mail"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-1x h-10 text-white hover:text-pink-300"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" class=""></path></svg></a>
								<a :href="'tel:'+websiteInfo.phone" title="Contact with mail"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-square-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-phone-square-alt fa-1x h-10 text-white hover:text-pink-300"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48zm-16.39 307.37l-15 65A15 15 0 0 1 354 416C194 416 64 286.29 64 126a15.7 15.7 0 0 1 11.63-14.61l65-15A18.23 18.23 0 0 1 144 96a16.27 16.27 0 0 1 13.79 9.09l30 70A17.9 17.9 0 0 1 189 181a17 17 0 0 1-5.5 11.61l-37.89 31a231.91 231.91 0 0 0 110.78 110.78l31-37.89A17 17 0 0 1 299 291a17.85 17.85 0 0 1 5.91 1.21l70 30A16.25 16.25 0 0 1 384 336a17.41 17.41 0 0 1-.39 3.37z" class=""></path></svg></a>
						</div>
					</div>
					<div>
						<h6 class="font-bold text-base sm:text-sm md:text-sm lg:text-sm xl:text-base text-white mb-2 mt-16">Send Feedback</h6>
						<div
								class="w-full grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1"
						>
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comment-alt-lines" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-comment-alt-lines fa-w-10 fa-1x h-10 text-white hover:text-pink-300"><path fill="currentColor" d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 9.8 11.2 15.5 19.1 9.7L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zM288 264c0 4.4-3.6 8-8 8H136c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm96-96c0 4.4-3.6 8-8 8H136c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16z" class=""></path></svg>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mx-auto py-4 mt-4">
			<div class="mt-2 text-center">
				© Copyright 2020. All Rights Reserved NSHOPTOPUP.
				<span>Developed by 
					<span class="text-green-100">
						<a href="https://www.facebook.com/md.jual.ah" target="_blank"> 
							Team Mahal
						</a>
					</span>
				</span>
				</div>
		</div>
	</footer>
</template>
<script>
import axios from "axios";
export default {
	data() {
				return{
						footerData: [],
						websiteInfo: [],
				}
		},
		methods: {
				getFooterData() {
						axios.get("/api/page-data/3").then(response => {
								this.footerData = response.data;
						});
				},
				getWebsiteInfo() {
						axios.get("/api/getWebsiteInfo").then(response => {
								this.websiteInfo = response.data;
						});
				},
		},
		mounted() {
				this.getFooterData();
				this.getWebsiteInfo();
		}
};
</script>
