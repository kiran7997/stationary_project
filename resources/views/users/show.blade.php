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
                        <h2 class="content-header-title float-left mb-0">Users Management</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a>
                                </li>
                                <li class="breadcrumb-item active">User
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
                                <h4 class="card-title">Users Details</h4>
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
                                                            <img class="img-fluid rounded"
                                                                src="{{url('user_images/'.$user->profile_image)}}"
                                                                height="104" width="104" alt="User avatar" />
                                                            <div class="d-flex flex-column ml-1">
                                                                <div class="user-info mb-1">
                                                                    <h4 class="mb-0">{{ $user->firstname }}</h4>
                                                                    <span class="card-text">{{ $user->email }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                    <div class="user-info-wrapper">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="user-info-title">
                                                                <i data-feather="user" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Username</span>
                                                            </div>
                                                            <p class="card-text mb-0">&nbsp;{{ $user->username }}</p>
                                                        </div>

                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="star" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Department</span>
                                                            </div>
                                                            <p class="card-text mb-0"> &nbsp;
                                                                @if(!empty($user->getRoleNames()))
                                                                @foreach($user->getRoleNames() as $v)
                                                                <label class="badge badge-success">{{ $v }}</label>
                                                                @endforeach
                                                                @endif</p>
                                                        </div>

                                                        <div class="d-flex flex-wrap">
                                                            <div class="user-info-title">
                                                                <i data-feather="phone" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                                                            </div>
                                                            <p class="card-text mb-0">&nbsp; {{ $user->phone_no }}</p>
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