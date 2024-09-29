@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/pages/page-users.min.css" />
    <!-- END: Page CSS-->
    {{-- for tables --}}
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/tables/datatable/datatables.min.css" />
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @can('عرض حجوزات الحاج')
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2">
                        <h3 class="content-header-title">حجوزات الحاج</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                    <li class="breadcrumb-item active">حجوزات الحاج</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    @can('اضافة حجز')
                        <div class="content-header-right col-md-6 col-12">
                            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('bookings.create') }}" class="btn btn-info round  box-shadow-2 px-2 mb-1"><i
                                        class="ft-plus-circle icon-left"></i> اضافة حجز جديد</a>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="content-body">
                    <section id="configuration">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">حجوزات الحاج</h4>
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
                                            <!-- Filter Section -->
                                            <div class="row mb-3">
                                                <div class="col-md-4 mb-1">
                                                    <input type="date" id="startDate" class="form-control"
                                                        placeholder="تاريخ البداية">
                                                </div>
                                                <div class="col-md-4 mb-1">
                                                    <input type="date" id="endDate" class="form-control"
                                                        placeholder="تاريخ النهاية">
                                                </div>
                                                <div class="col-md-4">
                                                    <button id="filterBtn" class="btn btn-primary">فلترة</button>
                                                    <button id="clearFilterBtn" class="btn btn-secondary">إلغاء الفلترة</button>
                                                    <!-- زر إلغاء الفلترة -->
                                                </div>
                                            </div>
                                            <!-- End of Filter Section -->

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered dataex-visibility-selector">
                                                    <thead>
                                                        <tr>
                                                            <th>الرقم</th>
                                                            <th>اسم الحاج</th>
                                                            <th>اسم الرحلة</th>
                                                            <th>تاريخ الحجز</th>
                                                            <th>سعر الحجز</th>
                                                            <th>المبلغ المدفوع</th>
                                                            <th>حالة الدفع</th>
                                                            <th>حالة الحجز</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="Table">
                                                        @foreach ($pilgrim->bookings as $booking)
                                                            <tr>
                                                                <td>{{ $booking->id }}</td>
                                                                <td>{{ $booking->pilgrim->name }}</td>
                                                                <td>{{ $booking->trip->name }}</td>
                                                                <td>{{ $booking->date }}</td>
                                                                <td>{{ number_format($booking->trip->price) }}</td>
                                                                <td>{{ number_format($booking->amount_paid()) }}</td>
                                                                <td>{{ $booking->paymentStatus() }}</td>
                                                                <td>{{ $booking->Status() }}</td>
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
                                                                                href="{{ route('bookings.show', $booking->id) }}">عرض</a>
                                                                            @can('تعديل حجز')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('bookings.edit', $booking->id) }}">تعديل</a>
                                                                            @endcan
                                                                            @can('قبول ورفض حجز')
                                                                                @if ($booking->status == 0)
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('bookings.accept', $booking->id) }}">قبول
                                                                                        الحجز</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('bookings.reject', $booking->id) }}">رفض
                                                                                        الحجز</a>
                                                                                @endif
                                                                            @endcan
                                                                            @can('حذف حجز')
                                                                                <button class="dropdown-item delete_booking_btn"
                                                                                    value="{{ $booking->id }}">حذف</button>
                                                                            @endcan

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>الرقم</th>
                                                            <th>اسم الحاج</th>
                                                            <th>اسم الرحلة</th>
                                                            <th>تاريخ الحجز</th>
                                                            <th>سعر الحجز</th>
                                                            <th>المبلغ المدفوع</th>
                                                            <th>حالة الدفع</th>
                                                            <th>حالة الحجز</th>
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
    @endcan
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
    <script src="/admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script>
        // Filter by date range functionality
        $('#filterBtn').on('click', function() {
            let startDate = $('#startDate').val();
            let endDate = $('#endDate').val();

            $('#Table tr').filter(function() {
                let bookingDate = $(this).find('td:eq(3)')
                    .text(); // Assuming date is in the 4th column
                return (!startDate || new Date(bookingDate) >= new Date(startDate)) &&
                    (!endDate || new Date(bookingDate) <= new Date(endDate));
            }).show();

            $('#Table tr').filter(function() {
                let bookingDate = $(this).find('td:eq(3)')
                    .text(); // Assuming date is in the 4th column
                return (startDate && new Date(bookingDate) < new Date(startDate)) ||
                    (endDate && new Date(bookingDate) > new Date(endDate));
            }).hide();
        });
        //end filter

        // Clear filter functionality
        $('#clearFilterBtn').on('click', function() {
            $('#startDate').val(''); // إعادة تعيين تاريخ البداية
            $('#endDate').val(''); // إعادة تعيين تاريخ النهاية
            $('#Table tr').show(); // عرض جميع الرحلات
        });

        $(document).on('click', '.delete_booking_btn', function(e) {
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
                    var url = "{{ route('bookings.delete', ':id') }}".replace(':id', id);
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
@endsection
