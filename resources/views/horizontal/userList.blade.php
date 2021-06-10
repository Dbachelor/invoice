@include('horizontal.header')

<div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h5 class="page-title"></h5>
                        
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><span class="text-danger">S</span>nap<span class="text-danger">N</span>et</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="box-body">
            <a data-toggle="collapse" style="font-family:times new roman"class="btn btn-secondary btn-lg" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="populateUserForm()">Add User &nbsp <i class="fa fa-plus"></i> </a>
            <div class="collapse" id="collapseExample">
  <div class="card card-body">
   
      <form method="POST" action="{{route('addUpdateuser')}}"> 
      @csrf
      
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
      <div class="modal-fooer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>
</form>
   

</div>
</div>
         
      <table class="table table-striped table-hover table-sm" id="myTable">
        <thead class="bg-dark text-white">
          <tr>
            <th>S/N</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Date Created</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white" style='font-weight:bold'>
          @if($userView)
          @php $i=1; @endphp
          @foreach($userView as $user)
          <tr>
            <td>{{$i++}}</td>
            <td>{{ucwords($user->name)}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type}}</td>
            <th>{{$user->created_at}}</td>
            <td class="pull-right">
              @if($user->type == 'normal_user')
              <a data-toggle="modal" class="btn btn-primary text-white" data-target="#approve"  onclick="setID({{$user->id}})"><i class="fa fa-arrows"></i> Update</a>
              <a  class="btn btn-danger"   onclick="promptDelete({{$user->id}})"><i class="fa fa-times"></i> Delete</a>
              @else
              <a data-toggle="modal" class=" disabled btn btn-primary"  onclick=""><i class="fa fa-arrows" data-toggle="tooltip" data-original-title="Edit Organization"></i>  Admin User</a>
              @endif
            {{-- <a data-toggle="modal" class="btn btn-info" data-target="#addUser"  onclick="populateUserForm({{$user->id}},'{{$user->name}}','{{$user->email}}','{{$user->type}}')"><i class="fa fa-edit"></i></a>
         --}}
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
function promptDelete(id){
  swal({
  title: "Are You Sure",
  text: "Once deleted, you will not be able to recover this aacount!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    var obj = new XMLHttpRequest();
    obj.onreadystatechange = function(){
        if(obj.readyState == 4){
            if(obj.responseText == "account deleted"){
            swal("Account Has Been Deleted", {
      icon: "success",
    });
    setTimeout(function(){ window.location="{{ route('userList') }}"; }, 2000);
            }else{
                swal("Failed to delete user please try again or contact support")
            }
        }
    }
    obj.open("GET", "{{route('deleteUserById') }}?id=" + id, true)
    obj.send();


    
  } else {
    swal("operation aborted");
  }
});
}
  
  function populateUserForm(){
      if(user_id!=''){
          $('#password_user').attr('required',false);
      }
      $('#id_user').val(user_id);
      $('#name_user').val(user_name);
      $('#email_user').val(user_email);
      $('#type_user').val(user_type);
  }
</script>

@include('horizontal.footer')