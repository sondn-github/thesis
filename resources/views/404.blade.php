@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{__('layouts/header.login')}}</h2>
                    {{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.login')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="alert alert-danger">Tài khoản của bạn đã bị khóa!!!</div>
        </div>
    </div>
@endsection
