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
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i
                                    class="mr-1" data-feather="check-square"></i><span
                                    class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                    class="mr-1" data-feather="message-square"></i><span
                                    class="align-middle">Chat</span></a><a class="dropdown-item"
                                href="app-email.html"><i class="mr-1" data-feather="mail"></i><span
                                    class="align-middle">Email</span></a><a class="dropdown-item"
                                href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span
                                    class="align-middle">Calendar</span></a>
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
                    <div class="step" data-target="#step-address">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box">
                                <i data-feather="home" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Address</span>
                                <span class="bs-stepper-subtitle">Enter Your Address</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i data-feather="chevron-right" class="font-medium-2"></i>
                    </div>
                    <div class="step" data-target="#step-payment">
                        <button type="button" class="step-trigger">
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

                <div class="bs-stepper-content">
                    <!-- Checkout Place order starts -->
                    <div id="step-cart" class="content">
                        <div id="place-order" class="list-view product-checkout">
                            <!-- Checkout Place Order Left starts -->
                            <div class="checkout-items">
                                @foreach($cart_data as $carts)
                                <div class="card ecommerce-card">
                                    <div class="item-img">
                                        <?php $img_urls = json_decode($carts->image_url); ?>
                                        <a href="app-ecommerce-details.html">
                                            <img src="{{ $img_urls[0] }}" alt="img-placeholder" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="item-name">
                                            <h6 class="mb-0"><a href="app-ecommerce-details.html"
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
                                            <div class="input-group quantity-counter-wrapper">
                                                <input type="text" class="quantity-counter qty-change"
                                                    value="<?php if(!empty($carts->quantity)){ echo $carts->quantity; }else{ echo "1";} ?>" />
                                            </div>
                                        </div>
                                        <span class="delivery-date text-muted">Delivery by, {{ $days_7 }}</span>
                                        <!-- <span class="text-success">17% off 4 offers Available</span> -->
                                    </div>
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-cost">
                                                <h4 class="item-price">Rs. {{ $carts->product_price }}</h4>
                                                <p class="card-text shipping">
                                                    <!-- <span class="badge badge-pill badge-light-success">Free Shipping</span> -->
                                                </p>
                                            </div>
                                        </div>
                                        <div class="item-wrapper">
                                            <div class="item">
                                                <h5 class="item-price total-item-price">Rs.
                                                    <?php if(!empty($carts->quantity)){ echo ((float)($carts->quantity) * (float)($carts->product_price)); }else{ echo $carts->product_price;} ?>
                                                </h5>
                                                <p class="card-text shipping">
                                                    <!-- <span class="badge badge-pill badge-light-success">Free Shipping</span> -->
                                                </p>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-light mt-1 remove-wishlist">
                                            <i data-feather="x" class="align-middle mr-25"></i>
                                            <span>Remove</span>
                                        </button>
                                        <!-- <button type="button" class="btn btn-primary btn-cart move-cart">
                                                <i data-feather="heart" class="align-middle mr-25"></i>
                                                <span class="text-truncate">Add to Wishlist</span>
                                            </button> -->
                                    </div>
                                </div>
                                @endforeach
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
                                                    <div class="detail-amt">$598</div>
                                                </li>
                                                <li class="price-detail">
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
                                                </li>
                                                <li class="price-detail">
                                                    <div class="detail-title">Delivery Charges</div>
                                                    <div class="detail-amt discount-amt text-success">Free</div>
                                                </li>
                                            </ul>
                                            <hr />
                                            <ul class="list-unstyled">
                                                <li class="price-detail">
                                                    <div class="detail-title detail-total">Total</div>
                                                    <div class="detail-amt font-weight-bolder">$574</div>
                                                </li>
                                            </ul>
                                            <button type="button"
                                                class="btn btn-primary btn-block btn-next place-order mt-2">Place
                                                Order</button>
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
                                                    value="{{ Auth::guard('customer')->user()->customer_firstname }}" />
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
                                                    name="house_number" placeholder="9447 Glen Eagles Drive" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-landmark">Landmark </label>
                                                <input type="text" id="landmark" class="form-control" name="landmark"
                                                    placeholder="Near Apollo Hospital" />
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
                                                    <option value="{{$state->state_id}}">{{$state->state_title}}
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-city">Town/City:</label>
                                                <input type="text" id="city" class="form-control" name="city"
                                                    placeholder="Solapur" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="checkout-pincode">Pincode:</label>
                                                <input type="number" id="checkout-pincode" class="form-control"
                                                    name="pincode" placeholder="201301" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label for="add-type">Address Type:</label>
                                                <select class="form-control" id="add-type" name='address_type'>
                                                    <option>Home</option>
                                                    <option>Work</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary btn-next delivery-address">Save
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
                                        <button type="button"
                                            class="btn btn-primary btn-block btn-next delivery-address mt-2">
                                            Deliver To This Address
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Customer Address Right ends -->
                        </form>
                    </div>
                    <!-- Checkout Customer Address Ends -->

                    <!-- Checkout Payment Starts -->
                    <div id="step-payment" class="content">
                        <form id="checkout-payment" class="list-view product-checkout" onsubmit="return false;">
                            <div class="payment-type">
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Payment options</h4>
                                        <p class="card-text text-muted mt-25">Be sure to click on correct payment option
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-holder-name my-75">John Doe</h6>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customColorRadio1" name="paymentOptions"
                                                class="custom-control-input" checked />
                                            <label class="custom-control-label" for="customColorRadio1">
                                                US Unlocked Debit Card 12XX XXXX XXXX 0000
                                            </label>
                                        </div>
                                        <div class="customer-cvv mt-1">
                                            <div class="form-inline">
                                                <label class="mb-50" for="card-holder-cvv">Enter CVV:</label>
                                                <input type="password"
                                                    class="form-control ml-sm-75 ml-0 mb-50 input-cvv" name="input-cvv"
                                                    id="card-holder-cvv" />
                                                <button type="button"
                                                    class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50">Continue</button>
                                            </div>
                                        </div>
                                        <hr class="my-2" />
                                        <ul class="other-payment-options list-unstyled">
                                            <li class="py-50">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customColorRadio2" name="paymentOptions"
                                                        class="custom-control-input" />
                                                    <label class="custom-control-label" for="customColorRadio2"> Credit
                                                        / Debit / ATM Card </label>
                                                </div>
                                            </li>
                                            <li class="py-50">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customColorRadio3" name="paymentOptions"
                                                        class="custom-control-input" />
                                                    <label class="custom-control-label" for="customColorRadio3"> Net
                                                        Banking </label>
                                                </div>
                                            </li>
                                            <li class="py-50">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customColorRadio4" name="paymentOptions"
                                                        class="custom-control-input" />
                                                    <label class="custom-control-label" for="customColorRadio4"> EMI
                                                        (Easy Installment) </label>
                                                </div>
                                            </li>
                                            <li class="py-50">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customColorRadio5" name="paymentOptions"
                                                        class="custom-control-input" />
                                                    <label class="custom-control-label" for="customColorRadio5"> Cash On
                                                        Delivery </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr class="my-2" />
                                        <div class="gift-card mb-25">
                                            <p class="card-text">
                                                <i data-feather="plus-circle" class="mr-50 font-medium-5"></i>
                                                <span class="align-middle">Add Gift Card</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="amount-payable checkout-options">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Price Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled price-details">
                                            <li class="price-detail">
                                                <div class="details-title">Price of 3 items</div>
                                                <div class="detail-amt">
                                                    <strong>$699.30</strong>
                                                </div>
                                            </li>
                                            <li class="price-detail">
                                                <div class="details-title">Delivery Charges</div>
                                                <div class="detail-amt discount-amt text-success">Free</div>
                                            </li>
                                        </ul>
                                        <hr />
                                        <ul class="list-unstyled price-details">
                                            <li class="price-detail">
                                                <div class="details-title">Amount Payable</div>
                                                <div class="detail-amt font-weight-bolder">$699.30</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Checkout Payment Ends -->
                    <!-- </div> -->
                </div>
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
        $('#state').change(function(){
            var state_id = this.value;
            $('#district').empty();
                $.ajax({
                url: "{{url('get-district-list')}}",
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
        $('#add_city').text(this.value);
    });

    $('#house_number').keyup(function(){
        $('#add_house_number').empty();
        $('#add_house_number').text(this.value);
    });

    $('#landmark').keyup(function(){
        $('#add_landmark').empty();
        $('#add_landmark').text(this.value);
    });

    $('body').on('focusout', '.qty-change', function(){
        alert(this.value);
        $(this).closest(".total-item-price").html("hiii");
    });
});
</script>