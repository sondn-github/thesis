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
            <form action="{{route('teacher.lesson.store')}}" method="post" enctype="multipart/form-data">
{{--                <form action="{{route('teacher.lesson.store')}}" method="post" class="needs-validation" novalidate>--}}
                {{csrf_field()}}
                <div class="form-row">
                    <div class="col-md-8 mb-3 form-group">
                        <label for="name">{{__('lesson.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{__('lesson.enterName')}}" value="{{old('name')}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="course">{{__('lesson.category')}}</label>
                        <select class="form-control" id="course" name="course_id">
                            <option>--Chọn--</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}" @if(old('course_id') == $course->id) selected @endif>{{$course->name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="abstract">{{__('lesson.abstract')}}</label>
                    <textarea name="abstract" id="abstract" rows="5" class="form-control" placeholder="{{__('lesson.enterAbstract')}}" value="{{old('abstract')}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">{{__('lesson.description')}}</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="{{__('lesson.enterDescription')}}" value="{{old('description')}}"></textarea>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="file">
                    <label id="fileLabel" class="custom-file-label" for="customFile">{{__('lesson.chooseFile')}}</label>
                </div>
                <button id="createBtn" class="btn btn-primary" type="submit">{{__('lesson.create')}}</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

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

        $("#createBtn").click(function () {
            $(this).prop('disable', true);
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                '  Loading...');
        });

        $("input[name='file']").on('change', function () {
            $("#fileLabel").html($("input[name='file']")[0].files[0].name);
        });
    </script>
@endsection
