<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - SEO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('admin/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('admin/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="{{route('admin.index')}}"><img src="{{asset('admin/images/icon/logo.png')}}" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>

                    <ul class="metismenu" id="menu">
                        <li><a href="{{Route('admin.users')}}"><i class="ti-user"></i> <span>Users</span></a></li>
                        <li><a href="{{Route('admins.index')}}"><i class="ti-crown"></i> <span>admins</span></a></li>
                        <li><a href="{{route('admin.products')}}"><i class="ti-package"></i> <span>Products</span></a></li>
                        <li><a href="{{route('admin.orders')}}"><i class="ti-car"></i> <span>orders</span></a></li>
                        <li><a href="{{Route('customer.requests')}}"><i class="ti-alert"></i> <span>Requests</span></a></li>
                        <li><a href="{{Route('customer.messages')}}"><i class="ti-email"></i> <span>Messages</span></a></li>
                        <li><a href="{{Route('users.transactions')}}"><i class="ti-receipt"></i> <span>Transactions</span></a></li>
                    </ul>

                </nav>
            </div>
        </div>
    </div>


    <div class="main-content">
        <!-- header area start -->

        <!-- header area end -->
        <!-- page title area start -->
       @yield('bar')






        @yield('content')

    </div>




    <!-- footer area end-->
</div>

<script src="{{asset('admin/js/vendor/jquery-2.2.4.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.slicknav.min.js')}}"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!-- start amcharts -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<!-- all line chart activation -->
<script src="{{asset('admin/js/line-chart.js')}}"></script>
<!-- all pie chart -->
<script src="{{asset('admin/js/pie-chart.js')}}"></script>
<!-- all bar chart -->
<script src="{{asset('admin/js/bar-chart.js')}}"></script>
<!-- all map chart -->
<script src="{{asset('admin/js/maps.js')}}"></script>
<!-- others plugins -->
<script src="{{asset('admin/js/plugins.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>

@yield('footer')
</body>

</html>
