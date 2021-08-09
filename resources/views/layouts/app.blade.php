<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>An Phát - Vật tư An Phát</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/admin/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="/admin/global_assets/js/main/jquery.min.js"></script>
    <script src="/admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/admin/global_assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
    <script src="/admin/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <!-- <script src="/admin/global_assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script> -->
    <script src="/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="/admin/global_assets/js/plugins/ui/prism.min.js"></script>

    <script src="/admin/js/app.js"></script>
    <!-- <script src="/admin/global_assets/js/demo_pages/alpaca_basic.js"></script> -->
    <script src="/admin/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="/admin/global_assets/js/demo_pages/form_select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand" style="display:flex;align-items:center;padding: 0">
            <a href="index.html" class="d-inline-block">
                <img src="/images/logo.jpg" alt="" style="height: 36px;">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>


            </ul>

            <span class="navbar-text ml-md-3 mr-md-auto">
                <!-- <span class="badge bg-success">Online</span> -->
            </span>

            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bell3"></i>
                        <span class="d-md-none ml-2">Thông báo</span>
                        <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Messages</span>
                            <a href="#" class="text-default"><i class="icon-compose"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">James Alexander</span>
                                                <span class="text-muted float-right font-size-sm">04:58</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Margo Baker</span>
                                                <span class="text-muted float-right font-size-sm">12:16</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Jeremy Victorino</span>
                                                <span class="text-muted float-right font-size-sm">22:48</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Beatrix Diaz</span>
                                                <span class="text-muted float-right font-size-sm">Tue</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Richard Vango</span>
                                                <span class="text-muted float-right font-size-sm">Mon</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- <div class="dropdown-content-footer justify-content-center p-0">
                            <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                        </div> -->
                    </div>
                </li>

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" alt="">
                        <span>{{Auth::user()->name}}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('includes.main_sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <!-- <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Alpaca</span> - Basic Inputs</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                            <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                            <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                        </div>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="alpaca_basic.html" class="breadcrumb-item">Alpaca</a>
                            <span class="breadcrumb-item active">Basic inputs</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none">
                        <div class="breadcrumb justify-content-center">
                            <a href="#" class="breadcrumb-elements-item">
                                <i class="icon-comment-discussion mr-2"></i>
                                Support
                            </a>

                            <div class="breadcrumb-elements-item dropdown p-0">
                                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-gear mr-2"></i>
                                    Settings
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Text inputs title -->
                <!-- <div class="mb-3">
                    <h6 class="mb-0 font-weight-semibold">
                        Text inputs
                    </h6>
                    <span class="text-muted d-block">Input fields with options</span>
                </div> -->
                <!-- /text inputs title -->

                <!-- Basic examples -->
                @yield('content')
                <!-- /basic examples -->


            </div>
            <!-- /content area -->


            <!-- Footer -->
            @include('includes.footer')
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>