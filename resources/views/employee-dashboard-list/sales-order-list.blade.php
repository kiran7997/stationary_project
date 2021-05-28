@extends('layouts.app')
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
                        <h2 class="content-header-title float-left mb-0">Sales Assign Order List</h2>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="responsive-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="card-header border-bottom">
                                <h4 class="card-title">Employee</h4>
                                <a class="btn btn-outline-primary pull-right" href="{{ route('users.create') }}">
                                    Create Employee</a>
                            </div> -->
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
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Address</th>
                                            <th>Order Date</th>
                                            <th>Total Amount</th>
                                            <th>Payment Status</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($order_list as $order)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $order->firstname }} {{$order->lastname}}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone_no }}</td>
                                            <td>{{ $order->address_type }}</td>
                                            <td>{{ $order->order_date }}</td>
                                            <td>{{ $order->amount }}</td>
                                            <td>
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-success">Yes</div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('generate-po/'.$order->order_id.'/view') }}" class="btn btn-primary " >Generate PO </a>
                                                <a href="{{ url('generate-po/'.$order->order_id.'/download') }}" target="_blank" class="btn btn-primary " >Download PO</a>
                                            </td>
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

    $(".delete").on("click", function () {
    return confirm('Are you sure you want to Delete?');
});
} );


</script>