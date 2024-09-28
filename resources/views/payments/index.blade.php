@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/tables/datatable/datatables.min.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="مدفوعات الحج والعمرة" />
    <title>لوحة تحكم مكاتب الحج والعمرة | جميع المدفوعات</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">جميع المدفوعات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active">جميع المدفوعات</li>
                            </ol>
                        </div>
                    </div>
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
                                    <h4 class="card-title">جميع المدفوعات</h4>
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
                                                        <th>رقم الحجز</th>
                                                        <th>المبلغ المدفوع</th>
                                                        <th>رقم الإيصال</th>
                                                        <th>تاريخ الإيصال</th>
                                                        <th>تم الانشاء بواسطة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="Table">
                                                    @foreach ($payments as $payment)
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
                                                        <th>تم الانشاء بواسطة</th>
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
        // Filter by date range functionality
        $('#filterBtn').on('click', function() {
            let startDate = $('#startDate').val();
            let endDate = $('#endDate').val();

            $('#Table tr').filter(function() {
                let paymentDate = $(this).find('td:eq(4)')
                    .text(); // Assuming date is in the 4th column
                return (!startDate || new Date(paymentDate) >= new Date(startDate)) &&
                    (!endDate || new Date(paymentDate) <= new Date(endDate));
            }).show();

            $('#Table tr').filter(function() {
                let paymentDate = $(this).find('td:eq(4)')
                    .text(); // Assuming date is in the 4th column
                return (startDate && new Date(paymentDate) < new Date(startDate)) ||
                    (endDate && new Date(paymentDate) > new Date(endDate));
            }).hide();
        });
        //end filter
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
