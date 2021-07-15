@extends('customer.layouts.app')
@section('title', 'My Order')
@section('content')
<!-- Responsive Datatable -->
<!-- BEGIN: Content-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-number-input.css') }}">
<!-- END: Page CSS-->

<style>
    .select2-selection__arrow {
        display: none;
    }
</style>

<div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">My Order Details</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Timeline Starts -->
                <section class="basic-timeline">
                    <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                                    <div class="card earnings-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h4 class="card-title mb-1">{{$order_details->product_name}}</h4>
                                                    <div class="font-small-2">Qty. {{$order_details->quantity}}</div>
                                                    <h5 class="mb-1 mt-1">Rs. {{$order_details->subtotal}}</h5>
                                                    <div class="mb-1 mt-1">Order Date, {{ $order_details->order_date }}</div>
                                                    <p class="card-text text-muted font-small-2">
                                                        <span class="font-weight-bolder">Tracking Status on : </span><span>{{date('h:i a')}}, Today</span>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                <?php $img_urls = json_decode($order_details->image_url); ?>
                                                    <a href="app-ecommerce-details.html">
                                                        <img src="{{ @$img_urls[0] }}" alt="img-placeholder" style="height: 110px;" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tracking Order</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline">
                                        <li class="timeline-item" style="border-left:1px solid #55cc80">
                                            <span class="timeline-point">
                                                <i data-feather="shopping-bag"></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>Ordered</h6>
                                                </div>                                                
                                            </div>
                                        </li>
                                        <li class="timeline-item" style="border-left:1px solid #55cc80">
                                            <span class="timeline-point timeline-point-secondary">
                                                <i data-feather='shopping-cart'></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>Picked Up</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-success">
                                                <i data-feather='clock'></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>In Progress</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-warning">
                                                <i data-feather='truck'></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6 class="mb-50">Out for Delivery</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-danger">
                                                <i data-feather='home'></i>
                                            </span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>Shipped</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Timeline Ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


           
<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
