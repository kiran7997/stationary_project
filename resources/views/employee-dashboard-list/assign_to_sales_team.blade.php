@extends('layouts.app')
@section('content')
<!-- Responsive Datatable -->
<!-- BEGIN: Content-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-wizard.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-number-input.css">
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
                                            <a href="app-ecommerce-details.html">
                                                <img src="{{$data->image_url}}" alt="img-placeholder" />
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
                               <form class="needs-validation1" method="post" action="{{ url('assign-to-sales-team') }}" style="margin-top:30px;">
                               @csrf
                                    <div class="row">
                                        <input type="hidden" name="order_id" value="{{$id}}" />
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                    <label for="state">State</label>
                                                    <select class="select2 form-control w-100" name="state" id="state"
                                                        required>
                                                        <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                        <option value="{{$state->state_id}}">{{$state->state_title}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">
                                                        Please select your state
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="district">District</label>
                                                    <select class="select2 form-control w-100" name="district" id="district"
                                                        required>
                                                        <option value="">Select District</option>
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">
                                                        Please select your District
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="district">Sales User</label>
                                                    <select class="select2 form-control w-100" name="sales_person" id="sales_person"
                                                        required>
                                                        <option value="">Select District</option>
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">
                                                        Please select your District
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1" id='btn_submit'>
                                                Submit
                                            </button>
                                            <a href="{{route('users.index')}}"><button type="button"
                                                    class="btn btn-outline-danger">
                                                    Cancel
                                                </button></a>
                                        </div>
                                </form> 
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