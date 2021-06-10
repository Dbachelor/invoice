@include('horizontal.header')
<div class="wrapper">
        <div class="container-fluid">
<div class="row" style="margin-top: 50px">
    <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Purchase Orders</h3>     
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped table-hover" id="user_table">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Company Name</th>
              <th>P.O Name</th>
              {{-- <th>Status</th> --}}
              <th>Created At</th>
              <th>Action</th>
              <th> <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#por"><i class="fa fa-plus"></i> </button></th>
            </tr>
          </thead>
          <tbody>
            @if($data)
            @php $i=1; @endphp
            @foreach ($data as $data )
            
            
            <tr>
              <td>{{$i++}}</td>
              <td>@if($data->organization){{$data->organization->orgName}}@endif</td>
              <td>{{$data->name}}</td>
              {{-- <td>
                @if($data->status == 0)
                <img src="{{asset('images/green.png')}}" style="width: 15px;height: 10px;">
                @elseif($data->status == 1)
                <img src="{{asset('images/green.png')}}" style="width: 15px;height: 10px;">
                @elseif($data->status == 2)
                <img src="{{asset('images/red.png')}}" style="width: 15px;height: 10px;">
                @endif
              </td> --}}
              <td>{{$data->created_at}}</td>
              <td><button  class="btn btn-success btn-sm" onclick="loadItem({{$data->id}})"><i class="fa fa-eye"></i></button></td>
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

  <form method="post" action="{{url('/addPurchase')}}">
    @csrf
    <div class="modal" id="por">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add New Purchase Order</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group row">
              <label class="col-sm-12" for="">Purchase Order Name</label><br>
                <div class="col-sm-12">
                    <input type="text" class="form-control col-sm-12" name="name" id="name" required>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-12" for="">Purchase Order Number</label><br>
                  <div class="col-sm-12">
                      <input type="text" class="form-control col-sm-12" name="number" id="number" required>
                  </div>
            </div>
              
              <div class="form-group row">
              <label class="col-sm-12" for="">Organization Name</label><br>
                <div class="col-sm-12">
                    <select class="form-control col-sm-12" name="orgid" id="orgid" required>
                        <option value="">Select Organization</option>
                        @if($organ_ddl)
                            @foreach($organ_ddl as $organ)
                                <option value="{{$organ->id}}">{{$organ->orgName}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
              </div>
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Create P.O</button>
          </div>
    
        </div>
      </div>
    </div>
    </form>

</div>
</div>

@section('script')

<script>
    function loadItem(id)
	{
		window.location.replace("/viewPurchaseItems?id="+id);
		
	}
</script>

@include('horizontal.footer')