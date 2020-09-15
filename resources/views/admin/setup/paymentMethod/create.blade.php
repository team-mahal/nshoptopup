@include('admin.layouts.header')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<div class="container-fluid min-700px">
	{{-- Product List  --}}
	<div class="col-xl-12">
		<div class="card mt-5">
			<div class="card-header border-1 bg-gradient-primary">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0 text-white">Payment Method Create</h3>
					</div>
					<div class="col text-right">
						<a href="{{ url('/admin/paymentMethod') }}" class="btn btn-sm btn-success">Payment Method List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('paymentMethodStore') }}" method="POST" enctype="multipart/form-data" class="p-4">
				@csrf
				@if ($message = Session::get('success'))
				<div class="row">
					<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-success">
						{{ $message }}
					</div>
				</div>
				@endif

				@if (count($errors) > 0)
				<div class="row">
					<div class="col-lg-3 col-md-8col-sm-12 mt-2 alert alert-danger">
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
						   <label>Name</label>
						   <input type="text" name="name" class="form-control" placeholder="Enter Name">
						 </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
						   <label>Discount</label>
						   <input type="text" name="discount" class="form-control" placeholder="Enter Discount">
						 </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
						   <label>Currency</label>
						   <input type="text" name="currency" class="form-control" placeholder="Enter currency">
						 </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
						   <label>Number</label>
						   <input type="text" name="number" class="form-control" placeholder="Enter number">
						 </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
							   <label for="exampleFormControlSelect1">Logo</label>
							   <input type="file" name="logo" class="form-control" style="padding-top: 10px;">
						 </div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-12">
						<div class="form-group">
						   <button type="submit" class="btn btn-primary form-control" style="margin-top: 30px;">Submit</button>
						 </div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var editor = CKEDITOR.replace('description');
	editor.on( 'required', function( evt ) {
		editor.showNotification( 'This field is required.', 'warning' );
		evt.cancel();
	});
</script>
@include('admin.layouts.footer')