@extends('layouts.app')

@section('content')
<!-- BEGIN: Content-->
<style>
    .select2-selection__arrow {
        display: none;
    }
</style>
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
            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4 class="card-title">Employee Creation</h4>
                            </div> --}}
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
                                <form id='form' class="needs-validation1" action="{{ route('users.store')}}"
                                    enctype="multipart/form-data" method='POST' novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="firstname">First Name</label>
                                                <input type="text" id="firstname" class="form-control"
                                                    placeholder="First Name" aria-label="Name"
                                                    aria-describedby="firstname" name="firstname" required />
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
                                                    aria-describedby="lastname" name="lastname" required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter your Last Name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-email1">Email</label>
                                                <input type="email" id="email" class="form-control"
                                                    placeholder="john.doe@email.com" aria-label="john.doe@email.com"
                                                    name='email' required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter a valid email
                                                </div>
                                                <div class="alert alert-danger alert-dismissible fade show mt-1"
                                                    role="alert" id='err_email' style='display:none'>
                                                    <div class="alert-body">
                                                        <p>This Email is Already Taken!</p>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="phone_no">Phone Number</label>
                                                <input type="number" id="phone_no" class="form-control"
                                                    placeholder="Phone Number" aria-label="Name"
                                                    aria-describedby="phone_no" required name='phone_no'
                                                    onKeyPress="if(this.value.length==10) return false;" />
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
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="username">Userame</label>
                                                <input type="text" id="username" class="form-control"
                                                    placeholder="Userame" aria-label="Name"
                                                    aria-describedby="basic-addon-Userame" name="username" required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter your username.
                                                </div>

                                                <div class="alert alert-danger alert-dismissible fade show mt-1"
                                                    role="alert" id='err_username' style='display:none'>
                                                    <div class="alert-body">
                                                        <p>This Username is Already Taken!</p>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
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
                                        <div class="col-md-4 col-12">
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
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select class="select2 form-control w-100" name="state" id="state"
                                                    required>
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{$state->state_id}}">{{$state->state_id}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please select your state
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select class="select2 form-control w-100" name="district" id="district"
                                                    required>
                                                    <option value="">Select District</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please select your District
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="city">City</label>
                                                <select class="select2 form-control w-100" name="city" id="city"
                                                    required>
                                                    <option value="">Select Sub District</option>
                                                </select>
                                                <!-- <input type="text" id="city" class="form-control" placeholder="City"
                                                    aria-label="city" aria-describedby="city" name="city" /> -->
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please enter your city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                {!! Form::select('roles[]', $roles,[], array('class' =>
                                                'form-control select2 w-100','required' => 'required')) !!}
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    Please select your Department
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="profile_image">Profile pic</label>
                                                <div class="custom-file">
                                                    <input type="file" accept=".jpg,.jpeg,.png"
                                                        class="custom-file-input" name='profile_image'
                                                        id='profile_image' required />
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
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <img id="preview_img" width="120" height="120" style='display:none'>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1" id='btn_submit'>
                                                Submit
                                            </button>
                                            <a href="{{route('users.index')}}"><button type="button"
                                                    class="btn btn-outline-danger">
                                                    Cancel
                                                </button></a>
                                        </div>
                                    </div>
                                </form>
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
<script>
    $(document).ready(function(){
        $("#form").validate(); //form validation

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
                        $('#district').append('<option value='+val.id+'>'+val.id+'</option>');
                    });
                }
            });
        })

        $('#district').change(function(){
            var district_id = this.value;
            $('#city').empty();
                $.ajax({
                url: "{{url('get-city')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',district_id:district_id},
                success:function(res){
                    $('#city').append('<option value="">Select Sub District</option>');
                    $.each(res, function(key,val) {
                        $('#city').append('<option value='+val.id+'>'+val.id+'</option>');
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

        $('#username').focusout(function(){
            var username = this.value;
                $.ajax({
                url: "{{url('check_username')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',username:username},
                success:function(res){
                    if(res==1){
                        $("#username").focus();
                        $('#err_username').show();
                        $('#btn_submit').attr('disabled','ture');
                    }else{
                        $('#err_username').hide();
                        $('#btn_submit').attr('disabled',false);
                    }
                }
            });
        })

        $('#email').focusout(function(){
            var email = this.value;
                $.ajax({
                url: "{{url('check_user_email')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',email:email},
                success:function(res){
                    if(res==1){
                        $("#email").focus();
                        $('#err_email').show();
                        $('#btn_submit').attr('disabled',true);
                    }else{
                        $('#err_email').hide();
                        $('#btn_submit').attr('disabled',false);
                    }
                }
            });
        })

        $('#firstname,#lastname,#city').keypress(function(){
            return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122));
        });

        $('#phone_no').keypress(function(e){ 
            if (this.value.length == 0 && e.which == 48 ){
                return false;
            }
        });

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