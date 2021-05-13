@extends('layouts.login')

@section('content')

<form id='form' class="auth-register-form mt-2" action="{{ url('customer-register') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label" for="register-username">First Name</label>
        <input class="form-control" id="customer_firstname" type="text" name="customer_firstname" placeholder="john"
            aria-describedby="register-username" autofocus="" tabindex="1" required />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-username">Last Name</label>
        <input class="form-control" id="customer_lastname" type="text" name="customer_lastname" placeholder="doe"
            aria-describedby="register-username" autofocus="" tabindex="1" required />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-username">Phone Number</label>
        <input class="form-control" id="customer_phone" type="number" name="customer_phone" placeholder="8955658555"
            aria-describedby="register-username" autofocus="" tabindex="1"
            onKeyPress="if(this.value.length==10) return false;" required />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-email">Email</label>
        <input class="form-control" id="email" type="email" name="email" placeholder="john@example.com"
            aria-describedby="register-email" tabindex="2" required />
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert" id='err_email'
            style='display:none'>
            <div class="alert-body">
                <p>This Email is Already Taken</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label" for="register-password">Password</label>
        <div class="input-group input-group-merge form-password-toggle">
            <input class="form-control form-control-merge" id="register-password" type="password" name="password"
                placeholder="············" tabindex="3" required />
            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                        data-feather="eye"></i></span></div>
        </div>
    </div>

    <button class="btn btn-primary btn-block" tabindex="5" id="btn_submit">Sign up</button>


</form>
<p class="text-center mt-2"><span>Already have an account?</span><a href="{{url('/')}}"><span>&nbsp;Sign in
            instead</span></a></p>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
   $("#form").validate();

        $('#email').focusout(function(){
            var email = this.value;
                $.ajax({
                url: "{{url('check_customer_email')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',email:email},
                success:function(res){
                    if(res==1){
                        $(this).val('');
                        $('#err_email').show();
                        $('#btn_submit').attr('disabled',true);
                    }else{
                        $('#err_email').hide();
                        $('#btn_submit').attr('disabled',false);
                    }
                }
            });
        })
});
</script>