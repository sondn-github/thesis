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
                        <iframe class="embed-responsive-item" src="{{asset($lesson->file)}}" allowfullscreen webkitallowfullscreen>
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
                            <p>{{$teacher->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2text-right">

                </div>
            </div>
        </div>
    </div>
@endsection


