@extends('layouts.login')

@section('content')

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

<form class="auth-login-form mt-2" action="{{ route('otp-validation') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label" for="login-email">One Time Password</label>
        <input type="hidden" name="customer_id" id="customer_id" value="{{$customer_data}}" />
        <input class="form-control @error('email') is-invalid @enderror" id="otp" type="number" name="otp"
            placeholder="Enter OTP" tabindex="1" required />

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>
    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Verify</button>
</form>
@endsection