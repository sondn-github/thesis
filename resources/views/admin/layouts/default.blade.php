<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    @include('admin.layouts.partials.head')
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        @include('admin.layouts.partials.header')
        @yield('content')
        @include('admin.layouts.partials.foot')
        </div>
        @include('admin.layouts.partials.javascript')
    </body>
</html>
