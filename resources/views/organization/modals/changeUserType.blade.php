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
    
<input type="text" name="id" id="id" value="{{$edit->id}}">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Yes</button>
      </div>

    </div>
  </div>
</div>
</form>