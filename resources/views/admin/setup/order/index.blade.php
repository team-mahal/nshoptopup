
@include('admin.layouts.header')
<!-- Page content -->
<div class="container-fluid min-700px">
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
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Buy Price</th>
							<th scope="col">Sale Price</th>
							<th scope="col">Package ID</th>
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
							<td style="">{{$data->package_id}}</td>
							<td>
								@if ($data->status == 'cancel')
								<select disabled name="status" id="status{{$data->id}}"
									onchange="myChange({{$data->id}}, this.value)" required>
									@else
									<select enable name="status" id="status{{$data->id}}"
										onchange="myChange({{$data->id}}, this.value)" required>
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

			if(response == 'cancel')
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
