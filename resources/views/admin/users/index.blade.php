@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.user')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.user')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <a href="{{route('admin.users.create')}}" class="btn btn-primary mb-3">{{__('user.new')}}</a>
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover" id="usersTable">
                        <thead>
                        <tr>
                            <th width="5%">{{__('user.no')}}</th>
                            <th width="5%">{{__('user.avatar')}}</th>
                            <th>{{__('user.name')}}</th>
                            <th>{{__('user.email')}}</th>
                            <th>{{__('user.specialty')}}</th>
                            <th>{{__('user.level')}}</th>
                            <th width="10%">{{__('user.reliability')}}</th>
                            <th width="7%">{{__('user.role')}}</th>
                            <th width="9%">{{__('user.status')}}</th>
                            <th width="10%"></th>
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
                var table = $('#usersTable').DataTable({
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
                        url: '{{route('admin.datatables.users')}}',
                    },
                    columns: [
                        {
                            data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'avatar', "searchable": false,
                            render: function (data, type, row, meta) {
                                return '<img src="' + data + '" alt="avatar" width="100%">'
                            }
                        },
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'specialty'},
                        {data: 'level'},
                        {data: 'reliability'},
                        {data: 'role.display_name'},
                        {data: 'status', "searchable": false,
                            render: function (data, type, row, meta) {
                                if (data == 1) {
                                    return '<label class="switch small">'
                                        + '<input type="checkbox" name="status" data-id="'+ row.id + '" checked>'
                                        + '<span class="slider round"></span>'
                                        + '</label>';
                                } else {
                                    return '<label class="switch small">'
                                        + '<input type="checkbox" name="status" data-id="'+ row.id + '">'
                                        + '<span class="slider round"></span>'
                                        + '</label>';
                                }
                            }
                        },
                        {data: 'action', "searchable": false,
                            render: function (data, type, row, meta) {
                                return '<a href="/admin/users/' + row.id + '/edit" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>'
                                + '<a href="javascript:void(0)" data-id="' + row.id + '" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
                            }
                        },
                    ],

                });

                $('#lessonsTable').on("click", '.btn-delete', function () {
                    var btn = $(this);
                    var id = btn.attr("data-id");
                    $.confirm({
                        title: '{{__('lesson.confirm')}}!',
                        content: '{{__('lesson.confirmMessage')}}',
                        buttons: {
                            '{{__('lesson.confirm')}}': function () {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "DELETE",
                                    url: "/admin/lessons/" + id,
                                    dataType: "json",
                                    success: function (data) {
                                        btn.parent().parent().hide();
                                        $.alert(data.success);
                                    },
                                    error: function (data) {
                                        $.alert(data.error);
                                    }
                                });
                            },
                            '{{__('lesson.cancel')}}': function () {

                            }
                        }
                    });
                });

                $('#usersTable').on("click", '.btn-delete', function () {
                    var btn = $(this);
                    var id = btn.attr("data-id");
                    $.confirm({
                        title: '{{__('lesson.confirm')}}!',
                        content: '{{__('lesson.confirmMessage')}}',
                        buttons: {
                            '{{__('lesson.confirm')}}': function () {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "DELETE",
                                    url: "/admin/users/" + id,
                                    dataType: "json",
                                    success: function (data) {
                                        table.ajax.reload();
                                        $.alert(data.success);
                                    },
                                    error: function (data) {
                                        $.alert(data.error);
                                    }
                                });
                            },
                            '{{__('lesson.cancel')}}': function () {

                            }
                        }
                    });
                });
            </script>
@endsection
