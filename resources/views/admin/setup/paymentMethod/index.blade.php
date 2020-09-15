@include('admin.layouts.header')

<!-- Page content -->
<div class="container-fluid min-700px">
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
						<h3 class="mb-0">Payment Method List</h3>
					</div>
					<div class="col text-right">
						{{-- <a href="{{ url('/admin/paymentMethodCreate') }}" class="btn btn-sm btn-primary">Create New</a> --}}
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
							<th scope="col">discount</th>
							<th scope="col">currency</th>
							<th scope="col">Number</th>
							<th scope="col">Logo</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
							<td scope="row">{{ $key }}</td>
							<td style="">{{$data->name}}</td>
							<td style="">{{$data->discount}}</td>
							<td style="">{{$data->currency}}</td>
							<td style="">{{$data->number}}</td>
							<td style=""><img src="{{ asset('paymentMethod/' . $data->logo) }}" alt="Oops"
									style="max-height: 50px; max-width:100px"> </td>
							<td style="display: -webkit-inline-box;">
								<a href="{{ route('paymentMethodEdit',[$data->id]) }}"
								class="btn btn-success btn-sm">Edit</a>
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