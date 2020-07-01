@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.lesson')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.lesson')}}</li>
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
                    <table class="table table-bordered table-hover" id="lessonsTable">
                        <thead>
                        <tr>
                            <th>{{__('lesson.no')}}</th>
                            <th>{{__('lesson.name')}}</th>
                            <th>{{__('lesson.course')}}</th>
                            <th>{{__('lesson.view')}}</th>
                            <th>{{__('lesson.created_at')}}</th>
                            <th>{{__('lesson.status')}}</th>
                            <th width="14%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div id="detailLesson" class="modal fade small" role="dialog">
                    <div class="modal-dialog mw-75">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{__('lesson.lessonDetail')}}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.name')}}</div>
                                    <div class="col-md-8" id="name"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.course')}}</div>
                                    <div class="col-md-8" id="course-name"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.abstract')}}</div>
                                    <div class="col-md-8" id="abstract"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.description')}}</div>
                                    <div class="col-md-8" id="description"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.view')}}</div>
                                    <div class="col-md-8" id="view"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.created_at')}}</div>
                                    <div class="col-md-8" id="created-at"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 label">{{__('lesson.status')}}</div>
                                    <div class="col-md-8" id="status"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('js')
            <script>
                // $(document).ready(function() {
                var table = $('#lessonsTable').DataTable({
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
                    ajax: {
                        url: '{{route('admin.datatables.lessons')}}',
                    },
                    columns: [
                        {
                            data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'name'},
                        {data: 'course.name'},
                        {data: 'view'},
                        {data: 'created_at'},
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
                                return '<a href="/admin/lessons/' + row.id + '" class="btn btn-info btn-info-lesson" data-id="' + row.id + '" data-toggle="modal" data-target="#detailLesson" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>'
                                    + '<a href="/admin/lessons/' + row.id + '/edit" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>'
                                    + '<a href="javascript:void(0)" data-id="' + row.id + '" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
                            }
                        },
                    ]
                });

                // });
                function showInfoModal(btn) {
                    var id = $(btn).attr("data-id");
                    var url = $(btn).attr("href");
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $("#name").html(data.name);
                            $("#course-name").html(data.course.name);
                            $("#abstract").html(data.abstract);
                            $("#description").html(data.description);
                            $("#view").html(data.view);
                            $("#created-at").html(data.created_at);
                            if (data.status == 1) {
                                $("#status").html('<p class="text-success">{{__("lesson.active")}}</p>');
                            } else {
                                $("#status").html('<p class="text-danger">{{__("lesson.deactive")}}</p>');
                            }
                        },
                        error: function (data) {

                        }
                    });
                }

                $('#lessonsTable').on("click", ':checkbox', function () {
                    var status = this;
                    var id = $(status).attr("data-id");
                    var value = $(status).prop("checked");
                    $.confirm({
                        title: '{{__('lesson.confirm')}}!',
                        content: '{{__('lesson.confirmMessage')}}',
                        buttons: {
                            '{{__('lesson.confirm')}}': function () {
                                $.ajax({
                                    type: "GET",
                                    url: '{{route('admin.lessons.status.change')}}',
                                    dataType: "json",
                                    data: {
                                        id: id,
                                        status: value ? 1 : 0
                                    },
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
                                $(status).prop("checked", !value);
                            }
                        }
                    });
                });

                $('#lessonsTable').on("click", '.btn-delete', function () {
                    var id = $(this).attr("data-id");
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
