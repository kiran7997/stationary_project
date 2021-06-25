@extends('layouts.app')
@section('title', 'Order Status')
@section('content')

<head>

    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Order Status</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('ordered/{data}') }}">Order Status</a>
                                </li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                <!-- <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#supplierPModal">
                                    Add New Supplier
                                </button> -->
                            </div>
                       
                        <div style="margin:20px;">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    <p>{{ $message }}</p>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <table id="example" class="display nowrap stripe" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Order Status </th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody id="appendData">
                                    @foreach($order_data as $order)
                                    <tr id="sid{{$order->order_id}}" style="text-align:center">
                                        <td>{{$order->order_id}}</td>
                                        <td>{{ucwords($order->order_status)}}</td>
                                        <td>{{ucwords($order->firstname)}}</td>
                                        <td>{{ucwords($order->lastname)}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone_no}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr />
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script>
	$(document).ready(function() {
    // $('#example').DataTable();
    $('#example').DataTable( {
        // "scrollY": 200,
        "scrollX": true
    } );

    $(".delete").on("click", function () {
    return confirm('Are you sure you want to Delete?');
	});


    
});


</script>