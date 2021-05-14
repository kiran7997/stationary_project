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
        <div class="content-body">
            <div class="bs-stepper checkout-tab-steps">
                <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control search-product" id="shop-search"
                                    placeholder="Search Product" aria-label="Search..."
                                    aria-describedby="shop-search" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i data-feather="search"
                                            class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="bs-stepper-header">
                    <div class="step" data-target="#step-cart">
                        <button type="button" class="step-trigger">
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <div id="step-cart" class="content">
                        <div id="place-order" class="list-view product-checkout1">
                            <div class="checkout-items">
                                @foreach($product_data as $data)
                                <?php $list_img=json_decode($data->image_url); ?>
                                <div class="card ecommerce-card ">
                                    <div class="item-img">
                                        <a href="details/{{$data->product_id}}">
                                            <img src=" {{ $list_img[0] }}" class='m-2' alt="img-placeholder"
                                                style='border-radius:10px' />
                                        </a>
                                    </div>
                                    <div class="card-body" style='border:none'>
                                        <div class="item-name">
                                            <h6 class="mb-1" style="color:#6610F2"><a
                                                    href="details/{{$data->product_id}}">{{ucwords($data->product_name)}}</a>
                                            </h6>
                                            <span class=" delivery-date mb-1 "><b>{{$data->description}}</b></span>
                                            <div>
                                                <h5 class="delivery-date mb-1" style="color:#d05a21e3"><b>
                                                        RS.&nbsp;{{$data->base_price}}
                                                    </b></h5>
                                            </div>
                                        </div>
                                        <span class="text-success"><small><b>In Stock</b></small></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! $product_data->render() !!}
    </div>
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection