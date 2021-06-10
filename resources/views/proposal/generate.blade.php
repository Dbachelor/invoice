
@extends('layouts.app')

@section('content')


<style>
    *
    {
        font-size: 14px!important;
    }
    .mg-l
    {
        margin-right: 5px;
    }
    .mg-r
    {
        margin-left: 5px;
    }

    .frm
    {
        font-size: 12px;
        padding: 2px 5px;
    }
    .round
    {
        border-radius: 50%;
        font-size: 11px;
    }

    .removeBtn
    {
        background-color: transparent;
        color: red;
        font-weight: bolder;
    }

    .gen
    {
        background-color: #eee;
        color: #202020;
        font-weight: lighter!important;
        font-size: 12px;
        margin-left: 6px;

    }



    a
    {
        color: #202020;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link
    {
        background-color: #008B8B; color: #fff;
    }
    .nav-pad a
    {
        padding:4px 35px;
        border: #e1e1e1 thin solid;
    }
    .nav-pad a:hover
    {
        padding:4px 35px;
        border: #e1e1e1 thin solid;
        background-color: #008B8B;          /*36454F*/
        color: #fff;
    }
    .nav-active
    {
        background-color: #0f9cf3;
    }

    .btn-font
    {
        font-size: 12px;
    }

    #tab-content
    {
        font-size: 11px;
    }

    .tab-nav-link
    {
        background-color: #008B8B;
        color: #ffffff;
    }

    .marg
    {
      margin-right: -25px !important;
    }

    .init:hovel
    {
        color: #fff;
    }


    .notify
    {
        cursor: pointer;
    }
    .notify:hover
    {
        cursor: pointer;
        color: #fff!important;
    }




  /* The container */
  .container
  {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .container input
  {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark
  {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #999;
    border-radius: 2%;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input ~ .checkmark
  {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .container input:checked ~ .checkmark
  {
    background-color: #008B8B;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after
  {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .container input:checked ~ .checkmark:after
  {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .container .checkmark:after
  {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }

    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }


    #exTab1 .tab-content
    {
        background-color: white;
        padding : 5px 15px;
    }
    /* remove border radius for the tab */

    #exTab1 .nav-pills > li > a
    {
        border-radius: 0;
    }

    .box
    {
        border-top: none;
    }

/* change border radius for the tab , apply corners on top*/

</style>



<div class="row" style="">
    <div class="col-lg-8 col-lg-offset-2" style="background: #fff">

    <!-- Notification Panel -->

    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->
        <input type="hidden" name="typed" id="typed" value="{{$route}}">

        <div class="col-md-12" style="position: fixed; z-index: 1000; right: 20px">
            <form id="" action="" method="POST"> @csrf

                @forelse($constants as $constant)
                    @php
                        $id_name = trim($constant->variable, '%');
                    @endphp
                    <input type="hidden" name="{{$id_name}}" id="{{$id_name}}" value="{{$constant->content}}">
                @empty
                @endforelse


                @forelse($bid_documents as $bid_document)
                    <a href="{{URL::asset('assets/documents/'.$bid_document->title.'.pdf/'.$bid_document->title.'.pdf')}}" download="{{$bid_document->title.'.pdf'}}" id=""
                       class="btn btn-default pull-right no-print" style="margin-left: 5px">  <i class="fa fa-download"></i> {{$bid_document->title}} </a>
                @empty
                @endforelse <hr> <br>

{{--                <a href="{{URL::asset('assets/documents/SNAPNET- 2020 NSITF Clearance Cert.pdf/SNAPNET- 2020 NSITF Clearance Cert.pdf')}}"--}}
{{--                   download="SNAPNET- 2020 NSITF Clearance Cert.pdf" id="" class="btn btn-default pull-right no-print" style="margin-left: 5px">--}}
{{--                    <i class="fa fa-save"></i> Download Document--}}
{{--                </a>--}}


                <a href="{{url('/proposal-complete?worddoc=1')}}" id="convertBtn" class="btn btn-warning pull-right no-print" style="margin-left: 5px">
                    <i class="fa fa-save"></i> Covert </a>

                <button type="button" id="generateBtn" class="btn btn-default pull-right no-print" onclick="generatePlaceholder('Enterprise Resource Planning')" style="margin-left: 5px">
                    <i class="fa fa-book"></i> Generate </button>

            </form>
        </div>

            <div id="preview" style="font-size: 18px!important;">  </div>

    </div> <!-- end col -->
</div> <!-- end row -->

















@endsection



@section('script')

<script>

    $(function()
    {
        var proposal_name = $('#typed').val();
        $('#preview').html();
        $.get('{{url('getProposalSectionDetails')}}?proposal_name=' +proposal_name, function(data)
        {   //clear
            $('#preview').html(data.content_complete);
        });
    });



    function replacePlaceholder(name)
    {
        $(function()
        {
            if(confirm('Are you sure you want to replace proposal?'))
            {
                var proposal_name  = name;
                var hcmatrix = $('#hcmatrix').val();
                var palipro = $('#palipro').val();
                var client_list = $('#client_list').val();
                var assumption = $('#assumption').val();
                var subscription = $('#subscription').val();
                var third_party_software = $('#third_party_software').val();
                var implementation_1 = $('#implementation_1').val();
                var implementation_2 = $('#implementation_2').val();
                var implementation_3 = $('#implementation_3').val();
                var implementation_4 = $('#implementation_4').val();
                var implementation_5 = $('#implementation_5').val();
                var implementation_6 = $('#implementation_6').val();
                var implementation_7 = $('#implementation_7').val();
                var project_cost = $('#project_cost').val();
                var header = $('#header').val();
                var table_of_content = $('#table_of_content').val();

                formData =
                {
                    proposal_name:proposal_name,
                    hcmatrix:hcmatrix,
                    palipro:palipro,
                    client_list:client_list,
                    assumption:assumption,
                    subscription:subscription,
                    third_party_software:third_party_software,
                    implementation_1:implementation_1,
                    implementation_2:implementation_2,
                    implementation_3:implementation_3,
                    implementation_4:implementation_4,
                    implementation_5:implementation_5,
                    implementation_6:implementation_6,
                    implementation_7:implementation_7,
                    project_cost:project_cost,
                    header:header,
                    table_of_content:table_of_content,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{url('/replace-placeholder')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $.get('{{url('reloadPreview')}}?proposal_name=' +proposal_name, function(data)
                        {  //clear
                            $('#preview').html(data.content_temp);
                        });

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });

            }
        });
    }

    function generatePlaceholder(name)
    {
        $(function()
        {
            if(confirm('Are you sure you want to generate proposal?'))
            {
                var proposal_name  = name;

                formData =
                {
                    proposal_name:proposal_name,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{url('/generate-placeholder')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $.get('{{url('reloadPreview')}}?proposal_name=' +proposal_name, function(data)
                        {  //clear
                            $('#preview').html(data.content_complete);
                        });

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });

            }
        });
    }



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
