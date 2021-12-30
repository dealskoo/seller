@extends('seller::layouts.auth')

@section('title',trans('seller::auth.recover_password'))

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
            <h4 class="mt-0">{{ trans('seller::auth.reset_password') }}</h4>
            <p class="text-muted mb-4">{{ trans('seller::auth.reset_password_tip') }}</p>

            <!-- form -->
            <form action="{{ route('seller.password.email') }}" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">{{ trans('seller::auth.email_address') }}</label>
                    <input class="form-control" type="email" id="email" required=""
                           placeholder="{{ trans('seller::auth.email_address_placeholder') }}">
                </div>
                <div class="mb-0 text-center d-grid">
                    <button class="btn btn-primary" type="submit"><i
                            class="mdi mdi-lock-reset"></i> {{ trans('seller::auth.reset_password') }}
                    </button>
                </div>
            </form>
            <!-- end form-->

            <!-- Footer-->
            <footer class="footer footer-alt">
                <p class="text-muted">{{ trans('seller::auth.back_to') }} <a href="{{ route('seller.login') }}"
                                                                             class="text-muted ms-1"><b>{{ trans('seller::auth.log_in') }}</b></a>
                </p>
            </footer>

        </div> <!-- end .card-body -->
    </div> <!-- end .align-items-center.d-flex.h-100-->
@endsection
