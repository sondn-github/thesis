@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.news')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.news')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-3">{{__('post.new')}}</a>
            <div class="table-responsive small">
                <table class="table table-bordered table-hover" id="postTable">
                    <thead>
                    <tr>
                        <th width="10%">{{__('post.no')}}</th>
                        <th>{{__('post.title')}}</th>
                        <th>{{__('post.view')}}</th>
                        <th>{{__('post.created_at')}}</th>
                        <th width="13%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Modal -->
        <div id="postDetail" class="modal fade small" role="dialog">
            <div class="modal-dialog mw-75">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('post.detail')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h3 id="title"></h3>
                        <p id="content"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        // $(document).ready(function() {
        var table = $('#postTable').DataTable({
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
                url: '{{route('admin.datatables.posts')}}',
            },
            columns: [
                {
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'title'},
                {data: 'view'},
                {data: 'created_at'},
                {data: 'action', "searchable": false,
                    render: function (data, type, row, meta) {
                        return '<a href="/admin/posts/' + row.id + '" class="btn btn-info btn-info-lesson" data-id="' + row.id + '" data-toggle="modal" data-target="#postDetail" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>'
                            + '<a href="/admin/posts/' + row.id + '/edit" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>'
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
                    $("#title").html(data.title);
                    $("#content").html(data.content);
                },
                error: function (data) {

                }
            });
        }

        $('#postTable').on("click", '.btn-delete', function () {
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
                            url: "/admin/posts/" + id,
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
