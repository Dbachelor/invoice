 @extends('layouts.app')

@section('content')


<style>
    @media print {
        .no-print, .no-print * {
            display: none !important;
        }
    }

    fieldset.scheduler-border 
    {
        border: 1px groove #fff !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #ddd;
                box-shadow:  0px 0px 0px 0px #ddd;
    }

    legend.scheduler-border 
    {
        font-size: 1.2em !important;
        font-weight: lighter !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }

    .no-pad
    {
         padding: 0px !important;
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

      .check-label
      {
          font-size: 14px;
          font-weight: lighter;
          margin-top: -5px;
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

                    <div id="smartwizard" class="">
                        <ul>
                            <li><a href="#step-1">Car Location</a></li>
                            <li><a href="#step-2"> Services</a></li>
                            <li><a href="#step-3"> Appointment Time</a></li>
                            <li><a href="#step-4">Review & Book</a></li>
                        </ul>

                        <div>
                            <div id="step-1" class="">
                                <h3>GET INSTANT SERVICE QUOTE</h3>
                                <form class="needs-validation" id="info_form" novalidate>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <hr style="color: #ee1e24">
                                                <h4 class="text-center">CONTACT INFORMATION</h4>
                                            <hr >
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="name">Contact Name</label>
                                            <input type="text" class="form-control  form-control-lg" id="name" placeholder="Name" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="phone_num">Phone Number</label>
                                            <input type="tel" class="form-control  form-control-lg" id="phone_num" placeholder="070xxxxxxx" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control  form-control-lg" id="email" placeholder="email@mail.com" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-12"><hr> <h4 class="text-center">VEHICLE INFORMATION</h4><hr></div>
                                        <div class="col-md-6 mb-3">
                                            <label for="make">Make</label>
                                            <input type="email" class="form-control  form-control-lg" id="make" placeholder="Honda" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="model">Model</label>
                                            <input type="text" class="form-control  form-control-lg" id="model" placeholder="Civic" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="year">Year</label>
                                            <input type="text" class="form-control  form-control-lg" id="year" placeholder="2020" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="mileage">Mileage</label>
                                            <input type="text" class="form-control  form-control-lg" id="mileage" placeholder="Mileage in kilometers" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-12"><hr> <h4 class="text-center">APPOINTMENT INFORMATION</h4><hr></div>

                                        <div class="col-md-6 mb-3">
                                            <label for="appointment_date">Date</label>
                                            <input type="text" class="form-control  form-control-lg" id="appointment_date" placeholder="2020-01-01" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="appointment_time">Time</label>
                                            <input type="text" class="form-control  form-control-lg" id="appointment_time" placeholder="2:00pm" required>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Would you like us to pick up your vehicle ?
                                        </div>
                                        <div class="col-md-5 mb-3">

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>



                                        <div class="col-md-12 mb-3">
                                            <label for="additonal_details">Additional Details</label>
                                            <textarea class="form-control" id="additonal_details" rows="5"></textarea>
                                            <div class="invalid-feedback">
                                                Invalid Value
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div id="step-2" class="">
                                <h2>Step 2 Content</h2>
                                <div>Information for step 2</div>
                            </div>
                            <div id="step-3" class="">
                                You may use a form as well!
                            </div>
                            <div id="step-4" class="">
                                <h2>Step 4 Content</h2>
                                <div class="panel panel-default">
                                    <div class="panel-heading">My Details</div>
                                    <table class="table">
                                        <tbody>
                                        <tr> <th>Name:</th> <td>Your Name</td> </tr>
                                        <tr> <th>Email:</th> <td>abc@example.com</td> </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row no-pad">
                        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
                            <button type="button" class="btn btn-block btn-default" id="comp_info_btn">Company Info</button>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
                            <button type="button" class="btn btn-block btn-default" id="proj_info_btn">Project & Software Details</button>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
                            <button type="button" class="btn btn-block btn-default" id="sub_info_btn">Subscription Section</button>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
                            <button type="button" class="btn btn-block btn-default" id="cost_info_btn">Implementation & Cost</button>
                        </div>


                        {{-- COMPANY DETAILS --}}
                        <form class="form">
                        <div class="col-md-12 col-sm-12 col-xs-12 pull-left box box-success no-pad" id="comp_info" 
                            style="width: 98%; margin: 20px; margin-left: 15px; border: thin solid #ddd !important; display: none;">

                            <div class="col-md-6 col-sm-6 col-xs-12 pull-left"> 
                                <fieldset class="scheduler-border"> 
                                    <legend class="scheduler-border">Company Details</legend>           
                                    <div class="box-body">
                                    <!-- Minimal style -->

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p class="help-block">Upload company logo here.</p>
                                                <input type="file" class="form-control" name="logo" id="logo">  <br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <p class="help-block">Enter company name here.</p>
                                                <input type="text" class="form-control" name="company_name" id="company_name">  <br>
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
                                                <textarea rows="7" class="form-control" name="executive_summary" id="executive_summary"></textarea>  <br>
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                        </div>
                        </form>


                        {{-- PROJECT DETAILS --}}
                        <form class="form">
                        <div class="col-md-12 col-sm-12 col-xs-12 pull-left box box-success no-pad" id="proj_info" 
                            style="width: 98%; margin: 20px; margin-left: 15px; border: thin solid #ddd !important; display: none;">

                            <div class="col-md-6 col-sm-12 col-xs-12 pull-left"> 
                                <fieldset class="scheduler-border"> 
                                    <legend class="scheduler-border">Project Duration & Add-ons</legend>           
                                    <div class="box-body">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="col-md-6 col-xs-12 no-pad">
                                                    <p class="help-block">Do you what to add project duration?</p>
                                                </div>
                                                <div class="col-md-6 col-xs-12 no-pad">
                                                    <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                        <input type="radio" name="duration" id="duration_yes" value="1"> 
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                        <input type="radio" name="duration" id="duration_no" value="0"> 
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <p  id="duration_div" style="display: none;">
                                                    <input type="text" class="form-control" name="" id="">  <br>
                                                </p>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6 col-xs-9 no-pad">
                                                    <p class="help-block">Would you like to add third party add-ons?</p>
                                                </div>
                                                <div class="col-md-6 col-xs-12 no-pad">
                                                    <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                        <input type="radio" name="add_on" id="add_on_yes" value="1"> 
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                        <input type="radio" name="add_on" id="add_on_no" value="0"> 
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <p id="add_on_div" style="display: none;">
                                                    <input type="text" class="form-control" name="" id="">  <br>
                                                    <input type="text" class="form-control" name="" id="">  <br>
                                                </p>
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
                                                    <p class="help-block">Would you like to add client list & Assumptions?</p>
                                                </div>
                                                <div class="col-md-6 col-xs-12 no-pad">
                                                    <label class="container col-md-4 col-xs-12"> <span class="check-label"> Yes </span>
                                                        <input type="radio" name="client" id="client_yes" value="1"> 
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label class="container col-md-8 col-xs-6"> <span class="check-label"> No </span>
                                                        <input type="radio" name="client" id="client_no" value="0"> 
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <p id="client_div" style="display: none;"> 
                                                    <textarea rows="2" class="form-control" name="client_list" id="client_list"></textarea> <br> 
                                                    <textarea rows="2" class="form-control" name="assumption" id="assumption"></textarea>  
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                        </div>
                        </form>


                        {{-- SUBSCRIPTION DETAILS --}}
                        <form class="form">
                        <div class="col-md-12 col-sm-12 col-xs-12 pull-left box box-success no-pad" id="sub_info" 
                            style="width: 98%; margin: 20px; margin-left: 15px; border: thin solid #ddd !important; display: none;">

                            <div class="col-md-6 col-sm-12 col-xs-12 pull-left"> 
                                <fieldset class="scheduler-border"> 
                                    <legend class="scheduler-border">ERP USERS - Subscription</legend>           
                                    <div class="box-body">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Premium ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_premium" id="dbc_premium">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Essentials ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_essential" id="dbc_essential">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Members ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_member" id="dbc_member">
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
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">Sql Server Standard license (Annual Cost) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="sql_license" id="sql_license">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">Sql Standard CAL (Annual Cost) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="sql_cal" id="sql_cal">
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
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Tables (10) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_table" id="dbc_table">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Pages (100) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_page" id="dbc_page">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Reports (100) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_report" id="dbc_report">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Codeunits (100) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_codeunit" id="dbc_codeunit">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central XML Ports (100) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_port" id="dbc_port">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-md-8 col-xs-12 no-pad">
                                                    <p class="help-block">How many no of users for Dyn365 Business Central Queries (100) ?</p>
                                                </div>
                                                <div class="col-md-4 col-xs-12 no-pad">
                                                    <input type="text" class="form-control" name="dbc_query" id="dbc_query">
                                                </div>
                                            </div>
                                        </div>                                        

                                    </div>
                                </fieldset>
                            </div>

                        </div>
                        </form>
                    </div>
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

        //client 
        // $('#client_yes').click(function() {  $('#client_div').show(); });
        // $('#client_no').click(function() {  $('#client_div').hide(); });

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