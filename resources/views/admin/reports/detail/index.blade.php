@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.detail')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.detail')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover" id="coursesTable">
                        <thead>
                        <tr>
                            <th>{{__('course.no')}}</th>
                            <th>{{__('course.name')}}</th>
                            <th>{{__('course.teacher')}}</th>
                            <th>{{__('course.created_at')}}</th>
                            <th width="13%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection

        @section('js')
            <script>
                // $(document).ready(function() {
                var table = $('#coursesTable').DataTable({
                    stateSave: true,
                    searching: true,
                    serverSide: true,
                    lengthChange: true,
                    language: {
                        "lengthMenu": "Hiện thị _MENU_",
                        "zeroRecords": "Nothing found - sorry",
                        "info": "Hiện thị trang _PAGE_ trong _PAGES_",
                        "infoEmpty": "Không có bản ghi nào",
                        "infoFiltered": "(Lọc trong _MAX_ bản ghi)",
                        "search": "Tìm kiếm:",
                        "loadingRecords": "Tải dữ liệu...",
                        "processing": "Đang xử lý...",
                        "zeroRecords": "Không tìm thấy kết quả",
                        "paginate": {
                            "first": "Trang đầu",
                            "last": "Trang cuối",
                            "next": "Trang sau",
                            "previous": "Trang trước"
                        },
                    },
                    order: [[1, 'asc']],
                    ajax: {
                        url: '{{route('admin.datatables.courses')}}',
                    },
                    columns: [
                        {
                            data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'name'},
                        {data: 'user.name'},
                        {data: 'created_at'},
                        {data: 'action', "searchable": false,
                            render: function (data, type, row, meta) {
                                return '<a href="/admin/details/' + row.id + '" class="btn btn-primary margin-r-5"><i class="fas fa-chart-line"></i></a>';
                            }
                        },
                    ],

                });
            </script>
@endsection
