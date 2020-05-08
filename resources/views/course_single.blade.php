@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{$course->name}}</h2>
{{--                    <p>{{$course->abstract}}</p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{route('courses.index')}}">{{__('layouts/header.course')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{$course->name}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-4">
                    <p>
                        <img src="{{asset($course->thumbnail)}}" alt="Image" class="img-fluid">
                    </p>
                    <p>
                        <strong class="text-black d-block">{{__('course.lessonList')}}:</strong>
                    </p>
                    <ul>
                        @foreach($course->lesson as $lesson)
                            <li class="mb-2"><a href="{{route('display-lesson', $lesson->id)}}">{{$lesson->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>{{__('course.courseDetail')}}</span>
                    </h2>

                    <p><strong class="text-black d-block">{{__('course.teacher')}}:</strong> {{$course->user->name}}</p>
                    <p><strong class="text-black d-block">{{__('course.category')}}:</strong> {{$course->category->name}}</p>
                    <p><strong class="text-black d-block">{{__('course.numberLessons')}}:</strong> {{count($course->lesson)}}</p>
                    <p><strong class="text-black d-block">{{__('course.description')}}:</strong>{{$course->description}}</p>
{{--                    <p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p>--}}

{{--                    <ul class="ul-check primary list-unstyled mb-5">--}}
{{--                        <li>Lorem ipsum dolor sit amet consectetur</li>--}}
{{--                        <li>consectetur adipisicing  </li>--}}
{{--                        <li>Sit dolor repellat esse</li>--}}
{{--                        <li>Necessitatibus</li>--}}
{{--                        <li>Sed necessitatibus itaque </li>--}}
{{--                    </ul>--}}

                    <p>
                        <a href="@if(isset($course->lesson[0]->id)) {{route('display-lesson', $course->lesson[0]->id)}} @else # @endif" class="btn btn-primary rounded-0 btn-lg px-5">{{__('course.getStarted')}}</a>
                        <button type="button" id="evaluationBtn" class="btn btn-info rounded-0 btn-lg px-5 ml-1"  @if($isEvaluated) disabled data-toggle="tooltip" data-placement="top"
                                title="{{__('lesson.evaluated-message')}}"@else data-toggle="modal"
                                data-target="#myModal" @endif>
                            <span class="icon-poll mr-2"></span>{{__('lesson.vote')}}<span
                                class="ml-1 badge badge-light" id="numberEvaluation">{{$numberEvaluation}}</span>
                        </button>
                    </p>

                </div>
                <!-- Modal -->
                <div class="modal fade small" id="myModal" role="dialog">
                    <div class="modal-dialog mw-75">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{$criteria[0]->type->name}}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="{{route('evaluation-store')}}" method="post" id="evaluation-form">
                                {{csrf_field()}}
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <input type="hidden" name="type" value="@if($optionIsPFR) 1 @else 2 @endif">
                                <input type="hidden" name="criteria_type" value="{{$criteria[0]->type_id}}">
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
                                                        @if ($c->description)
                                                            <div class="row">
                                                                <div class="col-md-3">Mô tả</div>
                                                                <div class="col-md-9">{{$c->description}}</div>
                                                            </div>
                                                        @endif
                                                        @if($c->explain)
                                                            <div class="row">
                                                                <div class="col-md-3">Giải thích</div>
                                                                <div class="col-md-9">{{$c->explain}}</div>
                                                            </div>
                                                        @endif
                                                        @if($c->example)
                                                            <div class="row">
                                                                <div class="col-md-3">Ví dụ</div>
                                                                <div class="col-md-9">{{$c->example}}</div>
                                                            </div>
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-md-3">Chọn đáp án:</div>
                                                            @if($optionIsPFR)
                                                                <div class="col-md-9">
                                                                    <br>
                                                                    <div class="radio">
                                                                        {{--                                                                    <label><input type="radio" class="mr-2" value="5" name="{{$c->id}}" required>Rất đồng ý</label>--}}
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="4" name="answers[{{$c->code}}]" required>Đồng ý</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="3" name="answers[{{$c->code}}]" required>Trung lập</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="2" name="answers[{{$c->code}}]" required>Không đồng ý</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="1" name="answers[{{$c->code}}]" required>Từ chối trả lời</label>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-md-9">
                                                                    <br>
                                                                    <div class="radio">
                                                                        {{--                                                                    <label><input type="radio" class="mr-2" value="5" name="{{$c->code}}" required>Rất đồng ý</label>--}}
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="6" name="answers[{{$c->code}}]" required>Rất đồng ý</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="4" name="answers[{{$c->code}}]" required>Đồng ý</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="5" name="answers[{{$c->code}}]" required>Cơ bản đồng ý</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="2" name="answers[{{$c->code}}]" required>Không đồng ý</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" class="mr-2" value="7" name="answers[{{$c->code}}]" required>Rất không đồng ý</label>
                                                                    </div>
                                                                </div>
                                                            @endif
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
                                    <button type="button" onclick="submitForm()" class="btn btn-primary"
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

        function submitForm() {
            var dataForm = $('#evaluation-form').serializeArray();
            const regex = new RegExp('[answers\[C1-9\]]');
            const matchedData = dataForm.filter(({name}) => name.match(regex));
            var criterionCodes = [];
            @foreach($criteria as $criterion)
                criterionCodes.push('answers[' + '{{$criterion->code}}' + ']');
            @endforeach

            if (matchedData.length == criterionCodes.length) {
                $('#evaluation-form').submit();
            } else {
                $.each(criterionCodes, function (index, value) {
                    if (!matchedData.find(element => element.name == value)) {
                        const i = $('input[name="' + value + '"]').closest('.carousel-item').index();
                        $(".carousel").carousel(i);
                        showAlert({message: "Bạn chưa trả lời đủ câu hỏi."}, "error");
                        return false; //break foreach
                    }
                })
            }
        }

        $('#evaluation-form').submit(function (e) {
            e.preventDefault(true); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    handleResponse(data, "success");
                    var numberEvaluation = parseInt($('#numberEvaluation').html());
                    numberEvaluation += 1;
                    $('#numberEvaluation').html(numberEvaluation);
                    var btn = $('#evaluationBtn');
                    btn.attr('disabled', true);
                    btn.attr('data-toggle', 'tooltip');
                    btn.attr('data-placement', 'top');
                    btn.attr('title', "{{__('lesson.evaluated-message')}}");
                    btn.removeAttr('data-target');
                },
                error: function (data) {
                    handleResponse(data, "error");
                }
            });
        });


        // this is the id of the form


        $(".carousel").carousel(
            {interval: false}
        );

        let totalItems = $('.carousel-item').length;

        $(".carousel-control-next").click(function () {
            let currentIndex = $('div.active').index() + 1;
            if (currentIndex == 1) {
                $(".carousel-control-prev").css("display", "flex");
            }

            if (currentIndex == (totalItems - 1)) {
                $(".carousel-control-next").css("display", "none");
            }
        })

        $(".carousel-control-prev").click(function () {
            let currentIndex = $('div.active').index() + 1;
            if (currentIndex == 2) {
                $(".carousel-control-prev").css("display", "none");
            }

            if (currentIndex == totalItems) {
                $(".carousel-control-next").css("display", "flex");
            }
        })

        $("input").click(function() {

            // if (this.checked) {
            //     carouselControlNext.css("display", "flex");
            // }
            let currentIndex = $('div.active').index() + 1;

            if (currentIndex == totalItems) {
                $("#evaluation").removeAttr('disabled');
                $(".carousel-control-next").css("display", "none");
            } else {
                $(".carousel-control-prev").css("display", "flex");
                $(".carousel-control-next").css("display", "flex");
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
