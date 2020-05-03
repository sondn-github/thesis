@extends('layouts.default')

@section('content')
    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.uploadcriteria')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <form action="{{route('expert.criteria.store')}}" method="post">
                {{--                <form action="{{route('teacher.criteria.store')}}" method="post" class="needs-validation" novalidate>--}}
                {{csrf_field()}}
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
                    <label for="name">{{__('criteria.code')}}</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="{{__('criteria.enterCode')}}" value="{{old('code')}}">
                </div>
                <div class="form-group">
                    <label for="name">{{__('criteria.name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('criteria.enterName')}}" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="description">{{__('criteria.description')}}</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="{{__('criteria.enterDescription')}}">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="explain">{{__('criteria.explain')}}</label>
                    <textarea name="explain" id="explain" rows="5" class="form-control" placeholder="{{__('criteria.enterExplain')}}">{{old('explain')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="example">{{__('criteria.example')}}</label>
                    <textarea name="example" id="example" rows="5" class="form-control" placeholder="{{__('criteria.enterExample')}}">{{old('example')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="weight">{{__('criteria.weight')}}</label>
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="{{__('criteria.enterWeight')}}" value="{{old('weight')}}">
                </div>
                <button id="createBtn" class="btn btn-primary" type="submit">{{__('criteria.update')}}</button>
                <a href="{{route('expert.criteria.index')}}" class="btn btn-secondary">{{__('criteria.back')}}</a>
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
    </script>
@endsection
