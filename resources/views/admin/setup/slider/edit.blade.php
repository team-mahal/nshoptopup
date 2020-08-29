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
						<h3 class="mb-0 text-white">Blog Edit</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('blog.index') }}" class="btn btn-sm btn-success">Blog List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('blog.update',[$blog->id]) }}" method="post" enctype="multipart/form-data" class="p-4">
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
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="description">Blog Description</label>
								<textarea class="form-control" id="description" name="description" rows="4">{{ $blog->description }}</textarea>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <label>Tiltle</label>
							   <input type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="Enter Title" required>
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
								   <label for="exampleFormControlSelect1">Logo</label>
								   <input type="file" name="logo" class="form-control" style="padding-top: 3px;">
								   <input type="hidden" value="{{ $blog->logo }}" name="oldlogo">
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
<script>
	var editor = CKEDITOR.replace('description');
	editor.on( 'required', function( evt ) {
		editor.showNotification( 'This field is required.', 'warning' );
		evt.cancel();
	});
</script>

@include('admin.layouts.footer')