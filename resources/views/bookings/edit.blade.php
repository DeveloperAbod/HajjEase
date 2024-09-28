@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css" />
    {{-- Select2 --}}
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/selects/select2.min.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="مكاتب الحج والعمرة" />
    <title>لوحة تحكم مكاتب الحج والعمرة | تعديل الحجز</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">تعديل الحجز</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active">تعديل الحجز</li>
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
                                    <h4 class="card-title" id="hidden-label-basic-form">تعديل الحجز</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form novalidate class="form"
                                            action="{{ route('bookings.update', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-user"></i> بيانات الحجز</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> الحاج</h5>
                                                            <div class="controls">
                                                                <select name="pilgrim_id" class="form-control select2"
                                                                    required>
                                                                    <option value="">اختر الحاج</option>
                                                                    @foreach ($pilgrims as $pilgrim)
                                                                        <option value="{{ $pilgrim->id }}"
                                                                            {{ $booking->pilgrim_id == $pilgrim->id ? 'selected' : '' }}>
                                                                            {{ $pilgrim->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('pilgrim_id')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> الرحلة</h5>
                                                            <div class="controls">
                                                                <select name="trip_id" class="form-control select2"
                                                                    required>
                                                                    <option value="">اختر الرحلة</option>
                                                                    @foreach ($trips as $trip)
                                                                        <option value="{{ $trip->id }}"
                                                                            {{ $booking->trip_id == $trip->id ? 'selected' : '' }}>
                                                                            {{ $trip->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('trip_id')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> التاريخ</h5>
                                                            <div class="controls">
                                                                <input type="date" name="date" required
                                                                    class="form-control mb-1"
                                                                    value="{{ old('date', $booking->date) }}">
                                                                @error('date')
                                                                    <div class="form-text text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>حالة الدفع</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $booking->paymentStatus() }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>سعر الحجز</h5>
                                                            <div class="controls">
                                                                <input type="text" class="form-control"
                                                                    value="{{ number_format($booking->trip->price, 0) }}"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> المبلغ المدفوع</h5>
                                                            <div class="controls">
                                                                <input type="text" name="amount_paid"
                                                                    class="form-control mb-1" placeholder="المبلغ المدفوع"
                                                                    value="{{ $booking->amount_paid() }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> المبلغ المتبقي</h5>
                                                            <div class="controls">
                                                                <input type="text" name="amount_paid"
                                                                    class="form-control mb-1" placeholder="المبلغ المدفوع"
                                                                    value="{{ $booking->remainingAmount() }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning">إعادة ضبط <i
                                                        class="ft-refresh-cw position-right"></i></button>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="la la-check-square-o"></i> تحديث الحجز</button>
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
    {{-- Select2 --}}
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <script src="/admin/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    <!-- END: Page JS-->
@endsection
