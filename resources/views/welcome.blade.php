@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><strong></strong></h3>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/avatar.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{ Auth::user()->name }}</h5>
                    <span class="description-text">{{ Auth::user()->email }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
  </div>
</div>

<div class="container-fluid">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Invoices & Quotes</span>
              <a href="{{route('manageInvoice')}}" class="btn btn-info"><span class="info-box-number">{{$count}}</span></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Organizations</span>
              <a href="{{route('manageOrg')}}" class="btn btn-primary"><span class="info-box-number">{{$countOrg}}</span></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
            @if(\Auth::user()->type == 'admin_user')
            <div class="info-box-content">
              <span class="info-box-text">Unreviewed Quotes</span>
              <a href="{{route('manageInvoice')}}" class="btn btn-warning"><span class="info-box-number">{{$countInv}}</span></a>
            </div>
            @else
            <div class="info-box-content">
              <span class="info-box-text">Unreviewed Invoices</span>
              <a href="" class="disabled btn btn-warning"><span class="info-box-number">{{$countInv}}</span></a>
            </div>
            @endif
            <!-- /.info-box-content -->
          </div>
        <!-- /.col -->
      </div>
      	<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
            @if(\Auth::user()->type == 'admin_user')
            <div class="info-box-content">
              <span class="info-box-text">Approved Invoices</span>
              <a href="{{route('manageInvoice')}}" class="btn btn-success"><span class="info-box-number">{{$countApp}}</span></a>
            </div>
            @else
            <div class="info-box-content">
              <span class="info-box-text">Approved Invoices</span>
              <a href="" class="disabled btn btn-success"><span class="info-box-number">{{$countApp}}</span></a>
            </div>
            @endif
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
       
  </div>



@if(\Auth::user()->type == 'admin_user')

  <section class="content">
      <div class="row">
        <div class="col-md-6">
          <h3 class="lead">You have {{$count_pending_inv->count()}} Pending Quote(s)</h3>
            <table class="table table-striped table-hover" id="inv_table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Company</th>
                  <th>Invoice Name</th>
                  <th>Status</th>
                  <th>Submitted By</th>
                  <th>Created At</th>
                  <th>Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if(count($pending_inv)>0)
                @php $i =1; @endphp
                @foreach($pending_inv as $invo)

                <tr>
                  <td>{{$i++}}</td>
                  <td>@if($invo->organization){{$invo->organization->orgName}}@endif</td>
                  <td>{{$invo->invoiceName}}</td>
                  <td>
                    @if($invo->status == 0)
                    <img src="{{asset('images/yellow.png')}}" style="width: 15px;height: 10px;">
                    @elseif($invo->status == 1)
                    <img src="{{asset('images/green.png')}}" style="width: 15px;height: 10px;">
                    @elseif($invo->status == 2)
                    <img src="{{asset('images/red.png')}}" style="width: 15px;height: 10px;">
                    @endif
                  </td>
                  <td>@if($invo->createdBy){{$invo->createdBy->name}}@endif</td>
                  <td>{{$invo->created_at}}</td>
                  <td><a data-toggle="modal" class="btn btn-success" onclick="loadItem({{$invo->id}})"><i class="fa fa-eye" data-toggle="tooltip" data-original-title="View Invoice"></i></a></td>
                  <td>
                     <form action="{{ route('deleteQuote',$invo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                  
                </tr>
                
            <iframe id="invoice{{$invo->id}}" style="display: none;" src="{{url('pdf')}}?id={{$invo->id}}"></iframe>
                @endforeach
                @endif
              </tbody>
            </table>
        </div>

       <div class="col-md-6">
          <h3 class="lead">You have {{$count_approved_inv->count()}} Approved Quotes</h3>
            <table class="table table-striped table-hover" id="inv_table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Company</th>
                  <th>Invoice Name</th>
                  <th>Status</th>
                  <th>Submitted By</th>
                  <th>Created At</th>
                  <th>Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if(count($approved_inv)>0)
                @php $i =1; @endphp
                @foreach($approved_inv as $invo)

                <tr>
                  <td>{{$i++}}</td>
                  <td>@if($invo->organization){{$invo->organization->orgName}}@endif</td>
                  <td>{{$invo->invoiceName}}</td>
                  <td>
                    @if($invo->status == 0)
                    <img src="{{asset('images/yellow.png')}}" style="width: 15px;height: 10px;">
                    @elseif($invo->status == 1)
                    <img src="{{asset('images/green.png')}}" style="width: 15px;height: 10px;">
                    @elseif($invo->status == 2)
                    <img src="{{asset('images/red.png')}}" style="width: 15px;height: 10px;">
                    @endif
                  </td>
                  <td>@if($invo->createdBy){{$invo->createdBy->name}}@endif</td>
                  <td>{{$invo->created_at}}</td>
                  <td><a data-toggle="modal" class="btn btn-success" onclick="loadItem({{$invo->id}})"><i class="fa fa-eye" data-toggle="tooltip" data-original-title="View Invoice"></i></a></td>
                  <td>
                     <form action="{{ route('deleteQuote',$invo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                  
                </tr>
                
            <iframe id="invoice{{$invo->id}}" style="display: none;" src="{{url('pdf')}}?id={{$invo->id}}"></iframe>
                @endforeach
                @endif
              </tbody>
            </table>
        </div>
      </div>
    </section>

    @elseif(\Auth::user()->type == 'normal_user')
    <section class="content">
      <div class="row">
        <div class="col-md-7">
          <h3 class="lead">You have {{$approved_inv->count()}} Approved Quote(s)</h3>
            <table class="table table-striped table-hover" id="inv_table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Company</th>
                  <th>Invoice Name</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(count($approved_inv)>0)
                @php $i =1; @endphp
                @foreach($approved_inv as $invo)

                <tr>
                  <td>{{$i++}}</td>
                  <td>@if($invo->organization){{$invo->organization->orgName}}@endif</td>
                  <td>{{$invo->invoiceName}}</td>
                  <td>
                    @if($invo->status == 0)
                    <img src="{{asset('images/yellow.png')}}" style="width: 15px;height: 10px;">
                    @elseif($invo->status == 1)
                    <img src="{{asset('images/green.png')}}" style="width: 15px;height: 10px;">
                    @elseif($invo->status == 2)
                    <img src="{{asset('images/red.png')}}" style="width: 15px;height: 10px;">
                    @endif
                  </td>
                  <td>{{$invo->created_at}}</td>
                  <td><a data-toggle="modal" class="btn btn-success" onclick="loadItem({{$invo->id}})"><i class="fa fa-eye" data-toggle="tooltip" data-original-title="View Invoice"></i></a></td>
                  
                  
                </tr>
                
            <iframe id="invoice{{$invo->id}}" style="display: none;" src="{{url('pdf')}}?id={{$invo->id}}"></iframe>
                @endforeach
                @endif
              </tbody>
            </table>
        </div>

        <div class="col-md-5">
          <h3 class="lead"> Approved Quotes Chart</h3>
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Invoices</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
               <div class="chart">
                <canvas id="areaChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>
      </div>
    </section>
@endif
 {{-- <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Invoices</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Quotes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content --> --}}

        
  

@endsection




@section('script')

<script>
  function loadItem(id)
  {
    window.location.replace("/addItem?id="+id);
    
  }

  
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>

@endsection