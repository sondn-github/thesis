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
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.posts.index')}}">{{__('layouts/header.postManagement')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('layouts/header.edit')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <form action="{{route('admin.posts.update', $post->id)}}" method="post">
                    {{--                <form action="{{route('admin.lesson.store')}}" method="post" class="needs-validation" novalidate>--}}
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="required">{{__('post.title')}}</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="content" class="required">{{__('post.content')}}</label>
                        <textarea name="content" id="editor1" cols="30" rows="10">{{$post->content}}</textarea>
                    </div>
                    <button id="createBtn" class="btn btn-primary" type="submit">{{__('category.update')}}</button>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-danger">{{__('category.back')}}</a>
                </form>
            </div>
        </div>
        @endsection

        @section('js')
            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace( 'editor1', {
                    filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
                } );
            </script>
            <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
            <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
            @include('ckfinder::setup')
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

                $("#updateBtn").click(function () {
                    $(this).prop('disable', true);
                    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                        '  Loading...');
                });
            </script>
@endsection
