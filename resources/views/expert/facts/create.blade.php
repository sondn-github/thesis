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
            <form action="{{route('expert.facts.store')}}" method="post">
                {{--                <form action="{{route('expert.lesson.store')}}" method="post" class="needs-validation" novalidate>--}}
                {{csrf_field()}}
                <div class="form-row">
                    <div class="col-md-8 mb-3 form-group">
                        <label for="code">{{__('fact.code')}}</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="{{__('fact.enterCode')}}" value="{{old('code')}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="type">{{__('fact.type')}}</label>
                        <select class="form-control" id="type" name="type">
                            <option>--Chọn--</option>
                            <option value="1" @if(old('type') == 1) selected @endif>{{__('fact.comment')}}</option>
                            <option value="2" @if(old('type') == 2) selected @endif>{{__('fact.advise')}}</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">{{__('fact.description')}}</label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="{{__('fact.enterDescription')}}">{{old('description')}}</textarea>
                </div>
                <button id="createBtn" class="btn btn-primary" type="submit">{{__('fact.create')}}</button>
                <a href="{{route('expert.facts.index')}}" class="btn btn-danger">{{__('fact.back')}}</a>
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
