@include('admin.layouts.header')

<!-- Page content -->
<div class="container-fluid min-700px">

	{{-- search panel  --}}
	{{-- <div class="col-12">
		<button id="search_toggole" class="btn btn-success btn-sm mt-4"><i class="fas fa-search"></i> Search</button>
		<div class="card mt-2" id="item">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-3 bb-2">Search</h3>
					</div>
				</div>
				<form action="" method="POST">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exam_start_datetime">Date of creation</label>
								<div class="flatpickr form__group field" id="startDate" class="form__field">
									<input data-input type="text" name="exam_start_datetime" id="exam_start_datetime"
										autocomplete="off" placeholder="Select Date of creation" class="form-control">
									<!-- input is mandatory -->
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exam_end_datetime">Date of modification</label>
								<div class="flatpickr form__group field" id="endDate" class="form__field">
									<input data-input type="text" name="exam_end_datetime" id="exam_end_datetime"
										autocomplete="off" placeholder="Select Date of modification"
										class="form-control">
									<!-- input is mandatory -->
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="subject">name</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group mt-l">
								<input type="submit" value="Search" class="form-control btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> --}}

	{{-- Product List  --}}
	<div class="col-xl-12">
		@csrf
		@if ($message = Session::get('success'))
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-success">
				{{ $message }}
			</div>
		</div>
		@endif

		@if (count($errors) > 0)
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-danger">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</div>
		</div>
		@endif


		<div class="card mt-5">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0">Package List</h3>
					</div>
					<div class="col text-right">
						<a href="{{ url('/admin/packageCreate') }}" class="btn btn-sm btn-primary">Create New</a>
					</div>
				</div>
			</div>
			<?php if(empty($datas)){  ?>
			<div class="alert alert-danger mr-2 ml-2">
				Sorry No Information Found !!!
			</div>
			<?php }else{ ?>
			<div class="table-responsive">
				<!-- Projects table -->
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Buy Price</th>
							<th scope="col">Sale Price</th>
							<th scope="col">Product ID</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
							<td scope="row">{{ $key }}</td>
							<td style="">{{$data->name}}</td>
							<td style="">{{$data->buy_price}}</td>
							<td style="">{{$data->sale_price}}</td>
							<td style="">{{$data->product_id}}</td>
							<td style="display: -webkit-inline-box;">
								<a href="{{ route('packageEdit',[$data->id]) }}" class="btn btn-success btn-sm">Edit</a>
								<!-- <a href="productDelete/{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a> -->
								<form method="get" action="{{ route('packageDelete',[$data->id]) }}">
									{{ csrf_field() }}
									{{ method_field('get') }}
									<input style="margin-left: 10px;" type="submit" id="deletebtn"
										class="btn btn-danger btn-sm" value="Delete">
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $datas->render() }}
			</div>
			<?php } ?>
		</div>
	</div>

</div>

@include('admin.layouts.footer')