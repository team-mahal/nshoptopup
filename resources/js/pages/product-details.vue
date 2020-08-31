<template>
	<div class="container mx-auto">
		<div class="flex flex-wrap">
			<div class="md:w-5/12 w-full shadow-lg p-2">
				<div class="px-2 py-4">
					<h3
						class="text-4xl sm:text-1xl md:text-2xl lg:text-4xl text-red-300 font-bold"
					>
						{{ product.name }}
					</h3>
					<h4 class="text-2xl text-red-300 font-bold">
						{{ product.tag_line }}
					</h4>
					<div class="flex justify-center p-3 py-5">
						<div class="w-5/12">
							<img
								class="w-full rounded"
								:src="'/product/' + product.logo"
								v-bind:alt="product.name"
							/>
						</div>
					</div>
					<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 mb-4">
						<div class=" mb-2 px-1">
							<div
								class="bg-orange-600 w-full hover:bg-red-300 text-white sm:text-xs  px-1 text-center text-sm py-2 rounded justify-center flex"
							>
								<div>Downlaod</div>
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="robot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-robot fa-w-20 fa-1x h-4 ml-1 text-white"><path fill="currentColor" d="M32,224H64V416H32A31.96166,31.96166,0,0,1,0,384V256A31.96166,31.96166,0,0,1,32,224Zm512-48V448a64.06328,64.06328,0,0,1-64,64H160a64.06328,64.06328,0,0,1-64-64V176a79.974,79.974,0,0,1,80-80H288V32a32,32,0,0,1,64,0V96H464A79.974,79.974,0,0,1,544,176ZM264,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,264,256Zm-8,128H192v32h64Zm96,0H288v32h64ZM456,256a40,40,0,1,0-40,40A39.997,39.997,0,0,0,456,256Zm-8,128H384v32h64ZM640,256V384a31.96166,31.96166,0,0,1-32,32H576V224h32A31.96166,31.96166,0,0,1,640,256Z" class=""></path></svg>
							</div>
						</div>
						<div class="mb-2 px-1">
							<div
								class="bg-orange-600 w-full hover:bg-red-300 text-white sm:px-2  px-1 text-center text-sm py-2 rounded justify-center flex"
							>
								<div>Downlaod</div>
								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-apple fa-w-12 fa-1x h-5 ml-1 text-white"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" class=""></path></svg>
							</div>
						</div>
						<div class="mb-2 px-1">
							<div
								class="bg-orange-600 w-full hover:bg-red-300 text-white sm:px-2  px-1 text-center text-sm py-2 rounded justify-center flex"
							>
								<div>Website</div>
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-link fa-1x h-4 ml-1 text-white mt-1"><path fill="currentColor" d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z" class=""></path></svg>
							</div>
						</div>
						<div class="mb-2 px-1">
							<div
								class="bg-orange-600 w-full hover:bg-red-300 text-white sm:px-2  px-1 text-center text-sm py-2 rounded justify-center flex"
							>
								<div>Community</div>
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-comments fa-w-18 fa-1x h-4 ml-1 mt-1 text-white"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z" class=""></path></svg>
							</div>
						</div>
					</div>
					<div
						class="font-bold text-xs text-gray-600 mb-2"
						v-html="product.description"
					>
						{{ product.description }}
					</div>
				</div>
			</div>

			<div class="md:w-7/12 w-full px-2 mt-4">
				<div
					v-if="showElement == 1"
					class="shadow-lg p-2 bg-white p-4 mb-8"
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex">
						<div
							class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
						>
							1
						</div>
						<div class="ml-2">
							<h3 class="text-1xl text-gray-700 font-bold">
								ID / Password
							</h3>
						</div>
					</div>
					<div class="mt-4">
						<form class="w-full">
							<div class="flex flex-wrap -mx-3 mb-2">
								<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="account-type"
									>
										Account Type
									</label>
									<div class="relative">
										<select
											class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
											id="account-type"
											@change="onChange($event)"
											v-model="idCodeIdPasswordForm.type"
										>
											<option value="facebook">Facebook</option>
											<option value="gmail">Gmail</option>
										</select>
										<div
											class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
										>
											<svg
												class="fill-current h-4 w-4"
												xmlns="http://www.w3.org/2000/svg"
												viewBox="0 0 20 20"
											>
												<path
													d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
												/>
											</svg>
										</div>
									</div>
								</div>
								<div
									v-if="showAcountType === 1"
									class="w-full md:w-1/3 px-3 mb-6 md:mb-0"
								>
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="grid-city"
									>
										Facebook Number
									</label>
									<input
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										id="grid-city"
										type="text"
										placeholder="Enter Number"
										v-model="idCodeIdPasswordForm.email"
									/>
								</div>
								<div v-else class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="grid-city"
									>
										Your Gmail
									</label>
									<input
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										id="grid-city"
										type="email"
										placeholder="Enter Email"
										v-model="idCodeIdPasswordForm.email"
									/>
								</div>

								<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="password"
									>
										Password
									</label>
									<input
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										id="password"
										type="password"
										placeholder="Enter Password"
										v-model="idCodeIdPasswordForm.password"
									/>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div
					v-else
					class="shadow-lg p-2 bg-white p-4 mb-8"
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex">
						<div
							class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
						>
							0
						</div>
						<div class="ml-2">
							<h3 class="text-1xl text-gray-700 font-bold">
								ID / Code
							</h3>
						</div>
					</div>
					<div class="mt-4 p-4">
						<form class="w-full">
							<div class="flex flex-wrap -mx-3 mb-2">
								<div class="w-full md:mb-0">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="grid-city"
									>
										Id Code
									</label>
									<input
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										id="grid-city"
										type="text"
										placeholder="ID CODE"
										v-model="idCodeIdPasswordForm.email"
									/>
									<input type="hidden" v-model="idCodeIdPasswordForm.password" value="id code">
									<input type="hidden" v-model="idCodeIdPasswordForm.type" value="id code">
								</div>
							</div>
						</form>
					</div>
				</div>

				<div
					class="shadow-lg p-2 bg-white p-4"
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex">
						<div
							class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
						>
							2
						</div>
						<div class="ml-2">
							<h3 class="text-1xl text-gray-700 font-bold">
								Select Denomination
							</h3>
						</div>
					</div>
					<div
						class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4"
					>
						<div v-for="(p, key, index) in packages" :key="index" class="">
							<input
								type="radio"
								@change="onChangePackage(p)"
								:value="p.sale_price"
								:id="key"
								v-model="checkedData"
								style="display:none"
							/>
							<label
								class="rounded w-full checked:bg-gray-900 float-left p-2 border hover:bg-red-700 focus:bg-red-300 hover:text-white border-gray-300 text-center text-gray-700 font-bold"
								:for="key"
								>{{ p.name }}</label
							>
						</div>
					</div>
				</div>
				<div
					class="shadow-lg p-2 bg-white p-4 mt-8 transition duration-1000 pb-10"
					style="box-shadow: 0 2px 10px #0000003b;"
				>
					<div class="flex">
						<div
							class="rounded-full h-6 w-6 bg-red-300 flex items-center justify-center text-white text-sm"
						>
							3
						</div>
						<div class="ml-2 w-full">
							<h3 class="text-1xl text-gray-700 font-bold">
								Select Payment Channel
							</h3>
							<h2
								class="text-1xl text-gray-500 border-b-2 font-bold italic mt-4"
							>
								All Payment Channel
							</h2>
							<div v-if="check == false">
									<p v-on:click="modal = true" class="text-white cursor-pointer text-center bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded mb-0">Login First To Confirm Order</p>
							</div>
							<div v-else class="flex justify-between mt-2 cursor-pointer" v-on:click="growDiv">
								<div class="-ml-2">
									<img src="/icons/wallet.png" class="mr-2 float-left" />
									<div class="float-left">
										<h2 class="text-1xl text-gray-700 font-bold">Shop Wallet</h2>
										<h2
											class="text-sm text-red-300 italic font-bold text-opacity-75"
										>
											 {{ checkedData }} BDT
										</h2>
									</div>
								</div>
								<div class="ml-2">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wallet" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-wallet fa-w-16 w-10 h-10 text-red-300 float-left mr-2"><path fill="currentColor" d="M461.2 128H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h384c8.84 0 16-7.16 16-16 0-26.51-21.49-48-48-48H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h397.2c28.02 0 50.8-21.53 50.8-48V176c0-26.47-22.78-48-50.8-48zM416 336c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z" class=""></path></svg>
									<div class="float-left">
										<h2 class="text-1xl text-red-300 font-bold">Your available wallet </h2>
										<h2
											class="text-sm text-red-300 italic font-bold text-opacity-75"
										>
											{{ this.user.wallet }} BDT
										</h2>
									</div>
								</div>
								<img
									src="https://img.icons8.com/fluent/45/000000/sort-down.png"
									class="float-right"
								/>
							</div>
						</div>
					</div>
					<div class="w-full mt-4">
						<div id="grow">
							<div class="measuringWrapper">
								<div>
									<div v-if="check == false">
											<p v-on:click="modal = true" class="text-white cursor-pointer text-center bg-orange-500 hover:bg-pink-500 text-white font-bold py-2 px-2 rounded mb-0">
												Login First To Confirm Your Order
											</p>
									</div>
									<div v-else class="grid sm:grid-cols-2 md:grid-cols-2 gap-4">
												<div
													class="flex bg-grey-300 border-2 justify-center"
													v-on:click="orderWithWallet(user.id)"
												>
													<div class="w-full">
														<div class="flex justify-center cursor-pointer">
															<img
																src="/logo.png"
																style="width: 50px;"
																class="mr-2 p-1"
															/>
															<h2 class="text-xs text-red-300 font-bold  p-1">
																BDT {{ checkedData }}
															</h2>
														</div>
														<div class="border-t-2 bg-gray-300">
															<h2 class="text-sm text-gray-900 font-normal pl-2">
																Confirm Order NSHOPTOPUP
															</h2>
														</div>
													</div>
												</div>
												<!-- <div
													class="flex bg-grey-300 border-2 justify-center"
													v-on:click="modal = true"
												>
													<div class="w-full">
														<div class="flex justify-center cursor-pointer">
															<img
																src="/bkash.jpg"
																style="width: 50px;"
																class="mr-2 p-1"
															/>
															<h2 class="text-xs text-red-300 font-bold  p-1">
																BDT {{ checkedData }}
															</h2>
														</div>
														<div class="border-t-2 bg-gray-300">
															<h2 class="text-sm text-gray-900 font-normal pl-2">
																bKash
															</h2>
														</div>
													</div>
												</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div v-if="modal" class="modal sm:px-3">
			<div class="lg:w-6/12 sm:w-10/12 mx-auto bg-white">
				<header class="card p-4 border-b-2">
					<span
						v-on:click="modal = false"
						class="float-right hover:text-red-300 text-2xl transform cursor-pointer"
						>×</span
					>
					<div class="justify-center items-center">
						<div>
							<h2 class="text-1xl text-gray-900 font-bold" v-if="check == false">
								Login First To Complete Your Order
							</h2>
							<h2 class="text-1xl text-gray-900 font-bold" v-else>
								Please Complete Your Order
							</h2>
						</div>
					</div>
				</header>
				<div class="modal-body bg-gray-300 py-5 px-32 md:px-2 sm:px-2">
					<div class="bg-white p-4">
						<div class="mt-8">
							<form
								v-if="check == false"
								@submit.prevent="login"
								@keydown="form.onKeydown($event)"
								class="w-full"
							>
								<div class="w-full px-3 mb-6 md:mb-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="email"
									>
										{{ $t("email") }}
									</label>
									<input
										v-model="form.email"
										:class="{ 'is-invalid': form.errors.has('email') }"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										type="email"
										name="email"
										placeholder="Email"
									/>
									<has-error class="text-red-600" :form="form" field="email" />
								</div>
								<div class="w-full px-3 mb-6 md:mb-3">
									<label
										class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
										for="email"
									>
										{{ $t("password") }}
									</label>
									<input
										v-model="form.password"
										:class="{ 'is-invalid': form.errors.has('password') }"
										class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										type="password"
										name="password"
										placeholder="Password"
									/>
									<has-error :form="form" field="password" />
								</div>
								<div class="text-right px-3">
									<p class="text-sm text-gray-900 transform -translate-y-2">
										Login First To Submit Order
									</p>
									<div class="flex float-right">
										<label
											for="remember-me"
											class="font-bold text-xs text-red-300 mr-2"
										>
											{{ $t("remember_me") }} </label
										><checkbox
											v-model="remember"
											name="remember"
											class=""
										></checkbox>
									</div>
								</div>
								<div class="w-full px-3 mb-6 md:mb-3 mt-2">
									<button
										class="appearance-none block w-full bg-red-300 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										:loading="form.busy"
									>
										{{ $t("login") }}
									</button>
								</div>
								<div class="text-center">
									<h4 class="text-sm">
										By clicking "Confirm", you agree to
										<router-link :to="'/privacy-policy'" class="text-red-300"
											>Kmf Terms and Conditions.</router-link>
									</h4>
								</div>
							</form>
							<div v-else class="">
								<div class="w-full mb-6 md:mb-3 mt-2">
									<button
										class="appearance-none block w-full bg-orange-500 text-white border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										v-on:click="orderWithWallet(user.id)"
										v-if="user.wallet >= checkedData"
									>Your Wallet {{ user.wallet }} BDT
										Confirm Order
									</button>
									<!-- BKash Order  -->
									<!-- <div>
										<div class="border-2 text-left border-greeen-500 bKash-success">
											Please send your total amount via bKash and write down your Transaction ID (TrxID). You do not need to pay bKash fees from your side. You must provide the full TrxID. We do not accept (partial) phone number for payment validation.
										</div>
										<br>
										<div class="our-bkash">
											<h4 class="mr-4 text-sm font-bold mt-2 ml-4">Our bKash Number: <b>   <input value="01997980260" disabled class="p-1 bg-gray-200 border-lg border-pink-500 border-2"/></b></h4><br>
											<div class="bKash-error">
												IMPORTANT: This is a MERCHANT NUMBER.
											</div>
											<div class="bKash-error">
												Do NOT call this number. You will not get a response.
											</div>
										</div>
										<div class="flex flex-wrap ml-4">
												<h5 class="mr-4 font-bold mt-2">Your TrxId : </h5>
												<div>
													<input
														id="search"
														v-model="trxid"
														placeholder="Transaction ID"
														class="float-right p-2 bg-gray-200 hover:bg-white hover:border-gray-300 border-lg border-pink-500 border-2 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300"
													/>
													<p v-if="trxid === ''" class="text-pink-700">
														Transaction ID required
													</p>
												</div>
											</div>
											<br />
										<button
										class="appearance-none block w-full bg-red-300 text-white border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
										v-on:click="submitOrder(user.id)"
									>
										Confirm
									</button>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Form from "vform";
import { mapGetters } from "vuex";
import axios from "axios";
import Swal from "sweetalert2";
export default {
	metaInfo() {
		return { title: this.$t("login") };
	},
	data() {
		return {
			product: [],
			packages: [],
			showElement: 0,
			showAcountType: 1,
			checkedData: "",
			key: "",
			trxid: "",
			selectedPackageData: [],
			computedHeight: "auto",
			modal: false,
			form: new Form({
				email: "",
				password: ""
			}),
			remember: false,
			idCodeIdPasswordForm: new Form({
				type: "facebook",
				email: "",
				password: ""
			})
		};
	},
	computed: mapGetters({
		user: "auth/user",
		check: "auth/check"
	}),
	methods: {
		fetchProduct() {
			let id = this.$route.params.id;
			axios.get(`/api/product/${id}`).then(response => {
				this.product = response.data;
				this.showElement = response.data.type;
			});
		},
		fetchPackages() {
			let id = this.$route.params.id;
			axios.get(`/api/packages/${id}`).then(response => {
				this.packages = response.data;
			});
		},
		onChange(event) {
			if (event.target.value == "null" || event.target.value == "facebook") {
				this.showAcountType = 1;
			} else {
				this.showAcountType = 0;
			}
		},
		onChangePackage(p) {
			this.selectedPackageData = p;
		},
		growDiv() {
			if (this.checkedData == "") {
				Swal.fire({
					type: "warning",
					title: "You have to select denomination first",
					text:
						"Please choose the item you want to purchase before select payment channel",
					reverseButtons: true,
					confirmButtonText: "ok"
				});
			} else {
				var growDiv = document.getElementById("grow");
				if (growDiv.clientHeight) {
					growDiv.style.height = 0;
				} else {
					var wrapper = document.querySelector(".measuringWrapper");
					growDiv.style.height = wrapper.clientHeight + "px";
				}
			}
		},
		formatPrice(value) {
			let val = (value / 1).toFixed(2).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		},
		async login() {
			const { data } = await this.form.post("/api/login");
			this.$store.dispatch("auth/saveToken", {
				token: data.token,
				remember: this.remember
			});
			await this.$store.dispatch("auth/fetchUser");
		},
		orderWithWallet(user_id){
			if(this.user.wallet >= this.checkedData){
				Swal.fire({
					type: "question",
					title: "Are You Sure ?",
					html: '<b style="color: green;">Confirm your order with NSHOPTOPUP wallet</b>',
					reverseButtons: true,
					confirmButtonText: "Yes Confirm Order",
					showCancelButton: true,
				}).then(result => {
					if (result.value) {
					console.log(this.showElement);
					if(this.showElement == 0){
						var password = "ID Code";
						var type = "ID Code";
					}else{
						var password = this.idCodeIdPasswordForm.password;
						var type = this.idCodeIdPasswordForm.type;
					}
					var email = this.idCodeIdPasswordForm.email;
					console.log(type, email, password);
					if(email == '' || password == '')
					{
						Swal.fire({
							type: "error",
							title: "First Select ID Code/ID Password",
							text: "please First Select ID Code/ID Password All Field",
							reverseButtons: true,
							confirmButtonText: "ok"
						}).then(result => {
							this.modal = false;
						});
					}else{
					let id = this.selectedPackageData.id;
					var params = {
						type: type,
						password: password,
						email: email
					};
					axios.post(`/api/product-order-walllet/${id}/${user_id}`, params).then(response => {
							if (response.data.success == '1') {
								Swal.fire({
									type: "success",
									title: "Order Completed",
									html: "Your Order Has Been Successfully Completed <br><p style='color: green;'>Now Your Wallet  "+ response.data.wallet +" BDT</p>",
									reverseButtons: true,
									confirmButtonText: "ok"
								}).then(result => {
									location.reload();
								});
							} else {
								Swal.fire({
									type: "error",
									title: "Order Failed",
									text: "Your Order Not Completed",
									reverseButtons: true,
									confirmButtonText: "ok"
								}).then(result => {
									location.reload();
								});
							}
						});
					}
					}
				});
			}else{
				Swal.fire({
					type: "error",
					title: "Sorry",
					html: "<b style='color: red;'>Your KMF wallet is less than your shop wallet</b><br><p color='green'>Please, try another way</p>",
					reverseButtons: true,
					confirmButtonText: "ok"
				})
			}
		},

		// **** bKash Order ***
		// submitOrder(user_id) {
		// 	if (this.trxid == "") {
		// 		Swal.fire({
		// 			type: "warning",
		// 			title: "Transaction Id filed is required",
		// 			text: "Transaction ID required",
		// 			reverseButtons: true,
		// 			confirmButtonText: "ok"
		// 		});
		// 	} else if (this.check == false) {
		// 		this.modal = true;
		// 	} else {
		// 		axios
		// 			.get(`/api/trxidData/${this.trxid}/${this.user.id}/${this.checkedData}`)
		// 			.then(response => {
		// 				console.log(response.data);
		// 				if (response.data.error == "0") {
		// 					if (response.data.used_code == "1") {
		// 						var form = document.createElement("div");
		// 						form.innerHTML =
		// 							"<b style='color:red;'>This trxID is Already Used !!!</b><br><p>Sender Number : <b>" +
		// 							response.data.transaction.sender +
		// 							"</b></p><p>Amount : <b>" +
		// 							response.data.transaction.amount +
		// 							"</b></p>";
		// 						Swal.fire({
		// 							title: "Order Failed !!!",
		// 							html: form,
		// 							type: "warning",
		// 							reverseButtons: true,
		// 							confirmButtonText: "ok"
		// 						});
		// 					} else {
		// 						if (response.data.order_success_code == "0") {
		// 							var form = document.createElement("div");
		// 							form.innerHTML =
		// 								"<b style='color:red;'>Your Order is Not Completed</b><br><p>Sender Number : <b>" +
		// 								response.data.transaction.sender +
		// 								"</b></p><p>Amount : <b>" +
		// 								response.data.transaction.amount +
		// 								"</b></br><b style='color:green;'>This Amount Add Your Wallet Check please</b><br><i>Your Payment Amount Less Than Shop Amount As a result Order Failed</i></p>";
		// 							Swal.fire({
		// 								title: "Order Failed !!!",
		// 								html: form,
		// 								type: "warning",
		// 								reverseButtons: true,
		// 								confirmButtonText: "ok"
		// 							});
		// 						} else {
		// 							if (response.data.extra_money == "1") {
		// 									if(this.showElement == 0){
		// 												var password = "ID Code";
		// 												var type = "ID Code";
		// 											}else{
		// 												var password = this.idCodeIdPasswordForm.password;
		// 												var type = this.idCodeIdPasswordForm.type;
		// 											}
		// 											var email = this.idCodeIdPasswordForm.email;
		// 											console.log(type, email, password);
		// 											if(email == '' || password == '')
		// 											{
		// 												Swal.fire({
		// 													type: "error",
		// 													title: "First Select ID Code/ID Password",
		// 													text: "please First Select ID Code/ID Password All Field",
		// 													reverseButtons: true,
		// 													confirmButtonText: "ok"
		// 												}).then(result => {
		// 													this.modal = false;
		// 												});
		// 											}else{
		// 											let id = this.selectedPackageData.id;
		// 											var params = {
		// 												type: type,
		// 												password: password,
		// 												email: email
		// 											};
		// 											axios.post(`/api/productOrder/${id}/${user_id}`, params).then(response => {
		// 													console.log(response);
		// 													if (response.data == "true") {
		// 														Swal.fire({
		// 															type: "success",
		// 															title: "Order Completed",
		// 															text: "Your Order Has Been Successfully Completed <br><p style='color: green;'>Extra Amount Add Your Wallet Check please</p>",
		// 															reverseButtons: true,
		// 															confirmButtonText: "ok"
		// 														}).then(result => {
		// 															location.reload();
		// 														});
		// 													} else {
		// 														Swal.fire({
		// 															type: "error",
		// 															title: "Order Failed",
		// 															text: "Your Order Not Completed",
		// 															reverseButtons: true,
		// 															confirmButtonText: "ok"
		// 														}).then(result => {
		// 															location.reload();
		// 														});
		// 													}
		// 												});
		// 											}

		// 							} else {
		// 							 if(this.showElement == 0){
		// 									var password = "ID Code";
		// 									var type = "ID Code";
		// 								}else{
		// 									var password = this.idCodeIdPasswordForm.password;
		// 									var type = this.idCodeIdPasswordForm.type;
		// 								}
		// 								var email = this.idCodeIdPasswordForm.email;
		// 								console.log(type, email, password);
		// 								if(email == '' || password == '')
		// 								{
		// 									Swal.fire({
		// 										type: "error",
		// 										title: "First Select ID Code/ID Password",
		// 										text: "please First Select ID Code/ID Password All Field",
		// 										reverseButtons: true,
		// 										confirmButtonText: "ok"
		// 									}).then(result => {
		// 										this.modal = false;
		// 									});
		// 								}else{
		// 								let id = this.selectedPackageData.id;
		// 								var params = {
		// 									type: type,
		// 									password: password,
		// 									email: email
		// 								};
		// 								axios.post(`/api/productOrder/${id}/${user_id}`, params).then(response => {
		// 										console.log(response);
		// 										if (response.data == "true") {
		// 											Swal.fire({
		// 												type: "success",
		// 												title: "Order Completed",
		// 												text: "Your Order Has Been Successfully Completed",
		// 												reverseButtons: true,
		// 												confirmButtonText: "ok"
		// 											}).then(result => {
		// 												location.reload();
		// 											});
		// 										} else {
		// 											Swal.fire({
		// 												type: "error",
		// 												title: "Order Failed",
		// 												text: "Your Order Not Completed",
		// 												reverseButtons: true,
		// 												confirmButtonText: "ok"
		// 											}).then(result => {
		// 												location.reload();
		// 											});
		// 										}
		// 									});
		// 								}
		// 							}
		// 						}
		// 					}
		// 				} else {
		// 					var form = document.createElement("div");
		// 					if (
		// 						response.data.transaction.trxStatus == "0010" ||
		// 						response.data.transaction.trxStatus == "0011"
		// 					) {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, trxID is valid but transaction is in pending state.</b>";
		// 					} else if (response.data.transaction.trxStatus == "0100") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, trxID is valid but transaction has been reversed.</b>";
		// 					} else if (response.data.transaction.trxStatus == "0111") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, trxID is valid but transaction has failed.</b>";
		// 					} else if (response.data.transaction.trxStatus == "1001") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Invalid MSISDN input. Try with correct mobile no.</b>";
		// 					} else if (response.data.transaction.trxStatus == "1002") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Invalid trxID, it does not exist.</b>";
		// 					} else if (response.data.transaction.trxStatus == "1003") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Access denied. Username or Password is incorrect.</b>";
		// 					} else if (response.data.transaction.trxStatus == "1004") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Access denied. trxID is not related to this username.</b>";
		// 					} else if (response.data.transaction.trxStatus == "2000") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Access denied. User does not have access to this module.</b>";
		// 					} else if (response.data.transaction.trxStatus == "2001") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Access denied. User date time request is exceeded of the defined limit.</b>";
		// 					} else if (response.data.transaction.trxStatus == "3000") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Missing required mandatory fields for this module</b>";
		// 					} else if (response.data.transaction.trxStatus == "9999") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Could not process request.</b>";
		// 					} else if (response.data.transaction.trxStatus == "4001") {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, Already Submited This trxID .</b>";
		// 					} else {
		// 						form.innerHTML =
		// 							"<b style='color:red;'>bKash Say, This trxID is Not Valid !!!</b>";
		// 					}
		// 					Swal.fire({
		// 						title: "Order Failed !!!",
		// 						html: form,
		// 						type: "warning",
		// 						reverseButtons: true,
		// 						confirmButtonText: "ok"
		// 					});
		// 				}
		// 			});
		// 	}
		// }
	},
	mounted() {
		this.fetchProduct();
		this.fetchPackages();
	}
};
</script>
<style>
.bKash-success::before{
	content: "\2713";
    background-color: #4c8658;
    padding: 6px;
    height: 10px;
    width: 10px;
    margin-right: 7px;
    color: white;
    font-weight: bold;
    border-radius: 50%;
}
.bKash-success {
    padding: 9px;
    background: #348e1652;
	border: 2px solid gray;
}
.bKash-error::before { 
  content: "\26A0";
  padding: 5px;
  margin-right: 5px;
  color: red;
  font-size: 20px;
  font-weight: bold;
  border-radius: 50%;
}
.bKash-error {
    padding: 10px;
    background: #e400008c;
    color: white;
    font-family: sans-serif;
    margin-bottom: 5px;
}
.our-bkash {
    padding: 5px;
    border: 1px solid;
    margin-bottom: 18px;
    background: #b59f9f1f;
}
input[type="radio"]:checked + .radio {
	background-color: #241009;
}
input[type="radio"]:checked + label {
	background-color: #dd6b20 !important;
	color: #ffffff !important;
}
.smooth-enter-active,
.smooth-leave-active {
	transition: height 5s !important;
	overflow: hidden !important;
}
.smooth-enter,
.smooth-leave-to {
	height: 0 !important;
}
#grow {
	-moz-transition: height 0.5s;
	-ms-transition: height 0.5s;
	-o-transition: height 0.5s;
	-webkit-transition: height 0.5s;
	transition: height 0.5s;
	height: 0;
	overflow: hidden;
}
/* Modal css */
.modal {
	z-index: 3;
	padding-top: 100px;
	position: fixed;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0, 0, 0);
	background-color: rgba(0, 0, 0, 0.4);
}
.modal-body {
	height: 500px;
	overflow-y: scroll;
}
::-webkit-scrollbar {
	width: 5px;
}
::-webkit-scrollbar-track {
	background: #ffffff;
}
::-webkit-scrollbar-thumb {
	background: #ed6c27;
	border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
	background: #555;
}
@media only screen and (max-width: 500px) {
	.modal {
		padding: 0px 5px !important;
	}
	.modal-body {
		padding: 0px 5px !important;
	}
}
</style>



