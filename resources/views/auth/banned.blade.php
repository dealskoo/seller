@extends('seller::layouts.auth')

@section('title',__('seller::seller.your_account_has_been_banned'))

@section('body')
    <div class="align-items-center d-flex h-100">
        <div class="card-body">

            <!-- Logo -->
            <div class="auth-brand text-center text-lg-end">
                <a href="{{ route('seller.dashboard') }}" class="logo-dark">
                    <span><img src="{{ asset(config('seller.logo')) }}" alt="" height="40"></span>
                </a>
                <a href="{{ route('seller.dashboard') }}" class="logo-light">
                    <span><img src="{{ asset(config('seller.logo_dark')) }}" alt="" height="40"></span>
                </a>
            </div>

            <!-- email send icon with text-->
            <div class="text-center m-auto">
                <i class="uil-multiply text-danger" style="font-size: 80px"></i>
                <h4 class="text-dark-50 text-center mt-4 fw-bold">{{ __('seller::seller.your_account_has_been_banned') }}</h4>
                <p class="text-muted mb-4">
                    {{ __('seller::seller.if_you_have_any_questions') }}
                </p>
            </div>

            <!-- form -->
            <form action="{{ route('seller.dashboard') }}">
                <div class="mb-0 d-grid text-center">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i>
                        {{ __('seller::auth.back_to') }} {{ __('seller::auth.login') }}
                    </button>
                </div>
            </form>
            <!-- end form-->

            <!-- Footer-->
            <footer class="footer footer-alt">
                <p class="text-muted">{{ config('seller.copyright') }}</p>
            </footer>

        </div> <!-- end .card-body -->
    </div>
@endsection
