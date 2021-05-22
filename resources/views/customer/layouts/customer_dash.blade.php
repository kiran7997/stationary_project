@extends('customer.layouts.app')
@section('title', 'Customer-Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
<style>
    .pagination {
        justify-content: center !important;
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
                        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('customer-dashboard') }}">Dashboard</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Starts -->
        <section id="wishlist" class="grid-view wishlist-items">
            @foreach($product_data as $data)
            <?php $list_img=json_decode($data->image_url); ?>
            <div class="card ecommerce-card">
                <div class="item-img text-center m-1" style=" margin: auto;display: block;">
                    <a href="details/{{$data->product_id}}">
                        <img src="{{ $list_img[0] }}" class="img-fluid" alt="img-placeholder" style="width: 250px; height: 200px;" />
                    </a>
                </div>
                <div class="card-body">
                    <div class="item-name">
                        <h6 class="item-price" style="color:#d05a21e3">RS.&nbsp;{{$data->base_price}}</h6>
                        <a href="details/{{$data->product_id}}">{{ucwords($data->product_name)}}</a>
                    </div>
                    <p class="card-text" style='color:black !important;font-weight:500;line-height: 25px!important;'>
                        {{ Str::limit($data->description, 50) }}
                    </p>
                    {{-- <span class="badge badge-pill badge-light-success">In Stock</span> --}}
                </div>
            </div>
            @endforeach
        </section>
        <!-- Wishlist Ends -->
        {!! $product_data->render() !!}
    </div>
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection