@extends('layouts.app')
@section('content')


	
<div class="row" style="margin-top: 50px">
  <div class="col-md-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Organizations</h3>     
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table class="table table-striped table-hover" id="org_table">
    <thead>
      <tr>
      	<th>S/N</th>
        <th>Company Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>  </th>
        <th>
        	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#org"><i class="fa fa-plus"></i></button>
        </th>
      </tr>
    </thead>
    <tbody>
    	@if($org)
      @php $i=1; @endphp
    	@foreach($org as $organ)
      <tr>
      	<td>{{$i++}}</td>
      	<td>{{$organ->orgName}}</td>
      	<td>{{$organ->orgAddress}}</td>
      	<td>{{$organ->orgEmail}}</td>
      	<td>
      		<a href="#" class="btn btn-danger btn-sm pull-right" data-toggle="tooltip" data-original-title="Delete Organization" onclick="delete_org({{$organ->id}})"><i class="fa fa-remove"></i></a>
      		<a data-toggle="modal" class="btn btn-info btn-sm pull-right"  onclick="load_org({{$organ->id}})"><i class="fa fa-pencil" data-toggle="tooltip" data-original-title="Edit Organization"></i></a>
          <a href="{{url('manageInvoice')}}?org_id={{$organ->id}}" data-toggle="tooltip" data-original-title="View Invoices" class="btn btn-success pull-right"  ><i class="fa fa-eye">  </i></a>
      	</td>
        <td></td>
        
         
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  </div>
 
 </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<form method="post" action="{{url('/addOrg')}}">
@csrf
<div class="modal" id="org">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Organization</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Organization Name</label><br>
			<div class="col-sm-12">
				<input type="text" class="form-control col-sm-12" name="orgName" id="orgName" required>
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Organization Address</label><br>
			<div class="col-sm-12">
				<input type="text" class="form-control col-sm-12" name="orgAddress" id="orgAddress" required>
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Organization Email</label><br>
			<div class="col-sm-12">
				<input type="text" class="form-control col-sm-12" name="orgEmail" id="orgEmail" required>
			</div>
      	</div>
      	<div class="form-group row">
          <label class="col-sm-12" for="">Country</label><br>
        <div class="col-sm-12">
          <input type="text" class="form-control col-sm-12" name="country" id="country" required>
        </div>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>

    </div>
  </div>
</div>
</form>


<div class="modal" id="manage_org">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Organization</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body"> 
      	<div id="manageorg">   </div> 
      </div>

    </div>
  </div>
</div>




@endsection
@section('script')
<script type="text/javascript">
	$(function()
	{

	});

	function load_org(id)
	{
		$('#manageorg').load("{{url('organization')}}/modals/editOrganization?id="+id);
		$('#manage_org').modal('show');
	}
</script>
<script>
  $(function () {
    $('#org_table').DataTable()
    $('#user_').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection