@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id],'enctype'=>'multipart/form-data'])
!!}
<div class="row">
    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div> --}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name </strong>
            {!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Last Name </strong>
            {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No. :</strong>
            {!! Form::text('phone_no', null, array('placeholder' => 'Phone No.','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address :</strong>
            <textarea rows='5' cols='30' class='form-control' name='address'>{{$user->address}}</textarea>
        </div>
    </div>
    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Department</strong>
            <select name="department" class='form-control select2'>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                <option value="{{$department->id}}" @if($user->department==$department->id)
    selected @endif>{{$department->department}}
    </option>
    @endforeach
    </select>
</div>
</div> --}}
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>State :</strong>
        <select name="state" class='form-control select2' id='state'>
            <option value="">Select State</option>
            @foreach($states as $state)
            <option value="{{$state->state_id}}" @if($user->state==$state->state_id)
                selected @endif>{{$state->state_title}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>District :</strong>
        <select name="district" class='form-control select2' id='district'>
            <option value="">Select District</option>
            @foreach($districts as $district)
            <option value="{{$district->districtid}}" @if($user->district==$district->districtid)
                selected @endif>{{$district->district_title}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>User Name </strong>
        {!! Form::text('username', null, array('placeholder' => 'Uesr Name','class' => 'form-control','id' =>
        'username')) !!}
        <span style='color:red' id='err_username'></span>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Password:</strong>
        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Confirm Password:</strong>
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control'))
        !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Department</strong>
        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Profile Image </strong>
        <input type='file' class='form-control' accept=".jpg,.jpeg,.png" name='profile_image' id='profile_image'>
        <span style='color:red' id='err_imag'></span>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <input type='hidden' class='form-control' name='old_profile_image' value="{{$user->profile_image}}">
        <img src="{{url('user_images/'.$user->profile_image)}}" width='150' height="150">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary" id='btn_submit'>Update</button>
</div>
</div>
{!! Form::close() !!}
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
                $('#profile_image').val('');
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
            var id='{{$user->id}}';
            $('#err_username').empty();
                $.ajax({
                url: "{{url('check_username')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',username:username,id:id},
                success:function(res){
                    if(res==1){
                        $('#err_username').html('Username is already taken.');
                        $('#btn_submit').attr('disabled','ture');
                    }else{
                        $('#btn_submit').attr('disabled',false);
                    }
                }
            });
        })
    });
</script>