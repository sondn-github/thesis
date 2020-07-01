@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.courseManagement')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('teacher.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.courseManagement')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <a href="{{route('teacher.courses.create')}}" class="btn btn-primary mb-3">{{__('course.new')}}</a>
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover w-100" id="coursesTable">
                        <thead>
                        <tr>
                            <th width="3%">{{__('course.no')}}</th>
                            <th>{{__('course.name')}}</th>
                            <th>{{__('course.category')}}</th>
                            <th>{{__('course.numberLessons')}}</th>
                            <th>{{__('course.created_at')}}</th>
                            <th>{{__('Trạng thái')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="courseDetail" class="modal fade small" role="dialog">
            <div class="modal-dialog mw-75">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('course.detail')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('course.name')}}</div>
                            <div class="col-md-8" id="name"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('course.category')}}</div>
                            <div class="col-md-8" id="course-name"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('course.description')}}</div>
                            <div class="col-md-8" id="description"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('course.link')}}</div>
                            <div class="col-md-8" id="link"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('course.created_at')}}</div>
                            <div class="col-md-8" id="created-at"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('Trạng thái')}}</div>
                            <div class="col-md-8" id="status"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">{{__('course.lessonList')}}</div>
                            <div class="col-md-8"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <div class="table-responsive small w-75">
                                    <table class="table table-bordered table-hover" id="lessonsTable">
                                        <thead>
                                        <tr>
                                            <th>{{__('course.no')}}</th>
                                            <th>{{__('lesson.name')}}</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="lessonCloseBtn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="adviseModal" class="modal fade small" role="dialog">
            <div class="modal-dialog mw-75">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('lesson.advise')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="adviseBody">
                        <div class="row mb-3">
                            <div class="col-md-12 label" id="numberEvaluation"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 label" id="adviseLable">{{__('lesson.adviseFromSystem')}}</div>
                            <div class="col-md-9" id="advise-list"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="adviseCloseBtn">Close
                        </button>
                    </div>
                </div>
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
                url: '{{route('teacher.datatables.courses')}}',
            },
            columns: [
                {
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name'},
                {data: 'category.name'},
                {data: 'number_lessons'},
                {data: 'created_at'},
                {
                    data: 'status', "searchable": false,
                    render: function (data, type, row, meta) {
                        if (data == 1) {
                            return '<label class="switch small">'
                                + '<input type="checkbox" name="status" data-id="' + row.id + '" checked>'
                                + '<span class="slider round"></span>'
                                + '</label>';
                        } else {
                            return '<label class="switch small">'
                                + '<input type="checkbox" name="status" data-id="' + row.id + '">'
                                + '<span class="slider round"></span>'
                                + '</label>';
                        }
                    }
                },
                {
                    data: 'action', "searchable": false,
                    render: function (data, type, row, meta) {
                        return '<a href="/teacher/courses/' + row.id + '" class="btn btn-info btn-info-lesson" data-id="' + row.id + '" data-toggle="modal" data-target="#courseDetail" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>'
                            + '<a href="/teacher/courses/' + row.id + '/edit" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>'
                            + '<a href="#" class="btn btn-success margin-r-5" data-id="' + row.id + '" data-toggle="modal" data-target="#adviseModal" onclick="showAdviseModel(this)"><i class="fa fa-comment-dots"></i></a>'
                            + '<a href="/teacher/details/' + row.id + '" class="btn btn-primary margin-r-5"><i class="fas fa-chart-line"></i></a>'
                            + '<a href="javascript:void(0)" data-id="' + row.id + '" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
                    }
                },
            ],

        });

        function showInfoModal(btn) {
            var id = $(btn).attr("data-id");
            var url = $(btn).attr("href");
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    $("#name").html(data.name);
                    $("#course-name").html(data.category.name);
                    $("#description").html(data.description);
                    $("#link").html(data.link);
                    $("#created-at").html(data.created_at);
                    if (data.status == 1) {
                        $("#status").html('<p class="text-success">{{__("lesson.active")}}</p>');
                    } else {
                        $("#status").html('<p class="text-danger">{{__("lesson.deactive")}}</p>');
                    }
                    $.each(data.lesson, function (index, value) {
                        index = index + 1;
                        $('#courseDetail tbody').append('<tr><td>' + index + '</td><td>' + value.name + '</td><td><a href="javascript:void(0)" data-id="' + value.id + '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i></a><a href="/teacher/lessons/' + value.id + '/edit" class="btn btn-xs btn-warning ml-1"><i class="fa fa-edit"></i></a></td></tr>');
                    })
                },
                error: function (data) {

                }
            });
        }

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
                            url: "/teacher/lessons/" + id,
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

        $('#coursesTable').on("click", '.btn-delete', function () {
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
                            url: "/teacher/courses/" + id,
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

        $('#coursesTable').on("click", ':checkbox', function () {
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
                            url: '{{route('teacher.courses.status.change')}}',
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

        function showAdviseModel(btn) {
            var id = $(btn).attr("data-id");
            // var url = $(btn).attr("href");
            $.ajax({
                type: "GET",
                url: '{{route('teacher.courses.advises')}}',
                data: {
                    id: id
                },
                success: function (data) {
                    $('#numberEvaluation').html('Hiện tại khoá học nhận được <span class="text-primary">' + data.count + '</span> lượt đánh giá.');
                    var advises = '<ol>';
                    // var reliabilities = Object.keys(data.reliabilities).map(function(key) {
                    //     return [key => data.reliabilities[key]];
                    // });
                    var reliabilities = data.reliabilities;
                    $.each(data.advises, function (index, value) {
                        advises += '<li>' + value.description + ' (Độ chắc chắn: <span class="text-green">' + reliabilities[value.code] * 100 + '%</span>)' + '</li>';
                    });

                    advises += '</ol>';
                    $('#advise-list').html(advises);
                },
                error: function (data) {
                    $('#numberEvaluation').html(data.responseJSON);
                    $('#adviseLable').hide();
                }
            });
        }

        $('#adviseCloseBtn').click(function () {
            $('#adviseLable').show();
            $('#numberEvaluation').html('');
            $('#advise-list').html('');
        })

        $('#lessonCloseBtn').click(function () {
            $('#lessonsTable tbody').html('');
        })
    </script>
@endsection
