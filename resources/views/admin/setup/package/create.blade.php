@include('admin.layouts.header')
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Package</h1>
	</div>
	<form action="{{ route('packageStore') }}" method="POST" enctype="multipart/form-data">
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
					<input type="text" name="name" class="form-control" placeholder="Enter Name">
			  	</div>
	 		</div>
			 <div class="col-md-4">
	 			<div class="form-group">
					<label>Buy Price</label>
					<input type="number" name="buy_price" class="form-control" placeholder="Buy Price Name">
			  	</div>
	 		</div>
			 <div class="col-md-4">
	 			<div class="form-group">
					<label>Sale Price</label>
					<input type="number" name="sale_price" class="form-control" placeholder="Sale Price">
			  	</div>
	 		</div>
			 <div class="col-md-4">
	 			<div class="form-group">
					<label>Product</label>
					<select name="product_id" required class="form-control">
						@foreach($product as $key => $data)
							<option value="{{$data->id}}">{{$data->name}} </option>
						@endforeach
					</select>
			  	</div>
	 		</div>
             <div class="col-md-4 mt-0">
	 			<div class="form-group mt-0">
                    <button type="submit" class="btn btn-primary form-control" style="margin-top: 30px;">Submit</button>
			  	</div>
	 		</div>
	 	</div>
	</form>
</div>
<!-- /.container-fluid -->


@include('admin.layouts.footer')


