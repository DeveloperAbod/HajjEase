@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/page-users.min.css" /> <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="عرض تفاصيل الدفع" />
    <title>لوحة تحكم مكاتب الحج والعمرة | عرض تفاصيل الدفع</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">عرض تفاصيل الدفع</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('payments') }}">المدفوعات</a></li>
                                <li class="breadcrumb-item active">عرض تفاصيل الدفع</li>
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
                                                    <td>رقم الدفع:</td>
                                                    <td>{{ $payment->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الحجز:</td>
                                                    <td> <a
                                                            href="{{ route('bookings.show', $payment->booking ? $payment->booking->id : '') }}">
                                                            {{ $payment->booking ? $payment->booking->id : 'غير متوفر' }}
                                                        </a></td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المدفوع:</td>
                                                    <td>{{ number_format($payment->amount_paid) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>رقم الإيصال:</td>
                                                    <td>{{ $payment->receipt_number }}</td>
                                                </tr>

                                                <tr>
                                                    <td>تاريخ الإيصال:</td>
                                                    <td>{{ $payment->receipt_date }}</td>
                                                </tr>

                                                <tr>
                                                    <td>تاريخ انشاء الدفع:</td>
                                                    <td>{{ $payment->created_at->format('Y-m-d H:i:s') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تم الانشاء بواسطة:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('users.show', $payment->creator ? $payment->creator->id : '') }}">
                                                            {{ $payment->creator ? $payment->creator->id : '' }}-{{ $payment->creator ? $payment->creator->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
