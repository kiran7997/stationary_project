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
                        <h2 class="content-header-title float-left mb-0">Department</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Department</a>
                                </li>
                                <li class="breadcrumb-item active">Show
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
                                <h4 class="card-title">Show Department</h4>
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
                                <!-- User Card starts-->
                                <div class="col-xl-9 col-lg-8 col-md-7">
                                    <div class="card user-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                    <div class="user-avatar-section">
                                                        <div class="d-flex justify-content-start">

                                                            <div class="d-flex flex-column ml-1">
                                                                <div class="user-info mb-1">
                                                                    <h4 class="mb-2">{{ $role->name }}</h4>
                                                                    <h4 class="mb-2">Permissions</h4>
                                                                    <span class="card-text">
                                                                        @if(!empty($rolePermissions))
                                                                        @foreach($rolePermissions as $v)
                                                                        <label class="alert alert-success">
                                                                            {{ $v->name }},</label>
                                                                        @endforeach
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /User Card Ends-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection