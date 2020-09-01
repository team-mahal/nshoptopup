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
						<h3 class="mb-0 text-white">Create Match</h3>
					</div>
					<div class="col text-right">
						<a href="{{ route('match.index') }}" class="btn btn-sm btn-success">Matchs List</a>
					</div>
				</div>
			</div>
			<form action="{{ route('match.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
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
	                    <label for="product">Product</label>
	                    <select name="product_id" class="form-control" id="product">
	                    	<option value="">Select A Product</option>
	                        @foreach ($product as $element)
	                            <option value="{{ $element->id }}" selected>{{ $element->name }}</option>
	                       	@endforeach
	                    </select>
	                </div>
	                <div class="col-6">
	                    <label for="map">Maps:</label>
	                    <input type="text" name="map_id" class="form-control" placeholder="map">
	                </div>
	                <div class="col-6">
	                    <label for="name">Start At:</label>
	                    <input
	                        type="date"
	                        name="start_at"
	                        class="form-control"
	                        id="start_at"
	                        value=""
	                        aria-describedby="start_at">
	                </div>
	                <div class="col-6">
	                    <label for="name">Start Time:</label>
	                    <input
	                        type="text"
	                        name="start_time"
	                        class="form-control"
	                        id="start_time"
	                        value=""
	                        aria-describedby="start_at">
	                </div>
	                <div class="col-6">
	                    <label for="name">Match Name:</label>
	                    <input
	                        type="text"
	                        name="match_name"
	                        class="form-control"
	                        id="match_name"
	                        value=""
	                        aria-describedby="match_name">
	                </div>
	                <div class="col-6">
	                    <label for="name">Type :</label>
	                    <select name="type" class="form-control">
	                        <option value="">Select One</option>
	                            @if(old('type', '') == 'solo')
	                                <option value="solo" selected>Solo</option>
	                                <option value="duo">Duo</option>
	                                <option value="squad">Squad</option>
	                            @elseif(old('type', '') == 'duo')
	                                <option value="solo">Solo</option>
	                                <option value="duo" selected>Duo</option>
	                                <option value="squad">Squad</option>
	                            @elseif(old('type', '') == 'squad')
	                                <option value="solo">Solo</option>
	                                <option value="duo">Duo</option>
	                                <option value="squad" selected>Squad</option>
	                            @else
	                                <option value="solo">Solo</option>
	                                <option value="duo">Duo</option>
	                                <option value="squad">Squad</option>
	                            @endif
	                    </select>
	                </div>
	                <div class="col-6">
	                    <label for="name">Entry Fee:</label>
	                    <input
	                        type="number"
	                        name="entry_fee"
	                        class="form-control"
	                        id="entry_fee"
	                        value="{{ old('entry_fee', '') }}"
	                        aria-describedby="entry_fee">
	                </div>
	                <div class="col-6">
	                    <label for="name">Perkill:</label>
	                    <input
	                        type="text"
	                        name="perkill"
	                        class="form-control"
	                        id="perkill"
	                        value="{{ old('perkill', '') }}"
	                        aria-describedby="perkill">
	                </div>
	                <div class="col-6">
	                    <label for="name">Max Join:</label>
	                    <input
	                        type="text"
	                        name="max_join"
	                        class="form-control"
	                        id="max_join"
	                        aria-describedby="max_join"
	                        value="{{ old('max_join', '') }}">
	                </div>
	                <div class="col-6">
	                    <label for="name">Min Join:</label>
	                    <input
	                        type="text"
	                        name="min_join"
	                        class="form-control"
	                        id="min_join"
	                        aria-describedby="min_join"
	                        value="{{ old('min_join', '') }}">
	                </div>
	                <div class="col-6">
	                    <label for="name">Total Prize:</label>
	                    <input
	                        type="text"
	                        name="total_prize"
	                        class="form-control"
	                        id="total_prize"
	                        aria-describedby="total_prize"
	                        value="{{ old('total_prize', '') }}">
	                </div>
	                <div class="col-6">
	                    <label for="name">Platform:</label>
	                    <select name="platform" class="form-control" value="{{ old('platform', '') }}">
	                        <option value="">Select One</option>
	                        @if(old('platform', '') == 'all')
	                            <option value="all" selected>All</option>
	                            <option value="mobile">Mobile</option>
	                            <option value="pc">PC</option>
	                        @elseif(old('platform', '') == 'mobile')
	                            <option value="all">All</option>
	                            <option value="mobile" selected>Mobile</option>
	                            <option value="pc">PC</option>
	                        @elseif(old('platform', '') == 'pc')
	                            <option value="all">All</option>
	                            <option value="mobile">Mobile</option>
	                            <option value="pc" selected>PC</option>
	                        @else
	                            <option value="all">All</option>
	                            <option value="mobile">Mobile</option>
	                            <option value="pc">PC</option>
	                        @endif
	                    </select>
	                </div>
	                <div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary form-control"
								style="margin-top: 30px;">Submit</button>
						</div>
					</div>
            	</div>
			</form>
		</div>
	</div>
</div>

@include('admin.layouts.footer')