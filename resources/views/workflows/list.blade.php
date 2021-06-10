@extends('layouts.app')
@section('stylesheets')
  {{-- <link rel="stylesheet" href="{{ asset('datatables/DataTables-1.10.16/css/dataTables.bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bootstrap-toggle-master/css/bootstrap-toggle.min.css')}}">
  <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css')}}">
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('datepicker/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
  

    
        <div class="row">

          <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times</span> </button>
                    {{ session('success') }}
                </div>
            @endif
            <div class="panel panel-info panel-line">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Workflow Details</h3>
                <div class="panel-actions">
                  <a href="{{route('workflows.create')}}" class="btn btn-success create">Create</a>
                </div>
              </div>

              <div class="panel-body">
            <table class="table table-stripped" id="">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Active</th>
                  <th>Created At</th>
                  <th>No. of Stages</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($workflows as $workflow)
                    <tr>
                      <td>{{ $workflow->name }}</td>
                      <td><input type="checkbox" class="active-toggle" id="{{$workflow->id}}" {{$workflow->status==1?'checked':''}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"></td>
                      <td>{{ $workflow->created_at }}</td>
                      <td><span class="badge">{{ $workflow->stages_count }}</span></td>
                      <td><span  data-toggle="tooltip" title="Edit"><a  class="my-btn   btn-sm text-info" id="{{$workflow->id}}" href="{{ route('workflows.edit',$workflow->id) }}"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a></span>


                <span  data-toggle="tooltip" title="View"><a href="{{ route('workflows.view',$workflow->id) }}"  class="my-btn   btn-sm text-success"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a></span>
            </td>

                    </tr>
                  @endforeach

              </tbody>

            </table>
              {!! $workflows->appends(Request::capture()->except('page'))->render() !!}
          </div>
        </div>


          </div>
          
          </div>
          </div>



    
@endsection
@section('scripts')
  {{-- <script type="text/javascript" src="{{ asset('datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{ asset('datatables/datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('bootstrap-toggle-master/js/bootstrap-toggle.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('toastr/toastr.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.input-daterange').datepicker({
    autoclose: true
});
$('.select2').select2();
    var selected = [];
     var table =$('#gtable').DataTable();
     $('.active-toggle').change(function() {
       var id = $(this).attr('id');
        var isChecked = $(this).is(":checked");
        console.log(isChecked);
        $.get(
          '{{ route('workflows.alter-status') }}',
          { id: id, status: isChecked },
          function(data) {
            if(data=="enabled"){
              toastr.success('Enabled!', 'Workflow Status');
            }
            if(data=="disabled"){
              toastr.error('Disabled!', 'Workflow Status')
            }else{
              toastr.error(data, 'Workflow Status');

            }


          }
        );

    });
{{--
    $('#gtable tbody').on('click', 'tr', function () {
        var id = this.id;
        var index = $.inArray(id, selected);

        // if ( index === -1 ) {
        //     selected.push( id );
        // } else {
        //     selected.splice( index, 1 );
        // }

        $(this).toggleClass('selected');
    }); --}}
} );
  </script>


@endsection
