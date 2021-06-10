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

    @media print {
        .no-print, .no-print * {
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

</style>

@php    
    // function resolveValues()
    // {       
    //     $text = str_replace("%company_name_1%", "SNAPNET", $test->content);

    //     echo $text;
    // }

@endphp

<div class="row" style="">
    <div class="col-lg-12">
        <div class="box m-b-20">
            <div class="box-header with-border"> 
                <div class="box-body" id="exTab1">

                    <!-- Notification Panel --> 
                    <h4 class="mt-0 header-title"><i class="dripicons-gear" style="margin-top: -25px"></i> Create New Proposal </h4>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <ul  class="nav nav-pills">
                        <li class="">
                            <a data-toggle="tab" href="#create_erp" role="tab" onclick="fetchProposal('Enterprise Resource Planning', 'erp')"> ERP </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#_365" role="tab"> 0-365 </a>
                        </li>
                    </ul> 

                    <!-- Tab panes -->
                    <div class="tab-content clearfix" style="">             

                        <div class="tab-pane" id="create_erp">
                            <p class="font-14 mb-0">
                                <div class="row" style="margin-top: 10px">
                                    <form id="" action="{{ route('resolve-proposal-placeholder') }}" method="POST">
                                        @csrf
                                        <div class="col-md-5 pull-left">
                                            <label> Form </label>

                                            <div id="smartwizard" style="">
                                                <ul class="nav" style="">
                                                   <li> <a class="nav-link" href="#step-1"> 1 </a> </li>
                                                   <li> <a class="nav-link" href="#step-2"> 2 </a> </li>
                                                   <li> <a class="nav-link" href="#step-3"> 3 </a> </li>
                                                   <li> <a class="nav-link" href="#step-4"> 4 </a> </li>
                                                   <li> <a class="nav-link" href="#step-5"> 5 </a> </li>
                                                   <li> <a class="nav-link" href="#step-6"> 6 </a> </li>
                                                   <li> <a class="nav-link" href="#step-7"> 7 </a> </li>
                                                   <li> <a class="nav-link" href="#step-8"> 8 </a> </li>
                                                   <li> <a class="nav-link" href="#step-9"> 9 </a> </li>
                                                   <li> <a class="nav-link" href="#step-10"> 10 </a> </li>
                                                   <li> <a class="nav-link" href="#step-11"> 11 </a> </li>
                                                   <li> <a class="nav-link" href="#step-12"> 12 </a> </li>
                                                   <li> <a class="nav-link" href="#step-13"> 13 </a> </li>
                                                   <li> <a class="nav-link" href="#step-14"> 14 </a> </li>
                                                   <li> <a class="nav-link" href="#step-15"> 15 </a> </li>
                                                   <li> <a class="nav-link" href="#step-16"> 16 </a> </li>
                                                   <li> <a class="nav-link" href="#step-17"> 17 </a> </li>
                                                   <li> <a class="nav-link" href="#step-18"> 18 </a> </li>
                                                   <li> <a class="nav-link" href="#step-19"> 19 </a> </li>
                                                </ul>
                                             
                                                <div class="tab-content" style="padding: 0px">
                                                    <div id="step-1" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="header" class="col-sm-12 col-form-label"> Header </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="header" id="header"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-2" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="company_name" class="col-sm-12 col-form-label"> Company Name </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="company_name" id="company_name"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-3" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="executive_summary" class="col-sm-12 col-form-label"> Executive Summary </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="executive_summary" id="executive_summary"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-4" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="number_of_days" class="col-sm-12 col-form-label"> Project Schedule - No of Days</label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="number_of_days" id="number_of_days"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-5" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="software_add_ons" class="col-sm-12 col-form-label"> Third Party Software Add-ons </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="software_add_ons" id="software_add_ons"></textarea>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="step-6" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="hcmatrix" class="col-sm-12 col-form-label"> Software - HCMatrix </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="hcmatrix" id="hcmatrix"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-7" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="palipro" class="col-sm-12 col-form-label"> Software - PALIPRO </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="palipro" id="palipro"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-8" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="our_client" class="col-sm-12 col-form-label"> Our Client </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="our_client" id="our_client"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-9" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="client_lists" class="col-sm-12 col-form-label"> Client List </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="client_lists" id="client_lists"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-10" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="assumption" class="col-sm-12 col-form-label"> Assumptions </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="assumption" id="assumption"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-11" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="subscription_table" class="col-sm-12 col-form-label"> Software licenses – Subscription Table </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="subscription_table" id="subscription_table"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-12" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="recurring_subscription" class="col-sm-12 col-form-label"> Recurring Subcription </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control form-control" name="recurring_subscription" id="recurring_subscription"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-13" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="one_time_subscription" class="col-sm-12 col-form-label"> One Time Payment </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control form-control" name="one_time_subscription" id="one_time_subscription"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-14" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="third_party_table" class="col-sm-12 col-form-label"> Third Party Software </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="third_party_table" id="third_party_table"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-15" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="monthly_recurring" class="col-sm-12 col-form-label"> Monthly Recurring </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control form-control" name="monthly_recurring" id="monthly_recurring"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-16" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="implementation_table" class="col-sm-12 col-form-label"> Implementation – Professional Services </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="implementation_table" id="implementation_table"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-17" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="project_cost_table" class="col-sm-12 col-form-label"> Total Project Cost Summary </label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="project_cost_table" id="project_cost_table"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-18" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="signature" class="col-sm-12 col-form-label"> Sign Here</label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="signature" id="signature"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="step-19" class="tab-pane" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label for="signee_details" class="col-sm-12 col-form-label"> Signature, Name, Email & Phone</label> <br>
                                                            <div class="col-sm-12">
                                                                <textarea rows="10" class="form-control" name="signee_details" id="signee_details"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>



                                        <div class="col-md-7 pull-left">
                                            <label class="pull-left"> 
                                                <span>  
                                                    <button type="button" id="reset_erp" class="btn btn-danger btn-sm pull-right mg-l" onclick="resetProposal('Enterprise Resource Planning', '_erp')"> Reset </button>

                                                    <button type="button" id="preview_" class="btn btn-success btn-sm pull-right mg-l" onclick="previewProposal('Enterprise Resource Planning', '_erp')"> Preview </button>
                                                </span> 
                                            </label>
                                                <input type="hidden" class="form-control" name="idd" id="idd_erp">
                                                <input type="hidden" class="form-control" name="p_type" id="p_type_erp" value="erp">
                                                <input type="hidden" class="form-control" name="prop_name" id="prop_name_erp">
                                                <input type="hidden" class="form-control" name="hidden_content" id="hidden_content_erp">
                                            <br>
                                            <div id="preview_erp" style="font-size: 18px!important;">
                                               

                                            </div>
                                            @php
                                                //Open document
                                                // $template = new \PhpOffice\PhpWord\TemplateProcessor('C:\Users\JIMI-Snapnet\Desktop\Test Excel\Proposal Template.docx');
                                                // //Replace string variables for single
                                                // $mee = 'Mee';
                                                // $template->setValue('Kelvonetics', $mee);
                                                // $template->setValue('AARINVEST', $mee);
                                                // //Save the changed document
                                                // $template->saveAs('C:\Users\JIMI-Snapnet\Desktop\Test Excel\Proposal Template New.docx');
                                            @endphp                                           

                                        </div>

                                        

                                        <div class="col-lg-12" style="margin-top: 0px; position: fixed; z-index: 1000; right: 30px">
                                            <button type="button" id="save_erp" class="btn btn-default btn-sm pull-right mg-l" onclick="saveProposal('_erp')"> <i class="fa fa-save"></i> Save </button>

                                            <button type="button" id="topBtn" class="btn btn-default btn-sm pull-right mg-l" onclick="topFunction()" style="margin-right: 5px; border-radius: 50%;">  <i class="fa fa-arrow-up"></i> </button>
                                        </div>

                                    </form>
                                </div>
                            </p>
                        </form>
                        </div>


                        <div class="tab-pane" id="_365">
                            <p class="font-14 mb-0">
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-5 pull-left">
                                        <form id="example-form" action="#">
                                            
                                        </form>
                                    </div>

                                    <div class="col-md-7 pull-left">
                                    </div>
                                </div>
                            </p>
                        </form>
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

    $(function()
    {
        $('.sw-btn-next').click(function()
        {
            //alert('Next Btn Clicked');
        });
    });

    function fetchProposal(name, type)
    {
        $(function()
        {      
            var proposal_name = name; 
            //clear
            $('#idd_'+type).val(''); 
            $('#prop_name_'+type).val(''); 
            $('#hidden_content_'+type).val(''); 
            $('#preview_'+type).val(''); 

            $.get('{{url('getProposalTemplateDetails')}}?proposal_name=' +proposal_name, function(data)
            {  
                //populate
                $('#idd_'+type).val(data.id); 
                $('#prop_name_'+type).val(data.proposal_name);
                $('#hidden_content_'+type).val(data.content); 
                $('#preview_'+type).html(data.content);
            });

            //set stored data
            $.get('{{url('getSavedData')}}?proposal_name=' +proposal_name, function(data)
            {
                $.each(data, function(index, dataObj)
                {
                    var value = dataObj.variable;  var placeholder = value.replace(new RegExp('%', 'g'), ''); 
                    var content = dataObj.content;  if(dataObj.content == dataObj.variable){ content = ''; }
                    if(dataObj.type == 'single')
                    { 
                        $('#'+placeholder).val(content); 
                    }
                    else
                    {
                        CKEDITOR.instances[placeholder].setData(content); 
                    }

                    // $('#'+placeholder).summernote("code", content);
                    // var content = dataObj.content;  
                    // if(content == null)
                    // {
                    //     var constant = dataObj.constant; 
                    //     if(dataObj.type == 'single')
                    //     { 
                    //         $('#'+placeholder).val(constant); 
                    //     }
                    //     else
                    //     {
                    //         CKEDITOR.instances[placeholder].setData(constant); 
                    //     }

                    // }
                }); 
                console.log('Content : ' +content+ ', => Constant : ' +constant)
            });
              
        }); 
    }


    function saveProposal(type)
    {
        $(function()
        {
            if(confirm('Are you sure you want to save proposal?'))
            {
                var id  = $('#idd'+type).val();
                var proposal_name  = $('#prop_name'+type).val();

                var header = CKEDITOR.instances['header'].getData();
                if(header == ''){ header = '%header%'; }
                var company_name = $('#company_name').val(); 
                if(company_name == ''){ company_name = '%company_name%'; }
                var executive_summary = $('#executive_summary').val(); 
                if(executive_summary == ''){ executive_summary = '%executive_summary%'; } 
                var number_of_days = $('#number_of_days').val(); 
                if(number_of_days == ''){ number_of_days = '%number_of_days%'; }
                var software_add_ons = $('#software_add_ons').val(); 
                if(software_add_ons == ''){ software_add_ons = '%software_add_ons%'; }
                var hcmatrix = $('#hcmatrix').val(); 
                if(hcmatrix == ''){ hcmatrix = '%hcmatrix%'; }
                var palipro = $('#palipro').val();
                if(palipro == ''){ palipro = '%palipro%'; }
                var our_client = $('#our_client').val();
                if(our_client == ''){ our_client = '%our_client%'; }
                var client_lists = CKEDITOR.instances['client_lists'].getData();
                if(client_lists == ''){ client_lists = '%client_lists%'; }
                var assumption = CKEDITOR.instances['assumption'].getData();
                if(assumption == ''){ assumption = '%assumption%'; }
                var subscription_table = CKEDITOR.instances['subscription_table'].getData();
                if(subscription_table == ''){ subscription_table = '%subscription_table%'; }
                var recurring_subscription = $('#recurring_subscription').val();
                if(recurring_subscription == ''){ recurring_subscription = '%recurring_subscription%'; }
                var one_time_subscription = $('#one_time_subscription').val();
                if(one_time_subscription == ''){ one_time_subscription = '%one_time_subscription%'; }
                var third_party_table = CKEDITOR.instances['third_party_table'].getData();
                if(third_party_table == ''){ third_party_table = '%third_party_table%'; }
                var monthly_recurring = $('#monthly_recurring').val();
                if(monthly_recurring == ''){ monthly_recurring = '%monthly_recurring%'; }
                var implementation_table = CKEDITOR.instances['implementation_table'].getData();
                if(implementation_table == ''){ implementation_table = '%implementation_table%'; }
                var project_cost_table = CKEDITOR.instances['project_cost_table'].getData();
                if(project_cost_table == ''){ project_cost_table = '%project_cost_table%'; }
                var signature = $('#signature').val();
                if(signature == ''){ signature = '%signature%'; } 
                var signee_details = CKEDITOR.instances['signee_details'].getData();
                if(signee_details == ''){ signee_details = '%signee_details%'; } 

                var content = $('#hidden_content'+type).val();


                formData = 
                {
                    id:id,
                    proposal_name:proposal_name,
                    header:header,
                    company_name:company_name,
                    executive_summary:executive_summary,
                    number_of_days:number_of_days,
                    software_add_ons:software_add_ons,
                    hcmatrix:hcmatrix,
                    palipro:palipro,
                    our_client:our_client,
                    client_lists:client_lists,
                    assumption:assumption,
                    subscription_table:subscription_table,
                    recurring_subscription:recurring_subscription,
                    one_time_subscription:one_time_subscription,
                    third_party_table:third_party_table,
                    monthly_recurring:monthly_recurring,
                    implementation_table:implementation_table,
                    project_cost_table:project_cost_table,
                    signature:signature,
                    signee_details:signee_details,
                    content:content,
                    _token:'{{csrf_token()}}'
                }  
                $.post('{{route('resolve-proposal-placeholder')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $.get('{{url('reloadPreview')}}?proposal_name=' +proposal_name, function(data)
                        {  //clear 
                            $('#preview'+type).html('');
 
                            $('#preview'+type).html(data.content);
                        });

                        toastr.success(data.message);                   
                    }
                    else{ toastr.error(data.message); }
                });

            }
        });
    }

    function resetProposal(name, type)
    {
        $(function()
        {       
            var proposal_name = name; 
            //clear
            $('#idd'+type).val(''); 
            $('#prop_name'+type).val(''); 
            $('#hidden_content'+type).val(''); 
            $('#preview'+type).html(''); 

            $.get('{{url('getProposalTemplateDetails')}}?proposal_name=' +proposal_name, function(data)
            {  
                //populate
                $('#idd'+type).val(data.id); 
                $('#prop_name'+type).val(data.proposal_name); 
                $('#hidden_content'+type).val(data.content); 
                $('#preview'+type).html(data.content); 
            });
        }); 
    }

    function previewProposal(name, type)
    {
        $(function()
        {       
            var proposal_name = name; 
            //clear
            $('#idd'+type).val(''); 
            $('#prop_name'+type).val(''); 
            $('#hidden_content'+type).val(''); 
            $('#preview'+type).html(''); 

            $.get('{{url('getProposalSectionDetails')}}?proposal_name=' +proposal_name, function(data)
            {  
                //populate
                $('#idd'+type).val(data.id); 
                $('#prop_name'+type).val(data.proposal_name); 
                $('#hidden_content'+type).val(data.content); 
                $('#preview'+type).html(data.content); 
            });
        }); 
    }


    CKEDITOR.config.extraPlugins = "base64image";
    CKEDITOR.replace( 'header' );
    // CKEDITOR.replace( 'company_name' );
    // CKEDITOR.replace( 'executive_summary' );
    // CKEDITOR.replace( 'number_of_days' );
    // CKEDITOR.replace( 'software_add_ons' );
    // CKEDITOR.replace( 'hcmatrix' );
    // CKEDITOR.replace( 'palipro' );
    // CKEDITOR.replace( 'our_client' );
    CKEDITOR.replace( 'client_lists' );
    CKEDITOR.replace( 'assumption' );
    CKEDITOR.replace( 'subscription_table' );
    // CKEDITOR.replace( 'recurring_subscription' );
    // CKEDITOR.replace( 'one_time_subscription' );
    CKEDITOR.replace( 'third_party_table' );
    // CKEDITOR.replace( 'monthly_recurring' );
    CKEDITOR.replace( 'implementation_table' );
    CKEDITOR.replace( 'project_cost_table' );
    // CKEDITOR.replace( 'signature' );
    CKEDITOR.replace( 'signee_details' );


    $(function () 
    {
        $('.summernote').summernote(
        {
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });

    function topFunction() 
    {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
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



<h2 style="margin-left:1px"><span style="font-size:10pt"><span style="font-family:Arial,sans-serif"><span style="color:black"><a name="_Toc44633983"><span style="font-family:&quot;Segoe UI&quot;,sans-serif">7.3 <span style="background-color:yellow">Total Project Cost Summary</span></span></a> </span></span></span></h2>

<table border="1" cellpadding="1" cellspacing="1" class="table table-striped" style="width:600px">
    <tbody>
        <tr>
            <td>SN</td>
            <td>DESCRIPTION</td>
            <td>SOFTWARE $</td>
            <td>IMPLEMENTATION</td>
            <td>ANNUAL SUPPORT</td>
            <td>TOTAL(=N=)</td>
        </tr>
        <tr>
            <td style="text-align:center">1</td>
            <td style="text-align:center">1st Year</td>
            <td style="text-align:center">&nbsp;</td>
            <td style="text-align:center">%mplementation_net_total%</td>
            <td style="text-align:center">FREE</td>
            <td style="text-align:center">&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align:center">2</td>
            <td style="text-align:center">Subsequent Year</td>
            <td style="text-align:center">&nbsp;</td>
            <td style="text-align:center">0</td>
            <td style="text-align:center">&nbsp;</td>
            <td style="text-align:center">&nbsp;</td>
        </tr>
    </tbody>
</table>

<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Note that FX rate applied is $1: =N=%dollar_naira_rate%</span></span></p>















<p><span style="font-size:10pt"><span style="font-family:Arial,sans-serif"><span style="color:black"><a name="_Toc44633982">7.2 <span style="font-size:16px"><span style="background-color:yellow">Implementation &ndash; Professional Services.</span></span></a></span></span></span></p>

<table border="1" cellpadding="1" cellspacing="1" class="table table-striped" style="width:600px">
    <tbody>
        <tr>
            <td>SN</td>
            <td>MODULES</td>
            <td>PHASES/MILESTONE</td>
            <td>COST (=N=)</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Financial Management</td>
            <td>Analysis and detailed Specification</td>
            <td>%financial_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Customization</td>
            <td>%financial_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Implementation (Configuration/Setup/Data Conversion)</td>
            <td>%financial_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Training</td>
            <td>%financial_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Support (Go-live &amp; Post Go-live)</td>
            <td>%financial_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%financial_sub_total%</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Inventory Management</td>
            <td>Analysis and Detailed Speification</td>
            <td>%inventory_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Customization</td>
            <td>%inventory_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Implementation (Configuration/Setup/Data Conversion)</td>
            <td>%inventory_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Training</td>
            <td>%inventory_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Support (Go-live &amp; Post Go-live)</td>
            <td>%inventory_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%inventory_sub_total%</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sales</td>
            <td>Analysis and Detailed Speification</td>
            <td>%sales_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Customization</td>
            <td>%sales_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Implementation (Configuration/Setup/Data Conversion)</td>
            <td>%sales_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Training</td>
            <td>%sales_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Support (Go-live &amp; Post Go-live)</td>
            <td>%sales_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%sales_sub_total%</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Purchasing</td>
            <td>Analysis and Detailed Speification</td>
            <td>%purchasing_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Customization</td>
            <td>%purchasing_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Implementation (Configuration/Setup/Data Conversion)</td>
            <td>%purchasing_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Training</td>
            <td>%purchasing_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Support (Go-live &amp; Post Go-live)</td>
            <td>%purchasing_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%purchasing_sub_total%</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Palipro Contract &amp; Document Mgt Software</td>
            <td>Analysis and Detailed Speification</td>
            <td>%palipro_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Customization</td>
            <td>%palipro_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Implementation (Configuration/Setup/Data Conversion)</td>
            <td>%palipro_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Training</td>
            <td>%palipro_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Support (Go-live &amp; Post Go-live)</td>
            <td>%palipro_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%palipro_sub_total%</td>
        </tr>
        <tr>
            <td>6</td>
            <td>HRM &amp; Payroll</td>
            <td>Analysis and Detailed Speification</td>
            <td>%hrm_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Customization</td>
            <td>%hrm_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Implementation (Configuration/Setup/Data Conversion)</td>
            <td>%hrm_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Training</td>
            <td>%hrm_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Support (Go-live &amp; Post Go-live)</td>
            <td>%hrm_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%hrm_sub_total%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Infrastructure Setup</td>
            <td>Azure Configuration</td>
            <td>%infrastructure_naira_1%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Business Central Installation</td>
            <td>%infrastructure_naira_2%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>OS and Database Installation</td>
            <td>%infrastructure_naira_3%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Antivirus&nbsp;Installation</td>
            <td>%infrastructure_naira_4%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Application Publishing</td>
            <td>%infrastructure_naira_5%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Mobile App Setup</td>
            <td>%infrastructure_naira_6%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Sub Total</strong></td>
            <td>%infrastructure_sub_total%</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="text-align:right"><strong>Net Total</strong></td>
            <td>%mplementation_net_total%</td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>

<p>&nbsp;</p>
