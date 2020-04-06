@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
         style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{$lesson->name}}</h2>
                    <p>{{$lesson->abstract}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{route('lessons')}}">{{__('layouts/header.lesson')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="#">{{$lesson->course->name}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{$lesson->name}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 mb-4 overflow-auto">
                    <div class="embed-responsive embed-responsive-16by9 border border-dark rounded">
                        <iframe class="embed-responsive-item" src="{{asset($lesson->file)}}" allowfullscreen>
                            <p>{{__('lesson.not-support')}}</p>
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{$lesson->name}}</h3>
                </div>
                <div class="col-lg-12">
                    <p>{{$lesson->view}} {{__('lesson.view')}}<span
                            class="dot mx-2"></span>{{$lesson->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="media">
                        <div class="media-left media-top mr-2">
                            <img src="{{asset($teacher->avatar)}}" class="media-object rounded-circle"
                                 style="width:60px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><strong>{{$teacher->name}}</strong></h4>
                            <p>{{__('lesson.specialty')}}: {{$teacher->specialty}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2text-right">
                    <button type="button" id="evaluationBtn" class="btn btn-info px-4 py-2" data-toggle="modal" data-target="#myModal">
                        <span class="icon-poll mr-2"></span>{{__('lesson.vote')}}<span
                            class="ml-1 badge badge-light">9</span>
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade small" id="myModal" role="dialog">
                    <div class="modal-dialog mw-75">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{__('lesson.vote')}}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="{{route('evaluation-store')}}" method="post" id="evaluation-form">
                                {{csrf_field()}}
                                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                <div class="modal-body">
                                    {{--                                    <table class="table test-question-table">--}}
                                    {{--                                        <thead>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <th></th>--}}
                                    {{--                                            <th></th>--}}
                                    {{--                                            <th class="text-center">Từ chối trả lời</th>--}}
                                    {{--                                            <th class="text-center">Rất không đồng ý</th>--}}
                                    {{--                                            <th class="text-center">Không đồng ý</th>--}}
                                    {{--                                            <th class="text-center">Trung lập</th>--}}
                                    {{--                                            <th class="text-center">Đồng ý</th>--}}
                                    {{--                                            <th class="text-center">Rất đồng ý</th>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        </thead>--}}
                                    {{--                                        <tbody>--}}
                                    {{--                                        @foreach($criteria as $key => $c)--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td>{!! $key + 1 !!}</td>--}}
                                    {{--                                                <td class="question-content text-justify">{{$c->description}}</td>--}}
                                    {{--                                                <td class="text-center"><input type="radio" value="1" name="{{$c->id}}"--}}
                                    {{--                                                                               required></td>--}}
                                    {{--                                                <td class="text-center"><input type="radio" value="2" name="{{$c->id}}"--}}
                                    {{--                                                                               required></td>--}}
                                    {{--                                                <td class="text-center"><input type="radio" value="3" name="{{$c->id}}"--}}
                                    {{--                                                                               required></td>--}}
                                    {{--                                                <td class="text-center"><input type="radio" value="4" name="{{$c->id}}"--}}
                                    {{--                                                                               required></td>--}}
                                    {{--                                                <td class="text-center"><input type="radio" value="5" name="{{$c->id}}"--}}
                                    {{--                                                                               required></td>--}}
                                    {{--                                                <td class="text-center"><input type="radio" value="6" name="{{$c->id}}"--}}
                                    {{--                                                                               required></td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                        </tbody>--}}
                                    {{--                                    </table>--}}
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner mw-75">
                                            @foreach($criteria as $key => $c)
                                                <div class="carousel-item @if($key == 0) active @endif">
                                                    <div class="container w-75">
                                                        <div class="row">
                                                            <div class="col-md-3">Tiêu chí {{$key + 1}}</div>
                                                            <div class="col-md-9">{{$c->name}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Mô tả</div>
                                                            <div class="col-md-9">{{$c->description}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Giải thích</div>
                                                            <div class="col-md-9">{{$c->explain}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Ví dụ</div>
                                                            <div class="col-md-9">{{$c->example}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Chọn đáp án:</div>
                                                            <div class="col-md-9">
                                                                <br>
                                                                <div class="radio">
{{--                                                                    <label><input type="radio" class="mr-2" value="5" name="{{$c->id}}" required>Rất đồng ý</label>--}}
                                                                </div>
                                                                <div class="radio">
                                                                    <label><input type="radio" class="mr-2" value="4" name="{{$c->id}}" required>Đồng ý</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label><input type="radio" class="mr-2" value="3" name="{{$c->id}}" required>Trung lập</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label><input type="radio" class="mr-2" value="2" name="{{$c->id}}" required>Không đồng ý</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label><input type="radio" class="mr-2" value="1" name="{{$c->id}}" required>Từ chối trả lời</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev display-none" href="#carouselExampleControls" role="button"
                                           data-slide="prev">
                                            <img src="{{asset('images/baseline_arrow_back_ios_black_18dp.png')}}" alt="">
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                           data-slide="next">
                                            <img src="{{asset('images/baseline_arrow_forward_ios_black_18dp.png')}}" alt="">
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"
                                            id="evaluation" disabled>{{__('lesson.vote')}}</button>
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">{{__('lesson.cancel')}}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function showAlert(data, status) {
            toastr[status](data.message, data.status);
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

        function handleResponse(data, status) {
            $('#myModal').modal('toggle');
            this.showAlert(data, status);
        }

        // this is the id of the form
        $('#evaluation-form').submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    handleResponse(data, "success");
                },
                error: function (data) {
                    handleResponse(data, "error");
                }
            });
        });

        $(".carousel").carousel(
            {interval: false}
        );

        let totalItems = $('.carousel-item').length;

        $("input").click(function() {

            // if (this.checked) {
            //     carouselControlNext.css("display", "flex");
            // }
            let currentIndex = $('div.active').index() + 1;
            if (currentIndex === totalItems) {
                $("#evaluation").removeAttr('disabled');
                $(".carousel-control-next").css("display", "none");
            } else {
                $(".carousel-control-prev").css("display", "flex");
                $(".carousel").delay(50).queue(function() {
                    $(this).carousel("next");
                    $(this).dequeue();
                });
            }
            // $("input:not(:checked)").parent().removeClass("checked");
            // $("input:checked").parent().addClass("checked");
        });
    </script>
@endsection
