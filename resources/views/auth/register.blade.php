@extends('layouts.login')

@section('content')

<form class="auth-register-form mt-2" action="{{ url('customer-register') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label" for="register-username">First Name</label>
        <input class="form-control" id="register-username" type="text" name="customer_firstname" placeholder="john"
            aria-describedby="register-username" autofocus="" tabindex="1" />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-username">Last Name</label>
        <input class="form-control" id="register-username" type="text" name="customer_lastname" placeholder="doe"
            aria-describedby="register-username" autofocus="" tabindex="1" />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-username">Phone Number</label>
        <input class="form-control" id="register-username" type="text" name="customer_phone" placeholder="8955658555"
            aria-describedby="register-username" autofocus="" tabindex="1" />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-email">Email</label>
        <input class="form-control" id="register-email" type="text" name="email" placeholder="john@example.com"
            aria-describedby="register-email" tabindex="2" />
    </div>
    <div class="form-group">
        <label class="form-label" for="register-password">Password</label>
        <div class="input-group input-group-merge form-password-toggle">
            <input class="form-control form-control-merge" id="register-password" type="password" name="password"
                placeholder="············" aria-describedby="register-password" tabindex="3" />
            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                        data-feather="eye"></i></span></div>
        </div>
    </div>

    <button class="btn btn-primary btn-block" tabindex="5">Sign up</button>


</form>
<p class="text-center mt-2"><span>Already have an account?</span><a href="{{url('/')}}"><span>&nbsp;Sign in
            instead</span></a></p>

@endsection