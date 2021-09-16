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
    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- /axios -->

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand" style="display:flex;align-items:center;padding: 0">
            <a href="/home" class="d-inline-block">
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

                <!-- giỏ hàng -->
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bag"></i>
                        <span class="d-md-none ml-2">Giỏ hàng</span>
                        <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0" id="cart-count">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350 cart_parent">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Giỏ hàng</span>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list cart-box">
                                <!-- <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="http://anphat.test/storage/uploads/182530546_2450165001795654_7361982886996531706_n.jpg" height="80" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">James Alexander</span>
                                                <span class="text-muted float-right font-size-sm">04:58</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                        <div class="input-group bootstrap-touchspin">
                                            <span class="input-group-prepend">
                                                <button class="btn btn-light bootstrap-touchspin-down" type="button">–</button>
                                            </span>
                                            <input type="text" value="55" class="form-control touchspin-postfix" style="display: block;flex:inherit; width:50px">
                                            <span class="input-group-append">
                                                <button class="btn btn-light bootstrap-touchspin-up" type="button">+</button>
                                            </span>
                                        </div>
                                    </div>
                                </li> -->

                            </ul>
                        </div>

                        <div class="dropdown-content-footer justify-content-center p-0" style="flex-direction:column;">
                            <div style="margin-top:5px">
                                <strong>Tổng tiền: </strong><strong class="cartbox-total"></strong>
                            </div>
                            <a href="/cart" class="btn btn-primary" style="margin:7px 0;">Đi đến giỏ hàng</a>
                        </div>
                    </div>

                </li>
                <!-- end giỏ hàng -->
                <!-- notification -->
                
                <!-- end notification -->

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" alt="">
                        <span>{{Auth::user()->name}}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/change-pass" class="dropdown-item"><i class="icon-user-plus"></i> Đổi mật khẩu</a>
                        <!-- <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> -->
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
    <script>
        function renderCart() {
            let cart = JSON.parse(localStorage.getItem('cart'));
            if (cart && cart.items.length > 0) {
                let content = '';
                cart.items.map(item => {
                    content += `
                                                <li class="media">
                                                    <div class="mr-3 position-relative">
                                                        <img src="${item.thumbnail}" height="80" alt="">
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="media-title">
                                                            <a href="#">
                                                                <span class="font-weight-semibold">${item.name}</span>
                                                                <span class="text-muted float-right font-size-sm">${formatCash(item.rowtotal.toString())}
                                                                
                                                                </span>
                                                                
                                                            </a>
                                                        </div>
                                                        <div class="text-right">
                                                        <a href="javascript:void(0)" class="text-danger" onclick="removeItem(event, '${item.id}')">Xóa</a>
                                                        </div>
                                                        <div class="input-group bootstrap-touchspin">
                                                            <span class="input-group-prepend">
                                                                <button class="btn btn-light bootstrap-touchspin-down" type="button" onclick="decreaseItem('${item.id}')">–</button>
                                                            </span>
                                                            <input type="text" value="${item.quantity}" class="form-control touchspin-postfix" style="display: block;flex:inherit; width:50px">
                                                            <span class="input-group-append">
                                                                <button class="btn btn-light bootstrap-touchspin-up" type="button" onclick="increaseItem('${item.id}')">+</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                                `
                });
                $('.cart-box').html(content);
                $('.cartbox-total').html(formatCash(cart.total.toString()))
                $('#cart-count').text(cart.quantity)
            } else {
                $('.cart-box').html(`
                <li class="media">
                                                    <div>
                                                        Chưa có sản phẩm nào trong giỏ hàng
                                                    </div>
                                                </li>
                                            `);
                $('#cart-count').text('')
                $('.cartbox-total').html(0)
            }
        }
        renderCart()

        function formatCash(str) {
            return str.split('').reverse().reduce((prev, next, index) => {
                return ((index % 3) ? next : (next + ',')) + prev
            })
        }

        function removeItem(e, id) {
            e.preventDefault()
            let cart = JSON.parse(localStorage.getItem('cart'));
            if (cart && cart.items.length > 0) {
                let item = cart.items.find(item => item.id == id);
                cart.quantity -= item.quantity;
                cart.total -= item.rowtotal
                let index = cart.items.findIndex(item => item.id == id);
                cart.items.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart()
                $('.cart_parent').dropdown('toggle');
            }
        }

        function decreaseItem(id) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            if (cart && cart.items.length > 0) {
                let item = cart.items.find(item => item.id == id);
                if (item.quantity > 1) {
                    cart.quantity -= 1;
                    cart.total -= item.price;
                    item.quantity -= 1;
                    item.rowtotal -= item.price;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCart()
                } else if (item.quantity == 1) {
                    cart.quantity -= 1;
                    cart.total -= item.price;
                    let index = cart.items.findIndex(item => item.id == id);
                    cart.items.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    renderCart()
                }
                $('.cart_parent').dropdown('toggle');
            }
        }

        function increaseItem(id) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            if (cart && cart.items.length > 0) {
                let item = cart.items.find(item => item.id == id);
                cart.quantity += 1;
                cart.total += item.price
                item.quantity += 1;
                item.rowtotal += item.price
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart()
                $('.cart_parent').dropdown('toggle');
            }
        }
    </script>
</body>

</html>