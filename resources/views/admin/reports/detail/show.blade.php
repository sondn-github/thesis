@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('layouts/header.detail')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route(Auth::user()->role->name . '.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item">{{__('layouts/header.chart')}}</li>
                            <li class="breadcrumb-item active">{{__('layouts/header.detail')}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
{{--                            <div class="panel-heading">Bộ lọc</div>--}}
                            <div class="panel-body">
                                <div class="row">
                                    {!! Form::open(['route' => [Auth::user()->role->name . '.details.show', $course->id], 'method' => 'get', 'class' => 'form-inline ml-2', 'id' => 'form-filter']) !!}
                                        <div class="form-group mr-5">
                                            <label for="from-date" class="mr-2">Từ:</label>
                                            <input type="date" name="from-date" class="form-control date-picker" value="{{old('from-date') ?? \Carbon\Carbon::createFromTimeString($fromDate)->toDateString()}}">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                        <div class="form-group mr-5">
                                            <label for="to-date" class="mr-2">Đến:</label>
                                            <input type="date" name="to-date" class="form-control date-picker" value="{{old('to-date') ?? \Carbon\Carbon::now()->toDateString()}}">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                        <div class="form-group mr-5">
                                            {!! Form::label('class_name', 'Lớp:', ['class' => 'control-label mr-2']) !!}
                                            {!! Form::select('class_name', array_merge(['' => 'Chọn lớp'], $classes) , null , ['class' => 'form-control']) !!}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                        <button type="button" class="btn btn-info ml-1" id="btn-reset" data-url="{{ url()->current() }}">Đặt lại</button>
                                    </form>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{__('Số lượt đánh giá với khóa học')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route(Auth::user()->role->name . '.exports.course', $course->id) }}" id="btn-export" class="btn btn-primary">Export</a>
                                    {{--                                    <a href="{{route('admin.exports.show', 2)}}" class="btn btn-primary">Export DHBKHN</a>--}}
                                </div>
                                <div class="chart">
                                    <canvas id="barChartNumberEvaluation" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{__('Mức độ đồng ý của tiêu chí với khóa học')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
{{--                                    <a href="{{route('admin.exports.show', 1)}}" class="btn btn-primary">Export ICT NewHouse</a>--}}
{{--                                    <a href="{{route('admin.exports.show', 2)}}" class="btn btn-primary">Export DHBKHN</a>--}}
                                </div>
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-ui/jquery-ui.js')}}"></script>
    {{--    <script src="{{asset('weekStart: 0,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true,
            rtl: true,
            orientation: "auto"admin/dist/js/demo.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/dist/js/pages/dashboard3.js')}}"></script>--}}
    <script type="text/javascript">
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            // var areaChartData = {
            //     labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            //     datasets: [
            //         {
            //             label               : 'Digital Goods',
            //             backgroundColor     : 'rgba(60,141,188,0.9)',
            //             borderColor         : 'rgba(60,141,188,0.8)',
            //             pointRadius          : false,
            //             pointColor          : '#3b8bba',
            //             pointStrokeColor    : 'rgba(60,141,188,1)',
            //             pointHighlightFill  : '#fff',
            //             pointHighlightStroke: 'rgba(60,141,188,1)',
            //             data                : [28, 48, 40, 19, 86, 27, 90]
            //         },
            //         {
            //             label               : 'Electronics',
            //             backgroundColor     : 'rgba(210, 214, 222, 1)',
            //             borderColor         : 'rgba(210, 214, 222, 1)',
            //             pointRadius         : false,
            //             pointColor          : 'rgba(210, 214, 222, 1)',
            //             pointStrokeColor    : '#c1c7d1',
            //             pointHighlightFill  : '#fff',
            //             pointHighlightStroke: 'rgba(220,220,220,1)',
            //             data                : [65, 59, 80, 81, 56, 55, 40]
            //         },
            //         {
            //             label               : 'Son',
            //             backgroundColor     : '#00c0ef',
            //             borderColor         : '#00c0ef',
            //             pointRadius         : false,
            //             pointColor          : '#00c0ef',
            //             pointStrokeColor    : '#c1c7d1',
            //             pointHighlightFill  : '#fff',
            //             pointHighlightStroke: '#00c0ef',
            //             data                : [65, 59, 80, 81, 56, 55, 40]
            //         },
            //     ]
            // }
            //
            // var areaChartOptions = {
            //     maintainAspectRatio : false,
            //     responsive : true,
            //     legend: {
            //         display: false
            //     },
            //     scales: {
            //         xAxes: [{
            //             gridLines : {
            //                 display : false,
            //             }
            //         }],
            //         yAxes: [{
            //             gridLines : {
            //                 display : false,
            //             }
            //         }]
            //     }
            // }


            //-------------
            //- LINE CHART -
            //--------------
            // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            // var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            // var lineChartData = jQuery.extend(true, {}, areaChartData)
            // lineChartData.datasets[0].fill = false;
            // lineChartData.datasets[1].fill = false;
            // lineChartOptions.datasetFill = false
            //
            // var lineChart = new Chart(lineChartCanvas, {
            //     type: 'line',
            //     data: lineChartData,
            //     options: lineChartOptions
            // })
            var data = [];
            var labels = [];
            var codes = [];
            @foreach($type->criteria as $key => $c)
                codes.push('{{$c->code}}');
                labels.push('Tiêu chí {{ $c->code }}');
            @endforeach
            @foreach($course->pfr as $key => $value)
                if (codes.includes('{{$key}}')) {
                data.push('{{$value[4]}}');
            }
                @endforeach

            var chartData = {
                    labels  : labels,
                    datasets: [
                        {
                            label               : '{{__('Mức độ đồng ý')}}',
                            backgroundColor     : 'rgba(60,141,188,0.9)',
                            borderColor         : 'rgba(60,141,188,0.8)',
                            pointRadius          : false,
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : 'rgba(60,141,188,1)',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data                : data
                        },
                        {{--{--}}
                        {{--    label               : '{{__('chart.teacher')}}',--}}
                        {{--    backgroundColor     : 'rgba(210, 214, 222, 1)',--}}
                        {{--    borderColor         : 'rgba(210, 214, 222, 1)',--}}
                        {{--    pointRadius         : false,--}}
                        {{--    pointColor          : 'rgba(210, 214, 222, 1)',--}}
                        {{--    pointStrokeColor    : '#c1c7d1',--}}
                        {{--    pointHighlightFill  : '#fff',--}}
                        {{--    pointHighlightStroke: 'rgba(220,220,220,1)',--}}
                        {{--    data                : teacher--}}
                        {{--},--}}
                        {{--{--}}
                        {{--    label               : '{{__('chart.expert')}}',--}}
                        {{--    backgroundColor     : '#00c0ef',--}}
                        {{--    borderColor         : '#00c0ef',--}}
                        {{--    pointRadius         : false,--}}
                        {{--    pointColor          : '#00c0ef',--}}
                        {{--    pointStrokeColor    : '#c1c7d1',--}}
                        {{--    pointHighlightFill  : '#fff',--}}
                        {{--    pointHighlightStroke: '#00c0ef',--}}
                        {{--    data                : expert--}}
                        {{--},--}}
                    ]
                }

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, chartData)
            var temp0 = chartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                scales: {
                    display: true,
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 1
                        }
                    }],
                },

            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            {{--//-----------------------}}
            {{--//- STACKED BAR CHART ---}}
            {{--//-----------------------}}
            {{--var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')--}}
            {{--var stackedBarChartData = jQuery.extend(true, {}, barChartData)--}}

            {{--var stackedBarChartOptions = {--}}
            {{--    responsive              : true,--}}
            {{--    maintainAspectRatio     : false,--}}
            {{--    scales: {--}}
            {{--        xAxes: [{--}}
            {{--            stacked: true,--}}
            {{--        }],--}}
            {{--        yAxes: [{--}}
            {{--            stacked: true--}}
            {{--        }]--}}
            {{--    }--}}
            {{--}--}}

            {{--var stackedBarChart = new Chart(stackedBarChartCanvas, {--}}
            {{--    type: 'bar',--}}
            {{--    data: stackedBarChartData,--}}
            {{--    options: stackedBarChartOptions--}}
            {{--})--}}
            data = [];
            data[4] = [];
            data[3] = [];
            data[2] = [];
            data[1] = [];
                @foreach($evaluation as $criterionCode => $answer)
                    data[4].push('{{$answer[4]}}');
                    data[3].push('{{$answer[3]}}');
                    data[2].push('{{$answer[2]}}');
                    data[1].push('{{$answer[1]}}');
                @endforeach

             chartData = {
                    labels  : labels,
                    datasets: [
                        {
                            label               : '{{__('Đồng ý')}}',
                            backgroundColor     : 'rgba(60,141,188,0.9)',
                            borderColor         : 'rgba(60,141,188,0.8)',
                            pointRadius          : false,
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : 'rgba(60,141,188,1)',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data                : data[4]
                        },
                        {
                            label               : '{{__('Trung lập')}}',
                            backgroundColor     : 'rgba(210, 214, 222, 1)',
                            borderColor         : 'rgba(210, 214, 222, 1)',
                            pointRadius         : false,
                            pointColor          : 'rgba(210, 214, 222, 1)',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data                : data[3]
                        },
                        {
                            label               : '{{__('Không đồng ý')}}',
                            backgroundColor     : '#00c0ef',
                            borderColor         : '#00c0ef',
                            pointRadius         : false,
                            pointColor          : '#00c0ef',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#00c0ef',
                            data                : data[2]
                        },
                        {
                            label               : '{{__('Từ chối')}}',
                            backgroundColor     : '#008fef',
                            borderColor         : '#008fef',
                            pointRadius         : false,
                            pointColor          : '#00c0ef',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#00c0ef',
                            data                : data[1]
                        },
                    ]
                }

            //-------------
            //- BAR CHART -
            //-------------
            barChartCanvas = $('#barChartNumberEvaluation').get(0).getContext('2d')
            barChartData = jQuery.extend(true, {}, chartData)
            barChartData.datasets[0] = chartData.datasets[0]
            barChartData.datasets[1] = chartData.datasets[1]
            barChartData.datasets[2] = chartData.datasets[2]
            barChartData.datasets[3] = chartData.datasets[3]

            barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                scales: {
                    display: true,
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }],
                },

            }

            barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })

        // $('.date-picker').datepicker({
        //     format: "d/m/yy",
        //     weekStart: 0,
        //     calendarWeeks: true,
        //     autoclose: true,
        //     todayHighlight: true,
        //     rtl: true,
        //     orientation: "auto"
        // })
        $('#btn-reset').click(function () {
            window.location.href = $(this).data('url');
        })

        $('#btn-export').click(function (e) {
            e.preventDefault();
            let oldUrl = $('#form-filter').attr('action');
            $('#form-filter').attr('action', $(this).attr('href')).submit();
            $('#form-filter').attr('action', oldUrl);
        })

    </script>
@endsection
