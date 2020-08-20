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
						<h3 class="mb-0 text-white">Product Create</h3>
					</div>
					<div class="col text-right">
						<a href="{{ url('/admin/product') }}" class="btn btn-sm btn-success">Product List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('productStore') }}" method="POST" enctype="multipart/form-data" class="p-4">
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
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        </div>
                    </div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Name</label>
							<input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Name" required>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
							<label>IS Shop </label>
							<select name="is_shop" id="is_shop" class="form-control">
								@if(old('is_admin') == 0)
								<option value="0" selected>Not Shop</option>
								@else
								<option value="0">Not Shop</option>
								@endif
								@if(old('is_admin') == 1)
								<option value="1" selected>Shop</option>
								@else
								<option value="1">Shop</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group" id="sh_tag_line">
							<label>Tag Line</label>
							<input type="text" name="tag_line" class="form-control" placeholder="Enter Tag Line">
						</div>
						<div class="form-group" id="sh_buy_price">
							<label>Buy Price</label>
							<input type="text" value="{{ old('buy_price') }}" name="buy_price" class="form-control" placeholder="Enter Buy Price">
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group" id="sh_type">
							<label>Type</label>
							<select name="type" id="type" class="form-control">
								@if(old('type') == 0)
								<option value="0" selected>Type-1</option>
								@else
								<option value="0">Type-1</option>
								@endif
								@if(old('type') == 1)
								<option value="1" selected>Type-2</option>
								@else
								<option value="1">Type-2</option>
								@endif
							</select>
						</div>
						<div class="form-group" id="sh_sale_price">
							<label>Sale Price</label>
							<input type="text" value="{{ old('sale_price') }}" name="sale_price" class="form-control" placeholder="Enter Sale Price">
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Logo</label>
							<input type="file" value="{{ old('logo') }}" name="logo" class="form-control" style="padding-top: 10px;">
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
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

<script>
	var editor = CKEDITOR.replace('description');
	editor.on( 'required', function( evt ) {
		editor.showNotification( 'This field is required.', 'warning' );
		evt.cancel();
	});
</script>

<script>
	$('#sh_buy_price').hide();
	$('#sh_sale_price').hide(); 
	$(function() {
		$('#is_shop').change(function(){
			if($('#is_shop').val() == 1) {
				$('#sh_buy_price').show();
				$('#sh_sale_price').show(); 
				$('#sh_tag_line').hide();
				$('#sh_type').hide(); 
			} else {
				$('#sh_buy_price').hide();
				$('#sh_sale_price').hide(); 
				$('#sh_tag_line').show();
				$('#sh_type').show(); 
			} 
		});
	});
</script>

@include('admin.layouts.footer')