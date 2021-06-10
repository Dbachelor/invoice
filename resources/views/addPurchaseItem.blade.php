@extends('layouts.app')
@section('content')




	<div>
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> SnapNet, Limited
            <small class="pull-right">Date: @php echo date("d/m/Y"); @endphp</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Snapnet Limited.</strong><br>
            1B Abayomi Shonuga Street<br>
            Lekki Phase 1, Lagos<br>
            Phone: +234(703)4076619<br>
            Email: info@snapnet.com.ng
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          
          @if($organ_get)
          <address>
          	{{$organ_get->orgAddress}}
		  </address>
		  @endif
		  
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         
          <b>#P.O No:@if($purchaseNum) {{$purchaseNum->number}}  @endif</b><br>
          
          <br>
          <!--<b>Payment Due:</b>@php echo date('d/m/Y', strtotime('+1 months'));  @endphp<br>-->
          <b>Account:</b> 0073821499

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-hover">

            <thead>
            <tr>
              <th>S/N</th>
              <th>Product #</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Unit Cost</th>
              <th>Total</th>
              <th>Action</th>
              <th><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#inv"><i class="fa fa-plus"></i></button></th>
              <th></th>
              {{-- <th></th> --}}
              
            </tr>
            </thead>
            <tbody>
                @php $dtotal=0; @endphp
                @if($items)
                
                @foreach ($items as $item)
                
                @php $total=0;$i=1; @endphp
                @php $total += $item->quantity * $item->unitcost; @endphp   
                @php $dtotal += $item->total @endphp
		    	
		       <tr>
              <td>{{$i++}}</td>
              <td> POI-@php echo rand(100,1000) @endphp</td>
              <td>{{$item->description}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->unitcost}}</td>
              <td>{{number_format($total,2 )}}</td>
              <td>
                <a href="#" class="btn btn-default" onclick="load_org({{$item->id}})"><i class="fa fa-pencil"></i></a>
              </td>
             	
               <td>
               
           <form action="{{ route('deletePurchase',$item->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                </form>
               </td> 

            </tr>
            
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     <div class="row">
        <div class="col-xs-5 pull-right">
          <div class="table-responsive">
            <table class="table">
             <tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{number_format($dtotal ,2) }}</td>
              </tr>
              <tr>
                <th>Tax Rate(8.6%):</th>
                <td>{{number_format($dtotal* 0.086 ,2) }}</td>
              </tr>
              <tr>
              	<th>TOTAL:</th>
              	<td>
                <u><strong>
                    {{number_format(($dtotal * 0.086) + ($dtotal) ,2) }}   
                
                    </strong></u></td>
              </tr>
            
            
            </table>
           
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        	
        	
        	<a class="btn btn-primary pull-right" onclick="printFrame('invoiceDownload')" style="margin-right: 5px;">
            <i class="fa fa-print"></i> Print Purchase Order
          </a>
          {{-- <a class="btn btn-success pull-right" href="{{url('download')}}?id={{$invoice->id}}" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Download Invoice
          </a> --}}
          {{-- <a class="btn btn-success pull-right" href=""  style="margin-right: 5px;">
            <i class="fa fa-envelope"></i> Email Invoice
          </a> --}}
        	{{-- @else 
         @if(\Auth::user()->type != 'admin_user')
          <a class="btn btn-success pull-right" href="" style="margin-right: 5px;">
            <i class="fa fa-envelope"></i> 	Submit For Review
          </a>
          @endif
          @endif
          
          @if(\Auth::user()->type == 'admin_user' || 'normal_user')
          <a href="" class="btn btn-danger pull-right" onclick="printFrame('downloadQuote')" style="margin-right: 5px;"> <i class="fa fa-files-o"></i>    Generate Quote</a>
          @endif --}}
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
   	</div>
   	<iframe id="invoiceDownload" style="display: none;" src="{{url('popdf')}}?id={{$_GET['id']}}"></iframe>
    {{-- <iframe id="downloadQuote" style="display: none;" src="{{url('subQuote')}}?id={{$_GET['id']}}"></iframe> --}}
    @endif	


<form method="post" action="{{url('/addPurchaseItems')}}">
@csrf
<div class="modal" id="inv">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<!-- <input type="hidden" class="form-control col-sm-12" name="orgid" id="orgid" value=""> -->
        
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Product Description</label><br>
			<div class="col-sm-12">
			<input type="text" class="form-control col-sm-12" name="description" id="" required>
			</div>
          </div>
          
          <input type="hidden" name="poid" value="{{$po_id}}">
          
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Quantity</label><br>
			<div class="col-sm-12">
			<input type="number" class="form-control col-sm-12" name="quantity" id="" required>
			</div>
          </div>
          
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Unit Cost</label><br>
			<div class="col-sm-12">
			<input type="number" class="form-control col-sm-12" name="unitcost" id="" required>
			</div>
      	</div>
      	
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create Item</button>
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
        <h4 class="modal-title">Edit Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body"> 
      	<div id="manageorg">   </div> 
      </div>

    </div>
  </div>
</div>

<form method="post" action="{{url('/approve_invoice')}}">
@csrf
<div class="modal" id="approve">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are You sure You want to approve Quote?</h4>
      </div>

      <!-- Modal body -->
    
{{-- <input type="hidden" name="id" id="id" value="{{$_GET['id']}}"> --}}
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

	function delete_item(id) {
$({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
            });
            $({ 
           type: "POST", 
           url:"{{url('delete')}}", 
           data:
           {id:id
           },
           success: function(result) {
           location.reload();
           }
       }); 
          }
	
	function load_org(id)
	{
		$('#manageorg').load("{{url('organization')}}/modals/editPurchase?id="+id);
		$('#manage_org').modal('show');
	}

function printFrame(id) {
            var frm = document.getElementById(id).contentWindow;
            frm.focus();// focus on contentWindow is needed on some ie versions
            frm.print();
            return false;
}
</script>


@endsection