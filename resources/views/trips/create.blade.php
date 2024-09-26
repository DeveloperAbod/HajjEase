@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="إضافة رحلة جديدة" />
    <title>لوحة تحكم مكاتب الحج والعمرة | إضافة رحلة جديدة</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">إضافة رحلة جديدة</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('trips') }}">الرحلات</a></li>
                                <li class="breadcrumb-item active">إضافة رحلة جديدة</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Hidden label form layout section start -->
                <section id="hidden-label-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="hidden-label-basic-form">
                                        إضافة رحلة جديدة
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a data-action="collapse"><i class="ft-minus"></i></a>
                                            </li>
                                            <li>
                                                <a data-action="expand"><i class="ft-maximize"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form novalidate class="form" action="{{ route('trips.store') }}" method="POST">
                                            @csrf

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
                                                                    value="{{ old('name') }}" class="form-control mb-1"
                                                                    placeholder="ادخل اسم الرحلة"
                                                                    data-validation-required-message="لا يمكن ان يكون اسم الرحلة فارغاً"
                                                                    aria-invalid="false">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('name')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('name') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>تاريخ الرحلة
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="date" name="date"
                                                                    value="{{ old('date') }}" class="form-control mb-1"
                                                                    placeholder="اختر تاريخ الرحلة"
                                                                    data-validation-required-message="لا يمكن ان يكون تاريخ الرحلة فارغاً"
                                                                    aria-invalid="false">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('date')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('date') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>سعر الرحلة
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="number" name="price"
                                                                    value="{{ old('price') }}" class="form-control mb-1"
                                                                    placeholder="ادخل سعر الرحلة"
                                                                    data-validation-required-message="لا يمكن ان يكون سعر الرحلة فارغاً"
                                                                    aria-invalid="false">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('price')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('price') }}</div>
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
                                                                    value="{{ old('available_seats') }}"
                                                                    class="form-control mb-1"
                                                                    placeholder="ادخل عدد المقاعد المتاحة"
                                                                    data-validation-required-message="لا يمكن ان يكون عدد المقاعد فارغاً"
                                                                    aria-invalid="false">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('available_seats')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('available_seats') }}</div>
                                                                @enderror
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
                                                    <i class="la la-check-square-o"></i>إضافة الرحلة
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Hidden label form layout section end -->
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
@endsection

@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <!-- END: Page JS-->
@endsection
