@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{__('layouts/header.fact')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('layouts/header.fact')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <form action="{{route('admin.users.store')}}" method="post">
                    {{--                <form action="{{route('admin.lesson.store')}}" method="post" class="needs-validation" novalidate>--}}
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="col-md-8 mb-3 form-group">
                            <label for="name" class="required">{{__('user.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{__('user.enterName')}}" value="{{old('name')}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="role" class="required">{{__('user.role')}}</label>
                            <select class="form-control" id="role" name="role_id">
                                <option>--Chọn--</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(old('role_id') == $role->id) selected @endif>{{$role->display_name}}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">{{__('user.email')}}</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="password" class="required">{{__('user.password')}}</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="required">{{__('user.password_confirmation')}}</label>
                        <input type="password" class="form-control" name="password_confirmation" value="">
                    </div>
                    <div class="form-group">
                        <label for="specialty">{{__('user.specialty')}}</label>
                        <input type="text" class="form-control" name="specialty" value="{{old('specialty')}}">
                    </div>
                    <div class="form-group">
                        <label for="level">{{__('user.level')}}</label>
                        <input type="text" class="form-control" name="level" value="{{old('level')}}">
                    </div>
                    <div class="form-group">
                        <label for="reliability" class="required">{{__('user.reliability')}}</label>
                        <input type="text" class="form-control" name="reliability" value="{{old('reliability')}}">
                    </div>
                    <button id="createBtn" class="btn btn-primary" type="submit">{{__('user.create')}}</button>
                    <a href="{{route('admin.users.index')}}" class="btn btn-danger">{{__('user.back')}}</a>
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
            </script>
@endsection
