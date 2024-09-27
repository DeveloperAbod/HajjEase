@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/page-users.min.css" /> <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="عرض تفاصيل المكتب" />
    <title>لوحة تحكم مكاتب الحج والعمرة | عرض تفاصيل المكتب</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">عرض تفاصيل المكتب</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('offices') }}">المكاتب</a></li>
                                <li class="breadcrumb-item active">عرض تفاصيل المكتب</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="office-view">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>اسم المكتب:</td>
                                                    <td>{{ $office->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>الموقع:</td>
                                                    <td>{{ $office->location }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الهاتف:</td>
                                                    <td>{{ $office->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>اسم مسؤول الاتصال:</td>
                                                    <td>{{ $office->contact_person }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رابط الخريطة:</td>
                                                    <td><a href="{{ $office->map_url ? $office->map_url : '' }}"
                                                            target="_blank">{{ $office->map_url ? $office->map_url : 'لايوجد' }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ انشاء المكتب:</td>
                                                    <td>{{ $office->created_at->format('Y-m-d H:i:s') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تم الانشاء من قبل:</td>
                                                    <td>{{ $office->creator ? $office->creator->id : '' }}-{{ $office->creator ? $office->creator->name : 'غير متوفر' }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @can('تعديل المكتب')
                                    <div class="form-actions">
                                        <a href="{{ route('offices.edit', $office->id) }}" class="btn btn-sm btn-primary">تعديل
                                            المكتب</a>
                                    </div>
                                @endcan
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
