@extends('seller::layouts.auth')

@section('title',__('seller::auth.log_in'))

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
            <h4 class="mt-0">{{ __('seller::auth.sign_in') }}</h4>
            <div class="mb-4">
                @if(!empty(session('status')))
                    <p class="text-success mb-0">{{ session('status') }}</p>
                @else
                    @if(empty($errors->all()))
                        <p class="text-muted mb-0">{{ __('seller::auth.sign_in_tip') }}</p>
                    @else
                        @foreach($errors->all() as $error)
                            <p class="text-danger mb-0">{{ $error }}</p>
                        @endforeach
                    @endif
                @endif
            </div>

            <!-- form -->
            <form action="{{ route('seller.login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('seller::auth.email_address') }}</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}"
                           required="" tabindex="1" autofocus
                           placeholder="{{ __('seller::auth.email_address_placeholder') }}">
                </div>
                <div class="mb-3">
                    <a href="{{ route('seller.password.request') }}"
                       class="text-muted float-end"><small>{{ __('seller::auth.forgot_your_password') }}</small></a>
                    <label for="password" class="form-label">{{ __('seller::auth.password') }}</label>
                    <div class="input-group">
                        <input class="form-control" type="password" required="" id="password" name="password"
                               minlength="{{ config('auth.password_length') }}" tabindex="2"
                               placeholder="{{ __('seller::auth.password_placeholder') }}">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" tabindex="3" id="checkbox-remember"
                               name="remember" checked>
                        <label class="form-check-label"
                               for="checkbox-remember">{{ __('seller::auth.remember_me') }}</label>
                    </div>
                </div>
                <div class="d-grid mb-0 text-center">
                    <button class="btn btn-primary" type="submit" tabindex="4"><i
                            class="mdi mdi-login"></i> {{ __('seller::auth.log_in') }}</button>
                </div>
            </form>
            <!-- end form-->

            <!-- Footer-->
            <footer class="footer footer-alt">
                <p class="text-muted">{{ __('seller::auth.do_not_have_an_account') }} <a
                        href="{{ route('seller.register') }}"
                        class="text-muted ms-1"><b>{{ __('seller::auth.sign_up') }}</b></a></p>
            </footer>

        </div> <!-- end .card-body -->
    </div> <!-- end .align-items-center.d-flex.h-100-->
@endsection
