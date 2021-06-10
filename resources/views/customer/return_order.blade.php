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
                            <h2 class="content-header-title float-left mb-0">Return Order Details</h2>
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
                                <?php if(count($order_item_data)>0){
                                    foreach($order_item_data as $data){  ?>  
                                    <div class="card ecommerce-card">          
                                        <div class="item-img ml-1 mr-1">
                                            <?php $img_urls = json_decode($data->image_url); ?>
                                            <a href="app-ecommerce-details.html">
                                                <img src="{{ @$img_urls[0] }}" alt="img-placeholder" style="height: 110px;" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <h6 class="mb-0"><a href="#" class="text-body">{{$data->product_name}}</a></h6>
                                                <!-- <span class="item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span> -->
                                                
                                            </div>
                                            <span class="text-success mb-1">In Stock</span>
                                            <div class="item-quantity">
                                                <span class="quantity-title">Qty: </span>
                                                <div class="input-group quantity-counter-wrapper">
                                                    {{$data->quantity}}
                                                </div>
                                            </div>
                                            <span class="delivery-date text-muted">Order Date, {{ $data->order_date }}</span>
                                            <span class="delivery-date text-muted">Return Date, {{ $data->return_date }}</span>
                                            <!-- <span class="delivery-date text-muted">Delivery by, Wed Apr 25</span>
                                            <span class="text-success">17% off 4 offers Available</span> -->
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-cost">
                                                    <h4 class="item-price">Rs. {{$data->price}}</h4>
                                                    <p class="card-text shipping">
                                                        <!-- <span class="badge badge-pill badge-light-success">Free Shipping</span> -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="item-wrapper">
                                                <div class="item">
                                                    <h5 class="item-price total-item-price" >Rs. {{$data->subtotal}}</h5>
                                                    <p class="card-text shipping">
                                                        <!-- <span class="badge badge-pill badge-light-success">Free Shipping</span> -->
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                        
                                    <?php } }?>
                        </div>            
                               
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $("#form").validate(); //form validation
        //return alert
        $(".return_order").on("click", function () {
            return confirm('Are you sure to return ?');
        });
        $('#state').change(function(){
            var state_id = this.value;
            $('#district').empty();
                $.ajax({
                url: "{{url('get-district')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',state_id:state_id},
                success:function(res){
                    $('#district').append('<option value="">Select District</option>');
                    $.each(res, function(key,val) {
                        $('#district').append('<option value='+val.id+'>'+val.title+'</option>');
                    });
                }
            });
        })

        $('#district').change(function(){
            var district_id = this.value;
            $('#sales_person').empty();
                $.ajax({
                url: "{{url('get-sales-user')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',district_id:district_id},
                success:function(res){
                    $('#sales_person').append('<option value="">Select Sales User</option>');
                    $.each(res, function(key,val) {
                        $('#sales_person').append('<option value='+val.id+'>'+val.name+'</option>');
                    });
                }
            });
        })
      
    });

   
  
</script>