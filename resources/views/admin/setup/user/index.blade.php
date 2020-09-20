@include('admin.layouts.header')
<!-- Page content -->
<div class="container-fluid min-700px">
	{{-- search panel  --}}
	<div class="col-12">
		<div class="card mt-4">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-3 bb-2">Search</h3>
					</div>
				</div>
				<form action="{{ route('users.index') }}" method="get">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="user_id">User ID</label>
								<input value="{{ old('user_id') }}" type="text" name="user_id" id="user_id" autocomplete="off" placeholder="User ID" class="form-control">
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input value="{{ old('email') }}"  type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail">
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="phone">Phone Number</label>
								<input value="{{ old('phone') }}"  type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
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
	</div>
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
						<h3 class="mb-0">Users List</h3>
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
							<th scope="col">User ID</th>
							<th scope="col">Wallet</th>
							<th scope="col">Name</th>
							<th scope="col">E-mail</th>
							<th scope="col">Wallt</th>
							<th scope="col">Earn Wallt</th>
							<th scope="col">Phone</th>
							<th scope="col">Address</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
							<td scope="row">{{ $key+1 }}</td>
							<td style="">{{$data->id}}</td>
							<td style="">{{$data->wallet}}</td>
							<td style="">{{$data->name}}</td>
							<td style="">{{$data->email}}</td>
							<td style="">{{$data->wallet}}</td>
							<td style="">{{$data->earn_wallet}}</td>
							<td style="">{{$data->phone}}</td>
							<td style="">{{$data->address}}</td>
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

<!-- /.container-fluid -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@include('admin.layouts.footer')

<script>
	function myChange($id, $status) {
    var status = $status;
	var id = $id;
	console.log(status);
	
	$.ajaxSetup({
		headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});
    $.ajax({
        type:"POST",
        url : "{{ route('orderUpdate') }}",
        data : {
			status: status,
			id: id
		},
        success : function(response) {
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Your work has been saved',
				showConfirmButton: false,
				timer: 1500
			})

			if(response == 'cancel' || response == 'complete')
			{
				$('#status'+id).prop( "disabled", true );
			}
        },
        error: function() {
			Swal.fire({
				position: 'top-end',
				icon: 'error',
				title: 'Error occured',
				showConfirmButton: false,
				timer: 1500
			})
        }
    });
};
</script>