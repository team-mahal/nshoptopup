@include('admin.layouts.header')
			
				<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
						</ol>
					</nav>
				</div>
			</div>

			<?php
				// if (Auth::guard('admin')->check()) {
				//     echo "Loged In";
				// } else {
				//     echo "not loged in";
				// }
			?>
			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<a class="" href="">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Total User</h5>
										<span class="h2 font-weight-bold mb-0">{{ $total_users }}</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
											<i class="ni ni-circle-08"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-sm">
									<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100.00%</span>
									<span class="text-nowrap">All users</span>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<a class="" href="">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Total Order</h5>
										<span class="h2 font-weight-bold mb-0">{{ $total_orders }}</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
											<i class="ni ni-chart-pie-35"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-sm">
									<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>100.00%</span>
									<span class="text-nowrap">All Orders</span>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<a class="" href="">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Today Users</h5>
										<span class="h2 font-weight-bold mb-0">{{ $today_users }}</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
											<i class="ni ni-money-coins"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ round($percentige, 2) }} %</span>
									<span class="text-nowrap">Today Users</span>
								</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<a class="" href="">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Today Orders</h5>
										<span class="h2 font-weight-bold mb-0">{{ $today_orders }}</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
											<i class="ni ni-chart-bar-32"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-sm">
									<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ round($percentige_orders, 2) }} %</span>
									<span class="text-nowrap">Today Orders</span>
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<a class="" href="">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Total wallet</h5>
										<span class="h2 font-weight-bold mb-0">{{ $totalwallet }}</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
											<i class="ni ni-chart-bar-32"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-sm">
									<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ round($totalwallet, 2) }} %</span>
								</p>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<a class="" href="">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0">Total Earn wallet</h5>
										<span class="h2 font-weight-bold mb-0">{{ $totalearnwallet }}</span>
									</div>
									<div class="col-auto">
										<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
											<i class="ni ni-chart-bar-32"></i>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-sm">
									<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ round($totalearnwallet, 2) }} %</span>
								</p>
							</div>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<div style="min-height: 580px"> 

</div>


			
@include('admin.layouts.footer')