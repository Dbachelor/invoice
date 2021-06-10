@extends('layouts.app')

@section('content')


    <style>

    </style>

    <div class="row" style="">
        <div class="col-lg-12">
            <div class="box m-b-20">
                <div class="box-header with-border">
                    <div class="box-body" id="exTab1">



                        <form id="dollarForm" action="{{route('add-dollar-rate')}}" enctype="multipart/form-data" method="POST">  @csrf
                            <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Dollar Rate</legend>
                                <div class="box-body">

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="col-md-6 col-xs-10 no-pad">
                                                <input type="hidden" name="id" id="id value="{{$rate->id}}">
                                                <p class="help-block">Add Dollar Rate</p>
                                            </div>

                                            <div class="col-md-6 col-xs-12 no-pad">
                                                <label class="container col-md-6 col-xs-12">
                                                    <input type="number" step="0.01" class="form-control" name="dollar_rate" id="dollar_rate" value="{{$rate->dollar_rate}}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" id="saveBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save </button>
                            </fieldset>

                        </div>
                        </form>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

















@endsection



@section('script')


    <script>
        //function to process form data
        function processForm(formid, route)
        {
            formdata= new FormData($('#'+formid)[0]);
            formdata.append('_token','{{csrf_token()}}');

            $.ajax(
                {
                    // Your server script to process the upload
                    url: route,
                    type: 'POST',
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data, status, xhr)
                    {
                        if(data.status=='success')
                        {
                            toastr.success(data.message, {timeOut:10000});
                            return;
                        }
                        return toastr.error(data.message, {timeOut:10000});
                    }
                });
        }




        //PROCESSING FORM DATA
        $("#dollarForm").on('submit', function(e)
        {
            e.preventDefault();
            processForm('dollarForm', "{{url('/add-dollar-rate')}}");

            $("#dollar_rate").val('');
        });
    </script>




    @if(Session::has('info'))
        <script>
            $(function()
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function()
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection
