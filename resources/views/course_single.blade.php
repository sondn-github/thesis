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
                        <a href="{{route('display-lesson', $course->lesson[0]->id)}}" class="btn btn-primary rounded-0 btn-lg px-5">{{__('course.getStarted')}}</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
