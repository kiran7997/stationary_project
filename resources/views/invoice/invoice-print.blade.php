

<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/vuexy_admin
Renew Support: https://1.envato.market/vuexy_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Invoice Print</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice-print.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="invoice-print p-3">
  <div class="d-flex justify-content-between flex-md-row flex-column pb-2">
    <div>
      <div class="d-flex mb-1">
        <svg
          viewBox="0 0 139 95"
          version="1.1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          height="24"
        >
          <defs>
            <linearGradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
              <stop stop-color="#000000" offset="0%"></stop>
              <stop stop-color="#FFFFFF" offset="100%"></stop>
            </linearGradient>
            <linearGradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
              <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
              <stop stop-color="#FFFFFF" offset="100%"></stop>
            </linearGradient>
          </defs>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
              <g id="Group" transform="translate(400.000000, 178.000000)">
                
                
              </g>
            </g>
          </g>
        </svg>
        <h3 class="text-primary font-weight-bold ml-1">Invoice </h3>
      </div>
      <p class="card-text mb-25">Office Jamshri Mills Complex, </p>
              <p class="card-text mb-25">Station Rd, New Laxmi Chawl,</p>
              <p class="card-text mb-25">Damani Nagar, Solapur, Maharashtra.</p>
              <p class="card-text mb-0">+91 123456789</p>
    </div>
    <div class="mt-md-0 mt-2">
      <h4 class="font-weight-bold text-right mb-1">Order ID {{$print->order_id}}</h4>
      <div class="invoice-date-wrapper mb-50">
        <span class="invoice-date-title">Order Date:</span>
        <span class="font-weight-bold">{{$print->order_date}} </span>
      </div>
      <div class="invoice-date-wrapper">
        <span class="invoice-date-title">arrival Date:</span>
        <span class="font-weight-bold">{{$print->arrival_date}}</span>
      </div>
    </div>
  </div>

  <hr class="my-2" />

  <div class="row pb-2">
    <div class="col-sm-6">
      <h6 class="mb-1">Invoice To:</h6>
      <p class="mb-25">{{$print->firstname}} {{$print->lastname}}</p>
      <p class="mb-25">{{$print->house_no}} {{$print->landmark}}</p>
      <p class="mb-25">{{$print->city}}</p>
      <p class="mb-25">{{$print->state}}. {{$print->pincode}}</p>
      <p class="card-text mb-0">{{$print->email}}</p>
      
    </div>
    <div class="col-sm-6 mt-sm-0 mt-2">
      <h6 class="mb-1">Payment Details:</h6>
      <table>
        <tbody>
          <tr>
            <td class="pr-1">Total Due:</td>
            <td><strong>$12,110.55</strong></td>
          </tr>
          <tr>
            <td class="pr-1">Bank name:</td>
            <td>American Bank</td>
          </tr>
          <tr>
            <td class="pr-1">Country:</td>
            <td>United States</td>
          </tr>
          <tr>
            <td class="pr-1">IBAN:</td>
            <td>ETD95476213874685</td>
          </tr>
          <tr>
            <td class="pr-1">SWIFT code:</td>
            <td>BR91905</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="table-responsive mt-2">
    <table class="table m-0">
      <thead>
        <tr>
        <th class="py-1">Order Summery</th>
                <th class="py-1">Rate</th>
                <th class="py-1">Quantity</th>
               
        </tr>
      </thead>
      <tbody>
        <tr>
        <td class="py-1">
                
                <p class="card-text font-weight-bold mb-25">{{$print->product_name}}</p>
                <p class="card-text text-nowrap">
                </p>
              </td>
              <td class="py-1">
                <span class="font-weight-bold">{{$print->price}}</span>
              </td>
              <td class="py-1">
                <span class="font-weight-bold">{{$print->quantity}}</span>
              </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="row invoice-sales-total-wrapper mt-3">
    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
      <p class="card-text mb-0">
       
      </p>
    </div>
    <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
      <div class="invoice-total-wrapper">
        <div class="invoice-total-item">
          <p class="invoice-total-title">Subtotal:</p>
          <p class="invoice-total-amount">{{$print->subtotal}}</p>
        </div>
        <div class="invoice-total-item">
          <p class="invoice-total-title">Discount:</p>
          <p class="invoice-total-amount">$28</p>
        </div>
        <div class="invoice-total-item">
          <p class="invoice-total-title">Tax:</p>
          <p class="invoice-total-amount">{{$print->tax_rate}}</p>
        </div>
        <hr class="my-50" />
        <div class="invoice-total-item">
          <p class="invoice-total-title">Total:</p>
          <p class="invoice-total-amount">{{$print->total}}</p>
        </div>
      </div>
    </div>
  </div>

  <hr class="my-2" />

  
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice-print.min.js"></script>
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
