<!-- CkEidtor  -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@include('admin.layouts.header')

<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800">Setup Page</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Prize</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{ url('admin/prize/createprize') }}" enctype="multipart/form-data">
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
            <div class="form-row">
                <div class="col-6">
                    <label for="match_id">Match</label>
                    <div>
                    	<input type="" disabled value="{{ $match->match_name }}" class="form-control">
                    </div>
                   	<input type="text" name="match_id" value="{{ $match->id }}" style="visibility: hidden;">
                </div>
                <div class="col-6">
                    <label for="name">Lavel:</label>
                    <input
                        type="text"
                        name="lavel"
                        class="form-control"
                        id="lavel"
                        aria-describedby="lavel">
                </div>
                <div class="col-6">
                    <label for="prize">Prize:</label>
                    <input
                        type="text"
                        name="prize"
                        class="form-control"
                        id="prize"
                        aria-describedby="prize">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/match" class="btn btn-success">Cancel</a>
        </form>
    </div>
  </div>

</div>

@include('admin.layouts.footer')