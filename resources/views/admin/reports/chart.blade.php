@extends('admin.layouts.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('layouts/header.all')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('layouts/header.home')}}</a></li>
                            <li class="breadcrumb-item">{{__('layouts/header.chart')}}</li>
                            <li class="breadcrumb-item active">{{__('layouts/header.all')}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- STACKED BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{__('chart.totalPersonChart')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
{{--                        <!-- AREA CHART -->--}}
{{--                        <div class="card card-primary">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">Area Chart</h3>--}}

{{--                                <div class="card-tools">--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="chart">--}}
{{--                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-body -->--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

{{--                        <!-- DONUT CHART -->--}}
{{--                        <div class="card card-danger">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">Donut Chart</h3>--}}

{{--                                <div class="card-tools">--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-body -->--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

{{--                        <!-- PIE CHART -->--}}
{{--                        <div class="card card-danger">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">Pie Chart</h3>--}}

{{--                                <div class="card-tools">--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-body -->--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">
{{--                        <!-- LINE CHART -->--}}
{{--                        <div class="card card-info">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">Line Chart</h3>--}}

{{--                                <div class="card-tools">--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="chart">--}}
{{--                                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-body -->--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{__('chart.detailPersonChart')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
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
{{--    <script src="{{asset('admin/dist/js/demo.js')}}"></script>--}}
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

            var areaChartData = {
                labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label               : 'Digital Goods',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label               : 'Electronics',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label               : 'Son',
                        backgroundColor     : '#00c0ef',
                        borderColor         : '#00c0ef',
                        pointRadius         : false,
                        pointColor          : '#00c0ef',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: '#00c0ef',
                        data                : [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }],
                    yAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }]
                }
            }


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
            var expert = [];
            var student = [];
            var teacher = [];
            @foreach($data as $d)
                @if($d['criteria_type'] == 1)
                    @if($d['role_name'] == 'student')
                        student[0] = {{$d['count']}};
                    @elseif($d['role_name'] == 'teacher')
                        teacher[0] = {{$d['count']}};
                    @else
                        expert[0] = {{$d['count']}};
                    @endif
                @else
                        @if($d['role_name'] == 'student')
                        student[1] = {{$d['count']}};
                    @elseif($d['role_name'] == 'teacher')
                        teacher[1] = {{$d['count']}};
                    @else
                        expert[1] = {{$d['count']}};
                    @endif
                @endif
                @endforeach
            var chartData = {
                labels  : ['{{__('chart.typeIctNewHouse')}}', '{{__('chart.typeDHBKHN')}}'],
                datasets: [
                    {
                        label               : '{{__('chart.student')}}',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : student
                    },
                    {
                        label               : '{{__('chart.teacher')}}',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : teacher
                    },
                    {
                        label               : '{{__('chart.expert')}}',
                        backgroundColor     : '#00c0ef',
                        borderColor         : '#00c0ef',
                        pointRadius         : false,
                        pointColor          : '#00c0ef',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: '#00c0ef',
                        data                : expert
                    },
                ]
            }

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, chartData)
            var temp0 = chartData.datasets[0]
            var temp1 = chartData.datasets[1]
            var temp2 = chartData.datasets[2]
            barChartData.datasets[0] = temp0
            barChartData.datasets[1] = temp1
            barChartData.datasets[2] = temp2

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = jQuery.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script>
@endsection
