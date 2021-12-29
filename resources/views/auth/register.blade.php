@extends('seller::layouts.auth')

@section('title',trans('seller::auth.sign_up'))

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
            <h4 class="mt-0">Free Sign Up</h4>
            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

            <!-- form -->
            <form action="{{ route('seller.register') }}" method="post">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ trans('seller::auth.email_address') }}</label>
                    <input class="form-control" type="email" id="email" required
                           placeholder="{{ trans('seller::auth.email_address_placeholder') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ trans('seller::auth.password') }}</label>
                    <input class="form-control" type="password" required id="password"
                           placeholder="{{ trans('seller::auth.password_placeholder') }}">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-signup">
                        <label class="form-check-label" for="checkbox-signup">I accept <a
                                href="javascript: void(0);" class="text-muted">Terms and Conditions</a></label>
                    </div>
                </div>
                <div class="mb-0 d-grid text-center">
                    <button class="btn btn-primary" type="submit"><i
                            class="mdi mdi-account-circle"></i> {{ trans('seller::auth.sign_up') }}
                    </button>
                </div>
            </form>
            <!-- end form-->

            <!-- Footer-->
            <footer class="footer footer-alt">
                <p class="text-muted">{{ trans('seller::auth.already_have_account') }} <a
                        href="{{ route('seller.login') }}"
                        class="text-muted ms-1"><b>{{ trans('seller::auth.log_in') }}</b></a>
                </p>
            </footer>

        </div> <!-- end .card-body -->
    </div> <!-- end .align-items-center.d-flex.h-100-->
@endsection
