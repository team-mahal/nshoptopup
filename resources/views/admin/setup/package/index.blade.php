@include('admin.layouts.header')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Package List</h1>
        <a href="{{ url('/admin/packageCreate') }}" class="btn btn-success">Create</a>
	</div>
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

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Name</th>
		  <th scope="col">Buy Price</th>
		  <th scope="col">Sale Price</th>
		  <th scope="col">Product ID</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
        @foreach($data as $key => $data)
	    	<tr>
		      <td scope="row">{{ $key }}</td>
		      <td  style="">{{$data->name}}</td>
			  <td style="">{{$data->buy_price}}</td>
			  <td style="">{{$data->sale_price}}</td>
			  <td style="">{{$data->product_id}}</td>
		      <td style="display: -webkit-inline-box;">
		      	<a href="{{ route('packageEdit',[$data->id]) }}" class="btn btn-success btn-sm">Edit</a>
		      	<!-- <a href="productDelete/{{ $data->id }}" class="btn btn-danger btn-sm">Delete</a> -->
                  <form method="get" action="{{ route('packageDelete',[$data->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('get') }}
                    <input style="margin-left: 10px;" type="submit" id="deletebtn" class="btn btn-danger btn-sm" value="Delete">
                </form>
		      </td>
		    </tr>
	    @endforeach
	  </tbody>
	</table>

</div>
<!-- /.container-fluid -->


@include('admin.layouts.footer')
