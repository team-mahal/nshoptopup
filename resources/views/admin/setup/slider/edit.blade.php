<!-- CkEidtor  -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@include('admin.layouts.header')

<div class="container-fluid min-700px">

	{{-- Product List  --}}
	<div class="col-xl-12">



		<div class="card mt-5">
			<div class="card-header border-1 bg-gradient-primary">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0 text-white">Slider Edit</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('slider.index') }}" class="btn btn-sm btn-success">Slider List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('slider.update',[$slider->id]) }}" method="post" enctype="multipart/form-data" class="p-4">
				@csrf
				@method('PUT')
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
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
								   <label for="exampleFormControlSelect1">Logo</label>
								   <input type="file" name="logo" class="form-control" style="padding-top: 3px;">
								   <input type="hidden" name="oldlogo">
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <button type="submit" class="btn btn-primary form-control" style="margin-top: 30px;">Update</button>
							 </div>
						</div>
					</div>
			   </form>
		</div>
	</div>
</div>

@include('admin.layouts.footer')