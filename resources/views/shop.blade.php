@extends('customer.layouts.app')
@section('title', 'Shop')
@section('content')


<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sliders.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.min.css">
<!-- END: Page CSS-->


</head>



<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Customer Dashboard</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Shop
                </li>

              </ol>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
    
    <!-- E-commerce Search Bar Starts -->
    <section id="ecommerce-searchbar" class="ecommerce-searchbar">
      <div class="row mt-1">
        <div class="col-sm-12">
          <div class="input-group input-group-merge">
            <input type="text" class="form-control search-product" id="shop-search" placeholder="Search Product"
              aria-label="Search..." aria-describedby="shop-search" />
            <div class="input-group-append">
              <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- E-commerce Search Bar Ends -->

    <!-- E-commerce Products Starts -->

    <section id="ecommerce-products" class="grid-view">
      <!-- 1st product -->

      @foreach($product_data as $data)

      <div class="card ecommerce-card">
        <div class="item-img text-center">

          <!-- <a href="javascript:void(0);" onclick="getProduct({{$data->product_id}})"> -->
<a href="details/{{$data->product_id}}">

            <img class="img-fluid card-img-top" src="{{url('product_images/'.$data->image_url)}}" width='100'
              height="100" alt="img-placeholder" /></a>

        </div>
        <div class="card-body">
          <div class="item-wrapper">

            <div>
              <div class="item-cost">

                <h6 class="item-price">{{$data->base_price}}</h6>
              </div>
            </div>
          </div>
          <h6 class="item-name">
            <a class="text-body" href="app-ecommerce-details.html">{{$data->product_name}}</a>
            
          </h6>
          <p class="card-text item-description">
            {{$data->description}} </p>
        </div>

        <div class="item-options text-center">
          <div class="item-wrapper">
            <div class="item-cost">
              <h4 class="item-price">$999.99</h4>
              <p class="card-text shipping"><span class="badge badge-pill badge-light-success">Free Shipping</span></p>
            </div>
          </div>

          <a href="javascript:void(0)" class="btn btn-primary btn-cart">
            <i data-feather="shopping-cart"></i>
            <span class="add-to-cart">Add to cart</span>
          </a>
        </div>
      </div>

      <!-- 2nd product -->
      @endforeach
    </section>

    <!-- E-commerce Products Ends -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>

    <script>
      function getProduct(product_id)
    {
      $.get('/deatils/'+product_id,function(aproduct)
      {
      alert(product_id);

    
        });

    }
    
    </script>
   
    @endsection