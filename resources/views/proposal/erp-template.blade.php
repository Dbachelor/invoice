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
        <div class="box m-b-20" style="">
            <div class="box-header with-border">
                <div class="box-body" id="exTab1">

                    <!-- Notification Panel -->
                    <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Proposal Templates </h4>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->


                    <div id="smartwizard">
                        <ul class="nav">
                            <li> <a class="nav-link" href="#step-1" onclick="loadProposal('Enterprise Resource Planning', 'erp')"> Main Template </a> </li>
                            <li> <a class="nav-link" href="#step-2" onclick="loadProposalSection('_toc', 'header', 'table_of_content')"> Table of Content </a> </li>
                            <li> <a class="nav-link" href="#step-3" onclick="loadProposalSection('_add_on', 'hcmatrix', 'palipro')"> Software Add-ons </a> </li>
                            <li> <a class="nav-link" href="#step-4" onclick="loadProposalSection('_client', 'client_list', 'assumption')"> Client List </a> </li>
                            <li> <a class="nav-link" href="#step-5" onclick="loadProposalSection('_subscription', 'subscription', 'third_party_software')"> licenses – Subscription </a> </li>
                            <li> <a class="nav-link" href="#step-6"onclick="loadProposalImplementation('_implementation', 'implementation', 'project_cost')"> Third Party Software </a> </li>
                            <li> <a class="nav-link" href="#step-7" onclick="loadProposalDocument()"> Other Document </a> </li>
                        </ul>



                        <div class="tab-content no-pad" style="height: auto !important;">
                            {{-- MAIN TEMPLATE --}}
                            <div id="step-1" class="tab-pane" role="tabpanel">
                                <form id="" action="{{ route('add-proposal-template') }}" method="POST">
                                @csrf
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">ERP Template</legend>


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
                                    </fieldset>
                                </form>
                            </div>

                            {{-- HEADER TABLE OF CONTENT --}}
                            <div id="step-2" class="tab-pane" role="tabpanel">
                                <form class="tocForm" action="{{ route('add-proposal-section') }}" method="POST">
                                @csrf
                                    <input type="hidden" class="form-control" name="id" id="id_one_toc">
                                    <input type="hidden" class="form-control" name="id" id="id_two_toc">
                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name"
                                    value="Enterprise Resource Planning">

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Header Picture</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control one_toc" name="header" id="header"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Table of Content</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control two_toc" name="table_of_content" id="table_of_content"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 40px;">
                                        <button type="submit" id="_toc" class="btn btn-success btn-sm pull-right mg-l save"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </form>
                            </div>

                            {{-- ADD-ONS --}}
                            <div id="step-3" class="tab-pane" role="tabpanel">
                                <form class="addonForm" action="{{ route('add-proposal-section') }}" method="POST">
                                @csrf
                                    <input type="hidden" class="form-control" name="id" id="id_one_add_on">
                                    <input type="hidden" class="form-control" name="id" id="id_two_add_on">
                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name"
                                    value="Enterprise Resource Planning">

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">HCMatrix Software</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control one_add_on" name="hcmatrix" id="hcmatrix"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">PALIPRO Software</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control two_add_on" name="palipro" id="palipro"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 40px;">
                                        <button type="submit" id="_add_on" class="btn btn-success btn-sm pull-right mg-l save"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </form>
                            </div>

                            {{-- CLIENT & COMMERCIALS --}}
                            <div id="step-4" class="tab-pane" role="tabpanel">
                                <form class="clientForm" action="{{ route('add-proposal-section') }}" method="POST">
                                @csrf
                                    <input type="hidden" class="form-control" name="id" id="id_one_client">
                                    <input type="hidden" class="form-control" name="id" id="id_two_client">
                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name"
                                    value="Enterprise Resource Planning">

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Client List</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control one_client" name="client_list" id="client_list"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Commercials</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control two_client" name="assumption" id="assumption"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 40px;">
                                        <button type="submit" id="_client" class="btn btn-success btn-sm pull-right mg-l save"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </form>
                            </div>



                            {{-- SUBSCRIPTION & THIRD PARTY SOFTWARE --}}
                            <div id="step-5" class="tab-pane" role="tabpanel">
                                <form class="subscriptionForm" action="{{ route('add-proposal-section') }}" method="POST">
                                @csrf
                                    <input type="hidden" class="form-control" name="id" id="id_one_subscription">
                                    <input type="hidden" class="form-control" name="id" id="id_two_subscription">
                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name"
                                    value="Enterprise Resource Planning">

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Software licenses – Subscription</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control one_subscription" name="subscription" id="subscription"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Third Party Software </legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea rows="10" class="form-control two_subscription" name="third_party_software" id="third_party_software"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 40px;">
                                        <button type="submit" id="_subscription" class="btn btn-success btn-sm pull-right mg-l save"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </form>
                            </div>



                            {{-- IMPLEMENTATION & TOTAL COST --}}
                             <div id="step-6" class="tab-pane" role="tabpanel">
                                <form id="implementationsForm" action="{{ route('add-proposal-implementation') }}" method="POST">
                                @csrf
                                    <input type="hidden" class="form-control" name="id" id="id_one_implementation">
                                    <input type="hidden" class="form-control" name="id" id="id_two_implementation">
                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name"
                                    value="Enterprise Resource Planning">

                                    <div id="first" style="">
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Financial Management.</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_1" id="implementations_1"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Iventory Management.</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_2" id="implementations_2"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <button type="button" class="btn btn-primary pull-right" id="next_second">Next</button>
                                    </div>

                                    <div id="second" style="display: none">
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Sales</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_3" id="implementations_3"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Purchase</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_4" id="implementations_4"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>

                                            <button type="button" class="btn btn-primary pull-right" style="margin-left: 5px" id="next_third">Next</button>
                                            <button type="button" class="btn btn-primary pull-right" id="prev_first">Prevous</button>
                                        </div>
                                    </div>

                                    <div id="third" style="display: none">
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Palipro - Contract Management Solution</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_5" id="implementations_5"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">HCMatrix - HR Solution</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_6" id="implementations_6"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <button type="button" class="btn btn-primary pull-right" style="margin-left: 5px" id="next_fourth">Next</button>
                                        <button type="button" class="btn btn-primary pull-right" id="prev_second">Prevous</button>
                                    </div>

                                    <div id="fourth" style="display: none">
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Infrastructure Setup</legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control one_implementation" name="implementations_7" id="implementations_7"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important;">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Total Project Cost Summary </legend>
                                                <div class="box-body">

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea rows="10" class="form-control two_implementation" name="project_cost" id="project_cost"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <button type="button" class="btn btn-primary pull-right" id="prev_third">Prevous</button>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 40px;">
                                        <button type="submit" id="impleBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </form>
                            </div>

                            {{-- OTHER DOCUMENTS --}}
                             <div id="step-7" class="tab-pane" role="tabpanel">
                                <form id="documentForm" action="{{ url('/add-proposal-documents') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                    <input type="hidden" class="form-control" name="proposal_name" id="proposal_name"
                                    value="Enterprise Resource Planning">

                                    <div class="col-md-3 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Documents</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <p class="help-block">Document Type</p>
                                                        <select class="form-control" name="document_type" id="document_type" required>
                                                            <option value="">  </option>
                                                            <option value="Bid Document"> Bid Document </option>
                                                            <option value="Consultant Profiles"> Consultant Profiles </option>
                                                        </select> <br>

                                                        <p class="help-block">Document Name</p>
                                                        <input type="text" class="form-control" name="document_name" id="document_name" required> <br>

                                                        <p class="help-block">Upload Document</p>
                                                        <input type="file" class="form-control" name="document_file" id="document_file" required>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-9 col-sm-12 col-xs-12 pull-left no-pad" style="padding-right: 15px !important;">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border"> Document List</legend>
                                            <div class="box-body">

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        {{-- <p class="help-block"> Documents</p> --}}
                                                        <div class="box">
                                                            <div class="box-header">
                                                              <h3 class="box-title">Documents</h3>

                                                              <div class="box-tools">
                                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                                                  <div class="input-group-btn">
                                                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <!-- /.box-header -->
                                                            <div class="box-body table-responsive no-padding">
                                                                <table class="table table-hover" id="document_table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Document Type</th>
                                                                            <th>Document Name</th>
                                                                            <th style="text-align: right;">Actions</th>
                                                                        </tr>
                                                                        {{-- @forelse($documents as $document)
                                                                            <tr>
                                                                                <td>{{$i}}</td>
                                                                                <td>{{$document->document_type}}</td>
                                                                                <td>{{$document->document_name}}</td>
                                                                                <td style="text-align: right;">
                                                                                    <a class="btn btn-sm btn-social-icon btn-github"
                                                                                    onclick="loadProposalDocument()">
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                    <a class="btn btn-sm btn-social-icon btn-google">
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr> @php $i++; @endphp
                                                                        @empty
                                                                        @endforelse --}}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- /.box-body -->
                                                          </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12 pull-left no-pad" style="padding-left: 15px !important; position: fixed; z-index: 1000; right: 55px;">
                                        <button type="submit" id="documentBtn" class="btn btn-success btn-sm pull-right mg-l"> <i class="fa fa-save"></i> Save Section</button>
                                    </div>
                                </form>
                            </div>
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

    $(function (e)
    {
        //hide and show implementation
        $('#next_second').click(function() {  $('#second').show();  $('#first').hide();  $('#third').hide();  $('#fourth').hide(); });
        $('#next_third').click(function() {  $('#third').show();  $('#second').hide();  $('#first').hide();  $('#fourth').hide(); });
        $('#next_fourth').click(function() {  $('#fourth').show(); $('#third').hide();  $('#second').hide();  $('#first').hide(); });

        $('#prev_third').click(function() {  $('#third').show();  $('#second').hide();  $('#first').hide();  $('#fourth').hide(); });
        $('#prev_second').click(function() {  $('#second').show();  $('#first').hide();  $('#third').hide();  $('#fourth').hide(); });
        $('#prev_first').click(function() {  $('#first').show();  $('#second').hide();  $('#third').hide();  $('#fourth').hide(); });
    });

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



    function loadProposalSection(section, one, two)
    {
        $.get('{{url('getProposalConstantDetails')}}?section=' +section+'&variable='+one, function(data)
        {
            $.each(data, function(index, DATA)
            {
                var ONE = '%'+one+'%';    var TWO = '%'+two+'%';
                if(DATA.variable == ONE)
                {
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[one].setData(DATA.content);
                }
                else if(DATA.variable == TWO)
                {
                    $('#id_two'+section).val(DATA.id);  CKEDITOR.instances[two].setData(DATA.content);
                }
            });
        });
    }


    function loadProposalImplementation(section, one, two)
    {
        $.get('{{url('getProposalConstantDetails')}}?section=' +section+'&variable='+one, function(data)
        {
            $.each(data, function(index, DATA)
            {
                if(index < 7)
                {
                    var i = index + 1;   var value = 'implementations_'+i;

                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                    $('#id_one'+section).val(DATA.id);  CKEDITOR.instances[value].setData(DATA.content);
                }
                if(index == 7)
                {
                    $('#id_two'+section).val(DATA.id);  CKEDITOR.instances['project_cost'].setData(DATA.content);
                }
            });
        });
    }

    function loadProposalDocument()
    {
        $(function()
        {
            $('._row').remove();
            $.get('{{url('getProposalDocument')}}', function(data)
            {
                $.each(data, function(index, data)
                {
                    $('#document_table').append('<tr class="_row row_'+data.id+'"> <td>'+data.id+'</td> <td>'+data.document_type+'</td> <td>'+data.document_name+'</td> <td style="text-align: right;"> <a class="btn btn-sm btn-social-icon btn-github"  onclick="loadProposalDocument()"> <i class="fa fa-pencil"></i>  </a> <a class="btn btn-sm btn-social-icon btn-google"> <i class="fa fa-trash"></i> </a> </td> </tr>');
                });
            });
        });
    }



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






    $(function()
    {
        // loadProposalDocument();

        $('.draft').click(function(e)
        {
            if(confirm('Are you sure you want to save details?'))
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
                        // CKEDITOR.instances['content'+name].setData('');

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); };
                });

            }

        });



        $(".save").on('click', function(e)
        {
            e.preventDefault();
            if(confirm('Are you sure you want to save details?'))
            {
                var section = $(this).attr("id");
                var one = $('.one'+section).attr("id");    var two = $('.two'+section).attr("id");    var type = $('.save').attr("id");

                var ONE;   var TWO;    var var_one;   var var_two;

                id_one = $('#id_one'+type).val();
                id_two = $('#id_two'+type).val();
                proposal_name = $('#proposal_name').val();
                ONE = CKEDITOR.instances[one].getData();
                TWO = CKEDITOR.instances[two].getData();
                formData =
                {
                    id_one:id_one,
                    id_two:id_two,
                    variable_one:one,
                    variable_two:two,
                    proposal_name:proposal_name,
                    var_one:ONE,
                    var_two:TWO,
                    section:section,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('add-proposal-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $('#id_one'+type).val('');
                        $('#id_two'+type).val('');
                        // CKEDITOR.instances[one].setData('');
                        // CKEDITOR.instances[two].setData('');

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); };
                });

            }

        });




        //PROCESSING FORM DATA
        $("#implementationsForm").on('submit', function(e)
        {
            e.preventDefault();
            if(confirm('Are you sure you want to save details?'))
            {
                var name = $(this).attr("id");
                var proposal_name = $('#proposal_name').val();
                var section = '_implementation';
                var implementations_1 = CKEDITOR.instances['implementations_1'].getData();
                var implementations_2 = CKEDITOR.instances['implementations_2'].getData();
                var implementations_3 = CKEDITOR.instances['implementations_3'].getData();
                var implementations_4 = CKEDITOR.instances['implementations_4'].getData();
                var implementations_5 = CKEDITOR.instances['implementations_5'].getData();
                var implementations_6 = CKEDITOR.instances['implementations_6'].getData();
                var implementations_7 = CKEDITOR.instances['implementations_7'].getData();
                var project_cost = CKEDITOR.instances['project_cost'].getData();

                formData =
                    {
                        // id:id,
                        proposal_name:proposal_name,
                        section:section,
                        implementations_1:implementations_1,
                        implementations_2:implementations_2,
                        implementations_3:implementations_3,
                        implementations_4:implementations_4,
                        implementations_5:implementations_5,
                        implementations_6:implementations_6,
                        implementations_7:implementations_7,
                        project_cost:project_cost,
                        _token:'{{csrf_token()}}'
                    }
                $.post('{{route('add-proposal-implementation')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $('#id'+name).val('');
                        // CKEDITOR.instances['content'+name].setData('');

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); };
                });
            }
        });



        //PROCESSING FORM DATA
        $("#documentForm").on('submit', function(e)
        {
            e.preventDefault();
            processForm('documentForm', "{{url('/add-proposal-documents')}}");

            loadProposalDocument();
            // $("#document_type").selectedIndex = 0;
            // $("#document_name").val('');
            // $("#document_file").val('');

        });
    });


    // function reloadDocument()
    // {
    //     $('._row').remove();
    //     loadProposalDocument();
    // }

    CKEDITOR.config.extraPlugins = "base64image";
    CKEDITOR.replace( 'content_erp' );

    CKEDITOR.replace( 'header' );
    CKEDITOR.replace( 'table_of_content' );
    CKEDITOR.replace( 'client_list' );
    CKEDITOR.replace( 'assumption' );
    CKEDITOR.replace( 'hcmatrix' );
    CKEDITOR.replace( 'palipro' );
    CKEDITOR.replace( 'subscription' );
    CKEDITOR.replace( 'third_party_software' );
    CKEDITOR.replace( 'implementations_1' );
    CKEDITOR.replace( 'implementations_2' );
    CKEDITOR.replace( 'implementations_3' );
    CKEDITOR.replace( 'implementations_4' );
    CKEDITOR.replace( 'implementations_5' );
    CKEDITOR.replace( 'implementations_6' );
    CKEDITOR.replace( 'implementations_7' );
    CKEDITOR.replace( 'project_cost' );

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
