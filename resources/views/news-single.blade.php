@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{$post->title}}</h2>
                    {{--                    <p>{{$course->abstract}}</p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="{{route('courses.index')}}">{{__('layouts/header.news')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{$post->title}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 mb-4">
                    {!! $post->content !!}
                </div>

            </div>
        </div>
    </div>
@endsection
