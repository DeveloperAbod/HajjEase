@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/page-users.min.css" /> <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="عرض تفاصيل الحجز" />
    <title>لوحة تحكم مكاتب الحج والعمرة | عرض تفاصيل الحجز</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">عرض تفاصيل الحجز</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('bookings') }}">الحجوزات</a></li>
                                <li class="breadcrumb-item active">عرض تفاصيل الحجز</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="bookings-view">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>رقم الحجز:</td>
                                                    <td>{{ $booking->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>اسم الحاج:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('pilgrims.show', $booking->pilgrim ? $booking->pilgrim->id : '') }}">
                                                            {{ $booking->pilgrim ? $booking->pilgrim->id : '' }}-{{ $booking->pilgrim ? $booking->pilgrim->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>اسم الرحلة:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('trips.show', $booking->trip ? $booking->trip->id : '') }}">
                                                            {{ $booking->trip ? $booking->trip->id : '' }}-{{ $booking->trip ? $booking->trip->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ الحجز:</td>
                                                    <td>{{ $booking->date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>سعر الحجز:</td>
                                                    <td>{{ number_format($booking->totalAmount()) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المدفوع:</td>
                                                    <td>{{ number_format($booking->amount_paid()) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المتبقي:</td>
                                                    <td>{{ number_format($booking->remainingAmount()) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>حالة الدفع:</td>
                                                    <td>{{ $booking->paymentStatus() }}</td>
                                                </tr>

                                                <tr>
                                                    <td>حالة الحجز:</td>
                                                    <td>{{ $booking->Status() }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ انشاء الحجز:</td>
                                                    <td>{{ $booking->created_at->format('Y-m-d H:i:s') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تم الانشاء بواسطة:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('users.show', $booking->creator ? $booking->creator->id : '') }}">
                                                            {{ $booking->creator ? $booking->creator->id : '' }}-{{ $booking->creator ? $booking->creator->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-actions text-center">

                                    @if ($booking->status == 0)
                                        <a href="{{ route('bookings.accept', $booking->id) }}"
                                            class="btn btn-sm btn-primary">قبول
                                            الحجز</a>
                                        <a href="{{ route('bookings.reject', $booking->id) }}"
                                            class="btn btn-sm btn-danger">رفض
                                            الحجز</a>
                                    @elseif($booking->status == 1)
                                        <a href="{{ route('bookings.reject', $booking->id) }}"
                                            class="btn btn-sm btn-danger">تغيير حالة الحجز الى مرفوض</a>
                                    @elseif($booking->status == 2)
                                        <a href="{{ route('bookings.accept', $booking->id) }}"
                                            class="btn btn-sm btn-primary">تغيير حالة الحجز الى مقبول</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('page_vendor_js')
    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
@endsection

@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/pages/page-users.min.js"></script>
    <!-- END: Page JS-->
@endsection
