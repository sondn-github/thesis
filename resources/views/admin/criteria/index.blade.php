@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.criteria')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.criteria')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{route('admin.criteria.changing-type')}}" method="get">
                            <div class="form-group">
                                <label for="type_id">{{__('criteria.usingCriteria')}}:</label>
                                <select name="id" id="type_id" class="form-control">
{{--                                    @foreach($types as $type)--}}
{{--                                        <option value="{{$type->id}}" @if($type->is_using) selected @endif>{{$type->name}}</option>--}}
{{--                                    @endforeach--}}
                                    <option value="1" @if($type->is_using) selected @endif>Bộ tiêu chí ICT NewHourse</option>
                                    <option value="2" @if(!$type->is_using) selected @endif>Bộ tiêu chí ĐHBKHN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_pfr" id="inlineRadio1" value="1" @if($type->is_pfr) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Đánh giá theo kiểu PFR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_pfr" id="inlineRadio2" value="0" @if(!$type->is_pfr) checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Đánh giá theo kiểu truyền thống</label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">{{__('criteria.apply')}}</button>
                        </form>
                    </div>
                </div>
                <a href="{{route('admin.criteria.create')}}" class="btn btn-primary mb-3">{{__('criteria.new')}}</a>
                <div class="table-responsive small">
                    <table class="table table-bordered table-hover" id="criteriaTable">
                        <thead>
                        <tr>
                            <th>{{__('criteria.no')}}</th>
                            <th>{{__('criteria.name')}}</th>
                            <th>{{__('criteria.weight')}}</th>
                            <th>{{__('criteria.type')}}</th>
                            <th>{{__('criteria.status')}}</th>
                            <th width="10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

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
                url: '{{route('admin.datatables.criteria')}}',
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name'},
                {data: 'weight'},
                {data: 'type.name'},
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
                            url: '{{route('admin.criteria.changing-status')}}',
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

        function showAlert(message, header,status) {
            toastr[status](message, header);
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }

        @if (session('success'))
            this.showAlert("{{session('success')}}", "Thành công","success");
        @elseif (session()->get('errors'))
            this.showAlert("{{ session()->get('errors')->first() }}", "Lỗi", "error");
        @endif
    </script>
@endsection
