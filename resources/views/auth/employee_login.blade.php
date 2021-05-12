@extends('layouts.login')

@section('content')

<form class="auth-login-form mt-2" action="{{ route('employees-login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label" for="login-email">Email</label>

        <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="username"
            placeholder="Enter Username" value="{{ old('username') }}" aria-describedby="username" autofocus
            tabindex="1" required />

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="login-password">Password</label><a href="page-auth-forgot-password-v2.html"><small>Forgot
                    Password?</small></a>
        </div>
        <div class="input-group input-group-merge form-password-toggle">
            <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="password"
                type="password" name="password" placeholder="Enter Password" aria-describedby="login-password"
                tabindex="2" required />
            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                        data-feather="eye"></i></span></div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
            <label class="custom-control-label" for="remember-me"> Remember Me</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
</form>
{{-- <p class="text-center mt-2"><span>New on our platform?</span><a href="page-auth-register-v2.html"><span>&nbsp;Create an account</span></a></p>
    <div class="divider my-2">
        <div class="divider-text">or</div>
    </div>
    <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div> --}}

@endsection