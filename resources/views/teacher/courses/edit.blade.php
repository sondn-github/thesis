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
                                <a href="{{route('teacher.home')}}">{{__('layouts/header.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('teacher.courses.index')}}">{{__('layouts/header.courseManagement')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('layouts/header.edit')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <form action="{{route('teacher.courses.update', $course->id)}}" method="post" id="course-form">
                    {{--                <form action="{{route('teacher.lesson.store')}}" method="post" class="needs-validation" novalidate>--}}
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-8 mb-3 form-group">
                            <label for="name" class="required">{{__('course.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{__('course.enterName')}}" value="{{$course->name}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="course" class="required">{{__('course.category')}}</label>
                            <input type="text" name="category_name" id="category_name" list="category-list" class="form-control" placeholder="Chọn thể loại..." value="{{ $course->category->name }}">
                            <datalist id="category-list">
                                @if (count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->name}}"></option>
                                    @endforeach
                                @endif
                            </datalist>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="required">{{__('course.description')}}</label>
                        <textarea name="description" id="description" rows="5" class="form-control"
                                  placeholder="{{__('course.enterDescription')}}">{{$course->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">{{__('course.link')}}</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{$course->link}}">
                    </div>
                    <button id="updateBtn" class="btn btn-primary" type="submit">{{__('course.update')}}</button>
                    <a href="{{route('teacher.courses.index')}}" class="btn btn-secondary">{{__('course.back')}}</a>
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

        $('#course-form').submit(function () {
            $('#updateBtn').prop('disable', true);
            $('#updateBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                '  Loading...');
        })
    </script>
@endsection
