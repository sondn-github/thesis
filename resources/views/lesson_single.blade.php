@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
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
                <div class="col-md-6 mb-4">
                    <p>
                        <img src="{{$lesson->thumbnail}}" alt="Image" class="img-fluid">
                    </p>
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>Lesson Details</span>
                    </h2>

                    <p><strong class="text-black d-block">Teacher:</strong> {{$lesson->user->name}}</p>
                    <p class="mb-5"><strong class="text-black d-block">Hours:</strong> 8:00 am &mdash; 9:30am</p>
                    <p>{{$lesson->description}}</p>
{{--                    <p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p>--}}

{{--                    <ul class="ul-check primary list-unstyled mb-5">--}}
{{--                        <li>Lorem ipsum dolor sit amet consectetur</li>--}}
{{--                        <li>consectetur adipisicing  </li>--}}
{{--                        <li>Sit dolor repellat esse</li>--}}
{{--                        <li>Necessitatibus</li>--}}
{{--                        <li>Sed necessitatibus itaque </li>--}}
{{--                    </ul>--}}

                    <p>
                        <a href="{{route('display-lesson', $lesson->id)}}" class="btn btn-primary rounded-0 btn-lg px-5">View</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
