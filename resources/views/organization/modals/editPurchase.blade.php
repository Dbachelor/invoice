<form method="post" action="{{url('/addPurchaseItems')}}">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$edit_purchase->id}}">
    <!-- Modal body -->
    <input type="hidden" name="poid" value="{{$edit_purchase->poid}}">  
              <!-- <input type="hidden" class="form-control col-sm-12" name="orgid" id="orgid" value=""> -->
            
              <div class="form-group row">
              <label class="col-sm-12" for="">Product Description</label><br>
                <div class="col-sm-12">
                <input type="text" class="form-control col-sm-12" name="description" id=""  value="{{$edit_purchase->description}}" required>
                </div>
              </div>
              <div class="form-group row">
              <label class="col-sm-12" for="">Quantity</label><br>
                <div class="col-sm-12">
                <input type="number" class="form-control col-sm-12" name="quantity" id=""  value="{{$edit_purchase->quantity}}" required>
                </div>
              </div>
              <div class="form-group row">
              <label class="col-sm-12" for="">Unit Cost</label><br>
                <div class="col-sm-12">
                <input type="number" class="form-control col-sm-12" name="unitcost" id=""  value="{{$edit_purchase->unitcost}}" required>
                </div>
              </div>
            
          
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Edit Item</button>
          </div>
    
       
    </form>