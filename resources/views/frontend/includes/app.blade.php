<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Gold Touch - @yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('user-assets/xhtml/images/favicon.png') }}" />

    <link href="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('user-assets/xhtml/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css') }}"
        type="text/css" media="all" />
    <!-- Style css -->
    <link href="{{ asset('user-assets/xhtml/css/style.css') }}" rel="stylesheet" />
    <link href="{{ 'user-assets/xhtml/vendor/fullcalendar/css/main.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ 'user-assets/xhtml/vendor/chartist/css/chartist.min.css' }}">
    <link href="{{ 'user-assets/xhtml/vendor/jquery-nice-select/css/nice-select.css' }}" rel="stylesheet">
</head>

<body>
    {{-- <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************--> --}}

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="show menu-toggle">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <svg class="logo-abbr" width="64" height="64" viewbox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect class="rect-primary-rect" width="64" height="64" rx="18" fill="#216FED"></rect>
                    <path
                        d="M33.9126 48.6459H16.7709C15.9917 48.6459 15.3542 48.0084 15.3542 47.2292V22.9334C15.3542 22.1542 15.9917 21.5167 16.7709 21.5167H17.6209C27.3959 21.5167 35.3292 29.45 35.3292 39.225V47.2292C35.2584 48.0084 34.6917 48.6459 33.9126 48.6459ZM18.1167 45.8834H32.4959V39.225C32.4959 31.15 26.1209 24.6334 18.1167 24.35V45.8834Z"
                        fill="#F2F6FC"></path>
                    <path
                        d="M47.2291 48.6459H30.0874C29.3083 48.6459 28.6708 48.0084 28.6708 47.2292C28.6708 46.45 29.3083 45.8125 30.0874 45.8125H45.8833V33.0625C45.8833 24.9875 39.5083 18.4709 31.5041 18.1875V28.2459C31.5041 29.025 30.8666 29.6625 30.0874 29.6625C29.3083 29.6625 28.6708 29.025 28.6708 28.2459V16.7709C28.6708 15.9917 29.3083 15.3542 30.0874 15.3542H30.9374C40.7124 15.3542 48.6458 23.2875 48.6458 33.0625V47.3C48.6458 48.0084 48.0083 48.6459 47.2291 48.6459Z"
                        fill="#F2F6FC"></path>
                    <path
                        d="M28.246 48.6458H22.296C21.5169 48.6458 20.8794 48.0083 20.8794 47.2292V37.95C20.8794 37.1709 21.5169 36.5334 22.296 36.5334H28.246C29.0252 36.5334 29.6627 37.1709 29.6627 37.95V47.2292C29.6627 48.0083 29.0252 48.6458 28.246 48.6458ZM23.7127 45.8833H26.8294V39.3667H23.7127V45.8833Z"
                        fill="#F2F6FC"></path>
                </svg>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="nav-item position-relative">
                                <div class="search-btn">
                                    <i class="search-icon fa fa-search"></i>
                                </div>
                                <div class="input-group search-area d-none floating-search" id="search">
                                    <input type="text" class="form-control" placeholder="Search here" />
                                    <span class="input-group-text">
                                        <a href="javascript:void(0)">

                                            <i class="flaticon-381-search-2"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="ms-5 nav-item position-relative">
                                <a href="/make-order" class="btn btn-sm btn-primary">New Order</a>
                            </div>
                            <div class="ms-2 nav-item position-relative">
                                <a href="/orders" class="btn btn-sm btn-warning">Process Order</a>
                            </div>
                            <div class="ms-2 nav-item position-relative">
                                <a href="/tasks" class="btn btn-sm btn-secondary">New Task</a>
                            </div>
                            <div class="ms-2 nav-item position-relative">
                                <a href="/orders" class="btn btn-sm btn-success">New Measurement</a>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                    <i id="icon-light" class="fas fa-sun"></i>
                                    <i id="icon-dark" class="fas fa-moon"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <svg width="28" height="28" viewbox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.4524 25.6682C11.0605 27.0357 12.409 28 14.0005 28C15.592 28 16.9405 27.0357 17.5487 25.6682C16.4265 25.7231 15.2594 25.76 14.0005 25.76C12.7417 25.76 11.5746 25.723 10.4524 25.6682Z"
                                            fill="#737B8B"></path>
                                        <path
                                            d="M26.3532 19.74C24.877 17.8785 22.3996 14.2195 22.3996 10.64C22.3996 7.09073 20.1193 3.89758 16.7996 2.72382C16.7593 1.21406 15.5183 0 14.0007 0C12.482 0 11.2422 1.21406 11.2018 2.72382C7.88101 3.89758 5.6007 7.09073 5.6007 10.64C5.6007 14.2207 3.1244 17.8785 1.64712 19.74C1.15433 20.3616 1.00197 21.1825 1.24058 21.9363C1.47354 22.6721 2.05367 23.2422 2.79288 23.4595C4.08761 23.8415 6.20997 24.2715 9.44682 24.491C10.8479 24.5851 12.3543 24.64 14.0008 24.64C15.646 24.64 17.1525 24.5851 18.5535 24.491C21.7915 24.2715 23.9128 23.8415 25.2086 23.4595C25.9478 23.2422 26.5268 22.6722 26.7598 21.9363C26.9983 21.1825 26.8449 20.3616 26.3532 19.74Z"
                                            fill="#737B8B"></path>
                                    </svg>
                                    <span class="text-white badge light bg-primary rounded-circle">
                                        {{ $notificationCount }}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="p-3 widget-media dz-scroll"
                                        style="min-height: auto; max-height: 380px;">
                                        <ul class="timeline">
                                            @forelse ($notification as $nf)
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div
                                                            class="media me-2 @if ($nf->notification_type == 'order') media-success
                                                                @elseif ($nf->notification_type == 'task')
                                                                    media-warning
                                                                @elseif($nf->notification_type == 'event')
                                                                    media-warning @endif">
                                                            @if ($nf->notification_type == 'order')
                                                                <i class="fa fa-clock"></i>
                                                            @elseif ($nf->notification_type == 'task')
                                                                <i class="fa fa-tasks"></i>
                                                            @elseif($nf->notification_type == 'event')
                                                                <i class="fa fa-images"></i>
                                                            @endif
                                                            {{-- <i class="fa fa-home"></i> --}}
                                                        </div>
                                                        <div class="media-body">

                                                            <h6 class="mb-1">
                                                                @if ($nf->notification_type == 'order')
                                                                    Order
                                                                @elseif ($nf->notification_type == 'task')
                                                                    Task
                                                                @elseif($nf->notification_type == 'event')
                                                                    Event
                                                                @endif
                                                                : {{ $nf->notification_title }}
                                                            </h6>

                                                            <small class="d-block">{{ $nf->created_at }}</small>
                                                        </div>

                                                    </div>
                                                </li>
                                            @empty
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media-body">
                                                            <h6 class="text-center notification">
                                                                No notifications found!
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button"
                                    data-bs-toggle="dropdown">
                                    <div class="header-info me-3">
                                        <span class="fs-18 font-w500 text-end">{{ Auth::user()->name }}</span>
                                        <small class="text-end fs-14 font-w400">{{ Auth::user()->email }}</small>
                                    </div>
                                    <img src="/profileImg/{{ Auth::user()->profileImg }}" width="20"
                                        alt="" id="preview-image-before-upload1" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    @if (Auth::user()->role == 2)
                                        <a href="{{ route('sendUserTask') }}" class="dropdown-item ai-icon">
                                            <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg"
                                                class="text-success" width="18" height="18"
                                                viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                            <span class="ms-2">Inbox </span>
                                        </a>
                                    @endif
                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <span class="ms-2">Logout</span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end
        ***********************************-->

        @include('frontend.includes.sidebar')

        @yield('content')

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>
                    Copyright © Designed &amp; Developed by
                    <a href="https://maestlopermedia.com/" target="_blank">Maestloper Media</a>
                    2023
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('user-assets/xhtml/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('user-assets/xhtml/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('user-assets/xhtml/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('user-assets/xhtml/js/dashboard/dashboard-1.js') }}"></script>

    <!-- JS for dotted map -->
    <script src="{{ asset('user-assets/xhtml/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/dotted-map/js/contrib/suntimes.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/dotted-map/js/contrib/color-0.4.1.js') }}"></script>

    <script src="{{ asset('user-assets/xhtml/vendor/dotted-map/js/world.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/dotted-map/js/smallimap.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/dashboard/dotted-map-init.js') }}"></script>

    <script src="{{ 'user-assets/xhtml/vendor/chartist/js/chartist.min.js' }}"></script>
    <script src="{{ 'user-assets/xhtml/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js' }}"></script>
    <script src="{{ 'user-assets/xhtml/js/plugins-init/chartist-init.js' }}"></script>

    <script src="{{ 'user-assets/xhtml/vendor/raphael/raphael.min.js' }}"></script>
    <script src="{{ 'user-assets/xhtml/vendor/morris/morris.min.js' }}"></script>
    <script src="{{ 'user-assets/xhtml/js/plugins-init/morris-init.js' }}"></script>

    <script src="{{ asset('user-assets/xhtml/js/custom.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/demo.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/fullcalendar/js/main.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- Chart Chartist plugin files -->


    <script>
        $('.search-btn').click(function() {
            $('#search').toggleClass("d-none");
            $('.search-icon').toggleClass("fa-times");
        });
    </script>

    <script>
        var styles = {
            "max-height": "800px",
        };
        // $('.widget-media').css("max-height", "380px");

        $('.all-notification').click(function(e) {
            e.preventDefault();
            $('.widget-media').css(styles);
            $('.hide-notification').removeClass("d-none");
            $('.all-notification').addClass("d-none");
        });

        $('.hide-notification').click(function(e) {
            e.preventDefault();
            $('.widget-media').css("max-height", "380px");
            $('.hide-notification').addClass("d-none");
            $('.all-notification').removeClass("d-none");
        });
    </script>
    @yield('customJs')
</body>

</html>
