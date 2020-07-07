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
