@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/fonts/simple-line-icons/style.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/timeline.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/dashboard-ecommerce.min.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="مكاتب الحج والعمرة" />


    <title>
        لوحة تحكم مكاتب الحج والعمرة | الصفحة الرئيسية
    </title>
@endsection





@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <!-- home -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ Route('users') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="purple">{{ $users_unm }}</h3>
                                                <h6>المستخدمين</h6>
                                            </div>
                                            <div>
                                                <i class="la la-user purple font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-purple" role="progressbar"
                                                style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ Route('roles') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="pink">{{ $Roles_unm }}</h3>
                                                <h6>الصلاحيات</h6>
                                            </div>
                                            <div>
                                                <i class="ft-layers pink font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-pink" role="progressbar"
                                                style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ route('trips') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="info">{{ $trips_unm }}</h3>
                                                <h6>الرحلات</h6>
                                            </div>
                                            <div>
                                                <i class="la la-plane info font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                                style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ route('pilgrims') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="warning">{{ $pilgrims_unm }}</h3>
                                                <h6>الحجاج</h6>
                                            </div>
                                            <div>
                                                <i class="la la-users warning font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ route('offices') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ $offices_unm }}</h3>
                                                <h6>المكاتب</h6>
                                            </div>
                                            <div>
                                                <i class="la la-building success font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ route('bookings') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="info">{{ $bookings_unm }}</h3>
                                                <h6>الحجوزات</h6>
                                            </div>
                                            <div>
                                                <i class="la la-ticket info font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                                style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ route('payments') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="purple">{{ $payments_unm }}</h3>
                                                <h6>المدفوعات</h6>
                                            </div>
                                            <div>
                                                <i class="la la-credit-card purple font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-purple" role="progressbar"
                                                style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <a href="{{ route('payments') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="yellow">{{ number_format($totalAmountPaid) }}</h3>
                                                <h6>اجمالي المدفوعات</h6>
                                            </div>
                                            <div>
                                                <i class="la la-info-circle yellow font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-yellow" role="progressbar"
                                                style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--/ home -->

                <!-- Charts Section -->
                <div class="row mt-4 match-height">
                    <div class="col-xl-5 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">احصائية المدفوعات</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyPaymentsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">احصائية الحجاج</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="pilgrimsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- --------------------------------------------- --}}

                    <!-- مخطط المستخدمين الشهري -->
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">إحصائيات المستخدمين الشهرية</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="usersChart"></canvas>
                            </div>
                        </div>
                    </div>


                    <!-- مخطط الرحلات الشهري -->
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">إحصائيات الرحلات الشهرية</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="tripsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- مخطط الحجوزات الشهري -->
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">إحصائيات الحجوزات الشهرية</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="bookingsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- مخطط المدفوعات الشهرية -->

                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">إحصائيات المدفوعات الشهرية</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="paymentsChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!--/ Charts Section -->

                </div>
            </div>
        </div>
    </div>

    {{-- end content --}}
@endsection


@section('page_vendor_js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/admin/app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="/admin/app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="/admin/app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    {{--     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 --}}
    <script src="/admin/app-assets/vendors/js/charts/chartV4.min.js"></script>

    <!-- END: Page Vendor JS-->
@endsection

@section('page_js')
    {{-- i write it here to clear what i do , it will be change to file if the project productions --}}
    <script>
        // البيانات الشهرية من PHP
        var usrsData = @json($monthlyUsers);
        var tripsData = @json($monthlyTrips);
        var bookingsData = @json($monthlyBookings);
        var paymentsData = @json($monthlyPayments);
        var monthlyPilgrimsData = @json($monthlyPilgrims);


        // إعداد المخططات
        var months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر',
            'ديسمبر'
        ];

        // Helper function for creating gradient backgrounds
        function createGradient(ctx, colorStart, colorEnd) {
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, colorStart);
            gradient.addColorStop(1, colorEnd);
            return gradient;
        }

        // مخطط المستخدمين مع تأثيرات التمرير
        var clientsCtx = document.getElementById('usersChart').getContext('2d');
        new Chart(clientsCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'عدد المستخدمين',
                    data: usrsData,
                    borderColor: '#6f42c1',
                    backgroundColor: createGradient(clientsCtx, '#6f42c1', 'rgba(111, 66, 193, 0.2)'),
                    fill: true,
                    tension: 0.4 // Adds a slight curve to the line
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'المستخدمين في هذا الشهر: ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // مخطط الرحلات
        var tripsCtx = document.getElementById('tripsChart').getContext('2d');
        new Chart(tripsCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'عدد الرحلات',
                    data: tripsData,
                    borderColor: '#e83e8c',
                    backgroundColor: createGradient(tripsCtx, '#e83e8c', 'rgba(232, 62, 140, 0.2)'),
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'الرحلات في هذا الشهر: ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // مخطط الحجوزات
        var bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        new Chart(bookingsCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'عدد الحجوزات',
                    data: bookingsData,
                    borderColor: '#17a2b8',
                    backgroundColor: createGradient(bookingsCtx, '#17a2b8', 'rgba(23, 162, 184, 0.2)'),
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'الحجوزات في هذا الشهر: ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // مخطط المدفوعات
        var paymentsCtx = document.getElementById('paymentsChart').getContext('2d');
        new Chart(paymentsCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'إجمالي المدفوعات',
                    data: paymentsData,
                    borderColor: '#28a745',
                    backgroundColor: createGradient(paymentsCtx, '#28a745', 'rgba(40, 167, 69, 0.2)'),
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'المدفوعات: ' + tooltipItem.raw + ' ريال';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // المدفوعات بطريقة اخرى
        var polarCtx = document.getElementById('monthlyPaymentsChart').getContext('2d');
        var monthlyPaymentsChart = new Chart(polarCtx, {
            type: 'polarArea',
            data: {
                labels: months,
                datasets: [{
                    label: 'المدفوعات في هذا الشهر',
                    data: paymentsData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'المدفوعات: ' + tooltipItem.raw + ' ريال';
                            }
                        }
                    }
                }
            }
        });

        // عدد الحجاح
        new Chart(document.getElementById('pilgrimsChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'عدد الحجاج',
                    data: monthlyPilgrimsData,
                    borderColor: '#17a2b8',
                    backgroundColor: createGradient(bookingsCtx, '#17a2b8', 'rgba(23, 162, 184, 0.2)'),
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'عدد الحجاج'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'الشهور'
                        }
                    }
                }
            }
        });
    </script>
@endsection
