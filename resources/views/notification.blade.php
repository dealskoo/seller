@extends('seller::layouts.panel')

@section('title',__('seller::notification.title'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                        <li class="breadcrumb-item active">Email Read</li>
                    </ol>
                </div>
                <h4 class="page-title">Email Read</h4>
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
                        <div class="mt-3">
                            <h5 class="font-18">{{ $notification->data['title'] }}</h5>
                            <hr>
                            <div class="d-flex mb-3 mt-1">
                                <small>{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                            </div>
                            @include($notification->data['view'])
                        </div>
                        <!-- end .mt-4 -->
                    </div>
                    <!-- end inbox-rightbar-->
                </div>
                <div class="clearfix"></div>
            </div> <!-- end card-box -->

        </div> <!-- end Col -->
    </div>
@endsection
