@include('admin.layouts.header')

<div class="container-fluid min-700px">
	{{-- Product List  --}}
	<div class="col-xl-12">
		<div class="card mt-5">
			<div class="card-header border-1 bg-gradient-primary">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0 text-white">Edit Package</h3>
					</div>
					<div class="col text-right">
						<a href="{{ url('/admin/package') }}" class="btn btn-sm btn-success">Package List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('packageUpdate',[$package->id]) }}" method="POST" enctype="multipart/form-data" class="p-4">
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
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <label>Name</label>
							   <input required type="text" name="name" value="{{ $package->name }}" class="form-control" placeholder="Enter Name">
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <label>Buy Price</label>
							   <input required type="number" value="{{ $package->buy_price }}" name="buy_price" class="form-control" placeholder="Buy Price Name">
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <label>Sale Price</label>
							   <input required type="number" value="{{ $package->sale_price }}" name="sale_price" class="form-control" placeholder="Sale Price">
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="form-group">
							   <label>Product</label>
							   <select name="product_id" required class="form-control">
								   @foreach($product as $key => $data)
									   @if ($package->product_id == $data->id)
										   <option selected value="{{$data->id}}">{{$data->name}} </option>
									   @else
										   <option value="{{$data->id}}">{{$data->name}} </option>
									   @endif
								   @endforeach
							   </select>
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




<script>
document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
        inputValue = input.value;

    hiddenInput.value = inputValue;

    for(var i = 0; i < options.length; i++) {
        var option = options[i];

        if(option.innerText === inputValue) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
});
</script>