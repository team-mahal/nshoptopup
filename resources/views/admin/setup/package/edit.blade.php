@include('admin.layouts.header')
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
	</div>
	<form action="{{ route('packageUpdate',[$package->id]) }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success col-md-8">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger col-md-8">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
	 	<div class="row">
	 		<div class="col-md-4">
	 			<div class="form-group">
					<label>Name</label>
					<input required type="text" name="name" value="{{ $package->name }}" class="form-control" placeholder="Enter Name">
			  	</div>
	 		</div>
			 <div class="col-md-4">
	 			<div class="form-group">
					<label>Buy Price</label>
					<input required type="number" value="{{ $package->buy_price }}" name="buy_price" class="form-control" placeholder="Buy Price Name">
			  	</div>
	 		</div>
			 <div class="col-md-4">
	 			<div class="form-group">
					<label>Sale Price</label>
					<input required type="number" value="{{ $package->sale_price }}" name="sale_price" class="form-control" placeholder="Sale Price">
			  	</div>
	 		</div>
			 <div class="col-md-4">
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
             <div class="col-md-4">
	 			<div class="form-group">
                    <button type="submit" class="btn btn-primary form-control" style="margin-top: 30px;">Update</button>
			  	</div>
	 		</div>
	 	</div>
	</form>
</div>
<!-- /.container-fluid -->


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