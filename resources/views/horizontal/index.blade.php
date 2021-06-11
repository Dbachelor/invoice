@include('horizontal.header')
@php
use App\Http\Controllers
@endphp
    
    
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><span class="text-danger">S</span>nap<span class="text-danger">N</span>et</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <a href="{{ route('manageInvoice') }}"><<i class="fa fa-credit-card-alt bg-primary  text-white"></i></a>
                            </div>
                            <div>
                                <h5 class="font-16 cap">Invoices & Quotes</h5>
                            </div>
                            <h3 class="mt-4">{{ $count }}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p style="display:non" class="text-muted mt-2 mb-0">Totals<span class="float-right">100%</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <a href="{{ route('manageOrg') }}"><  <i class="fa fa-building-o bg-success text-white"></i></a>
                            </div>
                            <div>
                                <h5 class="font-16 cap">Organizations</h5>
                            </div>
                            <h3 class="mt-4">{{ $countOrg }}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p  style="display:noe" class="text-muted mt-2 mb-0">Totals<span class="float-right">100%</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <a href="{{ route('manageInvoice') }}"><i class="fa fa-credit-card bg-warning text-white"></i></a>
                            </div>
                            <div>
                                <h5 class="font-16 cap">Un-Reviewed Quotes</h5>
                            </div>
                            <h3 class="mt-4">{{ $countInv }}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round($inv_per) }}%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p  style="display:noe" class="text-muted mt-2 mb-0">Totals<span class="float-right">{{ round($inv_per) }}%</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <a href="{{ route('manageInvoice') }}"><<i class="fa fa-credit-card bg-danger text-white"></i></a>
                            </div>
                            <div>
                                <h5 class="font-16 cap">Approved Invoices</h5>
                            </div>
                            <h3 class="mt-4">{{ $countApp }}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ round($app_per) }}%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p style="display:non" class="text-muted mt-2 mb-0">Totals<span class="float-right">{{ round($app_per) }}%</span></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body" >

                            <h4 class="mt-0 header-title mb-4">Activity Chart</h4>

                            <div id="chartdiv2"></div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Invoice Chart</h4>

                            {{--    <div id="morris-donut-example" class="morris-charts morris-chart-height"></div>
                        --}}
                        <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

          {{--  <div class="row">
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Friends Suggestions</h4>
                            <div class="friends-suggestions">
                                <a href="#" class="friends-suggestions-list">
                                    <div class="border-bottom position-relative">
                                        <div class="float-left mb-0 mr-3">
                                            <img src="assets/images/users/user-2.jpg" alt="" class="rounded-circle thumb-md">
                                        </div>
                                        <div class="suggestion-icon float-right mt-2 pt-1">
                                            <i class="mdi mdi-plus"></i>
                                        </div>

                                        <div class="desc">
                                            <h5 class="font-14 mb-1 pt-2 text-dark">Ralph Ramirez</h5>
                                            <p class="text-muted">3 Friend suggest</p>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="friends-suggestions-list">
                                    <div class="border-bottom position-relative">
                                        <div class="float-left mb-0 mr-3">
                                            <img src="assets/images/users/user-3.jpg" alt="" class="rounded-circle thumb-md">
                                        </div>
                                        <div class="suggestion-icon float-right mt-2 pt-1">
                                            <i class="mdi mdi-plus"></i>
                                        </div>

                                        <div class="desc">
                                            <h5 class="font-14 mb-1 pt-2 text-dark">Patrick Beeler</h5>
                                            <p class="text-muted">17 Friend suggest</p>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="friends-suggestions-list">
                                    <div class="border-bottom position-relative">
                                        <div class="float-left mb-0 mr-3">
                                            <img src="assets/images/users/user-4.jpg" alt="" class="rounded-circle thumb-md">
                                        </div>
                                        <div class="suggestion-icon float-right mt-2 pt-1">
                                            <i class="mdi mdi-plus"></i>
                                        </div>

                                        <div class="desc">
                                            <h5 class="font-14 mb-1 pt-2 text-dark">Victor Zamora</h5>
                                            <p class="text-muted">12 Friend suggest</p>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="friends-suggestions-list">
                                    <div class="border-bottom position-relative">
                                        <div class="float-left mb-0 mr-3">
                                            <img src="assets/images/users/user-5.jpg" alt="" class="rounded-circle thumb-md">
                                        </div>
                                        <div class="suggestion-icon float-right mt-2 pt-1">
                                            <i class="mdi mdi-plus"></i>
                                        </div>

                                        <div class="desc">
                                            <h5 class="font-14 mb-1 pt-2 text-dark">Bryan Lacy</h5>
                                            <p class="text-muted">18 Friend suggest</p>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="friends-suggestions-list">
                                    <div class="position-relative">
                                        <div class="float-left mb-0 mr-3">
                                            <img src="assets/images/users/user-6.jpg" alt="" class="rounded-circle thumb-md">
                                        </div>
                                        <div class="suggestion-icon float-right mt-2 pt-1">
                                            <i class="mdi mdi-plus"></i>
                                        </div>

                                        <div class="desc">
                                            <h5 class="font-14 mb-1 pt-2 text-dark">James Sorrells</h5>
                                            <p class="text-muted mb-1">6 Friend suggest</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                            <div id="morris-line-example" class="morris-chart" style="height: 360px"></div>

                        </div>
                    </div>

                </div>

                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title mb-4">Recent Activity</h4>
                            <ol class="activity-feed mb-0">
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <p class="text-muted mb-1">Now</p>
                                        <p class="font-15 mt-0 mb-0">Andrei Coman posted a new article: <b class="text-primary">Forget UX Rowland</b></p>
                                    </div>
                                </li>
                                <li class="feed-item">
                                    <p class="text-muted mb-1">Yesterday</p>
                                    <p class="font-15 mt-0 mb-0">Andrei Coman posted a new article: <b class="text-primary">Designer Alex</b></p>
                                </li>
                                <li class="feed-item">
                                    <p class="text-muted mb-1">2:30PM</p>
                                    <p class="font-15 mt-0 mb-0">Zack Wetass, <b class="text-primary"> Developer Moreno</b></p>
                                </li>
                                <li class="feed-item pb-1">
                                    <p class="text-muted mb-1">12:48 PM</p>
                                    <p class="font-15 mt-0 mb-2">Zack Wetass, <b class="text-primary">UX Murphy</b></p>
                                </li>

                            </ol>

                        </div>
                    </div>
                </div>
            </div>
--}}
            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Last 5 Pending Invoices</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-secondary text-white">
                                        <tr>
                                        <th scope="col">#</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Invoice Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col" colspan="2">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pending_inv as $pi)
                                        <tr>
                                        <th>{{ $offset_++ }}
                                        <th>{{ App\Http\Controllers\HomeController::showCompanyName($pi->orgid)}} </th>
                                        <th>{{ $pi->invoiceName}}</th>
                                        <th class="text-warning">{{ ucwords(App\Http\Controllers\HomeController::showInvoiceStatus($pi->status))}}</th>
                                        <th>{{ $pi->created_at }}</th>
                                        <th><a class="btn btn-primary" href="{{ route('addItem', ['id' => $pi->id]) }}"><i class="fa fa-folder-open-o text-white"></i></a>
                                        </tr>

                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Last 5 Approved Invoices</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                        <th scope="col">#</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Invoice Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col" colspan="2">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        $offset_ = 1;
                                        @endphp
                                        @foreach($approved_inv as $pi)
                                        <tr>
                                        <th>{{ $offset_++ }}
                                        <th>{{ App\Http\Controllers\HomeController::showCompanyName($pi->orgid)}} </th>
                                        <th>{{ $pi->invoiceName}}</th>
                                        <th class="text-success btn ">{{ ucwords(App\Http\Controllers\HomeController::showInvoiceStatus($pi->status))}}</th>
                                        <th>{{ $pi->created_at }}</th>
                                        <th><a class="btn btn-primary" href="{{ route('addItem', ['id' => $pi->id]) }}"><i class="fa fa-folder-open-o text-white"></i></a>
                                        </tr>

                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- END ROW -->

        </div>
        <!-- end container-fluid -->
    </div>
    <script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = [
  
  {
    country: "Pending",
    litres: {{ $countInv }}
  },
  {
    country: "Approved",
    litres: {{$countApp}}
  }
];

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";

}); // end am4core.ready()
</script>

<script>
    am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    var chart = am4core.create("chartdiv2", am4charts.XYChart);
    chart.padding(40, 40, 40, 40);
    
    chart.numberFormatter.bigNumberPrefixes = [
      { "number": 1e+3, "suffix": "K" },
      { "number": 1e+6, "suffix": "M" },
      { "number": 1e+9, "suffix": "B" }
    ];
    
    var label = chart.plotContainer.createChild(am4core.Label);
    label.x = am4core.percent(97);
    label.y = am4core.percent(95);
    label.horizontalCenter = "right";
    label.verticalCenter = "middle";
    label.dx = -15;
    label.fontSize = 50;
    
    var playButton = chart.plotContainer.createChild(am4core.PlayButton);
    playButton.x = am4core.percent(97);
    playButton.y = am4core.percent(95);
    playButton.dy = -2;
    playButton.verticalCenter = "middle";
    playButton.events.on("toggled", function(event) {
      if (event.target.isActive) {
        play();
      }
      else {
        stop();
      }
    })
    
    var stepDuration = 4000;
    
    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.dataFields.category = "network";
    categoryAxis.renderer.minGridDistance = 1;
    categoryAxis.renderer.inversed = true;
    categoryAxis.renderer.grid.template.disabled = true;
    
    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;
    valueAxis.rangeChangeEasing = am4core.ease.linear;
    valueAxis.rangeChangeDuration = stepDuration;
    valueAxis.extraMax = 0.1;
    
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryY = "network";
    series.dataFields.valueX = "MAU";
    series.tooltipText = "{valueX.value}"
    series.columns.template.strokeOpacity = 0;
    series.columns.template.column.cornerRadiusBottomRight = 5;
    series.columns.template.column.cornerRadiusTopRight = 5;
    series.interpolationDuration = stepDuration;
    series.interpolationEasing = am4core.ease.linear;
    
    var labelBullet = series.bullets.push(new am4charts.LabelBullet())
    labelBullet.label.horizontalCenter = "right";
    labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
    labelBullet.label.textAlign = "end";
    labelBullet.label.dx = -10;
    
    chart.zoomOutButton.disabled = true;
    
    // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
    series.columns.template.adapter.add("fill", function(fill, target){
      return chart.colors.getIndex(target.dataItem.index);
    });
    
    var year = 2019;
    label.text = year.toString();
    
    var interval;
    
    function play() {
      interval = setInterval(function(){
        nextYear();
      }, stepDuration)
      nextYear();
    }
    
    function stop() {
      if (interval) {
        clearInterval(interval);
      }
    }
    
    function nextYear() {
      year++
    
      if (year > {{ date('Y')}}) {
        year = 2019;
      }
    
      var newData = allData[year];
      var itemsWithNonZero = 0;
      for (var i = 0; i < chart.data.length; i++) {
        chart.data[i].MAU = newData[i].MAU;
        if (chart.data[i].MAU > 0) {
          itemsWithNonZero++;
        }
      }
    
      if (year == {{date('Y')}}) {
        series.interpolationDuration = stepDuration / 4;
        valueAxis.rangeChangeDuration = stepDuration / 4;
      }
      else {
        series.interpolationDuration = stepDuration;
        valueAxis.rangeChangeDuration = stepDuration;
      }
    
      chart.invalidateRawData();
      label.text = year.toString();
    
      categoryAxis.zoom({ start: 0, end: itemsWithNonZero / categoryAxis.dataItems.length });
    }
    
    
    categoryAxis.sortBySeries = series;
    
    var allData = {
      "2019": [
        {
          "network": "Facebook",
          "MAU": 0
        },
        {
          "network": "Flickr",
          "MAU": 0
        },
        {
          "network": "Google Buzz",
          "MAU": 0
        },
    
        {
          "network": "Friendster",
          "MAU": 4470000
        },
        {
          "network": "Google+",
          "MAU": 0
        },
        {
          "network": "Hi5",
          "MAU": 0
        },
        {
          "network": "Instagram",
          "MAU": 0
        },
        {
          "network": "MySpace",
          "MAU": 0
        },
        {
          "network": "Orkut",
          "MAU": 0
        },
        {
          "network": "Pinterest",
          "MAU": 0
        },
        {
          "network": "Reddit",
          "MAU": 0
        },
        {
          "network": "Snapchat",
          "MAU": 0
        },
        {
          "network": "TikTok",
          "MAU": 0
        },
        {
          "network": "Tumblr",
          "MAU": 0
        },
        {
          "network": "Twitter",
          "MAU": 0
        },
        {
          "network": "WeChat",
          "MAU": 0
        },
        {
          "network": "Weibo",
          "MAU": 0
        },
        {
          "network": "Whatsapp",
          "MAU": 0
        },
        {
          "network": "YouTube",
          "MAU": 0
        }
      ],
      
      
      "2020": [
        {
          "network": "Facebook",
          "MAU": 1170500000
        },
        {
          "network": "Flickr",
          "MAU": 80000000
        },
        {
          "network": "Friendster",
          "MAU": 0
        },
        {
          "network": "Google Buzz",
          "MAU": 170000000
        },
        {
          "network": "Google+",
          "MAU": 205654700
        },
        {
          "network": "Hi5",
          "MAU": 0
        },
        {
          "network": "Instagram",
          "MAU": 117500000
        },
        {
          "network": "MySpace",
          "MAU": 0
        },
        {
          "network": "Orkut",
          "MAU": 0
        },
        {
          "network": "Pinterest",
          "MAU": 0
        },
        {
          "network": "Reddit",
          "MAU": 0
        },
        {
          "network": "Snapchat",
          "MAU": 0
        },
        {
          "network": "TikTok",
          "MAU": 0
        },
        {
          "network": "Tumblr",
          "MAU": 293482050
        },
        {
          "network": "Twitter",
          "MAU": 223675000
        },
        {
          "network": "WeChat",
          "MAU": 196523760
        },
        {
          "network": "Weibo",
          "MAU": 118261880
        },
        {
          "network": "Whatsapp",
          "MAU": 300000000
        },
        {
          "network": "YouTube",
          "MAU": 1065223075
        }
      ],
      "2021": [
        {
          "network": "Facebook",
          "MAU": 1334000000
        },
        {
          "network": "Flickr",
          "MAU": 0
        },
        {
          "network": "Friendster",
          "MAU": 0
        },
        {
          "network": "Google Buzz",
          "MAU": 170000000
        },
        {
          "network": "Google+",
          "MAU": 254859015
        },
        {
          "network": "Hi5",
          "MAU": 0
        },
        {
          "network": "Instagram",
          "MAU": 250000000
        },
        {
          "network": "MySpace",
          "MAU": 0
        },
        {
          "network": "Orkut",
          "MAU": 0
        },
        {
          "network": "Pinterest",
          "MAU": 0
        },
        {
          "network": "Reddit",
          "MAU": 135786956
        },
        {
          "network": "Snapchat",
          "MAU": 0
        },
        {
          "network": "TikTok",
          "MAU": 0
        },
        {
          "network": "Tumblr",
          "MAU": 388721163
        },
        {
          "network": "Twitter",
          "MAU": 223675000
        },
        {
          "network": "WeChat",
          "MAU": 444232415
        },
        {
          "network": "Weibo",
          "MAU": 154890345
        },
        {
          "network": "Whatsapp",
          "MAU": 498750000
        },
        {
          "network": "YouTube",
          "MAU": 1249451725
        }
      ]
    }
    
    chart.data = JSON.parse(JSON.stringify(allData[year]));
    categoryAxis.zoom({ start: 0, end: 1 / chart.data.length });
    
    series.events.on("inited", function() {
      setTimeout(function() {
        playButton.isActive = true; // this starts interval
      }, 2000)
    })
    
    }); // end am4core.ready()
    </script>
    
    <!-- end wrapper -->
@include('horizontal.footer')