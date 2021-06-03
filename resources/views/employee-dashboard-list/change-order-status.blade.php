@extends('layouts.app')
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
                            <h2 class="content-header-title float-left mb-0">Order Details</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="bs-stepper checkout-tab-steps">
                    <!-- Wizard starts -->
                    <div class="bs-stepper-content">
                        <!-- Checkout Place order starts -->
                        <!--<div id="step-cart" class="content">-->
                            <div id="place-order" class="list-view product-checkout">
                                <!-- Checkout Place Order Left starts -->
                                <div class="checkout-items">
                                    @foreach($order_item_data as $data)
                                    <div class="card ecommerce-card">
                                        <div class="item-img">
                                        <?php $img_urls = json_decode($data->image_url); ?>
                                            <a href="app-ecommerce-details.html">
                                                <img src="{{$img_urls[0]}}" alt="img-placeholder" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body">{{$data->product_name}}</a></h6>
                                                <!-- <span class="item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span> -->
                                                
                                            </div>
                                            <span class="text-success mb-1">In Stock</span>
                                            <div class="item-quantity">
                                                <span class="quantity-title">Qty: </span>
                                                <div class="input-group quantity-counter-wrapper">
                                                    {{$data->quantity}}
                                                </div>
                                            </div>
                                            <!-- <span class="delivery-date text-muted">Delivery by, Wed Apr 25</span>
                                            <span class="text-success">17% off 4 offers Available</span> -->
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-cost">
                                                    <h4 class="item-price">Rs. {{$data->amount}}</h4>
                                                    <p class="card-text shipping">
                                                        <span class="badge badge-pill badge-light-success">Free Shipping</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- <button type="button" class="btn btn-light mt-1 remove-wishlist">
                                                <i data-feather="x" class="align-middle mr-25"></i>
                                                <span>Remove</span>
                                            </button>
                                            <button type="button" class="btn btn-primary btn-cart move-cart">
                                                <i data-feather="heart" class="align-middle mr-25"></i>
                                                <span class="text-truncate">Add to Wishlist</span>
                                            </button> -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <?php if($order_list->order_status != "process"){ ?>
                               <form class="needs-validation1" method="post" action="{{ url('update-order-status') }}" style="margin-top:30px;">
                               @csrf
                                    <div class="row">
                                        <input type="hidden" name="order_id" value="{{$id}}" />
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                    <label for="state">Order Status</label>
                                                    <select class="select2 form-control w-100" name="order_status" id="order_status"
                                                        required>
                                                        <option value="">Select State</option>
                                                        <option value="process">process</option>
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">
                                                        Please select your state
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1" id='btn_submit'>
                                                Update
                                            </button>
                                            <a href="{{url('manufacturing-order-list')}}"><button type="button"
                                                    class="btn btn-outline-danger">
                                                    Cancel
                                                </button></a>
                                        </div>
                                </form> 
                                <?php } ?>
                            </div>
                            <!-- Checkout Place order Ends -->
                        <!--</div>-->
                       
                    </div>
                </div>

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
<script>
    $(document).ready(function(){
        $("#form").validate(); //form validation

    });

   
  
</script>