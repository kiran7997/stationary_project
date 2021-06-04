@extends('layouts.app')
@section('content')
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css ') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css ') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css ') }}">
<!-- END: Page CSS-->
<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-12 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">                                                
                                                <h3 class="text-primary invoice-logo">Order Information</h3>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            Order # : <span>{{$order_list->order_id}}</span>
                                        </div>
                                        <div class="col-lg-4">
                                            Order Date : <span>{{$order_list->order_date}}</span>
                                        </div>
                                        <div class="col-lg-4">
                                            Arrival Date : <span>{{$order_list->arrival_date}}</span>
                                        </div>                                       
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            Name : <span>{{$order_list->firstname}} {{$order_list->lastname}}</span>
                                        </div>
                                        <div class="col-lg-4">
                                            Email : <span>{{$order_list->email}}</span>
                                        </div>
                                        <div class="col-lg-4">
                                            Contact : <span>{{$order_list->phone_no}}</span>
                                        </div>                                       
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            Address : <span>{{$order_list->address_type}}</span>
                                        </div>
                                        <div class="col-lg-4">
                                            Assign To : <span>{{$order_list->name}}</span>
                                        </div>                                      
                                    </div>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h3 class="text-primary invoice-logo">Items</h3>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Invoice Description starts -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="py-1">Item</th>
                                                <th class="py-1">Qty</th>
                                                <th class="py-1">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($order_item_data)>0){ ?>
                                            @foreach($order_item_data as $item)
                                            <tr>
                                                <td class="py-1">
                                                    <p class="card-text font-weight-bold mb-25">{{$item->product_name}}</p>
<!--                                                    <p class="card-text text-nowrap">
                                                        Developed a full stack native app using React Native, Bootstrap & Python
                                                    </p>-->
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{$item->quantity}}</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">Rs.{{$item->amount}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{url('generate-po/'.$id.'/download')}}" class="btn btn-success btn-block btn-download-invoice mb-75" target="_blank">Download</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->
@endsection