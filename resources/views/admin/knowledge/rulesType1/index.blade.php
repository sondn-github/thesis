@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.ruleType1')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.ruleType1')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <a href="{{route('admin.rulesType1.create')}}" class="btn btn-primary mb-3">{{__('knowledge.new')}}</a>
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover" id="knowledgeTable">
                        <thead>
                        <tr>
                            <th>{{__('knowledge.no')}}</th>
                            <th>{{__('knowledge.code')}}</th>
                            <th>{{__('knowledge.premise')}}</th>
                            <th>{{__('knowledge.conclusion')}}</th>
                            <th>{{__('knowledge.reliability')}}</th>
                            <th>{{__('knowledge.type')}}</th>
                            <th>{{__('knowledge.status')}}</th>
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
                var table = $('#knowledgeTable').DataTable({
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
                        url: '{{route('admin.datatables.knowledge.rulesType1')}}',
                    },
                    columns: [
                        {
                            data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'code'},
                        {
                            data: 'premise',
                            render: function (data, type, row, meta) {
                                var premise = '';
                                // let premiseSource = data.join(',');
                                $.each(data, function (index, value) {
                                    let elements = value.split(',')
                                    if (index != 0) {
                                        premise += ' AND ';
                                    }
                                    premise += elements[0] + ' ' + elements[1] + ' ' + elements[2];
                                });

                                return premise;
                            }
                        },
                        {data: 'conclusion'},
                        {data: 'reliability'},
                        {data: 'type'},
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
                                return '<a href="/admin/rulesType1/' + row.id + '/edit " class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>';
                            }
                        },
                    ],
                });

                $('#knowledgeTable').on("click", ':checkbox', function () {
                    var status = this;
                    var id = $(status).attr("data-id");
                    var value = $(status).prop("checked");
                    $.confirm({
                        title: '{{__('knowledge.confirm')}}!',
                        content: '{{__('knowledge.confirmMessage')}}',
                        buttons: {
                            '{{__('knowledge.confirm')}}': function () {
                                $.ajax({
                                    type: "GET",
                                    url: '{{route('admin.ruleType1.changing-status')}}',
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
                            '{{__('knowledge.cancel')}}': function () {
                                $(status).prop("checked", !value);
                            }
                        }
                    });
                });
            </script>
@endsection
