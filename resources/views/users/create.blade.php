@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">
                            Employee Creation
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Employee</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Validation -->
            <section class="bs-validation">
                <div class="row">
                    <!-- Bootstrap Validation -->
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Employee Creation</h4>
                            </div>
                            <div class="card-body">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                                <form class="needs-validation1" action="{{ route('users.store')}}"
                                    enctype="multipart/form-data" method='POST' novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name">First Name</label>
                                        <input type="text" id="basic-addon-name" class="form-control"
                                            placeholder="First Name" aria-label="Name"
                                            aria-describedby="basic-addon-name" name="firstname" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please enter your first name.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-lname">Last Name</label>
                                        <input type="text" id="basic-addon-lname" class="form-control"
                                            placeholder="Last Name" aria-label="Name"
                                            aria-describedby="basic-addon-lname" name="lastname" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please enter your Last Name.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email1">Email</label>
                                        <input type="email" id="basic-default-email1" class="form-control"
                                            placeholder="john.doe@email.com" aria-label="john.doe@email.com"
                                            name='email' required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please enter a valid email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-mobile">Phone Number</label>
                                        <input type="text" id="basic-addon-mobile" class="form-control"
                                            placeholder="Phone Number" aria-label="Name"
                                            aria-describedby="basic-addon-mobile" required name='phone_no' />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please enter your phone no.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block" for="validationBioBootstrap">Address</label>
                                        <textarea class="form-control" id="validationBioBootstrap"
                                            name="validationBioBootstrap" rows="3" name='address' required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="username">Userame</label>
                                        <input type="text" id="username" class="form-control" placeholder="Userame"
                                            aria-label="Name" aria-describedby="basic-addon-Userame" name="username"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please enter your username.
                                        </div>
                                        <div id='err_username' style='width: 100%;margin-top: .25rem;font-size: .857rem;
                                            color: #EA5455;'>
                                            Username is already taken.
                                        </div>
                                    </div>
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

                                    <div class="form-group">
                                        <label class="form-label" for="cpassword">Confirm Password</label>
                                        <input type="password" id="cpassword" class="form-control"
                                            name='confirm-password'
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please enter your Confirm password.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" name="state" id="state" required>
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state->state_id}}">{{$state->state_title}}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please select your state
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <select class="form-control" name="district" id="district" required>
                                            <option value="">Select District</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please select your District
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        {!! Form::select('roles[]', $roles,[], array('class' =>
                                        'form-control','required' => 'required')) !!}
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please select your Department
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_image">Profile pic</label>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input"
                                                name='profile_image' id='profile_image' required />
                                            <label class="custom-file-label" for="customFile1">Choose profile
                                                pic</label>
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">
                                            Please Choose Profile Pic
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" id='btn_submit'>
                                                Submit
                                            </button>
                                            <a href="{{route('users.index')}}"><button type="button"
                                                    class="btn btn-danger">
                                                    Cancel
                                                </button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bootstrap Validation -->
                </div>
            </section>
            <!-- /Validation -->
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('#state').change(function(){
            var state_id = this.value;
            $('#district').empty();
                $.ajax({
                url: "{{url('get-district')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',state_id:state_id},
                success:function(res){
                    $('#district').append('<option value="">Select District</option>');
                    $.each(res, function(key,val) {
                        $('#district').append('<option value='+val.id+'>'+val.title+'</option>');
                    });
                }
            });
        })

        $('#profile_image').change(function(){
            var size=this.files[0].size;
            if (size >= 2097152)
            {        
                $('#err_imag').html("File size should be less than or equal 2 MB.");
                $(this).val('');
                $('#btn_submit').attr('disabled','ture');
            }else{
                var file = $(this).val();   
                var extension = file.split('.');
                if(extension.length >= 3) {
                    $('#err_imag').html('Invalid file! ');
                    $(this).val('');
                }
                else{
                    $('#err_imag').empty();
                    var fileExtension = ['jpeg', 'jpg', 'png'];
                    if ($.inArray(extension[1],fileExtension) == -1) {
                            $('#err_imag').html('Invalid filename extension!');
                        $(this).val('');
                    }
                    $('#btn_submit').attr('disabled',false);
                }
            }
        });

        $('#err_username').hide();
        $('#username').focusout(function(){
            var username = this.value;
                $.ajax({
                url: "{{url('check_username')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',username:username},
                success:function(res){
                    if(res==1){
                        $('#err_username').show();
                        $('#btn_submit').attr('disabled','ture');
                    }else{
                        $('#err_username').hide();
                        $('#btn_submit').attr('disabled',false);
                    }
                }
            });
        })
    });

   

  
</script>