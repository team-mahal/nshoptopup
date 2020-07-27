<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->

@include('admin.layouts.header')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
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
		  <th scope="col">Package ID</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
        @foreach($datas as $key => $data)
	    	<tr>
		      <td scope="row">{{ $key }}</td>
		      <td  style="">{{$data->name}}</td>
			  <td style="">{{$data->buy_price}}</td>
			  <td style="">{{$data->sale_price}}</td>
			  <td style="">{{$data->package_id}}</td>
		      <td>
				@if ($data->status == 'cancel')
					<select disabled name="status" id="status{{$data->id}}" onchange="myChange({{$data->id}}, this.value)" required>
				@else
					<select enable name="status" id="status{{$data->id}}" onchange="myChange({{$data->id}}, this.value)" required>
				@endif
				  	@if ($data->status == '')
					  <option value="">select once</option>
					@endif
					@if ($data->status == 'pandding')
						<option Selected  value="pandding">pandding</option> 
					@else
						<option value="pandding">pandding</option> 
					@endif
					@if ($data->status == 'complete')
				  		<option Selected  value="complete">complete</option> 
					@else
						<option value="complete">complete</option> 
					@endif
					@if ($data->status == 'cancel')
				  		<option Selected  value="cancel">cancel</option> 
					@else
						<option value="cancel">cancel</option> 
					@endif
				</select>
			  </td>
		    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{ $datas->render() }}


</div>
<!-- /.container-fluid -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@include('admin.layouts.footer')

<script>
function myChange($id, $status) {
    var status = $status;
	var id = $id;
	console.log(status);
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    $.ajax({
        type:"POST",
        url : "{{ route('orderUpdate') }}",
        data : {
			status: status,
			id: id
		},
        success : function(response) {
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Your work has been saved',
				showConfirmButton: false,
				timer: 1500
			})

			if(response == 'cancel')
			{
				$('#status'+id).prop( "disabled", true );
			}
        },
        error: function() {
			Swal.fire({
				position: 'top-end',
				icon: 'error',
				title: 'Error occured',
				showConfirmButton: false,
				timer: 1500
			})
        }
    });
};
</script>

<!-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
