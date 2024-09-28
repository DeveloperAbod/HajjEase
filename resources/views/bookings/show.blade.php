@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/page-users.min.css" /> <!-- END: Page CSS-->
    {{-- for tables --}}
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/tables/datatable/datatables.min.css" />
@endsection

@section('page_meta')
    <meta name="description" content="عرض تفاصيل الحجز" />
    <title>لوحة تحكم مكاتب الحج والعمرة | عرض تفاصيل الحجز</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">عرض تفاصيل الحجز</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('bookings') }}">الحجوزات</a></li>
                                <li class="breadcrumb-item active">عرض تفاصيل الحجز</li>
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
                                                    <td>رقم الحجز:</td>
                                                    <td>{{ $booking->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>اسم الحاج:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('pilgrims.show', $booking->pilgrim ? $booking->pilgrim->id : '') }}">
                                                            {{ $booking->pilgrim ? $booking->pilgrim->id : '' }}-{{ $booking->pilgrim ? $booking->pilgrim->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>اسم الرحلة:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('trips.show', $booking->trip ? $booking->trip->id : '') }}">
                                                            {{ $booking->trip ? $booking->trip->id : '' }}-{{ $booking->trip ? $booking->trip->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ الحجز:</td>
                                                    <td>{{ $booking->date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>سعر الحجز:</td>
                                                    <td>{{ number_format($booking->totalAmount()) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المدفوع:</td>
                                                    <td>{{ number_format($booking->amount_paid()) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المتبقي:</td>
                                                    <td>{{ number_format($booking->remainingAmount()) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>حالة الدفع:</td>
                                                    <td>{{ $booking->paymentStatus() }}</td>
                                                </tr>

                                                <tr>
                                                    <td>حالة الحجز:</td>
                                                    <td>{{ $booking->Status() }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ انشاء الحجز:</td>
                                                    <td>{{ $booking->created_at->format('Y-m-d H:i:s') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>تم الانشاء بواسطة:</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('users.show', $booking->creator ? $booking->creator->id : '') }}">
                                                            {{ $booking->creator ? $booking->creator->id : '' }}-{{ $booking->creator ? $booking->creator->name : 'غير متوفر' }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-actions text-center">

                                    @if ($booking->status == 0)
                                        <a href="{{ route('bookings.accept', $booking->id) }}"
                                            class="btn btn-sm btn-primary">قبول
                                            الحجز</a>
                                        <a href="{{ route('bookings.reject', $booking->id) }}"
                                            class="btn btn-sm btn-danger">رفض
                                            الحجز</a>
                                    @elseif($booking->status == 1)
                                        <a href="{{ route('bookings.reject', $booking->id) }}"
                                            class="btn btn-sm btn-danger">تغيير حالة الحجز الى مرفوض</a>
                                    @elseif($booking->status == 2)
                                        <a href="{{ route('bookings.accept', $booking->id) }}"
                                            class="btn btn-sm btn-primary">تغيير حالة الحجز الى مقبول</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->












    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">المدفوعات الخاصة بهذا الحجز</h3>

                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ route('payments.create') }}" class="btn btn-info round box-shadow-2 px-2 mb-1">
                            <i class="ft-plus-circle icon-left"></i> اضافة دفع جديد
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">المدفوعات الخاصة بهذا الحجز</h4>
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
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered dataex-visibility-selector">
                                                <thead>
                                                    <tr>
                                                        <th>الرقم</th>
                                                        <th>رقم الحجز</th>
                                                        <th>المبلغ المدفوع</th>
                                                        <th>رقم الإيصال</th>
                                                        <th>تاريخ الإيصال</th>
                                                        <th>تم الانشاء بواسطة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($booking->payments as $payment)
                                                        <tr>
                                                            <td>{{ $payment->id }}</td>
                                                            <td>{{ $payment->booking->id }}</td>
                                                            <td>{{ number_format($payment->amount_paid) }}</td>
                                                            <td>{{ $payment->receipt_number }}</td>
                                                            <td>{{ $payment->receipt_date }}</td>
                                                            <td>
                                                                @if ($payment->creator)
                                                                    <a
                                                                        href="{{ route('users.show', $payment->creator->id) }}">
                                                                        {{ $payment->creator->id }} -
                                                                        {{ $payment->creator->name }}
                                                                    </a>
                                                                @else
                                                                    غير متوفر
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-info dropdown-toggle mr-1"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        عرض اكثر
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('payments.show', $payment->id) }}">عرض</a>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('payments.edit', $payment->id) }}">تعديل</a>
                                                                        <button class="dropdown-item delete_payment_btn"
                                                                            value="{{ $payment->id }}">حذف</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>الرقم</th>
                                                        <th>رقم الحجز</th>
                                                        <th>المبلغ المدفوع</th>
                                                        <th>رقم الإيصال</th>
                                                        <th>تاريخ الإيصال</th>
                                                        <th>مستخدم الإنشاء</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('page_vendor_js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/admin/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    {{-- start vendor print tables --}}
    <script src="/admin/app-assets/vendors/js/tables/buttons.colVis.min.js"></script>
    <script src="/admin/app-assets/vendors/js/tables/buttons.print.min.js"></script>
    {{-- end vendor print tables --}}
    <!-- END: Page Vendor JS-->
@endsection

@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    {{-- start print tables --}}
    <script src="/admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-print.min.js">
    </script>
    {{-- end print tables --}}
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script>
        $(document).on('click', '.delete_payment_btn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            Swal.fire({
                title: 'هل انت متأكد',
                text: "لن تستطيع استرجاع هذا السجل",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'لا',
                confirmButtonText: 'نعم'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('payments.delete', ':id') }}".replace(':id', id);
                    var form = $('<form>', {
                        'action': url,
                        'method': 'POST',
                        'style': 'display:none;'
                    }).append(
                        $('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': '{{ csrf_token() }}'
                        }),
                        $('<input>', {
                            'type': 'hidden',
                            'name': '_method',
                            'value': 'DELETE'
                        })
                    );
                    $('body').append(form);
                    form.submit();
                }
            });
        });
    </script>
    <!-- END: Page JS-->
@endsection
