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
				<form action="{{ route('order.index') }}" method="get">
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
								<label for="subject">Order ID</label>
								<input value="{{ old('order_id') }}"  type="text" name="order_id" id="name" class="form-control" placeholder="Enter Order ID">
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
						<h3 class="mb-0">Order List</h3>
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
				<table class="table table-sm table-bordered" style="padding: 0px;margin:0px;">
					<thead class="thead-light">
						<tr>
							<th  style="padding: 15px;margin:10px;" scope="col">Action</th>
							<th  style="padding: 15px;margin:10px;" scope="col">O.ID</th>
							<th  style="padding: 15px;margin:10px;" scope="col">U.ID</th>
							<th  style="padding: 15px;margin:10px;" scope="col">Type</th>
							<th  style="padding: 15px;margin:10px;" scope="col">ID Code / ID Email</th>
							<th  style="padding: 15px;margin:10px;" scope="col">PAssword</th>
							<th  style="padding: 15px;margin:10px;" scope="col">T.ID</th>
							<th  style="padding: 15px;margin:10px;" scope="col">P.Number</th>
							<th  style="padding: 15px;margin:10px;" scope="col">P.Method</th>
							<th  style="padding: 15px;margin:10px;" scope="col">Name</th>
							<th  style="padding: 15px;margin:10px;" scope="col">SP</th>
							<th  style="padding: 15px;margin:10px;" scope="col">Amount</th>
							<th  style="padding: 15px;margin:10px;" scope="col">Name Save</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
							<td  style="padding: 0px;margin:0px;">
								@if ($data->status == 'cancel')
									<select disabled name="status" id="status{{$data->id}}"
										onchange="myChange({{$data->id}}, this.value)" required class="form-control text-danger" style="width: 110px;">
								@elseif($data->status == 'complete')
									<select disabled name="status" id="status{{$data->id}}"
										onchange="myChange({{$data->id}}, this.value)" required class="form-control text-success" style="width: 110px;">
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
									<option Selected value="cancel" class="text-danger">cancel</option>
									@else
									<option value="cancel">cancel</option>
									@endif
								</select>
							</td>
							<td style="padding: 15px;margin:10px;">{{$data->id}}</td>
							<td style="padding: 15px;margin:10px;">{{$data->user_id}}</td>
							<td style="padding: 15px;margin:10px;">{{$data->type}}</td>
							<td style="padding: 15px;margin:10px;">
								<span>
									<button class="btn btn-sm btn-secondary" onclick="myFunction( {{ $data->id }} )">Copy</button>
									<input value="{{$data->email}}" id="{{ $data->id }}" style="width: 80px;">
								</span>
							</td>
							<td style="padding: 15px;margin:10px;">
								<button class="btn btn-sm btn-secondary" onclick="myFunction1( {{ $data->id }}+'a' )">Copy</button>
								<input  value="{{$data->password}}" id="{{ $data->id.'a' }}" style="width: 80px;"></span>
							</td>
							<td style="padding: 15px;margin:10px;">{{$data->transaction_id}}</td>
							<td style="padding: 15px;margin:10px;">{{$data->payment_number}}</td>
							<td style="padding: 15px;margin:10px;">
								@if($data->payment_method== 1) {{ 'bKash' }}
								@elseif($data->payment_method == 2) {{ 'Nogod' }}
								@elseif($data->payment_method == 2) {{ 'Rocket' }}
								@endif
							</td>
							<td style="padding: 15px;margin:10px;">{{$data->name}}</td>
							<td style="padding: 15px;margin:10px;"><span>@if($data->paymentm){{ $data->paymentm->currency }}@endif</span> {{ $data->sale_price }}</td>
							<td style="padding: 15px;margin:10px;">
								<input type="number" id="{{ $data->id.'input' }}" placeholder="Enter Amount" value="{{ $data->refoundamount }}" style="width: 70px">
								<button class="btn btn-sm btn-success"  onclick="walletUpdate({{ $data->id }},{{ $data->id }}+'input' )">Update</button>
							</td>
							@if($data->type=='IDCODE' || $data->type=='ID Code')
							<td style="padding: 15px;margin:10px;">
								<input type="text" id="{{ $data->id.'input1' }}" value="{{ $data->password }}" placeholder="Enter Game Name" style="width: 110px">
								<button class="btn btn-sm btn-success"  onclick="walletGameName({{ $data->id }},{{ $data->id }}+'input1' )">Update</button>
							</td>
							@endif
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

	function myFunction($id) {
	 	var copyText = document.getElementById($id);
	  	copyText.select();
	  	copyText.setSelectionRange(0, 99999); /*For mobile devices*/
	 	document.execCommand("copy");
	}

	function myFunction1($id) {
	  var copyText1 = document.getElementById($id);
	  /* Select the text field */
	  copyText1.select();
	  copyText1.setSelectionRange(0, 99999); /*For mobile devices*/
	  document.execCommand("copy");
	}

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

	function walletGameName($id, $el_id) {
	    var amount = document.getElementById($el_id).value;
		var id = $id;
		$.ajaxSetup({
			headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    	}
		});
	    $.ajax({
	        type:"POST",
	        url : "{{ route('savegamename') }}",
	        data : {
				amount: amount,
				id: id
			},
	        success : function(response) {
				if(response == 'success')
				{
					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Save Game Name',
					showConfirmButton: false,
					timer: 1500
					})
					document.getElementById($el_id).value = amount;
				}else{
					Swal.fire({
						position: 'top-end',
						icon: 'error',
						title: 'Not Save Game Name',
						showConfirmButton: false,
						timer: 1500
					})
				}
	        }
	    });
	};

	function walletUpdate($id, $el_id) {
	    var amount = document.getElementById($el_id).value;
		var id = $id;
		console.log(amount);
		
		$.ajaxSetup({
			headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    	}
		});
	    $.ajax({
	        type:"POST",
	        url : "{{ route('walletOrderUpdate') }}",
	        data : {
				amount: amount,
				id: id
			},
	        success : function(response) {
				if(response == 'success')
				{
					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'User wallet updated',
					showConfirmButton: false,
					timer: 1500
					})
					document.getElementById($el_id).value = amount;
				}else{
					Swal.fire({
						position: 'top-end',
						icon: 'error',
						title: 'User wallet not updated',
						showConfirmButton: false,
						timer: 1500
					})
				}
	        }
	    });
	};
</script>