@include('admin.layouts.header')

<!-- Page content -->
<div class="container-fluid min-700px">

	{{-- Product List  --}}
	<div class="col-xl-12">
		@csrf
		@if ($message = Session::get('success'))
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-success">
				{{ $message }}
			</div>
		</div>
		@endif

		@if (count($errors) > 0)
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-danger">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</div>
		</div>
		@endif


		<div class="card mt-5">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0">Matchs List</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('match.create') }}" class="btn btn-sm btn-primary">Create New</a>
					</div>
				</div>
			</div>
			<?php if(empty($datas)){  ?>
			<div class="alert alert-danger mr-2 ml-2">
				Sorry No Information Found !!!
			</div>
			<?php }else{ ?>
			<div class="table-responsive">
				<!-- Projects table -->
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Game Name</th>
							<th scope="col">Match Name</th>
							<th scope="col">Start Time</th>
							<th scope="col">Room id /Pass</th>
							<th scope="col">Total Join</th>
							<th scope="col">Max Join</th>
							<th scope="col">Entry Fee</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
							<td scope="row">{{ $key+1 }}</td>
							<td style="">{!! $data->product->name !!}</td>
							<td style="">{!! $data->match_name !!}</td>
							<td style="">{!! $data->start_time !!}</td>
							<td style="">{!! $data->room_id !!}/{{ $data->password }}</td>
							<td style="">{!! $data->match_name !!}</td>
							<td style="">{!! $data->max_join !!}</td>
							<td style="">{!! $data->entry_fee !!}</td>
							<td style="">{!! $data->status !!}</td>
							<td style="display: -webkit-inline-box;">
								<a href="{{ route('match.edit',[$data->id]) }}" class="btn btn-success btn-sm">Edit</a>
								<a href="{{ url('admin/match/totalplayer/',$data->id) }}" class="btn btn-success btn-sm">Total User Join</a>
								<a href="{{ url('admin/match/prize',$data->id) }}" class="btn btn-success btn-sm">Prize</a>
								<form action="{{ route('match.destroy',$data->id) }}" method="POST">
									@csrf
                    				@method('DELETE')
									<input style="margin-left: 10px;" type="submit" id="deletebtn"
										class="btn btn-danger btn-sm" value="Delete">
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="justify-content-center">
					{{ $datas->render() }}
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

</div>


@include('admin.layouts.footer')