@include('admin.layouts.header')

<div class="container-fluid min-700px">
	{{-- Product List  --}}
	<div class="col-xl-12">
		<div class="card mt-5">
			<div class="card-header border-1 bg-gradient-primary">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0 text-white">Create Slider</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('notice.index') }}" class="btn btn-sm btn-success">notice List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
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
					<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-danger">
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Notice</label>
							<textarea name="notice" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary form-control"
								style="margin-top: 30px;">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@include('admin.layouts.footer')