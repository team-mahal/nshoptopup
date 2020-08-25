<!-- CkEidtor  -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@include('admin.layouts.header')
<link href="{{ asset('admin/css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css">
<div class="container-fluid min-700px">

	{{-- Product List  --}}
	<div class="col-xl-12">



		<div class="card mt-5">
			<div class="card-header border-1 bg-gradient-primary">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0 text-white">Page Edit</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('aboutprivacy.index') }}" class="btn btn-sm btn-success">Page List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('aboutprivacy.update',[$aboutPrivacy->id]) }}" method="post" enctype="multipart/form-data" class="p-4">
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
								<label for="description">Page Content</label>
								<textarea class="form-control" id="content" name="content" rows="4">{{ $aboutPrivacy->content }}</textarea>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <label>Tiltle</label>
							   <input type="text" name="title" value="{{ $aboutPrivacy->title }}" class="form-control" placeholder="Enter Title" required>
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
<script src="{{ asset('admin/js/froala_editor.pkgd.min.js') }}"></script>

@include('admin.layouts.footer')

<script>
	new FroalaEditor('#content', {
	  // Set the image upload parameter.
	  imageUploadParam: 'image_param',
  
	  height: 200,

	  headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
		

	  // Set the image upload URL.
	  imageUploadURL: '{{ route('frolaImageUpload') }}',
  
	  // Additional upload params.
	  imageUploadParams: {id: 'cms',"_token": $('meta[name="csrf-token"]').attr('content')},
  
	  // Set request type.
	  imageUploadMethod: 'POST',
  
	  // Set max image size to 5MB.
	  imageMaxSize: 5 * 1024 * 1024,
  
	  // Allow to upload PNG and JPG.
	  imageAllowedTypes: ['jpeg', 'jpg', 'png'],
  
	  events: {
		'image.beforeUpload': function (images) {
		  // Return false if you want to stop the image upload.
		},
		'image.uploaded': function (response) {
		  // Image was uploaded to the server.
		},
		'image.inserted': function ($img, response) {
		  // Image was inserted in the editor.
		},
		'image.replaced': function ($img, response) {
		  // Image was replaced in the editor.
		},
		'image.error': function (error, response) {
		  // Bad link.
		  if (error.code == 1) { '...' }
  
		  // No link in upload response.
		  else if (error.code == 2) { '...' }
  
		  // Error during image upload.
		  else if (error.code == 3) { '...' }
  
		  // Parsing response failed.
		  else if (error.code == 4) { '...' }
  
		  // Image too text-large.
		  else if (error.code == 5) { '...' }
  
		  // Invalid image type.
		  else if (error.code == 6) { '...' }
  
		  // Image can be uploaded only to same domain in IE 8 and IE 9.
		  else if (error.code == 7) { '...' }
  
		  // Response contains the original server response to the request if available.
		}
	  }
	})
  </script>