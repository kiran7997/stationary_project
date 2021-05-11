
 @extends('customer.layouts.app')
@section('title', 'Deatils')
@section('content')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-details.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-number-input.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
 
    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Product Details</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Customer Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a>
                    </li>
                    <li class="breadcrumb-item active">Details
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
              <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
              </div>
            </div>
          </div>
        </div>

 <div class="content-body">
        <!-- app e-commerce details start -->

<section class="app-ecommerce-details">
  
  <div class="card">
    <!-- Product Details starts -->
    
    <div class="card-body">
   
      <div class="row my-2">
      
        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
          <div class="d-flex align-items-center justify-content-center">
        
            <img
            src="{{url('product_images/'.$product_data->image_url)}}" width='100' height="100"
              class="img-fluid product-img"
              alt="product image" 
            />
          </div>
        </div>
        <div class="col-12 col-md-7">
          <h4>{{$product_data->product_name}}</h4>
          
          <div class="ecommerce-details-price d-flex flex-wrap mt-1">
            <h4 class="item-price mr-1">${{$product_data->base_price}}</h4>
            
          </div>
          <p class="card-text">Available - <span class="text-success">In stock</span></p>
          <p class="card-text">
          {{$product_data->description}}
          </p>
          
          <hr />
          
          
          <div class="d-flex flex-column flex-sm-row pt-1">
            <a href="javascript:void(0)" class="btn btn-primary btn-cart mr-0 mr-sm-1 mb-1 mb-sm-0">
              <i data-feather="shopping-cart" class="mr-50"></i>
              <span class="add-to-cart">Add to cart</span>
            </a>
           
                        </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Product Details ends -->
   
    <!-- Item features starts -->
    <div class="item-features">
      <div class="row text-center">
        <div class="col-12 col-md-4 mb-4 mb-md-0">
          <div class="w-75 mx-auto">
            <i data-feather="award"></i>
            <h4 class="mt-2 mb-1">100% Original</h4>
            <p class="card-text">Chocolate bar candy canes ice cream toffee. Croissant pie cookie halvah.</p>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4 mb-md-0">
          <div class="w-75 mx-auto">
            <i data-feather="clock"></i>
            <h4 class="mt-2 mb-1">10 Day Replacement</h4>
            <p class="card-text">Marshmallow biscuit donut dragée fruitcake. Jujubes wafer cupcake.</p>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4 mb-md-0">
          <div class="w-75 mx-auto">
            <i data-feather="shield"></i>
            <h4 class="mt-2 mb-1">1 Year Warranty</h4>
            <p class="card-text">Cotton candy gingerbread cake I love sugar plum I love sweet croissant.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Item features ends -->
   
   <!-- Related Products starts -->
   <div class="card-body">
      <div class="mt-4 mb-2 text-center">
        <h4>Related Products</h4>
        <p class="card-text">People also search for this items</p>
      </div>
      <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Apple Watch Series 6</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="../../../app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$399.98</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Apple MacBook Pro - Silver</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-50">
                <img src="../../../app-assets/images/elements/macbook-pro.png" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$2449.49</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Apple HomePod (Space Grey)</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="../../../app-assets/images/elements/homepod.png" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$229.29</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">Magic Mouse 2 - Black</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="../../../app-assets/images/elements/magic-mouse.png" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$90.98</p>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="javascript:void(0)">
              <div class="item-heading">
                <h5 class="text-truncate mb-0">iPhone 12 Pro</h5>
                <small class="text-body">by Apple</small>
              </div>
              <div class="img-container w-50 mx-auto py-75">
                <img src="../../../app-assets/images/elements/iphone-x.png" class="img-fluid" alt="image" />
              </div>
              <div class="item-meta">
                <ul class="unstyled-list list-inline mb-25">
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                  <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                </ul>
                <p class="card-text text-primary mb-0">$1559.99</p>
              </div>
            </a>
          </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
    <!-- Related Products ends -->
  </div>
</section>
<!-- app e-commerce details end -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">
  <!-- Customizer header -->
  <div class="customizer-header px-2 pt-1 pb-0 position-relative">
    <h4 class="mb-0">Theme Customizer</h4>
    <p class="m-0">Customize & Preview in Real Time</p>

    <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
  </div>

  <hr />

  <!-- Styling & Text Direction -->
  <div class="customizer-styling-direction px-2">
    <p class="font-weight-bold">Skin</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input
          type="radio"
          id="skinlight"
          name="skinradio"
          class="custom-control-input layout-name"
          checked
          data-layout=""
        />
        <label class="custom-control-label" for="skinlight">Light</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input
          type="radio"
          id="skinbordered"
          name="skinradio"
          class="custom-control-input layout-name"
          data-layout="bordered-layout"
        />
        <label class="custom-control-label" for="skinbordered">Bordered</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input
          type="radio"
          id="skindark"
          name="skinradio"
          class="custom-control-input layout-name"
          data-layout="dark-layout"
        />
        <label class="custom-control-label" for="skindark">Dark</label>
      </div>
      <div class="custom-control custom-radio">
        <input
          type="radio"
          id="skinsemidark"
          name="skinradio"
          class="custom-control-input layout-name"
          data-layout="semi-dark-layout"
        />
        <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
      </div>
    </div>
  </div>

  <hr />

  <!-- Menu -->
  <div class="customizer-menu px-2">
    <div id="customizer-menu-collapsible" class="d-flex">
      <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
      <div class="custom-control custom-control-primary custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
      </div>
    </div>
  </div>
  <hr />

  <!-- Layout Width -->
  <div class="customizer-footer px-2">
    <p class="font-weight-bold">Layout Width</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input" checked />
        <label class="custom-control-label" for="layout-width-full">Full Width</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input" />
        <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
      </div>
    </div>
  </div>
  <hr />

  <!-- Navbar -->
  <div class="customizer-navbar px-2">
    <div id="customizer-navbar-colors">
      <p class="font-weight-bold">Navbar Color</p>
      <ul class="list-inline unstyled-list">
        <li class="color-box bg-white border selected" data-navbar-default=""></li>
        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
        <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
        <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
      </ul>
    </div>

    <p class="navbar-type-text font-weight-bold">Navbar Type</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input" checked />
        <label class="custom-control-label" for="nav-type-floating">Floating</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input" />
        <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="nav-type-static" name="navType" class="custom-control-input" />
        <label class="custom-control-label" for="nav-type-static">Static</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input" />
        <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
      </div>
    </div>
  </div>
  <hr />

 
    <!-- End: Customizer-->

    <!-- Buynow Button-->
    <div class="buy-now"><a href="https://1.envato.market/vuexy_admin" target="_blank" class="btn btn-danger">Buy Now</a>

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-ecommerce-details.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-number-input.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
   
  </body>
  <!-- END: Body-->
</html>
@endsection