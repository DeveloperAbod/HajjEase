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
    <title>لوحة تحكم مكاتب الحج والعمرة | إضافة دفع جديد</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">إضافة دفع جديد</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('payments') }}">المدفوعات</a></li>
                                <li class="breadcrumb-item active">إضافة دفع جديد</li>
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
                                    <h4 class="card-title" id="hidden-label-basic-form">إضافة دفع جديد</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form novalidate class="form" action="{{ route('payments.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-money"></i> بيانات الدفع</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> رقم الحجز</h5>
                                                            <div class="controls">
                                                                <select name="booking_id" class="form-control " required
                                                                    id="booking_id">
                                                                    <option value="">اختر الحجز</option>
                                                                    @foreach ($bookings as $booking)
                                                                        <option value="{{ $booking->id }}"
                                                                            data-total="{{ $booking->totalAmount() }}"
                                                                            data-remaining="{{ $booking->remainingAmount() }}"
                                                                            {{ old('booking_id') == $booking->id ? 'selected' : '' }}>
                                                                            {{ $booking->id }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="help-block"></div>
                                                                @error('booking_id')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> المبلغ المدفوع</h5>
                                                            <div class="controls">
                                                                <input type="number" name="amount_paid" id="amount_paid"
                                                                    required class="form-control mb-1"
                                                                    value="{{ old('amount_paid') }}">
                                                                <div class="help-block"></div>
                                                                @error('amount_paid')
                                                                    <div class="form-text text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <small id="remaining_amount_info" class="form-text"></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> رقم الإيصال (السند)</h5>
                                                            <div class="controls">
                                                                <input type="text" name="receipt_number" required
                                                                    class="form-control mb-1"
                                                                    value="{{ old('receipt_number') }}">
                                                                <div class="help-block"></div>
                                                                @error('receipt_number')
                                                                    <div class="form-text text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5><span class="required">*</span> تاريخ الإيصال (السند)</h5>
                                                            <div class="controls">
                                                                <input type="date" name="receipt_date" required
                                                                    class="form-control mb-1"
                                                                    value="{{ old('receipt_date') }}">
                                                                <div class="help-block"></div>
                                                                @error('receipt_date')
                                                                    <div class="form-text text-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>المبلغ الكامل للحجز: <span id="total_amount"></span></h5>
                                                    <h5>المبلغ المتبقي: <span id="remaining_amount"></span></h5>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning">إعادة ضبط <i
                                                        class="ft-refresh-cw position-right"></i></button>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="la la-check-square-o"></i> إضافة الدفع</button>
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
    {{-- select 2 --}}
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <script src="/admin/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    {{-- i write it here to clear what i do , it will be change to file if the project productions --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingSelect = document.getElementById('booking_id');
            const amountPaidInput = document.getElementById('amount_paid');
            const totalAmountSpan = document.getElementById('total_amount');
            const remainingAmountSpan = document.getElementById('remaining_amount');
            const remainingAmountInfo = document.getElementById('remaining_amount_info');

            let remainingAmount = 0;

            // Update the remaining and total amounts when booking changes
            bookingSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const totalAmount = selectedOption.getAttribute('data-total');
                remainingAmount = parseFloat(selectedOption.getAttribute('data-remaining'));


                totalAmountSpan.textContent = totalAmount;

                remainingAmountSpan.textContent = remainingAmount;

                // Update remaining info
                remainingAmountInfo.textContent = `المبلغ المتبقي: ${number_format(remainingAmount)}`;

                clearValidationError();
            });

            // Validate amount paid input
            amountPaidInput.addEventListener('input', function() {
                const amountPaid = parseFloat(this.value);

                if (amountPaid > remainingAmount) {
                    showValidationError(
                        `المبلغ المدفوع يجب أن يكون أقل من أو يساوي ${number_format(remainingAmount)}`);
                } else {
                    clearValidationError();
                }
            });

            // Function to display validation error
            function showValidationError(message) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'form-text text-danger';
                errorDiv.id = 'amount_paid_error';
                errorDiv.textContent = message;

                // Remove old error if exists
                clearValidationError();

                // Add new error message
                amountPaidInput.parentElement.appendChild(errorDiv);
            }

            // Function to clear validation error
            function clearValidationError() {
                const existingError = document.getElementById('amount_paid_error');
                if (existingError) {
                    existingError.remove();
                }
            }
            // Function to format chown number
            function number_format(amount) {
                // Convert the amount to a string and use a regular expression to add commas
                return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        });
    </script>
    <!-- END: Page JS-->
@endsection
