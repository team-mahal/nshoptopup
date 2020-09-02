<!-- CkEidtor  -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@include('admin.layouts.header')

<div class="container-fluid min-700px">
  <div class="container-fluid mt-5">
    <!-- Page Heading -->
    {{-- <div class="text-right">
      <a href="{{ url('admin/match/prize/create',$id) }}" class="btn btn-success">Create</a>
    </div> --}}
    <br>
    <table class="table table-success">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User Id</th>
          <th scope="col">Game Name</th>
          <th scope="col">Total Kill</th>
          <th scope="col">Lavel Earn</th>
          <th scope="col">Total Earn</th>
          <th scope="col">Update</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($player as $key => $m)
        <tr>
          <th scope="row">{{ $key+1 }}</th>
          <td>{{ $m->user_id }}</td>
          <td>{{ $m->gamename }}</td>
          <td>{{ $m->total_kill }}</td>
          <td>{{ $m->lavel_earn }}</td>
          <td>{{ $m->total_earn }}</td>
          <td><a href="" type="button" class="btn btn-sm btn-success" data-toggle="modal"
              data-target=".bd-example-modal-sm" data-whatever="@mdo" onclick="setId({{ $m->user_id }})">Update</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <!-- Modal -->
  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Player</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Total Kill</label>
            <input class="form-control" placeholder="Enter kill" type="text" name="total_kill" id="total_kill">
          </div>
          <div class="form-group">
            <label for="">Lavel</label>
            <select name="lavel" id="lavel" class="form-control">
              <option value="0">select once</option>
              @foreach ($prize as $re)
              <option value="{{ $re->prize }}">{{ $re->lavel }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <input type="hidden" name="user_id" id="user_id">
        <input type="hidden" name="match_id" id="match_id" value="{{ $id }}">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="updatePlayer()">Update</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function setId(id){
    document.getElementById('user_id').value = id;
  }
  </script>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('admin.layouts.footer')


<script>
  function updatePlayer() {
    var user_id = $('#user_id').val();
    var match_id = $('#match_id').val();
    var total_kill = $('#total_kill').val();
    var lavel = $('#lavel').val();
	
    $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      type:"POST",
      url : "{{ route('playerPrizeUpdate') }}",
      data : {
        user_id: user_id,
        match_id: match_id,
        total_kill: total_kill,
        lavel: lavel,
      },
      success : function(response) {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Your work has been saved',
              showConfirmButton: false,
              timer: 1500
            })
            location.reload();
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