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
    <title>لوحة تحكم مكاتب الحج والعمرة | إضافة مكتب جديد</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">إضافة مكتب جديد</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('offices') }}">المكاتب</a></li>
                                <li class="breadcrumb-item active">إضافة مكتب جديد</li>
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
                                        إضافة مكتب جديد
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
                                        <form novalidate action="{{ route('offices.store') }}" method="POST">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-building"></i> بيانات المكتب</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">اسم المكتب <span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="name" value="{{ old('name') }}"
                                                                required
                                                                data-validation-required-message="لا يمكن ان يكون اسم المكتب فارغاً"
                                                                class="form-control" placeholder="ادخل اسم المكتب">
                                                            <div class="help-block">
                                                            </div>
                                                            @error('name')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location">الموقع <span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="location"
                                                                value="{{ old('location') }}" required
                                                                data-validation-required-message="لا يمكن ان يكون موقع المكتب فارغاً"
                                                                class="form-control" placeholder="ادخل الموقع">
                                                            <div class="help-block">
                                                            </div>
                                                            @error('location')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="map_url">رابط الخريطة</label>
                                                            <input type="url" name="map_url"
                                                                value="{{ old('map_url') }}" class="form-control"
                                                                placeholder="ادخل رابط الخريطة (اختياري)">
                                                            <div class="help-block">
                                                            </div>
                                                            @error('map_url')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">رقم الهاتف (رقم يمني)<span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                                required minlength="9" maxlength="9"
                                                                data-validation-required-message="لا يمكن ان يكون رقم هاتف المكتب فارغاً"
                                                                class="form-control" placeholder="ادخل رقم الهاتف">
                                                            <div class="help-block">
                                                            </div>
                                                            @error('phone')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact_person">اسم مسؤول الاتصال <span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="contact_person"
                                                                value="{{ old('contact_person') }}" required
                                                                data-validation-required-message="لا يمكن ان يكون اسم مسؤول الاتصال فارغاً"
                                                                class="form-control"
                                                                placeholder="ادخل  اسم مسؤول الاتصال">
                                                            <div class="help-block">
                                                            </div>
                                                            @error('contact_person')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning">
                                                    اعادة ضبط <i class="ft-refresh-cw position-right"></i>
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>إضافة المكتب
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
