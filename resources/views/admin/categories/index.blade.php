@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.categories')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.categories')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <a href="{{route('admin.categories.create')}}" class="btn btn-primary mb-3">{{__('category.new')}}</a>
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover" id="categoryTable">
                        <thead>
                        <tr>
                            <th width="10%">{{__('category.no')}}</th>
                            <th>{{__('category.name')}}</th>
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
        var table = $('#categoryTable').DataTable({
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
                url: '{{route('admin.datatables.categories')}}',
            },
            columns: [
                {
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name'},
                {data: 'action', "searchable": false,
                    render: function (data, type, row, meta) {
                        return '<a href="/admin/categories/' + row.id + '/edit " class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>'
                            + '<a href="javascript:void(0)" data-id="' + row.id + '" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
                    }
                },
            ],
        });

        $('#categoryTable').on("click", '.btn-delete', function () {
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
                            url: "/admin/categories/" + id,
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
