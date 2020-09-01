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
				<form action="{{ route('transaction.index') }}" method="get">
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
								<label for="transaction_id">Withdraw ID</label>
								<input value="{{ old('transaction_id') }}"  type="text" name="transaction_id" id="name" class="form-control" placeholder="Enter Order ID">
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label for="subject">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="">Select Once</option>
									<option value="pandding">Pandding</option>
									<option value="complete">Complete</option>
									<option value="cencel">Cencel</option>
								</select>
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
						<h3 class="mb-0">Withdraw List</h3>
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
							<th scope="col">Transaction ID</th>
							<th scope="col">User ID</th>
							<th scope="col">Payment Method</th>
							<th scope="col">Receiver Number</th>
							<th scope="col">Amount</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
							<td scope="row">{{ $key }}</td>
							<td style="">{{$data->id}}</td>
							<td style="">{{$data->user_id}}</td>
							<td style="">
								@if($data->paymentMethod == 1){{ 'bKash' }}
								@elseif($data->paymentMethod == 2){{ 'Nagad' }}
								@elseif($data->paymentMethod == 2){{ 'Rocket' }}
								@endif
							</td>
							<td style="">{{$data->receiverNumber}}</td>
							<td style="">{{$data->amount}}</td>
							<td>
								@if ($data->status == 'cancel' || $data->status == 'complete')
								<select disabled name="status" id="status{{$data->id}}"
									onchange="myChange({{$data->id}}, this.value)" required class="form-control" style="width: 110px;">
									@else
									<select enable name="status" id="status{{$data->id}}"
										onchange="myChange({{$data->id}}, this.value)" required class="form-control" style="width: 110px">
										@endif
										@if ($data->status == '')
										<option value="">select once</option>
										@endif
										@if ($data->status == 'pandding')
										<option Selected value="pandding">pandding</option>
										@else
										<option value="pandding">pandding</option>
										@endif
										@if ($data->status == 'complete')
										<option Selected value="complete">complete</option>
										@else
										<option value="complete">complete</option>
										@endif
										@if ($data->status == 'cancel')
										<option Selected value="cancel">cancel</option>
										@else
										<option value="cancel">cancel</option>
										@endif
									</select>
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
        url : "{{ route('withdrawUpdate') }}",
        data : {
			status: status,
			id: id
		},
        success : function(response) {
			console.log(response);
			if(response.res == false){
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					title: 'Earn Amount less than withdraw amount',
					showConfirmButton: false,
					timer: 1500
				})
			}else{
					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Request has been completed',
					showConfirmButton: false,
					timer: 1500
				})

				if(response.status == 'cancel' || response.status == 'complete')
				{
					$('#status'+id).prop( "disabled", true );
				}
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