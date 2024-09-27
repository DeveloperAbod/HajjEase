@extends('layouts.layout')


@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css" />
    {{-- select 2 --}}
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/selects/select2.min.css" />


    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="مكاتب الحج والعمرة" />


    <title>
        لوحة تحكم مكاتب الحج والعمرة | اضافة مستخدم جديد
    </title>
@endsection





@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">اضافة مستخدم جديد</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ Route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ Route('users') }}">المستخدمين</a></li>
                                <li class="breadcrumb-item active">اضافة مستخدم جديد</li>
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
                                        اضافة مستخدم جديد
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
                                        <form novalidate class="form" action="{{ Route('users.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="la la-user"></i> بيانات المستخدم
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>اسم المستخدم
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" required
                                                                    value="{{ old('name') }}" class="form-control mb-1"
                                                                    placeholder="ادخل اسم المستخدم"
                                                                    data-validation-required-message="لا يمكن ان يكون اسم المستخدم فارغاً">
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
                                                                <span class="required">*</span>البريد الالكتروني
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="email" name="email" required
                                                                    value="{{ old('email') }}" class="form-control mb-1"
                                                                    placeholder="ادخل البريد الالكتروني"
                                                                    data-validation-required-message="لا يمكن ان يكون البريد الالكتروني فارغاً">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('email')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('email') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>كلمة المرور
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="password" name="password" required
                                                                    class="form-control mb-1" placeholder="ادخل كلمة المرور"
                                                                    data-validation-required-message="لا يمكن ان يكون كلمة المرور فارغاً">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('password')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('password') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>تاكيد كلمة المرور
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="password" name="confirm-password" required
                                                                    class="form-control mb-1"
                                                                    placeholder="تاكيد كلمة المرور"
                                                                    data-validation-match-match="password">
                                                                <div class="help-block">
                                                                </div>
                                                                @error('confirm-password')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('confirm-password') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>صورة المستخدم</h5>
                                                            <div class="controls">
                                                                <input type="file" name="avatar"
                                                                    class="form-control mb-1">
                                                                <div class="help-block"></div>
                                                                @error('avatar')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('avatar') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>
                                                                <span class="required">*</span>رقم هاتف المستخدم (رقم يمني)
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone" required
                                                                    value="{{ old('phone') }}" class="form-control mb-1"
                                                                    minlength="9" maxlength="9"
                                                                    placeholder="ادخل رقم هاتف المستخدم"
                                                                    data-validation-required-message="لا يمكن ان يكون رقم هاتف المستخدم فارغة">
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
                                                                <span class="required">*</span>الصلاحيات
                                                                <small class="text-muted">اضغط ctrl في لوحة المفاتيح واختر
                                                                    اكثر من صلاحية</small>
                                                            </h5>
                                                            <div class="controls">
                                                                <select required
                                                                    data-validation-required-message="لا يمكن ان يكون حقل الصلاحيات فارغاً"
                                                                    name="roles_name[]"
                                                                    class="select2-roles form-control mb-1" multiple>
                                                                    @foreach ($roles as $roleKey => $roleValue)
                                                                        <option value="{{ $roleKey }}">
                                                                            {{ $roleValue }}</option>
                                                                    @endforeach
                                                                </select>

                                                                <div class="help-block">
                                                                </div>
                                                                @error('roles_name')
                                                                    <div class="form-text text-danger">
                                                                        {{ $errors->first('roles_name') }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="status"
                                                                @if (old('status') == 'on') checked @endif
                                                                id="checkbox2" />
                                                            <label class="custom-control-label" for="checkbox2">تفعيل
                                                                المستخدم</label>
                                                        </div>
                                                    </div>
                                                </div>





                                            </div>

                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning">
                                                    اعادة ضبط <i class="ft-refresh-cw position-right"></i>
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>اضافة المستخدم
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
    {{-- select 2 --}}
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <!-- END: Page Vendor JS-->
@endsection


@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <script src="/admin/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    <!-- END: Page JS-->
@endsection
