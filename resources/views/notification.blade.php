@extends('seller::layouts.panel')

@if($notification)
    @section('title',$notification->data['title'])
@else
    @section('title',__('seller::seller.notification'))
@endif
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('seller.dashboard') }}">{{ __('seller::seller.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('seller.notification.list') }}">{{ __('seller::seller.notifications') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('seller::seller.notification') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('seller::seller.notification') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Right Sidebar -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin::includes.notification-sidebar')

                    <div class="page-aside-right">
                        @if($notification)
                            <div class="mt-3">
                                <h5 class="font-18">{{ $notification->data['title'] }}</h5>
                                <hr>
                                <div class="d-flex mb-3 mt-1">
                                    <small>{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                                </div>
                                @include($notification->data['view'])
                            </div>
                            <!-- end .mt-4 -->
                        @else
                            @include('seller::404')
                        @endif
                    </div>
                    <!-- end inbox-rightbar-->
                </div>
                <div class="clearfix"></div>
            </div> <!-- end card-box -->

        </div> <!-- end Col -->
    </div>
@endsection
