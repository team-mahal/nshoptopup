<!-- CkEidtor  -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@include('admin.layouts.header')

<div class="container-fluid min-700px">
	<div class="container-fluid mt-5">
	<!-- Page Heading -->
	<div class="text-right">
		<a href="{{ url('admin/match/prize/create',$id) }}" class="btn btn-success">Create</a>
	</div>
	<br>
	<table class="table table-success">
	  	<thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Lavel</th>
		      <th scope="col">Prize</th>
		      <th scope="col">Name</th>
		      <th scope="col">Action</th>
		    </tr>
	  	</thead> 
	 	<tbody> 
	  		@foreach ($prize as $element)
	  			<tr>
			      	<th scope="row">1</th>
			      	<td>{{ $element->lavel }}</td>
			      	<td>{{ $element->prize }}</td>
			      	<td>{{ $element->match->match_name }}</td>
			      	<td class="d-flex">
						<form action="{{ route('prize.delete',$element->id) }}" method="POST">
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
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card-body">
	        <form method="post" action="/product" enctype="multipart/form-data">
	            <div class="form-row">
	                <div class="col-6">
	                    <label for="name">Name</label>
	                    <input type="text" name="product_name" class="form-control" id="name" aria-describedby="nameInput">
	                    <small id="nameInput" class="form-text text-muted">We'll never share your email with anyone else.</small>
	                </div>
	                <div class="col-6">
	                    <label for="images">Logo</label>
	                    <input type="file" name="logo_img" class="form-control-file" id="images">
	                </div>
	            </div>
	            <div class="form-check">
	              <input type="checkbox" name="for_sale" value="1" class="form-check-input" id="isactiveforsale">
	              <label class="form-check-label" for="isactiveforsale">Is active for sale</label>
	            </div>
	            <div class="form-check">
	                <input type="checkbox" name="for_match" value="1" class="form-check-input" id="isactiveformatch">
	                <label class="form-check-label" for="isactiveformatch">Is active for match</label>
	            </div>
	            <div class="form-check">
	                <input type="checkbox" name="for_top_up" value="1" class="form-check-input" id="isactivefortopup">
	                <label class="form-check-label" for="isactivefortopup">Is active for top up</label>
	            </div>
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </form>
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

@include('admin.layouts.footer')