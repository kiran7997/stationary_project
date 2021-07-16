@extends('customer.layouts.app')
@section('title', 'Checkout')
@section('content')
<style>
    .select2-selection__arrow {
        display: none;
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
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Checkout</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/customer-dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/customer-dashboard">Shop</a>
                                </li>
                                <li class="breadcrumb-item active">Checkout
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="bs-stepper checkout-tab-steps">
                <!-- Wizard starts -->
                <div class="bs-stepper-header">
                    <div class="step" data-target="#step-cart">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box">
                                <i data-feather="shopping-cart" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Cart</span>
                                <span class="bs-stepper-subtitle">Your Cart Items</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i data-feather="chevron-right" class="font-medium-2"></i>
                    </div>
                    <div class="step" data-target="#step-address" id="address_tab">
                        <button type="button" class="step-trigger" id="address">
                            <span class="bs-stepper-box">
                                <i data-feather="home" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Address</span>
                                <span class="bs-stepper-subtitle">Enter Your Address </span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i data-feather="chevron-right" class="font-medium-2"></i>
                    </div>
                    <div class="step" data-target="#step-payment" id="payment_tab">
                        <button type="button" class="step-trigger" id="payment">
                            <span class="bs-stepper-box">
                                <i data-feather="credit-card" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Payment</span>
                                <span class="bs-stepper-subtitle">Select Payment Method</span>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- Wizard ends -->
                @if(count($cart_data) > 0)
                <div class="bs-stepper-content">
                    <!-- Checkout Place order starts -->
                    <div id="step-cart" class="content">
                        <div id="place-order" class="list-view product-checkout">
                            <!-- Checkout Place Order Left starts -->
                            <div class="checkout-items">
                                <?php $i = 0; ?>
                                <form id="form_card" method="post">
                                    @csrf
                                    @foreach($cart_data as $carts)
                                    <input type="hidden" id="cart_id_{{ $i }}" name="cart_id[]"
                                        value="{{ $carts->cart_id }}" />
                                    <input type="hidden" id="order_id_{{ $i }}" name="order_id[]"
                                        value="{{ $carts->order_id }}" />
                                    <input type="hidden" id="order_item_id_{{ $i }}" name="order_item_id[]"
                                        value="{{ $carts->order_item_id }}" />
                                    <input type="hidden" id="product_id_{{ $i }}" name="product_id[]"
                                        value="{{ $carts->product_id }}" />
                                    <div class="card ecommerce-card">
                                        <div class="item-img">
                                            <?php $img_urls = json_decode($carts->image_url); ?>
                                            <a href="">
                                                <img src="{{ @$img_urls[0] }}" class="m-1" alt="img-placeholder"
                                                    style="height: 110px;" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <h6 class="mb-0"><a href=""
                                                        class="text-body">{{ $carts->product_name }}</a></h6>
                                                <!-- <span class="item-company">By <a href="javascript:void(0)"
                                                            class="company-name">Apple</a></span> -->
                                                <!-- <div class="item-rating">
                                                        <ul class="unstyled-list list-inline">
                                                            <li class="ratings-list-item"><i data-feather="star"
                                                                    class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star"
                                                                    class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star"
                                                                    class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star"
                                                                    class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star"
                                                                    class="unfilled-star"></i></li>
                                                        </ul>
                                                    </div> -->
                                            </div>
                                            <span class="text-success mb-1">In Stock</span>
                                            <div class="item-quantity">
                                                <span class="quantity-title">Qty:</span>
                                                <div class="input-group quantity-counter-wrapper qty-div"
                                                    id="qty-div-{{ $i }}">
                                                    <input type="text" id="quantity_{{ $i }}" name="qyantity[]"
                                                        class="quantity-counter qty-change"
                                                        value="<?php if(!empty($carts->quantity)){ echo $carts->quantity; }else{ echo "1";} ?>" />
                                                </div>
                                            </div>
                                            <span class="delivery-date text-muted">Delivery by, {{ $days_7 }}</span>
                                            <!-- <span class="text-success">17% off 4 offers Available</span> -->
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-cost">
                                                    <h4 class="item-price" id="item-price-{{ $i }}">Rs.
                                                        {{ $carts->product_price }}</h4>
                                                    <p class="card-text shipping">
                                                        <!-- <span class="badge badge-pill badge-light-success">Free Shipping</span> -->
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="item-wrapper">
                                                <div class="item">
                                                    <h5 class="item-price total-item-price" id="total_price_{{ $i }}">
                                                        Rs.
                                                        <?php if(!empty($carts->quantity)){ echo ((float)($carts->quantity) * (float)($carts->product_price)); }else{ echo $carts->product_price;} ?>
                                                    </h5>
                                                    <p class="card-text shipping">
                                                        <!-- <span class="badge badge-pill badge-light-success">Free Shipping</span> -->
                                                    </p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-light mt-1 remove-wishlist"
                                                onclick="remove_cart({{ $carts->cart_id }}, {{$carts->order_item_id }})">
                                                <i data-feather="x" class="align-middle mr-25"></i>
                                                <span>Remove</span>
                                            </button>
                                            <!-- <button type="button" class="btn btn-primary btn-cart move-cart">
                                                    <i data-feather="heart" class="align-middle mr-25"></i>
                                                    <span class="text-truncate">Add to Wishlist</span>
                                                </button> -->
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                    @endforeach
                                </form>
                            </div>
                            <!-- Checkout Place Order Left ends -->

                            <!-- Checkout Place Order Right starts -->
                            <div class="checkout-options">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <label class="section-label mb-1">Options</label> -->
                                        <!-- <div class="coupons input-group input-group-merge">
                                            <input type="text" class="form-control" placeholder="Coupons"
                                                aria-label="Coupons" aria-describedby="input-coupons" />
                                            <div class="input-group-append">
                                                <span class="input-group-text text-primary"
                                                    id="input-coupons">Apply</span>
                                            </div>
                                        </div> -->
                                        <!-- <hr /> -->
                                        <div class="price-details">
                                            <h6 class="price-title">Price Details</h6>
                                            <ul class="list-unstyled">
                                                <li class="price-detail">
                                                    <div class="detail-title">Total MRP</div>
                                                    <div class="detail-amt">Rs. {{ $price_details }}</div>
                                                </li>
                                                <!-- <li class="price-detail">
                                                    <div class="detail-title">Bag Discount</div>
                                                    <div class="detail-amt discount-amt text-success">-25$</div>
                                                </li>
                                                <li class="price-detail">
                                                    <div class="detail-title">Estimated Tax</div>
                                                    <div class="detail-amt">$1.3</div>
                                                </li>
                                                <li class="price-detail">
                                                    <div class="detail-title">EMI Eligibility</div>
                                                    <a href="javascript:void(0)"
                                                        class="detail-amt text-primary">Details</a>
                                                </li> -->
                                                <li class="price-detail">
                                                    <div class="detail-title">Delivery Charges</div>
                                                    <div class="detail-amt discount-amt text-success">Free</div>
                                                </li>
                                            </ul>
                                            <hr />
                                            <ul class="list-unstyled">
                                                <li class="price-detail">
                                                    <div class="detail-title detail-total">Total</div>
                                                    <div class="detail-amt font-weight-bolder">Rs. {{ $price_details }}
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="button"
                                                class="btn btn-primary btn-block btn-next place-order mt-2"
                                                id="save-cart-details">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout Place Order Right ends -->
                            </div>
                        </div>
                        <!-- Checkout Place order Ends -->
                    </div>
                    <!-- Checkout Customer Address Starts -->
                    <div id="step-address" class="content">
                        <form id="checkout-address" class="list-view product-checkout">
                            @csrf
                            <!-- Checkout Customer Address Left starts -->
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <h4 class="card-title">Add New Address</h4>
                                    <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address"
                                        when you have finished</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-name">First Name:</label>
                                                <input type="text" id="firstname" class="form-control" name="firstname"
                                                    placeholder="John Doe"
                                                    value="{{ !empty(@$order_details->customer_firstname) ? @$order_details->customer_firstname : Auth::guard('customer')->user()->customer_firstname }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-name">Last Name:</label>
                                                <input type="text" id="lastname" class="form-control" name="lastname"
                                                    placeholder="John Doe"
                                                    value="{{ Auth::guard('customer')->user()->customer_lastname }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-name">Email:</label>
                                                <input type="email" id="checkout-name" class="form-control" name="email"
                                                    placeholder="John@gmail.com"
                                                    value="{{ Auth::guard('customer')->user()->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-number">Mobile Number:</label>
                                                <input type="number" id="phone_no" max="10" class="form-control"
                                                    name="phone_no" placeholder="0123456789"
                                                    value="{{ Auth::guard('customer')->user()->customer_phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-apt-number">Flat, House No:</label>
                                                <input type='text' id="house_number" class="form-control"
                                                    name="house_number" placeholder="9447 Glen Eagles Drive"
                                                    value="{{ @$order_details['house_no'] }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-landmark">Landmark </label>
                                                <input type="text" id="landmark" class="form-control" name="landmark"
                                                    placeholder="Near Apollo Hospital"
                                                    value="{{ @$order_details['landmark'] }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-state">State:</label>
                                                {{-- <input type="text" id="state" class="form-control" name="state"
                                                    placeholder="Maharashtra" /> --}}
                                                <select class="select2 form-control w-100" name="state" id="state"
                                                    required>
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->state_id }}"
                                                        {{ @$order_details['state'] == $state->state_id ? "selected" : "" }}>
                                                        {{$state->state_title}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-state">District:</label>
                                                {{-- <input type="text" id="state" class="form-control" name="state"
                                                    placeholder="Maharashtra" /> --}}
                                                <select class="select2 form-control w-100" name="district" id="district"
                                                    required>
                                                    <option value="">Select District</option>
                                                    @foreach($districts as $district)
                                                    <option value="{{ $district->districtid }}"
                                                        {{ @$order_details['district'] == $district->districtid ? "selected" : "" }}>
                                                        {{$district->district_title}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-city">Town/City:</label>
                                                <input type="text" id="city" class="form-control" name="city"
                                                    placeholder="Solapur" value="{{ @$order_details['city'] }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-pincode">Pincode:</label>
                                                <input type="number" id="checkout-pincode" class="form-control"
                                                    name="pincode" placeholder="201301"
                                                    value="{{ @$order_details['pincode'] }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="add-type">Address Type:</label>
                                                <select class="form-control" id="add-type" name='address_type'>
                                                    <option value="Home"
                                                        {{ @$order_details['address_type'] == $state->state_id ? "selected" : "" }}>
                                                        Home</option>
                                                    <option value="Work"
                                                        {{ @$order_details['address_type'] == $state->state_id ? "selected" : "" }}>
                                                        Work</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary btn-next delivery-address"
                                                id="save-order-address">Save
                                                And Deliver Here</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Customer Address Left ends -->

                            <!-- Checkout Customer Address Right starts -->
                            <div class="customer-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><span
                                                id='add_firstname'>{{ Auth::guard('customer')->user()->customer_firstname }}</span>&nbsp;
                                            <span
                                                id='add_lastname'>{{ Auth::guard('customer')->user()->customer_lastname }}</span>
                                        </h4>
                                    </div>
                                    <div class="card-body actions">
                                        <p class="card-text mb-0" id='add_house_number'></p>
                                        <p class="card-text" id='add_landmark'></p>
                                        <p class="card-text"><span id='add_state'></span><span id='add_city'></span>
                                        </p>
                                        <p class="card-text" id='add_phone_no'>
                                            {{ Auth::guard('customer')->user()->customer_phone }}</p>
                                        <!-- <button type="button"
                                            class="btn btn-primary btn-block btn-next delivery-address mt-2">
                                            Deliver To This Address
                                        </button> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Customer Address Right ends -->
                        </form>
                    </div>
                    <!-- Checkout Customer Address Ends -->

                    <!-- Checkout Payment Starts -->
                    <div id="step-payment" class="content" style="margin-top: 2rem;">
                        <form id="checkout-payment" enctype="multipart/form-data">
                            @csrf
                            <div class="payment-type">
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Payment options</h4>
                                        <p class="card-text text-muted mt-25">Be sure to click on correct payment option
                                        </p>
                                    </div>

                                    <div class="card-body">

                                        <ul class="other-payment-options list-unstyled">
                                            <li class="py-50">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customColorRadio2" name="payment_status"
                                                        class="custom-control-input pyment_option" value="yes"
                                                        onclick="getvalue('yes')" />
                                                    <label class="custom-control-label" for="customColorRadio2"> Yes
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="py-50">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customColorRadio3" name="payment_status"
                                                        class="custom-control-input pyment_option" value="no"
                                                        onclick="getvalue('no')" />
                                                    <label class="custom-control-label" for="customColorRadio3"> No
                                                    </label>
                                                </div>
                                            </li>

                                        </ul>
                                        <!-- <hr class="my-2" />
                                        <div class="gift-card mb-25">
                                            <p class="card-text">
                                                <i data-feather="plus-circle" class="mr-50 font-medium-5"></i>
                                                <span class="align-middle">Add Gift Card</span>
                                            </p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="amount-payable checkout-options" style="display:none">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Upload Payment Receipts</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 m-1">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="payment_file"
                                                        name="payment_file" />
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-center mb-2 preview_div" style="display:none">
                                            <label for="basicInputFile mb-2"><b>Preview </b></label><br>
                                            <img id="preview_img" width="120" height="150" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 text-center" style="margin-bottom: 20px;">
                                <button type="button"
                                    class="btn btn-primary btn-next waves-effect waves-float waves-light"
                                    id="save-order-payment">Submit</button>
                            </div>


                        </form>
                    </div>
                    <!-- Checkout Payment Ends -->
                    <!-- </div> -->
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        //state wise district
        // $("#address").attr('disabled', true);
        // $("#payment").attr('disabled', true);
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        
        $('#state').change(function(){
            var state_id = this.value;
            $('#district').empty();
                $.ajax({
                url: "{{url('get-district-list')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}', state_id:state_id},
                success:function(res){
                    $('#district').append('<option value="">Select District</option>');
                    $.each(res, function(key,val) {
                        $('#district').append('<option value='+val.id+'>'+val.title+'</option>');
                    });
                }
            });
        })

        $('#firstname,#lastname,#city,#state').keypress(function(){
            return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122));
        });

        $('#firstname').keyup(function(){
            $('#add_firstname').empty();
            $('#add_firstname').text(this.value);
        });

        $('#lastname').keyup(function(){
            $('#add_lastname').empty();
            $('#add_lastname').text(this.value);
        });

        $('#phone_no').keyup(function(){
            $('#add_phone_no').empty();
            $('#add_phone_no').text(this.value);
        });

        $('#state').keyup(function(){
            $('#add_state').empty();
            $('#add_state').text(this.value+" : ");
        });

        $('#city').keyup(function(){
            $('#add_city').empty();
            $('#add_city').text(this.value + $('#checkout-pincode').text());
        });

        $('#house_number').keyup(function(){
            $('#add_house_number').empty();
            $('#add_house_number').text(this.value);
        });

        $('#landmark').keyup(function(){
            $('#add_landmark').empty();
            $('#add_landmark').text(this.value);
        });

        $('#checkout-pincode').keyup(function() {
            $('#add_city').empty();
            $('#add_city').text($('#add_city').text + $("checkout-pincode").text());
        });

        $('body').on('focusout', '.qty-change', function(){
            var id = this.id;
            var id_new = id.split("_", 2);
            var current_id = id_new[1];
            var item_price = parseFloat($('#item-price-'+current_id).text().replace("Rs. ", ""));
            var item_quantity = parseInt($("#quantity_"+current_id).val());
            var total_amount = item_quantity * item_price;
            $('#total_price_'+current_id).html("Rs. " + total_amount);
            var cart_id = $("#cart_id_"+current_id).val();

            $.ajax({
                url:"/update-quantity-in-cart",
                method:"POST", //First change type to method here
                data:{
                    cart_id: cart_id, item_quantity: item_quantity
                },
                success:function(response) {
                    console.log(response);
                    location.reload();
                },
                error:function(){
                    console.log("error");
                }
            });

        });

        $('body').on('click', '.qty-div', function(){
            
            var id = this.id;
            var id_new = id.split("-", 3);
            var current_id = id_new[2];
            var item_price = parseFloat($('#item-price-'+current_id).text().replace("Rs. ", ""));
            var item_quantity = parseInt($("#quantity_"+current_id).val());
            var total_amount = item_quantity * item_price;
            $('#total_price_'+current_id).html("Rs. " + total_amount);
            var cart_id = $("#cart_id_"+current_id).val();
            
            $.ajax({
                url:"/update-quantity-in-cart",
                method:"POST", //First change type to method here
                data:{
                    "_token": "{{ csrf_token() }}", cart_id: cart_id, item_quantity: item_quantity
                },
                success:function(response) {
                    console.log(response);
                    location.reload();
                },
                error:function(){
                    console.log("error");
                }
            });
        });

        $("#save-cart-details").click(function() {
            $.ajax({
                url:"/save_order",
                method:"POST", //First change type to method here
                data: $("#form_card").serialize(),
                async: false,
                success:function(response) {
                    if(response == "success"){
                        checkoutWizard = document.querySelector('.checkout-tab-steps');
                        if (typeof checkoutWizard !== undefined && checkoutWizard !== null) {
                            var wizard = new Stepper(checkoutWizard, {
                                linear: false
                            });

                            wizard.next();
                            
                            // $(checkoutWizard)
                            //     .find('.btn-next')
                            //     .each(function () {
                            //         $(this).on('click', function (e) {
                            //             // if(response == "success"){
                            //                 wizard.next();
                            //             // }
                            //     });
                            // });

                            $(checkoutWizard)
                                .find('.btn-prev')
                                .on('click', function () {
                                    wizard.previous();
                            });
                        }
                        // Swal.fire('Success!', 'Information Saved Successfully', 'success').then(function() {
                        //     // window.location = "/checkout";
                        //     $("#address").attr('disabled', false);
                        // });
                    }
                },
                error:function(){
                    console.log("error");
                }
            });
        });

        $("#save-order-address").click(function() {
            var dataString = $("#form_card, #checkout-address").serialize();
            $.ajax({
                url:"/save_order_address",
                method:"POST",
                data: dataString,
                async: false,
                success:function(response) {
                    if(response == "success"){
                        Swal.fire('Success!', 'Information Saved Successfully', 'success').then(function() {
                        });
                        $('#address_tab').addClass('crossed');
                        $('#address_tab').removeClass('active');
                        $('#payment_tab').addClass('active');
                        $('#address').attr('aria-selected', false);
                        $('#payment').attr('aria-selected', true);
                        $('#step-payment').addClass('dstepper-block');
                        $('#step-payment').addClass('active');
                        $('#step-address').removeClass('dstepper-block');
                        $('#step-address').removeClass('active');
                    }
                },
                error:function(){
                    console.log("error");
                }
            });
        });

        $("#save-order-payment").click(function() {
            var dataString = $("#form_card, #checkout-address, #checkout-payment").serialize();
            // $.ajax({
            //     url:"/save_order_payment",
            //     method:"POST",
            //     data: dataString,
            //     async: false,
            //     success:function(response) {
            //         if(response == "success"){
            //             Swal.fire('Success!', 'Information Saved Successfully', 'success').then(function() {
            //                 window.location = "/checkout";
            //             });
            //         }
            //     },
            //     error:function(){
            //         console.log("error");
            //     }
            // });
            var formData = new FormData($( "#checkout-payment" )[0]);  
            // var formData = new FormData();
            // formData.append('form1', $('#form_card').get(0));
            // formData.append('form2', $('#checkout-address').get(0));
            // formData.append('form3', $('#checkout-payment').get(0));
            // alert(formData);
            $.ajax({  
                url:"/save_order_payment",
                type: 'POST',  
                data: formData,  
                async: false,  
                cache: false,  
                contentType: false,  
                processData: false,  
                success: function (returndata) {  
                    alert(returndata);  
                },  
                error: function (returndata) {  
                    alert(returndata);  
                }  
            });  

            
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_img').attr('src', e.target.result);
                    $("#preview_img").show();
                }
                reader.readAsDataURL(input.files[0]);
                $('.preview_div').show();
            }
        }
    
        $("#payment_file").change(function(){
            readURL(this);
        });

    });

    function getvalue(value){
            if(value == 'yes'){
                $('.checkout-options').show();
            }else{
                $('.checkout-options').hide();
            }
    }

    function remove_cart(cart_id, order_item_id){
        if(confirm("Do you want to delete this record?"))
        {
            $.ajax({
                url:'remove_cart',
                data: { _token: "{{ csrf_token() }}", 'cart_id': cart_id, 'order_item_id': order_item_id },
                type:'post',
                success:function(response)
                {
                    console.log(response);
                    // $('#sid'+product_id).remove();
                    // alert("Product Deleted Successfully");
                    window.location = "/checkout";
                }
            });
        }
    }

   
</script>