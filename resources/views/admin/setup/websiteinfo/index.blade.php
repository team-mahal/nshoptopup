@include('admin.layouts.header')

<!-- Page content -->
<div class="container-fluid min-700px">

	{{-- Product List  --}}
	<div class="col-xl-12">
		<div class="card mt-5">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0">Website Info</h3>
					</div>
				</div>
			</div>
			<?php if(empty($data)){  ?>
			<div class="alert alert-danger mr-2 ml-2">
				Sorry No Information Found !!!
			</div>
			<?php }else{ ?>
			<div class="table-responsive">
				<!-- Projects table -->
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">Facebook</th>
							<th scope="col">Youtube</th>
							<th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $data->fb }}</td>
							<td>{{ $data->youtube }}</td>
							<td> {{ $data->email }}</td>
							<td> {{ $data->phone }}</td>
							<td style="display: -webkit-inline-box;">
								<a href="{{ route('websiteinfo.edit',[$data->id]) }}" class="btn btn-success btn-sm">Edit</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php } ?>
		</div>
	</div>

</div>


@include('admin.layouts.footer')