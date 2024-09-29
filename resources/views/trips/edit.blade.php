@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="تعديل بيانات الرحلة" />
    <title>لوحة تحكم مكاتب الحج والعمرة | تعديل الرحلة</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">تعديل الرحلة</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('trips') }}">الرحلات</a></li>
                                <li class="breadcrumb-item active">تعديل: {{ $trip->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="hidden-label-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">تعديل بيانات الرحلة</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form novalidate class="form" action="{{ route('trips.update', $trip->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="la la-plane"></i> بيانات الرحلة
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>اسم الرحلة
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="name"
                                                                    value="{{ old('name', $trip->name) }}"
                                                                    class="form-control mb-1" placeholder="ادخل اسم الرحلة"
                                                                    required>
                                                                @error('name')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>التاريخ
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="date" name="date"
                                                                    value="{{ old('date', $trip->date) }}"
                                                                    class="form-control mb-1" required>
                                                                @error('date')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>السعر
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="number" name="price"
                                                                    value="{{ old('price', $trip->price) }}"
                                                                    class="form-control mb-1" placeholder="ادخل السعر"
                                                                    required>
                                                                @error('price')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>عدد المقاعد المتاحة
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="number" name="available_seats"
                                                                    value="{{ old('available_seats', $trip->available_seats) }}"
                                                                    class="form-control mb-1"
                                                                    placeholder="ادخل عدد المقاعد المتاحة" required>
                                                                @error('available_seats')
                                                                    <div class="form-text text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>تم الانشاء بواسطة</h5>
                                                            <div class="controls">
                                                                <input type="text"
                                                                    value="{{ $trip->creator ? $trip->creator->name : 'غير متوفر' }}"
                                                                    class="form-control mb-1" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning">
                                                    اعادة ضبط <i class="ft-refresh-cw position-right"></i>
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>حفظ البيانات
                                                </button>
                                            </div>
                                        </form>
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
    <script src="/admin/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/toggle/switchery.min.js"></script>


    <!-- END: Page Vendor JS-->
@endsection


@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <!-- END: Page JS-->
@endsection
