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
          <th scope="col">User Id</th>
          <th scope="col">Game Name</th>
          <th scope="col">Total Kill</th>
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
              <td>{{ $m->total_earn }}</td>
              <td><a href=""  class="btn btn-sm btn-success"  data-toggle="modal" data-target="#exampleModalPlayerUpdate" data-whatever="@mdo">Update</a></td>
            </tr>
       @endforeach
      </tbody>
    </table>
</div>



</div>

@include('admin.layouts.footer')