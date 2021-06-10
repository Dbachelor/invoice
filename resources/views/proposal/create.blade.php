 @extends('layouts.app')

@section('content')


<style>
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }

    .stay
    {
        background: #3c8dbc !important;
        color: #ffffff !important;
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
        height: 20px;
        width: 20px;
        background-color: #999;
        border-radius: 50%;
        margin-top: 2px;
      }

      /* On mouse-over, add a grey background color */
      .container:hover input ~ .checkmark
      {
        background-color: #ccc;
      }

      /* When the radio button is checked, add a blue background */
      .container input:checked ~ .checkmark
      {
        background-color: #3c8dbc;
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
        top: 6px;
        left: 6px;
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: white;
      }





     /* for checked*/

      /* Create a custom radio button */
      .checked
      {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #999;
        border-radius: 15%;
        margin-top: 2px;
      }

      /* On mouse-over, add a grey background color */
      .container:hover input ~ .checked
      {
        background-color: #ccc;
      }

      /* When the radio button is checked, add a blue background */
      .container input:checked ~ .checked
      {
        background-color: #3c8dbc;
      }

      /* Create the indicator (the dot/circle - hidden when not checked) */
      .checked:after
      {
        content: "";
        position: absolute;
        display: none;
      }

      /* Show the indicator (dot/circle) when checked */
      .container input:checked ~ .checked:after
      {
        display: block;
      }

      /* Style the indicator (dot/circle) */
      .container .checked:after
      {
        top: 6px;
        left: 6px;
        width: 9px;
        height: 9px;
        border-radius: 15%;
        background: white;
      }

     /* for checked*/







      .check-label
      {
          font-size: 14px;
          font-weight: lighter;
          margin-top: -5px;
      }

      .tab-content
      {
          height: auto !important;
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
                    <h4 class="mt-0 header-title"><i class="dripicons-gear" style="margin-top: -25px"></i>
                        <div class="row">
                            <div class="col-md-12"> Create New Proposal
{{--                                <select class="form-control pull-right" name="" id="comp_detail" style="width: 30%;">--}}
{{--                                    <option value="">Select Proposal</option>--}}
{{--                                        @forelse($company_details as $company_detail)--}}
{{--                                            <option value="{{$company_detail->id}}"> {{$company_detail->company_name}} </option>--}}
{{--                                        @empty--}}
{{--                                    @endforelse--}}
{{--                                </select>--}}
                            </div>
                        </div>
                    </h4>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->


                    <div id="smartwizard">
                        <ul class="nav">
                            <li>
                                <a class="nav-link" href="#step-1"> Company Info </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-2"> Project & Software Details </a>
                           </li>
                           <li>
                                <a class="nav-link" href="#step-3"> Subscription Section </a>
                           </li>
                           <li>
                                <a class="nav-link" href="#step-4"> Third Party Software </a>
                           </li>
                           <li>
                                <a class="nav-link" href="#step-5"> Implementation </a>
                           </li>
                           <li>
                                <a class="nav-link" href="#step-6"> Other Documents </a>
                           </li>
                        </ul>

                        <div class="tab-content" style="height: auto !important;">

                            {{-- COMPANY DETAILS --}}
                            <div id="step-1" class="tab-pane" role="tabpanel">
                            <form id="companyForm" action="{{ url('/add-proposal-company-details') }}" enctype="multipart/form-data" method="POST">  @csrf
                                <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Company Details</legend>
                                        <div class="box-body">
                                        <!-- Minimal style -->

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p class="help-block">Upload company logo here.</p>
                                                    <input type="hidden" class="form-control" name="id" id="comp_id" value="">
                                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">
                                                    <textarea rows="2" class="form-control" name="company_logo" id="company_logo">{!! $company_details->company_logo !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Executive Summary</legend>
                                        <div class="box-body">
                                        <!-- Minimal style -->

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p class="help-block">Enter executive summary here.</p>
                                                    <input type="text" class="form-control" name="company_name" id="company_name">  <br>
                                                    <textarea rows="13" class="form-control" name="executive_summary" id="executive_summary"></textarea>  <br>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 50px;">
                                    <button type="submit" id="companyBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Company Details</button>
                                </div>
                            </form>
                            </div>


                            {{-- PROJECT DETAILS --}}
                            <div id="step-2" class="tab-pane" role="tabpanel">
                            <form id="addOnForm" action="" method="POST">  @csrf
                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Project Duration & Add-ons</legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12" style="margin-bottom: 20px">

                                                    <input type="hidden" name="id" id="id_duration" value="">
                                                    <input type="hidden" name="section" id="section_duration" value="duration">
                                                    <input type="hidden" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">
                                                    <input type="hidden" name="title" id="title_duration" value="Do you what to add project duration?">

                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <p class="help-block" >Do you what to add project duration?</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                            <input type="radio" name="duration" id="duration_yes" class="p_add_on" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                            <input type="radio" name="duration" id="duration_no" class="p_add_on" value="0">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div class="form-group" id="duration_div" style="display: none;">
                                                        <label for="project_duration" class="col-sm-4 col-form-label"> Project Duration </label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="project_duration" id="project_duration" required>
                                                                <option value=""> </option>
                                                                <option value="Fifteen (15) Days"> Fifteen (15) Days</option>
                                                                <option value="Thirty (30) Days"> Thirty (30) Days</option>
                                                                <option value="Fourty-five (45) Days"> Fourty-five (45) Days</option>
                                                                <option value="Sixty (60) Days"> Sixty (60) Days</option>
                                                                <option value="Seventy-five (75) Days"> Seventy-five (75) Days</option>
                                                                <option value="Ninety 90 Days"> Ninety 90 Days</option>
                                                                <option value="One hundred & five (105) Days"> One hundred & five (105) Days</option>
                                                                <option value="One hundred & twenty (120) Days"> One hundred & twenty (120) Days</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 col-xs-9 no-pad">
                                                        <input type="hidden" name="section" id="section_add_on" value="add_on">
                                                        <input type="hidden" name="title" id="title_add_on" value="Would you like to add third party add-ons?">
                                                        <p class="help-block">Would you like to add third party add-ons?</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                            <input type="radio" name="add_on" id="add_on_yes" class="p_add_on" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                            <input type="radio" name="add_on" id="add_on_no" class="p_add_on" value="0">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div id="add_on_div" class="no-pad" style="display: none; margin-top: 60px;">
                                                        <table class="table table-condense" style="width: 100%">
                                                                <tr>
                                                                    <td style="width: 5%">
                                                                        <input type="hidden" name="category" id="category_software" value="software">
                                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label" style="color: #fff">  </span>
                                                                            <input type="checkbox" name="software" id="hcmatrix" class="addition" value="1">
                                                                            <span class="checked"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td style="width: 95%"> <p class="help-block">HCMatrix – Human Capital Solution with Payroll solution</p>
                                                                        <input type="hidden" name="title" id="title_hcmatrix" value="HCMatrix – Human Capital Solution with Payroll solution">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 5%">
                                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label" style="color: #fff">  </span>
                                                                            <input type="checkbox" name="software" id="palipro" class="addition" value="1">
                                                                            <span class="checked"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td style="width: 95%">  <p class="help-block">PALIPRO - Contract and Document Management Solution</p>

                                                                        <input type="hidden" name="title" id="title_palipro" value="PALIPRO - Contract and Document Management Solution">
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Client List & Assumptions</legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 col-xs-10 no-pad">
                                                        <input type="hidden" name="id" id="id_duration" value="">
                                                        <input type="hidden" name="section" id="section_client" value="client">
                                                        <input type="hidden" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">
                                                        <input type="hidden" name="title" id="title_client" value="Would you like to add client list & Assumptions?">

                                                        <p class="help-block">Would you like to add client list & Assumptions?</p>
                                                    </div>

                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <label class="container col-md-4 col-xs-12">
                                                            <span class="check-label"> Yes </span>
                                                            <input type="radio"name="client" id="client_yes" class="p_add_on" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container col-md-8 col-xs-6">
                                                            <span class="check-label"> No </span>
                                                            <input type="radio" name="client" id="client_no" class="p_add_on" value="0">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div id="client_div" style="display: none;">
                                                        <ol>
                                                            <li>Prime Atlantic Limited</li>
                                                            <li>Kudi</li>
                                                            <li>West Atlantic Energy Limited</li>
                                                            <li>Synerpet</li>
                                                            <li>Cinalt Resources Limited</li>
                                                            <li>Prime Atlantic Global Instruments</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 60px;">
                                        <button type="submit" id="addOnBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </div>
                            </form>
                            </div>


                            {{-- SUBSCRIPTION DETAILS --}}
                            <div id="step-3" class="tab-pane" role="tabpanel">
                                <form id="subscriptionForm" action="{{ url('/add-proposal-includes') }}" method="POST">  @csrf
                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">ERP USERS - Subscription</legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-2 col-xs-12 no-pad"> Qty </div>
                                                    <div class="col-md-3 col-xs-12 no-pad"> Monthly Rate ($)</div>

                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                    <input type="hidden" name="id" id="id_subscription" value="">
                                                    <input type="hidden" name="section" id="section_subscription" value="subscription">
                                                    <input type="hidden" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">
                                                    <input type="hidden" name="count" id="count_subscription" value="11">

                                                    <p class="help-block">No of users for Dyn365 Business Central Premium ?</p>
                                                    <input type="hidden" name="title_1" id="title_1" value="No of users for Dyn365 Business Central Premium ?">
                                                    <input type="hidden" name="placeholder_1" id="placeholder_1" value="%erp_user_qty_1%">
                                                    </div>

                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_1" id="value_1">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_1" id="monthly_1" value="44.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block" name="title_2" id="title_2">No of users for Dyn365 Business Central Essentials ?</p>
                                                    <input type="hidden" name="title_2" id="title_2" value="No of users for Dyn365 Business Central Essentials ?">
                                                    <input type="hidden" name="placeholder_2" id="placeholder_2" value="%erp_user_qty_2%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_2" id="value_2">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_2" id="monthly_2" value="30.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block" name="title_3" id="title_3">No of users for Dyn365 Business Central Members ?</p>
                                                    <input type="hidden" name="title_3" id="title_3" value="No of users for Dyn365 Business Central Members ?">
                                                    <input type="hidden" name="placeholder_3" id="placeholder_3" value="%erp_user_qty_3%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_3" id="value_3">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_3" id="monthly_3" value="5.30" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">DATABASES - Subscription</legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-2 col-xs-12 no-pad"> Qty </div>
                                                    <div class="col-md-3 col-xs-12 no-pad"> Monthly Rate ($)</div>

                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">Sql Server Standard license (Annual Cost) ?</p>
                                                    <input type="hidden" name="title_4" id="title_4" value="Sql Server Standard license (Annual Cost) ?">
                                                    <input type="hidden" name="placeholder_4" id="placeholder_4" value="%db_1%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_4" id="value_4">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_4" id="monthly_4" value="931.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">Sql Standard CAL (Annual Cost) ?</p>
                                                    <input type="hidden" name="title_5" id="title_5" value="Sql Standard CAL (Annual Cost) ?">
                                                    <input type="hidden" name="placeholder_5" id="placeholder_5" value="%db_2%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_5" id="value_5">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_5" id="monthly_5" value="235.0" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">CONFIGURATION AND DEVELOPMENT - Subscription</legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-2 col-xs-12 no-pad"> Qty </div>
                                                    <div class="col-md-3 col-xs-12 no-pad"> Monthly Rate ($)</div>

                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of users for Dyn365 Business Central Tables (10) ?</p>
                                                    <input type="hidden" name="title_6" id="title_6" value="No of users for Dyn365 Business Central Tables (10) ?">
                                                    <input type="hidden" name="placeholder_6" id="placeholder_6" value="%config_qty_1%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_6" id="value_6">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_6" id="monthly_6" value="12.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of users for Dyn365 Business Central Pages (100) ?</p>
                                                    <input type="hidden" name="title_7" id="title_7" value="No of users for Dyn365 Business Central Pages (100) ?">
                                                    <input type="hidden" name="placeholder_7" id="placeholder_7" value="%config_qty_2%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_7" id="value_7">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_7" id="monthly_7" value="12.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of users for Dyn365 Business Central Reports (100) ?</p>
                                                    <input type="hidden" name="title_8" id="title_8" value="No of users for Dyn365 Business Central Reports (100) ?">
                                                    <input type="hidden" name="placeholder_8" id="placeholder_8" value="%config_qty_3%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_8" id="value_8">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_8" id="monthly_8" value="12.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of users for Dyn365 Business Central Codeunits (100) ?</p>
                                                    <input type="hidden" name="title_9" id="title_9" value="No of users for Dyn365 Business Central Codeunits (100) ?">
                                                    <input type="hidden" name="placeholder_9" id="placeholder_9" value="%config_qty_4%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_9" id="value_9">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_9" id="monthly_9" value="12.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of users for Dyn365 Business Central XML Ports (100) ?</p>
                                                    <input type="hidden" name="title_10" id="title_10" value="No of users for Dyn365 Business Central XML Ports (100) ?">
                                                    <input type="hidden" name="placeholder_10" id="placeholder_10" value="%config_qty_5%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_10" id="value_10">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_10" id="monthly_10" value="12.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of users for Dyn365 Business Central Queries (100) ?</p>
                                                    <input type="hidden" name="title_11" id="title_11" value="No of users for Dyn365 Business Central Queries (100) ?">
                                                    <input type="hidden" name="placeholder_11" id="placeholder_11" value="%config_qty_6%">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_11" id="value_11">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_11" id="monthly_11" value="12.0" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 60px;">
                                    <button type="submit" id="subscriptionBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                </div>
                                </form>
                            </div>


                            {{-- THIRD PARTY SOFTWARE --}}
                            <div id="step-4" class="tab-pane" role="tabpanel">
                            <form id="thirdPartyForm" action="{{ url('/add-proposal-includes') }}" method="POST">  @csrf
                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> HCMATRIX </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-7 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-2 col-xs-12 no-pad"> Qty </div>
                                                    <div class="col-md-3 col-xs-12 no-pad"> Monthly Rate ($)</div>

                                                    <div class="col-md-7 col-xs-12 no-pad">

                                                    <input type="hidden" name="id" id="id_third_party" value="">
                                                    <input type="hidden" name="section" id="section_third_party" value="third_party">
                                                    <input type="hidden" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">
                                                    <input type="hidden" name="count" id="count_third_party" value="3">

                                                        <p class="help-block">No of Admin Users (Annual Recurring) ?</p>
                                                    <input type="hidden" name="title_1" id="title_1" value="No of Admin Users (Annual Recurring) ?">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_1" id="value_1">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_1" id="monthly_1" value="6.0" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">No of Team Member (Annual Recurring) ?</p>
                                                    <input type="hidden" name="title_2" id="title_2" value="No of Team Member (Annual Recurring) ?">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_2" id="value_2">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_2" id="monthly_2" value="3.0" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> PALIPRO </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-7 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-2 col-xs-12 no-pad"> Qty </div>
                                                    <div class="col-md-3 col-xs-12 no-pad"> Monthly Rate ($)</div>

                                                    <div class="col-md-7 col-xs-12 no-pad">
                                                        <p class="help-block">Standard Subscription fee ?</p>
                                                        <input type="hidden" name="title_3" id="title_3" value="Standard Subscription fee ?">
                                                    </div>
                                                    <div class="col-md-2 col-xs-12 no-pad">
                                                        <input type="number" class="form-control val" name="value_3" id="value_3">
                                                    </div>
                                                    <div class="col-md-3 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_3" id="monthly_3" value="4.20" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 60px;">
                                    <button type="submit" id="thirdPartyBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                </div>
                            </form>
                            </div>


                            {{-- Implementation – Professional Services --}}
                            <div id="step-5" class="tab-pane" role="tabpanel">
                            <form id="implementationForm" action="{{ url('/add-proposal-includes') }}" method="POST">  @csrf

                                <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 60px;">
                                    <button type="submit" id="implementationBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                </div>

                              <div id="first" style="">
                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Financial Management </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_fin_mgt" value="Financial Management">
                                                            <input type="checkbox" name="implementation" id="fin_mgt" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                    <input type="hidden" name="id" id="id_implementation" value="">
                                                    <input type="hidden" name="section" id="section_implementation" value="implementation">
                                                    <input type="hidden" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">
                                                    <input type="hidden" name="count" id="count_implementation" value="36">
                                                    <input type="hidden" name="count" id="count_implementation" value="36">

                                                        <p class="help-block"> Analysis and detailed Specification </p>
                                                    <input type="hidden" name="title_1" id="title_1" value="Analysis and detailed Specification_1">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_1" id="monthly_1" value="500000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Customization </p>
                                                    <input type="hidden" name="title_2" id="title_2" value="Customization_2">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_2" id="monthly_2" value="0.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Configuration/Setup/Data Conversion </p>
                                                    <input type="hidden" name="title_3" id="title_3" value="Configuration/Setup/Data Conversion_3">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_3" id="monthly_3" value="2600000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Training </p>
                                                    <input type="hidden" name="title_4" id="title_4" value="Training_4">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_4" id="monthly_4" value="600000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Support (Go-live & Post Go-live) </p>
                                                    <input type="hidden" name="title_5" id="title_5" value="Support (Go-live & Post Go-live)_5">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_5" id="monthly_5" value="450000.00" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Inventory Management </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_ive_mgt" value="Inventory Management">
                                                            <input type="checkbox" name="implementation" id="ive_mgt" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                        <p class="help-block"> Analysis and detailed Specification </p>
                                                    <input type="hidden" name="title_6" id="title_6" value="Analysis and detailed Specification_6">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_6" id="monthly_6" value="500000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Customization </p>
                                                    <input type="hidden" name="title_7" id="title_7" value="Customization_7">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_7" id="monthly_7" value="0.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Configuration/Setup/Data Conversion </p>
                                                    <input type="hidden" name="title_8" id="title_8" value="Configuration/Setup/Data Conversion_8">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_8" id="monthly_8" value="1100000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Training </p>
                                                    <input type="hidden" name="title_9" id="title_9" value="Training_9">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_9" id="monthly_9" value="600000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Support (Go-live & Post Go-live) </p>
                                                    <input type="hidden" name="title_10" id="title_10" value="Support (Go-live & Post Go-live)_10">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_10" id="monthly_10" value="450000.00" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Sales </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_sales" value="Sales">
                                                            <input type="checkbox" name="implementation" id="sales" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                        <p class="help-block"> Analysis and detailed Specification </p>
                                                    <input type="hidden" name="title_11" id="title_11" value="Analysis and detailed Specification_11">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_11" id="monthly_11" value="500000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Customization </p>
                                                    <input type="hidden" name="title_12" id="title_12" value="Customization_12">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_12" id="monthly_12" value="0.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Configuration/Setup/Data Conversion </p>
                                                    <input type="hidden" name="title_13" id="title_13" value="Configuration/Setup/Data Conversion_13">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_13" id="monthly_13" value="1100000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Training </p>
                                                    <input type="hidden" name="title_14" id="title_14" value="Training_14">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_14" id="monthly_14" value="450000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Support (Go-live & Post Go-live) </p>
                                                    <input type="hidden" name="title_15" id="title_15" value="Support (Go-live & Post Go-live)_15">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_15" id="monthly_15" value="450000.00" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <button type="button" class="btn btn-primary pull-right" id="next_second">Next</button>

                                </div>

                              </div>


                              <div id="second" style="display: none;">
                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Purchasing </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_purchase" value="Purchase">
                                                            <input type="checkbox" name="implementation" id="purchase" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                        <p class="help-block"> Analysis and detailed Specification </p>
                                                    <input type="hidden" name="title_16" id="title_16" value="Analysis and detailed Specification_16">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_16" id="monthly_16" value="500000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Customization </p>
                                                    <input type="hidden" name="title_17" id="title_17" value="Customization_17">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_17" id="monthly_17" value="0.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Configuration/Setup/Data Conversion </p>
                                                    <input type="hidden" name="title_18" id="title_18" value="Configuration/Setup/Data Conversion_18">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_18" id="monthly_18" value="22000000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Training </p>
                                                    <input type="hidden" name="title_19" id="title_19" value="Training_19">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_19" id="monthly_19" value="300000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Support (Go-live & Post Go-live) </p>
                                                    <input type="hidden" name="title_20" id="title_20" value="Support (Go-live & Post Go-live)_20">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_20" id="monthly_20" value="450000.00" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Palipro Contract Mgt Software </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_pali_contract_mgt" value="Palipro Contract Mgt Software">
                                                            <input type="checkbox" name="implementation" id="pali_contract_mgt" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                        <p class="help-block"> Analysis and detailed Specification </p>
                                                    <input type="hidden" name="title_21" id="title_21" value="Analysis and detailed Specification_21">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_21" id="monthly_21" value="250000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Customization </p>
                                                    <input type="hidden" name="title_22" id="title_22" value="Customization_22">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_22" id="monthly_22" value="0.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Configuration/Setup/Data Conversion </p>
                                                    <input type="hidden" name="title_23" id="title_23" value="Configuration/Setup/Data Conversion_23">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_23" id="monthly_23" value="2500000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Training </p>
                                                    <input type="hidden" name="title_24" id="title_24" value="Training_24">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_24" id="monthly_24" value="300000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Support (Go-live & Post Go-live) </p>
                                                    <input type="hidden" name="title_25" id="title_25" value="Support (Go-live & Post Go-live)_25">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_25" id="monthly_25" value="450000.00" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> HRM Payroll </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_hrm_payroll" value="HCMatrix Payroll">
                                                            <input type="checkbox" name="implementation" id="hrm_payroll" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                        <p class="help-block"> Analysis and detailed Specification </p>
                                                    <input type="hidden" name="title_26" id="title_26" value="Analysis and detailed Specification_26">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_26" id="monthly_26" value="800000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Customization </p>
                                                    <input type="hidden" name="title_27" id="title_27" value="Customization_27">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_27" id="monthly_27" value="0.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Configuration/Setup/Data Conversion </p>
                                                    <input type="hidden" name="title_28" id="title_28" value="Configuration/Setup/Data Conversion_28">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_28" id="monthly_28" value="3200000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Training </p>
                                                    <input type="hidden" name="title_29" id="title_29" value="Training_29">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_29" id="monthly_29" value="300000.00" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Support (Go-live & Post Go-live) </p>
                                                    <input type="hidden" name="title_30" id="title_30" value="Support (Go-live & Post Go-live)_30">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_30" id="monthly_30" value="200000.00" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <button type="button" class="btn btn-primary pull-right" style="margin-left: 5px" id="next_third">Next</button>
                                    <button type="button" class="btn btn-primary pull-right" id="prev_first">Prevous</button>

                                </div>
                              </div>


                              <div id="third" style="display: none;">
                                <div class="col-md-4 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Infrastructure Setup </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12 col-xs-12 no-pad">
                                                        <label class="container col-md-12 col-xs-12"> <span class="check-label"> Include this Module? </span>
                                                            <input type="hidden" name="category" id="category_implementation" value="implementation">
                                                            <input type="hidden" name="title" id="title_infra" value="Infrastructure Setup">
                                                            <input type="checkbox" name="implementation" id="infra" class="addition" value="1">
                                                            <span class="checked"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-8 col-xs-12 no-pad"> Title</div>
                                                    <div class="col-md-4 col-xs-12 no-pad"> Cost (N)</div>

                                                    <div class="col-md-8 col-xs-12 no-pad">

                                                        <p class="help-block"> Azure Configuration </p>
                                                    <input type="hidden" name="title_31" id="title_31" value="Azure Configuration_31">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_31" id="monthly_31" value="341666.67" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Business Central Installation </p>
                                                    <input type="hidden" name="title_32" id="title_32" value="Business Central Installation_32">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_32" id="monthly_32" value="341666.67" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> OS & Database Installation </p>
                                                    <input type="hidden" name="title_33" id="title_33" value="OS & Database Installation_33">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_33" id="monthly_33" value="341666.67" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Antivirus Installation </p>
                                                    <input type="hidden" name="title_34" id="title_34" value="Antivirus Installation_34">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_34" id="monthly_34" value="341666.67" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Application Publishing </p>
                                                    <input type="hidden" name="title_35" id="title_35" value="Application Publishing_35">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_35" id="monthly_35" value="341666.67" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-md-8 col-xs-12 no-pad">
                                                        <p class="help-block"> Mobile App Setup </p>
                                                    <input type="hidden" name="title_36" id="title_36" value="Mobile App Setup_36">
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 no-pad">
                                                        <input type="number" class="form-control" name="monthly_36" id="monthly_36" value="341666.67" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <button type="button" class="btn btn-primary pull-right" id="prev_second">Prevous</button>

                                </div>
                              </div>
                            </form>
                            </div>



                            {{-- BID DOCUMENT --}}
                            <div id="step-6" class="tab-pane" role="tabpanel">
                            <form id="bidForm" action="{{ url('/add-proposal-includes') }}" method="POST">  @csrf
                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Bid Documents </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <input type="hidden" name="id" id="id_bid" value="">
                                                    <input type="hidden" name="section" id="section_bid" value="bid">
                                                    <input type="hidden" name="proposal_name" id="proposal_name" value="Enterprise Resource Planning">

                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <p class="help-block" >Do you what to attach bid document?</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                            <input type="radio" name="bid" id="bid_yes" class="bid" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                            <input type="radio" name="bid" id="bid_no" class="bid" value="0">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div id="bid_div" class="row no-pad" style="display: none;">
                                                        <div class="col-md-12 pull-right">
                                                            <table>@php $i = 1; @endphp
                                                                @forelse($documents as $document)
                                                                    <tr>
                                                                        <td>
                                                                            <label class="container col-md-4 col-xs-12"> <span class="check-label" style="color: #fff"> Yes </span>
                                                                            <input type="checkbox" name="bid" id="bid_{{$i}}" class="bid check_b submit_bid" value="1">
                                                                            <input type="hidden" name="title" id="bp_title_{{$i}}" value="{{$document->document_name}}">
                                                                            <input type="hidden" name="idd" id="idd" value="{{$i}}">
                                                                            <span class="checked"></span>
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <p class="help-block" >{{$document->document_name}}</p>
                                                                        </td>
                                                                    </tr>@php $i++; @endphp
                                                                @empty
                                                                @endforelse
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 pull-left">

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Consultant Profiles </legend>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <div class="col-sm-12">

                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <p class="help-block" >Do you what to attach consultant Profile?</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-12 no-pad">
                                                        <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                            <input type="radio" name="profile" id="profile_yes" class="profile" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                        <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                            <input type="radio" name="profile" id="profile_no" class="profile" value="0">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div id="profile_div" class="row no-pad" style="display: none;">
                                                        <div class="col-md-12 pull-right">
                                                            <table>@php $i = 10; @endphp
                                                                @forelse($profiles as $profile)
                                                                    <tr>
                                                                        <td>
                                                                            <label class="container col-md-4 col-xs-12"> <span class="check-label" style="color: #fff"> Yes </span>
                                                                            <input type="checkbox" name="bid" id="profile_{{$i}}" class="profile check_p submit_profile" value="1">
                                                                            <input type="hidden" name="title" id="bp_title_{{$i}}" value="{{$profile->name}}">
                                                                            <input type="hidden" name="idd" id="idd" value="{{$i}}">
                                                                            <span class="checked"></span>
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <p class="help-block" >{{$profile->name}} Profile</p>
                                                                        </td>
                                                                    </tr>@php $i++; @endphp
                                                                @empty
                                                                @endforelse
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 60px;">
                                    <button type="button" id="bidBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>

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
        //main tabs
        $('#comp_info_btn').click(function()
        {
            $(".btn-default").removeClass("stay");    $("#comp_info_btn").addClass("stay");
            $('#comp_info').show();    $('#proj_info').hide();    $('#sub_info').hide();    $('#cost_info').hide();
        });

        $('#proj_info_btn').click(function()
        {
            $(".btn-default").removeClass("stay");    $("#proj_info_btn").addClass("stay");
            $('#proj_info').show();    $('#comp_info').hide();    $('#sub_info').hide();    $('#cost_info').hide();
        });

        $('#sub_info_btn').click(function()
        {
            $(".btn-default").removeClass("stay");    $("#sub_info_btn").addClass("stay");
            $('#sub_info').show();    $('#comp_info').hide();    $('#proj_info').hide();    $('#cost_info').hide();
        });

        $('#cost_info_btn').click(function()
        {
            $(".btn-default").removeClass("stay");    $("#sub_info_btn").addClass("stay");
            $('#cost_info').show();    $('#proj_info').hide();    $('#comp_info').hide();    $('#sub_info').hide();
        });



        //project duration
        $('#duration_yes').click(function() {  $('#duration_div').show(); });
        $('#duration_no').click(function() {  $('#duration_div').hide(); });

        //third party add_on
        $('#add_on_yes').click(function() {  $('#add_on_div').show(); });
        $('#add_on_no').click(function() {  $('#add_on_div').hide(); });

        //client
        $('#client_yes').click(function() {  $('#client_div').show(); });
        $('#client_no').click(function() {  $('#client_div').hide(); });

        //bid
        $('#bid_yes').click(function() {  $('#bid_div').show(); });
        $('#bid_no').click(function() {  $('#bid_div').hide(); });

        //profile
        $('#profile_yes').click(function() {  $('#profile_div').show(); });
        $('#profile_no').click(function() {  $('#profile_div').hide(); });




        //hide and show implementation
        $('#next_second').click(function() {  $('#second').show();  $('#first').hide();  $('#third').hide(); });
        $('#next_third').click(function() {  $('#third').show();  $('#second').hide();  $('#first').hide(); });
        $('#prev_second').click(function() {  $('#second').show();  $('#first').hide();  $('#third').hide(); });
        $('#prev_first').click(function() {  $('#first').show();  $('#second').hide();  $('#third').hide(); });


        //set defualt value
        $('.val').val('0');

        $('#bid_no').on('click', function(e)
        {
            $('.check_b').prop('checked', false);
        });

        $('#profile_no').on('click', function(e)
        {
            $('.check_p').prop('checked', false);
        });

    });





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

    function loadCompanyDetails(id)
    {
        $('#comp_id').val('');
        $('#company_name').val('');
        $('#executive_summary').val('');

        $.get('{{url('getCompanyDetails')}}?id=' +id, function(data)
        {
            $('#comp_id').val(data.id);
            $('#company_name').val(data.company_name);
            $('#executive_summary').val(data.executive_summary);
        });
    }

    //save company details
    $(function()
    {
        $('#comp_detail').on('change', function(e)
        {
            var id = $(this).val();
            loadCompanyDetails(id);
        });
    });






    //PROCESSING FORM DATA
    $("#companyBtn").on('click', function(e)
    {
        e.preventDefault();
        proposal_name = $('#proposal_name').val();
        company_name = $('#company_name').val();
        executive_summary = $('#executive_summary').val();
        company_logo = CKEDITOR.instances['company_logo'].getData();
        formData =
            {
                proposal_name:proposal_name,
                company_name:company_name,
                executive_summary:executive_summary,
                company_logo:company_logo,
                _token:'{{csrf_token()}}'
            }
        $.post('{{route('add-proposal-company-details')}}', formData, function(data, status, xhr)
        {
            if(data.status=='success')
            {
                toastr.success(data.message);
            }
            else{ toastr.error(data.message); };
        });

        $('#smartwizard').smartWizard("next");
    });



    //PROCESSING FORM DATA
    $("#subscriptionForm").on('submit', function(e)
    {
        e.preventDefault();
        processForm('subscriptionForm', "{{url('/add-subscription')}}");

        $('#smartwizard').smartWizard("next");
        // $(".val").val('');
    });

    //PROCESSING FORM DATA
    $("#thirdPartyForm").on('submit', function(e)
    {
        e.preventDefault();
        processForm('thirdPartyForm', "{{url('/add-subscription')}}");

        $('#smartwizard').smartWizard("next");
        // $(".val").val('');
    });

    //PROCESSING FORM DATA
    $("#implementationForm").on('submit', function(e)
    {
        e.preventDefault();
        if(confirm('Are you sure you want to save details?'))
        {
          processForm('implementationForm', "{{url('/add-subscription')}}");
        }

        $('#smartwizard').smartWizard("next");

        // $(".val").val('');
    });




    //Submit Addon
    $("#addOnForm").on('submit', function(e)
    {
        e.preventDefault();
        proposal_name = $('#proposal_name').val();
        project_duration = $('#project_duration').val();
        formData =
        {
            proposal_name:proposal_name,
            project_duration:project_duration,
            _token:'{{csrf_token()}}'
        }
        $.post('{{route('update-project-duration')}}', formData, function(data, status, xhr)
        {
            if(data.status=='success')
            {
                toastr.success(data.message);
            }
            else{ toastr.error(data.message); };
        });

        $('#smartwizard').smartWizard("next");
    });

    //Submit document
    $("#bidBtn").on('click', function(e)
    {
        $('#smartwizard').smartWizard("next");
    });

    //Submit Addon
    $("#subscriptionBtn").on('click', function(e)
    {
        $('#smartwizard').smartWizard("next");
    });




    $(function()
    {
        $('.p_add_on').click(function(e)
        {
            var type = $(this).attr("name");
            var name = $(this).attr("id");

            // id = $('#id').val();
            proposal_name = $('#proposal_name').val();
            section = $('#section_'+type).val();
            title = $('#title_'+type).val();
            answer = $('#'+name).val();
            formData =
            {
                proposal_name:proposal_name,
                section:section,
                title:title,
                answer:answer,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('add-proposal-includes')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    $('#id'+name).val('');

                    toastr.success(data.message);
                }
                else{ toastr.error(data.message); };
            });

        });


        //bid
        $('.submit_bid').change(function(e)
        {
            var chk = $(this).is(':checked') ? 'checked' : 'unchecked';
            if(chk == 'checked'){ var answer = 1; }else if(chk == 'unchecked'){ var answer = 0; }

            var type = $(this).attr("name");
            var name = $(this).attr("id");
            var idd = name.substring(4);

            // id = $('#id').val();
            proposal_name = $('#proposal_name').val();
            section = $('#section_'+type).val();
            title = $('#bp_title_'+idd).val();
            formData =
            {
                proposal_name:proposal_name,
                section:section,
                title:title,
                answer:answer,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('add-proposal-includes')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    $('#id'+name).val('');

                    toastr.success(data.message);
                }
                else{ toastr.error(data.message); };
            });

        });


        //profile
        $('.submit_profile').change(function(e)
        {
            var chk = $(this).is(':checked') ? 'checked' : 'unchecked';
            if(chk == 'checked'){ var answer = 1; }else if(chk == 'unchecked'){ var answer = 0; }

            var type = $(this).attr("name");
            var name = $(this).attr("id");
            var idd = name.substring(8);

            // id = $('#id').val();
            proposal_name = $('#proposal_name').val();
            section = $('#section_'+type).val();
            title = $('#bp_title_'+idd).val();
            formData =
            {
                proposal_name:proposal_name,
                section:section,
                title:title,
                answer:answer,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('add-proposal-includes')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    $('#id'+name).val('');

                    toastr.success(data.message);
                }
                else{ toastr.error(data.message); };
            });

        });


        //additions
        $('.addition').click(function(e)
        {
            var chk = $(this).is(':checked') ? 'checked' : 'unchecked';
            if(chk == 'checked'){ var answer = 1; }else if(chk == 'unchecked'){ var answer = 0; }

            var type = $(this).attr("name");
            var name = $(this).attr("id");

            // id = $('#id').val();
            proposal_name = $('#proposal_name').val();
            section = $('#category_'+type).val();
            title = $('#title_'+name).val();
            formData =
                {
                    proposal_name:proposal_name,
                    section:section,
                    title:title,
                    answer:answer,
                    _token:'{{csrf_token()}}'
                }
            $.post('{{route('add-proposal-additions')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    $('#id'+name).val('');

                    toastr.success(data.message);
                }
                else{ toastr.error(data.message); };
            });

        });
    });


    CKEDITOR.config.extraPlugins = "base64image";
    CKEDITOR.replace( 'company_logo' );

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
