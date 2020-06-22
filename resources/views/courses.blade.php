@extends('layouts.default')

@section('content')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0">{{__('layouts/header.course')}}</h2>
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{route('index')}}">{{__('layouts/header.home')}}</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">{{__('layouts/header.courses')}}</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="panel panel-default mx-auto">
                    <div class="panel-body">
                        {!! Form::open(['route' => 'courses.index', 'method' => 'get', 'class' => 'form-inline ml-2']) !!}
                            <div class="form-group mr-3">
                                {!! Form::label('category_id', 'Thể loại:', ['class' => 'control-label mr-2']) !!}
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">{{ __('--Chọn--') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
{{--                                {!! Form::select('category_id', $categories , old('category_id') , ['class' => 'form-control']) !!}--}}
                            </div>
                            <div class="form-group mr-3">
                                {!! Form::label('teacher_id', 'Giảng viên:', ['class' => 'control-label mr-2']) !!}
                                <select class="form-control" name="teacher_id" id="teacher_id">
                                    <option value="">{{ __('--Chọn--') }}</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if (old('teacher_id') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mr-3">
                                {!! Form::label('course_name', 'Tên khóa học:', ['class' => 'control-label, mr-2']) !!}
                                {!! Form::text('course_name', old('course_name'), ['class' => 'form-control', 'placeholder' => 'Nhập tên khóa học']) !!}
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mr-2" type="submit">{{__('course.search')}}</button>
                                <button class="btn btn-danger" type="reset" data-url="{{ route('courses.index') }}">{{__('Đặt lại')}}</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($courses) > 0)
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="course-1-item">
                                <figure class="thumnail">
                                    <a href="{{route('courses.show', $course->id)}}"><img src="{{asset($course->thumbnail)}}" alt="Image" class="img-fluid"></a>
                                    <div class="price">{{__('layouts/header.course')}}</div>
                                    <div class="category"><h3>{{$course->category->name}}</h3></div>
                                </figure>
                                <div class="course-1-content pb-4">
                                    <h2>{{$course->name}}</h2>
                                    <div class="rating text-center mb-3">
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                    </div>
                                    <p class="desc mb-4"  style="max-height: 100px; overflow: auto">{{$course->description}}</p>
                                    <p><a href="{{route('courses.show', $course->id)}}" class="btn btn-primary rounded-0 px-4">Xem chi tiết</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6 mb-4">{{__('course.no-data')}}</div>
                @endif
            </div>
            <div class="mx-auto">{{$courses->appends(\Request::except('page'))->links()}}</div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('button[type=reset]').click(function () {
            window.location.href = $(this).data('url');
        })
    </script>
@endsection
