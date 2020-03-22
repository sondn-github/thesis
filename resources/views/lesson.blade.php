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
            <a href="{{route('index')}}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{route('lessons')}}">Lessons</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="#">{{$lesson->category->name}}</a>
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
                            class="dot mx-2"></span>{{$lesson->updated_at->diffForHumans()}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="media">
                        <div class="media-left media-top mr-2">
                            <img src="{{asset($lesson->user->avatar)}}" class="media-object rounded-circle" style="width:60px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><strong>{{$lesson->user->name}}</strong></h4>
                            <p>{{__('lesson.specialty')}}: {{$lesson->user->specialty}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2text-right">
                    <button type="button" class="btn btn-info px-4 py-2" data-toggle="modal" data-target="#myModal">
                        <span class="icon-poll mr-2"></span>{{__('lesson.vote')}}<span
                            class="ml-1 badge badge-light">9</span>
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog mw-100">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{__('lesson.vote')}}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="#" method="post">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <table class="table test-question-table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center">Từ chối trả lời</th>
                                            <th class="text-center">Rất không đồng ý</th>
                                            <th class="text-center">Không đồng ý</th>
                                            <th class="text-center">Trung lập</th>
                                            <th class="text-center">Đồng ý</th>
                                            <th class="text-center">Rất đồng ý</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($criteria as $key => $c)
                                            <tr>
                                                <td>{!! $key + 1 !!}</td>
                                                <td class="question-content text-justify">{{$c->description}}</td>
                                                <td class="text-center"><input type="radio" value="1" name="{{$c->id}}"
                                                                               required></td>
                                                <td class="text-center"><input type="radio" value="2" name="{{$c->id}}"
                                                                               required></td>
                                                <td class="text-center"><input type="radio" value="3" name="{{$c->id}}"
                                                                               required></td>
                                                <td class="text-center"><input type="radio" value="4" name="{{$c->id}}"
                                                                               required></td>
                                                <td class="text-center"><input type="radio" value="5" name="{{$c->id}}"
                                                                               required></td>
                                                <td class="text-center"><input type="radio" value="6" name="{{$c->id}}"
                                                                               required></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"
                                            data-dismiss="modal">{{__('lesson.vote')}}</button>
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
