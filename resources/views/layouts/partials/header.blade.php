<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<div class="py-2 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 d-none d-lg-block">
                <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> {{__('layouts/header.have-a-questions')}}</a>
                <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
                <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a>
            </div>
{{--            <div class="col-lg-2 text-right">--}}
{{--                <select name="language" id="language" class="form-control small">--}}
{{--                    @foreach($languages as $language)--}}
{{--                        <option value="{{$language}}" {{$language == $currLang? "selected" : ""}}>--}}
{{--                            {{strtoupper($language)}}--}}
{{--                        </option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="{{route('index')}}" class="d-block">
                    <img src="{{asset('images/logo.jpg')}}" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="mr-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active">
                            <a href="{{route('index')}}" class="nav-link text-left">{{__('layouts/header.home')}}</a>
                        </li>
                        <li class="has-children">
                            <a href="#" class="nav-link text-left">{{__('layouts/header.categories')}}</a>
                            <ul class="dropdown">
                                @foreach($categories as $category)
                                    <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
{{--                        <li>--}}
{{--                            <a href="admissions.html" class="nav-link text-left">Admissions</a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="{{route('courses.index')}}" class="nav-link text-left">{{__('layouts/header.courses')}}</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-left">{{__('layouts/header.contact')}}</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="ml-auto">
                <div class="container">
                    <div class="text-right">
                        @if(Auth::user())
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{route('profile.get')}}" class="dropdown-item">{{__('layouts/header.profile')}}</a>
                                        @if(Auth::user()->role->name == 'teacher')
                                            <a href="{{route('teacher.courses.index')}}" class="dropdown-item">{{__('layouts/header.courseManagement')}}</a>
                                            <a href="{{route('teacher.lesson.index')}}" class="dropdown-item">{{__('layouts/header.lessonManagement')}}</a>
                                        @endif
                                        @if(Auth::user()->role->name == 'expert')
                                            <a href="{{route('expert.criteria.index')}}" class="dropdown-item">{{__('layouts/header.criteriaManagement')}}</a>
                                            <a href="" class="dropdown-item">{{__('layouts/header.factManagement')}}</a>
                                            <a href="" class="dropdown-item">{{__('layouts/header.ruleManagement')}}</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{__('layouts/header.logout')}}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @else
                            <a href="{{route('login')}}" class="small mr-3"><span class="icon-unlock-alt"></span> {{__('layouts/header.login')}}</a>
                            <a href="{{route('register')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span
                                    class="icon-users"></span> {{__('layouts/header.register')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
