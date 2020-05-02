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
            <form action="{{route('expert.rulesType2.update', $knowledge->id)}}" class="form-horizontal" role="form" method="post">
                @csrf
                @method('PUT')
                <div class="panel-group">
                    <div class="panel panel-warning mb-3">
                        <div class="panel-heading">{{__('knowledge.code')}}</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="code" name="code" value="{{$knowledge->code}}" placeholder="{{__('knowledge.enterCode')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info mb-3">
                        <div class="panel-heading">Tiền đề</div>
                        <div class="panel-body">
                            <div id="premise-form-group">
                                @foreach($knowledge->premise as $premise)
                                    @php
                                        $premise = explode(",", $premise);
                                    @endphp
                                    <div class="premise-form">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="fact" name="facts[]" required>
                                                    <option>{{__('knowledge.select')}}</option>
                                                    @foreach($factsTypeComment as $fact)
                                                        <option value="{{$fact->id}}" @if($premise[0] == $fact->id) selected @endif>{{$fact->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" id="scoreFrom"
                                                       placeholder="{{__("knowledge.enterScore")}}" name="scoresFrom[]" value="{{$premise[1]}}" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" id="score"
                                                       placeholder="{{__("knowledge.enterScore")}}" name="scoresTo[]" value="{{$premise[2]}}" required>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-delete"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <p>AND</p>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary" id="add-premise-btn"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="panel panel-success mb-3">
                        <div class="panel-heading">Kết luận</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" id="conclusion" name="conclusion" required>
                                        <option>{{__('knowledge.select')}}</option>
                                        @foreach($facts as $fact)
                                            <option value="{{$fact->id}}" @if($knowledge->conclusion == $fact->id) selected @endif>{{$fact->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="reliability"
                                           placeholder="{{__('knowledge.enterScore')}}" name="reliability" value="{{$knowledge->reliability}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Trạng thái</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="1" @if($knowledge->status) selected @endif>{{__('knowledge.active')}}</option>
                                        <option value="0" @if(!$knowledge->status) selected @endif>{{__('knowledge.inactive')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{__('knowledge.update')}}</button>
                <a href="{{route('expert.rulesType2.index')}}" class="btn btn-secondary">{{__('knowledge.back')}}</a>
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
