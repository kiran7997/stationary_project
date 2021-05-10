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
                        <h2 class="content-header-title float-left mb-0">Employee</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Employee</a>
                                </li>
                                <li class="breadcrumb-item active">Employee
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
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Employee</h4>
                                <a class="btn btn-outline-primary pull-right" href="{{ route('users.create') }}">
                                    Create Employee</a>
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
                                            {{-- <th>No</th> --}}
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $user)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('users.show',$user->id) }}"><i
                                                        class="btn fa fa-eye text-info" aria-hidden="true"></i>
                                                </a>
                                                <a class="" href="{{ route('users.edit',$user->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
                                                $user->id],'style'=>'display:inline']) !!}
                                                {{ Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit','class' => 'btn text-danger delete')) }}
                                                {{ Form::close() }}
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