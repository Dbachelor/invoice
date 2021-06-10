@extends('layouts.app')
@section('content')


<div class="row" style="margin-top: 50px">
  <div class="col-md-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">All Users<button data-target="#addUser" onclick="populateUserForm()" data-toggle="modal" style="margin-left:10px" class="btn btn-sm"><i class="fa fa-plus"></i></button></h3>
      
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-striped table-hover" id="user_table">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>User Type</th>
            <th class="pull-right">Change</th>
          </tr>
        </thead>
        <tbody>
          @if($userView)
          @php $i=1; @endphp
          @foreach($userView as $user)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type}}</td>
            <td class="pull-right">
              @if($user->type == 'normal_user')
              <a data-toggle="modal" class="btn btn-danger" data-target="#approve"  onclick="setID({{$user->id}})"><i class="fa fa-arrows"></i> Change User Type</a>
              @else
              <a data-toggle="modal" class=" disabled btn btn-danger"  onclick=""><i class="fa fa-arrows" data-toggle="tooltip" data-original-title="Edit Organization"></i>  Admin User</a>
              @endif
             <a data-toggle="modal" class="btn btn-info" data-target="#addUser"  onclick="populateUserForm({{$user->id}},'{{$user->name}}','{{$user->email}}','{{$user->type}}')"><i class="fa fa-edit"></i></a>
         
            </td>
           </tr>

        @endforeach
                </tbody>
        @endif
      </table>
  </div>
 
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>








<form method="post" action="{{url('/approve_change')}}">
@csrf
<div class="modal" id="approve">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are You sure You want to change user type?</h4>
      </div>

      <!-- Modal body -->
    
<input type="hidden" name="id" id="u_id" >
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Yes</button>
      </div>

    </div>
  </div>
</div>
</form>


<div class="modal in" id="addUser" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>

      <!-- Modal body -->
      <form method="POST" action='{{route('addUpdateuser')}}'> 
      @csrf
      <div class="modal-body">
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Full Name</label><br>
			<div class="col-sm-12">
				<input type="text" class="form-control col-sm-12" name="name" id="name_user" required="">
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Email</label><br>
			<div class="col-sm-12">
				<input type="text" class="form-control col-sm-12" name="email" id="email_user" required="">
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Password</label><br>
			<div class="col-sm-12">
				<input type="password" class="form-control col-sm-12" name="password" id="password_user" required="">
			</div>
      	</div>
     
      	<div class="form-group row">
      	<label class="col-sm-12" for="">User Type</label><br>
			<div class="col-sm-12">
			    <select class="form-control" name="type">
			        <option value="normal_user">Normal User</option>
			        <option value="admin_user">Admin User</option>
			    </select>
				<input type="hidden" class="form-control col-sm-12" name="user_id" value="0">
			</div>
      	</div>
       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>
</form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
   function setID(id){
        $('#u_id').val(id);
    }

</script>
<!-- page script -->
<script>
  $(function () {
    $('#user_table').DataTable()
    $('#user_').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
  
  function populateUserForm(user_id='',user_name='',user_email='',user_type=''){
      if(user_id!=''){
          $('#password_user').attr('required',false);
      }
      $('#id_user').val(user_id);
      $('#name_user').val(user_name);
      $('#email_user').val(user_email);
      $('#type_user').val(user_type);
  }
</script>
@endsection