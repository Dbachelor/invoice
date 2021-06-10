<form method="post" action="{{url('/addOrg')}}">
@csrf
<input type="hidden" name="id" id="id" value="{{$edit_org->id}}">

      <div class="form-group row">
      	<label class="col-sm-12" for="">Organization Name</label><br>
  			<div class="col-sm-12">
  				<input type="text" class="form-control col-sm-12" name="orgName" id="orgName" value="{{$edit_org->orgName}}" required>
  			</div>
      </div>

      	<div class="form-group row">
        	<label class="col-sm-12" for="">Organization Address</label><br>
    			<div class="col-sm-12">
    				<input type="text" class="form-control col-sm-12" name="orgAddress" id="orgAddress" value="{{$edit_org->orgAddress}}" required>
    			</div>
      	</div>

      	<div class="form-group row">
        	<label class="col-sm-12" for="">Organization Email</label><br>
    			<div class="col-sm-12">
    				<input type="text" class="form-control col-sm-12" name="orgEmail" id="orgEmail" value="{{$edit_org->orgEmail}}" required>
    			</div>
        </div>


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" onclick="return confirm('Are You Sure You want to update these details?')">Update</button>
      </div>

   
</form>