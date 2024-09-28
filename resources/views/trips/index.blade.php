@extends('layouts.layout')

@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/tables/datatable/datatables.min.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="مكاتب الحج والعمرة" />
    <title>لوحة تحكم مكاتب الحج والعمرة | جميع الرحلات</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">الرحلات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ Route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active">جميع الرحلات</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ Route('trips.create') }}" class="btn btn-info round box-shadow-2 px-2 mb-1">
                            <i class="ft-plus-circle icon-left"></i> اضافة رحلة جديدة
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
                                    <h4 class="card-title">جميع الرحلات</h4>
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
                                                        <th>رقم الرحلة</th>
                                                        <th>اسم الرحلة</th>
                                                        <th>السعر</th>
                                                        <th>تاريخ الرحلة</th>
                                                        <th>المقاعد المتاحة</th>
                                                        <th>تم الانشاء بواسطة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tripTable">
                                                    @foreach ($trips as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ number_format($item->price) }}</td>
                                                            <td>{{ $item->date }}</td>
                                                            <td>{{ $item->available_seats }}</td>
                                                            <td>
                                                                @if ($item->creator)
                                                                    <a href="{{ route('users.show', $item->creator->id) }}">
                                                                        {{ $item->creator->id }}-{{ $item->creator->name }}
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
                                                                        aria-expanded="false">عرض اكثر</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ Route('trips.show', $item->id) }}">عرض</a>
                                                                        <a class="dropdown-item"
                                                                            href="{{ Route('trips.edit', $item->id) }}">تعديل</a>
                                                                        <button class="dropdown-item delete_trip_btn"
                                                                            value="{{ $item->id }}">حذف</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>رقم الرحلة</th>
                                                        <th>اسم الرحلة</th>
                                                        <th>السعر</th>
                                                        <th>تاريخ الرحلة</th>
                                                        <th>المقاعد المتاحة</th>
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
    <script src="/admin/app-assets/vendors/js/tables/buttons.colVis.min.js"></script>
    <script src="/admin/app-assets/vendors/js/tables/buttons.print.min.js"></script>
    <!-- END: Page Vendor JS-->
@endsection

@section('page_js')
    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script src="/admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-print.min.js">
    </script>
    <script>
        $(document).ready(function() {
            // Filter by date range functionality
            $('#filterBtn').on('click', function() {
                let startDate = $('#startDate').val();
                let endDate = $('#endDate').val();

                $('#tripTable tr').filter(function() {
                    let tripDate = $(this).find('td:eq(3)')
                        .text(); // Assuming date is in the 4th column
                    return (!startDate || new Date(tripDate) >= new Date(startDate)) &&
                        (!endDate || new Date(tripDate) <= new Date(endDate));
                }).show();

                $('#tripTable tr').filter(function() {
                    let tripDate = $(this).find('td:eq(3)')
                        .text(); // Assuming date is in the 4th column
                    return (startDate && new Date(tripDate) < new Date(startDate)) ||
                        (endDate && new Date(tripDate) > new Date(endDate));
                }).hide();
            });
            //end filter

            // Clear filter functionality
            $('#clearFilterBtn').on('click', function() {
                $('#startDate').val(''); // إعادة تعيين تاريخ البداية
                $('#endDate').val(''); // إعادة تعيين تاريخ النهاية
                $('#tripTable tr').show(); // عرض جميع الرحلات
            });

            $(document).on('click', '.delete_trip_btn', function(e) {
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
                        var url = "{{ route('trips.delete', ':id') }}".replace(':id', id);
                        var form = $('<form>', {
                            'action': url,
                            'method': 'POST',
                            'style': 'display:none;'
                        }).append(
                            $('<input>', {
                                'type': 'hidden',
                                'name': '_token',
                                'value': '{{ csrf_token() }}'
                            })
                        ).append(
                            $('<input>', {
                                'type': 'hidden',
                                'name': '_method',
                                'value': 'DELETE'
                            })
                        );
                        $('body').append(form);
                        form.submit();
                    }
                })
            });
        });
    </script>
    <!-- END: Page JS-->
@endsection
