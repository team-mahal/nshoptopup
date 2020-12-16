<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

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
						<h3 class="mb-0">Shop Order Detials</h3>
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
							<th scope="col">Buy Price</th>
                            <th scope="col">Sale Price</th>
							<th scope="col">Quantity</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Details</th>
							<th scope="col">Edit</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
                            <td scope="row">{{ $key+1 }}</td>
							<td style="">{{$data->user_id}}</td>
                            <td style="">{{$data->sale_price}}</td>
                            <td style="">{{$data->buy_price}}</td>
                            <td style="">{{$data->quantity}}</td>
                            <td style="">@if($data->prodouct){{ $data->prodouct->name }}@endif</td>
                            <td style="">{{ $data->details }}</td>
							<td style=""><a href="" class="btn btn-success btn-sm" onclick="loaddata({{ $data->id }})" data-toggle="modal" data-target="#exampleModal">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<?php } ?>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					       	<input type="hidden" name="product_id" id="product_id">
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary" onclick="submit()">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>
		</div>
	</div>
</div>
<script>
	function loaddata(id) {
		$.ajax({
			url: "{{ route('findorderdetails') }}",
			data: {id: id},
		})
		.done(function(re) {
			$("#product_id").val(re.id)
			$("#description").val(re.details)
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
		});
	}

	function submit() {
		var id = $("#product_id").val();
		var desc = $("#description").val();
		$.ajax({
			url: "{{ route('updateorderdetails') }}",
			data: {id: id,desc:desc},
			type: 'POST',
			 headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
		})
		.done(function(re) {
			location.reload();
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
		});
	}
</script>
{{-- <script>
	var editor = CKEDITOR.replace('description');
	editor.on( 'required', function( evt ) {
		editor.showNotification( 'This field is required.', 'warning' );
		evt.cancel();
	});
</script> --}}
@include('admin.layouts.footer')

