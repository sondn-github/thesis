@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
         style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{__('layouts/header.posts')}}</h2>
                    {{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.posts')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
{{--            <div class="row mb-5">--}}
{{--                <div class="col-md-4">--}}
{{--                    --}}{{--                    <form action="" method="get">--}}
{{--                    --}}{{--                        <div class="input-group">--}}
{{--                    --}}{{--                            --}}{{----}}{{--                            <label for="search">Tìm kiếm:</label>--}}
{{--                    --}}{{--                            <input type="text" class="form-control mr-2" name="search" value="{{ old('search') }}" placeholder="{{__('course.search')}}">--}}
{{--                    --}}{{--                            <div class="input-group-btn">--}}
{{--                    --}}{{--                                <button class="btn btn-primary" type="submit">--}}
{{--                    --}}{{--                                    {{__('course.search')}}--}}
{{--                    --}}{{--                                </button>--}}
{{--                    --}}{{--                            </div>--}}
{{--                    --}}{{--                        </div>--}}
{{--                    --}}{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="container">--}}
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="row mb-4">
                            <div class="col-3">
                                <img src="{{$post->thumbnail}}" alt="thumbnail"
                                     style="max-width: 200px; max-height: 130px;">
                            </div>
                            <div class="col-9">
                                <h4 class="title">
                                    <a href="{{route('posts.show', $post->id)}}">
                                        {{$post->title}}
                                    </a>
                                </h4>
                                <div class="mt-2">
                                    <span class="times"><i class="fa fa-user"></i> {{$post->user->name}}</span>
                                    <span class="times ml-3"><i class="fa fa-calendar"></i> {{$post->created_at->diffForHumans()}}</span>
                                    <span class="views ml-3"><i class="fa fa-eye"></i> {{$post->view}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6 mb-4">{{__('course.no-data')}}</div>
                @endif
{{--            </div>--}}
            <div class="mx-auto">{{$posts->links()}}</div>
        </div>
    </div>
@endsection
