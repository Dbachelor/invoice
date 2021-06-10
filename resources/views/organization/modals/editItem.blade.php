<form method="post" action="{{url('/add_item')}}">
@csrf
<input type="hidden" name="id" id="id" value="{{$edit_item->id}}">
<!-- Modal body -->
      
      	<!-- <input type="hidden" class="form-control col-sm-12" name="orgid" id="orgid" value=""> -->
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Currency</label><br>
			<div class="col-sm-12">
        <select  name="currency" class="form-control col-sm-12" id="">
        <option value="naira" {{ $edit_item->currency=='naira' ?  'selected': ' ' }}>&#8358</option>
        <option value="dollar" {{ $edit_item->currency=='dollar' ?  'selected': ' ' }}>$</option>
        </select>
			</div>
      	</div>
        <input type="hidden" name="rate" value="1">
      	
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Product Name</label><br>
			<div class="col-sm-12">
			    <input type="hidden" name="invoice_id" value="{{$edit_item->invoice_id}}">
				<input type="text" class="form-control col-sm-12" name="productName" id="productName" value="{{$edit_item->productName}}" required>
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Product Description</label><br>
			<div class="col-sm-12">
			<input type="text" class="form-control col-sm-12" name="description" id=""  value="{{$edit_item->description}}" required>
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Quantity</label><br>
			<div class="col-sm-12">
			<input type="number" class="form-control col-sm-12" name="quantity" id=""  value="{{$edit_item->quantity}}" required>
			</div>
      	</div>
      	<div class="form-group row">
      	<label class="col-sm-12" for="">Unit Cost</label><br>
			<div class="col-sm-12">
			<input type="number" class="form-control col-sm-12" name="unitcost" id=""  value="{{$edit_item->unitcost}}" required>
			</div>
      	</div>
        <div class="form-group row">
        <label class="col-sm-12" for="">Discount</label><br>
      <div class="col-sm-12">
      <input type="number" class="form-control col-sm-12" step="0.01" name="discount" id=""  value="{{$edit_item->discount}}" required>
      </div>
        </div>
      

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Edit Item</button>
      </div>

   
</form>