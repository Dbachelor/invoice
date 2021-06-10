@extends('layouts.app')
@section('stylesheets')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
  <style media="screen">
    .form-cont{
      border: 1px solid #cccccc;
      padding: 10px;
      border-radius: 5px;
    }
    .form-horizontal .form-group {
    margin-right: 0px;
     margin-left: 0px; 
}
    #stgcont {
      list-style: none;
    }
    #stgcont li{
      margin-bottom: 10px;
    }
  </style>
@endsection
@section('content')
  


   
        <div class="row">

          <div class="col-md-12">
            <!-- Website Overview -->

            @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times</span> </button>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times</span> </button>
                        {{ session('success') }}
                    </div>
                @endif
            <form class="form-horizontal" method="POST" action="{{ route('workflows.save') }}">
              {{ csrf_field() }}
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Workflow Details</h3>
                </div>

                <div class="panel-body">


                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                  </div>

                </div>

                </div>

                <div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Stage Details</h3>
                  </div>

                  <div class="panel-body">
                    <ul id="stgcont">
                      {{-- <li>
                        <div class="form-cont" >
                          <div class="form-group">
                            <label for="">position</label>
                            <input type="number" class="form-control" name="position[]" id="" placeholder="" required>

                          </div>
                          <div class="form-group">
                            <label for="">name</label>
                            <input type="text" class="form-control" name="stagename[]" id="" placeholder="" required>

                          </div>
                          <div class="form-group">
                            <label for="">users</label>
                            <select class="form-control users" name="user_id[]" >
                              @forelse ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                              @empty
                                <option value="">No Users Created</option>
                              @endforelse
                            </select>

                          </div>
                          <div class="form-group">
                            <button type="button" class="btn btn-primary ">Remove Stage</button>
                          </div>
                        </div>
                      </li> --}}
                    </ul>
                    <button type="button" id="addStage" name="button" class="btn btn-primary">New Stage</button>
                  </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                      Create Workflow
                  </button>
                </form>





              <!-- Latest Users -->

          </div>
        
        </div>



@endsection
@section('scripts')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.users').select2();
  $('#stgcont').sortable();

  var stgcont = $('#stgcont');
        var i = $('#stgcont li').length + 1;

        $('#addStage').on('click', function() {
        	//console.log('working');
                $(' <li><div class="form-cont" > <div class="form-group"> <label for="">Name</label> <input type="text" class="form-control" name="stagename[]" id="" placeholder="" required> </div> <div class="form-group"> <label for="">Users</label> <select class="form-control users" name="user_id[]" > @forelse ($users as $user) <option value="{{$user->id}}">{{$user->name}}</option> @empty <option value="">No Users Created</option> @endforelse </select> </div> <div class="form-group"> <button type="button" class="btn btn-primary " id="remStage">Remove Stage</button> </div> </div> </li>').appendTo(stgcont);
                //console.log('working'+i);
                i++;
                return false;
        });

        $(document).on('click',"#remStage",function() {
        	//console.log('working'+i);
                if( i > 1 ) {
                	 console.log('working'+i);
                        $(this).parents('li').remove();
                        i--;
                }
                return false;
  	});
    // $( "#stgcont" ).on( "sortchange", function( event, ui ) {
    //   var listItems = $("#stgcont li");
    //   p=0;
    //   listItems.each(function() {
    //
    //     position=$(this).find('.stg-position');
    //     position.val(p);
    //     p++;
    //   });
    // } );
});
</script>
@endsection
