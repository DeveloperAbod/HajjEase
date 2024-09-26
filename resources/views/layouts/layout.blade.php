<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">


<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="author" content="developer Abod" />
    <link rel="shortcut icon" type="image/x-icon" href="/admin/app-assets/images/ico/favicon.ico" />

    @yield('page_meta')


    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet" />

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/vendors-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/weather-icons/climacons.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/fonts/meteocons/style.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/charts/morris.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/charts/chartist.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/fonts/line-awesome/css/line-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/extensions/zoom.css">

    <!-- sweet alert -->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/extensions/sweetalert2.min.css" />
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/bootstrap-extended.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/colors.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/components.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/custom-rtl.min.css" />
    <!-- END: Theme CSS-->


    @yield('page_css')

    <!-- BEGIN: Custom CSS if you want add new css-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/style-rtl.css" />
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

    @include('layouts.includes.navbar')


    @include('layouts.includes.menu')

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->



    @include('layouts.includes.footer')

    <!-- BEGIN: Vendor JS-->
    <script src="/admin/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/admin/app-assets/vendors/js/extensions/zoom.min.js"></script>

    <!-- END Vendor JS-->


    <!-- BEGIN: Page Vendor JS-->
    @yield('page_vendor_js')

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/admin/app-assets/js/core/app-menu.min.js"></script>
    <script src="/admin/app-assets/js/core/app.min.js"></script>
    <script src="/admin/app-assets/js/scripts/customizer.min.js"></script>
    <script src="/admin/app-assets/js/scripts/footer.min.js"></script>
    <script src="/admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <!-- BEGIN: Notfication-->

    @if (session('icon') && session('msg'))
        @php
            header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
            header('Cache-Control: post-check=0, pre-check=0', false);
            header('Pragma: no-cache');
        @endphp
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "{{ session('icon') }}",
                title: "{{ session('msg') }}"
            });
        </script>
        {!! session()->forget(['icon', 'msg']) !!}
    @endif
    <!-- END: Notfication-->

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('page_js')
    <!-- END: Page JS-->

    @stack('other-scripts')

</body>
<!-- END: Body-->

</html>
