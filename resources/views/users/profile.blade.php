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
                        <h2 class="content-header-title float-left mb-0">Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
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
                                <!-- User Card starts-->
                                <div class="col-xl-9 col-lg-8 col-md-7">
                                    <div class="card user-card">
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
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="alert-body">
                                                <strong>Whoops!</strong> There were some problems with your
                                                input.<br><br>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                    <div class="user-avatar-section">
                                                        <div class="d-flex justify-content-start">
                                                            <img class="img-fluid rounded"
                                                                src="{{url('user_images/'.Auth::user()->profile_image)}}"
                                                                height="200" width="104" alt="User avatar" />
                                                            <div class="d-flex flex-column ml-1">
                                                                <div class="user-info mb-1">
                                                                    <h4 class="mb-0">{{ Auth::user()->firstname }}</h4>
                                                                    <span
                                                                        class="card-text">{{ Auth::user()->email }}</span>
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
                                                            <p class="card-text mb-0">&nbsp;{{ Auth::user()->username }}
                                                            </p>
                                                        </div>

                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="star" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Department</span>
                                                            </div>
                                                            <p class="card-text mb-0"> &nbsp;
                                                                @if(!empty(Auth::user()->getRoleNames()))
                                                                @foreach(Auth::user()->getRoleNames() as $v)
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
                                                            <p class="card-text mb-0">&nbsp;
                                                                {{ Auth::user()->firstname }}</p>
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
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <form class="needs-validation1" action="{{ url('save_profile/'.Auth::user()->id)}}"
                                    enctype="multipart/form-data" method='POST' novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="firstname">First Name</label>
                                                <input type="text" id="firstname" class="form-control"
                                                    placeholder="First Name" aria-label="Name"
                                                    aria-describedby="firstname" name="firstname" required
                                                    value="{{Auth::user()->firstname}}" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter your first name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="lastname">Last Name</label>
                                                <input type="text" id="lastname" class="form-control"
                                                    placeholder="Last Name" aria-label="Name"
                                                    aria-describedby="lastname" name="lastname" required
                                                    value="{{Auth::user()->lastname}}" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter your Last Name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-email1">Email</label>
                                                <input type="email" id="basic-default-email1" class="form-control"
                                                    placeholder="john.doe@email.com" aria-label="john.doe@email.com"
                                                    name='email' required value="{{Auth::user()->email}}" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter a valid email
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="phone_no">Phone Number</label>
                                                <input type="text" id="phone_no" class="form-control"
                                                    placeholder="Phone Number" aria-label="Name"
                                                    aria-describedby="phone_no" required name='phone_no'
                                                    value="{{Auth::user()->phone_no}}" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter your phone no.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="d-block" for="address">Address</label>
                                                <textarea class="form-control" id="address" rows="2" name='address'
                                                    required>{{Auth::user()->address}}</textarea>
                                            </div>
                                        </div>



                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card" style="height:260px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <label for="profile_image">Preview Profile pic</label>
                                                <img id="preview_img" width="120" height="150">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-5">
                                        <div class="form-group">
                                            <label for="profile_image">Profile pic</label>
                                            <div class="custom-file ">
                                                <input type='hidden' name='old_profile_image'
                                                    value="{{Auth::user()->profile_image}}">
                                                <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input"
                                                    name='profile_image' id='profile_image' required />
                                                <label class="custom-file-label" for="customFile1">Choose profile
                                                    pic</label>
                                            </div>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">
                                                Please Choose Profile Pic
                                            </div>
                                            <div id='err_imag' style='width: 100%;margin-top: .25rem;font-size: .857rem;
                                                color: #EA5455;'>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">


                            {{-- <div class="row"> --}}
                            <br>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="username">Userame</label>
                                    <input type="text" id="username" class="form-control" placeholder="Userame"
                                        aria-label="Name" aria-describedby="basic-addon-Userame" name="username"
                                        required value='{{Auth::user()->username}}' />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please enter your username.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-default-password1">Password</label>
                                    <input type="password" id="basic-default-password1" class="form-control"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please enter your password.
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1 text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1" id='btn_submit'>
                                    Submit
                                </button>
                                <a href="{{ url('profile')}}"><button type="button" class="btn btn-outline-danger">
                                        Cancel
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
        </div>
        </section>

    </div>
</div>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#preview_img').attr('src', e.target.result);
                    $("#preview_img").show();
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $("#profile_image").change(function(){
            readURL(this);
        });
        });

</script>