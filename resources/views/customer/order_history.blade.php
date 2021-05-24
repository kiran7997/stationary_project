@extends('customer.layouts.app')
@section('title', 'Order-History')
@section('content')
<!-- Responsive Datatable -->
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Order History</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('customer-dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Report</a>
                                </li>
                                <li class="breadcrumb-item active">Order History
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="responsive-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

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
                                            <th>Sr No.</th>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>House No</th>
                                            <th>Landmark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ @$i++ }}</td>
                                            <td>#{{ @$user->order_id }}</td>
                                            <td>{{ @$user->order_date }}</td>
                                            <td>{{ @$user->product_name }}</td>
                                            <td>{{ @$user->quantity }}</td>
                                            <td>{{ @$user->house_no }}</td>
                                            <td>{{ @$user->landmark }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



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
});
</script>