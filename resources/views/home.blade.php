@extends('layouts.app')
@section('title', 'Home')
@section('content')

<style>
#container {
  height: 400px; 
}
.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}
.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          
        </div>
      </div>

    </div>
  </div>

    <!-- Statistics card section -->
		<section id="statistics-card">
			 <!-- Miscellaneous Charts -->
       <div class="row match-height">
				<!-- Bar Chart -Orders -->
				<div class="col-lg-2 col-6">
					<div class="card">
							<div class="card-body pb-50">
          						 <h6>Orders</h6>
         						 <h2 class="font-weight-bolder mb-1">2,76k</h2>
         			 				<div id="statistics-bar-chart">
					  				</div>
        					</div>
      					</div>
    				</div>
    			<!--/ Bar Chart -->

    			<!-- Line Chart - Profit -->
    					<div class="col-lg-2 col-6">
      						<div class="card card-tiny-line-stats">
        						<div class="card-body pb-50">
         							 <h6>Returns</h6>
          							 <h2 class="font-weight-bolder mb-1">6,24k</h2>
         						 <div id="statistics-line-chart"></div>
       							 </div>
      						</div>
    					</div>
    <!--/ Line Chart -->
    <div class="col-lg-8 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            <p class="card-text mr-25 mb-0">Updated 1 month ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="media">
                <div class="avatar bg-light-primary mr-2">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">230k</h4>
                  <p class="card-text font-small-3 mb-0">Sales</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="media">
                <div class="avatar bg-light-info mr-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">{{ $totals['customers'] }}</h4>
                  <p class="card-text font-small-3 mb-0">Customers</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="media">
                <div class="avatar bg-light-danger mr-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">{{ $totals['aproducts'] }}</h4>
                  <p class="card-text font-small-3 mb-0">Products</p>
                </div> 
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="media">
                <div class="avatar bg-light-success mr-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">$9745</h4>
                  <p class="card-text font-small-3 mb-0">Revenue</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!--/ Miscellaneous Charts -->

  <!-- Stats Vertical Card
  <div class="row">
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-info p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="eye" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">{{ $totals['catagories'] }}</h2>
          <p class="card-text">Catagories</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-warning p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="message-square" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">{{ $totals['Productvariation'] }}</h2>
          <p class="card-text">Product Variation</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-danger p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="shopping-bag" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">{{ $totals['Inventeries'] }}</h2>
          <p class="card-text">Inventories</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-primary p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="heart" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">{{ $totals['stocks'] }}</h2>
          <p class="card-text">Stocks</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-success p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="award" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">689</h2>
          <p class="card-text">Reviews</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-danger p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="truck" class="font-medium-5"></i>
            </div>
           </div>
          <h2 class="font-weight-bolder">2.1k</h2>
          <p class="card-text">Returns</p>
        </div>
      </div>
    </div>
  </div>
       
    END: Content-->
    <figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
  <b>  Chart showing Stocks Avalible in This Month.</b>
  </p>
</figure>
<script>

Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Stock\'s Availeble in This Months'
  },
  // subtitle: {
  //   text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
  // },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Stocks (Thousand)'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Stocks in May: <b>{point.y:.1f} Thousand</b>'
  },
  series: [{
    name: 'Stocks',
    data: [
      ['PENS', 311],
      ['TEXT BOOKS',300],
      ['COLOR', 500],
      ['PENCILS', 900],
      ['DRAWING B', 899],
     
    ],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});
</script>

    </div>
            </div>

        </div>
@endsection

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/cards/card-statistics.min.js"></script>
    <!-- END: Page JS-->

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
