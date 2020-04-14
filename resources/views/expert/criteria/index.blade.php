@extends('layouts.default')

@section('css')
    <!-- Bootstrap CSS -->
@endsection

@section('content')
    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.uploadLesson')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <a href="{{route('expert.criteria.create')}}" class="btn btn-primary mb-3">{{__('criteria.new')}}</a>
            <div class="table-responsive small">
                <table class="table table-bordered table-hover" id="criteriaTable">
                    <thead>
                    <tr>
                        <th>{{__('criteria.no')}}</th>
                        <th>{{__('criteria.name')}}</th>
                        <th>{{__('criteria.weight')}}</th>
                        <th>{{__('criteria.status')}}</th>
                        <th width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="criteriaModal" class="modal fade small" role="dialog">
        <div class="modal-dialog mw-75">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('criteria.detail')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4 label">{{__('criteria.name')}}</div>
                        <div class="col-md-8" id="name"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 label">{{__('criteria.description')}}</div>
                        <div class="col-md-8" id="description"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 label">{{__('criteria.explain')}}</div>
                        <div class="col-md-8" id="explain"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 label">{{__('criteria.example')}}</div>
                        <div class="col-md-8" id="example"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 label">{{__('criteria.weight')}}</div>
                        <div class="col-md-8" id="weight"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 label">{{__('criteria.status')}}</div>
                        <div class="col-md-8" id="status"></div>
                    </div>
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
        var table = $('#criteriaTable').DataTable({
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
            order: [[ 1, 'asc' ]],
            ajax: {
                url: '{{route('expert.datatables.criteria')}}',
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name'},
                {data: 'weight'},
                {data: 'status', "searchable": false},
                {data: 'action', "searchable": false},

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
                    $("#description").html(data.description);
                    $("#explain").html(data.explain);
                    $("#example").html(data.example);
                    $("#weight").html(data.weight);
                    if (data.status == 1) {
                        $("#status").html('<p class="text-success">{{__("criteria.active")}}</p>');
                    } else {
                        $("#status").html('<p class="text-danger">{{__("criteria.deactive")}}</p>');
                    }
                },
                error: function (data) {

                }
            });
        }

        $('#criteriaTable').on("click", ':checkbox', function() {
            var status = this;
            var id = $(status).attr("data-id");
            var value = $(status).prop("checked");
            $.confirm({
                title: '{{__('criteria.confirm')}}!',
                content: '{{__('criteria.confirmMessage')}}',
                buttons: {
                    '{{__('criteria.confirm')}}': function () {
                        $.ajax({
                            type: "GET",
                            url: '{{route('expert.criteria.changing-status')}}',
                            dataType: "json",
                            data: {
                                id : id,
                                status : value? 1 : 0
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
                    '{{__('criteria.cancel')}}': function () {
                        $(status).prop("checked", !value);
                    }
                }
            });
        });
    </script>
@endsection
