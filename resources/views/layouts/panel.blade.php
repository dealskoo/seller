<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') - {{ __('seller::auth.title') }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('/vendor/seller/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/seller/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendor/seller/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendor/seller/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('/vendor/seller/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/seller/css/app-creative.min.css') }}" rel="stylesheet" type="text/css"
          id="light-style"/>
    <link href="{{ asset('/vendor/seller/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="dark-style"/>
    @yield('css')
</head>

<body class="loading" data-layout="topnav">
<!-- Begin page -->
<div class="wrapper">

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom topnav-navbar topnav-navbar-dark">
                <div class="container-fluid">

                    <!-- LOGO -->
                    <a href="{{ route('seller.dashboard') }}" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="{{ asset(config('seller.logo')) }}" alt="" height="40">
                                </span>
                        <span class="topnav-logo-sm">
                                    <img src="{{ asset(config('seller.logo_sm')) }}" alt="" height="40">
                                </span>
                    </a>

                    <ul class="list-unstyled topbar-menu float-end mb-0">

                        <li class="dropdown notification-list d-xl-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                               role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3" method="get" action="{{ route('seller.search') }}">
                                    <input type="text" class="form-control"
                                           placeholder="{{ __('seller::seller.search_placeholder') }}"
                                           name="q" required>
                                </form>
                            </div>
                        </li>
                        @php
                            $locale_code = session('seller_locale',config('app.locale'));
                            $locale = config('seller.languages')[$locale_code];
                        @endphp
                        <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                               id="topbar-languagedrop" href="#" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                <img src="{{ asset($locale['icon']) }}" alt="user-image"
                                     class="me-1" height="12"> <span
                                    class="align-middle">{{ $locale['name'] }}</span> <i
                                    class="mdi mdi-chevron-down align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu"
                                 aria-labelledby="topbar-languagedrop">

                                @foreach(config('seller.languages') as $code => $language)
                                    @if($locale_code!=$code)
                                        <a href="{{ route('seller.locale',['locale'=>$code]) }}"
                                           class="dropdown-item notify-item">
                                            <img src="{{ asset($language['icon']) }}"
                                                 alt="user-image" class="me-1" height="12"> <span
                                                class="align-middle">{{ $language['name'] }}</span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        @php
                            $notifications = Auth::user()->unreadNotifications()->paginate(10);
                        @endphp
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                               id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                @if($notifications->total()>0)
                                    <span class="noti-icon-badge"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg"
                                 aria-labelledby="topbar-notifydrop">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                                <span class="float-end">
                                                    <a href="{{ route('seller.notification.all_read') }}"
                                                       class="text-dark">
                                                        <small>{{ __('seller::seller.clear_all') }}</small>
                                                    </a>
                                                </span>{{ __('seller::seller.notification') }}
                                    </h5>
                                </div>

                                <div style="max-height: 230px;" data-simplebar>
                                    @foreach($notifications as $notification)
                                        <a href="{{ route('seller.notification.show',$notification) }}"
                                           class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="{{ $notification->data['icon'] }}"></i>
                                            </div>
                                            <p class="notify-details">{{ $notification->data['title'] }}
                                                @if(empty($notification->data['message']))
                                                    <small
                                                        class="text-muted">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                                                @else
                                                    <small
                                                        class="text-muted">{{ $notification->data['message'] }}</small>
                                                @endif
                                            </p>
                                        </a>
                                    @endforeach
                                </div>

                                <!-- All-->
                                <a href="{{ route('seller.notification.list') }}"
                                   class="dropdown-item text-center text-primary notify-item notify-all">
                                    {{ __('seller::seller.view_all') }}
                                </a>

                            </div>
                        </li>
                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                <i class="dripicons-gear noti-icon"></i>
                            </a>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                               id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                        <span class="account-user-avatar">
                                            <img src="{{ Auth::user()->avatar_url }}" alt="user-image"
                                                 class="rounded-circle">
                                        </span>
                                <span>
                                            <span class="account-user-name">{{ Auth::user()->name }}</span>
                                            <span class="account-position">{{ Auth::user()->country->name }}</span>
                                        </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                                aria-labelledby="topbar-userdrop">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">{{ __('seller::seller.welcome') }} !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('seller.account.profile') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>{{ __('seller::seller.my_account') }}</span>
                                </a>

                                <a href="{{ route('seller.account.email') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-edit me-1"></i>
                                    <span>{{ __('seller::seller.update_email') }}</span>
                                </a>

                                <a href="{{ route('seller.account.password') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline me-1"></i>
                                    <span>{{ __('seller::seller.update_password') }}</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('seller.logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>{{ __('seller::seller.logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('seller.logout') }}" method="POST"
                                      class="d-none">@csrf</form>
                            </div>
                        </li>

                    </ul>
                    <a class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <div class="app-search">
                        <form method="get" action="{{ route('seller.search') }}">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                       placeholder="{{ __('seller::seller.search_placeholder') }}" id="top-search"
                                       name="q" required>
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary"
                                        type="submit">{{ __('seller::seller.search') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->

            <div class="topnav shadow-sm">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                        <div class="collapse navbar-collapse active" id="topnav-menu-content">
                            {!! \Nwidart\Menus\Facades\Menu::render('seller_navbar') !!}
                        </div>
                    </nav>
                </div>
            </div>


            <!-- Start Content-->
            <div class="container-fluid">
                @yield('body')
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!! config('seller.copyright') !!}
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            @foreach(config('seller.footer_menus') as $menu)
                                <a target="_blank" href="{{ route($menu['url']) }}">
                                    {{ __($menu['name']) }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="end-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">{{ __('seller::seller.settings') }}</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <!-- Settings -->
            <h5>{{ __('seller::seller.color_scheme') }}</h5>
            <hr class="mt-1"/>

            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                       id="light-mode-check" checked/>
                <label class="form-check-label" for="light-mode-check">{{ __('seller::seller.light_mode') }}</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                       id="dark-mode-check"/>
                <label class="form-check-label" for="dark-mode-check">{{ __('seller::seller.dark_mode') }}</label>
            </div>

            <!-- Width -->
            <h5 class="mt-4">{{ __('seller::seller.width') }}</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked/>
                <label class="form-check-label" for="fluid-check">{{ __('seller::seller.fluid') }}</label>
            </div>
            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check"/>
                <label class="form-check-label" for="boxed-check">{{ __('seller::seller.boxed') }}</label>
            </div>


            <div class="d-grid mt-4">
                <button class="btn btn-primary" id="resetBtn">{{ __('seller::seller.reset_to_default') }}</button>
            </div>
        </div> <!-- end padding-->

    </div>
</div>

<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<script src="{{ asset('/vendor/seller/js/vendor.min.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/app.min.js') }}"></script>

<!-- third party js -->
<!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
<script src="{{ asset('/vendor/seller/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('/vendor/seller/js/vendor/dataTables.select.min.js') }}"></script>
<script type="text/javascript">
    let language = {
        "aria": "",
        "paginate": {
            "previous": "<i class='mdi mdi-chevron-left'>",
            "next": "<i class='mdi mdi-chevron-right'>"
        },
        "processing": "<div class=\"spinner-border text-danger\" role=\"status\"></div>",
        "zeroRecords": "{{ __('seller::seller.nothing_found') }}",
        "info": "{{ __('seller::seller.datatable_pagination') }}",
        "infoEmpty": "{{ __('seller::seller.datatable_info_empty') }}",
        "infoFiltered": "{{ __('seller::seller.datatable_filtered') }}",
        "search": "{{ __('seller::seller.search') }}",
        "lengthMenu": "{{ __('seller::seller.display') }} <select class='form-select form-select-sm ms-1 me-1'><option value='10'>10</option><option value='20'>20</option></select> {{ __('seller::seller.entries') }}",
    };
    let pageLength = 10;
</script>
@yield('script')
<!-- third party js ends -->

</body>
</html>
