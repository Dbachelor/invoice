 @extends('layouts.app')

@section('content')


<style>
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


    .tab-content
    {
        height: auto !important;
    }
/* change border radius for the tab , apply corners on top*/

</style>



<div class="row" style="">
    <div class="col-lg-12">
        <div class="box m-b-20" style="background: transparent!important;">
            <div class="box-header with-border"> 
                <div class="box-body" id="exTab1">

                    <!-- Notification Panel --> 
                    <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Proposal Templates </h4>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->


                    <ul  class="nav nav-pills">
                        <li class="">
                            <a data-toggle="tab" href="#erp" role="tab" onclick="loadProposal('Enterprise Resource Planning', 'erp')"> ERP </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#_365" role="tab" onclick="loadProposal('0-365', '365')"> 0-365 </a>
                        </li>
                    </ul>

                    <div class="tab-content clearfix" style="padding: 0px">
                        <div class="tab-pane" id="erp">
                            <form id="" action="{{ route('add-proposal-template') }}" method="POST">
                            @csrf
                            <p class="font-14 mb-0">


                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <input type="hidden" class="form-control" name="id" id="id_erp">
                                        <input type="hidden" class="form-control" name="proposal_name" id="proposal_name_erp" 
                                        value="Enterprise Resource Planning">
                                        <input type="hidden" class="form-control" name="status" id="status_erp">
                                    </div>
                                </div>  


                                <div class="col-lg-12" style="margin-top: 10px">
                                    <textarea name="content" id="content_erp" rows="10" cols="80">   </textarea>
                                </div>


                                <div class="col-lg-12" style="margin-top: 10px;">
                                    {{-- <button type="button" id="_erp" class="btn btn-success btn-sm pull-right mg-l save"> Submit </button> --}}
                                    <button type="button" id="_erp" class="btn btn-info btn-sm pull-right mg-l draft"> Save as Draft </button>
                                </div>
                            </p>
                        </form>
                        </div>

                        <div class="tab-pane" id="_365">
                  
                        </div>
                    </div>


                <!-- Nav tabs -->

                </div>
          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

















@endsection



@section('script') 

<script> 

    function loadProposal(name, id)
    {
        $(function()
        {      
            var proposal_name = name; 
            $.get('{{url('getProposalTemplateDetails')}}?proposal_name=' +proposal_name, function(data)
            {  //clear
                $('#id_'+id).val(''); 
                // CKEDITOR.instances['content_'+id].setData('');

                $('#id_'+id).val(data.id); 
                CKEDITOR.instances['content_'+id].setData(data.content);
            });
        }); 
    }



    $(function()
    { 
        $('.draft').click(function()
        {
            if(confirm('Are you sure you want to save this as a draft copy?'))
            {
                var name = $(this).attr("id");
                id = $('#id'+name).val();
                proposal_name = $('#proposal_name'+name).val();
                content = CKEDITOR.instances['content'+name].getData();
                status = 1;
                created_by = '';
                formData = 
                {
                    id:id,
                    proposal_name:proposal_name,
                    content:content,
                    status:status,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('add-proposal-template')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $('#id'+name).val(''); 
                        CKEDITOR.instances['content'+name].setData('');

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); };
                });

            }

        });
    });
    
    CKEDITOR.config.extraPlugins = "base64image";
    CKEDITOR.replace( 'content_erp' );

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