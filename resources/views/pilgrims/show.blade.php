@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/page-users.min.css" /> <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="عرض تفاصيل الحاج" />
    <title>لوحة تحكم مكاتب الحج والعمرة | عرض تفاصيل الحاج</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">عرض تفاصيل الحاج</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('pilgrims') }}">الحجاج</a></li>
                                <li class="breadcrumb-item active">عرض تفاصيل الحاج</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="pilgrim-view">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>رقم الحاج:</td>
                                                    <td>{{ $pilgrim->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>اسم الحاج:</td>
                                                    <td>{{ $pilgrim->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>نوع الهوية:</td>
                                                    <td>{{ $pilgrim->identity_type->label() }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم الهوية:</td>
                                                    <td>{{ $pilgrim->identity_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td>رقم هاتف الحاج:</td>
                                                    <td>{{ $pilgrim->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>حالة الحاج الصحية:</td>
                                                    <td>{{ $pilgrim->health_status }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ انشاء الحاج:</td>
                                                    <td>{{ $pilgrim->created_at->format('Y-m-d H:i:s') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تم الانشاء بواسطة:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('users.show', $pilgrim->creator ? $pilgrim->creator->id : '') }}">
                                                            {{ $pilgrim->creator ? $pilgrim->creator->id : '' }}-{{ $pilgrim->creator ? $pilgrim->creator->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @can('تعديل رحلة')
                                    <div class="form-actions">
                                        <a href="{{ route('pilgrim.edit', $pilgrim->id) }}"
                                            class="btn btn-sm btn-primary">تعديل
                                            الحاج</a>
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
