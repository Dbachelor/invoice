@extends('layouts.app')
@section('stylesheets')
  {{-- <link rel="stylesheet" href="{{ asset('datatables/DataTables-1.10.16/css/dataTables.bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('datepicker/bootstrap-datepicker.min.css')}}">
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
  <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h4><span class="fa fa-sort-numeric-asc" aria-hidden="true"></span>&nbsp;Document Review <small>Your Files, Anytime, Anywhere.....</small></h4>
          </div>
          <div class="col-md-2">
            <a href="{{route('documents.create')}}" class="btn btn-primary create">Create</a>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Admin/Documents</li>
        </ol>
      </div>
    </section>

    <section id="main" style="min-height:480px;">
      <div class="container">
        <div class="row">

          <div class="col-md-9">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times</span> </button>
                    {{ session('success') }}
                </div>
            @endif
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Review History </h3>
              </div>

              <div class="panel-body">
                {{ $document->workflow->name }}
                @php
                  $i=1;
                  $current_review;
                @endphp
            <table class="table table-stripped" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Stage</th>
                  <th>Current</th>
                  <th>Status</th>
                  <th>Approver</th>
                  <th>Comment</th>
                  <th>Reviewer</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($document->workflow->stages as $stage)
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $stage->name }}</td>
                      @php
                      $review=getDocumentReview($document->id,$stage->id);
                      @endphp
                      @if ($review)

                      @if ($review->status==0)
                        @php
                          $current_review=$review;
                        @endphp
                        <td>{!! '<span class="label label-primary">Current</span>' !!}</td>
                      <td>{{ 'Pending' }}</td>
                      <td></td>
                      <td></td>
                      <td>{{ $stage->user->name }}</td>
                    @elseif ($review->status==1)
                        <td></td>
                        <td>{{ 'Approved' }}</td>
                        <td>{{ $stage->user->name }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $stage->user->name }}</td>

                      @elseif ($review->status==2)
                          <td></td>
                          <td>{{ 'Rejected' }}</td>
                          <td>{{ $stage->user->name }}</td>
                            <td>{{ $review->comment }}</td>
                            <td>{{ $stage->user->name }}</td>
                      @endif
                      @else
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $stage->user->name }}</td>
                      @endif


                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach

              </tbody>

            </table>

          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Document Details </h3>
          </div>

          <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">Name: {{$document->filename}}</li>
          <li class="list-group-item"> Created At: {{$document->created_at}}</li>
          <li class="list-group-item"> Folder: {{$document->folder->name}}</li>
          <li class="list-group-item"> Expires: {{$document->expires?$document->expires:'false'}}</li>
          <li class="list-group-item"> Comment: {{$document->comment}}</li>
          <li class="list-group-item"> Description: {{$document->description}}</li>
        </ul>
      </div>
    </div>

  @empty ($current_review)

  @else
    @if ($current_review->stage->user->id==Auth::user()->id)
      <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Review Action</h3>
        </div>
        <form class="" action="{{route('documents.savereview',$current_review->id)}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="review_id" value="{{ $current_review->id }}">

        <div class="panel-body">
          <div class="form-group">
            <label for="">Comment</label>
            <textarea class="form-control" rows="3" cols="80" name="comment"></textarea>
            </div>
        </div>
        <div class="panel-footer">
          <button type="submit" class="btn btn-success" name="action" value="approve">
            Approve
          </button>
          <button type="submit" class="btn btn-danger" name="action" value="reject">
            Reject
          </button>
          <a type="submit" class="btn btn-warning" name="">
          Cancel
        </a>

        </div>
        </form>
      </div>
    @endif
  @endempty



          </div>
          <div class="col-md-3">

            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Support</h3>
              </div>

              <div class="panel-body">
                Need help? Email us at support@snapnet.com.ng
              </div>
            </div>

          </div>
          </div>



      </div>
    </section>
@endsection
@section('scripts')
  {{-- <script type="text/javascript" src="{{ asset('datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{ asset('datatables/datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.input-daterange').datepicker({
    autoclose: true
});

    var selected = [];
     var table =$('#gtable').DataTable();

    $('#gtable tbody').on('click', 'tr', function () {
        var id = this.id;
        var index = $.inArray(id, selected);

        // if ( index === -1 ) {
        //     selected.push( id );
        // } else {
        //     selected.splice( index, 1 );
        // }

        $(this).toggleClass('selected');
    });
} );
  </script>


@endsection
