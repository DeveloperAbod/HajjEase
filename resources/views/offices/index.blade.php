@extends('layouts.layout')


@section('page_css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css-rtl/core/colors/palette-gradient.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/tables/datatable/datatables.min.css" />
    <!-- END: Page CSS-->
@endsection

@section('page_meta')
    <meta name="description" content="قائمة المكاتب" />
    <title>لوحة تحكم المكاتب | جميع المكاتب</title>
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">المكاتب</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active">جميع المكاتب</li>
                            </ol>
                        </div>
                    </div>
                </div>
                @can('اضافة مكتب')
                    <div class="content-header-right col-md-6 col-12">
                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{ route('offices.create') }}" class="btn btn-info round box-shadow-2 px-2 mb-1">
                                <i class="ft-plus-circle icon-left"></i> إضافة مكتب جديد
                            </a>
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
                                    <h4 class="card-title">جميع المكاتب</h4>
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
                                                        <th>رقم المكتب</th>
                                                        <th>اسم المكتب</th>
                                                        <th>الموقع</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>شخص الاتصال</th>
                                                        <th>تم الانشاء بواسطة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($offices as $office)
                                                        <tr>
                                                            <td>{{ $office->id }}</td>
                                                            <td>{{ $office->name }}</td>
                                                            <td>{{ $office->location }}</td>
                                                            <td>{{ $office->phone }}</td>
                                                            <td>{{ $office->contact_person }}</td>
                                                            <td>
                                                                @if ($office->creator)
                                                                    <a
                                                                        href="{{ route('users.show', $office->creator->id) }}">
                                                                        {{ $office->creator->id }} -
                                                                        {{ $office->creator->name }}
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
                                                                        عرض المزيد
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('offices.show', $office->id) }}">عرض</a>
                                                                        @can('تعديل مكتب')
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('offices.edit', $office->id) }}">تعديل</a>
                                                                        @endcan
                                                                        @can('حذف مكتب')
                                                                            <button class="dropdown-item delete_office_btn"
                                                                                value="{{ $office->id }}">حذف</button>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>رقم المكتب</th>
                                                        <th>اسم المكتب</th>
                                                        <th>الموقع</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>شخص الاتصال</th>
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
    <script>
        $(document).on('click', '.delete_office_btn', function(e) {
            e.preventDefault();
            var id = $(this).val();
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تستطيع استرجاع هذا السجل",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'لا',
                confirmButtonText: 'نعم'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('offices.delete', ':id') }}".replace(':id', id);
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
