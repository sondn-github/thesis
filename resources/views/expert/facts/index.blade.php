@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.factManagement')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('expert.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.factManagement')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <a href="{{route('expert.facts.create')}}" class="btn btn-primary mb-3">{{__('fact.new')}}</a>
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover" id="factTable">
                        <thead>
                        <tr>
                            <th width="3%">{{__('fact.no')}}</th>
                            <th>{{__('fact.code')}}</th>
                            <th>{{__('fact.description')}}</th>
                            <th>{{__('fact.type')}}</th>
                            <th>{{__('fact.status')}}</th>
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
@endsection

@section('js')
    <script>
        // $(document).ready(function() {
        var table = $('#factTable').DataTable({
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
                url: '{{route('expert.datatables.facts')}}',
            },
            columns: [
                {
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'code'},
                {data: 'description'},
                {data: 'type'},
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
                        return '<a href="/expert/facts/' + row.id + '/edit " class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>';
                    }
                },
            ],

        });

        $('#factTable').on("click", ':checkbox', function () {
            var status = this;
            var id = $(status).attr("data-id");
            var value = $(status).prop("checked");
            $.confirm({
                title: '{{__('fact.confirm')}}!',
                content: '{{__('fact.confirmMessage')}}',
                buttons: {
                    '{{__('fact.confirm')}}': function () {
                        $.ajax({
                            type: "GET",
                            url: '{{route('expert.facts.changing-status')}}',
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
                    '{{__('fact.cancel')}}': function () {
                        $(status).prop("checked", !value);
                    }
                }
            });
        });
    </script>
@endsection
