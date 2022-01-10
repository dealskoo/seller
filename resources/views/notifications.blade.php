@extends('seller::layouts.panel')

@section('title',__('seller::notifications.title'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('seller.dashboard') }}">{{ __('seller::seller.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('seller::seller.notifications') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('seller::seller.notifications') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Right Sidebar -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('seller::includes.notification-sidebar')

                    <div class="page-aside-right">
                        <div class="mt-3">
                            <ul class="email-list">
                                @foreach($notifications as $notification)
                                    <li @if(!$notification->read_at)class="unread"@endif>
                                        <div>
                                            <a href="{{ route('admin.notification',$notification) }}"
                                               class="email-title">{{ $notification->data['title'] }}</a>
                                        </div>
                                        <div class="email-content">
                                            <div
                                                class="email-date">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end .mt-4 -->

                        <div class="row">
                            {{ $notifications->withQueryString()->links() }}
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end inbox-rightbar-->
                </div>
                <!-- end card-body -->
                <div class="clearfix"></div>
            </div> <!-- end card-box -->

        </div> <!-- end Col -->
    </div>
@endsection
