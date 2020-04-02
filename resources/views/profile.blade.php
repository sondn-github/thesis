@extends('layouts.default')

@section('content')
    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.profile')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row my-2">
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" id="profile-nav" data-target="#profile" data-toggle="tab"
                               class="nav-link active">{{__('profile.info')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#edit" id="edit-nav" data-toggle="tab" class="nav-link">{{__('profile.editProfile')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#change-password" id="change-password-nav" data-toggle="tab"
                               class="nav-link">{{__('profile.changePassword')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">
                            <h5 class="mb-3">Họ tên: {{$user->name}}</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>{{__('profile.email')}}:</h6>
                                    <p>
                                        {{$user->email}}
                                    </p>
                                    <h6>{{__('profile.specialty')}}:</h6>
                                    <p>
                                        {{$user->specialty}}
                                    </p>
                                    <h6>{{__('profile.level')}}:</h6>
                                    <p>
                                        {{$user->level}}
                                    </p>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="edit">
                            <form action="{{route('profile.update')}}" role="form" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.name')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{$user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.email')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="{{$user->email}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.specialty')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{$user->specialty}}"
                                               name="specialty">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.level')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="{{$user->level}}" name="level">
                                        {{--                                        <select class="form-control" id="level" name="level">--}}
                                        {{--                                            <option>--Trống--</option>--}}
                                        {{--                                            <option value="Sinh viên" @if($user->level == "Sinh viên") selected @endif>Sinh viên</option>--}}
                                        {{--                                            <option value="Giảng viên" @if($user->level == "Giảng viên") selected @endif>Giảng viên</option>--}}
                                        {{--                                            <option value="Thạc sĩ" @if($user->level == "Thạc sĩ") selected @endif>Thạc sĩ</option>--}}
                                        {{--                                            <option value="Tiến sĩ" @if($user->level == "Tiến sĩ") selected @endif>Tiến sĩ</option>--}}
                                        {{--                                            <option value="Phó giáo sư" @if($user->level == "Phó giáo sư") selected @endif>Phó giáo sư</option>--}}
                                        {{--                                            <option value="Giáo sư" @if($user->level == "Giáo sư") selected @endif>Giáo sư</option>--}}
                                        {{--                                        </select>--}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="submit" class="btn btn-primary" value="{{__('profile.updateButton')}}">
                                        <input type="reset" class="btn btn-secondary" value="{{__('profile.cancelButton')}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="change-password">
                            <form action="{{route('profile.change-password')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.oldPassword')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="oldPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.newPassword')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="newPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">{{__('profile.confirmationPassword')}}</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="confirmationPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="submit" class="btn btn-primary" value="{{__('profile.updateButton')}}">
                                        <input type="reset" class="btn btn-secondary" value="{{__('profile.cancelButton')}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 text-center">
                    <img src="{{asset($user->avatar)}}" id="avatarImg" style="max-width: 150px;max-height: 150px" class="mx-auto img-fluid img-circle d-block"
                         alt="avatar">
                    <form action="{{route('profile.change-avatar')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label class="btn btn-light mt-3 p-1" for="my-file-selector" id="avatar-selector">
                            <input id="my-file-selector" type="file" style="display:none"
                                   onchange="uploadAvatar()" name="avatar"><img
                                src="{{asset('images/baseline_folder_open_black_18dp.png')}}" alt="folder">
                        </label>
                        <button type="submit" id="avatar-sb-btn" class="btn btn-light display-none mt-2 p-1"><img
                                src="{{asset('images/baseline_publish_black_18dp.png')}}" alt="upload"></button>
                    </form>
                    <p class='label label-info' id="upload-file-info"></p>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log("hee");
                reader.onload = function (e) {
                    $('#avatarImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        function uploadAvatar() {
            $('#upload-file-info').html($('#my-file-selector').val().split('\\').pop());
            $('#avatar-sb-btn').css("display", "inline-block");
        }

        $("#my-file-selector").change(function() {
            readURL(this);
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

        $("#avatar-sb-btn").click(function () {
            $(this).prop('disable', true);
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                '  <span class="sr-only">Loading...</span>');
        });
    </script>
@endsection
