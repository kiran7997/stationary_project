@extends('layouts.app')

@section('content')
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <!--/ Line Chart -->
<div class="col-lg-12 col-15">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            <p class="card-text mr-25 mb-0">Updated 1 month ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="media">
                <div class="avatar bg-light-primary mr-2">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">
                  <?php
                    $count = DB::table('categories')->count();
                    echo '<h3>'.$count.'</h3>';
                  ?>
                  </h4>
                  <p class="card-text font-small-3 mb-0">Catagory</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="media">
                <div class="avatar bg-light-info mr-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">
                  <?php
                    $count = DB::table('customers')->count();
                    echo '<h3>'.$count.'</h3>';
                  ?>
                  </h4>
                  <p class="card-text font-small-3 mb-0">Customers</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="media">
                <div class="avatar bg-light-danger mr-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">
                  <?php
                    $count = DB::table('aproducts')->count();
                    echo '<h3>'.$count.'</h3>';
                  ?>
                  </h4>
                  <p class="card-text font-small-3 mb-0">Products</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="media">
                <div class="avatar bg-light-success mr-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0">
                  <?php
                    $count = DB::table('inventories')->count();
                    echo '<h3>'.$count.'</h3>';
                  ?>
                  
                  </h4>
                  <p class="card-text font-small-3 mb-0">Inventoeries</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Miscellaneous Charts -->

  <!-- Stats Vertical Card -->
  <div class="row">
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-info p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="eye" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">
          <?php
            $count = DB::table('stocks')->count();
            echo '<h3>'.$count.'</h3>';
          ?>
          </h2>
          <p class="card-text">Stocks</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-warning p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="message-square" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">
          <?php
           $count = DB::table('units')->count();
           echo '<h3>'.$count.'</h3>';
         ?>
          </h2>
          <p class="card-text">Units</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-danger p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="shopping-bag" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">97.8k</h2>
          <p class="card-text">Orders</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-primary p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="heart" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">26.8</h2>
          <p class="card-text">Bookmarks</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-success p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="award" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">689</h2>
          <p class="card-text">Reviews</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-danger p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="truck" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="font-weight-bolder">2.1k</h2>
          <p class="card-text">Returns</p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Stats Vertical Card -->
        </div>
    </div>
    <!-- END: Content-->
@endsection