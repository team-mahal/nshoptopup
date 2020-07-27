@include('admin.layouts.header')
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Payment Method</h1>
	</div>
	<form action="{{ route('paymentMethodUpdate',[$paymentMethod->id]) }}" method="POST" enctype="multipart/form-data">
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
	 		<div class="col-md-3">
	 			<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" value="{{ $paymentMethod->name }}" class="form-control" placeholder="Enter Name">
			  	</div>
	 		</div>
			 <div class="col-md-3">
	 			<div class="form-group">
					<label>Number</label>
					<input type="text" name="number" value="{{ $paymentMethod->number }}" class="form-control" placeholder="Enter Name">
			  	</div>
	 		</div>
	 		<div class="col-md-3">
	 			<div class="form-group">
					    <label for="exampleFormControlSelect1">Logo</label>
					    <input type="file" name="logo" class="form-control" style="padding-top: 3px;">
                        <input type="hidden" value="{{ $paymentMethod->logo }}" name="oldlogo">
			  	</div>
	 		</div>
             <div class="col-md-2">
	 			<div class="form-group">
                    <button type="submit" class="btn btn-primary form-control" style="margin-top: 30px;">Update</button>
			  	</div>
	 		</div>
	 	</div>
	</form>
</div>
<!-- /.container-fluid -->


@include('admin.layouts.footer')