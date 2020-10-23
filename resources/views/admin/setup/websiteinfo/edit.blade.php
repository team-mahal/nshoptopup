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
						<h3 class="mb-0 text-white">Website Info Edit</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('websiteinfo.index') }}" class="btn btn-sm btn-success">Website Info</a>
					</div>
				</div>
			</div>
			<form action="{{ route('websiteinfo.update',[$websiteinfo->id]) }}" method="post" class="p-4">
				@csrf
				@method('PUT')
					<div class="row">
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="fb">Facebook Link</label>
								<input class="form-control" id="fb" name="fb" value="{{ $websiteinfo->fb }}" required>
							</div>
						</div>
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="youtube">Youtube Link</label>
								<input class="form-control" id="youtube" name="youtube" value="{{ $websiteinfo->youtube }}" required>
							</div>
						</div>
						<div class="col-lg-2 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" id="email" name="email" value="{{ $websiteinfo->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
							</div>
						</div>
						<div class="col-lg-2 col-md-12 col-sm-12">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input class="form-control" id="phone" name="phone" value="{{ $websiteinfo->phone }}" pattern="^(?:\+?88)?01[13-9]\d{8}$">
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-12">
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