@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{__('layouts/header.lesson')}}</h2>
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.lesson')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <form action="{{route('lessons')}}" method="get">
                        <div class="input-group">
{{--                            <label for="search">Tìm kiếm:</label>--}}
                            <input type="text" class="form-control mr-2" name="search" value="{{ old('search') }}" placeholder="{{__('lesson.search')}}">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    {{__('lesson.search')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @if(count($lessons) > 0)
                    @foreach($lessons as $lesson)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="course-1-item">
                                <figure class="thumnail">
                                    <a href="{{route('lesson-single', $lesson->id)}}"><img src="{{asset($lesson->thumbnail)}}" alt="Image" class="img-fluid"></a>
    {{--                                <div class="price">$99.00</div>--}}
                                    <div class="category"><h3>{{$lesson->course->name}}</h3></div>
                                </figure>
                                <div class="course-1-content pb-4">
                                    <h2>{{$lesson->name}}</h2>
                                    <div class="rating text-center mb-3">
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                    </div>
                                    <p class="desc mb-4"  style="max-height: 100px; overflow: auto">{{$lesson->abstract}}</p>
                                    <p><a href="{{route('lesson-single', $lesson->id)}}" class="btn btn-primary rounded-0 px-4">Xem chi tiết</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6 mb-4">{{__('lesson.no-data')}}</div>
                @endif
            </div>
            <div class="mx-auto">{{$lessons->links()}}</div>
        </div>
    </div>
@endsection
