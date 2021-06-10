@extends('layouts.app')

@section('content')
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-danger p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather="shopping-bag" class="font-medium-5"></i>
                                </div>
                            </div>
                            <a href="{{ url('process-order-list') }}"><h2 class="font-weight-bolder">{{$order_count}}</h2></a>
                            <p class="card-text">New Invoice Orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-info p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather="eye" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">36.9k</h2>
                            <p class="card-text">Views</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-warning p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather="message-square" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">12k</h2>
                            <p class="card-text">Comments</p>
                        </div>
                    </div>
                </div>                
                <div class="col-xl-3 col-md-4 col-sm-6">
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
                
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection