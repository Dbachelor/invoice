@include('horizontal.header')

<div class="wrapper">
        <div class="container-fluid">
	<div>
    <th style="float:right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inv">New Item &nbsp<i class="fa fa-plus"></i></button></th>
            
    <!-- Content Header (Page header) -->
    
    <!-- Main content --><hr>
    <section class="invoice" style="margin-top:40px">
     

    <div class="row">
    <div class="col-lg-6">
    <h3 class="leftman"><i class="fa fa-globe"></i> SnapNet, Limited</h3>
    </div>

    <div class="col-lg-6 pull-right " style="float:right; text-align:right; margin-top:10px">
    <h6 class="rightman"><i class="fa fa-globe"></i><u> signed : {{ date('Y-m-d') }}</u>&nbsp &nbsp &nbsp</h6>
    </div>
    </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info"  style="margin-top:40px">
        <div class="col-sm-4 invoice-col">
          <b class="leftman" style="font-weight:800">From</b>
          <address class="leftman">
            <strong>Snapnet Limited.</strong><br>
            1B Abayomi Shonuga Street<br>
            Lekki Phase 1, Lagos<br>
            Phone: +234(703)4076619<br>
            Email: info@snapnet.com.ng
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col" style="text-align:center; float:center;">
        <b style="font-weight:800"> To </b>
          @if($organ_get)
          <address>
          	{{$organ_get->orgAddress}}
		  </address>
		  @endif
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col pull-right" style="text-align:right; float:right;">
        <div class="rightman">
          @if($invoice->status == 0)
          <b class="rightman" style="font-weight:800">#Quote No:@php echo rand() @endphp</b><br>
          @else
          <b class="rightman" style="font-weight:800">#Invoice No: @php echo rand() @endphp</b><br>
          @endif
          <br>
          <b class="rightman">Payment Due:</b>@php echo date('d/m/Y', strtotime('+1 months'));  @endphp<br>
          <b class="rightman">Account:</b> 0073821499
        </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-hover" id="myTable">

            <thead>
            <tr>
              <th>S/N</th>
              <th>Currency</th>
              <th>Product Name</th>
              <th>Product #</th>
              <th>Description</th>
              <th>Qty</th>
              <th>Unit Cost</th>
              <th>Discount</th>
              <th>Total</th>
               <th>Edit</th><th>Trash</th>
              {{-- <th></th> --}}
              
            </tr>
            </thead>
            <tbody>
            	@if($additem)
		    	@php $total=0;$dtotal=0;$i=1; @endphp
		    	@foreach($additem as $addition)
		    	@php $total += $addition->quantity * $addition->unitcost; @endphp
          @php $dtotal += $addition->total - $addition->total*$addition->discount/100; @endphp
            <tr>
              <td>{{$i++}}</td>
              <td>
              
              @if($addition->currency == 'naira')
              &#8358
              @else
              $
              @endif
              </td>
              <td>{{$addition->productName}}</td>
              <td>{{$addition->id}}</td>
              <td>{{$addition->description}}</td>
              <td style="text-align: center; color:blue"><button class="btn btn-info">{{$addition->quantity}}</button></td>
              <td>{{number_format($addition->unitcost,2)}}</td>
              <td>{{number_format($addition->discount,2)}}%</td>
              @if($addition->discount)
              <td>{{number_format($addition->quantity * $addition->unitcost - $addition->quantity * $addition->unitcost * $addition->discount/100,2 )}}</td>
              @else
              <td>{{number_format($addition->quantity * $addition->unitcost,2 )}}</td>
              @endif
            
              <td>
                @if($invoice->status == 0)
                <a href="#" class="btn btn-info" onclick="load_org({{$addition->id}})"><i class="fa fa-pencil"></i></a>
                @elseif($invoice->status ==1 && \Auth::user()->type == 'admin_user')
                <a href="#" class="btn btn-default" onclick="load_org({{$addition->id}})"><i class="fa fa-pencil"></i></a>
                @elseif($invoice->status ==1)
                <a href="#" class="disabled btn btn-default" onclick="load_org({{$addition->id}})"><i class="fa fa-pencil"></i></a>
                @endif
              </td>
             	
            <td>
               {{-- <form action="{{ route('delete',$addition->id) }}" method="post">
           @csrf
           @method('delete')
           @if($invoice->status == 0)
           <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
           @elseif($invoice->status == 1)
           <button type="submit" class="disabled btn btn-default"> <i class="fa fa-trash"></i></button>
           @endif
           </form>
                --}}
                @if($invoice->status == 0)
           <button type="submit" onclick="promptDelete(this.id)" id="{{ $addition->id }}" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
           @elseif($invoice->status == 1)
           <button type="submit" onclick="promptDelete(this.id)" id="{{ $addition->id }}" class="disabled btn btn-default"> <i class="fa fa-trash"></i></button>
           @endif

            </td> 

            </tr>
            @endforeach
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
</div>
      <!-- /.row -->
     <div class="row invoiceTab">
        <div class="col-xs-5 pull-right">
          <div class="table-responsive">
            <table class="table "> 
             <tr>
                <td>
                  @if($invoice->hasvat=='0')
                  <a href="{{ route('add.vat',$invoice->id) }}">Add VAT</a>
                  @elseif($invoice->hasvat=='1')
                  <a href="{{ route('remove.vat',$invoice->id) }}">Remove VAT</a>
                  @endif
                </td>
            </tr>   
                  <tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{number_format($dtotal ,2) }}</td>
              </tr>
              
              @if($invoice->hasvat=='0')
              
              @elseif($invoice->hasvat=='1')
              <tr>
                  <th>VAT(7.5%):</th>
                  <td>{{number_format($dtotal* 0.075 ,2) }}</td>
              </tr>
              @endif
             
              <tr>
                <th>TOTAL:</th>
                @if($invoice->hasvat=='0')
                <td><u><strong>{{number_format(($dtotal) ,2) }}</strong></u></td>
              @elseif($invoice->hasvat=='1')
              <td><u><strong>{{number_format(($dtotal * 0.075) + ($dtotal) ,2) }}</strong></u></td>
              @endif
</tr>
<tr>
              <td>
              @if($invoice->status==1)
        	<a class="btn btn-primary buttons" onclick="printFrame('invoiceDownload')" style="margin-right: 5px;">
            <i class="fa fa-print"></i> Print PDF
          </a>
          {{-- <a class="btn btn-success buttons" href="{{url('download')}}?id={{$invoice->id}}" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Download Invoice
          </a> --}}
          <a class="btn btn-success buttons" href="{{url('send_invoice')}}?id={{$invoice->id}}"  style="margin-right: 5px;">
            <i class="fa fa-envelope"></i> Email Invoice
          </a>
        	@else 
         @if(\Auth::user()->type != 'admin_user')
          <a class="btn btn-success buttons" href="{{url('reviewInvoice').'?invoice_id='.$invoice->id}}" style="margin-right: 5px;">
            <i class="fa fa-envelope"></i> 	Submit For Review
          </a>
          @endif
          @endif


              @if(\Auth::user()->type == 'admin_user' && $invoice->status == 0)
          <a class="btn btn-info col-lg-12 buttons" onclick="" href="" data-toggle="modal" data-target="#approve" style="margin-right: 5px;">
            <i class="fa fa-check"></i> 	Approve Quote
          </a>
          @else
          @if(\Auth::user()->type == 'admin_user' || 'normal_user' && $invoice->status == 1)
          <a class="disabled btn btn-warning col-lg-12 buttons" onclick="" href="" data-toggle="modal" data-target="#approve" style="margin-right: 5px;">
            <i class="fa fa-check"></i> 	Invoice Approved
          </a>
          @endif
          @endif
          @if(\Auth::user()->type == 'admin_user' || 'normal_user')
          <a href="" class="btn btn-primary col-lg-12 buttons" onclick="printFrame('downloadQuote')" style="margin-right: 5px;"> <i class="fa fa-files-o"></i>    Generate Quote</a>
          @endif</td>
              </tr>
            
            
            </table>
           
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print invoiceTab" style="display:none">
        <div class="col-xs-12">
        	
        	@if($invoice->status==1)
        	<a class="btn btn-primary pull-right" onclick="printFrame('invoiceDownload')" style="margin-right: 5px;">
            <i class="fa fa-print"></i> Print PDF
          </a>
          {{-- <a class="btn btn-success pull-right" href="{{url('download')}}?id={{$invoice->id}}" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Download Invoice
          </a> --}}
          <a class="btn btn-success pull-right" href="{{url('send_invoice')}}?id={{$invoice->id}}"  style="margin-right: 5px;">
            <i class="fa fa-envelope"></i> Email Invoice
          </a>
        	@else 
         @if(\Auth::user()->type != 'admin_user')
          <a class="btn btn-success pull-right" href="{{url('reviewInvoice').'?invoice_id='.$invoice->id}}" style="margin-right: 5px;">
            <i class="fa fa-envelope"></i> 	Submit For Review
          </a>
          @endif
          @endif
          @if(\Auth::user()->type == 'admin_user' && $invoice->status == 0)
          <a class="btn btn-warning pull-right" onclick="" href="" data-toggle="modal" data-target="#approve" style="margin-right: 5px;">
            <i class="fa fa-check"></i> 	Approve Quote
          </a>
          @else
          @if(\Auth::user()->type == 'admin_user' || 'normal_user' && $invoice->status == 1)
          <a class="disabled btn btn-warning pull-right" onclick="" href="" data-toggle="modal" data-target="#approve" style="margin-right: 5px;">
            <i class="fa fa-check"></i> 	Invoice Approved
          </a>
          @endif
          @endif
          @if(\Auth::user()->type == 'admin_user' || 'normal_user')
          <a href="" class="btn btn-danger pull-right" onclick="printFrame('downloadQuote')" style="margin-right: 5px;"> <i class="fa fa-files-o"></i>    Generate Quote</a>
          @endif
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
   	</div>
   	<iframe id="invoiceDownload" style="display: none;" src="{{url('pdf')}}?id={{$_GET['id']}}"></iframe>
    <iframe id="downloadQuote" style="display: none;" src="{{url('quote')}}?id={{$_GET['id']}}"></iframe>
 		@endif


<form method="post" action="{{url('/add_item')}}">
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
      	<label class="col-sm-12" for="">Currency</label><br>
			<div class="col-sm-12">
        <select name="currency" class="form-control col-sm-12" id="">
        <option value="naira">&#8358</option>
        <option value="dollar">$</option>
        </select>
			</div>
      	</div>
      	
      	<!--//remember to remove the rate-->
      	   <input type="hidden" name="rate" value="1">
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Product Name</label><br>
			<div class="col-sm-12">
				<input type="hidden" name="invoice_id" value="{{$invoice_id}}">
				<input type="text" class="form-control col-sm-12" name="productName" id="productName" required>
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Product Description</label><br>
			<div class="col-sm-12">
			<input type="text" class="form-control col-sm-12" name="description" id="" required>
			</div>
      	</div>
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
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Discount</label><br>
			<div class="col-sm-12">
			<input type="text" class="form-control col-sm-12" name="discount" id="" required>
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
    
<input type="hidden" name="id" id="id" value="{{$_GET['id']}}">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Yes</button>
      </div>

    </div>
  </div>
</div>
</form>


<form method="post" action="{{url('/')}}">
@csrf
<div class="modal" id="email">
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
        <label class="col-sm-12" for="">Company Name</label><br>
      <div class="col-sm-12">
        <input type="hidden" name="invoice_id" value="{{$invoice_id}}">
        @if($organ_get)
        <input type="text" class="form-control col-sm-12" disabled="" name="orgName" value="{{$organ_get->orgName}}" id="" required>
        @endif
      </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-12" for="">Subject</label><br>
      <div class="col-sm-12">
      <input type="text" class="form-control col-sm-12" name="description" id="" required>
      </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-12" for="">Body</label><br>
      <div class="col-sm-12">
      <input type="text" class="form-control col-sm-12" name="quantity" id="" required>
      </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-12" for="">Attachment</label><br>
      <div class="col-sm-12">
      <input type="file" class="form-control col-sm-12" name="quantity" id="" required>
      </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send Mail   <i class="fa fa-paper-plane"></i></button>
      </div>

    </div>
  </div>
</div>
</form>
</div>
</div>
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
		$('#manageorg').load("{{url('organization')}}/modals/editItem?id="+id);
		$('#manage_org').modal('show');
	}

function printFrame(id) {
            var frm = document.getElementById(id).contentWindow;
            frm.focus();// focus on contentWindow is needed on some ie versions
            frm.print();
            return false;
}

function promptDelete(id){
  swal({
  title: "Are You Sure",
  text: "Once deleted, you won'\t be able to recover this document",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    var obj = new XMLHttpRequest();
    obj.onreadystatechange = function(){
        if(obj.readyState == 4){
            if(obj.responseText == "document deleted"){
            swal("Document Has Been Deleted", {
      icon: "success",
    });
    setTimeout(function(){ window.location="{{ route('manageInvoice') }}"; }, 2000);
            }else{
                swal("Failed to delete document please try again or contact support")
            }
        }
    }
    obj.open("GET", "{{route('deleteInvoiceById') }}?id=" + id, true)
    obj.send();


    
  } else {
    swal("operation aborted");
  }
});
}
</script>


@include('horizontal.footer')