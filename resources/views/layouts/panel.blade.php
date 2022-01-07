<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | {{ __('seller::auth.title') }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('/vendor/seller/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('/vendor/seller/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/seller/css/app-creative.min.css') }}" rel="stylesheet" type="text/css"
          id="light-style"/>
    <link href="{{ asset('/vendor/seller/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="dark-style"/>

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
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                               id="topbar-languagedrop" href="#" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                <img src="{{ asset('/vendor/seller/images/flags/us.svg') }}" alt="user-image"
                                     class="me-1" height="12"> <span
                                    class="align-middle">English</span> <i
                                    class="mdi mdi-chevron-down align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu"
                                 aria-labelledby="topbar-languagedrop">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/vendor/seller/images/flags/cn.svg') }}" alt="user-image"
                                         class="me-1"
                                         height="12"> <span class="align-middle">简体中文</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/vendor/seller/images/flags/de.svg') }}" alt="user-image"
                                         class="me-1"
                                         height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/vendor/seller/images/flags/it.svg') }}" alt="user-image"
                                         class="me-1" height="12">
                                    <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/vendor/seller/images/flags/es.svg') }}" alt="user-image"
                                         class="me-1" height="12">
                                    <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/vendor/seller/images/flags/ru.svg') }}" alt="user-image"
                                         class="me-1" height="12">
                                    <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                               id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg"
                                 aria-labelledby="topbar-notifydrop">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                                <span class="float-end">
                                                    <a href="{{ route('seller.notification.all_read') }}"
                                                       class="text-dark">
                                                        <small>Clear All</small>
                                                    </a>
                                                </span>Notification
                                    </h5>
                                </div>

                                <div style="max-height: 230px;" data-simplebar>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="{{ asset('/vendor/seller/images/logo_sm.svg') }}"
                                                 class="img-fluid rounded-circle"
                                                 alt=""/></div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="{{ asset('/vendor/seller/images/logo_sm.svg') }}"
                                                 class="img-fluid rounded-circle"
                                                 alt=""/></div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="{{ route('seller.notification.list') }}"
                                   class="dropdown-item text-center text-primary notify-item notify-all">
                                    View All
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
                                            <span class="account-position">Monthly</span>
                                        </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                                aria-labelledby="topbar-userdrop">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('seller.account') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <a href="{{ route('seller.account') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-edit me-1"></i>
                                    <span>Update Email</span>
                                </a>

                                <a href="{{ route('seller.account') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline me-1"></i>
                                    <span>Update Password</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('seller.logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
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
                    <div class="app-search dropdown">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>

                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle"
                                             src="{{ asset('/vendor/seller/images/logo_sm.svg') }}"
                                             alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle"
                                             src="{{ asset('/vendor/seller/images/logo_sm.svg') }}"
                                             alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end Topbar -->

            <div class="topnav shadow-sm">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                       role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <i class="uil-dashboard me-1"></i>Dashboards
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                        <a href="#" class="dropdown-item">Calendar</a>
                                        <a href="#" class="dropdown-item">Chat</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                               id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Ecommerce
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                                <a href="#" class="dropdown-item">Products</a>
                                                <a href="#" class="dropdown-item">Products Details</a>
                                                <a href="#" class="dropdown-item">Orders</a>
                                                <a href="#" class="dropdown-item">Order Details</a>
                                                <a href="#" class="dropdown-item">Customers</a>
                                                <a href="#" class="dropdown-item">Shopping Cart</a>
                                                <a href="#" class="dropdown-item">Checkout</a>
                                                <a href="#" class="dropdown-item">Sellers</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                               id="topnav-email" role="button" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Email
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a href="#" class="dropdown-item">Inbox</a>
                                                <a href="#" class="dropdown-item">Read Email</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                               id="topnav-project" role="button" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Projects
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-project">
                                                <a href="#" class="dropdown-item">List</a>
                                                <a href="#" class="dropdown-item">Details</a>
                                                <a href="#" class="dropdown-item">Gantt</a>
                                                <a href="#" class="dropdown-item">Create
                                                    Project</a>
                                            </div>
                                        </div>
                                        <a href="#" class="dropdown-item">Social Feed</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                               id="topnav-tasks" role="button" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                Tasks
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-tasks">
                                                <a href="#" class="dropdown-item">List</a>
                                                <a href="#" class="dropdown-item">Details</a>
                                                <a href="#" class="dropdown-item">Kanban Board</a>
                                            </div>
                                        </div>
                                        <a href="#" class="dropdown-item">File Manager</a>
                                    </div>
                                </li>
                            </ul>
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
                        {{ config('seller.copyright') }}
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            @foreach(config('seller.footer_menus') as $menu)
                                <a target="_blank" href="{{ route($menu['url']) }}">
                                    {{ __('seller::seller.'.$menu['name']) }}
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
        <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <!-- Settings -->
            <h5>Color Scheme</h5>
            <hr class="mt-1"/>

            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                       id="light-mode-check" checked/>
                <label class="form-check-label" for="light-mode-check">Light Mode</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                       id="dark-mode-check"/>
                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
            </div>

            <!-- Width -->
            <h5 class="mt-4">Width</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked/>
                <label class="form-check-label" for="fluid-check">Fluid</label>
            </div>
            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check"/>
                <label class="form-check-label" for="boxed-check">Boxed</label>
            </div>


            <div class="d-grid mt-4">
                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
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
<!-- third party js ends -->

</body>
</html>
