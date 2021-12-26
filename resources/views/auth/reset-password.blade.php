@extends('seller::layouts.auth')

@section('title','Recover Password')

@section('body')
    <div class="align-items-center d-flex h-100">
        <div class="card-body">

            <!-- Logo -->
            <div class="auth-brand text-center text-lg-start">
                <a href="{{ route('seller.dashboard') }}" class="logo-dark">
                    <span><img src="{{ asset(config('seller.logo')) }}" alt="" height="40"></span>
                </a>
                <a href="{{ route('seller.dashboard') }}" class="logo-light">
                    <span><img src="{{ asset(config('seller.logo_dark')) }}" alt="" height="40"></span>
                </a>
            </div>

            <!-- title-->
            <h4 class="mt-0">Reset Password</h4>
            <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to
                reset your password.</p>

            <!-- form -->
            <form action="#">
                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input class="form-control" type="email" id="emailaddress" required=""
                           placeholder="Enter your email">
                </div>
                <div class="mb-0 text-center d-grid">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-lock-reset"></i> Reset Password
                    </button>
                </div>
            </form>
            <!-- end form-->

            <!-- Footer-->
            <footer class="footer footer-alt">
                <p class="text-muted">Back to <a href="{{ route('seller.login') }}" class="text-muted ms-1"><b>Log
                            In</b></a></p>
            </footer>

        </div> <!-- end .card-body -->
    </div> <!-- end .align-items-center.d-flex.h-100-->
@endsection
