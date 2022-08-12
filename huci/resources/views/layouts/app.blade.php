<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../public/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>HUCI</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('public/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('public/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('public/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('public/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('public/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.js" integrity="sha512-5m2r+g00HDHnhXQDbRLAfZBwPpPCaK+wPLV6lm8VQ+09ilGdHfXV7IVyKPkLOTfi4vTTUVJnz7ELs7cA87/GMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Helpers -->
    <script src="{{asset('public/vendor/js/helpers.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('public/js/config.js')}}"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{url('/home')}}" class="app-brand-link">
                        <img src="{{asset('public/images/1.png')}}" class="w-50 mx-5">
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="index.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Đơn Hàng lẻ</div>
                        </a>

                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="{{route('order.index')}}" class="menu-link">
                                    <div data-i18n="Container">Đơn hàng hôm nay</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn hàng tháng này</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn hàng tự ship tháng</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn chưa phát được</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn khách hàng hủy</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn bồi hoàn</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn bưu cục trả tiền</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Đơn hàng đã xóa</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Layouts</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="layouts-without-menu.html" class="menu-link">
                                    <div data-i18n="Without menu">Without menu</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-without-navbar.html" class="menu-link">
                                    <div data-i18n="Without navbar">Without navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Container</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-fluid.html" class="menu-link">
                                    <div data-i18n="Fluid">Fluid</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-blank.html" class="menu-link">
                                    <div data-i18n="Blank">Blank</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Account Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="pages-account-settings-account.html" class="menu-link">
                                    <div data-i18n="Account">Account</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-account-settings-notifications.html" class="menu-link">
                                    <div data-i18n="Notifications">Notifications</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-account-settings-connections.html" class="menu-link">
                                    <div data-i18n="Connections">Connections</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Authentications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Login</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Register</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Forgot Password</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Misc">Misc</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="pages-misc-error.html" class="menu-link">
                                    <div data-i18n="Error">Error</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-misc-under-maintenance.html" class="menu-link">
                                    <div data-i18n="Under Maintenance">Under Maintenance</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
                    <!-- Cards -->
                    <li class="menu-item">
                        <a href="cards-basic.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Cards</div>
                        </a>
                    </li>
                    <!-- User interface -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="User interface">User interface</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="ui-accordion.html" class="menu-link">
                                    <div data-i18n="Accordion">Accordion</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-alerts.html" class="menu-link">
                                    <div data-i18n="Alerts">Alerts</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-badges.html" class="menu-link">
                                    <div data-i18n="Badges">Badges</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-buttons.html" class="menu-link">
                                    <div data-i18n="Buttons">Buttons</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-carousel.html" class="menu-link">
                                    <div data-i18n="Carousel">Carousel</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-collapse.html" class="menu-link">
                                    <div data-i18n="Collapse">Collapse</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-dropdowns.html" class="menu-link">
                                    <div data-i18n="Dropdowns">Dropdowns</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-footer.html" class="menu-link">
                                    <div data-i18n="Footer">Footer</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-list-groups.html" class="menu-link">
                                    <div data-i18n="List Groups">List groups</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-modals.html" class="menu-link">
                                    <div data-i18n="Modals">Modals</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-navbar.html" class="menu-link">
                                    <div data-i18n="Navbar">Navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-offcanvas.html" class="menu-link">
                                    <div data-i18n="Offcanvas">Offcanvas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                                    <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-progress.html" class="menu-link">
                                    <div data-i18n="Progress">Progress</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-spinners.html" class="menu-link">
                                    <div data-i18n="Spinners">Spinners</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-tabs-pills.html" class="menu-link">
                                    <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-toasts.html" class="menu-link">
                                    <div data-i18n="Toasts">Toasts</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-tooltips-popovers.html" class="menu-link">
                                    <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="ui-typography.html" class="menu-link">
                                    <div data-i18n="Typography">Typography</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Extended components -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div data-i18n="Extended UI">Extended UI</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                                    <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="extended-ui-text-divider.html" class="menu-link">
                                    <div data-i18n="Text Divider">Text Divider</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="icons-boxicons.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-crown"></i>
                            <div data-i18n="Boxicons">Boxicons</div>
                        </a>
                    </li>

                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
                    <!-- Forms -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Form Elements">Form Elements</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="forms-basic-inputs.html" class="menu-link">
                                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="forms-input-groups.html" class="menu-link">
                                    <div data-i18n="Input groups">Input groups</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Form Layouts">Form Layouts</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="form-layouts-vertical.html" class="menu-link">
                                    <div data-i18n="Vertical Form">Vertical Form</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="form-layouts-horizontal.html" class="menu-link">
                                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tables -->
                    <li class="menu-item">
                        <a href="tables-basic.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Tables</div>
                        </a>
                    </li>
                    <!-- Quản trị viên -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Quản Trị Viên</span></li>
                    <li class="menu-item">
                        <a href="{{route('user.index')}}" class="menu-link">
                            <i class="menu-icon fa-regular fa-user"></i>
                            <div data-i18n="Support">Nhân Sự / Đối Tác</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-store"></i>
                            <div data-i18n="Layouts">Thương Hiệu</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('sanpham.index')}}" class="menu-link">
                                    <div data-i18n="Without menu">Quản Lý Sản Phẩm</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('khohang.index')}}" class="menu-link">
                                    <div data-i18n="Without navbar">Quản Lý Kho Hàng</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('nguondon.index')}}" class="menu-link">
                                    <div data-i18n="Without navbar">Quản Lý Nguồn Đơn</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-fluid.html" class="menu-link">
                                    <div data-i18n="Fluid">Fluid</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-blank.html" class="menu-link">
                                    <div data-i18n="Blank">Blank</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Documentation">Documentation</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{asset('public/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{asset('public/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Thông tin</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Thiết lập</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="flex-grow-1 align-middle">Billing</span>
                                                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="bx bx-power-off me-2"></i>

                                            <span class="align-middle">Đăng Xuất</span>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Quốc Vinh</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <script>
        var options = {
            chart: {
                type: 'line',
                height: '88px',
                toolbar: {
                    show: false,
                },
                dropShadow: {
                    enabled: true,
                    enabledOnSeries: undefined,
                    top: 5,
                    left: 0,
                    blur: 3,
                    color: '99D1D3',
                    opacity: 0.2
                }
            },
            grid: {
                show: false,
            },
            yaxis: {
                show: false,
                showAlways: false,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    show: false,
                },
            },
            series: [{
                name: 'sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    show: false,
                },
                tooltip: {
                    enabled: false,
                }
            }
        }

        var chart = new ApexCharts(document.getElementById('mychart'), options);

        chart.render();
    </script>
    <script>
        function copymau() {
            var copyText = document.getElementById("mau");
            copyText.select();
            document.execCommand("copy");
        }
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#editorder', function(e) {
                e.preventDefault();
                var donhang_id = $(this).val();
                var url = $(this).attr("data-link");
                $('#editModal').modal('show');
                // console.log(url);
                $.ajaxSetup({
                    headers: {
                        'csrftoken': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: 'JSON',
                    success: function(response) {
                         console.log(response);
                        if (response.status == 404) {
                            $('#loi').html("");
                            $('#loi').text(response.loi);
                        } else {
                            $('#edit_ten').val(response.donhang.hotenkhach);
                            $('#edit_sdt').val(response.donhang.sdt);
                            $('#edit_tinhrangda').val(response.donhang.tinhtrangda);
                            $('#edit_diachi').val(response.donhang.diachi);
                            $('#edit_gcbd').val(response.donhang.ghichubd);
                            $('#edit_gcct').val(response.donhang.ghichuct);
                            $('#edit_thanhtien').val(response.donhang.thanhtien);
                            $('#edit_chuyenkhoan').val(response.donhang.chuyenkhoan); 
                            $('#edit_nguondon').val(response.donhang.nguondon_id.id); 
                        }
                    }

                });

            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', (function() {
                var action = $(this).attr('id');
                var matp = $(this).val();
                var _token = $('input[name="_token"]').val();
                alert(matp);
                var kq = '';
                if (action == 'tinh') {
                    kq = 'huyen';
                } else {
                    kq = 'xa';
                }
                $.ajax({
                    url: "{{url('/chon-diachi')}}",
                    method: 'POST',
                    data: {
                        action: action,
                        matp: matp,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + kq).html(data);
                    }

                })
            }));
        });
    </script>
    <script>
        $('.modal .modal-dialog .currency').on('keyup click change paste input', function(event) {
            $(this).val(function(index, value) {
                if (value != "") {
                    //return '$' + value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    var decimalCount;
                    value.match(/\./g) === null ? decimalCount = 0 : decimalCount = value.match(/\./g);

                    if (decimalCount.length > 1) {
                        value = value.slice(0, -1);
                    }

                    var components = value.toString().split(".");
                    if (components.length === 1)
                        components[0] = value;
                    components[0] = components[0].replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    if (components.length === 2) {
                        components[1] = components[1].replace(/\D/g, '').replace(/^\d{3}/, '');
                    }

                    if (components.join('.') != '')
                        return '' + components.join('.');
                    else
                        return '';
                }
            });
        });
       
    </script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('public/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('public/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('public/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('public/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('public/js/main.js')}}"></script>
    <script src="{{asset('public/js/vinh.js')}}"></script>

    <script src="https://apis.google.com/js/api.js"></script>


    <!-- Page JS -->
    <script src="{{asset('public/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://kit.fontawesome.com/9d562c087e.js" crossorigin="anonymous"></script>
</body>

</html>