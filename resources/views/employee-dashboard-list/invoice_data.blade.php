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
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                            <img src="http://127.0.0.1:8000/logo/msb.png" height="55" >
                                                <h3 class="text-primary invoice-logo">MSB</h3>
                                            </div>
                                            <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                                            <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                                            <p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                                        </div>
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                Invoice
                                                <span class="invoice-number">#3492</span>
                                            </h4>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Date Issued:</p>
                                                <p class="invoice-date">{{$order_list->order_date}}</p>
                                            </div>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Due Date:</p>
                                                <p class="invoice-date">{{$order_list->arrival_date}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h6 class="mb-2">Invoice To:</h6>
                                            <h6 class="mb-25">Thomas shelby</h6>
                                            <p class="card-text mb-25">Shelby Company Limited</p>
                                            <p class="card-text mb-25">Small Heath, B10 0HF, UK</p>
                                            <p class="card-text mb-25">718-986-6062</p>
                                            <p class="card-text mb-0">peakyFBlinders@gmail.com</p>
                                        </div>
                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Total Due:</td>
                                                        <td><span class="font-weight-bold">$12,110.55</span></td>
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

                                <div class="card-body invoice-padding pb-0">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            <p class="card-text mb-0">
                                                <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">{{$order_list->name}}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount">$1800</p>
                                                </div>
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Discount:</p>
                                                    <p class="invoice-total-amount">$28</p>
                                                </div>
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Tax:</p>
                                                    <p class="invoice-total-amount">21%</p>
                                                </div>
                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">$1690</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
                                        Send Invoice
                                    </button> -->
                                    <a href="{{ url('generate-invoice/'.$id.'/download') }}" target="_blank" class="btn btn-success btn-block btn-download-invoice mb-75">Download</a>
                                    <!-- <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-print.html" target="_blank">
                                        Print
                                    </a>
                                    <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-edit.html"> Edit </a>
                                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
                                        Add Payment
                                    </button> -->
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