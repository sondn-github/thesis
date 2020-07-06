<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                {{__('layouts/header.logout')}}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route(Auth::user()->role->name . '.home')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{__('layouts/header.pageManagement')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if (Auth::user()->role->name === 'admin')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">{{__('layouts/header.managementKnowledge')}}</li>
                    <li class="nav-item">
                        <a href="{{route('admin.criteria.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                {{__('layouts/header.criteriaManagement')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.facts.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-week"></i>
                            <p>
                                {{__('layouts/header.factManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{__('layouts/header.ruleManagement')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.rulesType1.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('layouts/header.rule1Management')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.rulesType2.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('layouts/header.rule2Management')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">{{__('layouts/header.contentManagement')}}</li>
                    <li class="nav-item">
                        <a href="{{route('admin.categories.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-stream"></i>
                            <p>
                                {{__('layouts/header.categoryManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.courses.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard"></i>
                            <p>
                                {{__('layouts/header.courseManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.lessons.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                {{__('layouts/header.lessonManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.posts.index')}}" class="nav-link">
                            <i class="nav-icon far fa-newspaper"></i>
                            <p>
                                {{__('layouts/header.postManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">{{__('layouts/header.report')}}</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                {{__('layouts/header.chart')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.reports.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('layouts/header.all')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.details.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('layouts/header.detail')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">{{__('layouts/header.systemManagement')}}</li>
                    <li class="nav-item">
                        <a href="{{route('admin.users.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{__('layouts/header.userManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                </ul>
            @elseif (Auth::user()->role->name === 'expert')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">{{__('layouts/header.managementKnowledge')}}</li>
                    <li class="nav-item">
                        <a href="{{route('expert.criteria.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                {{__('layouts/header.criteriaManagement')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('expert.facts.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-week"></i>
                            <p>
                                {{__('layouts/header.factManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{__('layouts/header.ruleManagement')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('expert.rulesType1.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('layouts/header.rule1Management')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('expert.rulesType2.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('layouts/header.rule2Management')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @elseif (Auth::user()->role->name === 'teacher')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">{{__('layouts/header.contentManagement')}}</li>
                    <li class="nav-item">
                        <a href="{{route('teacher.courses.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard"></i>
                            <p>
                                {{__('layouts/header.courseManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('teacher.lesson.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                {{__('layouts/header.lessonManagement')}}
                                {{--                            <span class="right badge badge-danger">New</span>--}}
                            </p>
                        </a>
                    </li>
                </ul>
            @endif
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
