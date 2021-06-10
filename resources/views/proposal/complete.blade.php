<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Snapnet</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{ asset('images/invoice.png') }}">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}} ">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
@yield('stylesheets')
<!-- Morris chart -->
{{-- <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}"> --}}
<!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- toast plugins  -->
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    <!-- Summernote css -->
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-bs4.css') }}">
{{-- smartwizard --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/jquery-smartwizard/dist/css/smart_wizard_all.min.css') }}"> --}}

<!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">


    <!-- Include SmartWizard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/smartwizard/dist/css/smart_wizard_all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/e-signature/css/jquery.signaturepad.css') }}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/e-signature/css/app_style.css') }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Optional SmartWizard theme -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/wizard/css/smart_wizard_theme_circles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/wizard/css/smart_wizard_theme_arrows.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/wizard/css/smart_wizard_theme_dots.min.css') }}" /> --}}


    <style>
        .sw-justified
        {
            height: auto !important;
        }
        .dropdown-submenu
        {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu
        {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown:hover>.dropdown-menu
        {
            display: block;
        }

        .dropdown-submenu:hover>.dropdown-menu
        {
            display: block;
        }

        .dropdown-submenu>a:after
        {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after
        {
            border-left-color: #fff;
        }


        .padd
        {
            padding: 4px 16px;
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
    </style>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">





    <div class="row" style="">
        <div class="col-lg-8 col-lg-offset-2" style="background: #fff">

            <!-- Notification Panel -->

            <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->
{{--            <input type="hidden" name="typed" id="typed" value="{{$route}}">--}}

            <div class="col-md-12" style="position: fixed; z-index: 1000; right: 20px">

{{--                    @forelse($completed as $completet)--}}
{{--                        @php--}}
{{--                            $id_name = trim($constant->variable, '%');--}}
{{--                        @endphp--}}
{{--                        <input type="hidden" name="{{$id_name}}" id="{{$id_name}}" value="{{$constant->content}}">--}}
{{--                    @empty--}}
{{--                    @endforelse--}}
            </div>

            <div id="preview" style="font-size: 18px!important;">
                @forelse($completed as $complete)
                    {!! $complete->content_complete !!}
                @empty
                    No Proposal !
                @endforelse
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->

</div>

</body>
</html>












