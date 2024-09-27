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
    <title>لوحة تحكم مكاتب الحج والعمرة | إضافة حاج جديد</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">إضافة حاج جديد</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('pilgrims') }}">الحجاج</a></li>
                                <li class="breadcrumb-item active">إضافة حاج جديد</li>
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
                                        إضافة حاج جديد
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
                                        <form novalidate class="form" action="{{ route('pilgrims.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="la la-users"></i> بيانات الحاج
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>اسم الحاج
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" required
                                                                    value="{{ old('name') }}" class="form-control mb-1"
                                                                    placeholder="ادخل اسم الحاج"
                                                                    data-validation-required-message="لا يمكن ان يكون اسم الحاج فارغاً">
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
                                                                <span class="required">*</span>نوع الهوية
                                                            </h5>
                                                            <div class="controls">

                                                                <select required name="identity_type"
                                                                    data-validation-required-message="لا يمكن ان يكون نوع الهوية فارغاً"
                                                                    class="form-control mb-1">
                                                                    <option value>اختر نوع الهوية</option>
                                                                    @foreach (\App\Enums\IdentityType::cases() as $identityType)
                                                                        <option value="{{ $identityType->value }}"
                                                                            {{ old('identity_type') === $identityType->value ? 'selected' : '' }}>
                                                                            {{ $identityType->label() }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="help-block">
                                                                </div>
                                                                @error('identity_type')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('identity_type') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>رقم الهوية
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="number" name="identity_number" required
                                                                    value="{{ old('identity_number') }}"
                                                                    class="form-control mb-1" placeholder="ادخل رقم الهوية"
                                                                    data-validation-required-message="لا يمكن ان يكون رقم الهوية فارغاً">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('identity_number')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('identity_number') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>رقم هاتف الحاج (رقم يمني)
                                                            </h5>
                                                            <div class="controls">
                                                                <input minlength="9" maxlength="9" type="text" required
                                                                    name="phone" value="{{ old('phone') }}"
                                                                    class="form-control mb-1"
                                                                    placeholder="ادخل رقم هاتف الحاج"
                                                                    data-validation-required-message="لا يمكن ان يكون رقم هاتف الحاج فارغاً">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('phone')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('phone') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>الحالة الصحية للحاج
                                                            </h5>
                                                            <div class="controls">
                                                                <textarea required data-validation-required-message="لا يمكن ان تكون حالة الحاج الصحية فارغة" name="health_status"
                                                                    class="form-control mb-1" rows="2">{{ old('health_status') }}</textarea>
                                                            </div>
                                                            <div class="help-block">
                                                            </div>
                                                            @error('health_status')
                                                                <div class="form-text text-danger">
                                                                    {{ $errors->first('health_status') }}</div>
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
                                                    <i class="la la-check-square-o"></i>إضافة الحاج
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
