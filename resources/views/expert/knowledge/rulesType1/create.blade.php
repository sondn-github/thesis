@extends('layouts.default')

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
            <form action="{{route('expert.knowledge.store')}}" class="form-horizontal" role="form" method="post">
                @csrf
                <div class="panel-group">
                    <div class="panel panel-warning mb-3">
                        <div class="panel-heading required" >{{__('knowledge.code')}}</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}" placeholder="{{__('knowledge.enterCode')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info mb-3">
                        <div class="panel-heading required">{{__('knowledge.premise')}}</div>
                        <div class="panel-body">
                            <div id="premise-form-group">
                                <div class="premise-form">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <select class="form-control" id="criteria" name="criteria[]" required>
                                                <option>{{__('knowledge.select')}}</option>
                                                @foreach($criteria as $c)
                                                    <option value="{{$c->code}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" id="operator" name="operators[]" required>
                                                <option>{{__('knowledge.select')}}</option>
                                                <option value="0">>=</option>
                                                <option value="1"><=</option>
                                                <option value="2">></option>
                                                <option value="3"><</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="score"
                                                   placeholder="{{__("knowledge.enterScore")}}" name="scores[]" required>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-delete"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <p>AND</p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="add-premise-btn"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="panel panel-success mb-3">
                        <div class="panel-heading required">Kết luận</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" id="conclusion" name="conclusion" required>
                                        <option>{{__('knowledge.select')}}</option>
                                        @foreach($facts as $fact)
                                            <option value="{{$fact->code}}">{{$fact->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="reliability"
                                           placeholder="{{__('knowledge.enterScore')}}" name="reliability" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading required">Trạng thái</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="1">{{__('knowledge.active')}}</option>
                                        <option value="0">{{__('knowledge.inactive')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{__('knowledge.create')}}</button>
                <a href="{{route('expert.knowledge.index')}}" class="btn btn-secondary">{{__('knowledge.back')}}</a>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function showAlert(message, header, status) {
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
            this.showAlert("{{session('success')}}", "Thành công", "success");
        @elseif (session()->get('errors'))
            this.showAlert("{{ session()->get('errors')->first() }}", "Lỗi", "error");
        @endif

        $("#createBtn").click(function () {
            $(this).prop('disable', true);
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                '  Loading...');
        });

        $('#add-premise-btn').click(function () {
            var formGroup = '<div class="premise-form">' + $('#premise-form-group .premise-form').html() + '</div>';
            $('#premise-form-group').append(formGroup);
        })

        $('#premise-form-group').on('click', '.btn-delete', function () {
            $(this).parent().parent().remove();
        })
    </script>
@endsection
