@extends('layouts.app')
@section('title', 'Home')
@section('content')
	<style>
		#container1 {
			height: 400px;
		}

		.highcharts-figure,
		.highcharts-data-table table {
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

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}
	</style>
	<div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-9 col-12 mb-2">
					<div class="row breadcrumbs-top">
						<div class="col-12">
							<h2 class="content-header-title mb-0">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="content-body">
				<!-- Validation -->
				<section class="bs-validation">
					<div class="row">
						<div class="col-12">
							<div class="row match-height">
								<!-- Bar Chart -Orders -->
								<div class="col-lg-2 col-6">
									<a href="view-orders">
										<div class="card">
											<div class="card-body pb-50">
												<h6>Orders</h6>
												<h3 class="font-weight-bolder mb-1">{{ $totals['order_count'] }}</h3>
												<div id="statistics-order-chart"></div>
											</div>
										</div>
									</a>
								</div>
							
								<!--/ Bar Chart -->

								<!-- Line Chart - Profit -->
								<div class="col-lg-2 col-6">
									<div class="card card-tiny-line-stats">
										<div class="card-body pb-50">
											<h6>Revenue</h6>
											<h3 class="font-weight-bolder mb-1">Rs. {{ $totals['revenue'] }}</h3>
											<div id="statistics-profit-chart"></div>
										</div>
									</div>
								</div>
								<!--/ Line Chart -->
								<div class="col-lg-8 col-12">
									<div class="card card-statistics">
										<div class="card-header">
											<h4 class="card-title">Statistics</h4>
											<!-- <div class="d-flex align-items-center">
												<p class="card-text mr-25 mb-0">Updated 1 month ago</p>
											</div> -->
										</div>
										<div class="card-body statistics-body">
											<div class="row">
												<div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
													<a href="supplier">
														<div class="media">
															<div class="avatar bg-light-primary mr-2">
																<div class="avatar-content">
																	<i data-feather="user" class="avatar-icon"></i>
																</div>
															</div>
															<div class="media-body my-auto">
																<h4 class="font-weight-bolder mb-0">{{ $totals['supplier'] }}</h4>
																<p class="card-text font-small-3 mb-0">Suppliers</p>
															</div>
														</div>
													</a>
												</div>
												
												<div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
													<a href="customer">
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
													</a>
												</div>
												<div class="col-md-4 col-sm-6 col-12 mb-2 mb-sm-0">
													<a href="product">
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
													</a>
												</div>
												<!-- <div class="col-md-3 col-sm-6 col-12">
													<div class="media">
														<div class="avatar bg-light-success mr-2">
															<div class="avatar-content">
																<i data-feather="box" class="avatar-icon"></i>
															</div>
														</div>
														<div class="media-body my-auto ">
															<h4 class="font-weight-bolder mb-0">{{ $totals['order_return'] }}</h4>
															<p class="card-text font-small-3 mb-0">Returns</p>
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-12">
									<div class="card card-statistics">
										<div class="card-header">
											<h4 class="card-title">Order Statuses</h4>
											<!-- <div class="d-flex align-items-center">
												<p class="card-text mr-25 mb-0">Updated 1 month ago</p>
											</div> -->
										</div>
										<div class="card-body statistics-body">
											<div class="row">
												<div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
													<a href="{{url('ordered/order')}}">

														<div class="media">
															<div class="avatar bg-light-primary mr-2">
																<div class="avatar-content">
																	<i data-feather="box" class="avatar-icon"></i>
																</div>
															</div>
															
															<div class="media-body my-auto">
																<h4 class="font-weight-bolder mb-0">{{ $totals['order_count'] }}</h4>
																<p  class="card-text font-small-3 mb-0">Order</p>
															</div>
														</div>
													</a>
												</div>
												
												<div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
													<a href="{{url('ordered/process')}} ">
														<div class="media">
															<div class="avatar bg-light-info mr-2">
																<div class="avatar-content">
																	<i data-feather="box" class="avatar-icon"></i>
																</div>
															</div>
															<div class="media-body my-auto">
																<h4 class="font-weight-bolder mb-0">{{ $totals['order_process'] }}</h4>
																<p class="card-text font-small-3 mb-0">Process</p>
															</div>
														</div>
													</a>
												</div>
												<div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
													<a href="{{url('ordered/close')}}">
														<div class="media">
															<div class="avatar bg-light-danger mr-2">
																<div class="avatar-content">
																	<i data-feather="box" class="avatar-icon"></i>
																</div>
															</div>
															<div class="media-body my-auto">
																<h4 class="font-weight-bolder mb-0">{{ $totals['order_close'] }}</h4>
																<p class="card-text font-small-3 mb-0">Close</p>
															</div>
														</div>
													</a>
												</div>
												<div class="col-md-3 col-sm-6 col-12">
												<a href="{{url('ordered/return')}}">
													<div class="media">
														<div class="avatar bg-light-success mr-2">
															<div class="avatar-content">
																<i data-feather="box" class="avatar-icon"></i>
															</div>
														</div>
														<div class="media-body my-auto ">
															<h4 class="font-weight-bolder mb-0">{{ $totals['order_return'] }}</h4>
															<p class="card-text font-small-3 mb-0">Returns</p>
														</div>
													</div>
												</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-12">
							<figure class="highcharts-figure">
								<div id="container2"></div>
								<p class="highcharts-description text-center mb-1">
									<b> Sales Person Wise Order in This Month.</b>
								</p>
							</figure>
							<script>
								Highcharts.chart('container2', {
									chart: {
										type: 'column'
									},
									title: {
										text: 'Sales Person Wise Order in This Month'
									},
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
											text: 'Orders (Counts)'
										}
									},
									legend: {
										enabled: false
									},
									tooltip: {
										pointFormat: 'Orders: <b>{point.y}</b>'
									},
									series: [{
										name: 'Orders',
										data: <?php  if(!empty($saleswiseorder)) { echo json_encode($saleswiseorder['data']); }?>,
										dataLabels: {
											enabled: true,
											rotation: -90,
											color: '#FFFFFF',
											align: 'right',
											format: '{point.y}', // one decimal
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
						<div class="col-12 mt-1">
							<figure class="highcharts-figure">
								<div id="container3"></div>
								<p class="highcharts-description text-center mb-1">
									<b>Distinct Wise Order in This Month.</b>
								</p>
							</figure>
							<script>
								Highcharts.chart('container3', {
									chart: {
										type: 'column'
									},
									title: {
									text: 'Distinct Wise Order in This Month'
									},
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
											text: 'Orders (Counts)'
										}
									},
									legend: {
										enabled: false
									},
									tooltip: {
										pointFormat: 'Orders : <b>{point.y}</b>'
									},
									series: [{
										name: 'Orders',
										data: <?php  if(!empty($distwiseorder)) { echo json_encode($distwiseorder['data']); }?>,
										dataLabels: {
											enabled: true,
											rotation: -90,
											color: '#FFFFFF',
											align: 'right',
											format: '{point.y}', // one decimal
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
				</section>
				<!-- /Validation -->
			</div>
		</div>
	</div>
	<!-- END: Content-->
@endsection


<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/cards/card-statistics.min.js') }}"></script>
<!-- END: Page JS-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>