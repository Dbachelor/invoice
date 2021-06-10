@include('horizontal.header')
<div class="wrapper">
        <div class="container-fluid">
 <div class="row" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Invoices @if(!empty($search)) - Result for {{$search}} @endif
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#inv" style="padding:3px 8px 3px 8px"><i class="fa fa-plus"></i></button>
                        </h3>

                    <!-- /.box-tools -->
                </div>
  

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped table-hover " id="myTable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Company</th>
                            <th>Invoice Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($inv)>0)
                            @foreach($inv as $invo)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{ ($invo->organization) ? $invo->organization->orgName : '' }}</td>
                                    <td>{{$invo->invoiceName}}</td>
                                    <td>
                                        @if($invo->status == 0)
                                            <img src="{{asset('images/yellow.png')}}" style="width: 15px;height: 10px;">
                                        @elseif($invo->status == 1)
                                            <img src="{{asset('images/green.png')}}" style="width: 15px;height: 10px;">
                                        @elseif($invo->status == 2)
                                            <img src="{{asset('images/red.png')}}" style="width: 15px;height: 10px;">
                                        @endif
                                    </td>
                                    <td>{{$invo->created_at}}</td>
                                    <td><a href="{{route('addItem')}}?id={{$invo->id}}" class="btn btn-success"><i class="fa fa-eye" data-toggle="tooltip"
                                                                                data-original-title="View Invoice"></i></a>

                                    @if($invo->status==0)
                                            <a class="disabled btn btn-info" onclick="printFrame({{$invo->id}})"><i
                                                        class="fa fa-arrow-down" data-toggle="tooltip"
                                                        data-original-title="Download Invoice"></i></a>
                                    @else
                                        <a class="btn btn-info" onclick="printFrame({{$invo->id}})"><i
                                                        class="fa fa-arrow-down" data-toggle="tooltip"
                                                        data-original-title="Download Invoice"></i></a>
                                    @endif
                                    </td>

                                </tr>

                                <iframe id="invoice{{$invo->id}}" style="display: none;"
                                        src="{{url('pdf')}}?id={{$invo->id}}"></iframe>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @endif
   </div>  
   
   
   <form method="post" action="{{url('/addInvoice')}}">
    @csrf
    <div class="modal" id="inv">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Quote</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-12" for="">Quote Name</label><br>
                        <div class="col-sm-12">
                            <input type="text" class="form-control col-sm-12" name="invoiceName" id="invoiceName"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12" for="">Talk About the Product</label><br>
                        <div class="col-sm-12">
                            <input placeholder="Optional" type="text" class="form-control col-sm-12"
                                   name="product_description" id="product_description">
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
                    <div class="form-group row">
                        <label class="col-sm-12" for="">Select Banks (2 Max)</label><br>
                        <div class="col-sm-12">
                            <select multiple class="form-control col-sm-12" name="bank_id[]" id="bank_id" required>
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bank_name}} - {{$bank->account_no}} - {{strtoupper($bank->currency)}} - {{strtoupper($bank->type)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create Quote</button>
                </div>

            </div>
        </div>
    </div>
</form>

@include('horizontal.footer')