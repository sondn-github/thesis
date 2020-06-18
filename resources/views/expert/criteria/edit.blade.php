@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.edit')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{route('expert.home')}}">{{__('layouts/header.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('expert.criteria.index')}}">{{__('layouts/header.criteriaManagement')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('layouts/header.edit')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('expert.criteria.update', $criteria->id)}}" method="post"
                      enctype="multipart/form-data">
                    {{--                <form action="{{route('teacher.criteria.store')}}" method="post" class="needs-validation" novalidate>--}}
                    {{csrf_field()}}
                    @method('PUT')
                    {{--                <div class="form-row">--}}
                    {{--                    <div class="col-md-8 mb-3 form-group">--}}
                    {{--                        <label for="name">{{__('criteria.name')}}</label>--}}
                    {{--                        <input type="text" class="form-control" id="name" name="name" placeholder="{{__('criteria.enterName')}}" value="{{$criteria->name}}">--}}
                    {{--                        <div class="valid-feedback">--}}
                    {{--                            Looks good!--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 mb-3">--}}
                    {{--                        <label for="course">{{__('criteria.course')}}</label>--}}
                    {{--                        <select class="form-control" id="course" name="course_id">--}}
                    {{--                            @foreach($courses as $course)--}}
                    {{--                                <option value="{{$course->id}}" @if($criteria->course_id == $course->id) selected @endif>{{$course->name}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                        <div class="valid-feedback">--}}
                    {{--                            Looks good!--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    <div class="form-group">
                        <label for="code" class="required">{{__('criteria.code')}}</label>
                        <input type="text" class="form-control" id="code" name="code"
                               placeholder="{{__('criteria.enterCode')}}" value="{{$criteria->code}}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">{{__('criteria.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="{{__('criteria.enterName')}}" value="{{$criteria->name}}">
                    </div>
                    <div class="form-group">
                        <label for="type" class="required">{{__('criteria.type')}}</label>
                        <select name="type_id" id="type_id" class="form-control">
                            <option>--Chọn--</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}"
                                        @if($criteria->type_id == $type->id) selected @endif>{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('criteria.description')}}</label>
                        <textarea name="description" id="description" rows="5" class="form-control"
                                  placeholder="{{__('criteria.enterDescription')}}">{{$criteria->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="explain">{{__('criteria.explain')}}</label>
                        <textarea name="explain" id="explain" rows="5" class="form-control"
                                  placeholder="{{__('criteria.enterExplain')}}">{{$criteria->explain}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="example">{{__('criteria.example')}}</label>
                        <textarea name="example" id="example" rows="5" class="form-control"
                                  placeholder="{{__('criteria.enterExample')}}">{{$criteria->example}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="weight" class="required">{{__('criteria.weight')}}</label>
                        <input type="text" class="form-control" id="weight" name="weight"
                               placeholder="{{__('criteria.enterWeight')}}" value="{{$criteria->weight}}">
                    </div>
                    <button id="createBtn" class="btn btn-primary" type="submit">{{__('criteria.update')}}</button>
                    <a href="{{route('expert.criteria.index')}}" class="btn btn-secondary">{{__('criteria.back')}}</a>
                </form>
            </div>
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
    </script>
@endsection
